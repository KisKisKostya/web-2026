-- Создание базы данных
CREATE DATABASE IF NOT EXISTS blog
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE blog;

-- Создание таблицы пользователей
CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_avatar VARCHAR(500),
    user_password VARCHAR(255) NOT NULL,
    user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Создание таблицы постов
CREATE TABLE IF NOT EXISTS post (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(255) NOT NULL,
    post_subtitle VARCHAR(500),
    post_content TEXT NOT NULL,
    post_image VARCHAR(500),
    post_likes INT DEFAULT 0,
    post_views INT DEFAULT 0,
    post_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    post_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    post_published_at TIMESTAMP NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE SET NULL
);

-- Создание индексов для ускорения запросов
CREATE INDEX idx_post_created_at ON post(post_created_at);
CREATE INDEX idx_post_published_at ON post(post_published_at);
CREATE INDEX idx_user_email ON user(user_email);