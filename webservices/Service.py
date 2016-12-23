#!/usr/bin/python
from SOAPpy import SOAPServer
import time
import random
from random import randint
from crontab import CronTab

empty_cron    = CronTab()
my_user_cron  = CronTab(user=True)
users_cron    = CronTab(user='username')

#Create a ticket;
def createticketid():
    seed = random.getrandbits(32)
    while True:
       yield seed
       seed += 1

def createjob(ticketid, comando):

def calcula(op1,op2,operacao):
        id = createticketid()

        return createticketid()
        op1 = randint(5,90)
        time.sleep(30)
        if operacao == '+':
                return op1 + op2
        if operacao == '-':
                return op1 - op2
        if operacao == '*':
                return op1 * op2
        if operacao == '/':
                return op1 / op2

server = SOAPServer(('localhost',8081))
server.registerFunction(calcula,"ns-calcula","calcula")
server.config.dumpSOAPOut = 1
server.config.dumpSOAPIn = 1
server.serve_forever()