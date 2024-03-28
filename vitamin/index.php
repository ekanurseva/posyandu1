<?php
session_start();
require_once '../controller/vitaminController.php';

$balita = query("SELECT * FROM balita ORDER BY id_user ASC");

$vitamin = query("SELECT * FROM vitamin ORDER BY id_balita ASC");

if (isset($_GET['cek_tanggal'])) {
    if ($_GET['dari'] != "" && $_GET['sampai'] != "") {
        $penimbangan = cari_vitamin($_GET);
    }
}
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
            require_once('../navbar/navbar_admin.php');
            ?>
            <!-- Akhir Navbar -->
        </div>
    </nav>


    <div class="main-container m-0">
        <div class="d-flex">
            <!-- sidebar -->
            <?php
            require_once('../navbar/sidebar.php');
            ?>
            <!-- sidebar selesai -->

            <div class="contents">
                <h4 class="text-center fw-bold" style="color: black;">MANAJEMEN DATA VITAMIN</h4>

                <div class="mt-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vitamin">
                        Tambah Data
                    </button>

                    <form action="" method="get">
                        <div class="filter mt-4">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3 row">
                                        <label for="dari" class="col-sm-2 col-form-label col-form-label-sm">Dari</label>
                                        <div class="col-sm-auto">
                                            <input type="date" class="form-control form-control-sm" id="dari"
                                                name="dari" style="border: solid 1px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3 row">
                                        <label for="sampai"
                                            class="col-sm-3 col-form-label col-form-label-sm">Sampai</label>
                                        <div class="col-sm-auto">
                                            <input type="date" class="form-control form-control-sm" id="sampai"
                                                name="sampai" style="border: solid 1px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <button type="submit" name="cek_tanggal"
                                        class="btn btn-sm btn-outline-primary col-sm-2">Cek</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <table id="example" class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">NAMA BALITA</th>
                                <th class="text-center" scope="col">JENIS VITAMIN</th>
                                <th class="text-center" scope="col">TANGGAL</th>
                                <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($vitamin as $v):
                                $id_balita = $v['id_balita'];
                                $data_balita = query("SELECT * FROM balita WHERE id_balita = $id_balita")[0];

                                $id_jadwal = $v['idjadwal'];
                                $data_jadwal = query("SELECT * FROM jdw_posyandu WHERE idjadwal = $id_jadwal")[0];

                                $id_posyandu = $data_jadwal['idposyandu'];
                                $data_posyandu = query("SELECT * FROM posyandu WHERE id_posyandu = $id_posyandu")[0];

                                $jadwal = cari_tanggal($data_jadwal['jadwal'], 'l | d F Y | H:i');
                                ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?= $data_balita['nama_balita']; ?>
                                    </td>
                                    <td>
                                        <?= $v['jenis_vitamin']; ?>
                                    </td>
                                    <td>
                                        <?= $jadwal; ?> di Posyandu
                                        <?= $data_posyandu['nama_posyandu']; ?>
                                    </td>
                                    <td>
                                        <form class="d-inline" action="edit.php?id=<?= enkripsi($v['id_vitamin']); ?>"
                                            method="post">
                                            <input type="hidden" name="url" value="index.php">
                                            <button class="btn btn-sm btn-primary"><i
                                                    class="bi bi-pencil-fill"></i></button>
                                        </form>

                                        <a class="delete bg-danger" id="delete"
                                            onclick="deleteVitamin(<?= $v['id_vitamin']; ?>)">
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Input Imunisasi = Pilih Balita -->
        <div class="modal fade" id="vitamin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="ciriLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ciriLabel">Pilih Balita</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="input.php" method="post">
                        <input type="hidden" name="url" value="index.php">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kriteria" class="form-label">Pilih balita untuk menambahkan
                                    Vitamin balita</label>

                                <div class="">
                                    <select id="kriteria" class="form-select" style="border: 1px solid black;"
                                        aria-label="Default select example" name="id_balita">
                                        <option value="" selected hidden>--Pilih Balita--</option>
                                        <?php foreach ($balita as $b): ?>
                                            <option value="<?= $b['id_balita']; ?>">
                                                <?= $b['nama_balita']; ?> (Ayah : <?= $b['nama_ayah']; ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="submit_ciri" class="btn btn-primary">Pilih</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Input Imunisasi = Pilih Balita Selesai -->

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
    <script src="../script.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
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