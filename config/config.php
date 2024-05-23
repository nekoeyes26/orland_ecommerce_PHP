<?php
    class database{
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "orland_db";
        public $koneksi = "";
        public function __construct()
        {
            $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal : " . mysqli_connect_error();
            }
        }
        function tambah_data_produk($nama_produk,$kode_kategori,$detail_produk,$harga_diskon_produk,$harga_asli_produk,$stok_produk,$gambar_produk1,$gambar_produk2,$gambar_produk3){
            mysqli_query($this->koneksi, "INSERT INTO produk VALUES ('', '$nama_produk','$kode_kategori', '$detail_produk',
                                          '$harga_diskon_produk','$harga_asli_produk','$stok_produk','$gambar_produk1', '$gambar_produk2', '$gambar_produk3')");
        }
        function tampil_produk_terbaru(){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk ORDER BY id_produk DESC LIMIT 8");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function ambil_data_kategori(){
            $data_kategori = mysqli_query($this->koneksi,"SELECT * FROM kategori_produk");
            while($row_data_kategori = mysqli_fetch_array($data_kategori)){
                $hasil_data_kategori[] = $row_data_kategori;
            }
            return $hasil_data_kategori;
        }
        function login($email, $password){
            $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE email ='$email' && password = '$password'");
            if (mysqli_num_rows($data) == 0) {
                $hasil = [];
                header('location:login.php');
            } else {
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function cek_login($email){
            $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE email ='$email'");
            if (mysqli_num_rows($data) == 0) {
                $hasil = [];
            } else {
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tambah_user($username,$email,$password){
            mysqli_query($this->koneksi, "INSERT INTO user VALUES ('', '$username', '$email', '$password', '2', '2')");
            mysqli_query($this->koneksi, "INSERT INTO detail_user VALUES ('', '', '', '', '', '$email')");
        }
        function data_produk($id_produk){
            $data_produk = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM produk a
                                                         INNER JOIN kategori_produk b ON b.kode_kategori = a.kode_kategori
                                                         WHERE a.id_produk ='$id_produk'");
            while ($row_produk = mysqli_fetch_assoc($data_produk)) {
                $hasil_produk[] = $row_produk;
            }
            return $hasil_produk;
        }
        function cek_user_tidak_ada($email){
            $result = mysqli_query($this->koneksi, "SELECT * FROM user WHERE email = '$email'");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function data_user($email){
            $data_user = mysqli_query($this->koneksi, "SELECT * FROM user
                                                        LEFT JOIN detail_user ON user.email = detail_user.email
                                                        LEFT JOIN jenis_kelamin ON jenis_kelamin.kode_jk = detail_user.jenis_kelamin
                                                        WHERE user.email ='$email'");
            while ($row_user = mysqli_fetch_assoc($data_user)) {
                $hasil_user[] = $row_user;
            }
            return $hasil_user;
        }
        function tampil_data_jenis_kelamin(){
            $data_jenis_kelamin = mysqli_query($this->koneksi,"SELECT * FROM jenis_kelamin");
            while($row_jenis_kelamin = mysqli_fetch_array($data_jenis_kelamin)){
                $hasil_jenis_kelamin[] = $row_jenis_kelamin;
            }
            return $hasil_jenis_kelamin;
        }
        function update_profil($username,$nama_lengkap,$jenis_kelamin,$no_telp,$alamat,$email){
            mysqli_query($this->koneksi, "UPDATE user SET username = '$username' WHERE email = '$email'");
            mysqli_query($this->koneksi, "UPDATE detail_user SET nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin',
                                            no_telp = '$no_telp', alamat = '$alamat' WHERE email = '$email'");
        }
        function update_password($password,$email){
            mysqli_query($this->koneksi, "UPDATE user SET password = '$password' WHERE email = '$email'");
        }
        function tampil_produk(){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk ORDER BY id_produk DESC");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function tampil_produk_9($mulai, $halaman){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk ORDER BY id_produk DESC LIMIT $mulai, $halaman");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function tampil_wishlist($email){
            $data = mysqli_query($this->koneksi,"SELECT * FROM wishlist
                                                LEFT JOIN produk ON wishlist.id_produk = produk.id_produk
                                                WHERE wishlist.email = '$email'");
            if(mysqli_num_rows($data) == 0){
                $hasil = [];
            }
            else{
                while($row = mysqli_fetch_array($data)){
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tambah_wishlist($email, $id_produk){
            mysqli_query($this->koneksi, "INSERT INTO wishlist VALUES ('', '$email', '$id_produk')");
        }
        function cek_wishlist_tidak_ada($email, $id_produk){
            $result = mysqli_query($this->koneksi, "SELECT * FROM wishlist WHERE email = '$email' AND id_produk = '$id_produk'");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tampil_keranjang($email){
            $data = mysqli_query($this->koneksi,"SELECT * FROM keranjang
                                                LEFT JOIN produk ON keranjang.id_produk = produk.id_produk
                                                WHERE keranjang.email = '$email'");
            if(mysqli_num_rows($data) == 0){
                $hasil = [];
            }
            else{
                while($row = mysqli_fetch_array($data)){
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function total_keranjang($email){
            $data = mysqli_query($this->koneksi,"SELECT * FROM keranjang
                                                RIGHT JOIN produk ON keranjang.id_produk = produk.id_produk
                                                WHERE keranjang.email = '$email'");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function tampil_cari_produk($cari){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk WHERE nama_produk LIKE '%$cari%'");
            if(mysqli_num_rows($data) == 0){
                $hasil = [];
            }
            else{
                while($row = mysqli_fetch_array($data)){
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tampil_cari_produk_9($cari,$mulai, $halaman){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk WHERE nama_produk LIKE '%$cari%' LIMIT $mulai, $halaman");
            if(mysqli_num_rows($data) == 0){
                $hasil = [];
            }
            else{
                while($row = mysqli_fetch_array($data)){
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tambah_keranjang($email, $id_produk, $jumlah){
            mysqli_query($this->koneksi, "INSERT INTO keranjang VALUES ('', '$email', '$id_produk', '$jumlah')");
        }
        function cek_keranjang_tidak_ada($email, $id_produk){
            $result = mysqli_query($this->koneksi, "SELECT * FROM keranjang WHERE email = '$email' AND id_produk = '$id_produk'");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function update_jumlah_di_keranjang($email,$id_produk,$jumlah){
            mysqli_query($this->koneksi, "UPDATE keranjang SET jumlah = '$jumlah' WHERE email = '$email' AND id_produk = '$id_produk'");
        }
        function delete_keranjang($email,$id_produk){
            mysqli_query($this->koneksi, "DELETE FROM keranjang WHERE email = '$email' AND id_produk = '$id_produk'");
        }
        function update_produk_tanpa_gambar($id_produk,$nama_produk,$kode_kategori,$detail_produk,$harga_diskon_produk,$harga_asli_produk,$stok_produk){
            mysqli_query($this->koneksi, "UPDATE produk SET nama_produk = '$nama_produk', kode_kategori = '$kode_kategori', detail_produk = '$detail_produk',
                                        harga_diskon_produk = '$harga_diskon_produk', harga_asli_produk = '$harga_asli_produk',
                                        stok_produk = '$stok_produk' WHERE id_produk = '$id_produk'");
        }
        function update_produk_gambar1($id_produk,$gambar_produk1){
            mysqli_query($this->koneksi, "UPDATE produk SET gambar_produk1 = '$gambar_produk1' WHERE id_produk = '$id_produk'");
        }
        function update_produk_gambar2($id_produk,$gambar_produk2){
            mysqli_query($this->koneksi, "UPDATE produk SET gambar_produk2 = '$gambar_produk2' WHERE id_produk = '$id_produk'");
        }
        function update_produk_gambar3($id_produk,$gambar_produk3){
            mysqli_query($this->koneksi, "UPDATE produk SET gambar_produk3 = '$gambar_produk3' WHERE id_produk = '$id_produk'");
        }
        function ambil_kode_kategori($nama_kategori){
            $data = mysqli_query($this->koneksi,"SELECT kode_kategori FROM kategori_produk WHERE nama_kategori = '$nama_kategori'");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function ambil_gambar_produk_lama($id_produk){
            $data = mysqli_query($this->koneksi,"SELECT gambar_produk1,gambar_produk2,gambar_produk3 FROM produk WHERE id_produk = '$id_produk'");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
        function ambil_produk_by_kategori($kode_kategori){
            $result = mysqli_query($this->koneksi, "SELECT * FROM produk WHERE kode_kategori = '$kode_kategori' ORDER BY id_produk DESC");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function ambil_produk_by_kategori_9($kode_kategori,$mulai, $halaman){
            $result = mysqli_query($this->koneksi, "SELECT * FROM produk WHERE kode_kategori = '$kode_kategori' ORDER BY id_produk DESC LIMIT $mulai, $halaman");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function delete_wishlist($email,$id_produk){
            mysqli_query($this->koneksi, "DELETE FROM wishlist WHERE email = '$email' AND id_produk = '$id_produk'");
        }
        function delete_produk($id_produk){
            mysqli_query($this->koneksi, "DELETE FROM produk WHERE id_produk = '$id_produk'");
        }
        function insert_datetime($date, $datetime){
            mysqli_query($this->koneksi, "INSERT INTO tes_tanggal VALUES ('', '$date', '$datetime')");
        }
        function insert_checkout($email,$jumlah,$harga_checkout,$ongkir,$kurir,$tujuan){
            mysqli_query($this->koneksi, "INSERT INTO checkout VALUES ('', '$email', '$jumlah', '$harga_checkout', '$ongkir', '$kurir', '$tujuan')");
        }
        function cek_checkout_tidak_ada($email){
            $result = mysqli_query($this->koneksi, "SELECT * FROM checkout WHERE email = '$email'");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function update_checkout($email,$jumlah,$harga_checkout,$ongkir,$kurir,$tujuan){
            mysqli_query($this->koneksi, "UPDATE checkout SET jumlah_item = '$jumlah', harga_checkout = '$harga_checkout',
                                        ongkir = '$ongkir', kurir = '$kurir', tujuan = '$tujuan' WHERE email = '$email'");
        }
        function tampil_data_checkout($email){
            $data = mysqli_query($this->koneksi,"SELECT * FROM checkout WHERE email = '$email'");
            if(mysqli_num_rows($data) == 0){
                $hasil = [];
            }
            else{
                while($row = mysqli_fetch_array($data)){
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function cek_voucher($voucher){
            $result = mysqli_query($this->koneksi, "SELECT * FROM voucher WHERE kode_voucher = '$voucher'");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function insert_pembelian($email,$jumlah_item,$harga_pembelian,$tanggal_pembelian,$ongkir,$kurir,$tujuan,$nama_penerima,$no_telp_penerima,$email_penerima){
            mysqli_query($this->koneksi, "INSERT INTO pembelian VALUES ('', '$email', '$jumlah_item', '$harga_pembelian',
                                        '$tanggal_pembelian', '$ongkir', '$kurir', '$tujuan', '$nama_penerima', '$no_telp_penerima',
                                        '$email_penerima')");
        }
        function insert_detail_pembelian($email,$id_pembelian,$id_produk,$jumlah_dibeli){
            mysqli_query($this->koneksi, "INSERT INTO detail_pembelian VALUES ('$email', '$id_pembelian', '$id_produk', '$jumlah_dibeli')");
        }
        function tampil_data_pembelian($email){
            $result = mysqli_query($this->koneksi, "SELECT * FROM pembelian WHERE email = '$email' ORDER BY id_pembelian DESC");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function delete_checkout($email){
            mysqli_query($this->koneksi, "DELETE FROM checkout WHERE email = '$email'");
        }
        function kosongkan_keranjang($email){
            mysqli_query($this->koneksi, "DELETE FROM keranjang WHERE email = '$email'");
        }
        function tampil_detail_pembelian($email, $id_pembelian){
            $result = mysqli_query($this->koneksi, "SELECT * FROM detail_pembelian
                                                    LEFT JOIN produk ON detail_pembelian.id_produk = produk.id_produk
                                                    WHERE detail_pembelian.email = '$email' AND detail_pembelian.id_pembelian = '$id_pembelian'
                                                    ORDER BY detail_pembelian.id_pembelian DESC");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tampil_produk_mouse(){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk WHERE kode_kategori = '1' ORDER BY harga_asli_produk DESC LIMIT 8");
            if(mysqli_num_rows($data) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tampil_produk_keyboard(){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk WHERE kode_kategori = '2' ORDER BY harga_asli_produk DESC LIMIT 8");
            if(mysqli_num_rows($data) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function ambil_data_banner(){
            $data = mysqli_query($this->koneksi,"SELECT * FROM banner LIMIT 2");
            if(mysqli_num_rows($data) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function update_banner_tanpa_gambar($id_banner,$judul,$keterangan,$link_terkait){
            mysqli_query($this->koneksi, "UPDATE banner SET judul = '$judul', keterangan = '$keterangan',
                                        link_terkait = '$link_terkait' WHERE id_banner = '$id_banner'");
        }
        function update_gambar_banner($id_banner,$gambar){
            mysqli_query($this->koneksi, "UPDATE banner SET gambar = '$gambar' WHERE id_banner = '$id_banner'");
        }
        function update_stock($id_produk,$stok_produk){
            mysqli_query($this->koneksi, "UPDATE produk SET stok_produk = '$stok_produk' WHERE id_produk = '$id_produk'");
        }
        function ambil_data_per_produk($id_produk){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk WHERE id_produk = '$id_produk'");
            if(mysqli_num_rows($data) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function delete_1_produk_keranjang($email, $id_produk){
            mysqli_query($this->koneksi, "DELETE FROM keranjang WHERE email = '$email' AND id_produk = '$id_produk'");
        }
        function tampil_produk_random(){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk ORDER BY RAND() LIMIT 9");
            if(mysqli_num_rows($data) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tampil_produk_random_by_kategori($kode_kategori){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk WHERE kode_kategori = '$kode_kategori' ORDER BY RAND() LIMIT 9");
            if(mysqli_num_rows($data) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tampil_produk_by_id($id_produk){
            $data = mysqli_query($this->koneksi,"SELECT * FROM produk WHERE id_produk = '$id_produk'");
            if(mysqli_num_rows($data) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($data)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tambah_akun($username,$email,$password,$akses_id){
            mysqli_query($this->koneksi, "INSERT INTO user VALUES ('', '$username', '$email', '$password', '$akses_id', '$akses_id')");
            mysqli_query($this->koneksi, "INSERT INTO detail_user VALUES ('', '', '', '', '', '$email')");
        }
        function tampil_semua_pembelian(){
            $result = mysqli_query($this->koneksi, "SELECT * FROM pembelian ORDER BY id_pembelian DESC");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
        function tampil_riwayat_pembelian_per_user($email){
            $result = mysqli_query($this->koneksi, "SELECT * FROM detail_pembelian
                                                    LEFT JOIN pembelian ON detail_pembelian.id_pembelian = pembelian.id_pembelian
                                                    LEFT JOIN produk ON detail_pembelian.id_produk = produk.id_produk
                                                    WHERE detail_pembelian.email = '$email'
                                                    ORDER BY detail_pembelian.id_pembelian DESC");
            if(mysqli_num_rows($result) == 0) {
                // row not found, do stuff...
                $hasil = [];
            } else {
                // do other stuff...
                while ($row = mysqli_fetch_array($result)) {
                    $hasil[] = $row;
                }
            }
            return $hasil;
        }
    }
?>