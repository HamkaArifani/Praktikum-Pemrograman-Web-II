<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8fafc] font-sans flex justify-center items-start min-h-screen px-5 py-10">

    <div class="bg-white p-10 rounded-xl shadow-[0_4px_30px_rgba(0,0,0,0.03)] w-full max-w-[1200px]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-[30px] border-b border-slate-100 pb-5">
            <div>
                <h2 class="text-2xl font-bold text-[#1e293b]">Daftar Koleksi Buku</h2>
                <p class="text-xs text-slate-400 mt-1">
                    Selamat datang kembali, <span class="font-semibold text-[#10b981]"><?= esc(session()->get('username')) ?></span>
                </p>
            </div>
            
            <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto justify-end">
                <a href="<?= base_url('/buku') ?>" class="bg-[#e2e8f0] text-[#475569] hover:bg-[#cbd5e1] px-4 py-2 rounded-[6px] text-sm font-medium transition-colors duration-200">
                    &larr; Beranda
                </a>
                
                <a href="<?= base_url('/buku/create') ?>" class="bg-[#10b981] text-white hover:bg-[#059669] px-5 py-2.5 rounded-[6px] text-sm font-semibold transition-colors duration-200">
                    + Tambah Buku
                </a>

                <a href="<?= base_url('logout') ?>" onclick="return confirm('Apakah kamu yakin ingin logout?')" class="bg-[#ef4444] text-white hover:bg-[#dc2626] px-4 py-2.5 rounded-[6px] text-sm font-semibold transition-colors duration-200 shadow-sm">
                    Logout
                </a>
            </div>
        </div>

        <?php if (isset($success)): ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-md mb-6 text-sm"><?= $success ?></div>
        <?php endif; ?>

        <table class="w-full border-collapse text-[15px] text-[#334155] mb-[30px]">
            <thead>
                <tr class="bg-[#10b981] text-white text-left font-semibold tracking-[0.5px]">
                    <th class="p-4 rounded-l-[8px] text-center w-16">No</th>
                    <th class="p-4">Judul Buku</th>
                    <th class="p-4">Penulis</th>
                    <th class="p-4">Penerbit</th>
                    <th class="p-4 w-28 text-center">Tahun Terbit</th>
                    <th class="p-4 rounded-r-[8px] w-40 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#f1f5f9]">
                <?php if (empty($Buku)): ?>
                    <tr>
                        <td colspan="6" class="p-5 text-center text-slate-400 italic">Belum ada data buku.</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($Buku as $b) : ?>
                        <tr>
                            <td class="p-5 text-center text-slate-400 align-middle"><?= $no++ ?></td>
                            <td class="p-5 font-medium text-slate-900 align-middle"><?= esc($b['judul']) ?></td>
                            <td class="p-5 align-middle"><?= esc($b['penulis']) ?></td>
                            <td class="p-5 align-middle"><?= esc($b['penerbit']) ?></td>
                            <td class="p-5 text-center align-middle"><?= esc($b['tahun_terbit']) ?></td>
                            <td class="p-5 align-middle">
                                <div class="flex gap-2 justify-center">
                                    <a href="<?= base_url('/buku/edit/' . $b['id']) ?>" class="bg-[#f59e0b] hover:bg-[#d97706] text-white px-3 py-1.5 rounded-[6px] text-e font-semibold transition-colors duration-200 text-[13px]">
                                        Edit
                                    </a>
                                    <a href="<?= base_url('/buku/delete/' . $b['id']) ?>" onclick="return confirm('Yakin ingin menghapus buku ini?')" class="bg-[#ef4444] hover:bg-[#dc2626] text-white px-3 py-1.5 rounded-[6px] text-e font-semibold transition-colors duration-200 text-[13px]">
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>