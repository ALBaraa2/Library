# Library Management System

A web application for managing books, reviews, and user interactions in a library system. Built with Laravel, Tailwind CSS, and PostgreSQL.

---

## Features

- **User Authentication:**
  - Register, login, and logout functionality.
  - Authenticated users can add, edit, or delete reviews.
  - Option to post reviews anonymously.

- **Books Management:**
  - View a list of books with detailed information.
  - Search and filter books easily.

- **Review System:**
  - Add and manage reviews for books.
  - Star-based rating system.
  - Display of the total number of reviews for each book.

- **Responsive Design:**
  - Tailwind CSS ensures compatibility with various screen sizes.

---

## Tech Stack

### Backend
- **Framework:** Laravel 12
- **Database:** PostgreSQL

### Frontend
- **Styling:** Tailwind CSS, Bootstrap
- **JavaScript:** Vanilla JS

---

## Installation

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js and npm
- PostgreSQL

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/ALBaraa2/library-management-system.git
   cd library-management-system
   ```

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
