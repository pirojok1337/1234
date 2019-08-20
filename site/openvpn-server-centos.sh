#!/bin/bash
if [ "$#" -ne 3 ]; then
    echo "Please use like: $BASH_SOURCE eth0 192.168.100.66 10.8.0.0"
    echo "where 192.168.100.66 - ip address, eth0 interface for ip address, 10.8.0.0 - op address for OpenVpn server"
    exit 0
fi
echo "=============================="
echo "start install and configure OpenVpn server for ip: $2, interface: $1, OpenVpn ip: $3"
echo "=============================="
CUR_PATH=`pwd`

echo "=============================="
echo "install openvpn and easy-rsa"
echo "=============================="
rpm -ivh http://dl.fedoraproject.org/pub/epel/6/i386/epel-release-6-8.noarch.rpm
yum install -y openvpn

echo "=============================="
echo "generate certificates"
echo "=============================="
mkdir -p /etc/openvpn/ccd
cd /etc/openvpn/easy-rsa
source ./vars
./clean-all
echo "=============================="
echo "init ca certificate"
echo "=============================="
./pkitool --initca
echo "=============================="
echo "generate certificate for server"
echo "=============================="
./pkitool --server server
./build-dh
openvpn --genkey --secret keys/ta.key

echo "=============================="
echo "configure OpenVpn server"
echo "=============================="
cp /usr/share/doc/openvpn-*/sample/sample-config-files/server.conf /etc/openvpn
sed -i -e 's/server 10.8.0.0 255.255.255.0/server '"$3"' 255.255.255.0/g' /etc/openvpn/server.conf
sed -i -e 's/;local a.b.c.d/local '"$2"'/g' /etc/openvpn/server.conf
sed -i -e '0,/;client-config-dir ccd/s/;client-config-dir ccd/client-config-dir \/etc\/openvpn\/ccd/' /etc/openvpn/server.conf
sed -i -e 's/ca ca.crt/ca \/etc\/openvpn\/easy-rsa\/keys\/ca.crt/g' /etc/openvpn/server.conf
sed -i -e 's/cert server.crt/cert \/etc\/openvpn\/easy-rsa\/keys\/server.crt/g' /etc/openvpn/server.conf
sed -i -e 's/key server.key/key \/etc\/openvpn\/easy-rsa\/keys\/server.key/g' /etc/openvpn/server.conf
sed -i -e 's/dh dh2048.pem/dh \/etc\/openvpn\/easy-rsa\/keys\/dh2048.pem/g' /etc/openvpn/server.conf
sed -i -e 's/tls-auth ta.key 0/tls-auth \/etc\/openvpn\/easy-rsa\/keys\/ta.key 0/g' /etc/openvpn/server.conf
sed -i -e 's/;client-to-client/client-to-client/g' /etc/openvpn/server.conf
sed -i -e 's/;user nobody/user nobody/g' /etc/openvpn/server.conf
sed -i -e 's/;group nobody/group nobody/g' /etc/openvpn/server.conf
sed -i -e 's/;log         openvpn.log/log         \/var\/log\/openvpn.log/g' /etc/openvpn/server.conf

echo "=============================="
echo "start OpenVpn"
echo "=============================="
chkconfig openvpn on
service openvpn start

cd $CUR_PATH
 
