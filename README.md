<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# RE-Mentor

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A comprehensive mentoring platform built with Laravel that integrates seamlessly with Google Classroom to streamline student enrollment, course management, and administrative tasks.

![RE-Mentor Banner](https://via.placeholder.com/800x200?text=RE-Mentor+Banner) <!-- Replace with actual banner image URL -->

## Table of Contents

- [Short Description](#short-description)
- [Screenshots](#screenshots)
- [Key Features](#key-features)
- [Tech Stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Code Snippets](#code-snippets)
- [Contributing](#contributing)
- [License](#license)
- [Authors](#authors)

## Short Description

RE-Mentor is a robust web application designed to facilitate mentoring programs by automating enrollment processes and integrating with Google Classroom. It provides a user-friendly interface for students to register, mentors to manage courses, and administrators to oversee the entire system. Built with Laravel, it ensures scalability, security, and ease of maintenance.

## Screenshots

<!-- Add screenshots here. For example: -->
<!-- ![Landing Page](screenshots/landing.png) -->
<!-- ![Dashboard](screenshots/dashboard.png) -->
<!-- ![Enrollment Form](screenshots/enrollment.png) -->

<img width="1900" height="931" alt="Screenshot (30)" src="https://github.com/user-attachments/assets/3f82ff2b-4c3b-4029-a975-d5328f1786cc" />
</br>
</br>
<img width="1920" height="946" alt="Screenshot (31)" src="https://github.com/user-attachments/assets/14734f72-dd32-43e8-8b03-6b0192f8eadd" />
</br>
</br>

<img width="1899" height="923" alt="Screenshot (32)" src="https://github.com/user-attachments/assets/77bf5afe-c8c5-4595-b1cc-49465c85e24f" />
</br>
</br>
<img width="1920" height="934" alt="Screenshot (33)" src="https://github.com/user-attachments/assets/c9f18e17-7f16-4e8b-9b25-dbf3b28e65e6" />
</br>
</br>
<img width="1920" height="954" alt="Screenshot (34)" src="https://github.com/user-attachments/assets/7d4df3cf-2459-43b9-888b-499c3a3a3044" />

*Note: Screenshots will be added here. Please capture and upload images of key pages like the landing page, user dashboard, and admin panel.*

## Key Features

- **User Authentication**: Secure login and registration system with role-based access.
- **Enrollment Management**: Streamlined application process for students with approval workflow.
- **Google Classroom Integration**: Automatic course creation and student invites via Google API.
- **Admin Dashboard**: Comprehensive panel for managing users, enrollments, and system settings.
- **Profile Management**: Users can update personal information and change passwords.
- **Email Notifications**: Automated emails for application confirmations and updates.
- **Responsive Design**: Mobile-friendly interface using modern CSS and JavaScript.

## Tech Stack

- **Backend**: Laravel 10.x (PHP Framework)
- **Frontend**: Blade Templates, CSS, JavaScript (with Vite for asset compilation)
- **Database**: MySQL (via Laravel's Eloquent ORM)
- **Authentication**: Laravel Sanctum for API authentication
- **External APIs**: Google Classroom API (via google/apiclient)
- **Email**: Laravel Mail with configurable drivers
- **Testing**: Pest PHP for unit and feature tests
- **Deployment**: Compatible with standard Laravel deployment methods

## Prerequisites

Before installing RE-Mentor, ensure you have the following installed on your system:

- PHP >= 8.1
- Composer (PHP dependency manager)
- Node.js >= 14.x and npm (for frontend assets)
- MySQL or another supported database
- Git (for cloning the repository)

## Installation

Follow these steps to set up RE-Mentor locally:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/re-mentor.git
   cd re-mentor
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies:**
   ```bash
   npm install
   ```

4. **Environment setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup:**
   ```bash
   # Create a MySQL database and update .env with database credentials
   php artisan migrate
   php artisan db:seed  # If seeders are available
   ```

6. **Build assets:**
   ```bash
   npm run build
   # Or for development: npm run dev
   ```

7. **Start the application:**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

## Configuration

### Environment Variables

Configure the following critical environment variables in your `.env` file:

- **Database Configuration:**
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=re_mentor
  DB_USERNAME=your_db_username
  DB_PASSWORD=your_db_password
  ```

- **Google Classroom Integration:**
  ```
  GOOGLE_CLIENT_ID=your_google_client_id
  GOOGLE_CLIENT_SECRET=your_google_client_secret
  GOOGLE_REDIRECT_URI=http://localhost:8000/google/callback
  GOOGLE_CLASSROOM_FULL_ID=your_classroom_course_id
  ```

  *Note: Obtain these from the Google Cloud Console. Ensure the Classroom API is enabled.*

- **Mail Configuration:**
  ```
  MAIL_MAILER=smtp
  MAIL_HOST=your_smtp_host
  MAIL_PORT=587
  MAIL_USERNAME=your_email_username
  MAIL_PASSWORD=your_email_password
  MAIL_ENCRYPTION=tls
  MAIL_FROM_ADDRESS=noreply@rementor.com
  MAIL_FROM_NAME="RE-Mentor"
  ```

- **Application URL:**
  ```
  APP_URL=http://localhost:8000
  ```

## Usage

1. **Access the Application:** Navigate to the application URL in your browser.

2. **User Registration:** New users can register via the `/register` route.

3. **Login:** Existing users log in via the `/login` route.

4. **Dashboard:** After login, users are redirected to their personalized dashboard.

5. **Enrollment:** Students can submit enrollment applications, which admins can approve via the `/enrollees` route.

6. **Google Classroom Sync:** Admins can connect Google Classroom accounts and automate course invites.

7. **Profile Management:** Users can update their profiles via the `/profile` route.

*Default Admin Account (if seeded):* `admin@example.com` / `password`

## Code Snippets

<!-- Add your project snippets here -->

*Note: This section is reserved for highlighting interesting code snippets from your project. For example, you could add snippets showing the Google Classroom integration logic, enrollment approval workflow, or custom middleware.*

## Contributing

We welcome contributions to RE-Mentor! To contribute:

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-feature-name`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/your-feature-name`
5. Open a Pull Request.

Please ensure your code follows Laravel coding standards and includes appropriate tests.


## Authors

- **Shinzuo** - *Junior Web Developer* - [GitHub](https://github.com/Shin-zuo) | [LinkedIn](https://linkedin.com/in/your-profile)

*Replace placeholders with actual information as needed.*
