# User Authentication System

This is a simple user authentication system built with PHP and MySQL. Users can register as either regular users or administrators. The system securely stores passwords using the password_hash() function and verifies passwords during login using password_verify().

## Features

- User registration with email, password, and user type (user or admin)
- Admin access code validation for admin registration
- Secure password storage and verification
- User login with email and password
- Separate dashboard pages for users and administrators

## Requirements

- PHP
- MySQL
- Web server (e.g., Apache, Nginx)
- Browser with JavaScript enabled

## Setup

1. Clone the repository:

   ```bash
    git clone https://github.com/yogeshbca/MotionCut_Task2_Registration.git


2. Import the database schema from the `database.sql` file into your MySQL database.

3. Update `config.php` with your MySQL database credentials:

4. Configure your web server to serve the project files (e.g., using Apache's DocumentRoot or Nginx's root directive).

5. Access the project in your browser (e.g., http://localhost/user-authentication-system).

## Usage
1. Register as a new user or admin using the registration form.
2. Log in using your email and password.
3. Access the respective dashboard page (admin_page.php for administrators, user_page.php for users) after successful login.

## License
This project is licensed under the MIT License.

Feel free to customize and use this authentication system for your own projects.

