# 🌟 barber-shop-app

This is a fully ready to use web application for Barbershop developed using Laravel.

## 📦 Technologies

- Laravel 12.x
- PHP 8.x
- Blade templating
- Bootstrap

## 🚀 Installation

You can run the project in a local environment through the following steps:

### 1. Clone Repository

```bash
git clone https://github.com/byfozil/barber-shop-app.git
```

### 2. Go to Project

```bash
cd barber-shop-app
```

### 3. Create .env file

```bash
cp .env.example .env
```
Then fill in the database configurations in the .env file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=barber-shop-app
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Install Composer if it's not on your Computer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
```

### 5. Install Libraries

```bash
php composer.phar install
```

### 6. Creating Laravel keys

```bash
php artisan key:generate
```

### 7. Database migration with seeder

```bash
php artisan migrate --seed
```

### 8. Starting the server

```bash
php artisan serve
```
You can view the project by visiting http://localhost:8000 in your browser.

## 📬 Contact

- 📧 Email: [support@yuldoshew.uz](mailto:support@yuldoshew.uz)
- 🐙 GitHub: [@byfozil](https://github.com/byfozil)

## 🚀 Deployment

- [barbershop.yuldoshew.uz](https://barbershop.yuldoshew.uz)

📦 You're free to use it for personal purposes, but please credit my GitHub or portfolio address as the source.
