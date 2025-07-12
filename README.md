# Half hour

A web-based Q&A platform inspired by Quora, built with PHP, MySQL, HTML, CSS, and JavaScript.

## Features

- User registration and login (with email)
- Ask and answer questions
- User profile with display picture
- Categories for questions
- Responsive UI with Bootstrap
- Passwords securely hashed

## Tech Stack

- **Backend:** PHP (Procedural)
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MySQL
- **Other:** Bootstrap 4, PHPMailer

## Setup Instructions

### 1. Prerequisites

- XAMPP or any LAMP/WAMP stack (with PHP >= 7.0 and MySQL)
- Composer (for PHPMailer, if needed)

### 2. Clone the Repository

```
git clone <repo-url>
```

### 3. Place in Web Server Directory

- Copy the project folder (`WP-Project-Quora-Clone`) to your XAMPP `htdocs` directory (or equivalent).

### 4. Database Setup

- Start Apache and MySQL from XAMPP.
- Open phpMyAdmin and run the following SQL to create the database and tables:

```sql
CREATE DATABASE IF NOT EXISTS Project_DB;
USE Project_DB;

CREATE TABLE IF NOT EXISTS CUSTOMER (
    Cid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    C_name VARCHAR(20) NOT NULL,
    Email VARCHAR(40) UNIQUE NOT NULL,
    Pass VARCHAR(255) NOT NULL,
    works VARCHAR(40),
    study VARCHAR(40),
    lives VARCHAR(40),
    Joined DATE,
    DP_name VARCHAR(255),
    Fav_cats VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS QUESTION (
    Qid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Cid INT(6) UNSIGNED,
    Ques_desc TEXT,
    Asked_date DATE,
    Q_name VARCHAR(255) NOT NULL,
    Q_cat VARCHAR(255) NOT NULL,
    FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid)
);

CREATE TABLE IF NOT EXISTS ANSWER (
    Aid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Qid INT(6) UNSIGNED,
    Cid INT(6) UNSIGNED,
    ans_body TEXT NOT NULL,
    Answered_date DATE,
    FOREIGN KEY (Cid) REFERENCES CUSTOMER(Cid),
    FOREIGN KEY (Qid) REFERENCES QUESTION(Qid) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS CATEGORIES (
    Catid INT(6) PRIMARY KEY,
    Cat_name VARCHAR(50),
    Cat_img VARCHAR(256)
);

INSERT INTO CATEGORIES VALUES
    (1, 'Python', '../Images/python.png'),
    (2, 'Javascript', '../Images/js.png'),
    (3, 'Java', '../Images/java.png'),
    (4, 'PHP', '../Images/php.png');
```

Alternatively, running the project will auto-create the database and tables via `Components/db_prep.php`.

### 5. Configure PHPMailer (Optional)

- If you want to enable email features, set up credentials in `Components/credentials.php`.

### 6. Run the Project

- Open your browser and go to: `http://localhost/WP-Project-Quora-Clone/Components/login.php`

## Usage

- Register a new account or use the random user generator at `register_validate.php` for testing.
- Ask questions, answer others, and explore categories.

## Folder Structure

- `Components/` — PHP backend files
- `CSS/` — Stylesheets
- `JS/` — JavaScript files
- `Images/` — Images and user DPs
- `PHPMailer/` — Email library

## Credits

- Developed by Aman Agrawal, Pushpit Jain, and Rathin Nair
- Inspired by [Quora](https://quora.com)

---

For any issues, please open an issue or contact the maintainers.
