# BloodDonationManagementSystem

A full-stack website to manage blood donation processes — donors, hospitals, requests, inventory.  
Built with PHP & MySQL for the backend, HTML/CSS/JavaScript for the frontend, and uses XAMPP for local deployment.

---

## ✅ Features

- Donor registration & login  
- Hospital listing & login  
- Blood request handling (patients, hospitals)  
- Inventory management (blood types, amounts)  
- Search functionality (donors by blood group, hospitals by location)  
- Admin dashboard to manage users, approve requests, monitor inventory  
- Informational pages (About Us, Home, etc.)  
- Responsive design for desktop & mobile  

---

## 🏗️ Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript  
- **Backend**: PHP 8.x (via XAMPP/Apache)  
- **Database**: MySQL (using MySQL Workbench)  
- **Development Tools**: XAMPP, VS Code, Postman, Git/GitHub  

---

## 📂 Project Structure

/assets/ → Images, CSS, JS files
/backend/ → PHP backend logic (controllers, models)
/db/ → SQL scripts, MySQL dump, initialization
/includes/ → Reusable PHP includes (header, footer, config)
/pages/ → Front-end pages (home, register, login, inventory etc)

yaml
Copy code

---

## 🛠️ Setup Instructions (Local – XAMPP)

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** & **MySQL** modules.  
2. Clone this repository:
git clone https://github.com/Sahana940/BloodDonationManagementSystem.git

markdown
Copy code
3. Copy the folder into your XAMPP `htdocs/` directory (e.g., `C:\xampp\htdocs\BloodDonationManagementSystem`).  
4. Create the database:
- Open `phpMyAdmin` (`http://localhost/phpmyadmin`)  
- Import the SQL script from `/db/` (e.g., `blood_db.sql`) to create required tables.  
5. Update database configuration:
- Open `/includes/config.php` (or equivalent)  
- Set DB_HOST, DB_USER, DB_PASS, DB_NAME to match your local environment.  
6. Access the app:
http://localhost/BloodDonationManagementSystem/

sql
Copy code

---

## 🔧 Environment Variables / Config

Modify `/includes/config.php` (or similar) with:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blood_db');
You may also change other settings like site title, admin credentials.

🎨 UI Pages & User Flows
Register / Login: for donors, hospitals, and admins

Donor Profile: update details, view history

Request Page: hospitals/patients raise blood requests

Inventory Page: track blood types and quantities

Search: find donors by blood group and location

Admin Dashboard: manage users, approve requests, view statistics

🚨 Important Disclaimer
This application is designed for educational purposes only. It is not a substitute for a professional clinical or hospital-level system.
Always consult with healthcare professionals and ensure compliance with data protection regulations (GDPR, HIPAA etc) before any real-world deployment.

✅ Next Steps & Enhancements
Add email/SMS notifications for requests

Integrate geolocation/map to find nearest donor/hospital

Implement mobile app for on-the-go usage

Add role-based access control and audit logs

Deploy to live server with SSL & secure configuration

📄 License
This project is licensed under the MIT License. See the LICENSE file for details.

🧑‍💻 Author
Created by Sahana 940 –
Feel free to contribute via Pull Requests or report issues on the GitHub repository.

yaml
Copy code

---

If you like, I can **generate README in Markdown with badges (build status, license, version)** as well. Would you like me to prepare that?
::contentReference[oaicite:1]{index=1}






You said:
give in single stetch such that i can  copy it easily



ChatGPT said:
Sure! Here is the full README.md in one single block — just copy & paste ✅

markdown
Copy code
# BloodDonationManagementSystem

A full-stack website to manage blood donation processes including donors, hospitals, blood requests, and blood inventory.  
Built using PHP, MySQL, HTML, CSS, and JavaScript – deployed locally through XAMPP.

---

## ✅ Features

- Donor registration & authentication
- Hospital registration & login
- Admin dashboard
- Manage blood requests & approvals
- Blood inventory monitoring by blood group
- Search donors by blood group & location
- Profile update for donors & hospitals
- Fully responsive UI design

---

## 🏗️ Tech Stack

| Layer        | Technology |
|-------------|------------|
| Frontend    | HTML5, CSS3, JavaScript |
| Backend     | PHP (XAMPP Apache Server) |
| Database    | MySQL (phpMyAdmin / MySQL Workbench) |
| Tools       | VS Code, Git, GitHub, Postman |

---

## 📁 Project Structure Overview

/assets/ → CSS, JS, Images
/backend/ → PHP backend functionality
/db/ → SQL database setup file
/includes/ → Header, footer, config
/pages/ → All UI pages

yaml
Copy code

---

## 🛠️ Installation & Setup (Localhost)

1️⃣ Install **XAMPP** from: https://www.apachefriends.org/  
2️⃣ Start **Apache** & **MySQL** from XAMPP Control Panel  
3️⃣ Clone the project:  
```sh
git clone https://github.com/Sahana940/BloodDonationManagementSystem.git
4️⃣ Copy the folder into:

makefile
Copy code
C:\xampp\htdocs\
5️⃣ Create Database:

Open phpMyAdmin → http://localhost/phpmyadmin

Create DB (ex: blood_db)

Import SQL file from /db/ folder

6️⃣ Configure database in includes/config.php:

php
Copy code
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blood_db');
7️⃣ Run Website in Browser:

arduino
Copy code
http://localhost/BloodDonationManagementSystem/
🔐 Roles Available
Role	Access
Donor	Register/login, update profile, view donation requests
Hospital	Request blood, manage availability
Admin	Approve users, assign requests, manage inventory

🚨 Important Disclaimer
This project is for educational purposes only and should not be used as a production medical system without compliance to legal standards such as HIPAA/GDPR.

🚀 Future Enhancements
Add email/SMS alerts for blood requests

Google Maps API integration for nearest donor search

Mobile application version (Flutter/React Native)

Enhanced security & role-based authentication

📄 License
This project is open-source under the MIT License.

👩‍💻 Author
Sahana N Shetty
GitHub: https://github.com/Sahana940
