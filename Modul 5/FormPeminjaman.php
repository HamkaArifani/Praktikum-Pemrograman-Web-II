<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lakukan Peminjaman</title>
        <link rel="stylesheet" href="FormStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once 'Model.php';

        $data_member=getAllMember();
        $data_buku=getAllBuku();

        if(isset($_POST['btn_pinjam'])){
            $id_member=$_POST['member'];
            $id_buku=$_POST['buku'];
            $tgl_pinjam=$_POST['tgl_pinjam'];
            $tgl_kembali=$_POST['tgl_kembali'];

            insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);

            header("Location: Peminjaman.php");
            exit();
        }


        date_default_timezone_set('Asia/Makassar');
        $datetoday = date('Y-m-d');
        $dateintwoweeks = date('Y-m-d', strtotime($datetoday . '+2 weeks'));
        ?>
        <div class="card-form">
            <h2>Lakukan Peminjaman</h2>
            
            <form method="post">
                <div class="form-group">
                    <label for="member">Nama Member:</label>
                    <select name="member" id="member" required>
                        <option value="">Pilih Nama Member</option>
                        <?php foreach($data_member as $member): ?>
                            <option value="<?= $member['id_member']; ?>">
                                <?= $member['nama_member'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="buku">Judul Buku:</label>
                    <select name="buku" id="buku" required>
                        <option value="">Pilih Judul Buku</option>
                        <?php foreach($data_buku as $buku): ?>
                            <option value="<?= $buku['id_buku']; ?>">
                                <?= $buku['judul_buku'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tgl_pinjam">Tanggal Peminjaman:</label>
                    <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="<?php echo $datetoday ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="tgl_kembali">Tanggal Kembali:</label>
                    <input type="date" id="tgl_kembali" name="tgl_kembali" value="<?php echo $dateintwoweeks ?>">
                </div>

                <div class="button-group">
                    <a href="Home.html" class="btn-batal">Batal</a>
                    <button type="submit" class="btn-pinjam" name="btn_pinjam">Pinjam Buku</button>
                </div>
            </form>
        </div>
    </body>
</html>