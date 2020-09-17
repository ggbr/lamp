v  = input("tag: ")

from os import system
from time import sleep
import sys


system('docker login -u corebiz -p corepassword')

system('docker build  . -t  corebiz/service-login:' + v)
system('docker push  corebiz/service-login:' + v)
