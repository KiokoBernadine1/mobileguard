# MobileGuard-How to install to localhost

A Mobile Guard System (MobileGuard) is a set of policies, procedures, and tools designed to ensure that security is integrated into the project development process. The goal of a MobileGuard is to reduce the risk of security breaches, protect sensitive data and systems, and maintain the trust of stakeholders.

## 1. Install XAMPP:

Download and install XAMPP from the Apache Friends website (https://www.apachefriends.org/index.html) according to your operating system.
Run the XAMPP installer and follow the on-screen instructions to complete the installation.

## 2. Start XAMPP:

Launch XAMPP from the installed location.
Start the Apache web server and MySQL database server by clicking on the "Start" buttons next to their respective services in the XAMPP control panel.

## 3. Import the SQL Database File:

Place the SQL database file that you want to import into a directory accessible by XAMPP. For example, the htdocs directory within the XAMPP installation folder (e.g., C:\xampp\htdocs on Windows or /opt/lampp/htdocs on Linux).
Open a web browser and access http://localhost/phpmyadmin to open the phpMyAdmin interface.

## 4 Create a Database:

In phpMyAdmin, click on the "Databases" tab.
Enter a name for the new database(it is recommended you name it MobileGuard) in the "Create database" field and click the "Create" button.

## 5. Import the SQL File:

Select the newly created database from the left-hand panel in phpMyAdmin.
Click on the "Import" tab.
Choose the SQL file to import by clicking the "Browse" button and selecting the file from your local directory(database file is located in the database folder in the project's root directory).
Leave the import settings as default or adjust them if needed.
Click the "Go" button to start the import process. The SQL file will be executed, creating the necessary tables and data in the selected database.

## 6. Place PHP Web Application Files:

Copy the PHP web application files into a directory within the htdocs folder. For example, create a new folder named "myapp" within htdocs and place the PHP files there.

## 7. Access the Web Application:

Open a web browser and type http://localhost/myapp (replace "myapp" with the actual folder name where your PHP files are located).
The PHP web application should now be accessible, and it can interact with the imported SQL database.
By following these steps, you should be able to run your PHP web application with the imported SQL database file using XAMPP on your localhost environment.
