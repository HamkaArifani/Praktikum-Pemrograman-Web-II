<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member - Librazy</title>
    <link rel="stylesheet" href="TableStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require_once 'Model.php';

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;

    if(isset($_POST['btn_hapus']) && isset($_POST['id_member'])){
        $id_hapus = $_POST['id_member'];
        deleteMember($id_hapus);

        header("Location: Member.php?page=" . $page);
        exit();
    }

    $limit = 5;
    $offset = ($page - 1) * $limit;

    $total_data = getTotalRows('member'); 
    $total_pages = ceil($total_data / $limit);

    if ($page > $total_pages && $total_pages > 0) {
        header("Location: Member.php?page=" . $total_pages);
        exit();
    }

    $data_member = getMemberWithPaging($limit, $offset); 
    ?>
    <div class="card-table">
        <a href="Home.html" class="btn-top-back">&larr; Kembali</a>
        
        <div class="table-header" style="margin-top: 20px;">
            <h2>Daftar Member</h2>
            <a href="FormMember.php" class="btn-tambah">+ Registrasi Member Baru</a>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA MEMBER</th>
                    <th>NOMOR MEMBER</th>
                    <th>ALAMAT</th>
                    <th>TANGGAL DAFTAR</th>
                    <th>TERAKHIR MEMBAYAR</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = $offset + 1; 
                foreach ($data_member as $member): 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($member['nama_member']); ?></td>
                    <td><?= htmlspecialchars($member['nomor_member']); ?></td>
                    <td><?= htmlspecialchars($member['alamat']); ?></td>
                    <td><?= htmlspecialchars($member['tgl_mendaftar']); ?></td>
                    <td><?= htmlspecialchars($member['tgl_terakhir_bayar']); ?></td>
                    <td>
                        <div class="action-group">
                            <a href="FormEditMember.php?id=<?= $member['id_member']; ?>" class="btn-edit">Edit</a>

                             <form method="post" action="Member.php?page=<?= $page; ?>" onsubmit="return confirm('Yakin ingin menghapus member ini?')" style="display: inline;">
                                <input type="hidden" name="id_member" value="<?= $member['id_member']; ?>">
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
                <a href="Member.php?page=<?= $page - 1; ?>">&laquo; Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page): ?>
                    <span class="active-page"><?= $i; ?></span>
                <?php else: ?>
                    <a href="Member.php?page=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="Member.php?page=<?= $page + 1; ?>">Next &raquo;</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>