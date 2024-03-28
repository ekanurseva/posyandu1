<?php
session_start();
require_once '../controller/balitaController.php';

if (isset($_GET['id'])) {
    $idbalita = dekripsi($_GET['id']);
    $data = query("SELECT * FROM balita WHERE id_balita = $idbalita")[0];

    $id_ibu = $data['id_user'];
    $data_ibu = query("SELECT nama FROM user WHERE id_user = $id_ibu")[0];

    $id_posyandu = $data['idposyandu'];
    $data_posyandu = query("SELECT * FROM posyandu WHERE id_posyandu = $id_posyandu")[0];

    $penimbangan = query("SELECT * FROM penimbangan WHERE id_balita = $idbalita ORDER BY id_balita ASC");
    $imunisasi = query("SELECT * FROM imunisasi WHERE id_balita = $idbalita ORDER BY id_balita ASC");
    $vitamin = query("SELECT * FROM vitamin WHERE id_balita = $idbalita ORDER BY id_balita ASC");

    $tanggal_lahir = cari_tanggal($data['tanggal_lahir'], 'd F Y');

    $bulan = cari_bulan($data['tanggal_lahir']);

} else {
    echo "<script>
                document.location.href='index.php';
              </script>";
    exit;
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
                <h4 class="text-center fw-bold" style="color: black;">MANAJEMEN DATA BALITA</h4>

                <div class="mt-4">
                    <div class="row">
                        <div class="col-4">
                            <a id="delete" onclick="deleteBalita(<?= $idbalita; ?>)">
                                <button class="btn btn-sm btn-outline-danger">Hapus Data Balita</i></button>
                            </a>
                        </div>
                        <div class="col-2">
                            <form action="../penimbangan/input.php" method="post">
                                <input type="hidden" name="id_balita" value="<?= $data['id_balita']; ?>">
                                <input type="hidden" name="url" value="../balita/view.php?id=<?= $_GET['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Data Penimbangan
                                </button>

                            </form>
                        </div>
                        <div class="col-2">
                            <form action="../imunisasi/input.php" method="post">
                                <input type="hidden" name="id_balita" value="<?= $data['id_balita']; ?>">
                                <input type="hidden" name="url" value="../balita/view.php?id=<?= $_GET['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Data Imunisasi
                                </button>

                            </form>
                        </div>
                        <div class="col-2">
                            <form action="../vitamin/input.php" method="post">
                                <input type="hidden" name="id_balita" value="<?= $data['id_balita']; ?>">
                                <input type="hidden" name="url" value="../balita/view.php?id=<?= $_GET['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Data Vitamin
                                </button>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-3">
                        <h6>Nama Balita</h6>
                        <h6>NIK Balita</h6>
                        <h6>Nama Ibu</h6>
                        <h6>Nama Ayah</h6>
                        <h6>Tempat Lahir</h6>
                        <h6>Tanggal Lahir</h6>
                        <h6>Umur</h6>
                        <h6>Jenis Kelamin</h6>
                        <h6>Tempat Posyandu</h6>
                    </div>
                    <div class="col-9">
                        <h6>:
                            <?= $data['nama_balita']; ?>
                        </h6>
                        <h6>:
                            <?= $data['nik_balita']; ?>
                        </h6>
                        <h6>:
                            <?= $data_ibu['nama']; ?>
                        </h6>
                        <h6>:
                            <?= $data['nama_ayah']; ?>
                        </h6>
                        <h6>:
                            <?= $data['tempat_lahir']; ?>
                        </h6>
                        <h6>:
                            <?= $tanggal_lahir; ?>
                        </h6>
                        <?php
                        if ($bulan > 11):
                            $tahun = floor($bulan / 12);
                            ?>
                            <h6>:
                                <?= $tahun; ?> tahun
                            </h6>
                        <?php else: ?>
                            <h6>:
                                <?= $bulan; ?> bulan
                            </h6>
                        <?php endif; ?>
                        <h6>:
                            <?= $data['jenis_kelamin']; ?>
                        </h6>
                        <h6>: Posyandu
                            <?= $data_posyandu['nama_posyandu']; ?>
                        </h6>
                    </div>
                </div>

                <div class="mt-5">
                    <div class="text-center">
                        <h5>
                            Data Penimbangan
                        </h5>
                    </div>
                    <table id="example" class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary">
                            <tr class="table-secondary">
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">BB</th>
                                <th class="text-center" scope="col">TB</th>
                                <th class="text-center" scope="col">STATUS GIZI</th>
                                <th class="text-center" scope="col">LILA</th>
                                <th class="text-center" scope="col">LIKA</th>
                                <th class="text-center" scope="col">Tanggal</th>
                                <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($penimbangan as $pen):
                                $id_jadwal = $pen['idjadwal'];
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
                                        <?= $pen['berat_badan']; ?> gram
                                    </td>
                                    <td>
                                        <?= $pen['tinggi_badan']; ?> cm
                                    </td>
                                    <td>
                                        <?= $pen['status_gizi']; ?>
                                    </td>
                                    <td>
                                        <?= $pen['lila']; ?> cm
                                    </td>
                                    <td>
                                        <?= $pen['lika']; ?> cm
                                    </td>
                                    <td>
                                        <?= $jadwal; ?> di Posyandu
                                        <?= $data_posyandu['nama_posyandu']; ?>
                                    </td>
                                    <td>
                                        <form class="d-inline"
                                            action="../penimbangan/edit.php?id=<?= enkripsi($pen['id_timbang']); ?>"
                                            method="post">
                                            <input type="hidden" name="url"
                                                value="../balita/view.php?id=<?= $_GET['id']; ?>">
                                            <button class="btn btn-primary"><i class="bi bi-pencil-fill"></i></button>
                                        </form>
                                        |
                                        <a class="delete bg-danger" id="delete"
                                            onclick="deletePenimbangan(<?= $pen['id_timbang']; ?>)">
                                            <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
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

                <div class="mt-5">
                    <div class="text-center">
                        <h5>
                            Data Imunisasi
                        </h5>
                    </div>
                    <table id="example2" class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">JENIS IMUNISASI</th>
                                <th class="text-center" scope="col">TANGGAL</th>
                                <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; foreach ($imunisasi as $imun):
                                $id_jadwal = $imun['idjadwal'];
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
                                        <?= $imun['jenis_imunisasi']; ?>
                                    </td>
                                    <td>
                                        <?= $jadwal; ?> di Posyandu
                                        <?= $data_posyandu['nama_posyandu']; ?>
                                    </td>
                                    <td>
                                        <form class="d-inline"
                                            action="../imunisasi/edit.php?id=<?= enkripsi($imun['id_imunisasi']); ?>"
                                            method="post">
                                            <input type="hidden" name="url"
                                                value="../balita/view.php?id=<?= $_GET['id']; ?>">
                                            <button class="btn btn-primary"><i class="bi bi-pencil-fill"></i></button>
                                        </form>
                                        |
                                        <a class="delete bg-danger" id="delete"
                                            onclick="deleteImunisasi(<?= $imun['id_imunisasi']; ?>)">
                                            <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
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

                <div class="mt-5">
                    <div class="text-center">
                        <h5>
                            Data Vitamin
                        </h5>
                    </div>
                    <table id="example3" class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">JENIS VITAMIN</th>
                                <th class="text-center" scope="col">TANGGAL</th>
                                <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; foreach ($vitamin as $v):
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
                                        <?= $v['jenis_vitamin']; ?>
                                    </td>
                                    <td>
                                        <?= $jadwal; ?> di Posyandu
                                        <?= $data_posyandu['nama_posyandu']; ?>
                                    </td>
                                    <td>
                                        <form class="d-inline"
                                            action="../vitamin/edit.php?id=<?= enkripsi($v['id_vitamin']); ?>"
                                            method="post">
                                            <input type="hidden" name="url"
                                                value="../balita/view.php?id=<?= $_GET['id']; ?>">
                                            <button class="btn btn-primary"><i class="bi bi-pencil-fill"></i></button>
                                        </form>
                                        |
                                        <a class="delete bg-danger" id="delete"
                                            onclick="deleteVitamin(<?= $v['id_vitamin']; ?>)">
                                            <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
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

                <div class="mt-5">
                    <div class="text-center">
                        <h5>
                            Data PMT
                        </h5>
                    </div>
                    <table id="example4" class="table table-hover text-center">
                        <thead>
                            <tr class="table-secondary">
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">POSYANDU</th>
                                <th class="text-center" scope="col">JADWAL</th>
                                <th class="text-center" scope="col">JENIS PMT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; foreach ($penimbangan as $pnb):
                                $id_jadwal = $pnb['idjadwal'];

                                $pmt = query("SELECT * FROM pmt WHERE idjadwal = $id_jadwal");

                                if (count($pmt) != 0):
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
                                            <?= $data_posyandu['nama_posyandu']; ?>
                                        </td>
                                        <td>
                                            <?= $jadwal; ?>
                                        </td>
                                        <td>
                                            <?= $pmt[0]['jenis_pmt']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                endif;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>

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
        $(document).ready(function () {
            $('#example2').DataTable();
        });
        $(document).ready(function () {
            $('#example3').DataTable();
        });
        $(document).ready(function () {
            $('#example4').DataTable();
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