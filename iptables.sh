#!/bin/bash
echo "=============================="
echo "configure sysctl settings"
echo "=============================="
echo "1" > /proc/sys/net/ipv4/ip_forward
echo "1" > /proc/sys/net/ipv4/tcp_syncookies
echo "1" > /proc/sys/net/ipv4/icmp_echo_ignore_broadcasts
echo "1" > /proc/sys/net/ipv4/icmp_ignore_bogus_error_responses

IP_TABLES_BAKUP="/etc/sysconfig/iptables.bak.$(date +%Y%m%d%H%M%S)"
echo "create iptabeles backup file: $IP_TABLES_BAKUP"
echo "=============================="
cp -pv /etc/sysconfig/iptables $IP_TABLES_BAKUP

echo "=============================="
echo "clear iptables"
echo "=============================="
/sbin/iptables -F
/sbin/iptables -F -t nat
/sbin/iptables -F -t mangle
/sbin/iptables -X

echo "=============================="
echo "configure iptables"
echo "=============================="
/sbin/iptables -A INPUT -s static_public_IP_of_VPS -j ACCEPT

/sbin/iptables -A FORWARD -i eth0 -o tun0 -j ACCEPT
/sbin/iptables -A FORWARD -i tun0 -o eth0 -j ACCEPT
/sbin/iptables -A INPUT -p udp --dport 1194 -j ACCEPT

# allow interfaces

/sbin/iptables -A INPUT -i lo -j ACCEPT
/sbin/iptables -A OUTPUT -o lo -j ACCEPT

# allow tunnel IP
/sbin/iptables -A INPUT -s 10.X.X.0/24 -j ACCEPT

# allow IP to receive VoIP traffic from Flamesgroup
/sbin/iptables -A INPUT -s 5.231.192.1 -j ACCEPT
/sbin/iptables -A INPUT -s 5.231.192.3 -j ACCEPT
/sbin/iptables -A INPUT -s 5.231.192.9 -j ACCEPT
/sbin/iptables -A INPUT -s 5.231.192.12 -j ACCEPT
/sbin/iptables -A INPUT -s 5.231.192.13 -j ACCEPT 

# Antrax support
/sbin/iptables -A INPUT -s 46.149.83.184 -j ACCEPT
/sbin/iptables -A INPUT -s 91.192.45.150 -j ACCEPT
/sbin/iptables -A INPUT -s 195.60.174.151 -j ACCEPT 
/sbin/iptables -A INPUT -s 195.60.174.49 -j ACCEPT
/sbin/iptables -A INPUT -s 91.225.198.20 -j ACCEPT

# Antrax SMS
iptables -I INPUT 1 -s 95.216.228.29 -j ACCEPT

# Zabbix agent/server
/sbin/iptables -A INPUT -p tcp --dport 123 -j ACCEPT
/sbin/iptables -A INPUT -p udp --dport 123 -j ACCEPT
/sbin/iptables -A INPUT -p tcp --dport 10050 -j ACCEPT
/sbin/iptables -A INPUT -p udp --dport 10050 -j ACCEPT
/sbin/iptables -A INPUT -p tcp --dport 10051 -j ACCEPT
/sbin/iptables -A INPUT -p udp --dport 10051 -j ACCEPT

/sbin/iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
/sbin/iptables -A INPUT -p icmp -j ACCEPT
/sbin/iptables -A INPUT -i lo -j ACCEPT
/sbin/iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 22 -j ACCEPT
/sbin/iptables -A INPUT -j REJECT --reject-with icmp-host-prohibited
/sbin/iptables -A FORWARD -j REJECT --reject-with icmp-host-prohibited

/sbin/iptables -t nat -A POSTROUTING -s 10.X.X.0/24 -o eth0 -j SNAT --to-source static_public_IP_of_VPS
/sbin/iptables -t nat -A POSTROUTING -s 10.X.X.0/24 -o eth0 -j MASQUERADE

/sbin/service iptables save
echo "=============================="
echo "current iptables rules"
echo "=============================="
/sbin/iptables -L -vn
