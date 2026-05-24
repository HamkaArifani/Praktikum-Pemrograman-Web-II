<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Librazy</title>
    <link rel="stylesheet" href="TableStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require_once 'Model.php';

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    

    if(isset($_POST['btn_hapus']) && isset($_POST['id_buku'])){
        $id_hapus = $_POST['id_buku'];
        deleteBuku($id_hapus);

        header("Location: Buku.php?page=" . $page);
        exit();
    }

    $limit = 5;
    $offset = ($page - 1) * $limit; 

    $total_data = getTotalRows('buku'); 
    $total_pages = ceil($total_data / $limit);

    if ($page > $total_pages && $total_pages > 0) {
        header("Location: Buku.php?page=" . $total_pages);
        exit();
    }

    $data_buku = getBukuWithPaging($limit, $offset); 
    ?>
    <div class="card-table">
        <a href="Home.html" class="btn-top-back">&larr; Kembali</a>
        
        <div class="table-header" style="margin-top: 20px;">
            <h2>Daftar Buku</h2>
            <a href="FormBuku.php" class="btn-tambah">+ Tambah Koleksi Buku</a>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>JUDUL BUKU</th>
                    <th>NAMA PENULIS</th>
                    <th>NAMA PENERBIT</th>
                    <th>TAHUN TERBIT</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = $offset + 1; 
                foreach ($data_buku as $buku): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($buku['judul_buku']); ?></td>
                    <td><?= htmlspecialchars($buku['penulis']); ?></td>
                    <td><?= htmlspecialchars($buku['penerbit']); ?></td>
                    <td><?= htmlspecialchars($buku['tahun_terbit']); ?></td>
                    <td>
                        <div class="action-group">
                            <a href="FormEditBuku.php?id=<?= $buku['id_buku']; ?>" class="btn-edit">Edit</a>
                            
                            <form method="post" action="Buku.php?page=<?= $page; ?>" onsubmit="return confirm('Yakin ingin menghapus buku ini?')" style="display: inline;">
                                <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                                <button type="submit" name="btn_hapus" class="btn-hapus">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="Buku.php?page=<?= $page - 1; ?>">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page): ?>
                    <span class="active-page"><?= $i; ?></span>
                <?php else: ?>
                    <a href="Buku.php?page=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="Buku.php?page=<?= $page + 1; ?>">Next &raquo;</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>