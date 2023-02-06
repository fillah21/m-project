-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Feb 2023 pada 14.32
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m-project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_user`, `id_matkul`) VALUES
(3, 2, 62),
(4, 2, 63),
(6, 2, 61),
(7, 2, 69),
(9, 2, 71),
(10, 2, 72),
(11, 22, 72),
(12, 22, 58),
(13, 22, 71),
(14, 2, 43),
(15, 2, 42);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(100) DEFAULT NULL,
  `nama_matkul` varchar(100) DEFAULT NULL,
  `semester_matkul` int(11) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `kode_matkul`, `nama_matkul`, `semester_matkul`, `sks`) VALUES
(1, 'UMCX111T', 'AGAMA', 1, 2),
(2, 'UMC105', 'BAHASA INGGRIS', 1, 2),
(3, 'C1CX211T', 'DASAR PEMROGRAMAN DAN ALGORITMA', 1, 3),
(4, 'C1CX122T', 'FISIKA', 1, 3),
(5, 'C1CX124T', 'LOGIKA MATEMATIKA', 1, 3),
(6, 'UMCX2108T', 'PANCASILA', 1, 2),
(7, 'UMCX114T', 'MATEMATIKA', 1, 2),
(8, 'C1CY221T', 'PENGANTAR TEKNOLOGI INFORMASI', 1, 2),
(9, '1CX211P', 'PRAK DASAR PEMROGRAMAN DAN ALGORITMA ', 1, 1),
(10, 'UMCY2105T', 'AL ISLAM KEMUHAMMADIYAHAN', 2, 1),
(11, 'UMCX1102T', 'BAHASA INDONESIA', 2, 2),
(12, 'C1CX224T', 'KALKULUS 1', 2, 2),
(13, 'UMCX112T', 'KEWARGANEGARAAN', 2, 2),
(14, 'UMCY241T', 'KEWIRAUSAHAAN', 2, 2),
(15, 'C1CX231T', 'PEMROGRAMAN 1 (TERSTRUKTUR/PASCAL)', 2, 2),
(16, 'UMCY210P', 'PRAK. AL ISLAM KEMUHAMMADIYAHAN', 2, 1),
(17, 'C1CX231P', 'PRAK. PEMROGRAMAN 1 (TERSTRUKTUR/PASCAL)', 2, 1),
(18, 'C1CX222P', 'PRAK. SISTEM OPERASI', 2, 1),
(19, 'C1CX225P', 'PRAKTIKUM SISTEM DIGITAL', 2, 1),
(20, 'C1CX225T', 'SISTEM DIGITAL', 2, 2),
(21, 'C1CX222T', 'SISTEM OPERASI', 2, 2),
(22, 'UMCY311T', 'AL ISLAM STUDY AL-QUR\'AN', 3, 1),
(23, 'C1CX321T', 'ARSITEKTUR & ORGANISASI KOMPUTER ', 3, 3),
(24, 'C1CX125T', 'KALKULUS 2', 3, 2),
(25, 'C1CX422T', 'KOMUNIKASI DATA', 3, 2),
(26, 'C0CX331TP', 'PEMROGRAMAN BERORIENTASI OBJEK', 3, 2),
(27, 'C1CX331P', 'PRAK. PEMROGRAMAN II PBO', 3, 1),
(28, 'C1CX223P', 'PRAK. STRUKTUR DATA ', 3, 1),
(29, 'UMCY311P', 'PRAKTEK AL ISLAM STUDY AL-QUR\'AN ', 3, 1),
(30, 'C0CX324T', 'SISTEM INFORMASI (ANALISIS PERANCANGAN)', 3, 3),
(31, 'C1CX341T', 'STATISKA DAN PROBABILITAS', 3, 2),
(32, 'C1CX327T', 'STRUKTUR DATA DAN ALGORITMA', 3, 2),
(33, 'UMCY411T', 'AL ISLAM STUDY AL HADITS', 4, 2),
(34, 'C1CX426T', 'ANALISIS DAN STRATEGI ALGORITMA', 4, 3),
(35, 'C1CX432T', 'BASIS DATA', 4, 3),
(36, 'C1CX532T', 'JARINGAN KOMPUTER', 4, 3),
(37, 'C1CX425T', 'MATEMATIKA DISKRIT', 4, 3),
(38, 'C1CX433T', 'PEMROGRAMAN PBO LANJUT', 4, 3),
(39, 'C1CX541T', 'REKAYASA PERANGKAT LUNAK', 4, 3),
(40, 'C1CX634T', 'PEMROGRAMAN VISUAL (VISUAL PROGRAMMING)', 4, 2),
(41, 'C1CX634P', 'PRAK. PEMROGRAMAN VISUAL (VISUAL PROGRAMMING)', 4, 1),
(42, 'C1CY666T', 'BASIS DATA LANJUT', 5, 2),
(43, 'C1CY763T', 'GRAFIKA KOMPUTER DAN VISUALISASI', 5, 3),
(44, 'C1CX644T', 'MANAJEMEN PROYEK TEKNOLOGI INFORMASI ', 5, 2),
(45, 'C1CX642T', 'METODE PENELITIAN ', 5, 2),
(46, 'C1CX633T', 'PEMROGRAMAN V (WEB) ', 5, 2),
(47, 'C1CX633P', 'PRAK. PEMROGRAMAN V (WEB) ', 5, 1),
(48, 'C1CX534P', 'PRAKTIKUM BASIS DATA LANJUT', 5, 1),
(49, 'C1CY561P', 'PRAKTIKUM GRAFIKA KOMPUTER DAN VISUALISASI ', 5, 1),
(50, 'C1CX522T', 'TEORI BAHASA DAN OTOMASI', 5, 3),
(51, 'C1CX521T', 'TEST IMPLEMENTASI SISTEM', 5, 3),
(52, 'C1CX643T', 'ANALISIS DAN PERANCANGAN BERORIENTASI OBJEK ', 6, 3),
(53, 'UMCY641T', 'ETIKA PROFESI', 6, 2),
(54, 'UMCY6111T', 'KAJIAN ISLAM PROFESI', 6, 1),
(55, 'C1CX632T', 'KECERDASAN KOMPUTATIONAL', 6, 3),
(56, 'UMCY651P', 'KKN', 6, 3),
(57, 'C1CY768T', 'PEMROGRAMAN WEB LANJUT', 6, 3),
(58, 'C1CX641T', 'PENG. SISTEM KOMPUTER', 6, 3),
(59, 'C1CX669T', 'SISTEM PARALEL DAN TERDISTRIBUSI', 6, 3),
(60, 'C1CY741T', 'LEGISLASI PROFESI ', 7, 1),
(61, 'C1CX621T', 'RISET OPERASI', 7, 3),
(62, 'C1CX751P', 'PRAKTEK KERJA LAPANGAN ', 7, 4),
(63, 'C1CX631T', 'KECERDASAN BUATAN', 7, 3),
(64, 'C1CX669T', 'PEMROGRAMAN BERGERAK ', 7, 2),
(65, 'C1CX669P', 'PRAKTIKUM PEMROGRAMAN BERGERAK ', 7, 1),
(66, 'C1CX751T', 'INTERAKSI MANUSIA DAN KOMPUTER ', 7, 2),
(67, 'C1CX851P', 'SEMINAR TEKNIK INFORMATIKA ', 8, 1),
(68, 'C1CX852P', 'TUGAS AKHIR/SKRIPSI ', 8, 6),
(69, 'C1CY766T', 'PENILAIAN RESIKO TEKOLOGI INFORMASI ', 9, 3),
(70, 'C1CY761T', 'SISTEM NIRKABEL DAN BERGERAK ', 9, 3),
(71, 'C1CY765T', 'SISTEM PAKAR DAN PENDUKUNG KEPUTUSAN ', 9, 3),
(72, 'C1CX764T', 'BIG DATA', 9, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_induk` int(100) NOT NULL,
  `semester` int(100) NOT NULL,
  `ipk` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `sudah_krs` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `pwd`, `nama`, `email`, `foto`, `no_induk`, `semester`, `ipk`, `alamat`, `no_hp`, `jk`, `sudah_krs`, `level`) VALUES
