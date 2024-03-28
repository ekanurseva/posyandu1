<?php
require_once 'mainController.php';

function create($data)
{
    global $conn;

    $id_balita = htmlspecialchars($data['id_balita']);
    $idjadwal = htmlspecialchars($data['idjadwal']);
    $jenis_imunisasi = htmlspecialchars($data['jenis_imunisasi']);

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

    if ($jenis_imunisasi == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis imunisasi tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    mysqli_query($conn, "INSERT INTO imunisasi VALUES (NULL, '$id_balita', '$idjadwal', '$jenis_imunisasi')");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $id_imunisasi = htmlspecialchars($data['id_imunisasi']);
    $idjadwal = htmlspecialchars($data['idjadwal']);
    $jenis_imunisasi = htmlspecialchars($data['jenis_imunisasi']);

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

    if ($jenis_imunisasi == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis imunisasi tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    $query = "UPDATE imunisasi SET 
            idjadwal = '$idjadwal',
            jenis_imunisasi = '$jenis_imunisasi'
        WHERE id_imunisasi = $id_imunisasi
        ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM imunisasi WHERE id_imunisasi = $id");

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

$imunisasi_array = ["Bacillus Calmette-Guerin (BCG)", "Polio", "DPT (Difteri, Pertusis, Tetanus)", " HBO (Hepatitis BO)", "Campak"];

function cari_imunisasi($data)
{
    $dari = $data['dari'];
    $sampai = date('Y-m-d H:i:s', strtotime($data['sampai'] . ' 23:59:59')); // Menggunakan akhir hari untuk mengatasi seluruh hari

    // Ubah query untuk mengambil data imunisasi berdasarkan rentang tanggal
    $imunisasi = query("SELECT * FROM imunisasi 
                          WHERE idjadwal IN (SELECT idjadwal FROM jdw_posyandu WHERE jadwal BETWEEN '$dari' AND '$sampai')");

    return $imunisasi; // Mengembalikan array yang berisi data imunisasi
}
?>