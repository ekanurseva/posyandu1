<?php
setlocale(LC_TIME, 'id_ID');
date_default_timezone_set('Asia/Jakarta');
// koneksi ke database mysql
$conn = mysqli_connect("localhost", "root", "", "posyandu");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan error
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}

// Fungsi query fetch
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// Fungsi query fetch selesai

// Fungsi jumlah data dari query yang terbaca
function jumlah_data($data)
{
    global $conn;
    $query = mysqli_query($conn, $data);

    $jumlah_data = mysqli_num_rows($query);

    return $jumlah_data;
}
// Fungsi jumlah data selesai

// Fungsi generateRandomKey
function generateRandomKey()
{
    $keyLength = 32;
    $randomBytes = openssl_random_pseudo_bytes($keyLength, $strong);

    if (!$strong) {
        // Jika openssl_random_pseudo_bytes() tidak menghasilkan kunci yang kuat, Anda bisa menggunakan alternatif lain.
        $randomBytes = random_bytes($keyLength);
    }

    return base64_encode($randomBytes);
}
// Fungsi generateRandomKey selesai

// Fungsi enkripsi
function enkripsi($kata)
{
    $key = generateRandomKey();
    $string = openssl_encrypt($kata, 'AES-256-CBC', $key, 0, substr($key, 0, 16));
    $hasilEnkripsi = base64_encode($key . $string);

    return $hasilEnkripsi;
}
// Fungsi enkripsi selesai

// Fungsi dekripsi
function dekripsi($kata)
{
    $string = base64_decode($kata);
    $key = substr($string, 0, 44); // Panjang kunci enkripsi adalah 44 (dalam base64)
    $enkripsi = substr($string, 44);
    $hasil = openssl_decrypt($enkripsi, 'AES-256-CBC', $key, 0, substr($key, 0, 16));

    return $hasil;
}
// Fungsi dekripsi

function cari_user() {
    $id = dekripsi($_COOKIE['posyandu']);

    $user = query("SELECT * FROM user WHERE id_user = $id")[0];
    
    return $user;
}

// Fungsi validasi user
function validasi()
{
    global $conn;
    if (!isset($_COOKIE['posyandu'])) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['posyandu']);

    $cek = cari_user();

    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    } elseif ($cek['role'] == "kader") {
        echo "<script>
                document.location.href='../admin';
              </script>";
        exit;
    } elseif ($cek['role'] !== "ortu") {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}
// Fungsi validasi user selesai

// Fungsi validasi admin
function validasi_admin()
{
    global $conn;
    if (!isset($_COOKIE['posyandu'])) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['posyandu']);

    $cek = cari_user();

    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    } elseif ($cek['role'] == "ortu") {
        echo "<script>
                document.location.href='../ortu';
              </script>";
        exit;
    } elseif ($cek['role'] !== "kader") {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}
// Fungsi validasi admin selesai

function translate($kata) {
    $hari_inggris = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $hari_indo = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    $bulan_inggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $bulan_indo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $ganti_hari = str_replace($hari_inggris, $hari_indo, $kata);
    $ganti_bulan = str_replace($bulan_inggris, $bulan_indo, $ganti_hari);

    return $ganti_bulan;
}

function cari_tanggal($tanggal, $format) {
    $waktu_convert = strtotime($tanggal);
    $jadwal_convert = date($format, $waktu_convert);

    $jadwal = translate($jadwal_convert);

    return $jadwal;
}

function cari_bulan($tanggal) {
    $selisih_hari = strtotime('now') - strtotime($tanggal);
    $selisih_bulan = floor($selisih_hari / (60 * 60 * 24 * 30.44));

    return $selisih_bulan;
}

?>