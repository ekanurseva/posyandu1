<?php
require_once 'mainController.php';

function create($data)
{
    global $conn;

    $idjadwal = htmlspecialchars($data['idjadwal']);
    $jenis_pmt = htmlspecialchars($data['jenis_pmt']);

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

    if ($jenis_pmt == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis PMT tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    mysqli_query($conn, "INSERT INTO pmt VALUES (NULL, '$idjadwal', '$jenis_pmt')");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $idpmt = htmlspecialchars($data['idpmt']);
    $idjadwal = htmlspecialchars($data['idjadwal']);
    $jenis_pmt = htmlspecialchars($data['jenis_pmt']);

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

    if ($jenis_pmt == "") {
        echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis PMT tidak boleh kosong',
                        'error'
                    )
                  </script>";
        exit();
    }

    $query = "UPDATE pmt SET 
            idjadwal = '$idjadwal',
            jenis_pmt = '$jenis_pmt'
        WHERE idpmt = $idpmt
        ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pmt WHERE idpmt = $id");

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

$pmt_array = ["Telur", "Buras", "Puding Buah", "Bronis Kukus", "Susu", "Telur Puyuh", "Sosis", "Bubur Kacang"];
?>