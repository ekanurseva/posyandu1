<?php
require_once 'mainController.php';

function create($data)
{
    global $conn;

    $id_balita = htmlspecialchars($data['id_balita']);
    $idjadwal = htmlspecialchars($data['idjadwal']);
    $jenis_vitamin = htmlspecialchars($data['jenis_vitamin']);

    if ($id_balita == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Data balita tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($idjadwal == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jadwal tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($jenis_vitamin == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis vitamin tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    mysqli_query($conn, "INSERT INTO vitamin VALUES (NULL, '$id_balita', '$idjadwal', '$jenis_vitamin')");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $id_vitamin = htmlspecialchars($data['id_vitamin']);
    $idjadwal = htmlspecialchars($data['idjadwal']);
    $jenis_vitamin = htmlspecialchars($data['jenis_vitamin']);

    if ($idjadwal == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jadwal tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($jenis_vitamin == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis vitamin tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    $query = "UPDATE vitamin SET 
            idjadwal = '$idjadwal',
            jenis_vitamin = '$jenis_vitamin'
        WHERE id_vitamin = $id_vitamin
        ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM vitamin WHERE id_vitamin = $id");

    $response = mysqli_affected_rows($conn);

    if ($response > 0) {
        $deleted = true;
    } else {
        $deleted = false;
    }

    return $deleted;
}

// Mengecek apakah ada permintaan penghapusan data
if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    // Mengambil nilai parameter id dari data POST
    $id = $_POST['id'];

    // Memanggil fungsi delete untuk menghapus data
    $status = delete($id);

    // Mengirimkan respons ke JavaScript
    if ($status) {
        echo 'success';
    } else {
        echo 'error';
    }
}

$vitamin_array = ["Vitamin A",];

function cari_vitamin($data)
{
    $dari = $data['dari'];
    $sampai = date('Y-m-d H:i:s', strtotime($data['sampai'] . ' 23:59:59')); // Menggunakan akhir hari untuk mengatasi seluruh hari

    // Ubah query untuk mengambil data vitamin berdasarkan rentang tanggal
    $vitamin = query("SELECT * FROM vitamin 
                          WHERE idjadwal IN (SELECT idjadwal FROM jdw_posyandu WHERE jadwal BETWEEN '$dari' AND '$sampai')");


    return $vitamin; // Mengembalikan array yang berisi data vitamin
}

function cari_vitamin_berdasarkan_bulan_dan_tahun($bulan, $tahun)
{
    // Query untuk mendapatkan data vitamin berdasarkan bulan dan tahun
    $vitamin = query("SELECT * FROM vitamin WHERE idjadwal IN 
                         (SELECT idjadwal FROM jdw_posyandu 
                         WHERE MONTH(jadwal) = '$bulan' AND YEAR(jadwal) = '$tahun')");

    return $vitamin;
}
?>