# CI_admin
Integrated Admin Panel in Codeigniter. 

========================================
This piece of code enables you to have an Admin panel ready Codeigniter which has a Login Controller , Admin Controller and a Dynamic Menu CRUD to create and render menu for sidebar in Admin panel. 

========================================

This a single login interface application which opens the login controller index function as it is the default route in application->config->routes.php. The users have roles, based on these roles, the user is redirected to its desired controller after successful login. 

========================================

# HOW TO CONFIGURE

Download or Clone the source of this project on your machine and extract the admin.zip. If you are running wamp with default settings copy the admin folder to C:\wamp\www folder

Go to http://localhost/phpmyadmin 

Create a database admin and import the database file admin.sql into that database. 

Open the project in your IDE and go to application->config->database.php

Relace the following lines (probably line # 93-96)

$db['development']['hostname'] = 'localhost';
$db['development']['username'] = 'root';
$db['development']['password'] = '';
$db['development']['database'] = 'pm';

as per your machine settings. Replace database name, username and password. Hostname is likely to be localhost on your machine as well. 

===========================================

If all goes well, Just open the project in your browser 
http://localhost/admin

You will be redirected to Login page. 

Give email : admin@malik.com
Give Pass : muhammad 
Click Let me in... 

============================================

# HOW TO USE IT

In the dashboard, click Admin Menu -> Add from sidebar. 
Add a menu item you wish to have in sidebar. Give name, url, and class for font awesome icon you want to display with the menu. 
Note: Only main menus can have font awesome icon, sub menus can't
