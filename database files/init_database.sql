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

-- Insert some sample products
INSERT INTO Products (product_name, product_description, price, category_id) VALUES
    ('Laptop', 'High performance laptop', 1200.00, 1),
    ('T-shirt', 'Cotton round neck t-shirt', 20.00, 2),
    ('Introduction to PHP', 'Book about PHP programming', 30.00, 3);

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

-- Add foreign key index to optimize the database
ALTER TABLE Orders ADD INDEX (product_id);
