<?php
session_start();
require_once '../controller/balitaController.php';

$data_user = query("SELECT * FROM user");
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

                <form method="post" action="">
                    <div class="mb-3 mt-5 row ms-5">
                        <label for="ibu" class="col-sm-3 me-0 col-form-label">Nama Ibu</label>
                        <div class="col-sm-6">
                            <select class="boxc form-control" style="border-color: black;" name="id_user" require
                                id="ibu">
                                <option hidden selected value="">--Pilih Ibu--</option>
                                <?php foreach ($data_user as $daus): ?>
                                    <option value="<?php echo $daus['id_user'] ?>"><?= $daus['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 mt-2 row ms-5">
                        <label for="posyandu" class="col-sm-3 me-0 col-form-label">Posyandu</label>
                        <div class="col-sm-6">
                            <select class="boxc form-control" style="border-color: black;" name="idposyandu" require
                                id="posyandu">
                                <option hidden selected value="">--Pilih Posyandu--</option>
                                <?php foreach ($posyandu as $p): ?>
                                    <option value="<?php echo $p['id_posyandu'] ?>"><?= $p['nama_posyandu']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 mt-2 row ms-5">
                        <label for="ayah" class="col-sm-3 me-0 col-form-label">Nama Ayah</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="border: 1px solid black;" id="ayah"
                                name="nama_ayah">
                        </div>
                    </div>
                    <div class="mb-3 mt-2 row ms-5">
                        <label for="balita" class="col-sm-3 me-0 col-form-label">Nama Balita</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="border: 1px solid black;" id="balita"
                                name="nama_balita">
                        </div>
                    </div>
                    <div class="mb-3 mt-2 row ms-5">
                        <label for="nik" class="col-sm-3 me-0 col-form-label">NIK Balita</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" style="border: 1px solid black;" id="nik"
                                name="nik_balita">
                        </div>
                    </div>
                    <div class="mb-3 mt-2 row ms-5">
                        <label for="tempat" class="col-sm-3 me-0 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="border: 1px solid black;" id="tempat"
                                name="tempat_lahir">
                        </div>
                    </div>
                    <div class="mb-3 mt-2 row ms-5">
                        <label for="tgl" class="col-sm-3 me-0 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" style="border: 1px solid black;" id="tgl"
                                name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="mb-3 mt-2 row ms-5">
                        <label for="jk" class="col-sm-3 me-0 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-6">
                            <select class="boxc form-control" style="border-color: black;" name="jenis_kelamin" require
                                id="jk">
                                <option hidden selected value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-2 me-0">
                            <a href="index.php" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                        <div class="col-sm-2 ms-0 p-0">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    if (create($_POST) > 0) {
        $_SESSION["berhasil"] = "Data Balita Berhasil Ditambahkan!";
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
                'Data Balita Gagal Ditambahkan!',
                'error'
            )
          </script>
      ";
    }
}
?>