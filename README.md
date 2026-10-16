# Learn at Home

A web-based academic management system designed to connect students, teachers, and academic office staff through a centralized platform for managing educational activities and resources.

> **Project History:** Originally developed in January 2023 as an academic software project.

## Project Overview

Learn at Home is an academic management system that allows students to access lecture notes, view assignments, and submit answer sheets. Teachers can upload learning materials, manage assignments, and evaluate student submissions, while academic officers and administrators can invite users via email.

## Features

### Student Portal

- View and download lecture notes.
- View assignments and their deadlines.
- Upload answer sheets for assignments.
- View marks awarded for submitted assignments.

### Teacher Portal

- Upload and manage lecture notes.
- Create and publish assignments.
- View students' submitted answer sheets.
- Evaluate submissions and assign marks.

### Academic Officer Portal

- Invite students to join the platform via email.
- Manage student-related academic activities.

### Admin Portal

- Invite teachers to join the platform via email.
- Invite academic officers via email.
- Manage access to the academic management system.

### Email Invitation System

- Send email invitations to students, teachers, and academic officers based on their roles.
- Send account login credentials, including email and password, to invited users via email.
- Support account access through role-based authentication.

## Technologies Used

- **PHP** - Backend development
- **MySQL** - Database management
- **HTML5** - Web page structure
- **CSS3** - Styling
- **JavaScript** - Client-side functionality
- **Bootstrap** - Responsive UI design
- **PHPMailer** - Email delivery and account invitations

## Installation and Setup

### Prerequisites

- XAMPP or another PHP development environment
- PHP
- MySQL
- Web browser

### Steps

1. Clone the repository:

   ```bash
   git clone https://github.com/sandeepkavinda/Learn-At-Home.git
   ```

2. Set up the database:
   - Open your preferred MySQL database management tool.
   - Create a database named `learnathome`.
   - Import and execute the SQL file located at `database/learn_at_home.sql`.

3. Start Apache and MySQL from the XAMPP Control Panel.

4. Configure the database connection:
   - Create a file named `config.php` in the project root directory.
   - Add the following configuration and update the credentials according to your local MySQL setup:

   ```php
    <?php
    define("DB_HOST", "localhost");
    define("DB_USER", "your_mysql_username");
    define("DB_PASSWORD", "your_mysql_password");
    define("DB_NAME", "learnathome");
    define("DB_PORT", "3306");
    ?>
   ```

5. Open the application in your browser:

   ```text
   http://localhost/learnAtHome/
   ```

## Configuration

Create a `config.php` file in the project root directory and configure the database connection using your local MySQL credentials.

```php
<?php
define("DB_HOST", "localhost");
define("DB_USER", "your_mysql_username");
define("DB_PASSWORD", "your_mysql_password");
define("DB_NAME", "learnathome");
define("DB_PORT", "3306");
?>
```

Replace the placeholder values with your local database credentials.

## Project Structure

```text
learn-at-home/
├── assignmentAnswers/
├── assignments/
├── database/
├── database/
├── images/
├── lesson_notes/
├── sources/
├── .gitignore
├── index.php
├── script.js
├── style.css
├── config.php (created locally)
├── README.md
└── ... (other PHP files)
```

Notes:

- assignmentAnswers/ — Stores students' uploaded answer sheets.
- assignments/ — Stores assignment files uploaded by teachers.
- database/ — Contains the SQL file for setting up the database.
- images/ — Stores images used by the application.
- lesson_notes/ — Stores uploaded lecture notes.
- sources/ — Contains supporting resources or source files.
- config.php — Contains local database credentials and should not be committed to GitHub.

## Project Objectives

- Simplify academic administration.
- Improve communication between students and teachers.
- Provide centralized access to learning resources.
- Support efficient management of academic activities.

## Author

**Sandeep Kavinda**

- LinkedIn: [@sandeepkavinda](https://www.linkedin.com/in/sandeepkavinda/)
- GitHub: [@sandeepkavinda](https://github.com/sandeepkavinda)

## 📄 License

This project is available for educational and portfolio purposes.
Add a license file if you intend to grant others permission to use, modify, or distribute the code.
