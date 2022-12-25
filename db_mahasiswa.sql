-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Sep 2022 pada 22.50
-- Versi server: 8.0.28
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_kuliah`
--

CREATE TABLE `biaya_kuliah` (
  `id_biaya` int NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sistem` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biaya_kuliah`
--

INSERT INTO `biaya_kuliah` (`id_biaya`, `jenis`, `sistem`, `jumlah`) VALUES
(1, 'Kontribusi Pembangunan', 'Awal Masuk', '2000000'),
(2, 'Jas, MKPK, Kaos, dan KTM', 'Awal Masuk', '1200000'),
(3, 'Kemahasiswaan', 'Awal Masuk', '250000'),
(4, 'Biaya Semester', 'Per Semester', '2300000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_bayar`
--

CREATE TABLE `bukti_bayar` (
  `id_bukti` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `foto_bukti` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bukti_bayar`
--

INSERT INTO `bukti_bayar` (`id_bukti`, `nama`, `email`, `nohp`, `tanggal`, `foto_bukti`, `id_pengguna`) VALUES
(7, 'Rizki', 'rizki@gmail.com', '089010900112', '2022-05-26', 'bench.PNG', '13'),
(8, 'Hamid', 'hamid@gmail.com', '089010900112', '2022-05-26', 'WhatsApp Image 2022-02-09 at 12.33.48.jpeg', '14'),
(9, 'Raisa', 'raisa@gmail.com', '09876554321', '2022-05-27', 'from edit2.PNG', '15'),
(10, 'Amirudi', 'amir@gmail.com', '09876554321', '2022-06-01', 'gembok.jpg', '16'),
(11, 'suie', 'sule@gmail.com', '0897654321', '2022-06-07', 'amik.jpg', '18'),
(12, 'Rafi', 'rafi@gmail.com', '0980008090', '2022-06-08', '2.JPG', '19'),
(13, 'andre', 'andre@gmail.com', '089123456789', '2022-06-10', 'barang.jpg', '20'),
(14, 'nanda', 'nanda@gmail.com', '089098767678', '2022-06-13', 'Proyek Baru (6).png', '21'),
(15, 'Eril', 'eril@gmail.com', '08909098888', '2022-06-15', 'activity login admin.png', '22'),
(16, 'jaya', 'jaya@gmail.com', '08976543121', '2022-06-16', 'activity login admin.png', '23'),
(17, 'Angga Wijays', 'angga@gmail.com', '089123456789', '2022-06-21', 'cap.png', '24'),
(18, 'agim', 'agim@gmail.com', '0890000080890', '2022-07-25', 'class.jpg', '25'),
(19, 'marsel', 'marsel@gmail.com', '098776554321', '2022-08-10', 'Capture4.JPG', '26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_ulang`
--

CREATE TABLE `daftar_ulang` (
  `id_daftar` int NOT NULL,
  `nim` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `program_studi` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `semester` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `bangunan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pakaian` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kemahasiswaan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `biaya_semester` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jlh_bayar` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `tunggakan` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_ulang`
--

INSERT INTO `daftar_ulang` (`id_daftar`, `nim`, `nama`, `email`, `nohp`, `kelas`, `program_studi`, `semester`, `bangunan`, `pakaian`, `kemahasiswaan`, `biaya_semester`, `jlh_bayar`, `tunggakan`, `tanggal`, `status`, `id_pengguna`) VALUES
(1, '2221001', 'Rizki', 'rizki@gmail.com', '089010900112', 'Sore', 'Manajemen Informatika', 'Semester 1', '2000000', '1200000', '250000', '2300000', '5750000', '', '2022-05-31', 'Lunas', '13'),
(2, '2221002', 'Hamid', 'hamid@gmail.com', '089010900112', 'Sore', 'Manajemen Informatika', 'Semester 1', '2000000', '1200000', '250000', '2300000', '5750000', '', '2022-05-31', 'Lunas', '14'),
(3, '2221003', 'Amirudi', 'amir@gmail.com', '09876554321', 'Sore', 'Manajemen Informatika', 'Semester 1', '2000000', '1200000', '250000', '1000000', '4450000', '1300000', '2022-06-02', 'Belum', '16'),
(4, '2221004', 'andre', 'andre@gmail.com', '089123456789', 'Sore', 'Manajemen Informatika', 'Semester 1', '2000000', '1200000', '250000', '2300000', '5750000', '', '2022-06-16', 'Lunas', '20'),
(5, '2221005', 'jaya', 'jaya@gmail.com', '08976543121', 'Pagi', 'Manajemen Informatika', 'Semester 1', '2000000', '1200000', '250000', '2300000', '5750000', '', '2022-06-16', 'Lunas', '23'),
(6, '2221006', 'nanda', 'nanda@gmail.com', '089098767678', 'Sore', 'Manajemen Informatika', 'Semester 1', '2000000', '1200000', '250000', '2300000', '5750000', '', '2022-06-16', 'Lunas', '21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formcontrol`
--

CREATE TABLE `formcontrol` (
  `id` int NOT NULL,
  `formaktif` text COLLATE utf8mb4_general_ci NOT NULL,
  `nama_form` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `formcontrol`
--

INSERT INTO `formcontrol` (`id`, `formaktif`, `nama_form`) VALUES
(1, 'yes', 'pendaftaran'),
(2, 'yes', 'Seleksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_seleksi`
--

CREATE TABLE `hasil_seleksi` (
  `id_mhs` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `hasil` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pengguna` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_seleksi`
--

INSERT INTO `hasil_seleksi` (`id_mhs`, `nama`, `email`, `nohp`, `hasil`, `status`, `tanggal`, `id_pengguna`) VALUES
(28, 'Rizki', 'rizki@gmail.com', '089010900112', '76.52', 'Lulus', '2022-05-27', 13),
(31, 'Raisa', 'raisa@gmail.com', '09876554321', '9.52', 'Tidak', '2022-05-27', 15),
(32, 'Hamid', 'hamid@gmail.com', '089010900112', '85.71', 'Lulus', '2022-05-27', 14),
(33, 'Amirudi', 'amir@gmail.com', '09876554321', '90.48', 'Lulus', '2022-06-01', 16),
(34, 'suie', 'sule@gmail.com', '0897654321', '23.81', 'Tidak', '2022-06-08', 18),
(35, 'Rafi', 'rafi@gmail.com', '0980008090', '4.76', 'Tidak', '2022-06-08', 19),
(36, 'andre', 'andre@gmail.com', '089123456789', '87', 'Lulus', '2022-06-11', 20),
(37, 'nanda', 'nanda@gmail.com', '089098767678', '100', 'Lulus', '2022-06-13', 21),
(38, 'Eril', 'eril@gmail.com', '08909098888', '47.62', 'Tidak', '2022-06-15', 22),
(39, 'jaya', 'jaya@gmail.com', '08976543121', '95.24', 'Lulus', '2022-06-16', 23),
(40, 'Angga Wijays', 'angga@gmail.com', '089123456789', '95.24', 'Lulus', '2022-06-21', 24),
(42, 'marsel', 'marsel@gmail.com', '098776554321', '0', 'Tidak', '2022-08-11', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL,
  `nama_jadwal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hari_awal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `hari_akhir` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_jadwal`, `hari_awal`, `hari_akhir`, `tgl_mulai`, `tgl_selesai`) VALUES
(1, 'Ospek', 'Senin', 'Kamis', '2022-05-16', '2022-05-19'),
(2, 'Seleksi', 'Senin', 'Rabu', '2022-05-23', '2022-05-27'),
(3, 'Hasil Seleksi', 'Senin', 'Senin', '2022-05-23', '2022-05-23'),
(4, 'Masuk Kuliah', 'Senin', 'Senin', '2022-05-30', '2022-05-30'),
(5, 'Libur Kuliah', 'Senin', 'Senin', '2023-05-31', '2023-05-31'),
(6, 'Wisuda', 'Sabtu', 'Sabtu', '2022-05-28', '2022-05-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_akses`
--

CREATE TABLE `kode_akses` (
  `id_kode` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `bayar_daftar` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `code_akses` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pengguna` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kode_akses`
--

INSERT INTO `kode_akses` (`id_kode`, `nama`, `email`, `nohp`, `bayar_daftar`, `status`, `code_akses`, `tanggal`, `id_pengguna`) VALUES
(7, 'Rizki', 'rizki@gmail.com', '089010900112', '200000', 'Lunas', '$2y$10$vHHBP/K4Zu4nOFxD6NS74uSNEIEVt.lJ37NcvT/r2TWnRAGmtH67G', '2022-05-26', '13'),
(8, 'Hamid', 'hamid@gmail.com', '089010900112', '200000', 'Lunas', '$2y$10$x7CohPqaJT5JGJEvA3OVHu5E02JMXfzLS12dOIEAdIlPi9P2B95fi', '2022-05-26', '14'),
(9, 'Raisa', 'raisa@gmail.com', '09876554321', '200000', 'Lunas', '$2y$10$6/JU3NPXVMfUNDKziq8aTuVoTliTVu.I42tD42ck2Xrh3YObSnAN.', '2022-05-27', '15'),
(10, 'Amirudi', 'amir@gmail.com', '09876554321', '200000', 'Lunas', '$2y$10$Jo7YTFTy2eLUiN9roUe1GeE6xDy4JY0rT4ZavjSoH3yDxOuq6nK5C', '2022-06-01', '16'),
(11, 'suie', 'sule@gmail.com', '0897654321', '200000', 'Lunas', '$2y$10$MLbzS8UqczPOeD06Khz/nO/wkDvWwZjCnIlHANYH0.6wAt4iJm7su', '2022-06-07', '18'),
(12, 'Rafi', 'rafi@gmail.com', '0980008090', '200000', 'Lunas', '$2y$10$zuV67VTuMXh6YXfysdf9NeHmw7fkvbjHmSPOpqQ7ppMYqBeMtLBXG', '2022-06-08', '19'),
(13, 'andre', 'andre@gmail.com', '089123456789', '200000', 'Lunas', '$2y$10$aV41XzvE8Nifelw596njaO4F/wr8x3Lab2oNpPmqLB88ZgJQbB2sm', '2022-06-10', '20'),
(14, 'nanda', 'nanda@gmail.com', '089098767678', '200000', 'Lunas', '$2y$10$7yNcAB6x43w0CodgMMMSoueT.s.ncwQpz1MaeZfN87CXZt16V7PFG', '2022-06-13', '21'),
(15, 'Eril', 'eril@gmail.com', '08909098888', '200000', 'Lunas', '$2y$10$Upt6bERjzUnNkUY8GAzEnenbu8E812PcMRMisKhhFsZnZn5H6fy/.', '2022-06-15', '22'),
(16, 'jaya', 'jaya@gmail.com', '08976543121', '200000', 'Lunas', '$2y$10$GZFEGTdCuQawSaFhbm0KEe0hh49ygnSij9ikPRfiaLQOFvihx6tfu', '2022-06-16', '23'),
(17, 'Angga Wijays', 'angga@gmail.com', '089123456789', '200000', 'Lunas', '$2y$10$S8UF6YatKm3AmFqPrBaRyOnmHVilCzo2mdngm8eXj/FflsLIRmv66', '2022-06-21', '24'),
(18, 'agim', 'agim@gmail.com', '0890000080890', '200000', 'Lunas', '$2y$10$KFAZG4GsRUqxzGyWgA5xbObRdsUiqPBaYuVSFeLiIwKYy5rbMLsi.', '2022-07-25', '25'),
(19, 'marsel', 'marsel@gmail.com', '098776554321', '200000', 'Lunas', '$2y$10$Y31/osmNZD6K2xOoQl8qm..4Tr9Lau7NXZbw63rkpE/H/l.eKsYZu', '2022-08-10', '26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int NOT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `nama_laporan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tanggal_awal`, `tanggal_akhir`, `nama_laporan`) VALUES
(1, '2022-05-09', '2022-07-26', 'laporan seleksi'),
(2, '2022-05-01', '2022-07-26', 'laporan pembayaran daftar online'),
(3, '2022-05-12', '2022-05-12', 'laporan Pegawai'),
(4, '2022-05-26', '2022-07-26', 'laporan pendaftaran'),
(5, '2022-05-26', '2022-07-26', 'laporan data mahasiswa'),
(6, '2022-05-02', '2022-07-26', 'laporan daftar ulang'),
(7, '2022-05-01', '2022-07-27', 'laporan saldo daftar ulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `id_mhs` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `semester` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `program_studi` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`id_mhs`, `nama`, `email`, `nohp`, `semester`, `kelas`, `program_studi`, `tanggal`, `status`, `id_pengguna`) VALUES
(3, 'Rizki', 'rizki@gmail.com', '089010900112', 'Semester 1', 'Sore', 'Manajemen Informatika', '2022-05-27', 'Lulus', 13),
(6, 'Hamid', 'hamid@gmail.com', '089010900112', 'Semester 1', 'Sore', 'Manajemen Informatika', '2022-05-27', 'Lulus', 14),
(7, 'Amirudi', 'amir@gmail.com', '09876554321', 'Semester 1', 'Sore', 'Manajemen Informatika', '2022-06-01', 'Lulus', 16),
(8, 'andre', 'andre@gmail.com', '089123456789', 'Semester 1', 'Sore', 'Manajemen Informatika', '2022-06-11', 'Lulus', 20),
(9, 'nanda', 'nanda@gmail.com', '089098767678', 'Semester 1', 'Sore', 'Manajemen Informatika', '2022-06-13', 'Lulus', 21),
(10, 'jaya', 'jaya@gmail.com', '08976543121', 'Semester 1', 'Pagi', 'Manajemen Informatika', '2022-06-16', 'Lulus', 23),
(11, 'Angga Wijays', 'angga@gmail.com', '089123456789', 'Semester 1', 'Sore', 'Manajemen Informatika', '2022-06-21', 'Lulus', 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_jabatan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `email`, `nohp`, `jabatan`, `kode_jabatan`, `tanggal`) VALUES
(1, 'Hadi Santosa. SE.. MM.', 'hadi@email.com', '089681619214', 'Dirut', 'PGW-0001', '2022-05-21'),
(2, 'Mukfid', 'Mukfid@email.com', '0890909090', 'Wakil Dirut', 'PGW-0002', '2022-05-21'),
(3, 'Tias Beni', 'Tiasbeni@gmail.com', '0897021092012', 'Dosen', 'PGW-0003', '2022-05-21'),
(4, 'Dion', 'dion@gmail.com', '0890291029102', 'Dosen', 'PGW-0004', '2022-05-21'),
(5, 'Ady Duriadi', 'ady@gmail.com', '09876554321', 'Dosen', 'PGW-0005', '2022-05-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_mahasiswa` int NOT NULL,
  `kode_akses` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `nisn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_daftar` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `ayah` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ibu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sttb` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `danun` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `akte` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `poto_2` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `poto_3` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `poto_warna` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `program_studi` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pengguna` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_mahasiswa`, `kode_akses`, `nisn`, `nomor_daftar`, `nama`, `alamat`, `jk`, `agama`, `ayah`, `ibu`, `sttb`, `danun`, `ktp`, `akte`, `poto_2`, `poto_3`, `poto_warna`, `kelas`, `program_studi`, `tanggal`, `id_pengguna`) VALUES
(7, '$2y$10$vHHBP/K4Zu4nOFxD6NS74uSNEIEVt.lJ37NcvT/r2TWnRAGmtH67G', '100009210001', 'P2205001', 'Rizki', 'Desa Jatimulya Blok Kombo RT 05/03 Kec. Terisi Kab. Indramayu', 'Laki-laki', 'Islam', 'Rosidi', 'Rumsinah', '1. ktp tambahan.pdf', 'IJAZAH D.pdf', 'IJAZAH B.pdf', 'KK.pdf', 'Transkip Nilai Rizki.pdf', 'SURAT KET SEHAT.pdf', 'cetak.png', 'Sore', 'Manajemen Informatika', '2022-05-26', 13),
(8, '$2y$10$x7CohPqaJT5JGJEvA3OVHu5E02JMXfzLS12dOIEAdIlPi9P2B95fi', '09000098765', 'P2205002', 'Hamid', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Hindu', 'Rokib', 'Rokilah', 'close.jpg', 'data base perpustakaan.jpg', 'help.jpg', 'file.jpg', 'facebook.jpg', 'form daftar.PNG', 'gembok.jpg', 'Sore', 'Manajemen Informatika', '2022-05-26', 14),
(9, '$2y$10$6/JU3NPXVMfUNDKziq8aTuVoTliTVu.I42tD42ck2Xrh3YObSnAN.', '01000001213', 'P2205003', 'Raisa', 'desa jangga rt 05', 'Perempuan', 'Islam', 'makfud', 'ani', 'grapich.PNG', 'hapus.PNG', 'index.PNG', 'SPD.PNG', 'karyawan.jpg', 'jasa penulias artikel.jpg', 'report.jpg', 'Pagi', 'Manajemen Informatika', '2022-05-27', 15),
(10, '$2y$10$Jo7YTFTy2eLUiN9roUe1GeE6xDy4JY0rT4ZavjSoH3yDxOuq6nK5C', '00000345001', 'P2206004', 'Amirudi', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Islam', 'makfud', 'Rokilah', 'grapich.PNG', 'instagram.jpg', 'kunci.png', 'bench.PNG', 'mi 10.jpg', 'username.png', 'th.jpg', 'Sore', 'Manajemen Informatika', '2022-06-01', 16),
(11, '$2y$10$MLbzS8UqczPOeD06Khz/nO/wkDvWwZjCnIlHANYH0.6wAt4iJm7su', '998', 'P2206005', 'suie', 'ff', 'Laki-laki', 'Islam', 'Rosidi', 'Rumsina', 'barang.jpg', '2.JPG', 'bench.PNG', 'barang.jpg', 'bumi.jpg', 'amik.jpg', 'amik.jpg', 'Sore', 'Manajemen Informatika', '2022-06-07', 18),
(12, '$2y$10$zuV67VTuMXh6YXfysdf9NeHmw7fkvbjHmSPOpqQ7ppMYqBeMtLBXG', '0910010', 'P2206006', 'Rafi', 'Desa pande', 'Laki-laki', 'Islam', 'munir', 'munaroh', 'form daftar.PNG', 'form daftar.PNG', 'gembok.jpg', 'from edit.PNG', 'from edit.PNG', 'hapus.PNG', 'kegiatan.jpeg', 'Sore', 'Manajemen Informatika', '2022-06-08', 19),
(13, '$2y$10$aV41XzvE8Nifelw596njaO4F/wr8x3Lab2oNpPmqLB88ZgJQbB2sm', '00000000004', 'P2206007', 'andre', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Islam', 'Rosidi', 'Rokilah', '2.JPG', 'amik.jpg', 'barang.jpg', 'bumi.jpg', 'index.PNG', 'barang.jpg', 'help.jpg', 'Sore', 'Manajemen Informatika', '2022-06-10', 20),
(14, '$2y$10$7yNcAB6x43w0CodgMMMSoueT.s.ncwQpz1MaeZfN87CXZt16V7PFG', '0000008088', 'P2206008', 'nanda', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Islam', 'Agus', 'Aas', 'New Project.png', 'New Project (1).png', 'New Project (2).png', 'New Project (3).png', 'New Project (4).png', 'New Project (5).png', 'New Project (6).png', 'Sore', 'Manajemen Informatika', '2022-06-13', 21),
(15, '$2y$10$Upt6bERjzUnNkUY8GAzEnenbu8E812PcMRMisKhhFsZnZn5H6fy/.', '00000000005', 'P2206009', 'Eril', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Islam', 'munir', 'ani', 'activity login admin.png', 'activity login.png', 'activity register.png', 'Untitled Diagram-bukti transfer.drawio.png', 'Untitled Diagram-daftar ulang.drawio.png', 'Untitled Diagram-register admin.drawio.png', 'Untitled Diagram-seleksi.drawio.png', 'Sore', 'Manajemen Informatika', '2022-06-15', 22),
(16, '$2y$10$GZFEGTdCuQawSaFhbm0KEe0hh49ygnSij9ikPRfiaLQOFvihx6tfu', '0911222111111', 'P2206010', 'jaya', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Islam', 'Rosidi', 'Rumsina', 'activity login.png', 'activity register.png', 'Untitled Diagram-bukti transfer.drawio.png', 'Untitled Diagram-daftar ulang.drawio.png', 'Untitled Diagram-class diagram.drawio.png', 'Untitled Diagram-seleksi.drawio.png', 'Untitled Diagram-laporan.drawio.png', 'Pagi', 'Manajemen Informatika', '2022-06-16', 23),
(17, '$2y$10$S8UF6YatKm3AmFqPrBaRyOnmHVilCzo2mdngm8eXj/FflsLIRmv66', '0910010', 'P2206011', 'Angga Wijays', 'Desa Jatimulya Blok Kombo RT 05/03 Kec. Terisi Kab. Indramayu', 'Laki-laki', 'Islam', 'makfud', 'Aas', 'KTP.jpg', 'foto rizki.jpeg', 'buku tabungan.jpeg', 'tambah.png', 'cetak.png', 'bg_polos.jpg', 'New Project (7).png', 'Sore', 'Manajemen Informatika', '2022-06-21', 24),
(18, '$2y$10$KFAZG4GsRUqxzGyWgA5xbObRdsUiqPBaYuVSFeLiIwKYy5rbMLsi.', '0890001900', 'P2207012', 'agim', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Islam', 'Rosidi Men', 'ani', 'class.jpg', 'das.jpg', 'gds.jpg', 'hd.jpg', 'iu.30+PM-1063085941', 'simbol-sequence-diagram-491856943.jpg', 'siklus informasi.png', 'Sore', 'Manajemen Informatika', '2022-07-25', 25),
(19, '$2y$10$Y31/osmNZD6K2xOoQl8qm..4Tr9Lau7NXZbw63rkpE/H/l.eKsYZu', '019010010', 'P2208013', 'marsel', 'Jl. Raya Terisi-Cikamurang Kab. Indramayu', 'Laki-laki', 'Islam', 'Rosidi', 'Aas', 'activity register.png', 'activity login admin.png', 'Capture3.JPG', 'Capture2.JPG', 'SO AMIK.docx', 'SO AMIK.docx', 'Doc2.docx', 'Sore', 'Manajemen Informatika', '2022-08-10', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `gambar`, `ukuran`, `type`, `id_pengguna`) VALUES
(4, 'username.png', '642', 'image/png', '3'),
(5, 'amik.jpg', '13979', 'image/jpeg', '17'),
(6, 'barang.jpg', '6379', 'image/jpeg', '13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int NOT NULL,
  `nama_prodi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `program` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_prodi`, `program`) VALUES
(1, 'Manajemen Informatika', 'D3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_seleksi`
--

CREATE TABLE `soal_seleksi` (
  `id_soal` int NOT NULL,
  `soal` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `a` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `b` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `c` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `d` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `kunci` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `soal_seleksi`
--

INSERT INTO `soal_seleksi` (`id_soal`, `soal`, `a`, `b`, `c`, `d`, `kunci`, `tanggal`) VALUES
(1, 'Sistem….mengatur, mengontrol dan megoperasikan solusi keamanan informasi seperti IDS dan IPS mengikuti kebijakan yang ditetapkan.', 'ESM', 'EPM', 'ASPEK', 'TEAM', 'a', '2022-05-08'),
(2, 'Sesuatu yang memiliki nilai dan karenanya harus dilindungi disebut dengan….', 'Hal', 'Aspek', 'Aset', 'Data', 'c', '2022-05-08'),
(3, 'Denda maksimal yang dibayar oleh para pelanggar hak cipta adalah….', 'Rp. 5.000.000,00', 'Rp. 50.000.000,00', 'Rp. 100.000.000,00', 'Rp. 500.000.000,00', 'd', '2022-05-08'),
(4, 'Lama hukum penjara bagi orang yang dengan sengaja melanggar hak cipta adalah….tahun', '2,5', '5', '7', '10', 'b', '2022-05-08'),
(5, 'Hak yang diberikan pemerintah kepada pencipta untuk memperbanyak hasil ciptaannya disebut hak….', 'Cipta', 'Intelektual', 'Royalti', 'Paten', 'a', '2022-05-08'),
(6, 'Software yang dipebanyak tanpa seizi pemegang hak cipta, dibuat secara….', 'Ilegal', 'Asli', 'Bajakan', 'Legal', 'a', '2022-05-08'),
(7, 'Bentuk-bentuk kejahatan yang timbul karena pemanfaatan teknologi internet adalah….', 'Cybercrime', 'Cyber terorisme', 'Virus', 'Carding', 'a', '2022-05-08'),
(8, 'Kegiatan yang dilakukan untuk mengganggu atau melecehkan seseorang dengan memanfaatkan komputer adalah….', 'Cybercrime', 'Cyber terorisme', 'Cyber talking', 'Cyber squad', 'c', '2022-05-08'),
(9, 'Modus kejahatan dengan membuat domain plesetan yaitu domain yang mirip dengan nama orang lain adalah….', 'Cybersquatting', 'Typosquatting', 'Cybercrime', 'Hackers', 'b', '2022-05-08'),
(10, 'Modus kejahatan yang dilakukan untuk mencuri nomor kartu kredit milik orang lain digunakan dalam transaksi perdagangan internet adalah….', 'Carding', 'Typosquatting', 'Cybercrime', 'Hackers', 'a', '2022-05-08'),
(11, ' Berikut modus kejahatan yang dilakukan dengan memasukan data atau informasi ke internet tentang suatu hal yang tidak benar, tidak etis, dan dapat dianggap melanggar hukum atau mengganngu ketertiban umum adalah….', 'Pornografi', 'Cybercrime', 'Hackers', 'Illegal contens', 'd', '2022-05-08'),
(12, 'Aspek legal seperti data pribadi, keuangan dan data karyawan termasuk dalam….', 'Data', 'Privasi', 'Posisi', 'Aspek legal', 'd', '2022-05-08'),
(13, 'Informasi pribadi, keuangan dan daftar karyawan termasuk dalam….', 'Data', 'Label', 'IDS', 'ERM', 'a', '2022-05-08'),
(14, 'Berikut yang merupakan komponen dari data privasi yaitu….', 'Data pribadi', 'Label', 'IDS', 'ERM', 'a', '2022-05-08'),
(15, 'Bertanggung jawab dan memasang dan mendukung komunikasi jaringan komputer dalam organisasi atau antarorganisasi merupakan deskripsi kerja dari….', 'Analyst system', 'Network enginer', ' IT Trainer', 'Sofwer engine', 'b', '2022-05-08'),
(16, 'Program merancang dan memberi kursus dalam Information and Communication Technology (ICT) seperti aplikasi software khusus perusahaan merupakan deskripsi kerja dari….', 'Analyst system', 'Network enginer', ' IT Trainer', 'Sofwer engine', 'c', '2022-05-08'),
(17, 'Program yang menjelaskan kebutuhan software ke dalam kode pemprograman singkat dank hat merupakan deskripsi kerja dari….', 'System Analyst', 'Aplication develop', 'Software enginer', 'IT trainer', 'b', '2022-05-08'),
(18, 'Seperangkat alat yang membantu bekerja dengan informasi dan melakukan tugas-tugas yang berhubungan dengan pemerosesan informasi adalah….', 'Komputer', 'Sitem Informasi', 'Jaringan', 'Teknologi Informasi', 'd', '2022-05-08'),
(19, 'Guna menjaga keamanan dan kerahasiaan data dalam suatu jaringan komputer, diperlukan….', 'Regulasi', 'Hak Akses', 'Enkripsi', 'Investasi', 'c', '2022-05-08'),
(20, 'Usaha untuk menjaga informasi dari orang yang tidak berhak mengakses disebut dengan….', 'Data', 'Privasi', 'Informasi', 'Aspek Ilegal', 'b', '2022-05-08'),
(21, 'Sintia selalu menghadiri konser di akhir pekan. Tidak semua konser diselenggarakan di luar kota', 'Kadangkala Sintia menghadiri konser di dalam kota', 'Kadangkala Sintia menghadiri konser di dalam kota', 'Sintia tidak suka menghadiri konser', 'Pekan ini Sintia tidak menghadiri konser', 'a', '2022-05-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_qrcode`
--

CREATE TABLE `tbl_qrcode` (
  `id_qr` int NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `qrcode` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_qrcode`
--

INSERT INTO `tbl_qrcode` (`id_qr`, `judul`, `tanggal`, `qrcode`) VALUES
(1, 'map amik', '2022-05-17', 'map amik20220517.png'),
(2, 'map', '2022-05-17', 'map20220517.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(64) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `nohp`, `password`, `level`) VALUES
(3, 'Apud', 'apud@gmail.com', '089010900112', '$2y$10$Afw070CBWQ0wKg0fFnNyMeMcf/Uu1CzqL5CJastRWHeC2y4Crbe2e', 'admin'),
(13, 'Rizki', 'rizki@gmail.com', '089010900112', '$2y$10$3cTLKWq2ZzZYQ3/T5u7IsOJng/zicVeRBDZww4R0Zcl3bLDcmw5uy', 'mahasiswa'),
(14, 'Hamid', 'hamid@gmail.com', '089010900112', '$2y$10$VrheQRjsdZN.wgZh3CqgqOIu3.OMFu8dlEgPg8z8bNXnVB/LFrKLC', 'mahasiswa'),
(15, 'Raisa', 'raisa@gmail.com', '09876554321', '$2y$10$eMW9Ei3Xbu/.9S7aav71N.T2KLbsAb625alNWRzFcKhbxcn.D1KHG', 'mahasiswa'),
(16, 'Amirudi', 'amir@gmail.com', '09876554321', '$2y$10$lF3KBP/qNZv.GEKUzvhxTOOh6h/jlqvKkdS6QQ2IktqopAv9viLj.', 'mahasiswa'),
(17, 'Hadi Santosa', 'hadisantosa@gmail.com', '08909090813', '$2y$10$Kbs1jn3aiHVYhibLjKKZ9e.t/R.7Ui1HMwnFPhE2fJz2mLrEdwI3m', 'Direktur'),
(18, 'suie', 'sule@gmail.com', '0897654321', '$2y$10$ZQ8GLvccHEVRAOIlvPqjWuMR/k.Ni98QO/NeN/cWjX2qbG0gWeWJO', 'mahasiswa'),
(19, 'Rafi', 'rafi@gmail.com', '0980008090', '$2y$10$gUdKoe7w6d9SNtibUDFLeewJl3hl3a1J8F8CCMsHsnjdYCPApnccG', 'mahasiswa'),
(20, 'andre', 'andre@gmail.com', '089123456789', '$2y$10$Yo71d/XIQCrh5rdWW1ji5.qdnwyFjOhnNca35Ye1qq3kh6D1mLPR6', 'mahasiswa'),
(21, 'nanda', 'nanda@gmail.com', '089098767678', '$2y$10$LzfF5/gic2EgJZICX6r8muX6UtiBJwLeETvOiuwmBOFgzYoSWYXai', 'mahasiswa'),
(22, 'Eril', 'eril@gmail.com', '08909098888', '$2y$10$FRErSDMy0jVTkt4XJqIQzOK1dsPWh1nCqPOldxBcIT48R434a6pPi', 'mahasiswa'),
(23, 'jaya', 'jaya@gmail.com', '08976543121', '$2y$10$VCwmm/0JiyNf0tRQzqROJO6kO.228Fi.KVViidp0unkJf/DtwsooS', 'mahasiswa'),
(24, 'Angga Wijays', 'angga@gmail.com', '089123456789', '$2y$10$sE8PNen3YP.qaaBALUn3LOn2cLTNZkMkTDM0AzvSS9tC3Y2nVvWyy', 'mahasiswa'),
(25, 'agim', 'agim@gmail.com', '0890000080890', '$2y$10$PpNLI/2K9io7iasvj3pRiuQ/8II7Bqagjl4Nhl4SMfja/.Opddxna', 'mahasiswa'),
(26, 'marsel', 'marsel@gmail.com', '098776554321', '$2y$10$XxmXWN/dWp8YNs1zAvVc.ueH7N8QESIhYZwUXYPr21MsVQ1frR8ue', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_kuliah`
--
ALTER TABLE `biaya_kuliah`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD PRIMARY KEY (`id_bukti`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indeks untuk tabel `formcontrol`
--
ALTER TABLE `formcontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kode_akses`
--
ALTER TABLE `kode_akses`
  ADD PRIMARY KEY (`id_kode`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`),
  ADD UNIQUE KEY `nim` (`nomor_daftar`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `soal_seleksi`
--
ALTER TABLE `soal_seleksi`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `tbl_qrcode`
--
ALTER TABLE `tbl_qrcode`
  ADD PRIMARY KEY (`id_qr`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_kuliah`
--
ALTER TABLE `biaya_kuliah`
  MODIFY `id_biaya` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  MODIFY `id_bukti` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  MODIFY `id_daftar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `formcontrol`
--
ALTER TABLE `formcontrol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  MODIFY `id_mhs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kode_akses`
--
ALTER TABLE `kode_akses`
  MODIFY `id_kode` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `soal_seleksi`
--
ALTER TABLE `soal_seleksi`
  MODIFY `id_soal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_qrcode`
--
ALTER TABLE `tbl_qrcode`
  MODIFY `id_qr` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
