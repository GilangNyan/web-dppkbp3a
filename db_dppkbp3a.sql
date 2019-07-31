-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2019 pada 10.48
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dppkbp3a`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` varchar(255) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `slug` varchar(150) NOT NULL,
  `parent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(255) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `posisi`) VALUES
('menu-5d3b216f86435', 'Profil', 1),
('menu-5d3b2190a3542', 'Kepegawaian', 2),
('menu-5d3b21a8368db', 'Bidang', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` varchar(255) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(150) NOT NULL,
  `image` varchar(40) NOT NULL DEFAULT 'post_default.jpg',
  `author` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judul`, `isi`, `tanggal`, `slug`, `image`, `author`, `status`, `views`) VALUES
('post-5d31caea747f5', 'Lipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Varius quam quisque id diam vel. Nulla posuere sollicitudin aliquam ultrices sagittis. Orci dapibus ultrices in iaculis. Etiam non quam lacus suspendisse faucibus interdum. Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt id. Adipiscing elit duis tristique sollicitudin. Lectus mauris ultrices eros in cursus turpis massa tincidunt. Tellus elementum sagittis vitae et leo. Aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<figure class=\"image\" style=\"float:left\"><img alt=\"\" height=\"350\" src=\"/web-dppkbp3a/userfiles/files/518_komiya_arisa_sample02.jpg\" width=\"247\" />\r\n<figcaption>Komiya Arisa</figcaption>\r\n</figure>\r\n\r\n<p>Pellentesque sit amet porttitor eget dolor. Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Ornare arcu odio ut sem nulla pharetra. Porta non pulvinar neque laoreet suspendisse interdum. Vitae elementum curabitur vitae nunc. Quam pellentesque nec nam aliquam sem et tortor. Placerat vestibulum lectus mauris ultrices eros in cursus. Elit ut aliquam purus sit amet luctus. Nulla facilisi cras fermentum odio eu feugiat pretium nibh. In tellus integer feugiat scelerisque varius. Nibh nisl condimentum id venenatis a. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Magna sit amet purus gravida quis.</p>\r\n\r\n<p>Ut venenatis tellus in metus vulputate eu scelerisque. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna neque. Commodo ullamcorper a lacus vestibulum sed. Turpis nunc eget lorem dolor sed. Enim sed faucibus turpis in eu mi bibendum. Pretium lectus quam id leo in vitae. Eu augue ut lectus arcu bibendum at varius vel pharetra. Orci nulla pellentesque dignissim enim sit. Magna fringilla urna porttitor rhoncus dolor purus non enim praesent. Neque convallis a cras semper auctor neque vitae. Massa sed elementum tempus egestas sed sed risus. Egestas purus viverra accumsan in nisl nisi. Condimentum mattis pellentesque id nibh tortor id aliquet lectus.</p>\r\n\r\n<p>Edit edit edit.</p>\r\n', '2019-07-19 13:51:38', 'lipsum.html', 'post-5d31caea747f5.png', 'user-5d220f1860ad4', 1, 12),
('post-5d32b105da5d9', 'Komiya Arisa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum nisi quis eleifend quam adipiscing vitae. Magna fermentum iaculis eu non diam phasellus vestibulum lorem sed. Et malesuada fames ac turpis egestas sed tempus. Cras pulvinar mattis nunc sed blandit libero volutpat sed. Risus ultricies tristique nulla aliquet enim tortor at. Vitae auctor eu augue ut. Ornare suspendisse sed nisi lacus sed viverra tellus in hac. Eget nunc lobortis mattis aliquam faucibus purus. Mauris in aliquam sem fringilla ut. Ut morbi tincidunt augue interdum velit euismod in pellentesque massa. Sit amet dictum sit amet justo donec enim diam vulputate. Dui id ornare arcu odio ut sem nulla pharetra. Sed vulputate mi sit amet mauris commodo.</p>\r\n\r\n<figure class=\"image\" style=\"float:left\"><img alt=\"\" height=\"555\" src=\"/web-dppkbp3a/userfiles/files/518_komiya_arisa_sample01.jpg\" width=\"391\" />\r\n<figcaption>Komiya Arisa</figcaption>\r\n</figure>\r\n\r\n<p>Tortor dignissim convallis aenean et tortor at risus viverra adipiscing. Nunc sed augue lacus viverra vitae. Eu ultrices vitae auctor eu augue ut lectus arcu. Quam id leo in vitae turpis massa sed. Scelerisque purus semper eget duis at tellus at urna. Venenatis a condimentum vitae sapien pellentesque habitant morbi. Nunc non blandit massa enim. Gravida neque convallis a cras semper. Morbi tristique senectus et netus et. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Tristique risus nec feugiat in fermentum posuere urna nec tincidunt. Suspendisse faucibus interdum posuere lorem ipsum dolor sit. Venenatis a condimentum vitae sapien pellentesque habitant morbi. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Malesuada fames ac turpis egestas. Purus faucibus ornare suspendisse sed nisi. Nunc congue nisi vitae suscipit tellus mauris a diam maecenas.</p>\r\n\r\n<p>Blandit libero volutpat sed cras. Imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Lacus vel facilisis volutpat est velit egestas. Nulla malesuada pellentesque elit eget gravida cum sociis natoque. Fusce id velit ut tortor pretium viverra suspendisse potenti nullam. A pellentesque sit amet porttitor eget dolor morbi. Natoque penatibus et magnis dis parturient montes nascetur ridiculus. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus. Sagittis id consectetur purus ut faucibus pulvinar. Neque aliquam vestibulum morbi blandit cursus risus at. In cursus turpis massa tincidunt dui ut ornare lectus sit. Sed arcu non odio euismod lacinia. Phasellus faucibus scelerisque eleifend donec pretium. Suscipit adipiscing bibendum est ultricies integer quis auctor elit.</p>\r\n\r\n<p>Enim sed faucibus turpis in eu mi bibendum neque. In vitae turpis massa sed elementum tempus egestas sed sed. Ac felis donec et odio pellentesque diam volutpat commodo. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Ac felis donec et odio pellentesque. Odio ut enim blandit volutpat. Interdum velit euismod in pellentesque massa. Aliquet risus feugiat in ante metus dictum at. Dolor magna eget est lorem. Integer feugiat scelerisque varius morbi enim. Tristique senectus et netus et malesuada. Maecenas accumsan lacus vel facilisis volutpat est velit. Mus mauris vitae ultricies leo integer malesuada. Quam vulputate dignissim suspendisse in. Duis convallis convallis tellus id interdum velit. Sollicitudin ac orci phasellus egestas tellus rutrum.</p>\r\n\r\n<p>Eget nullam non nisi est. Tristique nulla aliquet enim tortor at. Neque laoreet suspendisse interdum consectetur libero id faucibus. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Ullamcorper malesuada proin libero nunc consequat. Elit sed vulputate mi sit amet mauris commodo. Vitae suscipit tellus mauris a diam maecenas. Gravida dictum fusce ut placerat orci nulla pellentesque. Integer feugiat scelerisque varius morbi enim nunc. Nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. A diam sollicitudin tempor id eu nisl nunc mi. Cursus sit amet dictum sit amet justo donec enim. Tristique magna sit amet purus gravida quis. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Dolor sit amet consectetur adipiscing elit duis.</p>\r\n', '2019-07-20 06:13:25', 'komiya-arisa.html', 'post-5d32b105da5d9.jpg', 'user-5d220f1860ad4', 1, 20),
('post-5d342ec609cd4', 'Lorem', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Erat pellentesque adipiscing commodo elit. Dui nunc mattis enim ut tellus elementum sagittis. Eu volutpat odio facilisis mauris sit amet. Eget arcu dictum varius duis at. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Volutpat ac tincidunt vitae semper quis lectus nulla at volutpat. Suspendisse in est ante in nibh. At risus viverra adipiscing at in tellus integer. Fames ac turpis egestas sed tempus. Vehicula ipsum a arcu cursus vitae congue mauris. Cursus turpis massa tincidunt dui ut ornare lectus sit. Eu lobortis elementum nibh tellus molestie nunc. Sed tempus urna et pharetra pharetra.</p>\r\n\r\n<p>Pulvinar mattis nunc sed blandit libero volutpat. Tortor dignissim convallis aenean et. Velit sed ullamcorper morbi tincidunt ornare massa eget egestas purus. Augue mauris augue neque gravida in fermentum et sollicitudin ac. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Ac turpis egestas sed tempus urna et. Accumsan tortor posuere ac ut consequat semper viverra nam. Sed sed risus pretium quam vulputate dignissim suspendisse in est. Ut tristique et egestas quis ipsum suspendisse ultrices gravida dictum. Nisl nunc mi ipsum faucibus. Morbi blandit cursus risus at ultrices mi tempus. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Facilisis gravida neque convallis a cras semper auctor neque. Sapien eget mi proin sed. Dapibus ultrices in iaculis nunc sed augue. Praesent tristique magna sit amet purus. Vehicula ipsum a arcu cursus vitae congue mauris. Ac feugiat sed lectus vestibulum mattis. Eu feugiat pretium nibh ipsum consequat nisl vel.</p>\r\n\r\n<p>Sed cras ornare arcu dui vivamus arcu felis bibendum ut. Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Risus ultricies tristique nulla aliquet. Fusce ut placerat orci nulla pellentesque dignissim enim sit. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Et malesuada fames ac turpis. Suscipit adipiscing bibendum est ultricies integer. Et sollicitudin ac orci phasellus egestas tellus rutrum tellus. Ligula ullamcorper malesuada proin libero. Sodales neque sodales ut etiam sit. Nec sagittis aliquam malesuada bibendum arcu vitae. A cras semper auctor neque vitae tempus. Purus in mollis nunc sed id. Dolor sit amet consectetur adipiscing elit duis tristique sollicitudin. Elementum integer enim neque volutpat ac. Nisi lacus sed viverra tellus in. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus aenean.</p>\r\n', '2019-07-21 09:22:14', 'lorem.html', 'post-5d342ec609cd4.jpg', 'user-5d220f1860ad4', 1, 3),
('post-5d342edc27344', 'Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Feugiat in fermentum posuere urna nec tincidunt praesent. Turpis nunc eget lorem dolor sed viverra ipsum nunc aliquet. Elementum tempus egestas sed sed risus pretium. Egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam. Posuere urna nec tincidunt praesent semper. A scelerisque purus semper eget duis. Duis at consectetur lorem donec massa sapien faucibus et. Volutpat blandit aliquam etiam erat velit scelerisque in dictum non. Proin libero nunc consequat interdum varius sit amet. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Dui id ornare arcu odio ut sem nulla. In nibh mauris cursus mattis molestie a. Duis ut diam quam nulla porttitor massa. Aliquam vestibulum morbi blandit cursus risus. Volutpat ac tincidunt vitae semper.</p>\r\n\r\n<p>Urna nunc id cursus metus. Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Sed odio morbi quis commodo. Magna sit amet purus gravida quis. Eget egestas purus viverra accumsan in nisl. Purus ut faucibus pulvinar elementum integer enim neque volutpat ac. Semper eget duis at tellus at. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Ac turpis egestas sed tempus urna et pharetra pharetra. Quis lectus nulla at volutpat. Lectus magna fringilla urna porttitor. Quam vulputate dignissim suspendisse in est ante. Penatibus et magnis dis parturient montes nascetur ridiculus. Neque volutpat ac tincidunt vitae semper quis lectus nulla. Sed id semper risus in hendrerit gravida rutrum quisque non. Gravida neque convallis a cras. Vitae suscipit tellus mauris a diam maecenas sed enim ut.</p>\r\n\r\n<p>Vel risus commodo viverra maecenas accumsan lacus. Tempus egestas sed sed risus pretium quam. Amet luctus venenatis lectus magna fringilla urna. In metus vulputate eu scelerisque felis imperdiet proin fermentum leo. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Diam quis enim lobortis scelerisque. Sed turpis tincidunt id aliquet. Tellus integer feugiat scelerisque varius. Semper quis lectus nulla at volutpat diam ut venenatis tellus. Sit amet justo donec enim diam vulputate. Nec feugiat nisl pretium fusce. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras.</p>\r\n\r\n<p>At risus viverra adipiscing at. Augue eget arcu dictum varius duis at consectetur lorem. Dictumst quisque sagittis purus sit amet volutpat consequat mauris nunc. Viverra ipsum nunc aliquet bibendum. Aliquam sem et tortor consequat id porta nibh venenatis cras. Velit euismod in pellentesque massa placerat. Velit dignissim sodales ut eu sem integer. Adipiscing bibendum est ultricies integer quis auctor elit sed. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Mollis aliquam ut porttitor leo a diam sollicitudin tempor. Tellus at urna condimentum mattis pellentesque id nibh tortor id. Placerat vestibulum lectus mauris ultrices eros in. Posuere morbi leo urna molestie at elementum eu. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Morbi tincidunt ornare massa eget egestas purus viverra. Dapibus ultrices in iaculis nunc. Quisque id diam vel quam. Lectus arcu bibendum at varius vel pharetra vel turpis nunc. Sapien eget mi proin sed libero enim sed. Fringilla ut morbi tincidunt augue interdum.</p>\r\n', '2019-07-21 09:22:36', 'ipsum.html', 'post-5d342edc27344.jpg', 'user-5d220f1860ad4', 1, 10),
('post-5d342ef756daa', 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Velit laoreet id donec ultrices tincidunt arcu. Interdum posuere lorem ipsum dolor sit amet. Donec ultrices tincidunt arcu non sodales. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. In cursus turpis massa tincidunt. Interdum velit euismod in pellentesque massa placerat duis. Odio euismod lacinia at quis risus. Quam pellentesque nec nam aliquam sem et tortor. Viverra vitae congue eu consequat ac felis donec et. Enim sed faucibus turpis in eu mi bibendum neque egestas. Non sodales neque sodales ut etiam sit amet. Nunc non blandit massa enim nec dui nunc mattis. Ac turpis egestas sed tempus urna et pharetra. Consequat ac felis donec et odio pellentesque. Malesuada nunc vel risus commodo. Nibh cras pulvinar mattis nunc sed blandit. Maecenas accumsan lacus vel facilisis volutpat.</p>\r\n\r\n<p>Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Sed faucibus turpis in eu mi bibendum neque. Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus in. Et malesuada fames ac turpis egestas maecenas pharetra. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus. Enim ut tellus elementum sagittis. Tincidunt ornare massa eget egestas purus viverra accumsan. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Ultrices eros in cursus turpis massa tincidunt. Varius duis at consectetur lorem donec. Volutpat est velit egestas dui id ornare arcu.</p>\r\n\r\n<p>In massa tempor nec feugiat nisl pretium fusce. A cras semper auctor neque vitae tempus quam pellentesque. Faucibus purus in massa tempor nec feugiat nisl pretium fusce. Tellus rutrum tellus pellentesque eu. Et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Justo nec ultrices dui sapien eget mi proin sed libero. Vulputate mi sit amet mauris commodo quis imperdiet massa. Urna cursus eget nunc scelerisque viverra mauris. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo. Tincidunt arcu non sodales neque sodales. Sodales neque sodales ut etiam. Nulla facilisi etiam dignissim diam quis enim lobortis. Dui id ornare arcu odio ut.</p>\r\n\r\n<p>Ac auctor augue mauris augue neque gravida in. Id aliquet lectus proin nibh nisl condimentum id. Quis eleifend quam adipiscing vitae proin sagittis. Nam libero justo laoreet sit amet cursus sit amet dictum. Eget gravida cum sociis natoque. Mauris ultrices eros in cursus turpis massa. Proin fermentum leo vel orci. Congue quisque egestas diam in arcu cursus euismod quis. Sapien eget mi proin sed. Cras pulvinar mattis nunc sed blandit libero volutpat sed cras. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida.</p>\r\n\r\n<p>Molestie a iaculis at erat. Viverra nibh cras pulvinar mattis. Purus gravida quis blandit turpis cursus in. Malesuada fames ac turpis egestas maecenas pharetra convallis. Eget aliquet nibh praesent tristique magna sit amet purus. Mollis aliquam ut porttitor leo a. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Bibendum arcu vitae elementum curabitur vitae nunc sed velit dignissim. Sit amet volutpat consequat mauris nunc congue nisi vitae suscipit. Turpis egestas integer eget aliquet. Ornare quam viverra orci sagittis eu. Felis eget nunc lobortis mattis aliquam. Turpis egestas pretium aenean pharetra magna ac placerat.</p>\r\n', '2019-07-21 09:23:03', 'lorem-ipsum.html', 'post-5d342ef756daa.jpg', 'user-5d220f1860ad4', 1, 4),
('post-5d36bb5c378be', 'njjdjfdf', '<p>sadasdasdvavgrergrgergregeg</p>\r\n', '2019-07-23 07:46:36', 'njjdjfdf.html', 'post_default.jpg', 'user-5d220f1860ad4', 1, 0),
('post-5d3929c855e2c', 'Ini Post User Stella', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mauris vitae ultricies leo integer. Quis commodo odio aenean sed adipiscing diam donec. Et sollicitudin ac orci phasellus egestas tellus rutrum tellus. Libero enim sed faucibus turpis in eu. Arcu non sodales neque sodales ut. Aenean euismod elementum nisi quis eleifend quam adipiscing. Vitae congue mauris rhoncus aenean vel. Amet facilisis magna etiam tempor orci eu lobortis elementum nibh. Penatibus et magnis dis parturient montes nascetur ridiculus mus mauris.</p>\r\n\r\n<p>Lorem dolor sed viverra ipsum. Nunc aliquet bibendum enim facilisis gravida neque convallis a cras. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus mattis. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Aliquam sem et tortor consequat id porta. Maecenas sed enim ut sem viverra aliquet. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Consequat interdum varius sit amet. Nisl nunc mi ipsum faucibus vitae aliquet. Commodo elit at imperdiet dui accumsan sit amet nulla. Accumsan in nisl nisi scelerisque eu ultrices.</p>\r\n\r\n<p>Ac ut consequat semper viverra nam. Ut porttitor leo a diam. Eget nulla facilisi etiam dignissim diam quis. Euismod quis viverra nibh cras pulvinar mattis. Pretium viverra suspendisse potenti nullam ac tortor vitae purus faucibus. Volutpat est velit egestas dui id. Lacus luctus accumsan tortor posuere ac ut consequat semper viverra. Eget mi proin sed libero. Et tortor at risus viverra adipiscing. Nisl suscipit adipiscing bibendum est ultricies integer quis auctor elit. Urna id volutpat lacus laoreet. Id venenatis a condimentum vitae sapien pellentesque. Lacinia at quis risus sed vulputate odio ut enim. Nulla posuere sollicitudin aliquam ultrices sagittis. Non odio euismod lacinia at quis risus sed vulputate. Tempus urna et pharetra pharetra massa.</p>\r\n', '2019-07-25 04:02:16', 'ini-post-user-stella.html', 'post-5d3929c855e2c.jpg', 'user-5d3929514e2fe', 1, 0),
('post-5d3b1f854d3c4', 'Testing', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus mauris ultrices eros in cursus turpis. Nisi vitae suscipit tellus mauris a diam maecenas sed. Integer eget aliquet nibh praesent tristique magna sit. Diam sit amet nisl suscipit adipiscing bibendum. Porta nibh venenatis cras sed felis eget velit aliquet sagittis. Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit amet. Volutpat est velit egestas dui id ornare arcu. Turpis egestas sed tempus urna et pharetra pharetra massa. Ut venenatis tellus in metus vulputate eu scelerisque felis imperdiet. Laoreet suspendisse interdum consectetur libero id faucibus. Sed arcu non odio euismod lacinia at quis risus. Adipiscing elit pellentesque habitant morbi tristique senectus et. Condimentum lacinia quis vel eros donec ac. At augue eget arcu dictum varius duis at consectetur. Porttitor leo a diam sollicitudin. Quisque egestas diam in arcu cursus euismod quis. Facilisi cras fermentum odio eu feugiat pretium nibh. Nullam non nisi est sit amet. Ut porttitor leo a diam.</p>\r\n\r\n<p>Elit sed vulputate mi sit amet mauris commodo quis imperdiet. Gravida quis blandit turpis cursus. A pellentesque sit amet porttitor eget dolor morbi. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut. Sit amet porttitor eget dolor morbi. Phasellus vestibulum lorem sed risus ultricies tristique nulla aliquet enim. In nibh mauris cursus mattis molestie. Faucibus et molestie ac feugiat sed lectus. Nulla facilisi nullam vehicula ipsum a. Risus nullam eget felis eget nunc lobortis mattis. Volutpat est velit egestas dui id ornare arcu. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Nulla at volutpat diam ut venenatis. Lacinia at quis risus sed. Id ornare arcu odio ut. Non enim praesent elementum facilisis leo vel fringilla. Sit amet nisl suscipit adipiscing bibendum. Curabitur gravida arcu ac tortor dignissim convallis aenean.</p>\r\n', '2019-07-26 15:43:01', 'testing.html', 'post-5d3b1f854d3c4.jpg', 'user-5d220f1860ad4', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `role` varchar(10) NOT NULL DEFAULT 'USER',
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `image`, `role`, `dibuat_pada`) VALUES
('user-5d220f1860ad4', 'Gilang Saeful Anwar', 'gilang', 'sagilang@gmail.com', '$2y$10$pzV7SdwtLT5RN3ne165epeOSKF7a8bpcO/yX.TxQXZUvIWCAZhMga', 'default.jpg', 'USER', '2019-07-07 15:26:16'),
('user-5d3929514e2fe', 'Stella Annisa', 'stella', 'stellaannisa4869@gmail.com', '$2y$10$v74opP0ZnJzamnF/ygOyCeXM2W4t3dPX1psMi2l9507trhXkXzTi.', 'default.jpg', 'USER', '2019-07-25 04:00:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`ip`, `tanggal`, `hits`, `online`, `browser`, `platform`) VALUES
('::1', '2019-07-20', 41, '1563638867', 'Chrome', 'Windows 10'),
('::1', '2019-07-21', 13, '1563722407', 'Chrome', 'Windows 10'),
('::1', '2019-07-21', 2, '1563695888', 'Edge', 'Windows 10'),
('::1', '2019-07-22', 103, '1563807523', 'Chrome', 'Windows 10'),
('::1', '2019-07-22', 1, '1563759002', 'Internet Explorer', 'Windows 10'),
('192.168.100.8', '2019-07-22', 1, '1563791819', 'Chrome', 'Android'),
('192.168.100.2', '2019-07-22', 1, '1563808313', 'Chrome', 'Android'),
('::1', '2019-07-23', 2, '1563853250', 'Chrome', 'Windows 10'),
('::1', '2019-07-25', 3, '1564032689', 'Chrome', 'Windows 10'),
('::1', '2019-07-27', 2, '1564243297', 'Chrome', 'Windows 10'),
('::1', '2019-07-30', 1, '1564490089', 'Chrome', 'Windows 10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_halaman`),
  ADD KEY `menuparent` (`parent`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD CONSTRAINT `menuparent` FOREIGN KEY (`parent`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
