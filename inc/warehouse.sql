-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 06:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `tanggal_aktivitas` text DEFAULT NULL,
  `user` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`tanggal_aktivitas`, `user`, `keterangan`) VALUES
('Rabu, 24 Januari 2024 15:49:21', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Rabu, 24 Januari 2024 pukul 15:49:21'),
('Rabu, 24 Januari 2024 15:49:55', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Tambah Data Kategori Baru dengan nama kategori <strong>Aksesoris</strong>\r\n                            pada hari Rabu, 24 Januari 2024 pukul 15:49:55'),
('Rabu, 24 Januari 2024 15:50:04', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Tambah Data Kondisi Baru dengan nama kondisi <strong>Baik</strong>\r\n                            pada hari Rabu, 24 Januari 2024 pukul 15:50:04'),
('Rabu, 24 Januari 2024 15:50:40', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Tambah Data Barang Baru dengan nama barang <strong>Barang 1</strong>\r\n                            pada hari Rabu, 24 Januari 2024 pukul 15:50:40'),
('Rabu, 24 Januari 2024 15:51:54', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Masuk dengan nama barang <strong>Barang 1</strong>\r\n                            dengan jumlah barang masuk sebesar 100 pada hari Rabu, 24 Januari 2024 pukul 15:51:54'),
('Rabu, 24 Januari 2024 15:52:48', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>Barang 1</strong>\r\n                            dengan jumlah barang keluar sebesar 50 pada hari Rabu, 24 Januari 2024\r\n                            pukul 15:52:48'),
('Rabu, 24 Januari 2024 15:54:29', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 15:54:29'),
('Rabu, 24 Januari 2024 16:32:18', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Masuk dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang masuk sebesar 100 pada hari Rabu, 24 Januari 2024 pukul 16:32:18'),
('Rabu, 24 Januari 2024 16:32:30', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Masuk dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang masuk sebesar 100 pada hari Rabu, 24 Januari 2024 pukul 16:32:30'),
('Rabu, 24 Januari 2024 16:32:41', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Masuk dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang masuk sebesar 100 pada hari Rabu, 24 Januari 2024 pukul 16:32:41'),
('Rabu, 24 Januari 2024 16:35:28', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang keluar sebesar 100 pada hari Rabu, 24 Januari 2024\r\n                            pukul 16:35:28'),
('Rabu, 24 Januari 2024 16:35:34', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang keluar sebesar 100 pada hari Rabu, 24 Januari 2024\r\n                            pukul 16:35:34'),
('Rabu, 24 Januari 2024 16:35:49', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Masuk dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang masuk sebesar 1000 pada hari Rabu, 24 Januari 2024 pukul 16:35:49'),
('Rabu, 24 Januari 2024 16:35:55', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang keluar sebesar 100 pada hari Rabu, 24 Januari 2024\r\n                            pukul 16:35:55'),
('Rabu, 24 Januari 2024 16:36:01', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang keluar sebesar 100 pada hari Rabu, 24 Januari 2024\r\n                            pukul 16:36:01'),
('Rabu, 24 Januari 2024 16:36:08', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>Barang 10</strong>\r\n                            dengan jumlah barang keluar sebesar 100 pada hari Rabu, 24 Januari 2024\r\n                            pukul 16:36:08'),
('Rabu, 24 Januari 2024 17:19:14', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Rabu, 24 Januari 2024 pukul 17:19:14'),
('Kamis, 25 Januari 2024 09:17:36', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Kamis, 25 Januari 2024 pukul 09:17:36'),
('Kamis, 25 Januari 2024 09:33:04', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Kamis, 25 Januari 2024 pukul 09:33:04'),
('Kamis, 25 Januari 2024 09:33:20', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Kamis, 25 Januari 2024 pukul 09:33:20'),
('Kamis, 25 Januari 2024 09:34:20', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Kamis, 25 Januari 2024 pukul 09:34:20'),
('Kamis, 25 Januari 2024 09:35:01', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Kamis, 25 Januari 2024 pukul 09:35:01'),
('Kamis, 25 Januari 2024 09:36:24', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Kamis, 25 Januari 2024 pukul 09:36:24'),
('Kamis, 25 Januari 2024 14:05:26', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Kamis, 25 Januari 2024 pukul 14:05:26'),
('Kamis, 25 Januari 2024 14:19:30', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Kamis, 25 Januari 2024 pukul 14:19:30'),
('Kamis, 25 Januari 2024 14:20:31', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Kamis, 25 Januari 2024 pukul 14:20:31'),
('Jumat, 26 Januari 2024 09:12:05', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Jumat, 26 Januari 2024 pukul 09:12:05'),
('Jumat, 26 Januari 2024 09:29:20', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Tambah Data Barang Baru dengan nama barang <strong>Barang 2</strong>\r\n                            pada hari Jumat, 26 Januari 2024 pukul 09:29:20'),
('Jumat, 26 Januari 2024 12:05:55', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Jumat, 26 Januari 2024 pukul 12:05:55'),
('Senin, 05 Februari 2024 21:49:29', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 05 Februari 2024 pukul 21:49:29'),
('Senin, 05 Februari 2024 21:49:44', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            Tambah Akun Baru bernama <strong>admin</strong>\r\n                            pada hari Senin, 05 Februari 2024 21:49:44 pukul 21:49:44'),
('Senin, 05 Februari 2024 21:49:48', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Senin, 05 Februari 2024 pukul 21:49:48'),
('Senin, 05 Februari 2024 21:49:52', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 05 Februari 2024 pukul 21:49:52'),
('Senin, 05 Februari 2024 21:50:01', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Senin, 05 Februari 2024 pukul 21:50:01'),
('Senin, 05 Februari 2024 21:50:08', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 05 Februari 2024 pukul 21:50:08'),
('Senin, 05 Februari 2024 21:54:04', '', '<strong></strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Senin, 05 Februari 2024 pukul 21:54:04'),
('Senin, 05 Februari 2024 21:54:15', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 05 Februari 2024 pukul 21:54:15'),
('Senin, 05 Februari 2024 21:54:22', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Senin, 05 Februari 2024 pukul 21:54:22'),
('Senin, 05 Februari 2024 21:56:53', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 05 Februari 2024 pukul 21:56:53'),
('Senin, 05 Februari 2024 21:58:46', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 05 Februari 2024 pukul 21:58:46'),
('Senin, 05 Februari 2024 22:02:26', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Senin, 05 Februari 2024 pukul 22:02:26'),
('Kamis, 29 Februari 2024 13:13:45', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Kamis, 29 Februari 2024 pukul 13:13:45'),
('Kamis, 29 Februari 2024 13:14:46', 'superadmin', '<strong>superadmin</strong> telah melakukan aktivitas\r\n                            <strong>Logout</strong> pada hari Kamis, 29 Februari 2024 pukul 13:14:46'),
('Senin, 01 Juli 2024 21:33:16', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 01 Juli 2024 pukul 21:33:16'),
('Senin, 01 Juli 2024 21:35:16', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 21:35:16'),
('Senin, 01 Juli 2024 23:12:36', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 01 Juli 2024 pukul 23:12:36'),
('Senin, 01 Juli 2024 23:13:02', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:13:02'),
('Senin, 01 Juli 2024 23:13:36', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 23:13:36'),
('Senin, 01 Juli 2024 23:13:56', 'admin', '<strong>admin</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:13:56'),
('Senin, 01 Juli 2024 23:14:44', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Senin, 01 Juli 2024 pukul 23:14:44'),
('Senin, 01 Juli 2024 23:24:46', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:24:46'),
('Senin, 01 Juli 2024 23:24:57', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:24:57'),
('Senin, 01 Juli 2024 23:25:08', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:25:08'),
('Senin, 01 Juli 2024 23:25:15', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:25:15'),
('Senin, 01 Juli 2024 23:29:19', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:29:19'),
('Senin, 01 Juli 2024 23:29:35', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:29:35'),
('Senin, 01 Juli 2024 23:46:10', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 23:46:10'),
('Senin, 01 Juli 2024 23:46:24', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 23:46:24'),
('Senin, 01 Juli 2024 23:46:34', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:46:34'),
('Senin, 01 Juli 2024 23:47:09', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Tambah Data Barang Baru dengan nama barang <strong>adidas</strong>\r\n                            pada hari Senin, 01 Juli 2024 pukul 23:47:09'),
('Senin, 01 Juli 2024 23:48:40', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>ADIDDAS BLACK PANTHEM</strong>\r\n                            dengan jumlah barang keluar sebesar 582 pada hari Senin, 01 Juli 2024\r\n                            pukul 23:48:40'),
('Senin, 01 Juli 2024 23:49:09', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Tambah Data Kondisi Baru dengan nama kondisi <strong>Kurang Baik</strong>\r\n                            pada hari Senin, 01 Juli 2024 pukul 23:49:09'),
('Senin, 01 Juli 2024 23:49:18', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Tambah Data Kategori Baru dengan nama kategori <strong>Sepatu</strong>\r\n                            pada hari Senin, 01 Juli 2024 pukul 23:49:18'),
('Senin, 01 Juli 2024 23:49:24', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Tambah Data Kategori Baru dengan nama kategori <strong>Pakaian</strong>\r\n                            pada hari Senin, 01 Juli 2024 pukul 23:49:24'),
('Senin, 01 Juli 2024 23:49:36', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-500</strong>\r\n                            pada hari  pukul 23:49:36'),
('Senin, 01 Juli 2024 23:49:47', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 23:49:47'),
('Senin, 01 Juli 2024 23:49:53', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:49:53'),
('Senin, 01 Juli 2024 23:50:13', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-500</strong>\r\n                            pada hari  pukul 23:50:13'),
('Senin, 01 Juli 2024 23:50:34', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 23:50:34'),
('Senin, 01 Juli 2024 23:50:41', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 23:50:41'),
('Senin, 01 Juli 2024 23:50:57', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-500</strong>\r\n                            pada hari  pukul 23:50:57'),
('Senin, 01 Juli 2024 23:51:15', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:51:15'),
('Senin, 01 Juli 2024 23:52:23', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>ADIDAS DROPSET 2</strong>\r\n                            dengan jumlah barang keluar sebesar 998 pada hari Senin, 01 Juli 2024\r\n                            pukul 23:52:23'),
('Senin, 01 Juli 2024 23:52:40', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Transaksi Barang Keluar dengan nama barang <strong>ADIDAS RAPID MOVE TRAINER BLACK</strong>\r\n                            dengan jumlah barang keluar sebesar 365 pada hari Senin, 01 Juli 2024\r\n                            pukul 23:52:40'),
('Senin, 01 Juli 2024 23:53:46', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-500</strong>\r\n                            pada hari  pukul 23:53:46'),
('Senin, 01 Juli 2024 23:53:54', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-787</strong>\r\n                            pada hari  pukul 23:53:54'),
('Senin, 01 Juli 2024 23:54:02', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-948</strong>\r\n                            pada hari  pukul 23:54:02'),
('Selasa, 02 Juli 2024 00:05:22', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Tambah Data Barang Baru dengan nama barang <strong>UA INFINITE PRO RUNNING</strong>\r\n                            pada hari Selasa, 02 Juli 2024 pukul 00:05:22'),
('Selasa, 02 Juli 2024 00:34:41', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Tambah Data Barang Baru dengan nama barang <strong>ADIDAS BADGE SLIM 3</strong>\r\n                            pada hari Selasa, 02 Juli 2024 pukul 00:34:41'),
('Selasa, 02 Juli 2024 00:35:51', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Tambah Data Barang Baru dengan nama barang <strong>LONG SLEEVES CROP BLACK</strong>\r\n                            pada hari Selasa, 02 Juli 2024 pukul 00:35:51'),
('Selasa, 02 Juli 2024 00:37:28', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-583</strong>\r\n                            pada hari  pukul 00:37:28'),
('Selasa, 02 Juli 2024 00:37:36', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-652</strong>\r\n                            pada hari  pukul 00:37:36'),
('Selasa, 02 Juli 2024 00:39:40', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                            Edit Data Barang dengan ID Barang <strong>REF-820</strong>\r\n                            pada hari  pukul 00:39:40'),
('Selasa, 02 Juli 2024 00:44:09', 'ADMIN', '<strong>ADMIN</strong> telah melakukan aktivitas\r\n                                <strong>Login</strong> pada hari Selasa, 02 Juli 2024 pukul 00:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kategori` text NOT NULL,
  `kondisi` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `foto`, `kategori`, `kondisi`, `jumlah`, `harga`) VALUES
('REF-500', 'ADIDAS RAPID MOVE TRAINER', 'REF-500.png', 'Sepatu', 'Baik', 10, '2,500,000'),
('REF-583', 'LONG SLEEVES CROP BLACK', 'REF-583.png', 'Pakaian', 'Baik', 12, '899,000'),
('REF-652', 'ADIDAS BADGE SLIM 3', 'REF-652.png', 'Pakaian', 'Baik', 8, '899,000'),
('REF-787', 'ADIDAS RAPID MOVE TRAINER BLACK', 'REF-787.png', 'Sepatu', 'Baik', 3, '2,450,000'),
('REF-820', 'UA INFINITE PRO RUNNING', 'REF-820.png', 'Sepatu', 'Baik', 15, '2,800,000'),
('REF-948', 'ADIDAS DROPSET 2', 'REF-948.png', 'Sepatu', 'Baik', 2, '2,750,000');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `tanggal_keluar` text DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `nama_barang` text DEFAULT NULL,
  `kategori` text DEFAULT NULL,
  `harga_jual` text DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`tanggal_keluar`, `id_barang`, `nama_barang`, `kategori`, `harga_jual`, `jumlah_keluar`) VALUES
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 1', 'Aksesoris', '15.000', 50),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', '15.000', 100),
('Senin, 01 Juli 2024', 'REF-787', 'ADIDDAS BLACK PANTHEM', 'Aksesoris', '', 582),
('Senin, 01 Juli 2024', 'REF-948', 'ADIDAS DROPSET 2', 'Sepatu', '', 998),
('Senin, 01 Juli 2024', 'REF-787', 'ADIDAS RAPID MOVE TRAINER BLACK', 'Sepatu', '', 365);

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `laporan_barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW UPDATE laporan_barang_masuk_keluar SET
laporan_barang_masuk_keluar.stok_keluar = laporan_barang_masuk_keluar.stok_keluar + NEW.jumlah_keluar, laporan_barang_masuk_keluar.stok_akhir = laporan_barang_masuk_keluar.stok_akhir - NEW.jumlah_keluar WHERE laporan_barang_masuk_keluar.id_barang = NEW.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW UPDATE barang SET barang.jumlah = barang.jumlah - NEW.jumlah_keluar WHERE barang.id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `tanggal_masuk` text NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` text NOT NULL,
  `kategori` text NOT NULL,
  `kondisi` text NOT NULL,
  `harga_beli` text NOT NULL,
  `harga_jual` text NOT NULL,
  `jumlah_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`tanggal_masuk`, `id_barang`, `nama_barang`, `kategori`, `kondisi`, `harga_beli`, `harga_jual`, `jumlah_masuk`) VALUES
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 1', 'Aksesoris', 'Baik', '12.000', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 1', 'Aksesoris', 'Baik', '12.000', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', 'Baik', '12.000', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', 'Baik', '12.000', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', 'Baik', '12.000', '15.000', 100),
('Rabu, 24 Januari 2024', 'REF-787', 'Barang 10', 'Aksesoris', 'Baik', '12.000', '15.000', 1000),
('Jumat, 26 Januari 2024', 'REF-948', 'Barang 2', 'Aksesoris', 'Baik', '14.000', '150.000', 1000),
('Senin, 01 Juli 2024', 'REF-500', 'adidas', 'Aksesoris', 'Baik', '800,000', '950,000', 10),
('Selasa, 02 Juli 2024', 'REF-820', 'UA INFINITE PRO RUNNING', 'Sepatu', 'Baik', '1,500,000', '2,800,000', 15),
('Selasa, 02 Juli 2024', 'REF-652', 'ADIDAS BADGE SLIM 3', 'Pakaian', 'Baik', '650,000', '899,000', 8),
('Selasa, 02 Juli 2024', 'REF-583', 'LONG SLEEVES CROP BLACK', 'Pakaian', 'Baik', '750,000', '899,000', 12);

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `laporan_barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW UPDATE laporan_barang_masuk_keluar SET
laporan_barang_masuk_keluar.stok_masuk = laporan_barang_masuk_keluar.stok_masuk + NEW.jumlah_masuk, laporan_barang_masuk_keluar.stok_akhir = laporan_barang_masuk_keluar.stok_akhir + NEW.jumlah_masuk WHERE laporan_barang_masuk_keluar.id_barang = NEW.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW UPDATE barang SET barang.jumlah = barang.jumlah + NEW.jumlah_masuk WHERE barang.id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('CAT-613', 'Pakaian'),
('CAT-686', 'Aksesoris'),
('CAT-856', 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` varchar(10) NOT NULL,
  `nama_kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`) VALUES
('KND-265', 'Kurang Baik'),
('KND-572', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_barang_masuk_keluar`
--

CREATE TABLE `laporan_barang_masuk_keluar` (
  `id_barang` varchar(10) DEFAULT NULL,
  `nama_barang` text DEFAULT NULL,
  `kategori` text DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_masuk` int(11) DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  `stok_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_barang_masuk_keluar`
--

INSERT INTO `laporan_barang_masuk_keluar` (`id_barang`, `nama_barang`, `kategori`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`) VALUES
('REF-787', 'Barang 1', 'Aksesoris', 100, 1400, 1497, 3),
('REF-948', 'Barang 2', 'Aksesoris', 1000, 0, 998, 2),
('REF-500', 'adidas', 'Aksesoris', 10, 0, 0, 10),
('REF-820', 'UA INFINITE PRO RUNNING', 'Sepatu', 15, 0, 0, 15),
('REF-652', 'ADIDAS BADGE SLIM 3', 'Pakaian', 8, 0, 0, 8),
('REF-583', 'LONG SLEEVES CROP BLACK', 'Pakaian', 12, 0, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `level_login`
--

CREATE TABLE `level_login` (
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_login`
--

INSERT INTO `level_login` (`level`) VALUES
('Super Admin'),
('Admin');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` varchar(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`) VALUES
('LOG-168', 'admin', 'admin', 'Admin'),
('LOG-535', 'superadmin', 'superadmin', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `tanggal` text NOT NULL,
  `no_faktur` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` text NOT NULL,
  `kategori` text NOT NULL,
  `jumlah_keluar_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`tanggal`, `no_faktur`, `id_barang`, `nama_barang`, `kategori`, `jumlah_keluar_masuk`) VALUES
('Rabu, 24 Januari 2024', 'RFAM-66675', 'REF-787', 'Barang 1', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFAM-5822', 'REF-787', 'Barang 1', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFKL-12489', 'REF-787', 'Barang 1', 'Aksesoris', 50),
('Rabu, 24 Januari 2024', 'RFAM-79815', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFAM-61670', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFAM-81934', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFKL-62497', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFKL-40123', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFAM-61570', 'REF-787', 'Barang 10', 'Aksesoris', 1000),
('Rabu, 24 Januari 2024', 'RFKL-51723', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFKL-90201', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Rabu, 24 Januari 2024', 'RFKL-60055', 'REF-787', 'Barang 10', 'Aksesoris', 100),
('Jumat, 26 Januari 2024', 'RFAM-83168', 'REF-948', 'Barang 2', 'Aksesoris', 1000),
('Senin, 01 Juli 2024', 'RFAM-23451', 'REF-500', 'adidas', 'Aksesoris', 10),
('Senin, 01 Juli 2024', 'RFKL-70892', 'REF-787', 'ADIDDAS BLACK PANTHEM', 'Aksesoris', 582),
('Senin, 01 Juli 2024', 'RFKL-49579', 'REF-948', 'ADIDAS DROPSET 2', 'Sepatu', 998),
('Senin, 01 Juli 2024', 'RFKL-55844', 'REF-787', 'ADIDAS RAPID MOVE TRAINER BLACK', 'Sepatu', 365),
('Selasa, 02 Juli 2024', 'RFAM-19198', 'REF-820', 'UA INFINITE PRO RUNNING', 'Sepatu', 15),
('Selasa, 02 Juli 2024', 'RFAM-69416', 'REF-652', 'ADIDAS BADGE SLIM 3', 'Pakaian', 8),
('Selasa, 02 Juli 2024', 'RFAM-60704', 'REF-583', 'LONG SLEEVES CROP BLACK', 'Pakaian', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `laporan_barang_masuk_keluar`
--
ALTER TABLE `laporan_barang_masuk_keluar`
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
