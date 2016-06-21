import support
support.print_hello("wei rui")

money = 2000
def addMoney():
	global money
	money = money +1000
	return money
addMoney()
print money

import math
content = dir(math)
print content;