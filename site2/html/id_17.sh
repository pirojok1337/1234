#!/bin/bash

chatid='384043947'
message="Reboot was done"
token='744563516:AAG5MsKTO9aMNEDjap1cbgtOjSr7CklYyiA/sendMessage'


#echo 0 > /sys/class/gpio/gpio16/value
#sleep 1
#echo 1 > /sys/class/gpio/gpio16/value
#sleep 1

/usr/bin/curl --header 'Content-Type: application/json' --request 'POST' --data "{\"chat_id\":\"${chatid}\",\"text\":\"${message}\"}" "https://api.telegram.org/bot744563516:AAG5MsKTO9aMNEDjap1cbgtOjSr7CklYyiA/sendMessage"

