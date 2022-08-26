-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Feb 2018 pada 09.59
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposition`
--

CREATE TABLE `disposition` (
  `dispo_id` int(25) NOT NULL,
  `disposition_at` varchar(25) NOT NULL,
  `reply_at` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `notification` varchar(25) NOT NULL,
  `mail_in_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `disposition_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail_in`
--

CREATE TABLE `mail_in` (
  `mail_in_id` int(25) NOT NULL,
  `incoming_at` date NOT NULL,
  `mail_code` int(25) NOT NULL,
  `mail_date` date NOT NULL,
  `mail_from` varchar(25) NOT NULL,
  `mail_to` varchar(25) NOT NULL,
  `mail_subject` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_upload` varchar(255) NOT NULL,
  `mail_type_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail_out`
--

CREATE TABLE `mail_out` (
  `mail_out_id` int(25) NOT NULL,
  `sent_at` date NOT NULL,
  `mail_code` int(25) NOT NULL,
  `mail_date` date NOT NULL,
  `mail_to` varchar(25) NOT NULL,
  `mail_subject` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mail_type_id` int(25) NOT NULL,
  `file_upload` varchar(222) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail_type`
--

CREATE TABLE `mail_type` (
  `mail_type_id` int(25) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mail_type`
--

INSERT INTO `mail_type` (`mail_type_id`, `type`) VALUES
(1, 'Rahasia'),
(2, 'Segera'),
(3, 'Biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(55) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposition`
--
ALTER TABLE `disposition`
  ADD PRIMARY KEY (`dispo_id`),
  ADD KEY `mail_in_id` (`mail_in_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `disposition_id` (`disposition_id`);

--
-- Indexes for table `mail_in`
--
ALTER TABLE `mail_in`
  ADD PRIMARY KEY (`mail_in_id`),
  ADD KEY `mail_type_id` (`mail_type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mail_out`
--
ALTER TABLE `mail_out`
  ADD PRIMARY KEY (`mail_out_id`),
  ADD KEY `mail_type_id` (`mail_type_id`),
  ADD KEY `mail_type_id_2` (`mail_type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mail_type`
--
ALTER TABLE `mail_type`
  ADD PRIMARY KEY (`mail_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposition`
--
ALTER TABLE `disposition`
  MODIFY `dispo_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mail_in`
--
ALTER TABLE `mail_in`
  MODIFY `mail_in_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mail_out`
--
ALTER TABLE `mail_out`
  MODIFY `mail_out_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mail_type`
--
ALTER TABLE `mail_type`
  MODIFY `mail_type_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposition`
--
ALTER TABLE `disposition`
  ADD CONSTRAINT `disposition_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `disposition_ibfk_2` FOREIGN KEY (`mail_in_id`) REFERENCES `mail_in` (`mail_in_id`);

--
-- Ketidakleluasaan untuk tabel `mail_in`
--
ALTER TABLE `mail_in`
  ADD CONSTRAINT `mail_in_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `mail_in_ibfk_2` FOREIGN KEY (`mail_type_id`) REFERENCES `mail_type` (`mail_type_id`);

--
-- Ketidakleluasaan untuk tabel `mail_out`
--
ALTER TABLE `mail_out`
  ADD CONSTRAINT `mail_out_ibfk_1` FOREIGN KEY (`mail_type_id`) REFERENCES `mail_type` (`mail_type_id`),
  ADD CONSTRAINT `mail_out_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
