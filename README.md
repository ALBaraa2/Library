# Library Management System 📚

A full-featured Library Management System built with **Laravel**, **PostgreSQL**, and **Tailwind CSS**. This application allows users to browse, borrow, and review books seamlessly. It's designed with a responsive and user-friendly interface for all book enthusiasts.

---

## 🌟 Features

### 🔒 User Authentication
- User registration and login.
- Password-protected access to advanced features.
- Option for users to remain anonymous while reviewing books.

### 📖 Books Management
- View all books with detailed descriptions.
- Borrow books with status tracking: `reading` or `completed`.
- Search and filter books efficiently.

### ⭐ Review System
- Add, edit, and delete reviews for books.
- Star-based rating system.
- Display the total number of reviews for each book.

### 🌍 Responsive Design
- Beautifully styled with **Tailwind CSS**.
- Fully responsive for desktop and mobile devices.

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP >= 8.1
- **Frontend:** Tailwind CSS, Bootstrap
- **Database:** PostgreSQL
- **Other Tools:** Composer, JavaScript

---

## 🚀 Installation

### Prerequisites
- PHP >= 8.1
- Composer
- JavaScript
- PostgreSQL

### Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/ALBaraa2/Library.git
   cd Library

2. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```

3. Set up the `.env` file:
   ```bash
   cp .env.example .env
   ```
   Update the following variables in the `.env` file to match your setup:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

5. Start the development server:
   ```bash
   php artisan serve
   ```

6. Visit the application at:
   [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Usage

1. **Admin Dashboard:**
   - Manage books and their reviews.
2. **Users:**
   - Browse books.
   - Add and manage their reviews.
   - Option to remain anonymous when submitting reviews.

---

## Contribution

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Submit a pull request.

---

## Author

- **AlBaraa ALSaiqali** 
