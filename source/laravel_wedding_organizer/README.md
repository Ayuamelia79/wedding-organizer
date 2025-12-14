# 💒 Wedding Organizer System

A comprehensive wedding management system built with Laravel 12 and Tailwind CSS. This application provides separate dashboards for administrators and customers (pengantin) to manage wedding packages, bookings, and events.

![Laravel](https://img.shields.io/badge/Laravel-12.36-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4-blue?style=flat-square&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38bdf8?style=flat-square&logo=tailwindcss)

---

## 📋 Table of Contents

- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Database Setup](#-database-setup)
- [Running the Application](#-running-the-application)
- [User Roles & Access](#-user-roles--access)
- [Routes Overview](#-routes-overview)
- [Project Structure](#-project-structure)
- [Screenshots](#-screenshots)
- [Development](#-development)
- [Contributing](#-contributing)
- [License](#-license)

---

## ✨ Features

### 👨‍💼 Admin Features
- **Dashboard Analytics**: View comprehensive statistics including total packages, bookings, customers, and revenue
- **Package Management**: Create, read, update, and delete wedding packages with pricing and descriptions
- **Booking Management**: Manage customer bookings with status tracking (pending, confirmed, cancelled)
- **Customer Overview**: View all registered customers and their booking history
- **Popular Packages**: Track most booked packages
- **Recent Activity**: Monitor latest bookings and transactions

### 👰 Pengantin (Customer) Features
- **User Registration & Login**: Secure authentication system
- **Personal Dashboard**: View personalized dashboard with booking information
- **Package Browsing**: View available wedding packages
- **Booking History**: Track booking status and details
- **Profile Management**: Update personal information
- **Payment Tracking**: Monitor payment status

### 🔐 General Features
- **Role-Based Access Control**: Separate admin and customer access with middleware protection
- **Responsive Design**: Beautiful Tailwind CSS UI that works on all devices
- **Email Verification**: Optional email verification for enhanced security
- **Session Management**: Secure session handling
- **CSRF Protection**: Built-in Laravel security features

---

## 🛠️ Tech Stack

| Technology | Version | Purpose |
|-----------|---------|---------|
| **Laravel** | 12.36 | PHP Framework |
| **PHP** | 8.4.1 | Backend Language |
| **MySQL** | 8.x | Database |
| **Tailwind CSS** | 3.x | CSS Framework |
| **Vite** | 5.x | Frontend Build Tool |
| **Alpine.js** | - | Lightweight JS Framework |

---

## 📦 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** >= 8.2 (8.4 recommended)
- **Composer** >= 2.x
- **Node.js** >= 18.x & npm
- **MySQL** >= 8.x or MariaDB >= 10.x
- **Git**

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone <your-repository-url>
cd laravel_wedding_organizer
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## ⚙️ Configuration

### Database Configuration

Edit `.env` file and configure your database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_organizer
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Application Configuration

```env
APP_NAME="Wedding Organizer"
APP_ENV=local
APP_KEY=base64:YOUR_GENERATED_KEY
APP_DEBUG=true
APP_URL=http://localhost:8000
```

### Optional: Email Configuration

For email verification feature:

```env
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@weddingorganizer.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## 💾 Database Setup

### 1. Create Database

```bash
mysql -u root -p
CREATE DATABASE wedding_organizer;
EXIT;
```

### 2. Run Migrations

```bash
php artisan migrate
```

### 3. Seed Database (Optional but Recommended)

This will create sample data including an admin account:

```bash
php artisan db:seed
```

**Default Admin Credentials:**
- Email: `admin`
- Password: `1234`

### 4. Fresh Installation (Clean Start)

If you want to start fresh:

```bash
php artisan migrate:fresh --seed
```

---

## 🏃 Running the Application

### 1. Build Frontend Assets

For development:
```bash
npm run dev
```

For production:
```bash
npm run build
```

### 2. Start Laravel Server

```bash
php artisan serve
```

The application will be available at: **http://127.0.0.1:8000**

### 3. Access the Application

- **Admin Login**: http://127.0.0.1:8000/admin/login
- **Customer Login**: http://127.0.0.1:8000/pengantin/login
- **Customer Register**: http://127.0.0.1:8000/pengantin/register

---

## 👥 User Roles & Access

### Admin Role
- **Access**: Admin dashboard, package management, booking management
- **URL Prefix**: `/admin/*`
- **Middleware**: `auth`, `verified`, `role:admin`

### Pengantin (Customer) Role
- **Access**: Customer dashboard, package browsing, booking
- **URL Prefix**: `/pengantin/*`
- **Middleware**: `auth`, `role:pengantin`

---

## 🗺️ Routes Overview

### Public Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | `/` | Home (redirects based on auth) |

### Admin Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | `/admin/login` | Admin login page |
| POST | `/admin/login` | Admin login action |
| POST | `/admin/logout` | Admin logout |
| GET | `/admin/dashboard` | Admin dashboard |
| CRUD | `/admin/paket` | Package management |
| CRUD | `/admin/pemesanan` | Booking management |

### Pengantin (Customer) Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | `/pengantin/login` | Customer login |
| POST | `/pengantin/login` | Customer login action |
| GET | `/pengantin/register` | Customer registration |
| POST | `/pengantin/register` | Customer registration action |
| POST | `/pengantin/logout` | Customer logout |
| GET | `/dashboard-pengantin` | Customer dashboard |

### Shared Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | `/profile` | Edit profile |
| PATCH | `/profile` | Update profile |
| DELETE | `/profile` | Delete account |

---

## 📁 Project Structure

```
laravel_wedding_organizer/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdminAuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── PaketController.php
│   │   │   ├── PemesananController.php
│   │   │   └── PengantinAuthController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Paket.php
│   │   ├── Pemesanan.php
│   │   └── Pengantin.php
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   └── factories/
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── admin/
│       │   ├── login.blade.php
│       │   └── dashboard.blade.php
│       ├── auth/
│       │   ├── pengantin-login.blade.php
│       │   └── pengantin-register.blade.php
│       └── pengantin/
│           └── dashboard.blade.php
├── routes/
│   └── web.php
├── .env.example
├── composer.json
├── package.json
└── README.md
```

---

## 🖼️ Screenshots

*Screenshots will be added here showcasing:*
- Admin Login
- Admin Dashboard
- Package Management
- Customer Registration
- Customer Dashboard
- Responsive Design

---

## 🔧 Development

### Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Run Tests

```bash
php artisan test
```

### Code Style

This project follows PSR-12 coding standards.

### Watch Assets (Development)

```bash
npm run dev
```

This will watch for changes in your CSS/JS files and recompile automatically.

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 📧 Contact

For questions or support, please contact:
- **Project Maintainer**: Your Name
- **Email**: your.email@example.com

---

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com)
- Styled with [Tailwind CSS](https://tailwindcss.com)
- Icons from [Heroicons](https://heroicons.com)

---

<p align="center">Made with ❤️ for managing beautiful weddings</p>

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
