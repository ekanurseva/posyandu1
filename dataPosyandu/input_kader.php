<?php
session_start();
require_once '../controller/kaderController.php';

if (isset($_GET['id'])) {
    $id_posyandu = dekripsi($_GET['id']);
    $data = query("SELECT * FROM posyandu WHERE id_posyandu = $id_posyandu")[0];

    $kader = query("SELECT user.* FROM user WHERE user.id_user NOT IN ( SELECT kader.id_user FROM kader WHERE kader.id_user IS NOT NULL ) AND role = 'kader';");
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
                <h4 class="text-center fw-bold" style="color: black;">MANAJEMEN DATA KADER POSYANDU</h4>


                <form method="post" action="">
                    <input type="hidden" name="id_posyandu" value="<?= $data['id_posyandu']; ?>">
                    <div class="mb-3 mt-5 row ms-5">
                        <label for="posyandu" class="col-sm-3 me-0 col-form-label">Nama Posyandu</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" style="border: 1px solid black;" id="posyandu"
                                name="nama_posyandu" value="<?= $data['nama_posyandu']; ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-5 mt-2 row ms-5">
                        <label for="alamat" class="col-sm-3 me-0 col-form-label">Alamat</label>
                        <div class="col-sm-6">
                            <?php if (count($kader) == 0): ?>
                                <select class="boxc form-control" style="border-color: black;" name="id_user" require
                                    disabled>
                                    <option hidden selected value="">--Semua kader telah ditugaskan--</option>
                                </select>
                            <?php else: ?>
                                <select class="boxc form-control" style="border-color: black;" name="id_user" require>
                                    <option hidden selected value="">--Pilih Kader--</option>
                                    <?php foreach ($kader as $k): ?>
                                        <option value="<?php echo $k['id_user'] ?>"><?= $k['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-2 me-0">
                            <a href="javascript:history.back()" class="btn btn-secondary">Kembali
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
        $_SESSION["berhasil"] = "Data Kader Berhasil Ditambahkan!";
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
                'Data Kader Gagal Ditambahkan!',
                'error'
            )
          </script>
      ";
    }
}
?>