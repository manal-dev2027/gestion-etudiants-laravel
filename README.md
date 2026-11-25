# Student Management System

A web-based Student Management System built with Laravel.

## Live Demo

https://gestion-etudiants-laravel-production.up.railway.app

## GitHub Repository

https://github.com/manal-dev2027/gestion-etudiants-laravel

## Features

- Student listing and details
- Create, edit and delete student records
- Admin and User roles
- Authentication system
- Responsive user interface
- Database seeder with 8 fictional demo students

## Technologies Used

- PHP
- Laravel
- MySQL
- Blade
- Tailwind CSS
- Alpine.js

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/manal-dev2027/gestion-etudiants-laravel.git
   ```

2. Open the project folder:

   ```bash
   cd gestion-etudiants-laravel
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Install frontend dependencies:

   ```bash
   npm install
   ```

5. Create the environment file:

   ```bash
   cp .env.example .env
   ```

6. Generate the application key:

   ```bash
   php artisan key:generate
   ```

7. Configure your database settings in `.env`.

8. Run migrations and seed demo data:

   ```bash
   php artisan migrate --seed
   ```

9. Build frontend assets:

   ```bash
   npm run build
   ```

10. Start the development server:

   ```bash
   php artisan serve
   ```

## Demo Data

The project includes a database seeder that creates 8 fictional students.

To seed the database:

```bash
php artisan db:seed
```

## Screenshots

Project screenshots are available here:

https://github.com/manal-dev2027/gestion-etudiants-portfolio

## Author

Manal

