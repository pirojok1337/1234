#!/bin/bash
if [ "$#" -ne 6 ]; then
    echo "Please use like: $BASH_SOURCE 192.168.100.66 client_name root qweqwe 10.0.0.10 10.0.0.9"
    echo "where 192.168.100.66 is public ip address of OpenVpn server, root is login to server, qweqwe is password, 10.0.0.10 is the firts tun IP, 10.0.0.9 is additional tun IP"
    exit 0
fi
echo "=============================="
echo "start install and configure OpenVpn client"
echo "=============================="
CUR_PATH=`pwd`

echo "=============================="
echo "install openvpn and easy-rsa"
echo "=============================="
wget -O - https://swupdate.openvpn.net/repos/repo-public.gpg|apt-key add -
echo "deb http://build.openvpn.net/debian/openvpn/testing jessie main" > /etc/apt/sources.list.d/openvpn-aptrepo.list
apt update
apt install -y openvpn sshpass

echo "=============================="
echo "generate certificates"
echo "=============================="
sshpass -p "$4" ssh -oStrictHostKeyChecking=no "$3@$1" 'cd /etc/openvpn/easy-rsa && source ./vars && ./pkitool '"$2"
sshpass -p "$4" ssh -o StrictHostKeychecking=no "$3@$1" "touch /etc/openvpn/ccd/$2"
sshpass -p "$4" ssh -o StrictHostKeychecking=no "$3@$1" "echo "ifconfig-push $5 $6" > /etc/openvpn/ccd/$2"

echo "=============================="
echo "copy certificates"
echo "=============================="
sshpass -p "$4" scp -r "$3@$1":/etc/openvpn/easy-rsa/keys/ca.crt /etc/openvpn
sshpass -p "$4" scp -r "$3@$1":/etc/openvpn/easy-rsa/keys/$2.crt /etc/openvpn
sshpass -p "$4" scp -r "$3@$1":/etc/openvpn/easy-rsa/keys/$2.key /etc/openvpn
sshpass -p "$4" scp -r "$3@$1":/etc/openvpn/easy-rsa/keys/ta.key /etc/openvpn

echo "=============================="
echo "configure client"
echo "=============================="
cp /usr/share/doc/openvpn/examples/sample-config-files/client.conf /etc/openvpn
sed -i -e 's/remote my-server-1 1194/remote '"$1"' 1194/g' /etc/openvpn/client.conf
sed -i -e 's/cert client.crt/cert '"$2"'.crt/g' /etc/openvpn/client.conf
sed -i -e 's/key client.key/key '"$2"'.key/g' /etc/openvpn/client.conf
sed -i -e 's/;tls-auth ta.key 1/tls-auth ta.key 1/g' /etc/openvpn/client.conf
sed -i -e 's/;cipher x/cipher AES-256-CBC/g' /etc/openvpn/client.conf
sed -i -e 's/comp-lzo/#comp-lzo/g' /etc/openvpn/client.conf

echo "=============================="
echo "start OpenVpn"
echo "=============================="
systemctl enable openvpn.service
systemctl start openvpn.service

cd $CUR_PATH
