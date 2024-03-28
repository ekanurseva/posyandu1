<?php
session_start();
require_once 'controller/userController.php';

if (isset($_COOKIE['posyandu'])) {
    $user = cari_user();
    if ($user['role'] == "ortu") {
        echo "<script>
                    document.location.href='ortu';
                </script>";
        exit;
    } elseif ($user['role'] == "ortu") {
        echo "<script>
                    document.location.href='admin';
                </script>";
        exit;
    }
}

if (isset($_POST["submit_login"])) {
    if (login($_POST) == 1) {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Posyandu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary p-0">
        <div class="container-fluid justify-content-center p-3">
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
        </div>
    </nav>
    <div class="content">
        <div class="row d-flex align-items-center mx-5 mt-4" style="margin-bottom: 100px;">
            <div class="col-6 mt-4">
                <img src="image/img3.png" style="width: 92%;" alt="">
            </div>
            <div class="col-6 mt-4">
                <h4 class="m-0 text-center p-2 login" style="border: solid black; background: rgb(80, 197, 252);">LOGIN
                </h4>
                <div class="box">
                    <form action="" method="post">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                Username/Password Salah
                            </div>
                        <?php endif; ?>

                        <div class="mb-3 row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" placeholder="Masukkan Username"
                                    name="username">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password"
                                    placeholder="Masukkan Password" name="password">
                            </div>
                        </div>
                        <div class="mb-3" style="font-size: 15px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="show-password">
                                <label class="form-check-label" for="show-password">
                                    Show Password
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success" type="submit" name="submit_login">LOGIN</button>
                        </div>
                        <div class="text-center mt-3">
                            <span>Belum Punya Akun? <a href="pendaftaran.php"
                                    class="text-decoration-none">DAFTAR</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- about -->
        <div class="mx-5" id="about">
            <div class="text-center mb-3 mt-5">
                <h2 class="text-center head-about">About</h2>
            </div>
            <div class="fs-5" style="margin-bottom: 90px;">
                <p class="about" style="text-align : justify">
                    Posyandu adalah singkatan dari Pos Pelayanan Terpadu. Posyandu merupakan suatu program pelayanan
                    kesehatan yang dikelola oleh masyarakat di tingkat desa atau kelurahan. Program ini dirancang untuk
                    memberikan pelayanan kesehatan dasar, terutama pada ibu hamil, ibu menyusui, balita, dan anak-anak.
                    Posyandu bertujuan untuk meningkatkan kesehatan ibu dan anak, memberikan informasi dan edukasi
                    kesehatan kepada masyarakat, serta memantau pertumbuhan dan perkembangan anak.
                </p>
            </div>
        </div>
        <!-- akhir about-->


        <!-- contact -->
        <div class="mx-5" id="contact">
            <div class="text-center mb-3 mt-5">
                <h2 class="text-center head-about">Contact</h2>
            </div>
            <div class="fs-5 text-center" style="margin-bottom: 100px;">
                <span><i class="bi bi-telephone-fill about"> +62 821-2810-5662</i></span>
            </div>
        </div>
        <!-- akhir contact-->

        <!-- Footer -->
        <footer class="bg-primary text-white text-center p-5">
            <p class="head-about">Created with <i class="bi bi-suit-heart-fill text-danger"></i> by <a
                    href="https://linkfly.to/hlmtssdyh" class="text-white fw-bold about">Halimatus Sa'diyah</a></p>
        </footer>
        <!-- Akhir Footer -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('show-password');

        showPasswordCheckbox.addEventListener('change', function () {
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>

<?php
if (isset($_SESSION["berhasil"])) {
    $pesan = $_SESSION["berhasil"];

    echo "
              <script>
                Swal.fire(
                  'Berhasil!',
                  '$pesan',
                  'success'
                )
              </script>
          ";
    $_SESSION = [];
    session_unset();
    session_destroy();


} elseif (isset($_SESSION['gagal'])) {
    $pesan = $_SESSION["gagal"];

    echo "
            <script>
                Swal.fire(
                    'Gagal!',
                    '$pesan',
                    'error'
                )
            </script>
        ";
    $_SESSION = [];
    session_unset();
    session_destroy();

}

?>