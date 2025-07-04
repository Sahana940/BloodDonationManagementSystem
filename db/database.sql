CREATE DATABASE IF NOT EXISTS bloodconnectlife;
USE bloodconnectlife;

-- Users Table (registered users)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role ENUM('user', 'admin') DEFAULT 'user',
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Donors Table
CREATE TABLE IF NOT EXISTS donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    age INT NOT NULL CHECK (age BETWEEN 18 AND 65),
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    blood_group ENUM('A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-') NOT NULL,
    phone VARCHAR(20) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Hospitals Table
CREATE TABLE IF NOT EXISTS hospitals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(255),
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Requests Table (Blood Requests)
CREATE TABLE IF NOT EXISTS requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requester_name VARCHAR(255) NOT NULL,
    blood_group ENUM('A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-') NOT NULL,
    units INT NOT NULL,
    hospital_id INT,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (hospital_id) REFERENCES hospitals(id) ON DELETE SET NULL
);

-- Inventory Table (Blood Inventory)
CREATE TABLE IF NOT EXISTS inventory (
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') PRIMARY KEY,
    available_units INT NOT NULL DEFAULT 0
);

-- Initialize Inventory with default values
INSERT IGNORE INTO inventory (blood_group, available_units) VALUES
('A+', 1200),
('A-', 800),
('B+', 900),
('B-', 500),
('O+', 1500),
('O-', 600),
('AB+', 700),
('AB-', 300);
