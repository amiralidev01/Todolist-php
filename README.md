# TodoList-php

A simple **PHP & AJAX task manager** built for practice.

## ​ Features
- User Registration  
- User Login  
- Create, Read, Update, Delete (CRUD) tasks  
- AJAX-based interactions (dynamic updates without page reload)  
- Clean and modular code organization  

## ​ Requirements
- PHP 7.4 or higher  
- MySQL / MariaDB  
- Web server (Apache, Nginx, or PHP built-in)  

## ​ Installation

Clone the repository:
```bash
git clone git@github.com:amiralidev01/Todolist-php.git
cd Todolist-php
Import the database:

bash
Copy
Edit
mysql -u root -p your_database_name < todolist.sql
Configure your database connection in the project (e.g., in a config file or at the top of PHP files):

php
Copy
Edit
$host = 'localhost';
$db   = 'your_database_name';
$user = 'root';
$pass = '';
Start your local server and open in browser:

bash
Copy
Edit
http://localhost/Todolist-php/index.php
Project Structure
text
Copy
Edit
Todolist-php/
│-- assets/       # CSS, JS, images
│-- bootstrap/    # Bootstrap CSS/JS
│-- libs/         # Helper libraries, e.g., DB connection
│-- process/      # AJAX or form handlers
│-- views/        # HTML/PHP view templates
│-- index.php     # Main entry point (dashboard or to-do list)
│-- login.php     # User login page
│-- register.php  # User registration page
│-- todolist.sql  # SQL schema for tasks and users
Usage Flow
Register a new user.

Login to access task list.

Add, edit, or delete tasks dynamically via AJAX.

See updates instantly without refreshing the page.
