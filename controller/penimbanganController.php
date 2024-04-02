<?php
require_once 'mainController.php';

function status_gizi($idbalita, $berat_badan) {
    $data = query("SELECT * FROM balita WHERE id_balita = '$idbalita'")[0];
    $umur = cari_bulan($data['tanggal_lahir']);
    $jk = $data['jenis_kelamin'];
    $hasil = "Unknow";

    $data_status = query("SELECT * FROM status_gizi WHERE umur = '$umur' AND jk = '$jk'");

    if(count($data_status) != 0) {
        foreach($data_status as $status) {
            if($berat_badan >= $status['batas_bawah'] && $berat_badan <= ($status['batas_atas'] + 0.1)) {
                $hasil = $status['keterangan'];
            }
        }
    }

    return $hasil;
}

function create($data)
{
    global $conn;

    $id_balita = htmlspecialchars($data['id_balita']);
    $idjadwal = htmlspecialchars($data['idjadwal']);
    $berat_badan = htmlspecialchars($data['berat_badan']);
    $tinggi_badan = htmlspecialchars($data['tinggi_badan']);
    $status_gizi = status_gizi($id_balita, $berat_badan);
    $lila = htmlspecialchars($data['lila']);
    $lika = htmlspecialchars($data['lika']);

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

    if ($berat_badan == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Berat badan tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($tinggi_badan == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tinggi badan tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($lila == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'LILA tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($lika == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'LIKA tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    mysqli_query($conn, "INSERT INTO penimbangan VALUES (NULL, '$id_balita', '$idjadwal', '$berat_badan', '$tinggi_badan', '$status_gizi', '$lila', '$lika')");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $id_balita = $data['id_balita'];
    $id_timbang = htmlspecialchars($data['id_timbang']);
    $idjadwal = htmlspecialchars($data['idjadwal']);
    $berat_badan = htmlspecialchars($data['berat_badan']);
    $tinggi_badan = htmlspecialchars($data['tinggi_badan']);
    $status_gizi = status_gizi($id_balita, $berat_badan);
    $lila = htmlspecialchars($data['lila']);
    $lika = htmlspecialchars($data['lika']);

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

    if ($berat_badan == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Berat badan tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($tinggi_badan == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tinggi badan tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($lila == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'LILA tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    if ($lika == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'LIKA tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    $query = "UPDATE penimbangan SET 
            idjadwal = '$idjadwal',
            berat_badan = '$berat_badan',
            tinggi_badan = '$tinggi_badan',
            status_gizi = '$status_gizi',
            lila = '$lila',
            lika = '$lika'
        WHERE id_timbang = $id_timbang
        ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM penimbangan WHERE id_timbang = $id");

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

function cari_penimbangan($data)
{
    $dari = $data['dari'];
    $sampai = date('Y-m-d H:i:s', strtotime($data['sampai'] . ' 23:59:59')); // Menggunakan akhir hari untuk mengatasi seluruh hari

    // Ubah query untuk mengambil data penimbangan berdasarkan rentang tanggal
    $penimbangan = query("SELECT * FROM penimbangan 
                          WHERE idjadwal IN (SELECT idjadwal FROM jdw_posyandu WHERE jadwal BETWEEN '$dari' AND '$sampai')");

    return $penimbangan; // Mengembalikan array yang berisi data penimbangan
}

function cari_penimbangan_berdasarkan_bulan_dan_tahun($bulan, $tahun)
{
    // Query untuk mendapatkan data penimbangan berdasarkan bulan dan tahun
    $penimbangan = query("SELECT * FROM penimbangan WHERE idjadwal IN 
                         (SELECT idjadwal FROM jdw_posyandu 
                         WHERE MONTH(jadwal) = '$bulan' AND YEAR(jadwal) = '$tahun')");

    return $penimbangan;
}


?>