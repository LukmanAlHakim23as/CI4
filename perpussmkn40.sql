-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 09:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpussmkn40`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `f_id` int(11) NOT NULL,
  `f_nama` varchar(100) NOT NULL,
  `f_username` varchar(100) NOT NULL,
  `f_password` varchar(100) NOT NULL,
  `f_level` enum('Admin','Pustakawan') NOT NULL,
  `f_status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`f_id`, `f_nama`, `f_username`, `f_password`, `f_level`, `f_status`) VALUES
(1, 'Ardhana Adam Sutrisno', 'ardanstein', 'produkkreatifkewirausahaan', 'Admin', 'Aktif'),
(2, 'Nuraini Azizah', 'nurainiazizah', 'pemogramanweb', 'Admin', 'Aktif'),
(3, 'Aswar Hamid', 'aswarh', 'multimedia', 'Admin', 'Aktif'),
(4, 'Nugro Agung Pribadi', 'pauno', 'basisdata', 'Admin', 'Aktif'),
(5, 'Elnova Feralisa', 'buel', 'desaingrafis', 'Admin', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE `t_anggota` (
  `f_id` int(11) NOT NULL,
  `f_nis` varchar(5) NOT NULL,
  `f_nama` varchar(100) NOT NULL,
  `f_username` varchar(25) NOT NULL,
  `f_password` varchar(20) NOT NULL,
  `f_alamat` varchar(100) NOT NULL,
  `f_tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_anggota`
--

INSERT INTO `t_anggota` (`f_id`, `f_nis`, `f_nama`, `f_username`, `f_password`, `f_alamat`, `f_tanggallahir`) VALUES
(1, '12051', 'Rifaldi', 'umang', 'umangsky', 'Jakarta', '2006-03-12'),
(2, '12052', 'Anas', 'cellopaws', 'cellosayangiam', 'Jakarta', '2006-05-16'),
(3, '12503', 'Aans', 'aansxe', 'aanbay', 'Hj. Ten', '2004-12-22'),
(4, '12054', 'Caplin', 'caplin', 'bayarbaju', 'Condet', '2006-05-07'),
(5, '12055', 'Albara', 'paska', 'paskalbana', 'Jl. Nangka Rewel', '2006-09-01'),
(6, '12056', 'Hanabi', 'wibuakut', 'hutaoistriku', 'Pisangan Baru', '2005-09-21'),
(7, '12057', 'Agor', 'agorles', 'agasgoreng', 'Menteng', '2005-12-11'),
(8, '12058', 'Denial', 'ahmadenial', 'galurbersatu', 'Galur Sari IX', '2006-04-28'),
(9, '12059', 'Ajima', 'serikatojan', 'paustad', 'Jl. Sensus IV', '2005-12-08'),
(10, '12060', 'Jawir', 'jawaireng', 'barudakjawa', 'Pluit', '2005-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `f_id` int(11) NOT NULL,
  `f_idkategori` int(11) NOT NULL,
  `f_judul` varchar(100) NOT NULL,
  `f_pengarang` varchar(100) NOT NULL,
  `f_penerbit` varchar(100) NOT NULL,
  `f_deskripsi` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`f_id`, `f_idkategori`, `f_judul`, `f_pengarang`, `f_penerbit`, `f_deskripsi`) VALUES
(1, 2, 'Efek Rumah Kaca', 'Henry Manampiring', 'PT Kompas Media Nusantara', 'Buku ini pada awalnya menceritakan tentang sebuah survei kekhawatiran nasional yang semakin masif sekaligus menyajikan tentang sekilas kehidupan si penulis yang dipenuhi oleh emosi negatif yang berlebihan. Lalu, lebih dari 2000 tahun lalu sebuah mazhab filsafat menemukan akar masalah dan solusi dari banyaknya emosi negatif. Ya, Stoisisme atau\r\nfilosofi Stoa, namun penulis lebih memperkenalkannya dengan “Filosofi Teras” yang merupakan filsafat Yunani-Romawi Kuno yang dapat membantu kita dalam mengatasi emosi'),
(2, 1, 'Si Kancil Anak Nakal', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 'Novel Rumah Kaca merupakan karya dari Pramoedya Ananta Toer merupakan novel fiksi sejarah yang menceritakan kehidupan politik di negeri Hindia-Belanda. Secara keseluruhan, novel ini berisi aktivitas untuk memata-matai Minke sebelum, saat, dan setelah Minke diasingkan ke Maluku Utara. Selain itu, novel ini juga menceritakan sejarah pembunuhan tuna susila kelas atas, Fientje de Fenicks atau Rientje Roo. Novel ini cocok untuk pembaca yang mencari buku sejarah yang berlatar waktu zaman Hindia-Belanda.'),
(3, 3, 'Kisi Kisi SBMPTN', 'Robert Bala', 'Gramedia Widiasarana Indonesia', 'Menjadi \"guru hebat\" merupakan cita-cita yang tidak mudah bagi para guru yang kini berhadapan dengan murid \"zaman now\". Seiring dengan kemajuan ilmu pengetahuan dan teknologi, karakter Siswa juga ikut berkembang mengikuti kemajuan tersebut. Itulah yang menjadi tantangan besar untuk guru yang tetap mengikuti perkembangan zaman.\r\nUntuk mengikuti perkembangan tersebut, bagaimanakah cara guru masa kini untuk mengimbangi kehebatan Siswa-siswanya? Apa saja kriteria yang dibutuhkan untuk bisa menjadi guru hebat? T'),
(4, 1, 'Hujan Darah', 'Kai Elian', 'Gramedia Pustaka Utama', 'Hujan telah turun selama sembilan puluh hari tanpa henti di Desa Bokudi yang terletak di lereng Gunung Morui. Asayana Brahma, ahli meteorologi yang telah beralih profesi menjadi disaster hunter, mendapat kabar tentang fenomena alam tidak biasa itu dari sahabatnya Elang Langit, seorang pakar klimatologi. Elang khawatir jika hujan itu tidak berhenti, maka lereng gunung akan longsor dan mengubur seluruh desa. Terdorong niat untuk menyelamatkan nyawa, Asa berangkat ke desa itu bersama Elang. Ekspedisi itu melib'),
(5, 4, 'How To Talk Like Ted', 'Sumadi Surya Brata', 'Pt Rajagrafindo Persada', 'Psikologi kepribadian kaya dengan ermacam-macam teori dalam menggambarkan dan menentukan kepribadian individu. Untuk mendapatkan ikhtisarnya, di dalam buku ini dikemukakan penggolongna psikologi kepribadian yangtelah ada smapai dewasa ini. Penggolongna tersebut didasarkan pada metode yang digunakan, komponen kepribadian yang dipakai sebagai landasan, dan cara pendekatan. dari ketiga dasar penggolongan tersebu, munculah berbagai psikologi kepribadian, seprti tipologi Kant, Teori Psikoanalisis, Teori Spranger'),
(6, 4, 'Eksperimen Teori dan Implementasi', 'Nuraeni, S.Psi', 'Adipura', 'Buku Psikologi Eksperimen ini adalah media belajar untuk memudahkan mahasiswa memahami metode penelitian eksperimen dalam bidang psikologi. Oleh karenanya, buku ini banyak berisi tentang teori dasar dan panduan teknis pelaksanaan penelitian eksperimen. Perbedaan buku ini dengan buku-buku psikologi eksperimen yang beredar sebelumnya terletak pada muatan tafakur sains karena memberikan informasi tentang nilai-nilai keislaman yang terkandung di dalam mata kuliah psikologi eksperimen.'),
(7, 5, 'Putri Ular', 'Dian K', 'Bhuana Ilmu Populer', 'Alkisah, hiduplah Putri yang cantik. Namun sayang, dia suka berkata buruk. Dia tak sadar bahwa perkataan adalah doa. Hingga suatu saat, apa yang Putri katakan menjadi kenyataan. Apa yang terjadi pada Putri? Apakah dia menyesali perkataannya kelak?'),
(8, 5, 'Suwidak Loro (Jawa Tengah)', 'Dian Kristiani', 'Bhuana Ilmu Populer', 'Pada zaman dahulu, hiduplah seorang Mbok Randa dan anaknya yang bernama Suwidak Loro. Suwidak Loro hanya memiliki 60 helai rambut dan dua buah gigi. Itulah mengapa orang memanggilnya Suwidak Loro. Walaupun begitu, kasih sayang ibunya tak berkurang kepada Suwidak Loro. Setiap hari ibunya bernyanyi sambil mengelus kepala putrinya dengan lembut, “Suwidak Loro….. Suwidak Loro….. kamu adalah putri paling jelita”. Suwidak Loro pun memandang dirinya ke cermin dan tidak percaya.'),
(9, 3, 'Pendidikan Inklusi', 'Trianto, M.Pd', 'Prenadamedia Group', 'Pendidikan inklusi merupakan filosofi pendidikan, bukan istilah kebijakan atau legislasi dalam pendidikan, yang memungkinkan semua peserta didik memperoleh pendidikan yang terbaik. Pendidikan inklusif merujuk pada kebutuhan belajar semua peserta didik, dengan suatu fokus spesifik pada mereka yang rentan terhadap marginalisasi dan pemisahan. Dengan pendidikan inklusif berarti sekolah harus mengakomodasi semua anak tanpa memandang kondisi fisik, intelektual, sosial, emosi, bahasa, atau kondisi lainnya dengan '),
(10, 2, 'Kapitalis: Mao Zedong', 'Nurjannah Y.A.', 'Sociality', 'Mao Zedong: Sebuah Biografi');

-- --------------------------------------------------------

--
-- Table structure for table `t_detailbuku`
--

CREATE TABLE `t_detailbuku` (
  `f_id` int(11) NOT NULL,
  `f_idbuku` int(11) NOT NULL,
  `f_status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_detailbuku`
--

INSERT INTO `t_detailbuku` (`f_id`, `f_idbuku`, `f_status`) VALUES
(1, 1, 'Tersedia'),
(2, 2, 'Tersedia'),
(3, 3, 'Tersedia'),
(4, 4, 'Tersedia'),
(5, 5, 'Tidak Tersedia'),
(6, 6, 'Tersedia'),
(7, 7, 'Tidak Tersedia'),
(8, 8, 'Tidak Tersedia'),
(9, 9, 'Tersedia'),
(10, 10, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_peminjaman`
--

CREATE TABLE `t_detail_peminjaman` (
  `f_id` int(11) NOT NULL,
  `f_idpeminjaman` int(11) NOT NULL,
  `f_iddetailbuku` int(11) NOT NULL,
  `f_tanggalkembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_detail_peminjaman`
--

INSERT INTO `t_detail_peminjaman` (`f_id`, `f_idpeminjaman`, `f_iddetailbuku`, `f_tanggalkembali`) VALUES
(1, 1, 1, '2023-05-15'),
(2, 2, 2, '2023-05-15'),
(3, 3, 1, '2023-05-15'),
(4, 4, 9, '2023-05-15'),
(5, 5, 4, '2023-05-16'),
(6, 6, 4, NULL),
(7, 7, 1, '2023-05-17'),
(8, 8, 10, '2023-05-17'),
(9, 9, 6, '2023-05-17'),
(10, 10, 6, NULL),
(11, 11, 1, '2023-05-17'),
(12, 12, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `f_id` int(11) NOT NULL,
  `f_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`f_id`, `f_kategori`) VALUES
(1, 'Fiksi'),
(2, 'Non-Fiksi'),
(3, 'Pendidikan'),
(4, 'Psikologi'),
(5, 'Cerita Rakyat'),
(6, 'horor');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `f_id` int(11) NOT NULL,
  `f_idadmin` int(11) NOT NULL,
  `f_idanggota` int(11) NOT NULL,
  `f_tanggalpeminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`f_id`, `f_idadmin`, `f_idanggota`, `f_tanggalpeminjaman`) VALUES
(1, 1, 1, '2023-05-14'),
(2, 1, 2, '2023-05-14'),
(3, 1, 3, '2023-05-14'),
(4, 1, 4, '2023-05-14'),
(5, 2, 5, '2023-05-15'),
(6, 2, 6, '2023-05-15'),
(7, 2, 7, '2023-05-15'),
(8, 3, 8, '2023-05-16'),
(9, 3, 9, '2023-05-16'),
(10, 4, 10, '2023-05-17'),
(11, 4, 3, '2023-05-17'),
(12, 5, 3, '2023-05-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_buku_ibfk_1` (`f_idkategori`);

--
-- Indexes for table `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_idbuku` (`f_idbuku`);

--
-- Indexes for table `t_detail_peminjaman`
--
ALTER TABLE `t_detail_peminjaman`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_iddetailbuku` (`f_iddetailbuku`),
  ADD KEY `t_detail_peminjaman_ibfk_2` (`f_idpeminjaman`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_idadmin` (`f_idadmin`),
  ADD KEY `f_idanggota` (`f_idanggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_detail_peminjaman`
--
ALTER TABLE `t_detail_peminjaman`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD CONSTRAINT `t_buku_ibfk_1` FOREIGN KEY (`f_idkategori`) REFERENCES `t_kategori` (`f_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_detailbuku`
--
ALTER TABLE `t_detailbuku`
  ADD CONSTRAINT `t_detailbuku_ibfk_1` FOREIGN KEY (`f_idbuku`) REFERENCES `t_buku` (`f_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_detail_peminjaman`
--
ALTER TABLE `t_detail_peminjaman`
  ADD CONSTRAINT `t_detail_peminjaman_ibfk_1` FOREIGN KEY (`f_iddetailbuku`) REFERENCES `t_detailbuku` (`f_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_detail_peminjaman_ibfk_2` FOREIGN KEY (`f_idpeminjaman`) REFERENCES `t_peminjaman` (`f_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_1` FOREIGN KEY (`f_idadmin`) REFERENCES `t_admin` (`f_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_peminjaman_ibfk_2` FOREIGN KEY (`f_idanggota`) REFERENCES `t_anggota` (`f_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
