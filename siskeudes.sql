/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : siskeudes

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 11/11/2021 13:12:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bidang
-- ----------------------------
DROP TABLE IF EXISTS `bidang`;
CREATE TABLE `bidang`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bidang
-- ----------------------------
INSERT INTO `bidang` VALUES ('31a719ea-8940-476c-8ef6-be508c5fc21e', '05', 'Penanggulangan Bencana, Darurat dan Mendesak Desa', '2021-10-20 11:28:26', '2021-10-20 12:49:27');
INSERT INTO `bidang` VALUES ('4d1b8ddb-702a-4f1b-ab89-3acb47580d32', '04', 'Pemberdayaan Masyarakat', '2021-10-20 11:28:26', '2021-10-20 11:28:26');
INSERT INTO `bidang` VALUES ('56586e5b-49a5-4282-8cbe-4bf43e2a286c', '02', 'Pelaksanaan Pembangunan Desa', '2021-10-20 11:28:26', '2021-10-20 11:28:26');
INSERT INTO `bidang` VALUES ('6500c605-373d-4dc7-a9ca-86089286fdfa', '03', 'Pembinaan Kemasyarakatan', '2021-10-20 11:28:26', '2021-10-20 11:28:26');
INSERT INTO `bidang` VALUES ('77b27188-bf8b-4351-82bb-b3014d290bec', '01', 'Bidang Penyelenggaraan Pemerintahan Desa', '2021-10-20 12:46:48', '2021-10-20 12:46:48');

-- ----------------------------
-- Table structure for desa
-- ----------------------------
DROP TABLE IF EXISTS `desa`;
CREATE TABLE `desa`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kecamatan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `desa_id_kecamatan_foreign`(`id_kecamatan`) USING BTREE,
  CONSTRAINT `desa_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of desa
-- ----------------------------
INSERT INTO `desa` VALUES ('235671f5-199c-4870-9f5a-e6d54b5a6a5c', '934cccc6-384d-49b3-87dd-b0bcb8806a82', 'Desa Gujeg', '2006', '2021-10-20 10:35:19', '2021-10-20 10:35:31');
INSERT INTO `desa` VALUES ('43cec4b6-ad4b-46fd-82c4-f56752e96327', '934cccc6-384d-49b3-87dd-b0bcb8806a82', 'Desa Panguragan Kulon', '2002', '2021-10-20 10:09:51', '2021-10-20 10:09:51');
INSERT INTO `desa` VALUES ('50f09063-db5d-43f9-9ed6-ab3937a787fa', '934cccc6-384d-49b3-87dd-b0bcb8806a82', 'Desa Kalianyar', '2001', '2021-10-20 10:09:51', '2021-10-20 10:09:51');
INSERT INTO `desa` VALUES ('88170b4e-dad2-4e66-9baa-49b513ffd55b', '934cccc6-384d-49b3-87dd-b0bcb8806a82', 'Panguragan Lor', '2004', '2021-10-20 10:31:44', '2021-10-20 10:31:44');
INSERT INTO `desa` VALUES ('9b423185-7ebe-45f5-9c2f-8f45701966bc', '934cccc6-384d-49b3-87dd-b0bcb8806a82', 'Desa Panguragan Wetan', '2003', '2021-10-20 10:09:52', '2021-10-20 10:09:52');
INSERT INTO `desa` VALUES ('a513b0ed-b752-4733-a23d-ed590eeb8f42', '97fbc7b0-dc82-4f92-b05f-75a76f771136', 'Desa Pancalang', '2005', '2021-10-24 00:15:20', '2021-10-24 00:15:20');
INSERT INTO `desa` VALUES ('c5b24ae4-e57b-4477-b573-084d139d54c7', '934cccc6-384d-49b3-87dd-b0bcb8806a82', 'Desa Panguragan Lor', '2004', '2021-10-20 10:33:05', '2021-10-20 10:34:56');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kabupaten
-- ----------------------------
DROP TABLE IF EXISTS `kabupaten`;
CREATE TABLE `kabupaten`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provinsi` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kabupaten_id_provinsi_foreign`(`id_provinsi`) USING BTREE,
  CONSTRAINT `kabupaten_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kabupaten
-- ----------------------------
INSERT INTO `kabupaten` VALUES ('1151733e-2b46-464b-83f4-f6e2fdc90890', '7ad42caa-17b3-4de0-94b5-dde5a0253ca2', '08', 'Kabupaten Kuningan', '2021-10-20 06:08:53', '2021-10-20 06:08:53');
INSERT INTO `kabupaten` VALUES ('13383003-df28-43df-b3f0-bf8267cb6c02', '350ec59c-996d-436d-a29b-7179ec0c6202', '12', 'Kabupaten Wonogiri', '2021-10-20 05:39:52', '2021-10-20 06:00:04');
INSERT INTO `kabupaten` VALUES ('ab43aa04-a709-4532-b17e-7bb7bc18f49d', '7ad42caa-17b3-4de0-94b5-dde5a0253ca2', '09', 'Kabupaten Cirebon', '2021-10-20 06:01:41', '2021-10-20 06:01:41');
INSERT INTO `kabupaten` VALUES ('d7f3f757-f57e-4844-8f74-4f7886f8a4ed', '7ad42caa-17b3-4de0-94b5-dde5a0253ca2', '04', 'Kabupaten Bandung', '2021-10-20 05:38:07', '2021-10-20 06:07:46');

