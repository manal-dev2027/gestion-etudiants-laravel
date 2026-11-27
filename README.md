# 🎓 Student Management System

A modern, responsive web application built with **Laravel** to simplify student record management. This project provides an organized interface for managing student information, user roles, and authentication.

## 🚀 Live Demo

🌐 **[View Student Management System](https://gestion-etudiants-laravel-production.up.railway.app)**

## 📂 GitHub Repository

💻 **[Explore the Source Code](https://github.com/manal-dev2027/gestion-etudiants-laravel)**

## ✨ Key Features

- 👨‍🎓 View and manage student records
- ➕ Add new students
- ✏️ Edit existing student information
- 🗑️ Delete student records
- 🔐 Secure authentication system
- 👥 Admin and User roles
- 📱 Responsive user interface
- 🌱 Database seeder with 8 fictional demo students

## 🛠️ Technologies & Tools

| Technology | Purpose |
|---|---|
| PHP | Backend programming |
| Laravel | Web application framework |
| MySQL | Database management |
| Blade | Server-side templates |
| Tailwind CSS | User interface styling |
| Alpine.js | Lightweight interactivity |

## ⚙️ Installation & Setup

Follow these steps to run the project locally.

**1. Clone the repository**

```bash
git clone https://github.com/manal-dev2027/gestion-etudiants-laravel.git
```

**2. Navigate to the project folder**

```bash
cd gestion-etudiants-laravel
```

**3. Install PHP dependencies**

```bash
composer install
```

**4. Install frontend dependencies**

```bash
npm install
```

**5. Create the environment file**

```bash
cp .env.example .env
```

**6. Generate the application key**

```bash
php artisan key:generate
```

**7. Configure your database**

Update your database credentials in the `.env` file.

**8. Run migrations and seed demo data**

```bash
php artisan migrate --seed
```

**9. Build frontend assets**

```bash
npm run build
```

**10. Start the development server**

```bash
php artisan serve
```

Open the local URL displayed in your terminal.

## 🌱 Demo Data

The project includes a database seeder that generates **8 fictional student records** for testing and demonstration.

To seed the database separately, run:

```bash
php artisan db:seed
```

## 📸 Screenshots

Explore the project screenshots in the portfolio repository:

🖼️ **[View Project Screenshots](https://github.com/manal-dev2027/gestion-etudiants-portfolio)**

## 👩‍💻 Author

**Manal**

GitHub: [@manal-dev2027](https://github.com/manal-dev2027)

---

<p align="center">Built with ❤️ using Laravel</p>
