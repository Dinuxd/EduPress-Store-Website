# EduPress Store Website

EduPress is a PHP and MySQL stationery store website with product browsing, cart checkout, user login, admin order management, and document upload support for print jobs.

## Features

- Product listing and product detail pages
- Cart checkout flow with print job support
- User registration and login
- Admin panel for orders, shipping status, products, and print jobs
- Local file upload folder for print documents
- Demo payment screen for project presentation only

## Tech Stack

- PHP
- MySQL
- HTML, CSS, and JavaScript

## Setup

1. Create a MySQL database named `edupress_db`.
2. Import or create the required tables for users, products, orders, order items, and print jobs.
3. Place the project in your local PHP server directory, such as XAMPP `htdocs`.
4. Set database environment variables if your local database is not using the defaults:

```text
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_NAME=edupress_db
```

The app defaults to `localhost`, `root`, an empty password, and `edupress_db` for easy local setup.

## Notes

- Uploaded print documents are stored in `uploads/` and are ignored by git.
- The payment page is a demo screen and should not be used for real card processing.
- Admin access is controlled by the account email `admin@edupress.lk`.

