# STOK WISE: Inventory Management System

STOK WISE is a comprehensive inventory management system designed to help businesses effectively track stock levels and manage reorder processes to meet customer demand without overstocking. This system ensures operational efficiency through robust features for managing roles, users, products, categories, suppliers, orders, and customers.

## Features

- **Role Management**: Define and manage roles such as Admin, Manager, Employee, and Customer.
- **User Management**: Manage users with unique credentials, roles, and contact information.
- **Product Management**: Add, update, and track product details including categories, stock levels, prices, and suppliers.
- **Category Management**: Organize products into categories with the ability to track the number of products in each category.
- **Supplier Management**: Maintain detailed supplier information including contact details and products supplied.
- **Order Management**: Track orders with details such as supplier, product, quantity, status, and customer information.
- **Customer Management**: Store and manage customer information for better service and record-keeping.

## Database Structure

The system is backed by a MySQL database with the following tables:

1. **role**: Stores roles with an auto-incremented ID and role name.
2. **app_user**: Tracks users with their credentials, roles, and timestamps.
3. **product**: Manages product details, stock levels, categories, suppliers, and pricing.
4. **category**: Organizes products into categories with timestamps.
5. **supplier**: Stores supplier information including contact details and product counts.
6. **orders**: Tracks orders with supplier, product, customer, and status details.
7. **customer**: Maintains customer contact and address information.

## Sample Data

To help visualize functionality, sample data has been provided for all tables:

- Roles: Admin, Manager, Employee, Customer.
- Users: Predefined users for each role.
- Categories: Electronics, Clothing, Groceries.
- Products: Examples like Laptop, T-Shirt, and Rice.
- Suppliers: Key suppliers with contact details.
- Customers: Sample customers with contact details.
- Orders: Sample orders with varying statuses.

## Requirements

- **Database**: MySQL 5.7 or above.
- **Language**: SQL for database operations.

## Installation and Setup

1. Clone the project repository.
2. Create a MySQL database and execute the provided SQL script to create tables and insert sample data.
3. Customize configurations as needed for your environment.

## Usage

1. Use an SQL client or application to interact with the database.
2. Run queries to manage roles, users, products, suppliers, orders, and customers.
3. Extend functionality by integrating this database with a web application or ERP system.

## Future Enhancements

- **User Authentication**: Implement authentication for secure access.
- **Analytics**: Add reports for stock trends and supplier performance.
- **Notifications**: Include reorder notifications for low-stock products.
- **Integration**: Connect with third-party tools for advanced functionality.

## Contact

For further information or contributions, please contact:
- **Developer**: Anouar Elbarry
- **Email**: [elbarryanwar37@gmail.com]

---

Developed as part of a project to learn and implement UML, SQL, MySQL, and PHP for efficient inventory management. This is an evolving project aimed at solving real-world challenges in inventory tracking.

