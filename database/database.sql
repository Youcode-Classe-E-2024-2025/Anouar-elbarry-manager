CREATE TABLE role 
( 
id INT AUTO_INCREMENT PRIMARY KEY,
role_name VARCHAR(50) NOT NULL, 
);

CREATE TABLE app_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    user_password VARCHAR(50) NOT NULL UNIQUE,
    role_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES role(id)
);

CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    quantity_instock INT,
    category_id INT,
    supplier_id INT,
    FOREIGN KEY (category_id) REFERENCES category(id),
    FOREIGN KEY (supplier_id) REFERENCES supplier(id)
);

CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL,
    products_nbr INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE supplier 
( 
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL UNIQUE, 
phone VARCHAR(50) NOT NULL UNIQUE, 
address VARCHAR(200) NOT NULL , 
products_supplied INT ,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `supplier_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_status` enum('pending','shipped','delivered') DEFAULT NULL,
  `quantity_ordered` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `fk_customer` (`customer_id`),
  KEY `orders_product_fk` (`product_id`),
  CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  CONSTRAINT `orders_product_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


 CREATE TABLE customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(50),
    address VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- insert fake data 

INSERT INTO customer (first_name, last_name, email, phone, address) VALUES
('John', 'Doe', 'john.doe@example.com', '1234567890', '123 Elm Street, Springfield'),
('Jane', 'Smith', 'jane.smith@example.com', '0987654321', '456 Maple Avenue, Rivertown'),
('Alice', 'Brown', 'alice.brown@example.com', '1122334455', '789 Oak Lane, Greenfield');


INSERT INTO supplier (name, email, phone, address, products_supplied) VALUES
('ABC Supplies', 'contact@abcsupplies.com', '5551234567', '100 Industrial Way, Metropolis', 100),
('Global Goods', 'support@globalgoods.com', '5559876543', '200 Commerce Blvd, Centerville', 200),
('Fast Distributors', 'info@fastdist.com', '5556789012', '300 Distribution Rd, Uptown', 150);


INSERT INTO category (category_name, products_nbr) VALUES
('Electronics', 50),
('Home Appliances', 30),
('Furniture', 20),
('Books', 100),
('Clothing', 75);


INSERT INTO product (name, quantity_instock, category_id, supplier_id) VALUES
('Smartphone', 25, 1, 1),
('Microwave Oven', 10, 2, 2),
('Sofa', 5, 3, 3),
('Fiction Book', 50, 4, 1),
('Winter Jacket', 20, 5, 2);


INSERT INTO orders (customer_id, supplier_id, product_id, order_date, order_status, quantity_ordered) VALUES
(1, 1, 1, '2024-12-01', 'pending', 2),
(2, 2, 2, '2024-12-03', 'shipped', 1),
(3, 3, 3, '2024-12-05', 'delivered', 1),
(1, 1, 4, '2024-12-06', 'pending', 5),
(2, 2, 5, '2024-12-08', 'shipped', 3);

-- add price to product table

UPDATE product 
SET price = CASE 
WHEN id = 1 THEN 13
WHEN id = 2 THEN 28
WHEN id = 3 THEN 43
WHEN id = 4 THEN 18
WHEN id = 5 THEN 35
END 
WHERE id IN (1,2,3,4,5);