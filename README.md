# 🎬 MangaVerse

**MangaVerse** is an online manga reading platform built using **PHP, MySQL, HTML, CSS, and JavaScript**.  
It offers a smooth, interactive experience for manga lovers with features like email verification, favorites, and a user dashboard. You can update your fav Manga's according to your favourites. Do make according changes once updated.
Index.php is the Main page.

## 🌟 Features
- User registration & login (PHPMailer)
- Manga reading via Google Drive links
- Like & Favorite manga
- Profile management
- Suggestion box for requests/feedback

## 🛠️ Tech Stack
PHP | MySQL | HTML | CSS | JavaScript

## 🚀 Local Setup
1. Clone repo: `git clone git@github.com:suryanair-ds/MangaVerse.git`
2. Move to local server (XAMPP/WAMP) and import DB if available.
3. Update DB credentials in `includes/config.php`.
4. Open `http://localhost/MangaVerse`

## 🗄️ Database Setup

This project uses a MySQL database named **`final`**.  
Since the SQL dump file (`final.sql`) is private and not included in this repository,  
you can manually create your own database and tables using the structure below.

---

### 🧱 Step 1: Create Database
Open **phpMyAdmin** or your preferred MySQL client and run:
```sql
CREATE DATABASE final;
USE final;
Step 2: Create Tables
1️⃣ users table
Stores user profile and authentication details.
CREATE TABLE users (
  Id INT AUTO_INCREMENT PRIMARY KEY,
  user_img VARCHAR(400) NOT NULL DEFAULT 'icons/profile.jpg',
  Name VARCHAR(20),
  Email VARCHAR(200),
  Contact INT(10),
  Username VARCHAR(200),
  Password VARCHAR(200),
  Verify VARCHAR(200) NOT NULL
);

2️⃣ mangas table
Stores manga titles, cover images, and reading links.
CREATE TABLE mangas (
  Id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  image VARCHAR(200) NOT NULL,
  site VARCHAR(200) NOT NULL
);

3️⃣ likes table
Tracks user likes/dislikes for each manga.
CREATE TABLE likes (
  Id INT AUTO_INCREMENT PRIMARY KEY,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  status VARCHAR(10) NOT NULL
);

4️⃣ suggestion table
Stores user feedback and manga suggestions.
CREATE TABLE suggestion (
  user_id INT NOT NULL,
  sugg VARCHAR(255) NOT NULL,
  email VARCHAR(200) NOT NULL
);

5️⃣ verify table
Stores temporary registration data for email verification.
CREATE TABLE verify (
  Id INT AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(200) NOT NULL,
  Contact INT(11) NOT NULL,
  Username VARCHAR(200) NOT NULL,
  Password VARCHAR(200) NOT NULL,
  Email VARCHAR(200) NOT NULL,
  Verify VARCHAR(100) NOT NULL
);


🧩 Database Relationship Diagram (Text Overview)

┌────────────┐        ┌──────────────┐
│   users    │        │   mangas     │
│────────────│        │──────────────│
│ Id         │◄────┐  │ Id           │
│ Name       │     │  │ name         │
│ Email      │     │  │ image        │
│ ...        │     │  │ site         │
└────────────┘     │  └──────────────┘
                   │
                   │
           ┌───────▼───────┐
           │    likes      │
           │───────────────│
           │ Id            │
           │ post_id (→ mangas.Id)
           │ user_id (→ users.Id)
           │ status         │
           └───────────────┘


## 📸 Screenshots
Add screenshots in `screenshots/` and reference them here:
`![Homepage](screenshots/homepage.png)`

## 💬 Contact
Made with ❤️ by Surya Nair — [LinkedIn](https://www.linkedin.com/in/suryanair/)

