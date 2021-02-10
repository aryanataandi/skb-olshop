-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 02:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_user` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `is_active`, `tanggal_user`) VALUES
(3, 'admin', 'admin1234', 1, '2020-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id_banner` int(11) NOT NULL,
  `nama_banner` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `gambar_banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`id_banner`, `nama_banner`, `url`, `gambar_banner`) VALUES
(14, 'Welcome', 'facebook.com', 'Banner2.png'),
(15, 'Toko', 'youtube.com', 'Banner1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `judul_web` varchar(64) NOT NULL,
  `deskripsi_web` varchar(255) NOT NULL,
  `nomor_web` varchar(18) NOT NULL,
  `email_web` varchar(64) NOT NULL,
  `wa_web` varchar(13) NOT NULL,
  `alamat_web` varchar(255) NOT NULL,
  `info_bank` varchar(255) NOT NULL,
  `no_rek` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id_info`, `judul_web`, `deskripsi_web`, `nomor_web`, `email_web`, `wa_web`, `alamat_web`, `info_bank`, `no_rek`) VALUES
(1, 'SKB Olshop', 'SKB Olshop adalah sebuah situs toko online untuk UMKM yang berkualitas dan terpercaya.', '(024) 6926993', 'skb.olshop@gmail.com', '6285877866552', 'Jl. Veteran No. 45, Cebongan, Salatiga', 'BCA a.n. SKB Salatiga', '185301001606505');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama_pemesan` varchar(56) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `resi` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `berat_total` decimal(5,2) NOT NULL,
  `total` int(12) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_pesan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `email`, `nama_pemesan`, `no_telp`, `alamat`, `kode_pos`, `ekspedisi`, `resi`, `ongkir`, `berat_total`, `total`, `status`, `tgl_pesan`) VALUES
('KNT854692701', 'admin@admin.com', 'Aryanata Andipradana', '085875351528', 'Dampyak RT 9 RW 3, Kadirejo, Pabelan, Kab. Semarang, Jawa Tengah', 50771, 'JNE - OKE', '000783455', 20000, '1.50', 354500, 'Selesai', '2021-01-26 11:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice_detail`
--

CREATE TABLE `tb_invoice_detail` (
  `id_invoice` varchar(20) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice_detail`
--

INSERT INTO `tb_invoice_detail` (`id_invoice`, `id_produk`, `jumlah`) VALUES
('KNT854692701', 147, 2),
('KNT854692701', 136, 2),
('KNT854692701', 137, 1),
('KNT854692701', 133, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(11, 'Makanan'),
(12, 'Minuman'),
(13, 'Pakaian Pria'),
(14, 'Pakaian Wanita'),
(15, 'Kerajinan'),
(16, 'Buku'),
(17, 'Pakaian Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(2048) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `berat_produk` decimal(5,2) NOT NULL DEFAULT 0.00,
  `gambar_produk` varchar(100) NOT NULL,
  `diskon_produk` int(11) NOT NULL,
  `status_produk` int(1) NOT NULL,
  `tanggal_produk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `stok_produk`, `berat_produk`, `gambar_produk`, `diskon_produk`, `status_produk`, `tanggal_produk`) VALUES
