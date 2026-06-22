-- Create database
CREATE DATABASE IF NOT EXISTS lab_ci4;
USE lab_ci4;

-- Create artikel table
CREATE TABLE IF NOT EXISTS artikel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'draft',
    slug VARCHAR(255) NOT NULL,
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data (optional)
INSERT INTO artikel (judul, isi, status, slug, gambar) VALUES
('Artikel Pertama', 'Ini adalah konten artikel pertama untuk testing.', 'published', 'artikel-pertama', NULL),
('Artikel Kedua', 'Ini adalah konten artikel kedua untuk testing.', 'published', 'artikel-kedua', NULL),
('Artikel Ketiga', 'Ini adalah konten artikel ketiga untuk testing.', 'draft', 'artikel-ketiga', NULL);
