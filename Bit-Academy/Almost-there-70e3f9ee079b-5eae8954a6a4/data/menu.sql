DROP DATABASE IF EXISTS `azeri`;

CREATE DATABASE `azeri`;

USE `azeri`;

CREATE TABLE menu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    type TEXT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price_normal DECIMAL(6,2),
    price_large DECIMAL(6,2)
);

INSERT INTO menu (type, name, description, price_normal, price_large) VALUES
('Shoarma', 'Shoarma', NULL, 8.00, 10.00),
('Shoarma', 'Shoarma met kaas', NULL, 9.00, 11.00),
('Shoarma', 'Shoarma Hawaï', NULL, 9.00, 11.00),
('Shoarma', 'Shoarma schotel', NULL, 16.00, 19.00),
('Kebap', 'Kebab blokjes kipfilet', NULL, 8.00, 10.00),
('Kebap', 'Kebab schotel met kaas', NULL, 17.00, 20.00),
('Lahmacun', 'Lahmacun', NULL, 6.00, 7.00),
('Lahmacun', 'Lahmacun met kaas', NULL, 7.00, 9.00),
('Döner', 'Döner', NULL, 8.00, 10.00),
('Döner', 'Döner schotel', NULL, 16.00, 18.00),
('Kebap', 'Kebab blokjes varkenshaas', NULL, 9.50, 11.50),
('Kebap', 'Kebab schotel met kaas', NULL, 17.00, 20.00),
('Halal schotel', 'Halal schotel', 'Adana, shish kebab', 10.00, 12.00),
('Spareribs', 'Spareribs zoet of heet', NULL, 12.00, 15.00),
('Spareribs', 'Spareribs schotel met aardappelschijfjes of patat', NULL, 19.00, 21.00);

CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    naam VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    adres VARCHAR(255) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    order_description VARCHAR(255) NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);