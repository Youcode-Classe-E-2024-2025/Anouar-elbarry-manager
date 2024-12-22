CREATE TABLE role 
( 
id INT AUTO_INCREMENT PRIMARY KEY,
role_name VARCHAR(50) NOT NULL, 
);

CREATE TABLE app_user (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    user_password VARCHAR(255) UNIQUE,
    role_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(100) NOT NULL UNIQUE,
    deleted_at DATETIME NULL,
    PRIMARY KEY (id),
    KEY role_id (role_id)
);

CREATE TABLE product (
id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    quantity_instock INT NULL,
    category_id INT NULL,
    supplier_id INT NULL,
    price INT NULL,
    PRIMARY KEY (id),
    KEY category_id (category_id),
    KEY supplier_id (supplier_id)
)


CREATE TABLE category (
    id INT NOT NULL AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL,
    products_nbr INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE supplier 
( 
 id INT NOT NULL AUTO_INCREMENT,
    supplier_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    phone VARCHAR(50) NOT NULL UNIQUE,
    address VARCHAR(200) NOT NULL,
    products_supplied INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE orders (
     id INT NOT NULL AUTO_INCREMENT,
    supplier_id INT,
    product_id INT,
    order_date DATE,
    order_status ENUM('pending', 'shipped', 'delivered'),
    quantity_ordered INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    customer_id INT,
    PRIMARY KEY (id),
    KEY (supplier_id),
    KEY (product_id),
    KEY (customer_id)
)


 CREATE TABLE customer (
id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(50),
    address VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);



-- Insert roles\INSERT INTO role (role_name) VALUES
('Admin'),
('Manager'),
('Employee'),
('Customer');

-- Insert app users
INSERT INTO app_user (username, user_password, role_id, email) VALUES
('admin_user', 'admin_password123', 1, 'admin@example.com'),
('manager_user', 'manager_password123', 2, 'manager@example.com'),
('employee_user', 'employee_password123', 3, 'employee@example.com'),
('customer_user', 'customer_password123', 4, 'customer@example.com');

-- Insert categories
INSERT INTO category (category_name, products_nbr) VALUES
('Electronics', 10),
('Clothing', 20),
('Groceries', 30);

-- Insert suppliers
INSERT INTO supplier (supplier_name, email, phone, address, products_supplied) VALUES
('Supplier A', 'supplier_a@example.com', '123-456-7890', '123 Street, City', 15),
('Supplier B', 'supplier_b@example.com', '987-654-3210', '456 Avenue, City', 25),
('Supplier C', 'supplier_c@example.com', '555-555-5555', '789 Boulevard, City', 10);

-- Insert products
INSERT INTO product (name, quantity_instock, category_id, supplier_id, price) VALUES
('Laptop', 50, 1, 1, 800),
('T-Shirt', 100, 2, 2, 20),
('Rice', 200, 3, 3, 10),
('Headphones', 30, 1, 1, 50),
('Jeans', 75, 2, 2, 40);

-- Insert customers
INSERT INTO customer (first_name, last_name, email, phone, address) VALUES
('John', 'Doe', 'john.doe@example.com', '123-456-7890', '123 Street, City'),
('Jane', 'Smith', 'jane.smith@example.com', '987-654-3210', '456 Avenue, City'),
('Alice', 'Johnson', 'alice.johnson@example.com', '555-555-5555', '789 Boulevard, City');

-- Insert orders
INSERT INTO orders (supplier_id, product_id, order_date, order_status, quantity_ordered, customer_id) VALUES
(1, 1, '2024-12-01', 'pending', 5, 1),
(2, 2, '2024-12-02', 'shipped', 10, 2),
(3, 3, '2024-12-03', 'delivered', 15, 3);
