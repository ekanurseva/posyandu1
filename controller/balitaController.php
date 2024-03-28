<?php 
    require_once 'mainController.php';

    function create($data) {
        global $conn;

        $id_user = htmlspecialchars($data['id_user']);
        $idposyandu = htmlspecialchars($data['idposyandu']);
        $nama_ayah = htmlspecialchars($data['nama_ayah']);
        $nama_balita = htmlspecialchars($data['nama_balita']);
        $nik_balita = htmlspecialchars($data['nik_balita']);
        $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
        $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);

        if($id_user == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama ibu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($idposyandu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Posyandu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($nama_ayah == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama ayah tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($nama_balita == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama balita tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($nik_balita == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'NIK balita tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($tempat_lahir == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tempat lahir tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($tanggal_lahir == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tanggal lahir tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($jenis_kelamin == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis kelamin tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $waktu_convert = strtotime($tanggal_lahir);
        $jadwal = date('Y-m-d H:i:s', $waktu_convert);

        mysqli_query($conn, "INSERT INTO balita VALUES (NULL, '$id_user', '$idposyandu', '$nama_ayah', '$nama_balita', '$nik_balita', '$tempat_lahir', '$jadwal', '$jenis_kelamin')");

        return mysqli_affected_rows($conn);
    }

    function update($data) {
        global $conn;
        
        $id_balita = $data['id_balita'];
        $id_user = htmlspecialchars($data['id_user']);
        $idposyandu = htmlspecialchars($data['idposyandu']);
        $nama_ayah = htmlspecialchars($data['nama_ayah']);
        $nama_balita = htmlspecialchars($data['nama_balita']);
        $nik_balita = htmlspecialchars($data['nik_balita']);
        $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
        $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
        $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);

        if($id_user == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama ibu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($idposyandu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Posyandu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($nama_ayah == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama ayah tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($nama_balita == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama balita tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($nik_balita == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'NIK balita tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($tempat_lahir == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tempat lahir tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($tanggal_lahir == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tanggal lahir tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($jenis_kelamin == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Jenis kelamin tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $waktu_convert = strtotime($tanggal_lahir);
        $jadwal = date('Y-m-d H:i:s', $waktu_convert);

        $query = "UPDATE balita SET             
                id_user = '$id_user',
                idposyandu = '$idposyandu',
                nama_ayah = '$nama_ayah',
                nama_balita = '$nama_balita',
                nik_balita = '$nik_balita',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$jadwal',
                jenis_kelamin = '$jenis_kelamin'
              WHERE id_balita = $id_balita
            ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM balita WHERE id_balita = $id");

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