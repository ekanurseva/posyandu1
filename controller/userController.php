<?php 
    require_once 'mainController.php';

    function register($data) {
        global $conn;

        $nama = htmlspecialchars($data['nama']);
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $nama = htmlspecialchars($data['nama']);
        $alamat = htmlspecialchars($data['alamat']);
        $noTelp = htmlspecialchars($data['noTelp']);
        $role = htmlspecialchars($data['role']);

        if($username == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Username tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } else {
            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Username sudah digunakan, silahkan pakai username lain',
                                'error'
                            )
                        </script>";
                exit();
            }
        }


        if($password == "" || $password2 == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Password dan konfirmasi password tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif ($password !== $password2) {
            echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Password tidak sesuai',
                            'error'
                        )
                    </script>";
            exit();
        }

        if($nama == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama ibu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }
        
        if($alamat == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Alamat tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($noTelp == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'No HP tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($role == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Role tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }
        $password = password_hash($password2, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$username', '$password', '$nama', '$alamat', '$noTelp', '$role')");

        return mysqli_affected_rows($conn);
    }

    function login($data) {
        global $conn;

        $username = $data["username"];
        $password = $data["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                $enkripsi = enkripsi($row['id_user']);

                setcookie('posyandu', $enkripsi, time() + 10800);

                $data = query("SELECT role FROM user WHERE username = '$username'")[0];

                if($data['role'] == "ortu")  {
                    echo "<script>
                            document.location.href='ortu';
                        </script>";
                    exit;
                } elseif($data['role'] == "kader")  {
                    echo "<script>
                            document.location.href='admin';
                        </script>";
                    exit;
                }
            }
        }

        $error = true;

        return $error;
    }

    function update($data) {
        global $conn;
        $id = $data['id_user'];
        $oldusername = $data['oldusername'];
        $oldpassword = $data['oldpassword'];

        $nama = htmlspecialchars($data['nama']);
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $nama = htmlspecialchars($data['nama']);
        $alamat = htmlspecialchars($data['alamat']);
        $noTelp = htmlspecialchars($data['noTelp']);
        $role = htmlspecialchars($data['role']);

        if($username == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Username tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif($username != $oldusername) {

            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Username sudah digunakan, silahkan pakai username lain',
                                'error'
                            )
                        </script>";
                exit();
            }
        }


        if($password == "" || $password2 == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Password dan konfirmasi password tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif ($password != $oldpassword || $password2 != $oldpassword) {
            if($password !== $password2) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Password tidak sesuai',
                                'error'
                            )
                        </script>";
                exit();
            }

            $password = password_hash($password2, PASSWORD_DEFAULT);
        }

        if($nama == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nama ibu tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }
        
        if($alamat == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Alamat tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($noTelp == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'No HP tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($role == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Role tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "UPDATE user SET 
                username = '$username',
                password = '$password',
                nama = '$nama',
                alamat = '$alamat',
                noTelp = '$noTelp',
                role = '$role'
              WHERE id_user = $id
            ";
        mysqli_query($conn, $query);
    

        return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");

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