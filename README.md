# 📦 Core PHP Inventory & Billing Management System

A comprehensive, fully functional Inventory and Sales Management System built entirely with Core PHP and MySQL. This application is designed to handle everything from user authentication and product categorization to real-time stock tracking and automated bill generation.

## ✨ Core Features & Modules

Based on the project architecture, this system includes the following integrated modules:

*   **🔐 Authentication & Admin Management:** Secure access via `login.php`. Includes features to add, view, and delete administrators (`addadmin.php`, `alladmin.php`), along with profile management (`editprofile.php`, `changepassword.php`).
*   **📂 Catalog Management:** Dynamic creation, editing, and deletion of Categories (`addcategory.php`, `categoryedit.php`) and Subcategories (`addsubcategory.php`, `getsubcat.php`).
*   **📦 Product & Stock Tracking:** Complete product lifecycle management (`product.php`, `productedit.php`). Crucially, it features an `outofstock.php` module for real-time low-inventory alerts.
*   **🛒 Purchase & Supply Chain:** Tracks incoming inventory. Features daily/monthly tracking (`purchase.php`, `monthlypurchase.php`, `totalpurchase.php`) and final purchase validation (`finalpurchase.php`).
*   **📈 Sales & Order Management:** Comprehensive sales tracking (`sell.php`, `monthlysell.php`, `totalsell.php`) to monitor revenue and outgoing stock.
*   **🧾 Automated Invoicing:** Built-in billing engine to automatically generate purchase and sales invoices (`billgenerate.php`, `sellbill.php`, `billgeneratesell.php`).
*   **📊 Interactive Dashboard & UI:** Features a central `dashboard.php` with modular UI components like `topnavbar.php` and `sidenavbar.php` for seamless navigation. Data is dynamically rendered using `table.php`.

## 🛠️ Tech Stack
*   **Backend:** Core PHP
*   **Database:** MySQL (Connected via `dbcon.php`)
*   **Frontend:** HTML, CSS, JavaScript (Dynamic fetching via AJAX/PHP)

## 🚀 Setup & Installation Guide

Follow these simple steps to run the application on your local machine using XAMPP/WAMP:

**Step 1: Download & Extract**
Download the project folder and extract it. Move the entire folder into your local server's root directory:
*   For XAMPP: Move to `C:\xampp\htdocs\your-folder-name`
*   For WAMP: Move to `C:\wamp\www\your-folder-name`

**Step 2: Start the Local Server**
Open the XAMPP/WAMP Control Panel and start the **Apache** and **MySQL** services.

**Step 3: Database Setup**
1. Open your web browser and go to `http://localhost/phpmyadmin/`.
2. Create a new database for the project (e.g., `inventory_db`).
3. Import the provided `.sql` database export file into this newly created database.

**Step 4: Configure Database Connection**
Open the `dbcon.php` file in any code editor (like VS Code) and verify the database credentials. Ensure the `$dbname` matches the exact name of the database you created in Step 3. 
*(Default local credentials are usually: user: `root`, password: `[blank]`)*

**Step 5: Launch the Application**
Open your web browser and navigate to the project directory to access the login panel:
`http://localhost/your-folder-name/login.php`

---
*Developed & Documented with 🛠️ by Rohan | Cloud & Infrastructure Engineer*
