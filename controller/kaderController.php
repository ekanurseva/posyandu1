<?php 
    require_once '../controller/mainController.php';

    function create($data) {
        global $conn;

        $id_posyandu = $data['id_posyandu'];
        $id_user = $data['id_user'];

        if($id_posyandu == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Posyandu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($id_user == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Kader tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        mysqli_query($conn, "INSERT INTO kader VALUES (NULL, '$id_posyandu', '$id_user')");

        return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM kader WHERE id_kader = $id");

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