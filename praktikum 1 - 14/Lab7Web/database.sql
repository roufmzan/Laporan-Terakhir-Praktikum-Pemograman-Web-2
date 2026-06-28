CREATE DATABASE IF NOT EXISTS lab_ci4;
USE lab_ci4;

CREATE TABLE IF NOT EXISTS artikel (
 id INT(11) auto_increment,
 judul VARCHAR(200) NOT NULL,
 isi TEXT,
 gambar VARCHAR(200),
 status TINYINT(1) DEFAULT 0,
 slug VARCHAR(200),
 id_kategori INT(11),
 created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY(id)
);

INSERT INTO artikel (judul, isi, slug) VALUES
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.', 'artikel-pertama'), 
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun.', 'artikel-kedua');

CREATE TABLE IF NOT EXISTS kategori (
 id_kategori INT(11) AUTO_INCREMENT,
 nama_kategori VARCHAR(100) NOT NULL,
 slug_kategori VARCHAR(100),
 PRIMARY KEY (id_kategori)
);

INSERT INTO kategori (nama_kategori, slug_kategori) VALUES
('Teknologi', 'teknologi'),
('Bisnis', 'bisnis'),
('Gaya Hidup', 'gaya-hidup');

CREATE TABLE IF NOT EXISTS user (
 id INT(11) auto_increment,
 username VARCHAR(200) NOT NULL,
 useremail VARCHAR(200),
 userpassword VARCHAR(200),
 PRIMARY KEY(id)
);
