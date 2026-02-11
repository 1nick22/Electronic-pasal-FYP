CREATE DATABASE IF NOT EXISTS ElectronicPasal;
USE ElectronicPasal;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert dummy admin for testing
-- Login: admin12@gmail.com / admin123
INSERT INTO users (first_name, last_name, email, password, role) 
VALUES ('Admin', 'User', 'admin12@gmail.com', 'admin123', 'admin');

-- Insert dummy customer for testing
-- Login: rhythm12@gmail.com / rhythm123
INSERT INTO users (first_name, last_name, email, password, role) 
VALUES ('Rhythm', 'gurung', 'rhythm12@gmail.com', 'rhythm123', 'customer');
