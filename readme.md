# Mari's master thesis

This repository is a creativity tool including multiple assistants.

## Setup

This is a development version intended to run locally on an [XAMPP server](https://www.apachefriends.org/index.html).

To setup please follow these steps:

1. Setup the XAMPP server for your OS and start both server and MySQL in the control panel.
2. Clone this repository into your htdocs folder  
`cd C:\xampp\htdocs; git clone; cd Masterarbeit2020`

3. Create database user and database: Open Powershell and type:  
```
cd C:/xampp/htdocs/Masterarbeit2020; C:/xampp/mysql/bin/mysql -u root -p
```  
The password is empty.
You should now be connected to MySQL as the root user.
You can now source the setup script: `source db/create_database.sql;`  
The source script creates the user *masterarbeit* and grants him all privileges on the database *masterarbeit*.  
You can now verify this by typing `show databases;` where you should see the new database.    
Type `exit` to disconnect but leave the window open.  

4. Create tables in database:  
First connect to the database as the new user *masterarbeit*:  
```
cd C:/xampp/htdocs/Masterarbeit2020; C:/xampp/mysql/bin/mysql -u masterarbeit -pMA2020 masterarbeit;
```  
The default password for this user is: "MA2020".  
Your prompt should look like this `MariaDB [masterarbeit]>`  
Now source the table setup script: `source db/setup_db.sql;`  
You can now exit.  

5. Open localhost: http://localhost/Masterarbeit2020/

6. You're done! :)  
You should see this:


 ![landing page](/screenshots/landing.jpg?raw=true)
