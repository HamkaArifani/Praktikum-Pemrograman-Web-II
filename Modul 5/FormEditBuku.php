<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Edit Buku</title>
        <link rel="stylesheet" href="FormStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once 'Model.php';

        if (isset($_GET['id'])) {
            $id_buku = $_GET['id'];
            $buku = getBukuById($id_buku);

            if (!$buku) {
                header("Location: Buku.php");
                exit();
            }
        } else {
            header("Location: Buku.php");
            exit();
        }

        if(isset($_POST['btn_simpan'])){
            $id_buku = $_POST['id_buku'];
            $judul_buku = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun_terbit = $_POST['tahun'];

            updateBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit);

            header("Location: Buku.php");
            exit();
        }
        ?>
        <div class="card-form">
            <h2>Edit Data Buku</h2>
            
            <form method="post">
                <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

                <div class="form-group">
                    <label for="judul">Judul Buku:</label>
                    <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($buku['judul_buku']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="penulis">Penulis Buku:</label>
                    <input type="text" id="penulis" name="penulis" value="<?= htmlspecialchars($buku['penulis']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit Buku:</label>
                    <input type="text" id="penerbit" name="penerbit" value="<?= htmlspecialchars($buku['penerbit']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun Terbit Buku:</label>
                    <input type="number" id="tahun" name="tahun" min="1900" max="2026" value="<?= htmlspecialchars($buku['tahun_terbit']); ?>" required>
                </div>

                <div class="button-group">
                    <a href="Buku.php" class="btn-batal">Batal</a>
                    <button type="submit" class="btn-simpan" name="btn_simpan">Simpan Buku</button>
                </div>
            </form>
        </div>
    </body>
</html>