-- ----------------------------
-- Table structure for kaur_keuangan
-- ----------------------------
DROP TABLE IF EXISTS `kaur_keuangan`;
CREATE TABLE `kaur_keuangan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aktif` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kaur_keuangan_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `kaur_keuangan_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kaur_keuangan
-- ----------------------------
INSERT INTO `kaur_keuangan` VALUES ('0513d410-9fbe-4da1-9731-64ec78971991', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', 'Nana Suralaya', 'Kaur Keuangan Desa', 'Ya', '2021-10-24 00:17:41', '2021-10-24 00:17:41');
INSERT INTO `kaur_keuangan` VALUES ('ec8b220a-5ff2-4797-ad29-ce279e227d49', '235671f5-199c-4870-9f5a-e6d54b5a6a5c', 'Siska Narimah', 'Kaur Keuangan Desa', 'Ya', '2021-10-23 14:51:23', '2021-10-23 15:07:01');

-- ----------------------------
-- Table structure for kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kabupaten` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kecamatan_id_kabupaten_foreign`(`id_kabupaten`) USING BTREE,
  CONSTRAINT `kecamatan_id_kabupaten_foreign` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------
INSERT INTO `kecamatan` VALUES ('27fb1b03-1729-4387-83d9-8ab6cf1acf46', 'ab43aa04-a709-4532-b17e-7bb7bc18f49d', '03', 'Kecamatan Losari', '2021-10-20 09:42:09', '2021-10-20 10:26:47');
INSERT INTO `kecamatan` VALUES ('38094239-8993-4b4f-8d5e-2db6d3d8fc55', 'ab43aa04-a709-4532-b17e-7bb7bc18f49d', '01', 'Kecamatan Waled', '2021-10-20 06:41:55', '2021-10-20 06:41:55');
INSERT INTO `kecamatan` VALUES ('934cccc6-384d-49b3-87dd-b0bcb8806a82', 'ab43aa04-a709-4532-b17e-7bb7bc18f49d', '25', 'Kecamatan Panguragan', '2021-10-20 06:41:55', '2021-10-20 06:41:55');
INSERT INTO `kecamatan` VALUES ('97fbc7b0-dc82-4f92-b05f-75a76f771136', '1151733e-2b46-464b-83f4-f6e2fdc90890', '22', 'Kecamatan Pancalang', '2021-10-24 00:13:57', '2021-10-24 00:13:58');
INSERT INTO `kecamatan` VALUES ('add2fc6c-7b73-4669-961b-87cc213ea668', 'ab43aa04-a709-4532-b17e-7bb7bc18f49d', '04', 'Kecamatan Pabedilan', '2021-10-20 09:49:29', '2021-10-20 09:49:29');
INSERT INTO `kecamatan` VALUES ('bb1a64c9-0ed6-4866-a5d8-7284f9849f20', 'ab43aa04-a709-4532-b17e-7bb7bc18f49d', '24', 'Kecamatan Arjawinangun', '2021-10-20 06:41:55', '2021-10-20 06:41:55');
INSERT INTO `kecamatan` VALUES ('eeff7fac-0acf-48f2-9566-dc55d4955d35', 'ab43aa04-a709-4532-b17e-7bb7bc18f49d', '15', 'Kecamatan Sumber', '2021-10-20 06:41:55', '2021-10-20 09:49:04');

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sub_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kegiatan_id_sub_bidang_foreign`(`id_sub_bidang`) USING BTREE,
  CONSTRAINT `kegiatan_id_sub_bidang_foreign` FOREIGN KEY (`id_sub_bidang`) REFERENCES `sub_bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------
INSERT INTO `kegiatan` VALUES ('15881071-c5dc-49be-b511-e731677fa823', '5384c357-a0da-44d3-9a7f-812b849d6f93', '03', 'Penyediaan Jaminan Sosial bagi Kepala Desa dan Perangkat Desa', '2021-10-30 03:24:59', '2021-10-30 03:24:59');
INSERT INTO `kegiatan` VALUES ('b85fc60a-7c07-408d-bf06-1f69ef365856', '5384c357-a0da-44d3-9a7f-812b849d6f93', '01', 'Penyediaan Penghasilan Tetap dan Tunjangan Kepala Desa', '2021-10-26 18:10:01', '2021-10-26 18:10:01');
INSERT INTO `kegiatan` VALUES ('c001391d-902e-46aa-b06e-a84c05785d64', '5384c357-a0da-44d3-9a7f-812b849d6f93', '04', 'Penyediaan Operasional Pemerintah Desa', '2021-10-30 03:24:45', '2021-10-30 03:24:45');
INSERT INTO `kegiatan` VALUES ('c2ea1a4e-4157-4cd0-8500-ef1b1454db58', '5384c357-a0da-44d3-9a7f-812b849d6f93', '02', 'Penyediaan Penghasilan Tetap dan Tunjangan Perangkat Desa', '2021-10-26 18:10:11', '2021-10-26 18:10:11');

-- ----------------------------
-- Table structure for kepala_desa
-- ----------------------------
DROP TABLE IF EXISTS `kepala_desa`;
CREATE TABLE `kepala_desa`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_mulai_jabatan` date NULL DEFAULT NULL,
  `tanggal_akhir_jabatan` date NULL DEFAULT NULL,
  `aktif` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kepala_desa_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `kepala_desa_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kepala_desa
-- ----------------------------
INSERT INTO `kepala_desa` VALUES ('39391de5-8d68-45fb-bcb9-2488be8a25c5', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', 'Wahyudin, SE', 'Kuwu Pancalang', '2020-10-01', '2026-10-31', 'Ya', '2021-10-24 00:16:55', '2021-10-24 00:17:02');
INSERT INTO `kepala_desa` VALUES ('784a9152-d0b7-4f4e-a0dc-5ccf09156603', '235671f5-199c-4870-9f5a-e6d54b5a6a5c', 'Akhmad Musahid', 'Kuwu Desa Gujeg', '2021-10-01', '2027-10-31', 'Tidak', '2021-10-23 12:50:43', '2021-10-23 12:50:53');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 115 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (5, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (6, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_10_20_031237_create_provinsis_table', 2);
INSERT INTO `migrations` VALUES (13, '2021_10_20_042213_create_kabupatens_table', 3);
INSERT INTO `migrations` VALUES (15, '2021_10_20_063248_create_kecamatans_table', 4);
INSERT INTO `migrations` VALUES (17, '2021_10_20_095221_create_desas_table', 5);
INSERT INTO `migrations` VALUES (21, '2021_10_20_103832_create_bidangs_table', 6);
INSERT INTO `migrations` VALUES (26, '2021_10_20_103959_create_sub_bidangs_table', 7);
INSERT INTO `migrations` VALUES (31, '2021_10_20_104040_create_kegiatans_table', 8);
INSERT INTO `migrations` VALUES (34, '2021_10_20_155529_create_sumber_danas_table', 9);
INSERT INTO `migrations` VALUES (36, '2021_10_22_112915_create_rekening_akuns_table', 10);
INSERT INTO `migrations` VALUES (39, '2021_10_22_115908_create_rekening_kelompoks_table', 11);
INSERT INTO `migrations` VALUES (41, '2021_10_22_133022_create_rekening_jenis_table', 12);
INSERT INTO `migrations` VALUES (43, '2021_10_22_142559_create_rekening_objeks_table', 13);
INSERT INTO `migrations` VALUES (45, '2021_10_23_045852_add_desa_to_user', 14);
INSERT INTO `migrations` VALUES (47, '2021_10_23_112915_create_kepala_desas_table', 15);
INSERT INTO `migrations` VALUES (51, '2021_10_23_130054_create_sekretaris_desas_table', 16);
INSERT INTO `migrations` VALUES (53, '2021_10_23_142733_create_kaur_keuangans_table', 17);
INSERT INTO `migrations` VALUES (55, '2021_10_23_145832_create_pelaksana_kegiatans_table', 18);
INSERT INTO `migrations` VALUES (59, '2021_10_23_153400_create_perencanaan_visis_table', 19);
INSERT INTO `migrations` VALUES (61, '2021_10_24_012012_create_perencanaan_misis_table', 20);
INSERT INTO `migrations` VALUES (63, '2021_10_24_023137_create_perencanaan_tujuans_table', 21);
INSERT INTO `migrations` VALUES (65, '2021_10_24_044121_create_perencanaan_sasarans_table', 22);
INSERT INTO `migrations` VALUES (69, '2021_10_24_061632_add_footer_perencanaan_visi', 23);
INSERT INTO `migrations` VALUES (71, '2021_10_26_150231_create_r_p_j_m_d_bidangs_table', 24);
INSERT INTO `migrations` VALUES (73, '2021_10_26_160154_create_r_p_j_m_d_sub_bidangs_table', 25);
INSERT INTO `migrations` VALUES (75, '2021_10_26_171127_add_visi_to_rpjmd_bidang', 26);
INSERT INTO `migrations` VALUES (81, '2021_10_27_210631_create_r_p_j_m_d_kegiatans_table', 27);
INSERT INTO `migrations` VALUES (89, '2021_10_28_012336_create_rpjmd_tahun_kegiatans_table', 28);
INSERT INTO `migrations` VALUES (91, '2021_10_28_025305_create_r_p_j_m_d_dana_indikatifs_table', 29);
INSERT INTO `migrations` VALUES (93, '2021_10_31_150333_create_penganggaran_tahuns_table', 30);
INSERT INTO `migrations` VALUES (97, '2021_10_31_154851_create_penganggaran_bidangs_table', 31);
INSERT INTO `migrations` VALUES (99, '2021_11_07_132007_create_penganggaran_sub_bidangs_table', 32);
INSERT INTO `migrations` VALUES (103, '2021_11_07_140320_create_penganggaran_kegiatans_table', 33);
INSERT INTO `migrations` VALUES (108, '2021_11_07_154450_create_penganggaran_paket_kegiatans_table', 34);
INSERT INTO `migrations` VALUES (114, '2021_11_09_151932_create_penganggaran_pendapatans_table', 35);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pelaksana_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `pelaksana_kegiatan`;
CREATE TABLE `pelaksana_kegiatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aktif` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pelaksana_kegiatan_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `pelaksana_kegiatan_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelaksana_kegiatan
-- ----------------------------
INSERT INTO `pelaksana_kegiatan` VALUES ('4e351124-1d65-4ace-8039-d0228ee8d9c7', '235671f5-199c-4870-9f5a-e6d54b5a6a5c', 'Anwar Hamzah', 'Kaur Perencanaan', 'Ya', '2021-10-23 15:15:33', '2021-10-23 15:15:33');
INSERT INTO `pelaksana_kegiatan` VALUES ('52b64db8-ef70-4d95-9ba9-1137cb048e9f', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', 'Junaedi', 'Kasi Tata Usaha dan Umum', 'Ya', '2021-10-24 00:18:19', '2021-10-24 00:18:19');
INSERT INTO `pelaksana_kegiatan` VALUES ('74b826c1-c119-46f5-908e-a094f26d9ae8', '235671f5-199c-4870-9f5a-e6d54b5a6a5c', 'Sudarsono', 'Kasi Pembangunan', 'Ya', '2021-10-23 15:15:09', '2021-10-23 15:15:09');
INSERT INTO `pelaksana_kegiatan` VALUES ('9f112f35-51bb-42f8-8b59-016d2cefb4ba', '235671f5-199c-4870-9f5a-e6d54b5a6a5c', 'Agus Yudianto', 'Kasi Pemerintahan', 'Ya', '2021-10-23 15:14:20', '2021-10-23 15:14:20');
INSERT INTO `pelaksana_kegiatan` VALUES ('cd0d95fb-a6e2-4fda-8f1c-c7355eb74066', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', 'Nana Mirana', 'Kasi Pemerintahan', 'Ya', '2021-10-24 00:17:55', '2021-10-24 00:18:00');

-- ----------------------------
-- Table structure for penganggaran_bidang
-- ----------------------------
DROP TABLE IF EXISTS `penganggaran_bidang`;
CREATE TABLE `penganggaran_bidang`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_penganggaran_tahun` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penganggaran_bidang_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `penganggaran_bidang_id_bidang_foreign`(`id_bidang`) USING BTREE,
  INDEX `penganggaran_bidang_id_penganggaran_tahun_foreign`(`id_penganggaran_tahun`) USING BTREE,
  CONSTRAINT `penganggaran_bidang_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_bidang_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_bidang_id_penganggaran_tahun_foreign` FOREIGN KEY (`id_penganggaran_tahun`) REFERENCES `penganggaran_tahun` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penganggaran_bidang
-- ----------------------------
INSERT INTO `penganggaran_bidang` VALUES ('3c59f117-3a61-46af-ab3f-720c5fc574e4', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '4d1b8ddb-702a-4f1b-ab89-3acb47580d32', 'a16e8374-d14b-4587-b3a8-a9d22f73e020', '2021-11-09 15:12:26', '2021-11-09 15:12:26');
INSERT INTO `penganggaran_bidang` VALUES ('441580e6-a313-4a7d-9073-0a2b99a64862', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '77b27188-bf8b-4351-82bb-b3014d290bec', 'a16e8374-d14b-4587-b3a8-a9d22f73e020', '2021-11-09 15:12:26', '2021-11-09 15:12:26');
INSERT INTO `penganggaran_bidang` VALUES ('5addba93-fee7-4e66-ada3-4dacd43cc796', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '4d1b8ddb-702a-4f1b-ab89-3acb47580d32', NULL, '2021-11-07 13:03:37', '2021-11-07 13:03:37');
INSERT INTO `penganggaran_bidang` VALUES ('6804f80a-a152-4742-82f2-2382b2975971', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '77b27188-bf8b-4351-82bb-b3014d290bec', NULL, '2021-11-07 13:03:37', '2021-11-07 13:03:37');
INSERT INTO `penganggaran_bidang` VALUES ('93bf43b8-42d1-4799-a2dd-f1ca0206e4a9', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '31a719ea-8940-476c-8ef6-be508c5fc21e', NULL, '2021-11-07 13:03:37', '2021-11-07 13:03:37');
INSERT INTO `penganggaran_bidang` VALUES ('9b6461de-c0e4-42b6-898e-1ef6c4a5e963', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', 'a16e8374-d14b-4587-b3a8-a9d22f73e020', '2021-11-09 15:12:26', '2021-11-09 15:12:26');
INSERT INTO `penganggaran_bidang` VALUES ('9cb4be55-c231-4459-8254-bda65944cbd0', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', NULL, '2021-11-07 13:03:37', '2021-11-07 13:03:37');
INSERT INTO `penganggaran_bidang` VALUES ('bc1100ad-3f36-468d-9af4-033a94dfd330', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '6500c605-373d-4dc7-a9ca-86089286fdfa', NULL, '2021-11-07 13:03:37', '2021-11-07 13:03:37');
INSERT INTO `penganggaran_bidang` VALUES ('da5758b4-cb77-45ad-b42c-385f888f5867', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '31a719ea-8940-476c-8ef6-be508c5fc21e', 'a16e8374-d14b-4587-b3a8-a9d22f73e020', '2021-11-09 15:12:26', '2021-11-09 15:12:26');
INSERT INTO `penganggaran_bidang` VALUES ('dee68a5e-0f82-400e-9833-94297ac5ed0b', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '6500c605-373d-4dc7-a9ca-86089286fdfa', 'a16e8374-d14b-4587-b3a8-a9d22f73e020', '2021-11-09 15:12:26', '2021-11-09 15:12:26');

-- ----------------------------
-- Table structure for penganggaran_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `penganggaran_kegiatan`;
CREATE TABLE `penganggaran_kegiatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penganggaran_sub_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_kegiatan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_pelaksana` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `waktu_pelaksanaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pagu` bigint(20) NULL DEFAULT 0,
  `keluaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `volume` int(10) UNSIGNED NULL DEFAULT NULL,
  `satuan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penganggaran_kegiatan_id_penganggaran_sub_bidang_foreign`(`id_penganggaran_sub_bidang`) USING BTREE,
  INDEX `penganggaran_kegiatan_id_kegiatan_foreign`(`id_kegiatan`) USING BTREE,
  INDEX `penganggaran_kegiatan_id_pelaksana_foreign`(`id_pelaksana`) USING BTREE,
  CONSTRAINT `penganggaran_kegiatan_id_kegiatan_foreign` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_kegiatan_id_pelaksana_foreign` FOREIGN KEY (`id_pelaksana`) REFERENCES `pelaksana_kegiatan` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_kegiatan_id_penganggaran_sub_bidang_foreign` FOREIGN KEY (`id_penganggaran_sub_bidang`) REFERENCES `penganggaran_sub_bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penganggaran_kegiatan
-- ----------------------------
INSERT INTO `penganggaran_kegiatan` VALUES ('00e9a3d8-feab-4c2c-8770-da7d51e46e1a', NULL, 'b85fc60a-7c07-408d-bf06-1f69ef365856', '52b64db8-ef70-4d95-9ba9-1137cb048e9f', 'Desa Pancalang', '12 Bulan', 48600000, 'Terbayanya Siltap dan Tunjangan Kepala Desa', 100, '%', '2021-11-08 23:11:53', '2021-11-08 23:11:53');
INSERT INTO `penganggaran_kegiatan` VALUES ('35d6414e-e061-434a-87f9-d66065dae1f3', '2d7d9c5b-52c8-4bcc-a61e-a51ded8f3e4b', 'b85fc60a-7c07-408d-bf06-1f69ef365856', '52b64db8-ef70-4d95-9ba9-1137cb048e9f', 'Desa Pancalang', '12 Bulan', 360000000, 'Terbayarnya Siltap dan Tunjangan Perangkat Desa', 100, '%', '2021-11-07 15:39:02', '2021-11-07 15:39:02');

-- ----------------------------
-- Table structure for penganggaran_paket_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `penganggaran_paket_kegiatan`;
CREATE TABLE `penganggaran_paket_kegiatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penganggaran_kegiatan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sumber_dana` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_paket` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nilai_paket` bigint(20) NULL DEFAULT 0,
  `pola` enum('Swakelola','Kerjasama','Pihak Ketiga') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sifat_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `volume_paket` int(10) UNSIGNED NULL DEFAULT 0,
  `lokasi_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penganggaran_paket_kegiatan_id_penganggaran_kegiatan_foreign`(`id_penganggaran_kegiatan`) USING BTREE,
  INDEX `penganggaran_paket_kegiatan_id_sumber_dana_foreign`(`id_sumber_dana`) USING BTREE,
  CONSTRAINT `penganggaran_paket_kegiatan_id_penganggaran_kegiatan_foreign` FOREIGN KEY (`id_penganggaran_kegiatan`) REFERENCES `penganggaran_kegiatan` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_paket_kegiatan_id_sumber_dana_foreign` FOREIGN KEY (`id_sumber_dana`) REFERENCES `sumber_dana` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for penganggaran_pendapatan
-- ----------------------------
DROP TABLE IF EXISTS `penganggaran_pendapatan`;
CREATE TABLE `penganggaran_pendapatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penganggaran_tahun` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_rekening_objek` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sumber_dana` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uraian` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `volume` int(10) UNSIGNED NULL DEFAULT 0,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `harga_satuan` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penganggaran_pendapatan_id_penganggaran_tahun_foreign`(`id_penganggaran_tahun`) USING BTREE,
  INDEX `penganggaran_pendapatan_id_rekening_objek_foreign`(`id_rekening_objek`) USING BTREE,
  INDEX `penganggaran_pendapatan_id_sumber_dana_foreign`(`id_sumber_dana`) USING BTREE,
  CONSTRAINT `penganggaran_pendapatan_id_penganggaran_tahun_foreign` FOREIGN KEY (`id_penganggaran_tahun`) REFERENCES `penganggaran_tahun` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_pendapatan_id_rekening_objek_foreign` FOREIGN KEY (`id_rekening_objek`) REFERENCES `rekening_objek` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_pendapatan_id_sumber_dana_foreign` FOREIGN KEY (`id_sumber_dana`) REFERENCES `sumber_dana` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for penganggaran_sub_bidang
-- ----------------------------
DROP TABLE IF EXISTS `penganggaran_sub_bidang`;
CREATE TABLE `penganggaran_sub_bidang`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penganggaran_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sub_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penganggaran_sub_bidang_id_penganggaran_bidang_foreign`(`id_penganggaran_bidang`) USING BTREE,
  INDEX `penganggaran_sub_bidang_id_sub_bidang_foreign`(`id_sub_bidang`) USING BTREE,
  CONSTRAINT `penganggaran_sub_bidang_id_penganggaran_bidang_foreign` FOREIGN KEY (`id_penganggaran_bidang`) REFERENCES `penganggaran_bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `penganggaran_sub_bidang_id_sub_bidang_foreign` FOREIGN KEY (`id_sub_bidang`) REFERENCES `sub_bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penganggaran_sub_bidang
-- ----------------------------
INSERT INTO `penganggaran_sub_bidang` VALUES ('01b5bcb2-ae76-4904-ad63-4196df1b7287', '9cb4be55-c231-4459-8254-bda65944cbd0', 'c02fd5ac-ae5e-450b-aa1a-8d1069f70e38', '2021-11-07 13:44:45', '2021-11-07 13:44:45');
INSERT INTO `penganggaran_sub_bidang` VALUES ('18e33513-52a3-468c-baac-0f5c00ecbd6f', '441580e6-a313-4a7d-9073-0a2b99a64862', 'f3b8effc-8208-4141-bae9-e02bb8444a83', '2021-11-09 15:12:37', '2021-11-09 15:12:37');
INSERT INTO `penganggaran_sub_bidang` VALUES ('219a5bfb-4eeb-42c9-be93-99eaf1aa3c92', '441580e6-a313-4a7d-9073-0a2b99a64862', '3085ffa7-9c21-487f-b97c-0ec405d75535', '2021-11-09 15:12:37', '2021-11-09 15:12:37');
INSERT INTO `penganggaran_sub_bidang` VALUES ('287840e9-4073-44ef-87d2-3c815e317d97', '9cb4be55-c231-4459-8254-bda65944cbd0', 'a93f06c2-0a37-43dc-9b1b-0ac50269f9b9', '2021-11-07 13:44:45', '2021-11-07 13:44:45');
INSERT INTO `penganggaran_sub_bidang` VALUES ('2d7d9c5b-52c8-4bcc-a61e-a51ded8f3e4b', '6804f80a-a152-4742-82f2-2382b2975971', '5384c357-a0da-44d3-9a7f-812b849d6f93', '2021-11-07 13:44:57', '2021-11-07 13:44:57');
INSERT INTO `penganggaran_sub_bidang` VALUES ('30c41b3a-b63e-4b51-98e3-cad7b77cf03f', '9cb4be55-c231-4459-8254-bda65944cbd0', '91774c62-75c1-4941-881f-fe13e430f294', '2021-11-07 13:44:45', '2021-11-07 13:44:45');
INSERT INTO `penganggaran_sub_bidang` VALUES ('40a4f593-db43-408e-9ccc-97b189d71967', '441580e6-a313-4a7d-9073-0a2b99a64862', '5985cf97-8a40-4faa-a1f9-d4f938f60e8e', '2021-11-09 15:12:37', '2021-11-09 15:12:37');
INSERT INTO `penganggaran_sub_bidang` VALUES ('697d862f-2aeb-46a9-aa3e-23db7908816e', '441580e6-a313-4a7d-9073-0a2b99a64862', '5384c357-a0da-44d3-9a7f-812b849d6f93', '2021-11-09 15:12:37', '2021-11-09 15:12:37');
INSERT INTO `penganggaran_sub_bidang` VALUES ('6a1a0b28-1d3b-4a7e-85b2-6d5bdac7e158', '9cb4be55-c231-4459-8254-bda65944cbd0', '1058025f-e966-43a0-8fe0-58927070a6cb', '2021-11-07 13:44:45', '2021-11-07 13:44:45');
INSERT INTO `penganggaran_sub_bidang` VALUES ('6ae31322-86dd-4b2f-bed6-aa8775d2bf41', '441580e6-a313-4a7d-9073-0a2b99a64862', '85d45c53-d6f8-4515-8e64-5c637bbea5e3', '2021-11-09 15:12:37', '2021-11-09 15:12:37');
INSERT INTO `penganggaran_sub_bidang` VALUES ('7f3f3fe7-a166-4cc6-af9b-5b7be83171cb', '9cb4be55-c231-4459-8254-bda65944cbd0', 'a074d2b2-bbca-41c7-a091-d2f235cad95e', '2021-11-07 13:44:45', '2021-11-07 13:44:45');
INSERT INTO `penganggaran_sub_bidang` VALUES ('85cf41b2-b352-4799-b532-f4a9c3f3dbf0', '6804f80a-a152-4742-82f2-2382b2975971', '3085ffa7-9c21-487f-b97c-0ec405d75535', '2021-11-07 13:44:57', '2021-11-07 13:44:57');
INSERT INTO `penganggaran_sub_bidang` VALUES ('8d46a23a-666c-4277-adce-656d248755c0', '9cb4be55-c231-4459-8254-bda65944cbd0', '14f2d6fe-eed7-4809-bc4b-263081725a5f', '2021-11-07 13:44:45', '2021-11-07 13:44:45');
INSERT INTO `penganggaran_sub_bidang` VALUES ('b79b1a01-ccd3-4019-b773-396050fb9156', '9cb4be55-c231-4459-8254-bda65944cbd0', '71fb5328-c499-48ef-9e0b-7ad07b50b8ab', '2021-11-07 13:44:45', '2021-11-07 13:44:45');
INSERT INTO `penganggaran_sub_bidang` VALUES ('d9724c44-a8ac-400e-bcb7-76d811f071a4', '6804f80a-a152-4742-82f2-2382b2975971', 'f3b8effc-8208-4141-bae9-e02bb8444a83', '2021-11-07 13:44:57', '2021-11-07 13:44:57');
INSERT INTO `penganggaran_sub_bidang` VALUES ('f5fddc4f-f171-4af4-a8dd-dbf6646eaf3f', '6804f80a-a152-4742-82f2-2382b2975971', '85d45c53-d6f8-4515-8e64-5c637bbea5e3', '2021-11-07 13:44:57', '2021-11-07 13:44:57');
INSERT INTO `penganggaran_sub_bidang` VALUES ('fba6139a-8012-4e94-b240-8e9a6c4f3f78', '6804f80a-a152-4742-82f2-2382b2975971', '5985cf97-8a40-4faa-a1f9-d4f938f60e8e', '2021-11-07 13:44:57', '2021-11-07 13:44:57');

-- ----------------------------
-- Table structure for penganggaran_tahun
-- ----------------------------
DROP TABLE IF EXISTS `penganggaran_tahun`;
CREATE TABLE `penganggaran_tahun`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penganggaran_tahun_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `penganggaran_tahun_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penganggaran_tahun
-- ----------------------------
INSERT INTO `penganggaran_tahun` VALUES ('a16e8374-d14b-4587-b3a8-a9d22f73e020', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', 2020, '2021-11-09 15:11:21', '2021-11-09 15:11:21');

-- ----------------------------
-- Table structure for perencanaan_misi
-- ----------------------------
DROP TABLE IF EXISTS `perencanaan_misi`;
CREATE TABLE `perencanaan_misi`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_visi` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uraian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `perencanaan_misi_id_visi_foreign`(`id_visi`) USING BTREE,
  CONSTRAINT `perencanaan_misi_id_visi_foreign` FOREIGN KEY (`id_visi`) REFERENCES `perencanaan_visi` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perencanaan_misi
-- ----------------------------
INSERT INTO `perencanaan_misi` VALUES ('28b3629a-f4fc-4b1f-82a2-f7d025e2e693', '613d4982-264e-47dd-a8b9-76ab929345d6', '01', 'Mewujudkan pemerintahan desa yang tertib dan berwibawa', '2021-10-25 14:41:09', '2021-10-25 14:41:09');
INSERT INTO `perencanaan_misi` VALUES ('30ea4f1f-b5d7-41b0-b83d-8a5ecb023fbb', '613d4982-264e-47dd-a8b9-76ab929345d6', '03', 'Mewujudkan keamanan dan kesejahteraan warga desa', '2021-10-25 15:47:22', '2021-10-25 15:47:22');
INSERT INTO `perencanaan_misi` VALUES ('aeaf87c2-28fe-459d-a3b5-d101511d5161', '613d4982-264e-47dd-a8b9-76ab929345d6', '02', 'Mewujudkan Sarana Prasarana Desa Yang Memadai', '2021-10-25 14:44:57', '2021-10-25 14:44:57');

-- ----------------------------
-- Table structure for perencanaan_sasaran
-- ----------------------------
DROP TABLE IF EXISTS `perencanaan_sasaran`;
CREATE TABLE `perencanaan_sasaran`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tujuan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uraian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `perencanaan_sasaran_id_tujuan_foreign`(`id_tujuan`) USING BTREE,
  CONSTRAINT `perencanaan_sasaran_id_tujuan_foreign` FOREIGN KEY (`id_tujuan`) REFERENCES `perencanaan_tujuan` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perencanaan_sasaran
-- ----------------------------
INSERT INTO `perencanaan_sasaran` VALUES ('3bc3a7d7-8f81-490d-88b9-7a02db73c151', 'd430d9e8-abb1-41e8-a8a0-b3e7365eff61', '03', 'Tersedianya layanan kepada masyarakat desa yang memuaskan', '2021-10-25 14:42:36', '2021-10-25 14:42:36');
INSERT INTO `perencanaan_sasaran` VALUES ('49068d7b-121f-4134-b065-f2553c29f12d', '17030614-78da-4c6a-bbbd-3a3b70c32f32', '02', 'Tersedianya perencanaan pembangunan desa', '2021-10-25 14:49:36', '2021-10-25 14:49:36');
INSERT INTO `perencanaan_sasaran` VALUES ('4ef40659-8139-482d-86ed-af055407250b', 'd430d9e8-abb1-41e8-a8a0-b3e7365eff61', '02', 'Tersedianya sarana dan prasarana desa yang mendukung pelayanan masyarakat desa', '2021-10-25 14:42:13', '2021-10-25 14:42:13');
INSERT INTO `perencanaan_sasaran` VALUES ('4f177760-99d4-43a4-a6af-56b6b56f0c4a', '9f10e377-6544-40c3-9025-c78870820e11', '02', 'Tersedianya jalan lingkungan yang baik', '2021-10-25 14:45:41', '2021-10-25 14:45:41');
INSERT INTO `perencanaan_sasaran` VALUES ('5243ae6b-caf7-471a-ac7e-45d6089cbedf', '9f10e377-6544-40c3-9025-c78870820e11', '01', 'Tersedianya jalan desa yang baik dan memadai', '2021-10-25 14:45:31', '2021-10-25 14:45:31');
INSERT INTO `perencanaan_sasaran` VALUES ('552f864b-00ca-4e58-bfef-d12acff54199', 'd430d9e8-abb1-41e8-a8a0-b3e7365eff61', '01', 'Tersedianya aparatur desa yang siap melayani masyarakat', '2021-10-25 14:41:53', '2021-10-25 14:41:53');
INSERT INTO `perencanaan_sasaran` VALUES ('57d393ee-fb3f-4009-96f9-4eb399914b65', 'ef2782b6-e7ec-434b-8426-772f671dccc9', '01', 'Terselenggaranya pelatihan usaha produksi rumah tangga desa', '2021-10-25 15:48:05', '2021-10-25 15:48:05');
INSERT INTO `perencanaan_sasaran` VALUES ('5b9d11f0-fab0-40d6-92c5-8a0d2fd6b40a', 'ef2782b6-e7ec-434b-8426-772f671dccc9', '02', 'Terbinanya kelompok usaha industri rumah tangga desa', '2021-10-25 15:48:14', '2021-10-25 15:48:14');
INSERT INTO `perencanaan_sasaran` VALUES ('971414c2-6737-4e02-a69c-7dd2e8c99f8f', '17030614-78da-4c6a-bbbd-3a3b70c32f32', '01', 'Tersedianya data dan informasi desa', '2021-10-25 14:49:26', '2021-10-25 14:49:26');
INSERT INTO `perencanaan_sasaran` VALUES ('f0bd40e3-50ee-4007-a204-11b9d55ef253', 'cfd68f98-8c30-400d-af0e-1bd0ced2a715', '01', 'Tersedianya saluran irigasi sawah yang baik', '2021-10-26 14:08:59', '2021-10-26 14:08:59');
INSERT INTO `perencanaan_sasaran` VALUES ('fc9e9738-be73-44f2-83b1-6892278ec938', 'cfd68f98-8c30-400d-af0e-1bd0ced2a715', '02', 'Terbentuknya himpunan kelompok petani pemakai air yang rukun dan bersahaja', '2021-10-26 14:09:12', '2021-10-26 14:09:12');

-- ----------------------------
-- Table structure for perencanaan_tujuan
-- ----------------------------
DROP TABLE IF EXISTS `perencanaan_tujuan`;
CREATE TABLE `perencanaan_tujuan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_misi` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uraian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `perencanaan_tujuan_id_misi_foreign`(`id_misi`) USING BTREE,
  CONSTRAINT `perencanaan_tujuan_id_misi_foreign` FOREIGN KEY (`id_misi`) REFERENCES `perencanaan_misi` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perencanaan_tujuan
-- ----------------------------
INSERT INTO `perencanaan_tujuan` VALUES ('17030614-78da-4c6a-bbbd-3a3b70c32f32', '28b3629a-f4fc-4b1f-82a2-f7d025e2e693', '02', 'Terwujudnya Tata Perencanaan Desa yang baik', '2021-10-25 14:49:12', '2021-10-25 14:49:13');
INSERT INTO `perencanaan_tujuan` VALUES ('4a5b99c4-f468-477b-8096-86a405a2d169', 'aeaf87c2-28fe-459d-a3b5-d101511d5161', '03', 'Terwujudnya sarana dan prasarana pendidikan memadai', '2021-10-26 14:08:23', '2021-10-26 14:08:23');
INSERT INTO `perencanaan_tujuan` VALUES ('9f10e377-6544-40c3-9025-c78870820e11', 'aeaf87c2-28fe-459d-a3b5-d101511d5161', '01', 'Terwujudnya sarana jalan yang dapat mendukung perekonomian warga desa', '2021-10-25 14:45:19', '2021-10-25 14:45:19');
INSERT INTO `perencanaan_tujuan` VALUES ('cfd68f98-8c30-400d-af0e-1bd0ced2a715', 'aeaf87c2-28fe-459d-a3b5-d101511d5161', '02', 'Terwujudnya sarana irigasi pertanian untuk peningkatan produksi hasil pertanian masyarakat desa', '2021-10-26 14:08:06', '2021-10-26 14:08:06');
INSERT INTO `perencanaan_tujuan` VALUES ('d430d9e8-abb1-41e8-a8a0-b3e7365eff61', '28b3629a-f4fc-4b1f-82a2-f7d025e2e693', '01', 'Terwujudnya kegiatan pemerintahan desa yang tertib dan lancar', '2021-10-25 14:41:28', '2021-10-25 14:41:28');
INSERT INTO `perencanaan_tujuan` VALUES ('ef2782b6-e7ec-434b-8426-772f671dccc9', '30ea4f1f-b5d7-41b0-b83d-8a5ecb023fbb', '01', 'Meningkatnya usaha ekonomi produktif warga', '2021-10-25 15:47:36', '2021-10-25 15:47:36');

-- ----------------------------
-- Table structure for perencanaan_visi
-- ----------------------------
DROP TABLE IF EXISTS `perencanaan_visi`;
CREATE TABLE `perencanaan_visi`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uraian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `tahun_awal` int(10) UNSIGNED NULL DEFAULT NULL,
  `tahun_akhir` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tempat` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_penetapan` date NULL DEFAULT NULL,
  `id_kepala_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sekretaris_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `perencanaan_visi_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `perencanaan_visi_id_kepala_desa_foreign`(`id_kepala_desa`) USING BTREE,
  INDEX `perencanaan_visi_id_sekretaris_desa_foreign`(`id_sekretaris_desa`) USING BTREE,
  CONSTRAINT `perencanaan_visi_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `perencanaan_visi_id_kepala_desa_foreign` FOREIGN KEY (`id_kepala_desa`) REFERENCES `kepala_desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `perencanaan_visi_id_sekretaris_desa_foreign` FOREIGN KEY (`id_sekretaris_desa`) REFERENCES `sekretaris_desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perencanaan_visi
-- ----------------------------
INSERT INTO `perencanaan_visi` VALUES ('613d4982-264e-47dd-a8b9-76ab929345d6', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '01', 'Terciptanya Desa Pancalang yang Makmur dan Sejahtera', 2020, 2026, '2021-10-24 01:05:30', '2021-10-24 07:17:29', 'Kuningan', '2021-10-24', '39391de5-8d68-45fb-bcb9-2488be8a25c5', 'adbf1a32-e1cd-4693-b41d-3626f45e22d6');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
INSERT INTO `provinsi` VALUES ('350ec59c-996d-436d-a29b-7179ec0c6202', '33', 'Jawa Tengah', '2021-10-20 05:52:15', '2021-10-20 05:52:15');
INSERT INTO `provinsi` VALUES ('7ad42caa-17b3-4de0-94b5-dde5a0253ca2', '32', 'Jawa Barat', '2021-10-20 04:10:30', '2021-10-20 05:52:23');

-- ----------------------------
-- Table structure for rekening_akun
-- ----------------------------
DROP TABLE IF EXISTS `rekening_akun`;
CREATE TABLE `rekening_akun`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekening_akun
-- ----------------------------
INSERT INTO `rekening_akun` VALUES ('1a67e807-85e1-4203-b321-d847fff31d3a', '6', 'Pembiayaan', '2021-10-22 11:36:49', '2021-10-22 11:36:49');
INSERT INTO `rekening_akun` VALUES ('48e4d0e1-5a71-4a0b-a37d-d204c8239bd9', '7', 'Non Anggaran', '2021-10-22 11:36:49', '2021-10-22 11:36:49');
INSERT INTO `rekening_akun` VALUES ('900218ae-fac0-48e4-8248-083ec7b857cd', '4', 'Pendapatan', '2021-10-22 11:36:49', '2021-10-22 11:56:39');
INSERT INTO `rekening_akun` VALUES ('9adfa138-b91f-4086-aaef-386b7d517a9b', '3', 'Ekuitas', '2021-10-22 11:36:49', '2021-10-22 11:36:49');
INSERT INTO `rekening_akun` VALUES ('d7cbacea-60c4-4c20-99cb-fb7384bea6df', '5', 'Belanja', '2021-10-22 11:36:49', '2021-10-22 11:36:49');
INSERT INTO `rekening_akun` VALUES ('dd748c02-13ef-4239-8bd9-59c1325b74e8', '2', 'Kewajiban', '2021-10-22 11:36:49', '2021-10-22 11:36:49');
INSERT INTO `rekening_akun` VALUES ('df4b61b1-86b7-4d34-a07e-7fdd89181e56', '1', 'Aset', '2021-10-22 11:36:49', '2021-10-22 11:36:49');

-- ----------------------------
-- Table structure for rekening_jenis
-- ----------------------------
DROP TABLE IF EXISTS `rekening_jenis`;
CREATE TABLE `rekening_jenis`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelompok` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rekening_jenis_id_kelompok_foreign`(`id_kelompok`) USING BTREE,
  CONSTRAINT `rekening_jenis_id_kelompok_foreign` FOREIGN KEY (`id_kelompok`) REFERENCES `rekening_kelompok` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekening_jenis
-- ----------------------------
INSERT INTO `rekening_jenis` VALUES ('20a09729-244d-42db-8a8e-89e546caeb76', '9d956fbd-b008-4e4f-9d17-d8b09d606c72', 'Piutang', '3', '2021-10-22 14:07:45', '2021-10-22 14:07:45');
INSERT INTO `rekening_jenis` VALUES ('216abe7a-35df-468a-b3f2-31fd542bad58', '3117fae8-a342-4a19-b90b-ff7baa5dfb05', 'Investasi Jangka Panjang Non Permanen', '1', '2021-10-22 14:36:56', '2021-10-22 14:36:56');
INSERT INTO `rekening_jenis` VALUES ('223a348b-ab97-4932-bf41-cf0e88b850cd', 'd51a3cd8-20df-437f-9c9b-6a5444e808a3', 'Jalan, Irigasi dan Jaringan', '4', '2021-10-22 14:40:07', '2021-10-22 14:40:07');
INSERT INTO `rekening_jenis` VALUES ('255a0fd7-fd02-4afa-ac0d-85d708ca5779', 'd51a3cd8-20df-437f-9c9b-6a5444e808a3', 'Gedung dan Bangunan', '3', '2021-10-22 14:39:38', '2021-10-22 14:39:44');
INSERT INTO `rekening_jenis` VALUES ('28dfb554-3677-4878-bbb7-2cfcebe757ec', '9d956fbd-b008-4e4f-9d17-d8b09d606c72', 'Persediaan', '4', '2021-10-22 14:07:58', '2021-10-22 14:24:39');
INSERT INTO `rekening_jenis` VALUES ('4655774e-e73e-43c7-8143-a0afdfd4eb2e', '5807d0cd-e6f7-44ba-b0ef-1be1e7cd517a', 'Bagian dari Hasil Pajak dan Retribusi Daerah Kabupaten/kota', '2', '2021-10-22 16:59:49', '2021-10-22 16:59:49');
INSERT INTO `rekening_jenis` VALUES ('58c1a50e-d913-489f-8001-094f8dc69eaa', 'd51a3cd8-20df-437f-9c9b-6a5444e808a3', 'Peralatan dan Mesin', '2', '2021-10-22 14:39:16', '2021-10-22 14:39:16');
INSERT INTO `rekening_jenis` VALUES ('598966e6-5a91-452f-b8a0-300bea0bed5c', '5807d0cd-e6f7-44ba-b0ef-1be1e7cd517a', 'Bantuan Keuangan Provinsi', '4', '2021-10-22 17:00:12', '2021-10-22 17:00:21');
INSERT INTO `rekening_jenis` VALUES ('63a5776a-be42-4249-956a-6e4fc4a5950a', '25023328-1045-49e8-a090-54836379ff01', 'Swadaya, Partisipasi dan Gotong Royong', '3', '2021-10-22 16:54:47', '2021-10-22 16:54:47');
INSERT INTO `rekening_jenis` VALUES ('8437846f-be43-4500-8289-ef9d5575945e', '25023328-1045-49e8-a090-54836379ff01', 'Hasil Usaha', '1', '2021-10-22 16:53:19', '2021-10-22 16:53:19');
INSERT INTO `rekening_jenis` VALUES ('8a34e31d-e047-41c0-ab12-13a39d98e239', 'd51a3cd8-20df-437f-9c9b-6a5444e808a3', 'Aset Tetap Lainnya', '5', '2021-10-22 14:40:20', '2021-10-22 14:40:20');
INSERT INTO `rekening_jenis` VALUES ('8d40692f-04ab-4635-bf47-f0e91c97c2cf', '25023328-1045-49e8-a090-54836379ff01', 'Lain-Lain Pendapatan Asli Desa', '4', '2021-10-22 16:55:26', '2021-10-22 16:55:26');
INSERT INTO `rekening_jenis` VALUES ('978014b8-f930-4588-bcdb-27b16fae8797', '6542971b-ba24-4288-a51e-33a3bc8335a9', 'Penghasilan Tetap dan Tunjangan', '1', '2021-11-09 14:37:01', '2021-11-09 14:37:01');
INSERT INTO `rekening_jenis` VALUES ('a2637e71-ec4e-47df-b618-d4cb65ae0295', 'd51a3cd8-20df-437f-9c9b-6a5444e808a3', 'Tanah', '1', '2021-10-22 14:37:59', '2021-10-22 14:37:59');
INSERT INTO `rekening_jenis` VALUES ('aebd4441-04ea-4121-8bcf-8afd95648d26', '25023328-1045-49e8-a090-54836379ff01', 'Hasil Aset', '2', '2021-10-22 16:53:35', '2021-10-22 16:53:35');
INSERT INTO `rekening_jenis` VALUES ('c35023bb-93df-4292-9f2a-73068af642fd', '9d956fbd-b008-4e4f-9d17-d8b09d606c72', 'Kas', '1', '2021-10-22 13:42:05', '2021-10-22 14:24:21');
INSERT INTO `rekening_jenis` VALUES ('c4c650e6-ec26-4cd0-beba-fdc7886ef8dc', '5807d0cd-e6f7-44ba-b0ef-1be1e7cd517a', 'Dana Desa', '1', '2021-10-22 16:59:36', '2021-10-22 16:59:36');
INSERT INTO `rekening_jenis` VALUES ('e0aa3d9d-0f81-45a4-b6f8-a0a96fc8804d', '5807d0cd-e6f7-44ba-b0ef-1be1e7cd517a', 'Bantuan Keuangan APBD Kabupaten/Kota', '5', '2021-10-22 17:00:38', '2021-10-22 17:00:38');
INSERT INTO `rekening_jenis` VALUES ('ec66a17b-47c6-4d02-985b-fd49ed6f5670', 'd51a3cd8-20df-437f-9c9b-6a5444e808a3', 'Konstruksi dalam Pengerjaan', '6', '2021-10-22 14:40:40', '2021-10-22 14:40:40');
INSERT INTO `rekening_jenis` VALUES ('f2ea3e9c-ceb0-499b-b517-e59b5821d798', '5807d0cd-e6f7-44ba-b0ef-1be1e7cd517a', 'Alokasi Dana Desa', '3', '2021-10-22 16:59:58', '2021-10-22 16:59:58');
INSERT INTO `rekening_jenis` VALUES ('f71ebe8e-0edd-47c3-b00e-1483badb1a1d', '9d956fbd-b008-4e4f-9d17-d8b09d606c72', 'Investasi Jangka Pendek', '2', '2021-10-22 13:42:05', '2021-10-22 13:42:05');

-- ----------------------------
-- Table structure for rekening_kelompok
-- ----------------------------
DROP TABLE IF EXISTS `rekening_kelompok`;
CREATE TABLE `rekening_kelompok`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_akun` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rekening_kelompok_id_akun_foreign`(`id_akun`) USING BTREE,
  CONSTRAINT `rekening_kelompok_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `rekening_akun` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekening_kelompok
-- ----------------------------
INSERT INTO `rekening_kelompok` VALUES ('21d653a2-f76a-47df-a6bb-06d432a8b61e', 'dd748c02-13ef-4239-8bd9-59c1325b74e8', 'Kewajiban Jangka Panjang', '2', '2021-10-22 13:55:57', '2021-10-22 13:55:57');
INSERT INTO `rekening_kelompok` VALUES ('25023328-1045-49e8-a090-54836379ff01', '900218ae-fac0-48e4-8248-083ec7b857cd', 'Pendapatan Asli Desa (PAD)', '1', '2021-10-22 16:52:57', '2021-10-22 16:52:57');
INSERT INTO `rekening_kelompok` VALUES ('3117fae8-a342-4a19-b90b-ff7baa5dfb05', 'df4b61b1-86b7-4d34-a07e-7fdd89181e56', 'Investasi Jangka Panjang', '2', '2021-10-22 12:56:25', '2021-10-22 12:56:25');
INSERT INTO `rekening_kelompok` VALUES ('5807d0cd-e6f7-44ba-b0ef-1be1e7cd517a', '900218ae-fac0-48e4-8248-083ec7b857cd', 'Transfer', '2', '2021-10-22 16:58:26', '2021-10-22 16:58:39');
INSERT INTO `rekening_kelompok` VALUES ('6542971b-ba24-4288-a51e-33a3bc8335a9', 'd7cbacea-60c4-4c20-99cb-fb7384bea6df', 'Bidang Penyelenggaraan Pemerintah Desa', '1', '2021-11-09 14:36:13', '2021-11-09 14:36:32');
INSERT INTO `rekening_kelompok` VALUES ('9d956fbd-b008-4e4f-9d17-d8b09d606c72', 'df4b61b1-86b7-4d34-a07e-7fdd89181e56', 'Aset Lancar', '1', '2021-10-22 12:56:25', '2021-10-22 12:56:25');
INSERT INTO `rekening_kelompok` VALUES ('b92e80c5-a6aa-4029-bb98-f3bec580cd84', 'dd748c02-13ef-4239-8bd9-59c1325b74e8', 'Kewajiban Jangka Pendek', '1', '2021-10-22 13:55:34', '2021-10-22 13:55:34');
INSERT INTO `rekening_kelompok` VALUES ('d51a3cd8-20df-437f-9c9b-6a5444e808a3', 'df4b61b1-86b7-4d34-a07e-7fdd89181e56', 'Aset Tetap', '3', '2021-10-22 14:37:46', '2021-10-22 14:37:46');

-- ----------------------------
-- Table structure for rekening_objek
-- ----------------------------
DROP TABLE IF EXISTS `rekening_objek`;
CREATE TABLE `rekening_objek`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rekening_objek_id_jenis_foreign`(`id_jenis`) USING BTREE,
  CONSTRAINT `rekening_objek_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `rekening_jenis` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekening_objek
-- ----------------------------
INSERT INTO `rekening_objek` VALUES ('0a05afad-8485-4bd2-95b8-eafca3e00387', 'f71ebe8e-0edd-47c3-b00e-1483badb1a1d', 'Investasi dalam Deposito', '01', '2021-10-22 16:35:10', '2021-10-22 16:35:16');
INSERT INTO `rekening_objek` VALUES ('258beed8-a29e-4fce-98d1-03b88c2c2bb6', 'c35023bb-93df-4292-9f2a-73068af642fd', 'Setara Kas', '04', '2021-10-22 15:47:42', '2021-10-22 15:47:42');
INSERT INTO `rekening_objek` VALUES ('38e45fdd-9297-4f3b-ae73-33546548bfbd', 'c35023bb-93df-4292-9f2a-73068af642fd', 'Kas Lainnya', '03', '2021-10-22 15:47:42', '2021-10-22 15:47:42');
INSERT INTO `rekening_objek` VALUES ('40aa774a-b01c-4d8b-854f-a6241bd4b90b', 'c35023bb-93df-4292-9f2a-73068af642fd', 'Kas di Rekening Bendahara Desa', '02', '2021-10-22 15:47:42', '2021-10-22 15:47:42');
INSERT INTO `rekening_objek` VALUES ('626b02ec-636b-48af-a56a-593367483956', 'aebd4441-04ea-4121-8bcf-8afd95648d26', 'Tempat Pemandian Umum', '04', '2021-10-22 16:57:08', '2021-10-22 16:57:08');
INSERT INTO `rekening_objek` VALUES ('6336c9e2-c183-4d81-9146-81167bffdc88', 'aebd4441-04ea-4121-8bcf-8afd95648d26', 'Tambatan Perahu', '02', '2021-10-22 16:56:28', '2021-10-22 16:56:35');
INSERT INTO `rekening_objek` VALUES ('6451973a-9a5e-4f3c-b09d-ec8d0b9910ab', 'aebd4441-04ea-4121-8bcf-8afd95648d26', 'Pengelolaan Tanah Kas Desa', '01', '2021-10-22 16:56:11', '2021-10-22 16:56:11');
INSERT INTO `rekening_objek` VALUES ('895ce34f-00e4-4707-bd67-f1c6d08d4ed3', 'f71ebe8e-0edd-47c3-b00e-1483badb1a1d', 'Investasi Dalam Saham', '02', '2021-10-22 16:36:11', '2021-10-22 16:36:11');
INSERT INTO `rekening_objek` VALUES ('8efa895c-739c-42e8-be48-9ee415ea8466', '8437846f-be43-4500-8289-ef9d5575945e', 'Bagi Hasil BUMDes', '01', '2021-10-22 16:55:47', '2021-10-22 16:55:47');
INSERT INTO `rekening_objek` VALUES ('9edcdb63-79b8-4856-b035-028c1c4e6993', 'c35023bb-93df-4292-9f2a-73068af642fd', 'Kas di Rekening Kas Desa', '01', '2021-10-22 15:47:42', '2021-10-22 15:47:42');
INSERT INTO `rekening_objek` VALUES ('a40738bd-34f8-4ee0-915c-17d5f19c0c15', 'aebd4441-04ea-4121-8bcf-8afd95648d26', 'Pasar Desa', '03', '2021-10-22 16:56:51', '2021-10-22 16:56:51');
INSERT INTO `rekening_objek` VALUES ('c909da21-065c-40ef-a67d-a4cf71a103be', 'f71ebe8e-0edd-47c3-b00e-1483badb1a1d', 'Investasi dalam Jangka Pendek Lainnya', '03', '2021-10-22 16:36:31', '2021-10-22 16:36:31');
INSERT INTO `rekening_objek` VALUES ('cd0fd8ac-1325-4d55-ae8a-bb5624c755da', '8d40692f-04ab-4635-bf47-f0e91c97c2cf', 'Hasil Pungutan Desa', '01', '2021-10-22 16:58:06', '2021-10-22 16:58:06');
INSERT INTO `rekening_objek` VALUES ('d49ecd7b-b375-4edf-a89f-b1a7209a3b18', '63a5776a-be42-4249-956a-6e4fc4a5950a', 'Swadaya, partisipasi dan gotong royong', '01', '2021-10-22 16:57:51', '2021-10-22 16:57:51');

-- ----------------------------
-- Table structure for rpjmd_bidang
-- ----------------------------
DROP TABLE IF EXISTS `rpjmd_bidang`;
CREATE TABLE `rpjmd_bidang`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_visi` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rpjmd_bidang_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `rpjmd_bidang_id_bidang_foreign`(`id_bidang`) USING BTREE,
  INDEX `rpjmd_bidang_id_visi_foreign`(`id_visi`) USING BTREE,
  CONSTRAINT `rpjmd_bidang_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `rpjmd_bidang_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `rpjmd_bidang_id_visi_foreign` FOREIGN KEY (`id_visi`) REFERENCES `perencanaan_visi` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rpjmd_bidang
-- ----------------------------
INSERT INTO `rpjmd_bidang` VALUES ('68ea9f9a-cf13-415d-a8b3-286b24918919', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '31a719ea-8940-476c-8ef6-be508c5fc21e', '2021-10-26 17:39:43', '2021-10-26 17:39:43', '613d4982-264e-47dd-a8b9-76ab929345d6');
INSERT INTO `rpjmd_bidang` VALUES ('9b2c20b2-7aa3-42dc-a708-896486159c27', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '2021-10-26 16:18:51', '2021-10-26 16:18:51', '613d4982-264e-47dd-a8b9-76ab929345d6');
INSERT INTO `rpjmd_bidang` VALUES ('af5054e3-c0cb-485c-a94a-a8972749a6c6', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '6500c605-373d-4dc7-a9ca-86089286fdfa', '2021-10-26 16:18:51', '2021-10-26 16:18:51', '613d4982-264e-47dd-a8b9-76ab929345d6');
INSERT INTO `rpjmd_bidang` VALUES ('c0f67b61-c6af-47d9-9721-a7a154842cc7', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '77b27188-bf8b-4351-82bb-b3014d290bec', '2021-10-26 16:18:51', '2021-10-26 16:18:51', '613d4982-264e-47dd-a8b9-76ab929345d6');
INSERT INTO `rpjmd_bidang` VALUES ('e140ae78-d9a1-4b46-8279-eb804af43594', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', '4d1b8ddb-702a-4f1b-ab89-3acb47580d32', '2021-10-26 17:39:43', '2021-10-26 17:39:43', '613d4982-264e-47dd-a8b9-76ab929345d6');

-- ----------------------------
-- Table structure for rpjmd_dana_indikatif
-- ----------------------------
DROP TABLE IF EXISTS `rpjmd_dana_indikatif`;
CREATE TABLE `rpjmd_dana_indikatif`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rpjmd_tahun_kegiatan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_pelaksana_kegiatan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sumber_dana` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `volume` int(10) UNSIGNED NULL DEFAULT NULL,
  `satuan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `waktu` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `biaya` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `pola` enum('Swakelola','Kerjasama','Pihak Ketiga') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mulai` date NULL DEFAULT NULL,
  `selesai` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rpjmd_dana_indikatif_id_rpjmd_tahun_kegiatan_foreign`(`id_rpjmd_tahun_kegiatan`) USING BTREE,
  INDEX `rpjmd_dana_indikatif_id_pelaksana_kegiatan_foreign`(`id_pelaksana_kegiatan`) USING BTREE,
  INDEX `rpjmd_dana_indikatif_id_sumber_dana_foreign`(`id_sumber_dana`) USING BTREE,
  CONSTRAINT `rpjmd_dana_indikatif_id_pelaksana_kegiatan_foreign` FOREIGN KEY (`id_pelaksana_kegiatan`) REFERENCES `pelaksana_kegiatan` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `rpjmd_dana_indikatif_id_rpjmd_tahun_kegiatan_foreign` FOREIGN KEY (`id_rpjmd_tahun_kegiatan`) REFERENCES `rpjmd_tahun_kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rpjmd_dana_indikatif_id_sumber_dana_foreign` FOREIGN KEY (`id_sumber_dana`) REFERENCES `sumber_dana` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rpjmd_dana_indikatif
-- ----------------------------
INSERT INTO `rpjmd_dana_indikatif` VALUES ('1805dc6e-f701-4fdb-964e-318187728d27', 'b1482d55-eeba-4344-b301-9a7ed6eb977e', 'cd0d95fb-a6e2-4fda-8f1c-c7355eb74066', '8f95c68c-5795-4054-8521-a6998be4c4f8', 'Desa Pancalang', 100, '%', '12 Bulan', 57000000, 'Swakelola', '2020-01-01', '2020-12-31', '2021-10-31 14:51:16', '2021-10-31 14:53:23');
INSERT INTO `rpjmd_dana_indikatif` VALUES ('96984446-5efb-4fc8-8809-b154366bbc28', '7e9c68c5-42a3-4826-9753-b9f4bfc01184', 'cd0d95fb-a6e2-4fda-8f1c-c7355eb74066', '8f95c68c-5795-4054-8521-a6998be4c4f8', 'Desa Pancalang', 100, '%', '12 Bulan', 60000000, 'Swakelola', '2021-01-01', '2021-12-31', '2021-10-31 14:53:01', '2021-10-31 14:53:54');

-- ----------------------------
-- Table structure for rpjmd_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `rpjmd_kegiatan`;
CREATE TABLE `rpjmd_kegiatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rpjmd_sub_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_kegiatan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sasaran` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keluaran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sasaran_manfaat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pola` enum('Swakelola','Kerjasama','Pihak Ketiga') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rpjmd_kegiatan_id_rpjmd_sub_bidang_foreign`(`id_rpjmd_sub_bidang`) USING BTREE,
  INDEX `rpjmd_kegiatan_id_kegiatan_foreign`(`id_kegiatan`) USING BTREE,
  INDEX `rpjmd_kegiatan_id_sasaran_foreign`(`id_sasaran`) USING BTREE,
  CONSTRAINT `rpjmd_kegiatan_id_kegiatan_foreign` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `rpjmd_kegiatan_id_rpjmd_sub_bidang_foreign` FOREIGN KEY (`id_rpjmd_sub_bidang`) REFERENCES `rpjmd_subbidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `rpjmd_kegiatan_id_sasaran_foreign` FOREIGN KEY (`id_sasaran`) REFERENCES `perencanaan_sasaran` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rpjmd_kegiatan
-- ----------------------------
INSERT INTO `rpjmd_kegiatan` VALUES ('6476b374-68c8-4290-a6f9-56d77e082e41', '7d18343d-0e2b-4527-a3b7-d70e5e5f0936', 'c2ea1a4e-4157-4cd0-8500-ef1b1454db58', '552f864b-00ca-4e58-bfef-d12acff54199', 'Desa Pancalang', 'Tersedianya aparatur desa yang siap melayani masyarakat', 'Perangkat Desa', 'Swakelola', '2021-10-31 14:48:27', '2021-10-31 14:48:27');
INSERT INTO `rpjmd_kegiatan` VALUES ('66eb1757-9eee-482f-88b5-5dea4edbb0c6', '7d18343d-0e2b-4527-a3b7-d70e5e5f0936', 'b85fc60a-7c07-408d-bf06-1f69ef365856', '552f864b-00ca-4e58-bfef-d12acff54199', 'Desa Pancalang', 'Terbayarnya siltap dan tunjangan Kades', 'Kepala Desa', 'Swakelola', '2021-10-31 14:45:06', '2021-10-31 14:45:06');

-- ----------------------------
-- Table structure for rpjmd_subbidang
-- ----------------------------
DROP TABLE IF EXISTS `rpjmd_subbidang`;
CREATE TABLE `rpjmd_subbidang`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rpjmd_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_sub_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rpjmd_subbidang_id_rpjmd_bidang_foreign`(`id_rpjmd_bidang`) USING BTREE,
  INDEX `rpjmd_subbidang_id_sub_bidang_foreign`(`id_sub_bidang`) USING BTREE,
  CONSTRAINT `rpjmd_subbidang_id_rpjmd_bidang_foreign` FOREIGN KEY (`id_rpjmd_bidang`) REFERENCES `rpjmd_bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `rpjmd_subbidang_id_sub_bidang_foreign` FOREIGN KEY (`id_sub_bidang`) REFERENCES `sub_bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rpjmd_subbidang
-- ----------------------------
INSERT INTO `rpjmd_subbidang` VALUES ('20ceae29-9b7a-49e5-b81c-d1fba60f31f4', '9b2c20b2-7aa3-42dc-a708-896486159c27', '91774c62-75c1-4941-881f-fe13e430f294', '2021-10-26 18:12:11', '2021-10-26 18:12:11');
INSERT INTO `rpjmd_subbidang` VALUES ('2aa9618c-ff6b-4da5-ae14-89149b665ee9', '9b2c20b2-7aa3-42dc-a708-896486159c27', 'c02fd5ac-ae5e-450b-aa1a-8d1069f70e38', '2021-10-26 18:12:11', '2021-10-26 18:12:11');
INSERT INTO `rpjmd_subbidang` VALUES ('620199cb-2348-4c71-89e4-e7b41042c2d7', '9b2c20b2-7aa3-42dc-a708-896486159c27', '5f180e6d-b21f-43d3-ae11-9be5fb725018', '2021-10-26 18:13:53', '2021-10-26 18:13:53');
INSERT INTO `rpjmd_subbidang` VALUES ('7d18343d-0e2b-4527-a3b7-d70e5e5f0936', 'c0f67b61-c6af-47d9-9721-a7a154842cc7', '5384c357-a0da-44d3-9a7f-812b849d6f93', '2021-10-26 18:11:58', '2021-10-26 18:11:58');
INSERT INTO `rpjmd_subbidang` VALUES ('9aacca9a-bb56-435a-8bd2-6223bceaa1de', 'c0f67b61-c6af-47d9-9721-a7a154842cc7', '3085ffa7-9c21-487f-b97c-0ec405d75535', '2021-10-26 18:11:58', '2021-10-26 18:11:58');
INSERT INTO `rpjmd_subbidang` VALUES ('a1319cde-be0d-4e89-a3f3-051f286d07c8', '9b2c20b2-7aa3-42dc-a708-896486159c27', '1058025f-e966-43a0-8fe0-58927070a6cb', '2021-10-26 18:13:53', '2021-10-26 18:13:53');
INSERT INTO `rpjmd_subbidang` VALUES ('a772a9ce-f375-4f9c-975e-3b715c2ac3ab', '9b2c20b2-7aa3-42dc-a708-896486159c27', 'a074d2b2-bbca-41c7-a091-d2f235cad95e', '2021-10-26 18:12:11', '2021-10-26 18:12:11');
INSERT INTO `rpjmd_subbidang` VALUES ('cdddebc8-5200-4031-9478-f4d3228e8158', '9b2c20b2-7aa3-42dc-a708-896486159c27', '71fb5328-c499-48ef-9e0b-7ad07b50b8ab', '2021-10-26 18:13:53', '2021-10-26 18:13:53');
INSERT INTO `rpjmd_subbidang` VALUES ('d45da4b6-9b10-4620-8008-2411e20032ab', 'c0f67b61-c6af-47d9-9721-a7a154842cc7', 'f3b8effc-8208-4141-bae9-e02bb8444a83', '2021-10-26 18:14:49', '2021-10-26 18:14:49');
INSERT INTO `rpjmd_subbidang` VALUES ('d8346766-c6e9-4d86-b4f4-b07814057326', '9b2c20b2-7aa3-42dc-a708-896486159c27', 'a93f06c2-0a37-43dc-9b1b-0ac50269f9b9', '2021-10-26 18:12:11', '2021-10-26 18:12:11');
INSERT INTO `rpjmd_subbidang` VALUES ('e3198bd2-8808-4b2f-a615-6285908f088d', '9b2c20b2-7aa3-42dc-a708-896486159c27', '14f2d6fe-eed7-4809-bc4b-263081725a5f', '2021-10-26 18:13:53', '2021-10-26 18:13:53');
INSERT INTO `rpjmd_subbidang` VALUES ('e5d054b1-8627-4eba-9456-bdbdba18f185', 'c0f67b61-c6af-47d9-9721-a7a154842cc7', '85d45c53-d6f8-4515-8e64-5c637bbea5e3', '2021-10-28 05:44:09', '2021-10-28 05:44:09');
INSERT INTO `rpjmd_subbidang` VALUES ('eaf89879-f01b-4bee-bc15-404e6467d9b9', 'c0f67b61-c6af-47d9-9721-a7a154842cc7', '5985cf97-8a40-4faa-a1f9-d4f938f60e8e', '2021-10-26 18:14:49', '2021-10-26 18:14:49');

-- ----------------------------
-- Table structure for rpjmd_tahun_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `rpjmd_tahun_kegiatan`;
CREATE TABLE `rpjmd_tahun_kegiatan`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rpjmd_kegiatan` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_ke` int(10) UNSIGNED NULL DEFAULT NULL,
  `tahun` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `rpjmd_tahun_kegiatan_id_rpjmd_kegiatan_foreign`(`id_rpjmd_kegiatan`) USING BTREE,
  CONSTRAINT `rpjmd_tahun_kegiatan_id_rpjmd_kegiatan_foreign` FOREIGN KEY (`id_rpjmd_kegiatan`) REFERENCES `rpjmd_kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rpjmd_tahun_kegiatan
-- ----------------------------
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('0b6c004a-c293-460b-8f04-70d165618c37', '6476b374-68c8-4290-a6f9-56d77e082e41', 3, 2022, '2021-10-31 14:48:27', '2021-10-31 14:48:27');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('0c49feb3-470e-4d1f-a56b-cb3ab2b99244', '66eb1757-9eee-482f-88b5-5dea4edbb0c6', 6, 2025, '2021-10-31 14:45:06', '2021-10-31 14:45:06');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('1874caba-a728-4037-a974-d39add7f03ed', '6476b374-68c8-4290-a6f9-56d77e082e41', 2, 2021, '2021-10-31 14:48:27', '2021-10-31 14:48:27');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('19774745-8a75-4396-ad2e-e536f49fc274', '6476b374-68c8-4290-a6f9-56d77e082e41', 5, 2024, '2021-10-31 14:48:27', '2021-10-31 14:48:27');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('68e69ac6-7802-4e23-969e-86afc809620d', '6476b374-68c8-4290-a6f9-56d77e082e41', 6, 2025, '2021-10-31 14:48:27', '2021-10-31 14:48:27');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('6fbab4fd-dc38-4bdc-8e3b-fb22af036976', '66eb1757-9eee-482f-88b5-5dea4edbb0c6', 4, 2023, '2021-10-31 14:47:30', '2021-10-31 14:47:30');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('747b586b-cc13-432a-9ae5-3372e2b5b72f', '6476b374-68c8-4290-a6f9-56d77e082e41', 1, 2020, '2021-10-31 14:48:27', '2021-10-31 14:48:27');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('7e9c68c5-42a3-4826-9753-b9f4bfc01184', '66eb1757-9eee-482f-88b5-5dea4edbb0c6', 2, 2021, '2021-10-31 14:47:21', '2021-10-31 14:47:21');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('a2b7029c-6487-4b1b-864e-a003d0f2504a', '6476b374-68c8-4290-a6f9-56d77e082e41', 4, 2023, '2021-10-31 14:48:27', '2021-10-31 14:48:27');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('b1482d55-eeba-4344-b301-9a7ed6eb977e', '66eb1757-9eee-482f-88b5-5dea4edbb0c6', 1, 2020, '2021-10-31 14:45:06', '2021-10-31 14:45:06');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('c818b5ff-26d0-4add-aff7-c9e04ce272c4', '66eb1757-9eee-482f-88b5-5dea4edbb0c6', 3, 2022, '2021-10-31 14:47:21', '2021-10-31 14:47:21');
INSERT INTO `rpjmd_tahun_kegiatan` VALUES ('cb243f4c-cc96-47b3-bdfd-58ae112a8493', '66eb1757-9eee-482f-88b5-5dea4edbb0c6', 5, 2024, '2021-10-31 14:47:30', '2021-10-31 14:47:30');

-- ----------------------------
-- Table structure for sekretaris_desa
-- ----------------------------
DROP TABLE IF EXISTS `sekretaris_desa`;
CREATE TABLE `sekretaris_desa`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aktif` enum('Ya','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sekretaris_desa_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `sekretaris_desa_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sekretaris_desa
-- ----------------------------
INSERT INTO `sekretaris_desa` VALUES ('4c57b1e7-e69b-462e-ba77-a1a7df4766d8', '235671f5-199c-4870-9f5a-e6d54b5a6a5c', 'Siska Nugraha', 'Sekdes Gujeg', 'Ya', '2021-10-23 14:21:07', '2021-10-23 14:22:44');
INSERT INTO `sekretaris_desa` VALUES ('6058f4a7-a483-4d88-a924-9949f56ee4bf', '43cec4b6-ad4b-46fd-82c4-f56752e96327', 'Rahmat Budianto', 'Sekretaris Desa', 'Tidak', '2021-10-23 13:18:45', '2021-10-23 13:18:45');
INSERT INTO `sekretaris_desa` VALUES ('7991d7a8-c9ce-4197-a31e-bcc1e2a31db8', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', 'Citra Kirana', 'Sekretaris Desa', 'Tidak', '2021-10-24 00:17:23', '2021-10-24 06:40:08');
INSERT INTO `sekretaris_desa` VALUES ('adbf1a32-e1cd-4693-b41d-3626f45e22d6', 'a513b0ed-b752-4733-a23d-ed590eeb8f42', 'Nuri Maulida', 'Seretaris', 'Ya', '2021-10-24 06:37:45', '2021-10-24 06:37:53');
INSERT INTO `sekretaris_desa` VALUES ('e71f1941-dd0f-42b5-a670-c8441f11b810', '235671f5-199c-4870-9f5a-e6d54b5a6a5c', 'Nilah Samsinah', 'Sekdes Gujeg', 'Ya', '2021-10-23 14:48:46', '2021-10-23 15:06:51');

-- ----------------------------
-- Table structure for sub_bidang
-- ----------------------------
DROP TABLE IF EXISTS `sub_bidang`;
CREATE TABLE `sub_bidang`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bidang` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sub_bidang_id_bidang_foreign`(`id_bidang`) USING BTREE,
  CONSTRAINT `sub_bidang_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_bidang
-- ----------------------------
INSERT INTO `sub_bidang` VALUES ('1058025f-e966-43a0-8fe0-58927070a6cb', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '07', 'Energi dan Sumberdaya Mineral', '2021-10-26 18:13:32', '2021-10-26 18:13:32');
INSERT INTO `sub_bidang` VALUES ('14f2d6fe-eed7-4809-bc4b-263081725a5f', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '05', 'Kehutanan dan Lingkungan Hidup', '2021-10-26 18:13:06', '2021-10-26 18:13:06');
INSERT INTO `sub_bidang` VALUES ('3085ffa7-9c21-487f-b97c-0ec405d75535', '77b27188-bf8b-4351-82bb-b3014d290bec', '02', 'Penyediaan Sarana Prasarana Pemerintahan Desa', '2021-10-26 18:08:50', '2021-10-26 18:09:42');
INSERT INTO `sub_bidang` VALUES ('5384c357-a0da-44d3-9a7f-812b849d6f93', '77b27188-bf8b-4351-82bb-b3014d290bec', '01', 'Penyelenggaran Belanja Siltap, Tunjangan dan Operasional Pemerintahan Desa', '2021-10-26 18:07:46', '2021-10-26 18:09:29');
INSERT INTO `sub_bidang` VALUES ('5985cf97-8a40-4faa-a1f9-d4f938f60e8e', '77b27188-bf8b-4351-82bb-b3014d290bec', '04', 'Penyelenggaraan Tata Praja Pemerintahan, Perencanaan, Keuangan dan Pelaporan', '2021-10-26 18:14:27', '2021-10-26 18:14:27');
INSERT INTO `sub_bidang` VALUES ('5f180e6d-b21f-43d3-ae11-9be5fb725018', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '08', 'Pariwisata', '2021-10-26 18:13:42', '2021-10-26 18:13:42');
INSERT INTO `sub_bidang` VALUES ('71fb5328-c499-48ef-9e0b-7ad07b50b8ab', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '06', 'Bidang Perhubungan, Komunikasi dan Informatika', '2021-10-26 18:13:19', '2021-10-26 18:13:19');
INSERT INTO `sub_bidang` VALUES ('85d45c53-d6f8-4515-8e64-5c637bbea5e3', '77b27188-bf8b-4351-82bb-b3014d290bec', '05', 'Pertanahan', '2021-10-26 18:14:36', '2021-10-26 18:14:36');
INSERT INTO `sub_bidang` VALUES ('91774c62-75c1-4941-881f-fe13e430f294', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '04', 'Kawasan Pemukiman', '2021-10-26 18:11:45', '2021-10-26 18:11:45');
INSERT INTO `sub_bidang` VALUES ('a074d2b2-bbca-41c7-a091-d2f235cad95e', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '02', 'Kesehatan', '2021-10-26 18:11:13', '2021-10-26 18:11:13');
INSERT INTO `sub_bidang` VALUES ('a93f06c2-0a37-43dc-9b1b-0ac50269f9b9', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '03', 'Pekerjaan Umum dan Penataan Ruang', '2021-10-26 18:11:29', '2021-10-26 18:11:29');
INSERT INTO `sub_bidang` VALUES ('c02fd5ac-ae5e-450b-aa1a-8d1069f70e38', '56586e5b-49a5-4282-8cbe-4bf43e2a286c', '01', 'Pendidikan', '2021-10-26 18:11:00', '2021-11-09 14:21:26');
INSERT INTO `sub_bidang` VALUES ('f3b8effc-8208-4141-bae9-e02bb8444a83', '77b27188-bf8b-4351-82bb-b3014d290bec', '03', 'Pengelolaan Administrasi Kependudukan, Pencatatan Sipil, Statistik dan Kearsipan', '2021-10-26 18:14:15', '2021-10-26 18:14:15');

-- ----------------------------
-- Table structure for sumber_dana
-- ----------------------------
DROP TABLE IF EXISTS `sumber_dana`;
CREATE TABLE `sumber_dana`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sumber_dana
-- ----------------------------
INSERT INTO `sumber_dana` VALUES ('40ee18bc-626a-431e-9387-91e85261a0cc', 'PBH', 'Penerimaan Bagi Hasil Pajak/Retribusi Daerah', '2021-10-20 16:16:04', '2021-10-20 16:16:04');
INSERT INTO `sumber_dana` VALUES ('4b42058c-9a70-4c29-bf32-40bdf2586587', 'PAD', 'Pendapatan Asli Desa', '2021-10-20 16:16:04', '2021-10-20 16:16:04');
INSERT INTO `sumber_dana` VALUES ('5402bc16-ff50-4a43-a83c-864c022ecae1', 'DDS', 'Dana Desa (APBN)', '2021-10-20 16:16:04', '2021-10-20 16:35:43');
INSERT INTO `sumber_dana` VALUES ('8f95c68c-5795-4054-8521-a6998be4c4f8', 'ADD', 'Alokasi Dana Desa', '2021-10-20 16:16:04', '2021-10-20 16:16:04');
INSERT INTO `sumber_dana` VALUES ('b371227a-07e3-433d-a591-947d80554108', 'PBP', 'Penerimaan Bantuan Keuangan Provinsi', '2021-10-20 16:16:04', '2021-10-20 16:16:04');
INSERT INTO `sumber_dana` VALUES ('c136348b-819d-4b76-ac1c-f944402ad21f', 'SWD', 'Swadaya Masyarakat', '2021-10-20 16:16:04', '2021-10-20 16:16:04');
INSERT INTO `sumber_dana` VALUES ('d5ecd156-f917-4da9-bb50-44a38729c60f', 'PBK', 'Penerimaan Bantuan Keuangan Kabupaten/Kota', '2021-10-20 16:16:04', '2021-10-20 16:16:04');
INSERT INTO `sumber_dana` VALUES ('e306d2fd-9134-436d-b5d8-293bc496f223', 'PDL', 'Pendapata Lain-Lain', '2021-10-20 16:16:04', '2021-10-20 16:16:04');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_desa` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `users_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('27268f9f-fa07-45fd-9b5e-30eb4966a0da', 'Edi', 'edi@edi.com', NULL, '$2y$10$T9tF8DfXMbfZ49qVk83Y4Omi/1Sp4Sk21RI2CqwOe0nQ3wABXCDcy', NULL, '2021-10-23 06:13:42', '2021-10-23 06:13:42', '50f09063-db5d-43f9-9ed6-ab3937a787fa');
INSERT INTO `users` VALUES ('2e085119-662d-472d-8efb-f1e9c04f24db', 'Alfonso Schumm Sr.', 'olehner@example.com', '2021-10-20 02:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XVgSHH8eRSwLimHdTofY1Ef4CcxA7VkBWviKcpKc3qsxTU0TRAKa9EYIARVu', '2021-10-20 02:48:27', '2021-10-23 11:19:13', '43cec4b6-ad4b-46fd-82c4-f56752e96327');
INSERT INTO `users` VALUES ('332dea87-4fe9-4df9-ba04-ebb8ff840db4', 'Floyd Schiller', 'stiedemann.odell@example.com', '2021-10-20 02:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UHaN7NlEkd', '2021-10-20 02:48:27', '2021-10-23 11:19:28', '9b423185-7ebe-45f5-9c2f-8f45701966bc');
INSERT INTO `users` VALUES ('a82e4ebc-c3c9-4dc3-9a43-69b332b90187', 'Hoki Teguh Oktian', 'oktian89@gmail.com', NULL, '$2y$10$k.6QNJ2M2x06XflMG6YFUus8UMhdLs5Tlu.HJ2uCfYYMWSH8PJaSy', 'ijgwDZAHYZau1SER8008nQXmWKg5ChgWzbItlAHgcyxqCIQchCkW3tejlYsx', '2021-10-24 00:11:18', '2021-10-24 00:15:31', 'a513b0ed-b752-4733-a23d-ed590eeb8f42');
INSERT INTO `users` VALUES ('c70663df-425a-40f6-8549-5f2af0e19430', 'Eliezer Pagac', 'stoltenberg.korey@example.net', '2021-10-20 02:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sCd6KeCjav', '2021-10-20 02:48:27', '2021-10-23 10:59:42', '235671f5-199c-4870-9f5a-e6d54b5a6a5c');
INSERT INTO `users` VALUES ('d9d30225-1eff-43db-bb49-371b158e6d4b', 'Dr. Brannon Hegmann', 'quigley.daija@example.net', '2021-10-20 02:48:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LB1r8f5ZMy', '2021-10-20 02:48:27', '2021-10-23 11:19:36', '50f09063-db5d-43f9-9ed6-ab3937a787fa');

SET FOREIGN_KEY_CHECKS = 1;