(1, 'admin', '$2y$10$QdukHJ7I8wdUJoruHumaDujUEwJe3tPF8qwfufoVXSJoH/lxcds..', 'Admininstrator', 'admin@example.com', '', 41243423, 7, '3.5', 'Kuningan', '085826389656', 'L', 'Belum', 'Admin'),
(2, 'user', '$2y$10$V5p5vix/8VSiM7CpqwLOzO4kPt7Uv2pBP2TvWqY0cnXINNDIGQawC', 'User App', 'user@gmail.com', '63deec425e2ee.png', 32423432, 7, '3.5', 'Kuningan', '085826389656', 'L', 'Sudah', 'User'),
(6, 'alvin', '$2y$10$6IfYmpBZMWOIQLonttdlwuU1WFtjekdUcJnbEBYqaVh2TEM1nhRnO', 'Alvin Nugraha', 'alvin@gmail.com', '63d0c8b79b97f.png', 190511088, 7, '3', 'Bode', '082312321312', 'P', 'Belum', 'User'),
(7, 'deden', '$2y$10$HylnDa/268jApZXuY4.ZJueuUXbTjl99SsdufIEXaNm5uJF9lJECK', 'Deden Empal Seblak', 'dedenselalutersakiti@gmail.com', '63dced5466696.png', 1234, 8, '4', 'Neraka', '40912304938', 'L', 'Tidak', 'Admin'),
(20, 'eka', '$2y$10$tXu5F3jKMFlfzQws5sWuSuDrduSkl.ngfDE4TPbEwqGsrhl1LC3ga', 'Eka Nurseva Saniyah', 'ekanursevas@gmail.com', 'default.png', 1234, 8, '4', 'Cirebon', '2048903', 'P', 'Tidak', 'Admin'),
(21, 'ahmad', '$2y$10$/USbhydspBeifzpbKyhkh.u10HAeG5HuVvJJ4.zlQKegRMLAm0Q72', 'Ahmad Nur Cahyadi', 'ahmadnur@gmail.com', '63d3e3bb18ca3.jpg', 1234, 8, '4', 'Cirebon', '45485958534', 'L', 'Tidak', 'Admin'),
(22, 'zaki', '$2y$10$BRBu9TiQ438fbFXJmBEBVOqIzPr6S9gAt6ykQ7jqE2lyfaXbCeIMS', 'Zaki Fillah', 'zaki@gmail.com', 'default.png', 1234, 8, '4', 'Kuningan', '085826389656', 'L', 'Sudah', 'User'),
(23, 'fillah21', '$2y$10$x6u1CgqZvHMdf8pRYXzuYu5ypkPaRUaiNzqq5DXee3U8QKD18VfVa', 'Fillah Zaki Alhaqi', 'fillah.alhaqi11@gmail.com', '63e0fd5c2a4ee.jpg', 1234, 8, '4', 'Kuningan', '085826389656', 'L', 'Tidak', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
