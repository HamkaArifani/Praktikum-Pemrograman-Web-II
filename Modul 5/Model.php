<?php
require_once 'Koneksi.php';

function insertBuku($judul, $penulis, $penerbit, $tahun){
    global $pdo_conn;

    try{
        $query = "INSERT INTO buku(judul_buku, penulis, penerbit, tahun_terbit)
        VALUES(:judul, :penulis, :penerbit, :tahun)";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':penerbit', $penerbit);
        $stmt->bindParam(':tahun', $tahun, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e){
        die("Error Pada Saat Menambahkan Buku: " . $e->getMessage());
    }
}

function deleteBuku($id){
    global $pdo_conn;

    try{
        $query = "DELETE FROM buku WHERE id_buku=:id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }catch(PDOException $e){
        die("Error Pada Saat Menghapus Buku: " . $e->getMessage());
    }
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun){
    global $pdo_conn;

    try {
        $query = "UPDATE buku set
        judul_buku = :judul,
        penulis = :penulis,
        penerbit = :penerbit,
        tahun_terbit = :tahun
        WHERE id_buku = :id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':penerbit', $penerbit);
        $stmt->bindParam(':tahun', $tahun, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e){
        die("Error Pada Saat Mengupdate buku: " . $e->getMessage());
    }
}

function getBukuById($id){
    global $pdo_conn;

    try{
        $query = "SELECT * FROM buku WHERE id_buku=:id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Mencari Buku Berdasarkan Id: " . $e->getMessage());
    }
}

function getTotalRows($table) {
    global $pdo_conn;

    try {
        $allowed_tables = ['member', 'buku', 'peminjaman'];
        if (!in_array($table, $allowed_tables)) {
            throw new Exception("Tabel tidak valid");
        }

        $query = "SELECT COUNT(*) FROM $table";
        $stmt = $pdo_conn->query($query);
        return $stmt->fetchColumn();
    } catch (Exception $e) {
        die("Error Pada Saat Menghitung Jumlah Baris dari Table: " . $e->getMessage());
    }
}

function getBukuWithPaging($limit, $offset){
    global $pdo_conn;

    try{
        $query = "SELECT * FROM buku LIMIT :limit OFFSET :offset";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Membagi Buku Dengan Paging: " . $e->getMessage());
    }
}

function getAllBuku(){
    global $pdo_conn;

    try{
        $query = "SELECT * FROM buku";
        $stmt = $pdo_conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Menampilkan Semua Buku" . $e->getMessage());
    }
}

// ===============
// Function Member
// ===============

function insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar){
    global $pdo_conn;

    try{
        $query = "INSERT INTO member(nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar)
                  VALUES(:nama, :nomor, :alamat, :tgl_mendaftar, :tgl_terakhir_bayar)";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nomor', $nomor);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':tgl_mendaftar', $tgl_mendaftar);
        $stmt->bindParam(':tgl_terakhir_bayar', $tgl_terakhir_bayar);
        return $stmt->execute();
    } catch (PDOException $e){
        die("Error Pada Saat Menambahkan Member: " . $e->getMessage());
    }
}

function deleteMember($id){
    global $pdo_conn;

    try{
        $query = "DELETE FROM member WHERE id_member=:id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }catch(PDOException $e){
        die("Error Pada Saat Menghapus Member: " . $e->getMessage());
    }
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_terakhir_bayar){
    global $pdo_conn;

    try {
        $query = "UPDATE member SET
                    nama_member = :nama,
                    nomor_member = :nomor,
                    alamat = :alamat,
                    tgl_terakhir_bayar = :tgl_terakhir_bayar
                  WHERE id_member = :id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nomor', $nomor);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':tgl_terakhir_bayar', $tgl_terakhir_bayar);
        return $stmt->execute();
    } catch (PDOException $e){
        die("Error Pada Saat Mengupdate Member: " . $e->getMessage());
    }
}

function getMemberById($id){
    global $pdo_conn;

    try{
        $query = "SELECT * FROM member WHERE id_member=:id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Mencari Member Berdasarkan Id: " . $e->getMessage());
    }
}

function getMemberWithPaging($limit, $offset){
    global $pdo_conn;

    try{
        $query = "SELECT * FROM member LIMIT :limit OFFSET :offset";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Membagi Member Dengan Paging: " . $e->getMessage());
    }
}

function getAllMember(){
    global $pdo_conn;

    try{
        $query = "SELECT * FROM member";
        $stmt = $pdo_conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Menampilkan Semua Member" . $e->getMessage());
    }
}

// ===================
// Function Peminjaman
// ===================

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali){
    global $pdo_conn;

    try{
        $query = "INSERT INTO peminjaman(id_member, id_buku, tgl_pinjam, tgl_kembali)
                  VALUES(:id_member, :id_buku, :tgl_pinjam, :tgl_kembali)";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id_member', $id_member, PDO::PARAM_INT);
        $stmt->bindParam(':id_buku', $id_buku, PDO::PARAM_INT);
        $stmt->bindParam(':tgl_pinjam', $tgl_pinjam);
        $stmt->bindParam(':tgl_kembali', $tgl_kembali);
        return $stmt->execute();
    } catch (PDOException $e){
        die("Error Pada Saat Menambahkan Peminjaman: " . $e->getMessage());
    }
}

function deletePeminjaman($id){
    global $pdo_conn;

    try{
        $query = "DELETE FROM peminjaman WHERE id_peminjaman=:id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }catch(PDOException $e){
        die("Error Pada Saat Menghapus Peminjaman: " . $e->getMessage());
    }
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali){
    global $pdo_conn;

    try {
        $query = "UPDATE peminjaman SET
                    id_member = :id_member,
                    id_buku = :id_buku,
                    tgl_pinjam = :tgl_pinjam,
                    tgl_kembali = :tgl_kembali
                  WHERE id_peminjaman = :id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':id_member', $id_member, PDO::PARAM_INT);
        $stmt->bindParam(':id_buku', $id_buku, PDO::PARAM_INT);
        $stmt->bindParam(':tgl_pinjam', $tgl_pinjam);
        $stmt->bindParam(':tgl_kembali', $tgl_kembali);
        return $stmt->execute();
    } catch (PDOException $e){
        die("Error Pada Saat Mengupdate Peminjaman: " . $e->getMessage());
    }
}

function getPeminjamanById($id){
    global $pdo_conn;

    try{
        $query = "SELECT * FROM peminjaman WHERE id_peminjaman=:id";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Mencari Peminjaman Berdasarkan Id: " . $e->getMessage());
    }
}

function getPeminjamanWithPaging($limit, $offset){
    global $pdo_conn;

    try{
        $query = "SELECT peminjaman.*, member.nama_member, buku.judul_buku 
                  FROM peminjaman
                  JOIN member ON peminjaman.id_member = member.id_member
                  JOIN buku ON peminjaman.id_buku = buku.id_buku 
                  LIMIT :limit OFFSET :offset";
        $stmt = $pdo_conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error Pada Saat Membagi Peminjaman Dengan Paging: " . $e->getMessage());
    }
}

?>
