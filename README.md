# 🛠️ Library Management Back-End

This is a **fully integrated back-end application** for a digital library management system.  
It was developed using **Laravel (PHP framework)** and provides a complete RESTful API along with **Blade-based web interfaces** for internal use.

The system supports **three main user roles** with different access levels:

- 👤 **User** – can browse, borrow, and return books  
- 👨‍💼 **Employee** – Limited powers 
- 🛡️ **Admin** – has full access to manage users, books, authors, categories, and system settings

---

## 🧩 Project Overview

The back-end handles the business logic and data storage of the system. It offers:

- Authentication and role-based authorization  
- Clean REST API for integration with front-end clients  
- Admin dashboard and employee interfaces built using **Blade templates**  
- Data validation and error handling  
- Centralized borrow/return logic  
- Secure communication via API tokens

---

## 🚻 User Roles

| Role     | Description                                                                 |
|----------|-----------------------------------------------------------------------------|
| **Admin**    | Full control: manage books, authors, users, borrow/return actions          |
| **Employee** | Approve or deny borrow requests, confirm returns                          |
| **User**     | Browse books, request to borrow or return, manage their own profile       |

---

## 🖥️ Interfaces

- **Blade Views**: Used for admin and employee dashboards  
- **API Endpoints**: Consumed by the front-end (built in Next.js)

---

## 📦 Technologies Used

- **Laravel** (v10+)  
- **Blade** – Laravel's built-in templating engine  
- **MySQL** – Relational database  
- **Sanctum** – For API authentication  
- **Spatie Laravel Permission** – Role & permission management  
- **Eloquent ORM** – Database interaction

---

## 🔐 Authentication & Authorization

- Users can register, log in, and access role-based features  
- Protected routes for employees and admins  
- API tokens issued via Laravel Sanctum

---

## 📁 Project Structure Highlights

- `routes/web.php` – Routes for Blade views (admin/employee)  
- `routes/api.php` – Routes for API consumed by front-end  
- `app/Http/Controllers` – API and view controllers  
- `resources/views` – Blade templates for admin and employee interfaces  
- `app/Models` – Eloquent models for users, books, authors, categories...

---

## ▶️ Running the Project

### 📥 Steps to Set Up and Run

```bash
# Clone the repository
git clone https://github.com/your-backend-repo-link
cd your-backend-folder

# Install dependencies
composer install

# Set environment variables
cp .env.example .env
php artisan key:generate

# Set up the database
# Create a database, then edit the .env file to include your DB info:
# DB_DATABASE=your_database
# DB_USERNAME=your_username
# DB_PASSWORD=your_password
php artisan migrate --seed

# Run the server
php artisan serve
```
##🧪 API Testing
You can use Postman or Insomnia to test the API.

Make sure to include the Sanctum token in headers for protected routes.

##📄 License
This project is licensed under the MIT License.
