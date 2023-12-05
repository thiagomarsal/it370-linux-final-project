-- Create Categories table
CREATE TABLE Categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL
);

-- Insert some sample categories
INSERT INTO Categories (category_name) VALUES
    ('Electronics'),
    ('Clothing'),
    ('Books');

-- Create Products table
CREATE TABLE Products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(100) NOT NULL,
    product_description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

-- CREATE Customer table
CREATE TABLE `Customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
);

-- Create Orders table
CREATE TABLE Orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    quantity INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    customer_name VARCHAR(100),
    customer_email VARCHAR(100),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

-- Add indexes to optimize the database
ALTER TABLE Orders ADD INDEX idx_product_id (product_id);
ALTER TABLE Customers ADD INDEX idx_email (email);
ALTER TABLE Customers ADD INDEX idx_phone (phone);

-- Insert some sample products
INSERT INTO Products (product_name, product_description, price, category_id) VALUES
    ('Laptop', 'High performance laptop', 1200.00, 1),
    ('T-shirt', 'Cotton round neck t-shirt', 20.00, 2),
    ('Introduction to PHP', 'Book about PHP programming', 30.00, 3);

-- Insert some sample customers
INSERT INTO `Customers` (`first_name`, `last_name`, `email`, `phone`) VALUES
('John', 'Doe', 'john.doe@example.com', '123-456-7890'),
('Alice', 'Smith', 'alice.smith@example.com', '987-654-3210'),
('Bob', 'Johnson', 'bob.johnson@example.com', NULL),
('Eva', 'Williams', 'eva.williams@example.com', '555-123-4567');
