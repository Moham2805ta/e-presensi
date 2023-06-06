/*
 Navicat Premium Data Transfer

 Source Server         : MyServer
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : e-presensi

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 06/06/2023 20:30:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bulan
-- ----------------------------
DROP TABLE IF EXISTS `bulan`;
CREATE TABLE `bulan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bulan
-- ----------------------------
INSERT INTO `bulan` VALUES (1, 'Januari');
INSERT INTO `bulan` VALUES (2, 'Februari');
INSERT INTO `bulan` VALUES (3, 'Maret');
INSERT INTO `bulan` VALUES (4, 'April');
INSERT INTO `bulan` VALUES (5, 'Mei');
INSERT INTO `bulan` VALUES (6, 'Juni');
INSERT INTO `bulan` VALUES (7, 'Juli');
INSERT INTO `bulan` VALUES (8, 'Agustus');
INSERT INTO `bulan` VALUES (9, 'September');
INSERT INTO `bulan` VALUES (10, 'Oktober');
INSERT INTO `bulan` VALUES (11, 'November');
INSERT INTO `bulan` VALUES (12, 'Desember');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('1111111111111111', 'John Doe', 'Guru', '0812', NULL, 'abTt7PXUxC');
INSERT INTO `karyawan` VALUES ('1112221112221114', 'Yusron Bisri', 'Guru', '0812', '$2y$10$Du0lT0QylvZItL428jC6S.dxkIRkidAv5Rg5ctWXIfUqoLU02IA0K', 'wFwIiDym1i');
INSERT INTO `karyawan` VALUES ('12345', 'Ahmad Akbar Mubarak', 'guru', '0895366979201', '$2y$10$L7Igv5TUo.7OO8Wr58IucOMC3Oh8S8EQO6Xqvll.hEca4BZAbV4ve', '');
INSERT INTO `karyawan` VALUES ('2828282882828230', 'GG gaming', 'Guru', '0812', '$2y$10$bSvBs62Es7ed5na0/1OWL.YrY0NuLtR0ZbPU5ayVdAgw9LItlMZQy', '4AQkOuxfke');
INSERT INTO `karyawan` VALUES ('2828282882828282', 'M Yusron', 'Guru', '0812', '$2y$10$p0NBy9xxLgHMqRiX8ZcUa.HxPYlrpzM1n81UDgFjY3cpXPws/OWD6', 'iUFPD6RcKO');
INSERT INTO `karyawan` VALUES ('3003030330030300', 'Ayam Goreng', 'Guru', '0812', '$2y$10$hDKTSPT8xKWgMgQkxHTUMuxG3vooBpqPeXSgRYhN1bdrAM8PZAsbC', 'TLkChacufT');
INSERT INTO `karyawan` VALUES ('3003030330030302', 'Yusron', 'Guru', '0812', NULL, 'T4rUEd6Ci1');
INSERT INTO `karyawan` VALUES ('3003030330030303', 'Ayam Goreng', 'User', '0812', '$2y$10$Vh27noJmJ/iSTuFclASJqOckHwN5MrB7HPKw7QECbD43TfETKYgb6', 'PKK6tL2luG');
INSERT INTO `karyawan` VALUES ('3003030330030305', 'uytduysu', 'Guru', '0812', '$2y$10$Di2zrERk8NLBwx0ZM344luCyqbmXoA6F4Lvt.sAAiwTTBrSnB8MtW', 'N9dWJRDt9h');
INSERT INTO `karyawan` VALUES ('3003030330030310', 'hjjhjgjhhjgjhg', 'Guru', '0812', '$2y$10$Ivlc85Nvt5rQkj4zJOXLEON4ZNPOvLIsRSFkCfOeg5QO0E5MyF75G', 'RmSFQD3emV');

-- ----------------------------
-- Table structure for presensi
-- ----------------------------
DROP TABLE IF EXISTS `presensi`;
CREATE TABLE `presensi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_presensi` date NULL DEFAULT NULL,
  `jam_in` time NULL DEFAULT NULL,
  `jam_out` time NULL DEFAULT NULL,
  `foto_in` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto_out` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `lokasi_in` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `lokasi_out` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of presensi
-- ----------------------------
INSERT INTO `presensi` VALUES (1, '3003030330030302', '2023-03-02', '23:00:00', '23:40:00', 'fotoku.jpg', 'fotoku.jpg', 'SMK 3 Muhammadiyah', NULL, NULL);
INSERT INTO `presensi` VALUES (4, '111', '2024-05-21', '08:00:00', '14:00:00', 'fotoku.jpg', 'D.png', 'SMK 3 Muhammadiyah', NULL, NULL);
INSERT INTO `presensi` VALUES (7, '12345', '2022-06-04', '08:00:00', '14:00:00', 'fotoku.jpg', 'fotoku.jpg', 'SMK 3 Muhammadiyah', NULL, NULL);
INSERT INTO `presensi` VALUES (8, '12345', '2022-11-09', '08:00:00', '14:00:00', 'fotoku.jpg', 'fotoku.jpg', 'SMK 3 Muhammadiyah', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'John Doe', 'yusron@gmail.com', NULL, '$2y$10$xhHsaf6o8B05mIUa13BPbe9X8ERbivcDgHI0NgbY4csCbYDhY12Fi', 'AqqNsuW6fI', '2023-04-30 20:14:51', '2023-04-30 20:14:51', '3122');
INSERT INTO `users` VALUES (4, 'John Doe', 'yusron1@gmail.com', NULL, '$2y$10$EhmX2K9mYSNCsWE8XWIqVu7V/QW7ysIxtXz81Etl3r/YsEfF8ZQ16', 'MYtGfl4Vnd', '2023-05-02 16:24:13', '2023-05-02 16:24:13', '312');

-- ----------------------------
-- View structure for v_bulan
-- ----------------------------
DROP VIEW IF EXISTS `v_bulan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_bulan` AS select `v_cetak_laporan_presensi`.`nama` AS `bulan`,`v_cetak_laporan_presensi`.`tahun` AS `tahun` from `v_cetak_laporan_presensi` group by `v_cetak_laporan_presensi`.`bulan`,`v_cetak_laporan_presensi`.`tahun`;

-- ----------------------------
-- View structure for v_cetak_laporan
-- ----------------------------
DROP VIEW IF EXISTS `v_cetak_laporan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_cetak_laporan` AS select `v_presensi`.`id` AS `id`,`v_presensi`.`nik` AS `nik`,`v_presensi`.`tgl_presensi` AS `tgl_presensi`,`v_presensi`.`jam_masuk` AS `jam_masuk`,`v_presensi`.`jam_keluar` AS `jam_keluar`,`v_presensi`.`foto_in` AS `foto_in`,`v_presensi`.`foto_out` AS `foto_out`,`v_presensi`.`location` AS `location`,`v_presensi`.`jam_in` AS `jam_in`,`v_presensi`.`nama_lengkap` AS `nama_lengkap`,month(`v_presensi`.`tgl_presensi`) AS `bulan`,year(`v_presensi`.`tgl_presensi`) AS `tahun`,`v_presensi`.`lokasi_in` AS `lokasi_in`,`v_presensi`.`lokasi_out` AS `lokasi_out` from `v_presensi`;

-- ----------------------------
-- View structure for v_cetak_laporan_presensi
-- ----------------------------
DROP VIEW IF EXISTS `v_cetak_laporan_presensi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_cetak_laporan_presensi` AS select `v_cetak_laporan`.`id` AS `id`,`v_cetak_laporan`.`nik` AS `nik`,`v_cetak_laporan`.`tgl_presensi` AS `tgl_presensi`,`v_cetak_laporan`.`jam_masuk` AS `jam_masuk`,`v_cetak_laporan`.`jam_keluar` AS `jam_keluar`,`v_cetak_laporan`.`foto_in` AS `foto_in`,`v_cetak_laporan`.`foto_out` AS `foto_out`,`v_cetak_laporan`.`location` AS `location`,`v_cetak_laporan`.`jam_in` AS `jam_in`,`v_cetak_laporan`.`nama_lengkap` AS `nama_lengkap`,`v_cetak_laporan`.`bulan` AS `bulan`,`v_cetak_laporan`.`tahun` AS `tahun`,`v_cetak_laporan`.`lokasi_in` AS `lokasi_in`,`v_cetak_laporan`.`lokasi_out` AS `lokasi_out`,`bulan`.`nama` AS `nama` from (`v_cetak_laporan` join `bulan` on(`v_cetak_laporan`.`bulan` = `bulan`.`id`));

-- ----------------------------
-- View structure for v_presensi
-- ----------------------------
DROP VIEW IF EXISTS `v_presensi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_presensi` AS select `presensi`.`id` AS `id`,`presensi`.`nik` AS `nik`,`presensi`.`tgl_presensi` AS `tgl_presensi`,`presensi`.`jam_in` AS `jam_masuk`,`presensi`.`jam_out` AS `jam_keluar`,`presensi`.`foto_in` AS `foto_in`,`presensi`.`foto_out` AS `foto_out`,`presensi`.`location` AS `location`,`presensi`.`jam_in` AS `jam_in`,`karyawan`.`nama_lengkap` AS `nama_lengkap`,`presensi`.`lokasi_in` AS `lokasi_in`,`presensi`.`lokasi_out` AS `lokasi_out` from (`presensi` join `karyawan` on(`presensi`.`nik` = `karyawan`.`nik`));

-- ----------------------------
-- View structure for v_tahun
-- ----------------------------
DROP VIEW IF EXISTS `v_tahun`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tahun` AS select `v_cetak_laporan_presensi`.`tahun` AS `tahun` from `v_cetak_laporan_presensi` group by `v_cetak_laporan_presensi`.`tahun`;

SET FOREIGN_KEY_CHECKS = 1;
