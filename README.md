# Film-Registration-System
Communication with database to register movie table and awards table with join in php

To run this project, follow the steps below:

## Installation and Usage Guide for PHP/MySQL CRUD Project
This is a step-by-step guide to help GitHub users open and use a project that utilizes PHP and MySQL to perform CRUD operations (Create, Read, Update, Delete). Follow the instructions below to set up and run the project.

### Prerequisites
Before getting started, ensure that you have the following software installed on your system:

PHP (version 7.0 or later)
MySQL (version 5.6 or later)
Web server (e.g., Apache, Nginx)

### Step 1: Clone the Repository
On the project's GitHub page, click on the "Code" button and copy the project's Git URL.
Open your terminal or command prompt.
Navigate to the directory where you want to clone the project.
Run the following command to clone the repository:

git clone <repository-url>

### Step 2: Configure the Database
Create a new MySQL database for the project.
Open the project's root directory and locate the config.php file.
Open the config.php file in a text editor.
Update the database configuration values with your MySQL database details (e.g., host, username, password, database name).
Save the changes to the config.php file.
  
### Step 3: Import the Database Schema
In the project's root directory, locate the SQL file with the database schema (e.g., database.sql).
Open your MySQL management tool (e.g., phpMyAdmin, MySQL Workbench).
Create a new database or select the existing database where you want to import the schema.
Import the SQL file containing the schema into the selected database. This will create the necessary tables and structure.

### Step 4: Run the Project
Start your web server and ensure it is running.
Open a web browser and enter the URL to access the project (e.g., http://localhost/path/to/project).
You should now see the project's homepage or the CRUD functionality interface.
Use the provided forms and buttons to perform CRUD operations on the data stored in the database.
  
### Step 5: Configure connection
In MySQL, create the database named "cinema".
Inside this database, create the tables found in "bd/cinema.sql".
Configure the database user and password in the file "/_config/connection.php".
In the file "/_helpers/index.php", configure the base URL.

## Troubleshooting
If you encounter any errors during the setup process, double-check the configuration values in the config.php file and ensure that your server environment meets the required software versions.

## Conclusion
You have successfully set up the PHP/MySQL CRUD project and are now ready to utilize its functionalities. Refer to the project's documentation or source code for additional information on how to use specific features or customize the project according to your needs.

Enjoy coding and building your PHP/MySQL applications!
