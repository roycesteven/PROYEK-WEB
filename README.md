# IndoSuroboyo — Car Rental Web App

A full-stack car rental web application built with plain PHP and MySQL for a university web programming course project. It provides a public storefront for browsing and renting cars, a customer flow for checkout and order tracking, and an admin panel for managing the vehicle fleet and rental orders.

## Features

**Customer**
- Browse available cars with details (year, fuel type, category, daily rate)
- Register / log in and manage a user profile
- Complete renter (`penyewa`) verification (NIK, address, contact info) before ordering
- Add cars to a cart and check out with a rental period
- View order confirmation and rental history/transactions
- Track order status (e.g. unpaid, ongoing, returned)

**Admin**
- Manage the car catalog (add, edit, upload images, remove)
- Review and manage incoming orders
- Handle car pick-up and return (`return-car.php`) with status updates
- Manage user accounts

## Tech Stack

- **Backend:** PHP (procedural, PDO for database access)
- **Database:** MySQL / MariaDB
- **Frontend:** HTML, CSS, vanilla JS, [AOS](https://michalsnik.github.io/aos/) (scroll animations), Animate.css
- **Architecture:** Simple page-per-feature structure with a lightweight `controller/` folder for request handling (add-to-cart, checkout, return car)

## Project Structure

```
.
├── Asset/                     Images and static libraries (AOS, Animate.css)
├── controller/                 Server-side action handlers (cart, order, return-car)
├── connection.php              PDO database connection config
├── index.php                   Landing page
├── login.php / register.php    Authentication
├── produk-list.php             Car listing
├── produk-details.php          Car detail page
├── carts.php / order-form.php  Cart and checkout flow
├── confirmation.php            Order confirmation
├── user*.php                   Customer profile, transactions, order history
├── admin*.php                  Admin dashboard, car & order management
├── kelengkapan.php             Renter (penyewa) data completion form
├── project.sql                 Initial database schema/seed dump
└── db_proyek_updateKev.sql     Updated database schema/seed dump
```

## Database

The app uses a MySQL database with the following core tables:

| Table             | Purpose                                              |
|--------------------|-------------------------------------------------------|
| `user`             | Login accounts                                       |
| `penyewa`          | Renter profile (NIK, name, address, contact info)    |
| `mobil`            | Car catalog (name, year, fuel, category, daily rate) |
| `header_pesanan`   | Order header (renter, total bill, status, rental dates) |
| `detail_pesanan`   | Order line items (car, daily rate per order)         |

Two SQL dumps are included: `project.sql` (initial schema) and `db_proyek_updateKev.sql` (updated schema). Import the latter for the most up-to-date structure.

## Getting Started

### Prerequisites
- PHP 7.4+ with the `pdo_mysql` extension
- MySQL or MariaDB
- A local server stack such as [XAMPP](https://www.apachefriends.org/) / [Laragon](https://laragon.org/), or the PHP built-in server

### Setup

1. Clone the repository into your server's web root:
   ```bash
   git clone https://github.com/roycesteven/PROYEK-WEB.git
   ```
2. Create a database and import the schema:
   ```bash
   mysql -u root -p -e "CREATE DATABASE db_proyek_updatekev"
   mysql -u root -p db_proyek_updatekev < db_proyek_updateKev.sql
   ```
3. Configure the database credentials in [`connection.php`](connection.php) if they differ from the defaults:
   ```php
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $database = 'db_proyek_updatekev';
   ```
4. Serve the app, e.g. with the PHP built-in server from the project root:
   ```bash
   php -S localhost:8000
   ```
5. Open `http://localhost:8000` in your browser.

## License

This project is licensed under the [GNU General Public License v3.0](LICENSE).
