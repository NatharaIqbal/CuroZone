# CuroZone

CuroZone - Institute Information Management System

CuroZone is a comprehensive web application tailored for managing information within the Curo Institute. It caters to a diverse array of users, including Program Managers, Coordinators, Lecturers, and Students. Each user role is equipped with specific functionalities to streamline information management processes within the institute.

## Features

### Program Manager
- Add, view, and manage Coordinators, Lecturers, and Students
- Add, view, and manage Departments, Courses, and Batches
- Add, view, and manage Assignments and Exams
- Add, view, and manage Graduation Schedules
- View Class Schedules
- View Results of Students
- View Noticeboard
- Message with Coordinators and Lecturers

### Coordinator
- View and manage Students
- View and manage Batches
- View and manage Assignments and Exams
- Add, view, and manage Class Schedules
- Add, view, and manage the Results of Students
- View Course Modules
- Add, view, and manage Course Guidelines
- Add Notices, view, and manage Noticeboard
- Message with Program Manager, Other Coordinators, and Lecturers
- Receive Feedbacks from Students

### Lecturer
- View Students
- View Graduation Schedules
- View Assignments and Exams
- View Class Schedules
- Add, view, and manage the Results of Students
- View Course Modules
- View Course Guidelines
- View Noticeboard
- Message with Program Manager and Coordinators

### Student
- Pay course fees and check payment status
- View graduation schedule
- Access exam schedules and admissions information
- Access assignment schedules, assignments, and submission mechanisms
- Access class schedules
- View results
- Access course modules
- Access course materials and guidelines
- View Noticeboard
- Message coordinators and lecturers
- Access contact details
- Provide feedback to coordinators

## Technologies Used
- HTML
- CSS
- JavaScript
- PHP
- MySQL

## Usage

To utilize CuroZone effectively, users need to follow these steps:

1. Server Setup: You need a web server software installed on your machine. Apache and Nginx are popular choices. Additionally, you need PHP installed. You can install these separately or use pre-packaged solutions like XAMPP, WAMP, or MAMP, which include Apache, MySQL, and PHP in a single package.

2. File Structure: Organize your PHP files within your web server's document root directory. This is typically htdocs for XAMPP and WAMP, and /var/www/html for Apache on Linux systems. Ensure your PHP files have a .php extension.

3. Start Server: Start your web server. If you're using XAMPP, WAMP, or MAMP, you can do this via their control panels. Otherwise, you can start Apache using terminal/command prompt.

4. Access Your Application: Once your server is running, you can access your application by typing localhost in your web browser's address bar followed by the path to your PHP files.

For example, if your PHP file is named index.php and located directly within the document root, you can access it at http://localhost/index.php.

Remember, PHP is a server-side scripting language, so it won't run just by opening the file in a browser like HTML and JavaScript. You need to access it through a web server.

Additionally, ensure your PHP code is secure, especially if it interacts with a database. Use parameterized queries to prevent SQL injection, validate user input, and sanitize output to prevent XSS attacks.
