DATABASE CODE  -   CREATE DATABASE auth_demo; 
USE auth_demo; 
 
CREATE TABLE users (     id INT AUTO_INCREMENT PRIMARY KEY,     username VARCHAR(50) NOT NULL UNIQUE,     email VARCHAR(100) NOT NULL UNIQUE,     password VARCHAR(255) NOT NULL, 
    role ENUM('user', 'admin') DEFAULT 'user' 
);  
