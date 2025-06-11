-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 11:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `tanggal`) VALUES
(7, 'Contoh Berita Publik', 'Ini bisa dilihat semua orang', '2025-06-10'),
(8, 'Pendaftaran Mahasiswa Baru 2025', 'Pendaftaran mahasiswa baru tahun ajaran 2025 akan dibuka mulai 1 Juli. Proses pendaftaran dilakukan secara online melalui portal resmi.', '2025-06-10'),
(9, 'Workshop Data Science Gratis', 'Universitas akan mengadakan workshop data science gratis untuk umum. Peserta akan belajar dasar-dasar Python dan machine learning.', '2025-06-10'),
(10, 'Lomba Inovasi Teknologi', 'Mahasiswa diundang untuk mengikuti lomba inovasi teknologi tingkat nasional. Hadiah total 100 juta rupiah.', '2025-06-10'),
(11, 'Perubahan Jadwal Kuliah', 'Jadwal kuliah semester ganjil mengalami penyesuaian akibat libur nasional tambahan. Silakan cek jadwal terbaru di portal akademik.', '2025-06-10'),
(12, 'Pengumuman Beasiswa Prestasi', 'Daftar penerima beasiswa prestasi 2024 sudah diumumkan. Mahasiswa terpilih akan menerima bantuan biaya pendidikan penuh.', '2025-06-10'),
(13, 'sapi pak rt nyeruduk megawati', 'nggak tau gaje sapinya', '2025-06-10'),
(14, 'mie gacoan jualan nuklir', 'mungkin mau ekspansi bisnis', '2025-06-10'),
(15, 'ini cintoh bherita', 'iya tau', '2025-06-10'),
(16, 'apalagi ya ', 'malah tanya bjir', '2025-06-10'),
(17, 'Pemerintah Umumkan Subsidi Listrik Naik Mulai Juli', 'Kementerian ESDM mengumumkan bahwa tarif subsidi listrik akan mengalami kenaikan mulai 1 Juli 2025 untuk pelanggan rumah tangga 450 VA dan 900 VA.', '2025-06-11'),
(18, 'Harga BBM Turun, Pertalite Jadi Rp 9.500 per Liter', 'PT Pertamina resmi menurunkan harga bahan bakar jenis Pertalite menjadi Rp 9.500 per liter, berlaku mulai hari ini.', '2025-06-11'),
(19, 'Jokowi Resmikan Tol Baru Cileunyi-Garut-Tasikmalaya', 'Presiden Joko Widodo meresmikan ruas tol baru yang menghubungkan Cileunyi dengan Garut dan Tasikmalaya, sepanjang 61 km.', '2025-06-11'),
(20, 'Ujian Nasional Dihapus, Diganti Asesmen Kompetensi', 'Mendikbudristek Nadiem Makarim menyatakan Ujian Nasional resmi diganti dengan Asesmen Kompetensi Minimum (AKM) dan Survei Karakter.', '2025-06-11'),
(21, 'Cuaca Ekstrem Melanda Jabodetabek, Warga Diimbau Waspada', 'BMKG mengeluarkan peringatan dini terkait cuaca ekstrem yang akan melanda wilayah Jabodetabek hingga akhir pekan.', '2025-06-11'),
(22, 'TikTok Shop Ditutup Sementara oleh Kominfo', 'Kementerian Komunikasi dan Informatika menutup layanan TikTok Shop karena belum memiliki izin e-commerce di Indonesia.', '2025-06-11'),
(23, 'Banjir Besar Landa Semarang, Ribuan Warga Mengungsi', 'Hujan deras selama dua hari menyebabkan banjir besar di beberapa titik di Kota Semarang. Pemerintah siagakan 120 posko bantuan.', '2025-06-11'),
(24, 'Harga Emas Naik Tajam, Tembus Rp 1.200.000 per Gram', 'Harga emas batangan hari ini mengalami kenaikan signifikan di tengah ketegangan geopolitik global.', '2025-06-11'),
(25, 'Piala Dunia U-20 Resmi Digelar di Indonesia', 'FIFA resmi menunjuk Indonesia sebagai tuan rumah Piala Dunia U-20. Stadion Gelora Bung Karno akan jadi venue utama.', '2025-06-11'),
(26, 'Penerimaan CPNS Dibuka 15 Juli, Ini Formasi yang Tersedia', 'Pemerintah akan membuka penerimaan CPNS pada 15 Juli 2025 dengan total formasi 125.000, mayoritas di sektor kesehatan dan pendidikan.', '2025-06-11'),
(27, 'Larangan Penggunaan Kantong Plastik Mulai Berlaku', 'Mulai bulan ini, penggunaan kantong plastik sekali pakai dilarang di seluruh pusat perbelanjaan dan pasar tradisional.', '2025-06-11'),
(28, 'Nilai Tukar Rupiah Melemah ke Rp 16.200 per Dolar AS', 'Rupiah kembali tertekan oleh sentimen global yang menyebabkan pelemahan terhadap dolar AS.', '2025-06-11'),
(29, 'WHO Umumkan Status Darurat Global Akhirnya Dicabut', 'Organisasi Kesehatan Dunia resmi mencabut status darurat pandemi global untuk COVID-19 setelah 5 tahun berlalu.', '2025-06-11'),
(30, 'iPhone 16 Dirilis dengan Kamera 108MP dan USB-C', 'Apple resmi meluncurkan iPhone 16 dengan peningkatan besar pada kamera dan penggunaan port USB-C untuk pertama kalinya.', '2025-06-11'),
(31, 'Menteri Keuangan Umumkan Pajak Karbon Mulai 2026', 'Sri Mulyani menyatakan Indonesia akan memberlakukan pajak karbon sebagai bagian dari komitmen perubahan iklim.', '2025-06-11'),
(32, 'Massa Buruh Demo Tuntut Kenaikan UMP 15%', 'Konfederasi Serikat Buruh menggelar demo di depan Istana Merdeka menuntut kenaikan UMP sebesar 15%.', '2025-06-11'),
(33, 'BMKG: Musim Kemarau 2025 Diperkirakan Lebih Panjang', 'BMKG memperkirakan musim kemarau tahun ini akan berlangsung hingga akhir Oktober akibat fenomena El Nino.', '2025-06-11'),
(34, 'Pemerintah Salurkan Bantuan Pangan ke 33 Provinsi', 'Kementerian Sosial mulai menyalurkan bantuan pangan berupa beras dan minyak goreng ke seluruh Indonesia.', '2025-06-11'),
(35, 'Startup Indonesia Terima Pendanaan Rp 500 Miliar', 'Startup teknologi pendidikan asal Yogyakarta mendapatkan pendanaan seri B senilai Rp 500 miliar dari investor Singapura.', '2025-06-11'),
(36, 'Menparekraf Targetkan 15 Juta Wisatawan Asing Tahun Ini', 'Kemenparekraf menargetkan peningkatan kunjungan wisatawan asing mencapai 15 juta selama tahun 2025.', '2025-06-11'),
(37, 'BTS Gelar Konser Terakhir Sebelum Wamil', 'Boyband asal Korea Selatan, BTS, akan menggelar konser terakhirnya sebelum para personelnya menjalani wajib militer.', '2025-06-11'),
(38, 'Film Indonesia “Langit Merah” Tembus Box Office Asia', 'Film “Langit Merah” sukses meraih penonton terbanyak di Asia Tenggara, menembus 10 juta penonton.', '2025-06-11'),
(39, 'PLN Bangun Pembangkit Listrik Tenaga Surya Terbesar di ASEAN', 'PLN meresmikan PLTS skala besar di Kalimantan Timur dengan kapasitas 100 MW, terbesar di Asia Tenggara.', '2025-06-11'),
(40, 'KPK Tangkap Pejabat Daerah dalam OTT di Jawa Barat', 'Komisi Pemberantasan Korupsi melakukan OTT terhadap seorang kepala dinas terkait proyek pengadaan fiktif.', '2025-06-11'),
(41, 'Google Umumkan Kantor Baru di Jakarta', 'Google membuka kantor regional Asia Tenggara di kawasan SCBD Jakarta, fokus pada pengembangan AI.', '2025-06-11'),
(42, 'Bank Indonesia Umumkan Suku Bunga Acuan Tetap di 6%', 'Gubernur BI menyatakan suku bunga tetap dipertahankan untuk menjaga stabilitas ekonomi nasional.', '2025-06-11'),
(43, 'Microsoft Gandeng UMKM untuk Adopsi Cloud', 'Microsoft Indonesia meluncurkan program pendampingan digital untuk membantu UMKM migrasi ke cloud.', '2025-06-11'),
(44, 'Kemendikbud Tambah Kuota Beasiswa LPDP 2025', 'Pemerintah menambah kuota penerima beasiswa LPDP untuk S2 dan S3 menjadi 10.000 orang.', '2025-06-11'),
(45, 'Presiden Teken Perpres Pajak Kendaraan Listrik', 'Perpres baru memberikan insentif pajak hingga 0% untuk pembelian kendaraan listrik.', '2025-06-11'),
(46, 'Nilai Ekspor Indonesia Tembus Rekor Baru', 'BPS mencatat ekspor Indonesia tembus USD 24 miliar, tertinggi sejak 2013.', '2025-06-11'),
(47, 'Menkominfo Blokir 200 Situs Judi Online', 'Kementerian Kominfo berhasil memblokir 200 lebih situs judi online dalam kurun 3 minggu terakhir.', '2025-06-11'),
(48, 'Waspada! Penyakit DBD Meningkat 300% di Musim Hujan', 'Dinas Kesehatan mengimbau warga untuk menjaga kebersihan karena lonjakan drastis kasus DBD.', '2025-06-11'),
(49, 'Pemilu 2029 Akan Gunakan E-Voting Nasional', 'KPU mulai menyiapkan regulasi dan infrastruktur untuk pelaksanaan e-voting nasional di Pemilu 2029.', '2025-06-11'),
(50, 'KAI Tambah Jadwal Kereta Lebaran 2025', 'PT KAI menambah 35 perjalanan tambahan untuk mendukung mobilitas saat Lebaran.', '2025-06-11'),
(51, 'Menhub Uji Coba Kereta Cepat Jakarta-Bandung', 'Kereta cepat Jakarta–Bandung resmi diuji coba oleh Menhub sebelum pembukaan untuk umum.', '2025-06-11'),
(52, 'BMKG Umumkan Potensi Gempa Megathrust di Selatan Jawa', 'BMKG mengingatkan adanya potensi gempa megathrust berdasarkan pemodelan terbaru.', '2025-06-11'),
(53, 'Startup Agritech Rilis Aplikasi Pasar Tani Online', 'Aplikasi PasarTani.id diluncurkan untuk memfasilitasi petani menjual hasil panen langsung ke konsumen.', '2025-06-11'),
(54, 'Kapal Selam RI Ikut Latihan Gabungan di Pasifik', 'TNI AL mengirimkan dua kapal selam untuk latihan gabungan dengan Amerika dan Jepang.', '2025-06-11'),
(55, 'Riset: Generasi Z Paling Sering Alami Burnout', 'Survei nasional menunjukkan 62% Gen Z di Indonesia mengalami burnout akibat tekanan kerja dan sosial.', '2025-06-11'),
(56, 'Telkom Resmikan Satelit Merah Putih 2', 'Telkom meresmikan peluncuran satelit komunikasi orbit tinggi Merah Putih 2 untuk koneksi luar pulau.', '2025-06-11'),
(57, 'Piala AFF 2026: Indonesia Masuk Grup Neraka', 'Hasil drawing Piala AFF menempatkan Indonesia bersama Thailand dan Vietnam di fase grup.', '2025-06-11'),
(58, 'Warga Mulai Gunakan Kompor Induksi Bersubsidi', 'Program konversi kompor gas ke induksi mulai berjalan di lima kota besar dengan insentif dari PLN.', '2025-06-11'),
(59, 'Guru Honorer Diangkat Jadi ASN Tahap Pertama', 'Sebanyak 30 ribu guru honorer resmi diangkat sebagai ASN PPPK di tahap pertama 2025.', '2025-06-11'),
(60, 'Netflix Hadirkan 20 Serial Indonesia Tahun Ini', 'Netflix mengumumkan investasi besar untuk produksi 20 serial Indonesia sepanjang 2025.', '2025-06-11'),
(61, 'Menlu RI Kunjungi China Bahas Kemitraan Dagang', 'Menlu Retno Marsudi bertemu Menlu China bahas kerja sama ekonomi strategis.', '2025-06-11'),
(62, 'Unicorn Baru Muncul dari Bidang Energi Terbarukan', 'Startup energi asal Bandung dinobatkan sebagai unicorn baru setelah mendapat pendanaan $1 M.', '2025-06-11'),
(63, 'Bank Digital Raih 2 Juta Pengguna Baru dalam 6 Bulan', 'Pertumbuhan bank digital meningkat drastis sejak awal tahun karena kemudahan registrasi.', '2025-06-11'),
(64, 'Kemenparekraf Gelar Festival Musik Nusantara 2025', 'Festival musik lintas genre dan daerah akan diadakan di 10 kota besar mulai Agustus.', '2025-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `role` enum('admin','operator','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'setiya nugroho dosen', '5c7105867f2351c9863e0882bcf220c9', 'Setiya Admin', 'admin'),
(2, 'nugroho', '77f5f3e6944139e8437279a63b2817c9', 'Nugroho Operator', 'operator'),
(3, 'rizqy', 'af20a44f2416b3203393095e17c4795f', 'Rizqy User', 'user'),
(5, 'Mubarok', '16d477eb2e0e30b13df64c3e3ee2b734', 'Mubarok', 'user'),
(6, 'Adam malik', '25d55ad283aa400af464c76d713c07ad', 'adam user', 'user'),
(7, 'malik', '25d55ad283aa400af464c76d713c07ad', 'malik', 'user'),
(8, 'malika', '25d55ad283aa400af464c76d713c07ad', 'malika', 'user'),
(9, 'mulyadi', '5c7105867f2351c9863e0882bcf220c9', 'mulyadi', 'user'),
(10, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin Sistem', 'admin'),
(11, 'operator', '2407bd807d6ca01d1bcd766c730cec9a', 'Operator Aplikasi', 'operator'),
(12, 'user', '6ad14ba9986e3615423dfca256d04e3f', 'Pengguna Biasa', 'user'),
(13, 'Fira', '0192023a7bbd73250516f069df18b500', 'Admin Sistem', 'admin'),
(14, 'Dian', '2407bd807d6ca01d1bcd766c730cec9a', 'Operator Aplikasi', 'operator'),
(15, 'Ivan', '6ad14ba9986e3615423dfca256d04e3f', 'Pengguna Biasa', 'user'),
(16, 'dani', '0192023a7bbd73250516f069df18b500', 'Admin Sistem', 'admin'),
(17, 'Ilyas', '2407bd807d6ca01d1bcd766c730cec9a', 'Operator Aplikasi', 'operator'),
(18, 'diva', '6ad14ba9986e3615423dfca256d04e3f', 'Pengguna Biasa', 'user'),
(19, 'bintang', '0192023a7bbd73250516f069df18b500', 'Admin Sistem', 'admin'),
(20, 'Danu', '2407bd807d6ca01d1bcd766c730cec9a', 'Operator Aplikasi', 'operator'),
(21, 'Irsyad', '6ad14ba9986e3615423dfca256d04e3f', 'Pengguna Biasa', 'user'),
(22, 'Fufufafa', '0192023a7bbd73250516f069df18b500', 'Admin Sistem', 'admin'),
(23, 'Dino', '2407bd807d6ca01d1bcd766c730cec9a', 'Operator Aplikasi', 'operator'),
(24, 'inul', '6ad14ba9986e3615423dfca256d04e3f', 'Pengguna Biasa', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
