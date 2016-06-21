# -*- coding: UTF-8 -*-
"""
if True:
	print "对";
else:
	print "错";
"""

'''
raw_input("\n\nPress the enter key to exit.");
'''

'''
#赋值
counter = 100 # 赋值整型变量
miles = 1000.0 # 浮点型
name = "John" # 字符串

a, b, c = 1, 2, "john"
d=5;e=6
print counter
print miles
print name
print a
print b
print c
print d
print e
'''

'''
#字符串

str = 'Hello World!'

print str # 输出完整字符串
print str[0] # 输出字符串中的第一个字符
print str[2:7] # 输出字符串中第三个至第五个之间的字符串
print str[2:] # 输出从第三个字符开始的字符串
print str * 2 # 输出字符串两次
print str + "TEST" # 输出连接的字符串
'''

"""
#列表
list = [ 'abcd', 786 , 2.23, 'john', 70.2 ]
tinylist = [123, 'john', 'abcd']

print list # 输出完整列表
print list[0] # 输出列表的第一个元素
print list[1:3] # 输出第二个至第三个的元素 
print list[2:] # 输出从第三个开始至列表末尾的所有元素
print tinylist * 2 # 输出列表两次
print list + tinylist # 打印组合的列表
"""

"""
#元组是另一个数据类型，类似于List（列表）。元组用"()"标识。内部元素用逗号隔开。但是元组不能二次赋值，相当于只读列表。
tuple = ( 'abcd', 786 , 2.23, 'john', 70.2 )
tinytuple = (123, 'john')
#tuple[0] = 'wei'
print tuple # 输出完整元组
print tuple[0] # 输出元组的第一个元素
print tuple[1:3] # 输出第二个至第三个的元素 
print tuple[2:] # 输出从第三个开始至列表末尾的所有元素
print tinytuple * 2 # 输出元组两次
print tuple + tinytuple # 打印组合的元组
"""

"""
#字典(dictionary)是除列表以外python之中最灵活的内置数据结构类型。列表是有序的对象结合，字典是无序的对象集合。
#两者之间的区别在于：字典当中的元素是通过键来存取的，而不是通过偏移存取。
#字典用"{ }"标识。字典由索引(key)和它对应的值value组成。
dict = {}
dict['one'] = "This is one"
dict[2] = "This is two"
tinydict = {'name': 'john','code':6734, 'dept': 'sales'}
print dict['one'] # 输出键为'one' 的值
print dict[2] # 输出键为 2 的值
print tinydict # 输出完整的字典
print tinydict.keys() # 输出所有键
print tinydict.values() # 输出所有值
#testlist = ('name':'weirui')
#print testlist
"""

"""
#Python算术运算符
a = 21
b = 10
c = 0

c = a + b
print "1 - c 的值为：", c

c = a - b
print "2 - c 的值为：", c 

c = a * b
print "3 - c 的值为：", c 

c = a / b
print "4 - c 的值为：", c 

c = a % b
print "5 - c 的值为：", c

# 修改变量 a 、b 、c
a = 2
b = 3
c = a**b 
print "6 - c 的值为：", c

a = 10
b = 5
c = a//b 
print "7 - c 的值为：", c
"""

"""
#Python比较运算符

a = 21
b = 10
c = 0

if ( a == b ):
   print "1 - a 等于 b"
else:
   print "1 - a 不等于 b"

if ( a != b ):
   print "2 - a 不等于 b"
else:
   print "2 - a 等于 b"

if ( a <> b ):
   print "3 - a 不等于 b"
else:
   print "3 - a 等于 b"

if ( a < b ):
   print "4 - a 小于 b" 
else:
   print "4 - a 大于等于 b"

if ( a > b ):
   print "5 - a 大于 b"
else:
   print "5 - a 小于等于 b"

# 修改变量 a 和 b 的值
a = 5;
b = 20;
if ( a <= b ):
   print "6 - a 小于等于 b"
else:
   print "6 - a 大于  b"

if ( b >= a ):
   print "7 - b 大于等于 b"
else:
   print "7 - b 小于 b"
"""

