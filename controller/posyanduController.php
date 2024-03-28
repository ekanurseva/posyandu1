<?php 
    require_once '../controller/mainController.php';

    function create($data) {
        global $conn;

        $nama_posyandu = htmlspecialchars($data['nama_posyandu']);
        $alamat_posyandu = htmlspecialchars($data['alamat_posyandu']);

        if($nama_posyandu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama posyandu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } else {
            $result = mysqli_query($conn, "SELECT nama_posyandu FROM posyandu WHERE nama_posyandu = '$nama_posyandu'") or die(mysqli_error($conn));
            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Nama posyandu sudah ada, silahkan pakai nama lain',
                                'error'
                            )
                        </script>";
                exit();
            }
        }

        if($alamat_posyandu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Alamat posyandu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        mysqli_query($conn, "INSERT INTO posyandu VALUES (NULL, '$nama_posyandu', '$alamat_posyandu')");

        return mysqli_affected_rows($conn);
    }

    function update($data) {
        global $conn;
        $id = $data['id_posyandu'];
        $oldnama = $data['oldnama'];

        $nama_posyandu = htmlspecialchars($data['nama_posyandu']);
        $alamat_posyandu = htmlspecialchars($data['alamat_posyandu']);

        if($nama_posyandu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama posyandu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif($nama_posyandu != $oldnama) {

            $result = mysqli_query($conn, "SELECT nama_posyandu FROM posyandu WHERE nama_posyandu = '$nama_posyandu'") or die(mysqli_error($conn));
            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Nama posyandu sudah ada, silahkan pakai nama lain',
                                'error'
                            )
                        </script>";
                exit();
            }
        }

        if($alamat_posyandu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Alamat posyandu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "UPDATE posyandu SET 
            nama_posyandu = '$nama_posyandu',
            alamat_posyandu = '$alamat_posyandu'
        WHERE id_posyandu = $id
        ";
        mysqli_query($conn, $query);


        return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM posyandu WHERE id_posyandu = $id");

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