-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Sep 2018 pada 07.51
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `no_induk` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `idu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`no_induk`, `nama_admin`, `jk`, `agama`, `alamat`, `tmp_lahir`, `tgl_lahir`, `foto`, `idu`) VALUES
('123456789', 'Administrator', 'Laki-laki', 'Islam', 'Kebumen', 'Kebumen', '2018-03-20', 'Administrator-icon.jpg', '123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `nilai_min` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `nilai_min`) VALUES
(1, 'Teknik Audio Video', 75),
(2, 'Teknik Kendaraan Ringan', 75),
(3, 'Teknik Pendinginan dan Tata Udara', 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(11) NOT NULL,
  `nama_kab` varchar(100) NOT NULL,
  `id_prov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `nama_kab`, `id_prov`) VALUES
(1, 'Pemalang', 1),
(2, 'Tegal', 1),
(3, 'Semarang', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `nama_kec` varchar(100) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `id_kab`, `id_prov`) VALUES
(1, 'Randudongkal', 1, 1),
(2, 'Pemalang', 1, 1),
(3, 'Belik', 1, 1),
(4, 'Watukumpul', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar_siswa`
--

CREATE TABLE `pendaftar_siswa` (
  `no_daftar` varchar(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` enum('Laki - laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(100) NOT NULL,
  `tinggi` varchar(50) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jml_saudara` int(11) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `cita` varchar(100) NOT NULL,
  `hobi` varchar(100) NOT NULL,
  `jarak` varchar(50) NOT NULL,
  `transport` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `noseriskhu` varchar(100) NOT NULL,
  `noseriijasah` varchar(100) NOT NULL,
  `nilai_indo` float NOT NULL,
  `nilai_inggris` float NOT NULL,
  `nilai_mtk` float NOT NULL,
  `nilai_ipa` float NOT NULL,
  `nilai_pres` float NOT NULL,
  `prestasi` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `kerja_ayah` varchar(100) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `penghasilan_ortu` varchar(100) NOT NULL,
  `notelp_ortu` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `skhu` varchar(100) NOT NULL,
  `ijasah` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `keterangan` enum('Belum Terverifikasi','Lulus','Tidak Lulus') NOT NULL,
  `arsip` enum('Ya','Tidak') NOT NULL,
  `id_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `nisn` varchar(50) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass_asli` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` enum('Admin','Superadmin','Siswa') NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`nisn`, `nama_pengguna`, `password`, `pass_asli`, `email`, `hak_akses`, `tgl_daftar`) VALUES
('123456789', 'Administrator', '0fd490ba3432bc55bd8a6bc127492ce4', 'admin', 'admin@gmail.com', 'Superadmin', '2018-03-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `nilai` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nama_prestasi`, `tingkat`, `nilai`) VALUES
(1, 'Pilih Prestasi', 'Tidak ada prestasi', 0),
(2, 'Juara 1 - Tingkat Nasional', 'Juara 1 - Tingkat Nasional', 90),
(3, 'Juara 2 - Tingkat Nasional', 'Juara 2 - Tingkat Nasional', 80),
(4, 'Juara 3 - Tingkat Nasional', 'Juara 3 - Tingkat Nasional', 70),
(5, 'Juara 1 - Tingkat Provinsi', 'Juara 1 - Tingkat Provinsi', 60),
(6, 'Juara 2 - Tingkat Provinsi', 'Juara 2 - Tingkat Provinsi', 50),
(7, 'Juara 3 - Tingkat Provinsi', 'Juara 3 - Tingkat Provinsi', 40),
(8, 'Juara 1 - Tingkat Kabupaten', 'Juara 1 - Tingkat Kabupaten', 30),
(9, 'Juara 2 - Tingkat Kabupaten', 'Juara 2 - Tingkat Kabupaten', 20),
(10, 'Juara 3 - Tingkat Kabupaten', 'Juara 3 - Tingkat Kabupaten', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` int(11) NOT NULL,
  `nama_prov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama_prov`) VALUES
(1, 'Jawa Tengah'),
(2, 'Jawa Timur'),
(3, 'Jawa Barat'),
(4, 'Jakarta'),
(6, 'Banten'),
(7, 'Kalimantan Barat'),
(8, 'Kalimantan Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolahan`
--

CREATE TABLE `sekolahan` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `id_kec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolahan`
--

INSERT INTO `sekolahan` (`id_sekolah`, `nama_sekolah`, `id_kec`) VALUES
(1, 'SMPN 1 Randudongkal', 1),
(2, 'SMPN 1 Moga', 1),
(3, 'SMA N 1 Belik', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `idu` (`idu`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`),
  ADD KEY `id_prov` (`id_prov`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`),
  ADD KEY `id_kab` (`id_kab`),
  ADD KEY `id_prov` (`id_prov`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `pendaftar_siswa`
--
ALTER TABLE `pendaftar_siswa`
  ADD PRIMARY KEY (`no_daftar`),
  ADD KEY `prestasi` (`prestasi`),
  ADD KEY `jurusan` (`jurusan`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `sekolahan`
--
ALTER TABLE `sekolahan`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD KEY `id_kec` (`id_kec`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sekolahan`
--
ALTER TABLE `sekolahan`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `pengguna` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`);

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kab`) REFERENCES `kabupaten` (`id_kab`),
  ADD CONSTRAINT `kecamatan_ibfk_2` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`);

--
-- Ketidakleluasaan untuk tabel `pendaftar_siswa`
--
ALTER TABLE `pendaftar_siswa`
  ADD CONSTRAINT `pendaftar_siswa_ibfk_1` FOREIGN KEY (`prestasi`) REFERENCES `prestasi` (`id_prestasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftar_siswa_ibfk_2` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sekolahan`
--
ALTER TABLE `sekolahan`
  ADD CONSTRAINT `sekolahan_ibfk_1` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
