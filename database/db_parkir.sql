CREATE DATABASE IF NOT EXISTS db_parkir;
USE db_parkir;

CREATE TABLE IF NOT EXISTS admin (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password) VALUES ('salsa', '123');

CREATE TABLE IF NOT EXISTS parkir (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nomor_plat VARCHAR(15) NOT NULL,
  jenis_kendaraan ENUM('roda 2', 'roda 4') NOT NULL,
  waktu_masuk DATETIME NOT NULL,
  waktu_keluar DATETIME NULL,
  status ENUM('parkir', 'selesai') NOT NULL,
  total_bayar INT(11) NULL
);

-- Data dummy awal
INSERT INTO parkir (nomor_plat, jenis_kendaraan, waktu_masuk, waktu_keluar, status, total_bayar) VALUES 
('L 1234 AB', 'roda 2', DATE_SUB(NOW(), INTERVAL 1 HOUR), NOW(), 'selesai', 2000),
('B 9999 XYZ', 'roda 4', DATE_SUB(NOW(), INTERVAL 4 HOUR), NOW(), 'selesai', 7000),
('N 4321 CD', 'roda 2', DATE_SUB(NOW(), INTERVAL 3 HOUR), NOW(), 'selesai', 3000),
('W 1111 AA', 'roda 4', DATE_SUB(NOW(), INTERVAL 2 HOUR), NULL, 'parkir', NULL),
('AG 5555 ZZ', 'roda 2', DATE_SUB(NOW(), INTERVAL 5 HOUR), NULL, 'parkir', NULL);