<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Buku</title>
        <link rel="stylesheet" href="FormStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once 'Model.php';
        if(isset($_POST['btn_simpan'])){
            $judul_buku=$_POST['judul'];
            $penulis=$_POST['penulis'];
            $penerbit=$_POST['penerbit'];
            $tahun_terbit=$_POST['tahun'];

            insertBuku($judul_buku, $penulis, $penerbit, $tahun_terbit);

            header("Location: Buku.php");
            exit();
        }
        ?>
        <div class="card-form">
            <h2>Tambahkan Buku Baru</h2>
            
            <form method="post">
                <div class="form-group">
                    <label for="judul">Judul Buku:</label>
                    <input type="text" id="judul" name="judul" required>
                </div>

                <div class="form-group">
                    <label for="penulis">Penulis Buku:</label>
                    <input type="text" id="penulis" name="penulis" required>
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit Buku:</label>
                    <input type="text" id="penerbit" name="penerbit" required>
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun Terbit Buku:</label>
                    <input type="number" id="tahun" name="tahun" min="1900" max="2026"required>
                </div>

                <div class="button-group">
                    <a href="Buku.php" class="btn-batal">Batal</a>
                    <button type="submit" class="btn-simpan" name="btn_simpan">Simpan Buku</button>
                </div>
            </form>
        </div>
    </body>
</html>