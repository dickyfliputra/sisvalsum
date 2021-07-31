<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div style="text-align:center; font-family: Arial, Helvetica, sans-serif;">
        <h2>Surat Keterangan Hasil Pengujian Laboratorium</h2>
        <h3><?= $nama_pasien['jenis_pemeriksaan'] ?></h3>
    </div>
    <hr />
    <div style="margin-top: 40px;">
        <table style="width:100%">
            <tr>
                <th>Nama</th>
                <td>: <?= $nama_pasien['nama_pasien'] ?></td>
                <td rowspan="5"> <img src="assets/images/<?= $nama_pasien['qr_code'] ?>" alt=""></td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>: <?= $nama_pasien['nik'] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: <?= $nama_pasien['alamat_pasien'] ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>: <?= $nama_pasien['jk_pasien'] ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td>: <?= $nama_pasien['umur_pasien'] ?> Tahun</td>
            </tr>
            <tr>
                <th>Asal Surat</th>
                <td>: <?= $nama_pasien['asal_rs'] ?></td>
            </tr>
            <tr>
                <th rowspan="2">Tanggal dan Jam Periksa</th>
                <td> : <?= $nama_pasien['tanggal_periksa'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;<?= $nama_pasien['jam_periksa'] ?> WIB </td>
            </tr>
        </table>

    </div>

</body>

</html>