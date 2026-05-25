<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Edit Member</title>
        <link rel="stylesheet" href="FormStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once 'Model.php';

        if (isset($_GET['id'])) {
            $id_member = $_GET['id'];
            $member = getMemberById($id_member);

            if (!$member) {
                header("Location: Member.php");
                exit();
            }
        } else {
            header("Location: Member.php");
            exit();
        }

        if(isset($_POST['btn_simpan'])){
            $id_member = $_POST['id_member'];
            $nama_member = $_POST['nama'];
            $nomor_member = $_POST['nomor'];
            $alamat = $_POST['alamat'];
            $tgl_daftar = $_POST['tgl_daftar'];
            $tgl_bayar = $_POST['tgl_bayar'];

            updateMember($id_member, $nama_member, $nomor_member, $alamat, $tgl_daftar, $tgl_bayar);

            header("Location: Member.php");
            exit();
        }
        ?>
        <div class="card-form">
            <h2>Edit Data Member</h2>

            <form method="post">
                <input type="hidden" name="id_member" value="<?= $member['id_member']; ?>">

                <div class="form-group">
                    <label for="nama">Nama Member:</label>
                    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($member['nama_member']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nomor">Nomor Member:</label>
                    <input type="text" id="nomor" name="nomor" value="<?= htmlspecialchars($member['nomor_member']); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($member['alamat']); ?>" required>
                </div>
                
                <div class="form-group">
                    <span class="date-label">Tanggal Mendaftar:</span>
                    <?php $formatted_daftar = date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])); ?>
                    <input type="datetime-local" id="tgl_daftar" name="tgl_daftar" value="<?= $formatted_daftar; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <span class="date-label">Tanggal Terakhir Pembayaran:</span>
                    <input type="date" id="tgl_bayar" name="tgl_bayar" value="<?= htmlspecialchars($member['tgl_terakhir_bayar']); ?>" required>
                </div>

                <div class="button-group">
                    <a href="Member.php" class="btn-batal">Batal</a>
                    <button type="submit" class="btn-simpan" name="btn_simpan">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </body>
</html>