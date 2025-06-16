# Library Management System 📚

A modern Library Management System built with **Laravel**, **PostgreSQL**, and **Tailwind CSS**. This web application enables users to browse, borrow, and review books with ease. Designed for book lovers, it features a clean, responsive interface and robust functionality.

---

## 🚩 Features

- **User Authentication**
   - Secure registration and login.
   - Password-protected access to advanced features.
   - Option to submit anonymous reviews.

- **Books Management**
   - Browse all books with detailed information.
   - Borrow books and track reading status (`reading` or `completed`).
   - Powerful search and filtering.

- **Review System**
   - Add, edit, and delete book reviews.
   - Star-based rating.
   - See the total number of reviews per book.

- **Responsive Design**
   - Styled with **Tailwind CSS** and **Bootstrap**.
   - Fully responsive for desktop and mobile.

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12 (PHP >= 8.1)
- **Frontend:** Tailwind CSS, Bootstrap
- **Database:** PostgreSQL
- **Other Tools:** Composer, JavaScript

---

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & npm
- PostgreSQL

### Installation

1. **Clone the repository**
    ```bash
    git clone https://github.com/ALBaraa2/Library.git
    cd Library
    ```

2. **Install dependencies**
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Configure environment**
    ```bash
    cp .env.example .env
    ```
    Edit `.env` and set your database credentials:
    ```env
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. **Run migrations and seeders**
    ```bash
    php artisan migrate --seed
    ```

5. **Start the development server**
    ```bash
    php artisan serve
    ```

6. **Access the app**
    Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## 👥 Usage

- **Admin Dashboard:** Manage books and reviews.
- **Users:** Browse, borrow, and review books. Optionally submit reviews anonymously.

---

## 🤝 Contributing

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Submit a pull request.

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

## ✨ Author

- **ALBaraa ALSaiqali**

