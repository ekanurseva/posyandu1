<?php
require_once '../controller/mainController.php';
validasi();

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
                    <a href="../ortu" class="text-decoration-none d-block">
                        <span>Home</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../ortu/posyandu.php" class="text-decoration-none d-block">
                        <span>Data Posyandu</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../ortu/balita.php" class="text-decoration-none d-block">
                        <span>Data Balita</span>
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