"""
#位运算
a = 60            # 60 = 0011 1100 
b = 13            # 13 = 0000 1101 
c = 0

c = a & b;        # 12 = 0000 1100
print "1 - c 的值为：", c

c = a | b;        # 61 = 0011 1101 
print "2 - c 的值为：", c

c = a ^ b;        # 49 = 0011 0001
print "3 - c 的值为：", c

c = ~a;           # -61 = 1100 0011
print "4 - c 的值为：", c

c = a << 2;       # 240 = 1111 0000
print "5 - c 的值为：", c

c = a >> 2;       # 15 = 0000 1111
print "6 - c 的值为：", c
"""

"""
#成员运算符
a = 10
b = 20
list = [1, 2, 3, 4, 5 ];

if ( a in list ):
   print "1 - 变量 a 在给定的列表中 list 中"
else:
   print "1 - 变量 a 不在给定的列表中 list 中"

if ( b not in list ):
   print "2 - 变量 b 不在给定的列表中 list 中"
else:
   print "2 - 变量 b 在给定的列表中 list 中"

# 修改变量 a 的值
a = 2
if ( a in list ):
   print "3 - 变量 a 在给定的列表中 list 中"
else:
   print "3 - 变量 a 不在给定的列表中 list 中"
"""

"""
#Python身份运算符
a = 20
b = 20

if ( a is b ):
   print "1 - a 和 b 有相同的标识"
else:
   print "1 - a 和 b 没有相同的标识"

if ( id(a) == id(b) ):
   print "2 - a 和 b 有相同的标识"
else:
   print "2 - a 和 b 没有相同的标识"

# 修改变量 b 的值
b = 30
if ( a is b ):
   print "3 - a 和 b 有相同的标识"
else:
   print "3 - a 和 b 没有相同的标识"

if ( a is not b ):
   print "4 - a 和 b 没有相同的标识"
else:
   print "4 - a 和 b 有相同的标识"
   
a = 40
b = '40'
print id(a)
print id(b)
"""

"""
#while循环

# count = 0
# while (count < 9):
   # print 'The count is:', count
   # count = count + 1

# print "Good bye!"

flag = 1
while flag:print 'Given flag is really true!'
print "Good bye!"
"""

"""
#for循环
for letter in 'Python':     # 第一个实例
   print '当前字母 :', letter

fruits = ['banana', 'apple',  'mango']
for fruit in fruits:        # 第二个实例
   print '当前字母 :', fruit

print "Good bye!"
"""


"""
#通过序列索引迭代
#另外一种执行循环的遍历方式是通过索引，如下实例
fruits = ['banana', 'apple',  'mango']
for index in range(len(fruits)):
   print '当前水果 :', fruits[index]

print "Good bye!"
print range(10, 20); #10-19
"""

"""
#求2-100素数
#while
# i = 2
# while i < 100:
	# j = 2
	# boo = True
	# while j < i:
		# if i%j == 0:
			# boo = False
			# break
		# j = j +1
	# if boo == True:
		# print i,"是素数"
	# i = i + 1
	
#for
for i in range(2,101):
	boo = True
	for j in range(2, i):
		if (i %j  == 0):
			boo = False
			break
	if (boo == True):
		print i,"是素数"
"""

"""
# 输出 Python 的每个字母
for letter in 'Python':
   if letter == 'h':
      pass
      #print '这是 pass 块'
   print '当前字母 :', letter

print "Good bye!"
"""

"""
a = '''<HTML style="color:red"><HEAD><TITLE>
Friends CGI Demo</TITLE></HEAD>
<BODY><H3>ERROR</H3>
<B>%s</B><P>
<FORM><INPUT TYPE=button VALUE=Back
ONCLICK="window.history.back()"></FORM>
</BODY></HTML>'''
print a
"""

import time

localtime = time.localtime(time.time())
print "本地时间为 :", localtime

ticks = time.time()
print "当前时间戳为:", ticks

# 格式化成2016-03-20 11:45:39形式
print time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()) 