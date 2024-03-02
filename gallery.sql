-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2024 pada 13.04
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(16, 'Gunung', 'Gunung adalah suatu bentuk permukaan tanah yang letaknya jauh lebih tinggi daripada tanah-tanah di daerah sekitarnya', '2024-02-29', 8),
(17, 'Ranu', 'Ranu merupakan salah satu jenis danau yang terbentuk khusus oleh letusan gunungapi secara freatomagmatik. danau merupakan tubuh perairan yang menempati suatu cekungan dan dikelilingi oleh daratan.', '2024-02-29', 8),
(18, 'Air Terjun', 'Air terjun adalah formasi geologi dari arus air yang mengalir melalui suatu formasi bebatuan yang mengalami erosi dan jatuh ke bawah dari ketinggian. Air terjun dapat berupa buatan yang biasa digunakan di taman. ', '2024-02-29', 8),
(19, 'Pantai', 'Pantai adalah sebuah bentuk geografis yang terdiri dari pasir, dan terdapat di daerah pesisir laut. Daerah pantai menjadi batas antara daratan dan perairan laut. Kawasan pantai berbeda dengan pesisir walaupun antara keduanya saling berkaitan. ', '2024-02-29', 8),
(20, 'Makanan', 'Aneka makanan', '2024-03-02', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(20, 'Bromo', 'Gunung Bromo atau dalam bahasa Tengger dieja \"Brama\", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia', '2024-02-29', 'bromo.jpg', 16, 8),
(21, 'Rinjani', 'Gunung Rinjani adalah gunung yang berlokasi di Pulau Lombok, Nusa Tenggara Barat. Gunung yang merupakan gunung berapi kedua tertinggi di Indonesia dengan ketinggian 3.726 mdpl ', '2024-02-29', 'rinjani.jpg', 16, 8),
(22, 'Semeru', 'Gunung Semeru atau Gunung Meru adalah sebuah gunung berapi kerucut di Jawa Timur, Indonesia. Gunung Semeru merupakan gunung tertinggi di Pulau Jawa, dengan puncaknya Mahameru, 3.676 meter dari permukaan laut.', '2024-02-29', 'semeru.jpg', 16, 8),
(23, 'Kawah Ijen', 'Gunung Ijen adalah sebuah gunung berapi yang terletak di perbatasan Kabupaten Banyuwangi dan Kabupaten Bondowoso, Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.386 mdpl. ', '2024-02-29', 'kawah ijen.jpg', 16, 8),
(24, 'Ranu Kumbolo', 'Ranu Kumbolo adalah sebuah danau yang terletak di dalam Taman Nasional Bromo Tengger Semeru, Jawa Timur, Indonesia.', '2024-02-29', 'ranu kumbolo.jfif', 17, 8),
(25, 'Ranu Regulo', 'Ranu Regulo berlokasi di Ranupane Satu, Ranupani, Kecamatan Senduro, Kabupaten Lumajang, Jawa Timur.', '2024-02-29', 'ranu regulo.jpg', 17, 8),
(26, 'Ranu Pani', 'Ranu Pani atau Ranupani adalah sebuah danau vulkanik di Desa Ranu Pani, Kecamatan Senduro, Kabupaten Lumajang, Jawa Timur. Ranu Pani adalah bagian dari Taman Nasional Bromo Tengger Semeru.', '2024-02-29', 'ranu pani.jpg', 17, 8),
(27, 'Ranu Klakah', 'Ranu Klakah adalah sebuah danau di kecamatan Klakah, Lumajang, Jawa Timur. Letaknya sekitar 10 km di sebelah utara kota Lumajang.', '2024-02-29', 'ranu klakah.jpg', 17, 8),
(28, 'Tumpak Sewu', 'Air Terjun Tumpak Sewu merupakan salah satu air terjun tercantik yang ada di Jawa. Lokasinya berada di Desa Wisata Sidomulyo, Kec. Pronojiwo, Kabupaten Lumajang, Provinsi Jawa Timur. Bagi yang belum tahu, Lumajang ada di timur kota Malang atau tenggara jauh dari kota Surabaya.', '2024-02-29', 'tumpak sewu.jpg', 18, 8),
(29, 'Kapas Biru', 'Air Terjun Kapas Biru atau Coban Kapas Biru merupakan air terjun yang terletak di Kabupaten Lumajang, Provinsi Jawa Timur. Objek wisata ini dibuka untuk umum sejak tahun 2015 dengan menawarkan keindahan air terjun. Belum diketahui pasti total ketinggian air terjun ini namun diperkirakan sekitar 100 meter', '2024-02-29', 'kapas biru.jfif', 18, 8),
(30, 'Antrokan', 'Air Terjun Antrokan adalah salah satu air terjun indah di Jember. Berada di Desa Manggisan, Kecamatan Tanggul.', '2024-02-29', 'antrokan.jfif', 18, 8),
(32, 'Toroan', 'Air Terjun Torowan adalah sebuah air terjun yang berada di Pulau Madura tepatnya di Kabupaten Sampang', '2024-02-29', 'toroan.jfif', 18, 8),
(33, 'Papuma', 'Pantai Papuma adalah sebuah pantai yang menjadi tempat wisata di Kabupaten Jember, Provinsi Jawa Timur, Indonesia.Nama Papuma sendiri sebenarnya adalah sebuah singkatan dari “Pasir Putih Malikan. Pantai papuma berada di Desa Lojejer, Kecamatan Wuluhan, Kabupaten Jember.', '2024-02-29', 'papuma.jfif', 19, 8),
(34, 'Payangan', 'Pantai Payangan tepatnya berlokasi di Dusun Payangan, Desa Sumberrejo, Kecamatan Ambulu, Kabupaten Jember, Jawa Timur.', '2024-02-29', 'payangan.jpeg', 19, 8),
(35, 'Watu Ulo', 'Pantai Watu Ulo adalah sebuah Pantai yang terletak di pantai selatan Jawa Timur, tepatnya di desa Sumberejo, kecamatan Ambulu, Jember. Mayoritas penduduk di Pantau Watu Ulo berasal dari etnis Madura dan kebanyakan berprofesi sebagai nelayan dan petani.', '2024-02-29', 'watu ulo.jpg', 19, 8),
(36, 'Wedi Ireng', 'Pantai Wedi Ireng, ternyata pasirnya sangat putih. Yang dimaksud wedi ireng tentunya bukan berarti pasir hitam, melainkan takut hitam. ', '2024-02-29', 'wedi ireng.jfif', 19, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(9, 20, 8, 'halo', '2024-02-29'),
(10, 24, 8, 'itu terletak dimana?', '2024-02-29'),
(11, 23, 8, 'wow', '2024-02-29'),
(12, 20, 8, 'oke', '2024-03-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(14, 21, 8, '2024-02-29'),
(15, 22, 8, '2024-02-29'),
(16, 24, 8, '2024-02-29'),
(17, 33, 8, '2024-02-29'),
(18, 23, 8, '2024-02-29'),
(19, 20, 8, '2024-02-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(8, 'dinda', '827ccb0eea8a706c4c34a16891f84e7b', 'dinda@gmail.com', 'dindamega123', 'jember');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
