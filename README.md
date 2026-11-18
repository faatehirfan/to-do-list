# Laravel To-Do-List

A clean, responsive task management application built with Laravel and styled with Tailwind CSS.

## Project Overview

Laravel To-Do-List is a straightforward task management web application designed to help organize, track, and manage daily tasks efficiently. 

---

## Requirements

- **PHP** >= 8.3 
- **Composer** (PHP package manager)
- **Node.js** (LTS version) & **npm**
- *(Optional)* **Laravel Herd** (for fast local development on macOS/Windows)

---

## Installation

Follow these steps to set up and run the project locally:

### 1. Clone the Repository
```bash
git clone <repository-url>
cd to-do-list
```

### 2. Install Backend & Frontend Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Configuration
Copy the sample environment file and generate a unique application key:
```bash
# Windows (PowerShell / Command Prompt)
copy .env.example .env

# Linux / macOS
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup & Migrations
The application is pre-configured to use SQLite by default:
```bash
# Ensure the SQLite database file exists (if not already created)
# Windows (PowerShell):
New-Item -ItemType File -Path database/database.sqlite -Force

# Linux / macOS:
touch database/database.sqlite

# Run database migrations
php artisan migrate
```

### 5. Build Frontend Assets
Compile the Tailwind CSS styles with Vite:
```bash
# For production build:
npm run build

# Or run the dev server for hot-reloading:
npm run dev
```

### 6. Run the Application

You can serve the application using either of the following methods:

#### Option A: Using Laravel Herd (Recommended)
If you use **Laravel Herd**, the application is automatically served at:
```
http://to-do-list.test
```

#### Option B: Using Artisan Serve
Run the built-in PHP development server:
```bash
php artisan serve
```
Then visit the application in your browser at:
```
http://localhost:8000
```
