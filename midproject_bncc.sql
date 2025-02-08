-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2025 pada 09.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midproject_bncc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` char(255) NOT NULL,
  `last_name` char(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bio` varchar(10000) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `bio`, `photo`) VALUES
(1, 'admin', 'BNCC', 'adminBNCC@gmail.com', 'Admin123', 'Hi my name is Admin, and I like backend development.', ''),
(10, 'Federick', 'Kuman', 'FdrickJ1233@gmail.com', '', 'Sibuk', 'uploads/WhatsApp Image 2024-08-11 at 19.08.21.jpeg'),
(11, 'Zephyr', 'Callahan', 'zephyrc99@voidmail.com', '', 'Mantan pemain skateboard profesional yang kini menjadi kolektor jam tangan vintage. Pernah tinggal di tiga benua dan menguasai empat bahasa.', 'uploads/download (1).jfif'),
(12, 'Liona', 'Matsumoto', 'liona.m@neonwave.jp', '', 'Sibuk', 'uploads/download (2).jfif'),
(13, 'Dimitri', 'Kowalski', 'Dkowalski22@gmail.com', '', 'Sedang Bekerja', 'uploads/1f8d0fe6-ae29-4b0f-a3e1-9d847929ce8a.jfif'),
(14, 'Valeria', 'De La Cruz', 'Valeria.dl@gmail.com', '', 'Kolektor', 'uploads/Makima ❤️.jfif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`) USING HASH;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
