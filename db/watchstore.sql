-- Tạo cở sở dữ liệu nếu chưa tồn tại --
CREATE DATABASE IF NOT EXISTS watchstore;

-- Sử dụng cơ sở dữ liệu --
USE watchstore;

-- Tạo bảng sản phẩm (products)
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tạo bảng đơn hàng (orders)
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tạo bảng chi tiết đơn hàng (order_items)
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Tạo bảng khách hàng (customers)
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tạo bảng giỏ hàng (cart)
CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Tạo bảng danh mục (categories)
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

-- Tạo bảng liên kết sản phẩm và danh mục (product_categories)
CREATE TABLE IF NOT EXISTS product_categories (
    product_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (product_id, category_id),
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Insert dữ liệu vào bảng products --
INSERT INTO products (name, description, price, image_url)
VALUES ('Q662J301Y', 'Mô tả sản phẩm', '4000000' , 'https://i.ibb.co/kK9w61G/sp1.png');

INSERT INTO products (name, description, price, image_url)
VALUES ('Q662J302Y', 'Mô tả sản phẩm', '4000000' , 'https://i.ibb.co/YpHZ1QZ/sp2.png');

INSERT INTO products (name, description, price, image_url)
VALUES ('Q662J303Y', 'Mô tả sản phẩm', '4000000' , 'https://i.ibb.co/str01jm/sp3.png');

INSERT INTO products (name, description, price, image_url)
VALUES ('Q662J304Y', 'Mô tả sản phẩm', '4000000' , 'https://i.ibb.co/w4Ts4hW/sp4.png');

INSERT INTO products (name, description, price, image_url)
VALUES ('Q662J305Y', 'Mô tả sản phẩm', '4000000' , 'https://i.ibb.co/dMrpQfW/sp5.png');

INSERT INTO products (name, description, price, image_url)
VALUES ('Longines', 'Mô tả sản phẩm', '4000000' , 'https://i.ibb.co/wrcYrqm/sp6.jpg');