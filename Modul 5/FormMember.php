<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pendaftaran Member</title>
        <link rel="stylesheet" href="FormStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once 'Model.php';

        date_default_timezone_set('Asia/Makassar');
        $datetoday = date('Y-m-d\TH:i');

        if(isset($_POST['btn_daftar'])){
            $nama_member=$_POST['nama'];
            $nomor_member=$_POST['nomor'];
            $alamat=$_POST['alamat'];
            $tgl_daftar=$_POST['tgl_daftar'];
            $tgl_bayar=$_POST['tgl_bayar'];

            insertMember($nama_member, $nomor_member, $alamat, $tgl_daftar, $tgl_bayar);

            header("Location: Member.php");
            exit();
        }
        ?>
        <div class="card-form">
            <h2>Pendaftaran Member Perpustakaan</h2>

            <form method="post">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="nomor">Nomor Member:</label>
                    <?php
                    $member_number= date('dmy') . rand(100, 999);
                    ?>
                    <input type="text" id="nomor" name="nomor" value="<?php echo $member_number?>" readonly>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" required>
                </div>
                
                <div class="form-group">
                    <label for="tgl_daftar">Tanggal Mendaftar:</label>
                    <input type="datetime-local" id="tgl_daftar" name="tgl_daftar" value="<?php echo $datetoday ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label for="tgl_bayar">Tanggal Terakhir Pembayaran:</label>
                    <input type="date" id="tgl_bayar" name="tgl_bayar" required>
                </div>

                <div class="button-group">
                    <a href="Home.html" class="btn-batal">Batal</a>
                    <button type="submit" class="btn-daftar" name="btn_daftar">Daftar</button>
                </div>
            </form>
        </div>
    </body>
</html>