<?php
session_start();
require_once '../controller/balitaController.php';

if (isset($_COOKIE['posyandu'])) {
    $ibu = cari_user();
    $id_ibu = $ibu['id_user'];

    $balita = query("SELECT * FROM balita WHERE id_user = $id_ibu");
} else {
    echo "<script>
                document.location.href='../logout.php';
              </script>";
    exit;
}

$Posyandu = query("SELECT * FROM posyandu");

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
            require_once('../navbar/sidebar_ortu.php');
            ?>
            <!-- sidebar selesai -->

            <div class="contents">
                <h4 class="text-center fw-bold" style="color: black;">DATA BALITA</h4>

                <div class="mt-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#balita">
                        Tambah Data Balita
                    </button>
                </div>

                <div class="mt-4">
                    <table id="example" class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">NAMA BALITA</th>
                                <th class="text-center" scope="col">NAMA ORANG TUA</th>
                                <th class="text-center" scope="col">NIK BALITA</th>
                                <th class="text-center" scope="col">POSYANDU</th>
                                <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($balita as $b):
                                $id_user = $b['id_user'];
                                $idposyandu = $b['idposyandu'];

                                $nama_ibu = query("SELECT nama FROM user WHERE id_user = $id_user")[0];
                                $nama_posyandu = query("SELECT nama_posyandu FROM posyandu WHERE id_posyandu = $idposyandu")[0];
                                ?>
                                <tr>
                                    <td>
                                        <?= $i; ?>
                                    </td>
                                    <td>
                                        <?= $b['nama_balita']; ?>
                                    </td>
                                    <td>
                                        <?= $b['nama_ayah']; ?> (<i class="bi bi-gender-male text-primary"></i>),
                                        <?= $nama_ibu['nama']; ?> (<i class="bi bi-gender-female"
                                            style="color: palevioletred;"></i>)
                                    </td>
                                    <td>
                                        <?= $b['nik_balita']; ?>
                                    </td>
                                    <td>
                                        <?= $nama_posyandu['nama_posyandu']; ?>
                                    </td>
                                    <td>
                                        <a class="text-decoration-none btn btn-sm btn-primary"
                                            href="edit_balita.php?id=<?= enkripsi($b['id_balita']); ?>">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        |
                                        <a class="text-decoration-none btn btn-sm btn-primary"
                                            href="view.php?id=<?= enkripsi($b['id_balita']); ?>">
                                            View
                                        </a>
                                        |
                                        <a class="delete bg-danger" id="delete"
                                            onclick="deleteBalita(<?= $b['id_balita']; ?>)">
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

                <!-- Modal Input Balita = Pilih Posyandu -->
                <div class="modal fade" id="balita" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="ciriLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ciriLabel">Pilih Posyandu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="input_balita.php" method="post">
                                <input type="hidden" name="url" value="index_balita.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kriteria" class="form-label">Pilih Posyandu</label>

                                        <div class="">
                                            <select id="kriteria" class="form-select" style="border: 1px solid black;"
                                                aria-label="Default select example" name="id_posyandu">
                                                <option value="" selected hidden>--Pilih Posyandu--</option>
                                                <?php foreach ($Posyandu as $p): ?>
                                                    <option value="<?= $p['id_posyandu']; ?>">
                                                        <?= $p['nama_posyandu']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="submit_ciri" class="btn btn-primary">Pilih</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Input Balita = Pilih Posyandu Selesai -->

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