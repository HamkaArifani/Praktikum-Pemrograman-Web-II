<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Edit Transaksi Peminjaman</title>
        <link rel="stylesheet" href="FormStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once 'Model.php';

        if (isset($_GET['id'])) {
            $id_peminjaman = $_GET['id'];
            $peminjaman = getPeminjamanById($id_peminjaman);

            if (!$peminjaman) {
                header("Location: Peminjaman.php");
                exit();
            }
        } else {
            header("Location: Peminjaman.php");
            exit();
        }

        $list_member = getAllMember(); 
        $list_buku = getAllBuku();

        if(isset($_POST['btn_simpan'])){
            $id_peminjaman = $_POST['id_peminjaman'];
            $id_member = $_POST['id_member'];
            $id_buku = $_POST['id_buku'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];

            updatePeminjaman($id_peminjaman, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);

            header("Location: Peminjaman.php");
            exit();
        }
        ?>
        <div class="card-form">
            <h2>Edit Transaksi Peminjaman</h2>

            <form method="post">
                <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman']; ?>">

                <div class="form-group">
                    <label for="id_member">Nama Peminjam (Member):</label>
                    <select id="id_member" name="id_member" required>
                        <?php foreach($list_member as $m): ?>
                            <option value="<?= $m['id_member']; ?>" <?= $m['id_member'] == $peminjaman['id_member'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($m['nama_member']); ?> (<?= htmlspecialchars($m['nomor_member']); ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_buku">Buku yang Dipinjam:</label>
                    <select id="id_buku" name="id_buku" required>
                        <?php foreach($list_buku as $b): ?>
                            <option value="<?= $b['id_buku']; ?>" <?= $b['id_buku'] == $peminjaman['id_buku'] ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($b['judul_buku']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <span class="date-label">Tanggal Pinjam:</span>
                    <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="<?= htmlspecialchars($peminjaman['tgl_pinjam']); ?>" required>
                </div>

                <div class="form-group">
                    <span class="date-label">Tanggal Kembali:</span>
                    <input type="date" id="tgl_kembali" name="tgl_kembali" value="<?= htmlspecialchars($peminjaman['tgl_kembali']); ?>" required>
                </div>

                <div class="button-group">
                    <a href="Peminjaman.php" class="btn-batal">Batal</a>
                    <button type="submit" class="btn-pinjam" name="btn_simpan">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </body>
</html>