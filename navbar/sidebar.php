<?php
require_once '../controller/mainController.php';
validasi_admin();

$user = cari_user();
?>

<div class="sidebar bg-primary" id="side_nav">
    <!--PROFIL-->
    <div class="content-side">
        <div class="profil">
            <div class="row d-flex align-items-center">
                <div class="col-sm-5 me-0">
                    <img src="../image/img6.jpg" class="rounded-circle" alt="profi">
                    <a href="../profil">
                        <button class="rounded-circle"><i class="bi bi-pencil-fill"></i></button>
                    </a>
                </div>
                <div class="col-sm-7 m-0">
                    <h6 class="fw-bold text-white">
                        <?= $user['nama']; ?>
                    </h6>
                </div>
            </div>
        </div>
        <!--PROFIL SELESAI-->

        <!-- menu -->
        <div class="">
            <ul class="list-group list-group-flush pt-4 fw-medium">
                <li class="list-group-item">
                    <a href="../admin" class="text-decoration-none d-block">
                        <span>Home</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../pengguna" class="text-decoration-none d-block">
                        <span>Manajemen Pengguna</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../dataPosyandu" class="text-decoration-none d-block">
                        <span>Manajemen Posyandu</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../balita" class="text-decoration-none d-block">
                        <span>Manajemen Balita</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../penimbangan" class="text-decoration-none d-block">
                        <span>Manajemen Penimbangan</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../imunisasi" class="text-decoration-none d-block">
                        <span>Manajemen Imunisasi</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../vitamin" class="text-decoration-none d-block">
                        <span>Manajemen Vitamin</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../pmt" class="text-decoration-none d-block">
                        <span>Manajemen PMT</span>
                    </a>
                </li>
            </ul>
        </div>
        <hr class="hr-color">

        <ul class="list-unstyled fw-medium pb-5">
            <li>
                <a href="../logout.php" class="text-decoration-none d-block">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>