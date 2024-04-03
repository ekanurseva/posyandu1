<?php
require_once '../controller/penimbanganController.php';

$ibu = cari_user();
$id_ibu = $ibu['id_user'];
$jadwal = [];

$balita = query("SELECT * FROM balita WHERE id_user = $id_ibu");

foreach ($balita as $b) {
    $id_balita = $b['id_balita'];
    $penimbangan = query("SELECT * FROM penimbangan WHERE id_balita = $id_balita");

    foreach ($penimbangan as $pen) {
        $bb[] = $pen['berat_badan'];
        $id_jadwal = $pen['idjadwal'];

        $cek_jadwal = query("SELECT * FROM jdw_posyandu WHERE idjadwal = $id_jadwal")[0];

        if (array_search(cari_tanggal($cek_jadwal['jadwal'], 'd F Y'), $jadwal) != false) {
            $jadwal[] = cari_tanggal($cek_jadwal['jadwal'], 'd F Y');
        }
    }

    $berat[] = $bb;
    $nama_balita[][] = $b['nama_balita'];

    // var_dump($berat);
    // var_dump($jdw);
    // var_dump($nama_balita);
}

var_dump($jadwal);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                <h2 class="text-center fw-bold" style="color: black;">WELCOME TO POSYANDU</h2>
                <div class="mt-3">
                    <canvas id="myChart" style="border: solid 1px; padding: 10px;"></canvas>
                </div>

                <!-- about -->
                <div class="mx-5" id="about">
                    <div class="text-center mb-3" style="margin-top: 200px;">
                        <h2 class="text-center head-about">About</h2>
                    </div>
                    <div class="fs-5" style="margin-bottom: 30px;">
                        <p class="about" style="text-align : justify">
                            Posyandu adalah singkatan dari Pos Pelayanan Terpadu. Posyandu merupakan suatu program
                            pelayanan
                            kesehatan yang dikelola oleh masyarakat di tingkat desa atau kelurahan. Program ini
                            dirancang untuk
                            memberikan pelayanan kesehatan dasar, terutama pada ibu hamil, ibu menyusui, balita, dan
                            anak-anak.
                            Posyandu bertujuan untuk meningkatkan kesehatan ibu dan anak, memberikan informasi dan
                            edukasi
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
                    <div class="fs-5 text-center">
                        <span><i class="bi bi-telephone-fill about"> +62 821-2810-5662</i></span>
                    </div>
                </div>
                <!-- akhir contact-->
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script>
        // Ambil referensi elemen canvas
        var ctx = document.getElementById('myChart').getContext('2d');

        // Data balita dan jadwal penimbangan
        var dataBalita = {
            labels: <?php echo json_encode($jadwal); ?>, // Usia balita (dalam bulan)
            datasets: [{
                label: 'Berat Badan ' + "<?php echo $balita[0]['nama_balita'] ?>", // Label grafik
                data: <?php echo json_encode($bb); ?>, // Berat badan balita (dalam kg)
                fill: false, // Tidak mengisi area di bawah garis
                borderColor: 'rgb(80, 197, 252)', // Warna garis
                tension: 0.1 // Tegangan kurva
            }]
        };

        // Opsi grafik
        var options = {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Usia Balita dan Jadwal Penimbangan' // Label sumbu x
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Berat Badan (kg)' // Label sumbu y
                    }
                }
            }
        };

        // Buat grafik line
        var myChart = new Chart(ctx, {
            type: 'line',
            data: dataBalita,
            options: options
        });

    </script>
</body>

</html>