from numpy import *
import MySQLdb


#matrix = []
db = MySQLdb.connect("localhost", "root", "B+P0s1t1f", "localhost")

#email, timesavailable = [@pis,@pisdf,@pisdf], [42,32,24]

#prepare a cursor object using cursor() method

cursor = db.cursor()

sql = "SELECT times FROM availability WHERE gender = 'F'"

try:
    cursor.execute(sql)
    results = cursor.fetchall()
    print results
# 	rcount = int(cursor.rowcount)

# 	for r in rcount:
# 		row = cursor.fetchone()

# 		email.append(row[0])
# 		 #user id
# 		timesavailable(row[1]) #times they are available
# 		gender.append(row[3])
# 	print "email=%d, times available = %s" % (user_id, timesavailable)

except:
 	print "Error: unable to fetch data"

db.close()

#print results

#gender=["female", "male", "female"]
#male, female = [], []
#for i in gender
#	if gender[i] = "male"
#		male.append([email[i],timesavailable[i]])
#	else
#		female.append([email[i],timesavailable[i]])


#print male
#print female + "female"
