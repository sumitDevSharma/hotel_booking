<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.



# Hotel Booking System

A **Hotel Booking System** built using Laravel, designed to provide a seamless platform for customers to search, book, and manage hotel reservations. This system includes features like room availability, booking confirmation, payment integration, and user account management, all with a responsive and user-friendly interface.

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Building Front-end Assets](#building-front-end-assets)
- [Usage](#usage)
- [Testing](#testing)

---

## Features

- **User Authentication:** Includes registration and login functionality using Laravel’s authentication scaffolding.
- **Room Search and Availability:** Allows users to search for available rooms based on location, dates, and preferences.
- **Booking Management:** Users can book rooms, view booking history, and manage reservations.

---

## Prerequisites

Ensure you have the following installed before proceeding with the installation:

- **PHP** >= 8.2
- **Composer** (Dependency Manager)
- **Laravel** >= 11.x
- **MySQL** (or any database supported by Laravel)
- **Node.js** and **npm** (for managing front-end dependencies)
- **Git** (for version control)

---

## Installation

To set up the application on your local machine, follow these steps:

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/sumitDevSharma/hotel_booking.git
   cd hotel_booking
   ```

2. **Install Backend Dependencies:**

   Use Composer to install the Laravel dependencies:

   ```bash
   composer install
   ```

3. **Install Frontend Dependencies:**

   Install Node.js packages and dependencies:

   ```bash
   npm install
   ```

---

## Configuration

1. **Environment Configuration:**

   Copy the example environment configuration file:

   ```bash
   cp .env.example .env
   ```

2. **Generate the Application Key:**

   This key is used to encrypt sensitive data:

   ```bash
   php artisan key:generate
   ```

---

## Database Setup

1. **Database Configuration:**

   Open the `.env` file and configure the database settings:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hotel_booking
   DB_USERNAME=root
   DB_PASSWORD=yourpassword
   ```

2. **Run Database Migrations:**

   Run the following command to create the database tables:

   ```bash
   php artisan migrate
   ```

3. **Database Seeding (Optional):**

   You can populate the database with sample data:

   ```bash
   php artisan db:seed
   ```

---

## Running the Application

After installation and configuration, you can run the application:

1. **Start Laravel Development Server:**

   ```bash
   php artisan serve
   ```

   This will start the application at `http://localhost:8000`.

---

## Building Front-end Assets

To compile and optimize the front-end assets (CSS, JS):

1. **Development Build:**

   For local development, use:

   ```bash
   npm run dev
   ```

2. **Production Build:**

   For production environments:

   ```bash
   npm run build
   ```

---

## Usage

After installation:

1. **Access the Application:**

   Open your browser and visit `http://localhost:8000`.

2. **User Registration:**

   Register a new account or log in using your credentials.

3. **Task Management:**

   - Create new tasks, assign them to users, and manage the status.
   - Admins can monitor progress and modify tasks as needed.

---

## Testing

Run the automated test suite to ensure the application's functionality:

```bash
php artisan test
```

The application includes both unit and feature tests to verify the behavior of key components.

---



