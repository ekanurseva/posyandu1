<?php
require_once '../controller/posyanduController.php';

$posyandu = query("SELECT * FROM posyandu");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../style.css">

    <title>Posyandu</title>

</head>

<body>

    <nav class="navbar bg-body-tertiary p-0">
        <div class="container-fluid justify-content-center p-3">
            <!-- Navbar -->
            <?php
            require_once('../navbar/navbar.php');
            ?>
            <!-- Akhir Navbar -->
        </div>
    </nav>


    <div class="main-container m-0">
        <div class="d-flex">
            <!-- sidebar -->
            <?php
            require_once('../navbar/sidebar_ortu.php');
            ?>
            <!-- sidebar selesai -->

            <div class="contents">
                <h4 class="text-center fw-bold" style="color: black;">DATA POSYANDU</h4>

                <?php
                $id_ortu = $user['id_user'];

                $balita = query("SELECT * FROM balita WHERE id_user = $id_ortu");

                foreach ($balita as $bal):
                    $id_pos_balita = $bal['idposyandu'];

                    $data_pos_balita = query("SELECT * FROM posyandu WHERE id_posyandu = $id_pos_balita")[0];

                    $data_jadwal_balita = query("SELECT * FROM jdw_posyandu WHERE idposyandu = $id_pos_balita AND jadwal > NOW() ORDER BY jadwal ASC");

                    if (count($data_jadwal_balita) > 0) {
                        $jadwal_jadi = cari_tanggal($data_jadwal_balita[0]['jadwal'], 'l | d F Y | H:i');
                    } else {
                        $jadwal_jadi = "Belum Ada Jadwal";
                    }
                    ?>
                    <div class="mt-4">
                        <h6 class="text-primary">Jadwal Terdekat Untuk
                            <?= $bal['nama_balita']; ?> Di Posyandu
                            <?= $data_pos_balita['nama_posyandu']; ?>
                        </h6>
                        <h6>
                            <?= $jadwal_jadi; ?>
                        </h6>
                    </div>
                <?php endforeach; ?>

                <div class="mt-4" style="border: 1px solid rgb(68, 68, 236); border-radius: 10px; padding: 17px;">
                    <h6 class="text-center">SELURUH DATA JADWAL POSYANDU</h6>
                    <hr style="color: rgb(68, 68, 236); opacity: 1;">
                    <table id="example" class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">NAMA POSYANDU</th>
                                <th class="text-center" scope="col">ALAMAT</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($posyandu as $p):
                                ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?= $p['nama_posyandu']; ?>
                                    </td>
                                    <td>
                                        <?= $p['alamat_posyandu']; ?>
                                    </td>
                                    <td style="width: 200px;">
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal_<?= $p['id_posyandu'] ?>">
                                            <i class="bi bi-info-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php foreach ($posyandu as $pos):
                    $id_posyandu = $pos['id_posyandu']
                        ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal_<?= $id_posyandu ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Informasi Terkait Posyandu
                                        <?= $pos['nama_posyandu']; ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mb-3">Data Kader</h6>

                                            <table id="data_kader_<?= $id_posyandu; ?>"
                                                class="table table-hover text-center">
                                                <thead>
                                                    <tr class="table-secondary">
                                                        <th class="text-center" scope="col">NO</th>
                                                        <th class="text-center" scope="col">NAMA KADER</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $j = 1;
                                                    $data_kader = query("SELECT * FROM kader WHERE id_posyandu = $id_posyandu"); foreach ($data_kader as $dk):
                                                        $id_user = $dk['id_user'];
                                                        $nama = query("SELECT nama FROM user WHERE id_user = $id_user")[0];
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?= $j; ?>
                                                            </td>
                                                            <td>
                                                                <?= $nama['nama']; ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $j++;
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-6">
                                            <h6 class="mb-3">Data Jadwal</h6>

                                            <table id="data_jadwal_<?= $id_posyandu; ?>"
                                                class="table table-hover text-center">
                                                <thead>
                                                    <tr class="table-secondary">
                                                        <th class="text-center" scope="col">NO</th>
                                                        <th class="text-center" scope="col">JADWAL</th>
                                                        <th class="text-center" scope="col">STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $k = 1;
                                                    $data_jadwal = query("SELECT * FROM jdw_posyandu WHERE idposyandu = $id_posyandu AND jadwal > NOW() ORDER BY jadwal ASC"); foreach ($data_jadwal as $dw):
                                                        $jadwal = cari_tanggal($dw['jadwal'], 'l | d F Y | H:i');
                                                        ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <?= $k; ?>
                                                            </th>
                                                            <td>
                                                                <?= $jadwal; ?>
                                                            </td>
                                                            <td>
                                                                Akan Dilaksanakan
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $k++;
                                                    endforeach;
                                                    ?>

                                                    <?php
                                                    $data_jadwal = query("SELECT * FROM jdw_posyandu WHERE idposyandu = $id_posyandu AND jadwal < NOW() ORDER BY jadwal ASC"); foreach ($data_jadwal as $dajad):
                                                        $jadwal = cari_tanggal($dajad['jadwal'], 'l | d F Y | H:i');
                                                        ?>
                                                        <tr>
                                                            <th scope="row" class="bg-danger text-white">
                                                                <?= $k; ?>
                                                            </th>
                                                            <td class="bg-danger text-white">
                                                                <?= $jadwal; ?>
                                                            </td>
                                                            <td class="bg-danger text-white">
                                                                Sudah Dilaksanakan
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $k++;
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

        <?php foreach ($posyandu as $ps): ?>
            $(document).ready(function () {
                $('#data_kader_<?= $ps['id_posyandu'] ?>').DataTable();
            });

            $(document).ready(function () {
                $('#data_jadwal_<?= $ps['id_posyandu'] ?>').DataTable();
            });
        <?php endforeach; ?>
    </script>
</body>

</html>