(117, 11, 'Mey Toz Corn Chips Snack Pedas', '<p><strong>Mey Toz Corn Chips Snack Pedas</strong></p><p> </p><p>Kripik jagung pedas dengan aneka tingkat level pedas untuk menemani hari-harimu dirumah.</p><p>Kandungan yang terdapat pada snack/cemilan ini adalah:</p><figure class=\"table\"><table><thead><tr><th>Kandungan</th><th> </th><th>Berat</th></tr></thead><tbody><tr><td>Gula</td><td> </td><td>200ml</td></tr><tr><td>Bumbu</td><td> </td><td>10ml</td></tr><tr><td>Keripik</td><td> </td><td>100%</td></tr></tbody></table></figure><p>Desain kemasan di buat oleh <i>kurapika.id</i></p><p>Untuk pemesanan Whatsapp ke <i>+6285-855-988-555</i></p><p>Atau mampir ke Instagram <i>@kurapika.id</i></p>', 6000, 125, '0.20', 'mey_toz_corn_chips_snack_pedas-12132020.jpg', 0, 1, '2020-11-23 10:17:19'),
(118, 11, 'Rengginang Crispy', '<p>Rengginang Crispy <strong>“Bikin Senang”</strong></p><p>Rengginang kini hadir dengan tampilan dan berbagai varian rasa baru lho! Varian rasa yang ada adalah:</p><ul><li>Original</li><li>Cheese</li><li>Salted Egg</li><li>Chocolate dll</li></ul><p>Buruan pesan sekarang di Toko Online SKB Salatiga!!</p>', 8500, 0, '0.12', 'rengginang_crispy-10212020.jpg', 0, 1, '2020-11-23 10:17:28'),
(120, 11, 'Kakarag Salted Egg', '<p><strong>Kakarag Salted Egg </strong>kini hadir di <i>Toko Online SKB Salatiga</i>. Buruan pesan sekarang sebelum kehabisan!</p><p>Hadir dengan berbagai varian rasa:</p><ol><li>Original</li><li>Manis</li><li>Pedas</li><li>Gurih</li></ol><p>Order di +6254-665-999-555</p>', 14000, 64, '0.14', 'kakarag_salted_egg-10212020.jpg', 0, 1, '2020-11-23 10:17:31'),
(121, 12, 'Minuman Rasa Buah Ayoedya', '<p>Aneka minuman rasa buah sehat dengan harga terjangkau!</p><p><strong>Ayoedya</strong></p>', 3000, 80, '0.40', 'minuman_rasa_buah_ayoedya-10212020.jpg', 0, 1, '2020-11-23 10:18:31'),
(122, 14, 'Turtle Neck Long', '<p>1 pcs Rp 35.000<br><br>Ukuran : ALL SIZE FIT TO L<br>LD (lingkar dada): 90 cm<br>P (panjang): 60 cm<br>Tinggi leher : 6 cm<br>Bahan: Cotton Monalisa<br><br>line: @ellipses.inc (pakai @ ya) / Pin: D47B1DA4 WA : 081932547692<br><br>Follow IG: @ellipses.inc</p>', 65000, 40, '0.50', 'turtle_neck_long-11242020.jpg', 15, 1, '2020-11-23 10:18:34'),
(123, 12, 'Kopi Kenangan', '<p><strong>Kopi Kenangan</strong></p><p>Kopinya anak muda, kini hadir di toko online kesayangan anda! Buruan pesan sekarang sebelum terlambat. Terdapat berbagai varian rasa dan toping.</p><p>Pesan di <i>Toko Online SKB Salatiga</i></p>', 10000, 124, '0.40', 'kopi_kenangan-10212020.jpeg', 0, 1, '2020-11-23 10:18:38'),
(133, 13, 'Jaket Bomber Pria Hitam', '<p>Mau jadi dropshipper? yuk bisa chat kami ya :)<br><br>Suka koleksi jaket? Jaket Harrington bisa jadi salah satu koleksi jaket baru kamu. Jaket yang lagi hits di kalangan anak muda ini memang bisa membuat penampilan kamu terlihat lebih keren.<br><br>Dengan saku samping menggunakan sleting, membuat barang bawaan agan lebih aman tentunya<br><br>Untuk Spesifikasi<br><br>Bahan Americal Drill Premium<br>Sleting / Zipper YKK ORiginal ( Sleting terbaik saaat ini )<br>Full Furing<br>Terdapat 3kantong ( 2 didepan + 1 di dalam )<br>Model belakang tangan dan punggung polos tidak ada kerutan<br>JADI GANTENG !<br>MENERIMA DROPSHIP/ RESELLER/PESANAN SERAGAM<br><br>Tersedia warna : ( UNTUK STOK SILAHKAN TANYAKAN KAMI )<br><br>Urutan Foto<br><br>1. Black ( M L XL)<br>2. Grey ( M L XL )<br>3. Green (M L XL)<br>4. Navy ( M L )<br><br>Tersedia size :<br><br>Size chart ( Panjang x Lebar )<br><br>M ( 69 x 52)<br>L ( 71 x 55 )<br>XL ( 72x 57 )<br>XXL ( 73 X 59)<br><br><br>Model Menggunakan Size M ya gan ( Foto Asli ! )<br><br>Harga Retail IDR 299.000 -> PROMO 210.000 !<br><br><br><br>Note : yang lebih murah banyak gan tapi kualitas belum dijamin, barang kami setara distro yang jual 250K ++ , silahkan buktikan :)</p>', 189000, 42, '0.80', 'jaket_bomber_pria_harrington-10212020.jpg', 50, 1, '2020-11-23 10:18:43'),
(134, 15, 'Bantal Duduk Mager Homecraft', '<p>PROMO MANTAP !!<br>MIN. BELI 5PCS GRATIS 1 PCS GELANG MASKER SCUBA DEWASA POLOS<br>-------------------------------------------------------------------------------------------------------<br><br>Bantal Duduk Mager Homecraft yang di produksi untuk kenyamanan kamu pada saat duduk di Ruangan Kerja, Ruangan Makan, Ruangan Baca atau dimanapun. Dengan ketebatalan yang cukup dapat membuat duduk kamu menjadi lebih nyaman dan lebih sehat.<br><br>Alas duduk fungsional bisa untuk lesehan dirumah atau lesehan resto/rumah makan. Untuk alas duduk di kantor biar tidak cepat lelah duduk.<br>Bisa juga digunakan sebagai sandaran punggung/pinggang saat duduk di kantor atau saat mengendarai mobil sehingga saat bekerja atau saat perjalanan menjadi lebih nyaman dan tidak mudah lelah.<br><br>// PRODUK ORIGINAL<br>Pastikan Bantal Alas Duduk yang anda beli adalah merk Mager Homecraft dengan label tag menempel pada bagian pinggir atas. Produk yang kami buat sudah di design sedemikian rupa agar memberikan kenyamanan yang maksimal pada saat duduk di Ruangan Kerja, Ruangan Makan, Ruangan baca dan dimapun.<br><br>// REPUTASI DAN ULASAN<br>Produk kami telah terjual ribuan item setiap bulan, hal ini karena selain harganya terjangkau, variasi motif yang lengkap dan juga kualitas produk, kami juga mempunyai komitmen untuk melayani customer dengan baik sehingga memberikan kepuasan tersendiri saat berbelanja. Anda tidak perlu lagi meragukan reputasi dan review toko kami karena ribuan orang telah membuktikannya.<br><br>// JAMINAN<br>Jika anda menerima produk yang salah, rusak, cacat atau tidak sesuai pesanan, silahkan hubungi admin kami melalui chat untuk dicarikan solusinya, jika kekeliruan disebabkan dari kesalahan kami maka anda bisa melakukan penukaran/penggant<br><br>**NOTE**<br>* Untuk pemilihan motif kamu bisa sebutkan di bagian \"Catatan Untuk Penjual\"<br>* Pemilihan motif hanya berlaku di bagian Catatan Untuk Penjual Bukan di Chat<br>* Untuk yang tidak menuliskan pemilihan motif di bagian catatan untuk penjual maka di kirim RANDOM.<br>* S&', 25000, 40, '0.40', 'bantal_duduk_mager_homecraft-11052020.jpg', 10, 1, '2020-11-23 10:18:46'),
(135, 16, 'Inferensi Bayesian dengan R', '<p>Statistika Bayesian mulai dikenal melalui publikasi Thomas Bayes pada tahun 1963 yang diformalkan sebagai teorema Bayes. Inferensi Statistika yang berdasar teorema Bayes dalam menentukan distribusi posterior yang menjadi dasar inferensi statistika disebut inferensi Bayesian. Seperti statistika klasik, statistika Bayesian sekarang telah berkembang secara luas, yang keluasannya telah merasuk dalam banyak aplikasi seperti bidangn kesehatan, ekonometri.<br><br>Buku ini utamanya membahas distribusi posterior dan komputasinya yang menjadi dasar inferensi Bayesaian. Pembahasannya mulai dari probabilitas, perkembangan posterior satu dimensi menjadi multi dimensi, prior konjugat menjadi prior noninformatif, bahkan ke prior tak sejati. Sejalan dengan perkembangan di atas diperlukan pengembangan komputasi Bayesian dan sim- ulasi perhitungan distribusi posterior. Perangkat lunak R dipilih untuk melengkapi buku ini karena kemampunanya untuk menulis fungsi perintah untuk mendefinisikan model Bayesian, menulis fungsi untuk meringkas distribusi posterior dan menggunakan fungsi untuk melakukan simulasi distribusi posterior. Sasaran utama penulisan buku ini adalah mahasiswa tingkat sarjana Statistika/Matematika tahun ketiga atau mahasiswa Pascasarjana Statis- tika/Matematika. Kalkulus dan Metode Statistika merupakan prasyarat yang diperlukan untuk mempelajari buku ini.<br><br>Penulis: Subanar<br>Cetakan Pertama, Desember 2019<br>Tebal 314 halaman<br>Ukuran 15,5 cm x 23 cm<br>Penerbit: Gadjah Mada University Press</p>', 90000, 100, '0.45', 'inferensi_bayesian_dengan_r-11052020.png', 15, 1, '2020-11-23 10:18:50'),
(136, 13, 'Masker Fullprint 2 Layer', '<p>!!!!! READY STOCK !!!!<br>- BARANG READY STOCK , TIDAK USAH MENUNGGU PO<br>- Pesanan diproses sesuai VARIASI , tidak menerima GANTI ORDER VIA CHAT / VARIASI VIA NOTES<br><br>- CHECKOUT TERPISAH DARI BARANG YANG MASIH PRE ORDER AGAR DIKIRIM DULUAN<br><br>- Tidak menerima Request Cancel ???? Saat H+2 Setelah pemesanan<br><br>KOMPOSISI: POLYDEX BLEND, KATUN WITH SUBLIM FULLPRINT ART.<br><br>STAYHOOPS MASK menggunakan bahan kain yang mampu menahan partikel mikroskopis namun masih terasa nyaman saat bernafas, tidak sesak dan tidak gerah saat dipakai.<br><br>- Bahan Breathable yang ringan, tidak membuat gerah saat dipakai.<br>- Desain 2 SISI ; bisa dipakai bulak-balik sesuai keinginan lo!<br>- Penggunaan ulang, dapat dicuci dan digunakan lagi.<br><br>Petunjuk Perawatan Masker:<br><br>- Cuci sebelum digunakan dengan air hangat tanpa pemutih.<br>- Jemur jangan terkena matahari langsung.<br>- Ganti masker setelah penggunaan maksimal 1 hari.<br><br>STAYSAFE, STAYHYGIENE, STAYHOOPS.</p>', 50000, 18, '0.10', 'masker_fullprint_2_layer-11052020.jpg', 10, 1, '2020-11-23 10:18:53'),
(137, 13, 'Son Of Adam T shirt Long Sleeve', '<p>Alkahfee Son Of Adam T-shirt (Long Sleeve)<br>---<br>Material : Cotton Combed 30s<br>Semi Longline Style<br>Plastisol Ink<br>---<br>Size Guide :<br>S : L 48 x PD 72 x PB 75<br>M : L 49 x PD 77 x PB 80<br>L : L 51 x PD 78 x PB 81<br>XL : L 53 x PD 80 x PB 83<br>XXL : L 55 x PD 83 x PB 86<br><br>(L = Lebar, PD = Panjang Depan, PB = Panjang Belakang)<br>---<br>Info & Order :<br>Whatsapp : 087839887282<br>Instagram : @alkahfee.id<br><br>#kaoskeren #kaoskurta #kaosmuslim #kaosdistro #kaos #apparel #longlinetshirt #moslem #alkahfeeid #moslemapparel #kaosmuslim #gentleman #ikhwanoutfit #ikhwan</p>', 100000, 120, '0.30', 'son_of_adam_t-shirt_long_sleeve-11052020.jpg', 30, 1, '2020-11-23 10:18:58'),
(138, 11, 'Frozen Chicken Egg Roll', '<p>Frozen Food series dari DELIKI by Bali Indah Catering (BIC) Group, Chicken Egg Roll terbuat dari 100?GING AYAM MURNI. Tanpa tambahan MSG, pewarna dan pengawet. Cocok untuk stock camilan lezat ataupun sebagai lauk praktis di rumah. Diproduksi secara higienis menggunakan kemasan vacuum packed. 1 pak terdiri dari 2 lonjor (10 pcs).<br><br>Produk frozen food sangat disarankan menggunakan pengiriman metode instant kurir.<br><br>DELIKI - Delicious Kitchen.<br>HALAL. No added MSG. No preservaties. All natural.<br>Jl. Cipinang Muara Raya no. 47A<br>Jakarta Timur<br>021-819.5.185<br>WA 0812.9110.8336<br>ig : @deliki.id</p>', 15000, 180, '0.40', 'frozen_chicken_egg_roll-11052020.jpg', 0, 1, '2020-11-23 10:19:07'),
(139, 12, 'Bubuk Minuman Kemasan 1 Kg', '<p>Bubuk minuman yg cocok untuk ice blend, milk shake, capcin, dll ^_^<br><br>Spesifikasi Produk :<br>* Berat Bubuk 1kg<br>* Kemasan Aluminium Foil Full<br>* Bubuk sudah Mix dengan Gula<br>* Cocok untuk campuran perasa susu murni, minuman bubble drinks, ice blended, dll.<br><br>Saran Saji Ice Blended / Bubble Drink :<br>Cup 12oz / 14 oz (bisa jadi 33-40 Cup)<br>25-30 gram bubuk mix<br>1-2 sdm gula (optional)<br>Es batu 1 cup 12oz / 14 oz<br>150 ml air matang<br><br>Saran Saji Milkshake :<br>Cup 12oz / 14 oz (bisa jadi 33-40 Cup)<br>25-30 gram bubuk mix<br>Es batu 1 cup 12oz / 14oz<br>100 ml susu cair<br><br>Klik gambarnya untuk informasi varian rasa lainnya ^_^</p>', 30000, 28, '1.10', 'bubuk_minuman_kemasan_1kg-11052020.jpg', 0, 1, '2020-11-23 10:19:13'),
(142, 12, 'Gila Coklatz Salatiga', '<p>Gila Coklat Salatiga</p><p>Kini Gila Coklat hadir dengan berbagai varian rasa, Gila Coklat Salatiga bertempat di Ada Baru Pasar Raya. Ayo buruan rasakan nikmatnya gila coklat Salatiga!</p>', 10000, 120, '0.20', 'gila_coklat-11262020.jpg', 0, 1, '2020-11-26 10:35:29'),
(147, 13, 'Masker Bigetron', '<p><strong>BTR </strong>MASK 2020<br>.<br>Masker full print dengan tambahan optional head clip dibelakang. Nyaman dipakai. Cocok untuk semua kalangan.<br>Material: Polyester + Cotton Lining (2 ply)</p>', 40000, 200, '0.10', 'masker_bigetron-01262021.jpg', 0, 1, '2021-01-26 07:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `img_user` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email`, `img_user`, `password`, `is_active`, `tanggal_user`) VALUES
(1, 'Aryanata Andipradana', 'admin@admin.com', 'aryanata_andipradana-1.png', '$2y$10$39LAIf0n55Mvq8qwPfL66O0HDSL0iCzMV7Nxw2tpjxoPBXwuGZdxq', 1, 1606290093),
(2, 'Masan Abdi', 'masan.abdi@gmail.com', 'masan_abdi-2.jpg', '$2y$10$Tunf1mOMmpbowna8yZJr6OddFzdXuHSvgRSyQA9lo81UAbi5fjUte', 1, 1606351915),
(3, 'Zufarozy Andi', 'zufa@gmail.com', 'default.png', '$2y$10$RSipNWC.wQvewwAZS88kkubZKdqyo/r3K4n9AlnWSghYK7a698AOm', 1, 1607861801);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
