<?php
session_start();
require_once 'controller/userController.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Posyandu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Posyandu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../posyandu">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../posyandu/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../posyandu/#contact">Contact</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="content">
        <div class="row d-flex align-items-center" style="padding: 50px 100px; margin-top: 20px;">
            <h4 class="m-0 text-center p-2" style="border: solid black; background: rgb(80, 197, 252);">
                PENDAFTARAN AKUN IBU
            </h4>
            <div class="box">
                <div class="row d-flex align-items-center px-5">
                    <div class="col-6">
                        <img src="image/img3.png" alt="">
                    </div>
                    <div class="col-6">
                        <form action="" method="post">
                            <input type="hidden" name="role" value="ortu">
                            <div class="mb-2 row">
                                <label for="username" class="col-sm-5 me-0 col-form-label">Username</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control"
                                        style="border: 1px solid black; font-size: 15px;" id="username"
                                        placeholder="Masukkan Username" name="username">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputPassword" class="col-sm-5 me-0 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control"
                                        style="border: 1px solid black; font-size: 15px;" id="inputPassword"
                                        placeholder="Masukkan Password" name="password">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputPassword2" class="col-sm-5 me-0 col-form-label">Konfirmasi
                                    Password</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control"
                                        style="border: 1px solid black; font-size: 15px;" id="inputPassword2"
                                        placeholder="Masukkan Konfirmasi Password" name="password2">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="inputnamapengguna" class="col-sm-5 me-0 col-form-label">Nama Ibu</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control"
                                        style="border: 1px solid black; font-size: 15px;" id="inputnamapengguna"
                                        placeholder="Masukkan Nama Pengguna" name="nama">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="alamat" class="col-sm-5 me-0 col-form-label">Alamat</label>
                                <div class="col-sm-7">
                                    <textarea type="text" style="border-color: black;" class="form-control" id="alamat"
                                        placeholder="Masukkan Alamat Pengguna" rows="3" name="alamat"></textarea>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="hp" class="col-sm-5 me-0 me-0 col-form-label">No HP</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control"
                                        style="border: 1px solid black; font-size: 15px;" id="hp"
                                        placeholder="Masukkan Nomor Handphone" name="noTelp">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success" type="submit" name="submit">SUBMIT</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    if (register($_POST) > 0) {
        $_SESSION["berhasil"] = "Registrasi Berhasil!";
        echo "
            <script>
              document.location.href='index.php';
            </script>
        ";
    } else {
        echo "
          <script>
              Swal.fire(
                'Gagal!',
                'Registrasi Gagal!',
                'error'
            )
          </script>
      ";
    }
}
?>