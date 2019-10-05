SET foreign_key_checks = 0;
#
# TABLE STRUCTURE FOR: albums
#

DROP TABLE IF EXISTS `albums`;

CREATE TABLE `albums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `album_title` varchar(255) NOT NULL,
  `album_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `albums` (`id`, `album_title`, `album_description`, `created_at`, `updated_at`) VALUES ('1', 'Kegiatan Hari Keluarga Nasional', 'Kegiatan Hari Keluarga Nasional', '2019-09-19 03:40:37', '2019-09-19 08:48:25');


#
# TABLE STRUCTURE FOR: halaman
#

DROP TABLE IF EXISTS `halaman`;

CREATE TABLE `halaman` (
  `id_halaman` varchar(255) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(150) NOT NULL,
  `parent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d82e1fc933e2', 'Profil', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '2019-09-19 09:03:40', 'profil.html', NULL);
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d976f4ba9e5d', 'Visi Misi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '2019-10-04 23:11:55', 'visi-misi.html', NULL);
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d976fad34342', 'Kepegawaian', '', '2019-10-04 23:13:33', 'kepegawaian.html', NULL);
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d976fcba84ca', 'Struktur Organisasi', '', '2019-10-04 23:14:03', 'struktur-organisasi.html', 'page-5d976fad34342');
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d976fe3863aa', 'Tugas dan Fungsi', '', '2019-10-04 23:14:27', 'tugas-dan-fungsi.html', 'page-5d976fad34342');
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d976ffdcd0c4', 'Daftar Pegawai', '', '2019-10-04 23:14:53', 'daftar-pegawai.html', 'page-5d976fad34342');
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d97701e20547', 'Bidang', '', '2019-10-04 23:15:26', 'bidang.html', NULL);
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d97704785c55', 'Pengendalian Penduduk, Penyuluhan dan Pergerakan', '', '2019-10-04 23:16:07', 'pengendalian-penduduk,-penyuluhan-dan-pergerakan.html', 'page-5d97701e20547');
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d97707042f69', 'KB, Ketahanan dan Kesejahteraan Keluarga', '', '2019-10-04 23:16:48', 'kb,-ketahanan-dan-kesejahteraan-keluarga.html', 'page-5d97701e20547');
INSERT INTO `halaman` (`id_halaman`, `judul`, `isi`, `tanggal`, `slug`, `parent`) VALUES ('page-5d9770989918f', 'Pemberdayaan Perempuan dan Perlindungan Anak', '', '2019-10-04 23:17:28', 'pemberdayaan-perempuan-dan-perlindungan-anak.html', 'page-5d97701e20547');


#
# TABLE STRUCTURE FOR: kepala_dinas
#

DROP TABLE IF EXISTS `kepala_dinas`;

CREATE TABLE `kepala_dinas` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `sambutan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `kepala_dinas` (`id`, `nama`, `jabatan`, `foto`, `sambutan`) VALUES ('1', 'Dra. Hj. Nunung Kartini', 'Kepala Dinas', 'default.jpg', '<p>Assalamualaikum wr. wb...</p>\n\n<p>&nbsp;</p>\n');


#
# TABLE STRUCTURE FOR: komentar
#

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `id` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_post` varchar(255) NOT NULL,
  `id_parent` varchar(255) DEFAULT NULL,
  `komentar` text NOT NULL,
  `is_mod` int(10) unsigned NOT NULL,
  `id_mod` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `komentar` (`id`, `display_name`, `email`, `id_post`, `id_parent`, `komentar`, `is_mod`, `id_mod`, `tanggal`) VALUES ('comment-5d8300985ff56', 'Super Admin', 'admin@gmail.com', 'post-5d82c6d3057d3', NULL, 'sample komentar dari administrator dinas', 1, '1', '2019-09-19 11:14:16');


#
# TABLE STRUCTURE FOR: menu
#

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` varchar(255) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `posisi` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: migrations
#

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migrations` (`version`) VALUES ('13');


#
# TABLE STRUCTURE FOR: pesan
#

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dibaca` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pesan` (`id`, `email`, `isi`, `tanggal`, `dibaca`) VALUES ('msg-5d95cb7cd476f', 'fadilah3424@gmail.com', 'cik nyobaan..', '2019-10-03 17:20:44', 0);


#
# TABLE STRUCTURE FOR: photos
#

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo_album_id` bigint(20) unsigned NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `photos` (`id`, `photo_album_id`, `photo_name`, `created_at`, `updated_at`) VALUES ('1', '1', '1_sample_foto_1.png', '2019-09-19 08:41:52', '2019-09-19 08:41:52');
INSERT INTO `photos` (`id`, `photo_album_id`, `photo_name`, `created_at`, `updated_at`) VALUES ('2', '1', '1_sample_foto_2.jpg', '2019-09-19 08:45:56', '2019-09-19 08:45:56');
INSERT INTO `photos` (`id`, `photo_album_id`, `photo_name`, `created_at`, `updated_at`) VALUES ('3', '1', '1_tes.jpg', '2019-09-19 08:47:03', '2019-09-19 08:47:03');


#
# TABLE STRUCTURE FOR: post
#

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` varchar(255) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(150) NOT NULL,
  `image` varchar(40) NOT NULL DEFAULT 'post_default.jpg',
  `author` varchar(255) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `views` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c5e83266b', 'Sample Post 1', '<p>Ini contoh sample post 1</p>', '2019-09-19 07:03:52', 'sample-post-1.html', 'post-5d82c5e83266b.jpg', '1', 1, 1);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c63ecfed3', 'Sample Post 2', '<p>Ini contoh sample post 2</p>', '2019-09-19 07:05:18', 'sample-post-2.html', 'post-5d82c63ecfed3.jpg', '1', 1, 0);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c6d3057d3', 'Sample Post 3', '<p>Ini contoh sample post 3</p>', '2019-09-19 07:07:47', 'sample-post-3.html', 'post-5d82c6d3057d3.jpg', '1', 1, 5);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c7299a512', 'Sample Post 4', '<p><strong>Ini contoh sample post 4</strong></p>', '2019-09-19 07:09:13', 'sample-post-4.html', 'post-5d82c7299a512.jpg', '1', 1, 1);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c7c1077a7', 'Sample Post 5', '<p><strong>Ini contoh sample post 5</strong></p>', '2019-09-19 07:11:45', 'sample-post-5.html', 'post-5d82c7c1077a7.jpg', '1', 1, 0);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c7e073d22', 'Sample post 6', '<p><strong>Ini contoh sample post 6</strong></p>', '2019-09-19 07:12:16', 'sample-post-6.html', 'post-5d82c7e073d22.jpg', '1', 1, 0);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c812a7d9e', 'Sample post 7', '<p>Ini contoh sample post 7</p>', '2019-09-19 07:13:06', 'sample-post-7.html', 'post_default.jpg', '1', 1, 0);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c83cf08ad', 'Sample post 8', '<p>ini contoh sample post 8</p>', '2019-09-19 07:13:48', 'sample-post-8.html', 'post-5d82c83cf08ad.jpg', '1', 1, 0);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82c85b652d1', 'Sample post 9', '<p>ini contoh sample post 9</p>', '2019-09-19 07:14:19', 'sample-post-9.html', 'post-5d82c85b652d1.jpg', '1', 1, 0);
INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES ('post-5d82d748650f3', 'Sample post 10', '<p>ini contoh sample post 10</p>', '2019-09-19 08:18:00', 'sample-post-10.html', 'post_default.jpg', '1', 0, 0);


#
# TABLE STRUCTURE FOR: profil
#

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namadinas` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` int(10) unsigned DEFAULT NULL,
  `kabupaten` int(10) unsigned DEFAULT NULL,
  `kecamatan` int(10) unsigned DEFAULT NULL,
  `desa` int(10) unsigned DEFAULT NULL,
  `telepon` varchar(13) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `profil` (`id`, `namadinas`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `telepon`, `kodepos`) VALUES (1, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 'Jl. Yudanegara No. 75A', 32, 3278, 3278050, 3278050004, '0265340212', '46113');


#
# TABLE STRUCTURE FOR: tokens
#

DROP TABLE IF EXISTS `tokens`;

CREATE TABLE `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: user
#

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(18) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `role` varchar(10) NOT NULL DEFAULT 'USER',
  `dibuat_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `image`, `role`, `dibuat_pada`) VALUES ('1', 'Administrator', 'admin', 'admin@gmail.com', '$2y$10$8FODI1VCyiAhXBZ8XsX4lOORoaPDjx2Hr8/GqgVCkajNUn3CGrbiq', 'default.jpg', 'GOD', '2019-09-18 21:07:35');


#
# TABLE STRUCTURE FOR: video
#

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `diupload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: visitor
#

DROP TABLE IF EXISTS `visitor`;

CREATE TABLE `visitor` (
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `online` int(11) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `visitor` (`ip`, `tanggal`, `hits`, `online`, `browser`, `platform`) VALUES ('::1', '2019-09-19', 22, 1568866437, 'Chrome', 'Windows 10');
INSERT INTO `visitor` (`ip`, `tanggal`, `hits`, `online`, `browser`, `platform`) VALUES ('::1', '2019-09-30', 1, 1569859921, 'Chrome', 'Windows 10');
INSERT INTO `visitor` (`ip`, `tanggal`, `hits`, `online`, `browser`, `platform`) VALUES ('::1', '2019-10-01', 4, 1569948116, 'Chrome', 'Windows 10');
INSERT INTO `visitor` (`ip`, `tanggal`, `hits`, `online`, `browser`, `platform`) VALUES ('::1', '2019-10-02', 1, 1570010031, 'Chrome', 'Windows 10');
INSERT INTO `visitor` (`ip`, `tanggal`, `hits`, `online`, `browser`, `platform`) VALUES ('::1', '2019-10-03', 1, 1570097817, 'Chrome', 'Windows 10');
INSERT INTO `visitor` (`ip`, `tanggal`, `hits`, `online`, `browser`, `platform`) VALUES ('::1', '2019-10-04', 47, 1570211315, 'Chrome', 'Windows 10');


SET foreign_key_checks = 1;
