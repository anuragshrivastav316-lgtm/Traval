-- Select your existing database in phpMyAdmin first

CREATE TABLE IF NOT EXISTS book_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    location VARCHAR(150) NOT NULL,
    guests INT NOT NULL,
    arrivals DATE,
    leaving DATE
);

CREATE TABLE IF NOT EXISTS packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    rating TINYINT NOT NULL,
    review_text TEXT NOT NULL,
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS about_us (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS book_section (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    link VARCHAR(255),
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS sliders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    button_text VARCHAR(100) NOT NULL,
    button_link VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL
);

-- Insert initial records required by the admin edit pages

INSERT INTO about_us (id, title, description, image)
VALUES (1, 'About Us', 'Welcome to our travel website.', '')
ON DUPLICATE KEY UPDATE id = id;

INSERT INTO book_section (id, title, link, image)
VALUES (1, 'Book Your Trip', 'book.php', '')
ON DUPLICATE KEY UPDATE id = id;