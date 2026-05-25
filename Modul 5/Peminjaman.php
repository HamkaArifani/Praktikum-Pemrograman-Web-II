<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman - Librazy</title>
    <link rel="stylesheet" href="TableStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require_once 'Model.php';

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;

    if(isset($_POST['btn_hapus']) && isset($_POST['id_pinjam'])){
        $id_hapus = $_POST['id_pinjam'];
        deletePeminjaman($id_hapus);

        header("Location: Peminjaman.php?page=" . $page);
        exit();
    }

    $limit = 5; 
    $offset = ($page - 1) * $limit;

    $total_data = getTotalRows('peminjaman'); 
    $total_pages = ceil($total_data / $limit);

    if ($page > $total_pages && $total_pages > 0) {
        header("Location: Peminjaman.php?page=" . $total_pages);
        exit();
    }

    $data_peminjaman = getPeminjamanWithPaging($limit, $offset); 
    ?>
    <div class="card-table">
        <a href="Home.php" class="btn-top-back">&larr; Kembali</a>
        
        <div class="table-header" style="margin-top: 20px;">
            <h2>Daftar Peminjaman</h2>
            <a href="FormPeminjaman.php" class="btn-tambah">+ Pinjam Buku</a>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA PEMINJAM</th>
                    <th>JUDUL BUKU</th>
                    <th>TANGGAL PINJAM</th>
                    <th>TANGGAL KEMBALI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = $offset + 1; 
                foreach ($data_peminjaman as $pinjam): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($pinjam['nama_member']); ?></td>
                    <td><?= htmlspecialchars($pinjam['judul_buku']); ?></td>
                    <td><?= htmlspecialchars($pinjam['tgl_pinjam']); ?></td>
                    <td><?= htmlspecialchars($pinjam['tgl_kembali']); ?></td>
                    <td>
                        <div class="action-group">
                            <a href="FormEditPeminjaman.php?id=<?= $pinjam['id_peminjaman']; ?>" class="btn-edit">Edit</a>
                            
                            <form method="post" action="Peminjaman.php?page=<?= $page; ?>" onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?')" style="display: inline;">
                                <input type="hidden" name="id_pinjam" value="<?= $pinjam['id_peminjaman']; ?>">
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
                <a href="Peminjaman.php?page=<?= $page - 1; ?>">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page): ?>
                    <span class="active-page"><?= $i; ?></span>
                <?php else: ?>
                    <a href="Peminjaman.php?page=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="Peminjaman.php?page=<?= $page + 1; ?>">Next &raquo;</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>