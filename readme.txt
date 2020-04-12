Emp console

The main objective of the project is to track employee visited website

1)Get the clone from given git link
2)Extract the cloned file to the web server
3)open the comand prompt or terminal 
4)enter inside the extracted folder 
5)run the migration command to create the database (php artisan migrate)
6)this will create all the database tables
7)use the commads to insert employee and employee visited website commands are
	a)php artisan SETempdata {empId}{empname}{ipaddress}
	ex:php artisan SETempdata Em001 jack 192.168.10.14
	This command is used to insert employee details
	
	b)php artisan GETempdata {ipaddress}
	ex:php artisan GETempdata 192.168.10.14
	This command shows the employeedetails for the given ipaddress if records not found show record not found

	c)php artisan UNSETempdata {ipaddress}
	ex:php artisan UNSETempdata 192.168.10.14
	This commad get the record based on the ipaddress and perform soft delete operation data will be present in table but not shown to the user

	d)php artisan SETempwebhistory {ipaddress}{websitelink}
	ex:php artisan SETempwebhistory 192.168.10.14 http://linkedin.com
	This will check for given ipaddress employee details is there or not if employee details is their it will be considred as visited link and stored in the table

	e)php artisan GETempwebhistory {ipaddress}
	ex:php artisan GETempwebhistory 192.168.10.14
	This will get the employee details and the website visited by the employee as output
	f)php artisan UNSETempwebhistory{ipaddress}
	ex:php artisan UNSETempwebhistor 192.168.10.14
	This will delete all the website visited details of the given link

	g)php artisan END
	This will exit