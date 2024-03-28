<?php 
    require_once 'mainController.php';

    function create($data) {
        global $conn;

        $idposyandu = $data['idposyandu'];
        $tanggal = $data['tanggal'];
        $waktu = $data['waktu'];

        if($tanggal == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tanggal tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($waktu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Waktu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        setlocale(LC_TIME, 'id_ID');
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = time();
        $waktu_gabung = $tanggal . " " . $waktu;
        $waktu_convert = strtotime($waktu_gabung);

        if($sekarang > $waktu_convert) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tidak boleh memilih waktu yang sudah lewat',
                        'error'
                    )
                  </script>";
            exit();
        }

        $jadwal = date('Y-m-d H:i:s', $waktu_convert);

        mysqli_query($conn, "INSERT INTO jdw_posyandu VALUES (NULL, '$idposyandu', '$jadwal')");

        return mysqli_affected_rows($conn);
    }

    function update($data) {
        global $conn;

        $idjadwal = $data['idjadwal'];
        $tanggal = $data['tanggal'];
        $waktu = $data['waktu'];

        if($tanggal == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tanggal tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($waktu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Waktu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        setlocale(LC_TIME, 'id_ID');
        date_default_timezone_set('Asia/Jakarta');
        $sekarang = time();
        $waktu_gabung = $tanggal . " " . $waktu;
        $waktu_convert = strtotime($waktu_gabung);

        if($sekarang > $waktu_convert) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tidak boleh memilih waktu yang sudah lewat',
                        'error'
                    )
                  </script>";
            exit();
        }

        $jadwal = date('Y-m-d H:i:s', $waktu_convert);

        $query = "UPDATE jdw_posyandu SET 
            jadwal = '$jadwal'
        WHERE idjadwal = $idjadwal
        ";
        mysqli_query($conn, $query);


        return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM jdw_posyandu WHERE idjadwal = $id");

        $response = mysqli_affected_rows($conn);

        if($response > 0) {
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
?>