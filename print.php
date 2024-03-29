<?php
require_once 'vendor/autoload.php'; // Lokasi file autoload composer
require_once 'controller/penimbanganController.php';

use Dompdf\Dompdf;

if (isset($_POST['bulan']) && isset($_POST['tahun'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $penimbangan = cari_penimbangan_berdasarkan_bulan_dan_tahun($bulan, $tahun);

    $dompdf = new Dompdf();

    // Masukkan kode HTML dan CSS yang ingin Anda konversi ke PDF
    $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>LAPORAN PENIMBANGAN</title>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                        margin-top: 15px;
                        margin-bottom: 50px;
                    }

                    th, td {
                        border: 1px solid black;
                        padding: 3px;
                        text-align: center;
                        vertical-align: middle;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    p {
                        margin: 1.5px;
                        text-align: justify; 
                        text-indent: 0.55in;
                    }
                    li {
                        text-align: left;
                        padding: 0;
                        padding: 0;
                        margin: 0;
                        left: 0;
                    }

                    @page { margin: 120px 25px; }
                    header { 
                        position: fixed; 
                        top: -90px; 
                        left: 0; 
                        right: 0; 
                        height: 50px; 
                        text-align: center;
                    }

                    .content{
                        margin-top: -20px;
                    }
                </style>
            </head>
            <body>
            <header>
                <h3 style="margin: 0;">FORMAT PENIMBANGAN BALITA DI POSYANDU</h3>
                <h3 style="margin: 0;">DESA SARWADADI</h3>
            </header>';

    // Ambil data posyandu
    $data_posyandu = query("SELECT * FROM posyandu");

    foreach ($data_posyandu as $posyandu) {
        $id_posyandu = $posyandu['id_posyandu'];
        $nama_posyandu = $posyandu['nama_posyandu'];

        // Ambil data jadwal posyandu berdasarkan bulan dan tahun
        $jadwal_posyandu = query("SELECT * FROM jdw_posyandu WHERE MONTH(jadwal) = '$bulan' AND YEAR(jadwal) = '$tahun' AND idposyandu = '$id_posyandu'");

        if ($jadwal_posyandu) {
            $html .= '<div class="content">';
            $html .= '<h4 style="margin: 0;">Posyandu: ' . $nama_posyandu . '</h4>';

            foreach ($jadwal_posyandu as $jadwal) {
                $tanggal_jadwal = $jadwal['jadwal'];

                // Format tanggal jadwal
                $tanggal_jadwal_format = date("l, d F Y", strtotime($tanggal_jadwal));
                $tanggal = cari_tanggal($tanggal_jadwal_format, 'l, d F Y');

                $html .= '<h4 style="margin: 0;">Tanggal Penimbangan: ' . $tanggal . '</h4>';

                // Tampilkan tabel data penimbangan
                if (!empty($penimbangan)) {
                    $html .= '<table>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anak</th>
                                    <th>Umur</th>
                                    <th>Nama Ortu</th>
                                    <th>BB</th>
                                    <th>TB</th>
                                    <th>LILA</th>
                                    <th>LIKA</th>
                                    <th>Status Gizi</th>
                                </tr>';

                    $i = 1;
                    foreach ($penimbangan as $pen) {
                        // Pastikan hanya menampilkan data penimbangan yang sesuai dengan jadwal posyandu yang dipilih
                        if ($pen['idjadwal'] == $jadwal['idjadwal']) {
                            $id_balita = $pen['id_balita'];
                            $data_balita = query("SELECT * FROM balita WHERE id_balita = $id_balita")[0];

                            $id_ibu = $data_balita['id_user'];
                            $data_ibu = query("SELECT nama FROM user WHERE id_user = $id_ibu")[0];

                            $bulan_ = cari_bulan($data_balita['tanggal_lahir']);

                            $umur = '';
                            if ($bulan_ > 11) {
                                $tahun_ = floor($bulan_ / 12);
                                $umur = $tahun_ . ' tahun';
                            } else {
                                $umur = $bulan_ . ' bulan';
                            }

                            $html .= '<tr>
                                        <td>' . $i . '</td>
                                        <td>' . $data_balita['nama_balita'] . '</td>
                                        <td>' . $umur . '</td>
                                        <td>' . $data_ibu['nama'] . " - " . $data_balita['nama_ayah'] . '</td>
                                        <td>' . $pen['berat_badan'] . '</td>
                                        <td>' . $pen['tinggi_badan'] . '</td>
                                        <td>' . $pen['lila'] . '</td>
                                        <td>' . $pen['lika'] . '</td>
                                        <td>' . $pen['status_gizi'] . '</td>
                                    </tr>';
                            $i++;
                        }
                    }

                    $html .= '</table>';
                } else {
                    $html .= '<h5>Tidak ada balita yang melakukan penimbangan pada posyandu ' . $nama_posyandu . ' di bulan ini</h5>';
                }
            }
            $html .= '</div>';
        }
    }

    $html .= '</body>
</html>';

    // Aktifkan fitur header
    $options = $dompdf->getOptions();
    $options->setIsPhpEnabled(true);
    $options->setIsHtml5ParserEnabled(true);
    $options->setIsFontSubsettingEnabled(true);
    $options->setIsRemoteEnabled(true);
    $options->setDefaultFont('Helvetica');
    $options->setChroot(__DIR__);

    $dompdf->setOptions($options);
    $dompdf->setHttpContext(
        stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ])
    );

    // Memasukkan konten HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Render HTML ke PDF
    $dompdf->render();

    // Ambil output PDF dan tutup output buffer
    $pdfData = $dompdf->output();

    // Tampilkan pratinjau PDF di browser
    echo base64_encode($pdfData);
}
?>