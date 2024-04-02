<?php 
    require_once 'controller/mainController.php';

    if(isset($_POST['submit'])) {
        $umur = $_POST['umur'];
        $jk = $_POST['jk'];
        $atas_buruk = $_POST['atas_buruk'];
        $bawah_kurang = $_POST['bawah_kurang'];
        $atas_kurang = $_POST['atas_kurang'];
        $bawah_baik = $_POST['bawah_baik'];
        $atas_baik = $_POST['atas_baik'];
        $bawah_lebih = $_POST['bawah_lebih'];
        
        try {
            mysqli_query($conn, "INSERT INTO status_gizi VALUES (NULL, '$jk', '$umur', '0', '$atas_buruk', 'Gizi Buruk')");
            mysqli_query($conn, "INSERT INTO status_gizi VALUES (NULL, '$jk', '$umur', '$bawah_kurang', '$atas_kurang', 'Gizi Kurang')");
            mysqli_query($conn, "INSERT INTO status_gizi VALUES (NULL, '$jk', '$umur', '$bawah_baik', '$atas_baik', 'Gizi Baik')");
            mysqli_query($conn, "INSERT INTO status_gizi VALUES (NULL, '$jk', '$umur', '$bawah_lebih', '1000', 'Gizi Lebih')");

            echo "<script>
                    alert('Berhasil')
                    document.location.href='tambah.php';
                </script>";
        } catch (\Throwable $th) {
            echo "<script>
                    alert('Gagal')
                    document.location.href='tambah.php';
                </script>";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <form action="" method="post">
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur">
        </div>

        <div class="mb-3">
            <label for="jk" class="me-0 col-form-label">Jenis Kelamin</label>
            
            <select class="form-control" name="jk" require
                id="jk">
                <option hidden selected value="">--Pilih Jenis Kelamin--</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="atas_buruk" class="form-label">Batas Atas Gizi Buruk</label>
            <input type="number" step="0.1" class="form-control" id="atas_buruk" name="atas_buruk">
        </div>

        <div class="mb-3">
            <label for="bawah_kurang" class="form-label">Batas Bawah Gizi Kurang</label>
            <input type="number" step="0.1" class="form-control" id="bawah_kurang" name="bawah_kurang">
        </div>

        <div class="mb-3">
            <label for="atas_kurang" class="form-label">Batas Atas Gizi Kurang</label>
            <input type="number" step="0.1" class="form-control" id="atas_kurang" name="atas_kurang">
        </div>

        <div class="mb-3">
            <label for="bawah_baik" class="form-label">Batas Bawah Gizi Baik</label>
            <input type="number" step="0.1" class="form-control" id="bawah_baik" name="bawah_baik">
        </div>

        <div class="mb-3">
            <label for="atas_baik" class="form-label">Batas Atas Gizi baik</label>
            <input type="number" step="0.1" class="form-control" id="atas_baik" name="atas_baik">
        </div>

        <div class="mb-3">
            <label for="bawah_lebih" class="form-label">Batas Bawah Gizi Lebih</label>
            <input type="number" step="0.1" class="form-control" id="bawah_lebih" name="bawah_lebih">
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>