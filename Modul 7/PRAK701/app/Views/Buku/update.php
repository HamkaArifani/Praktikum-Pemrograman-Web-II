<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8fafc] font-sans flex justify-center items-center min-h-screen p-5">

    <div class="bg-white px-10 py-[45px] rounded-xl shadow-[0_4px_30px_rgba(0,0,0,0.03)] w-full max-w-[500px]">
        
        <h2>Ubah Informasi Buku</h2>

        <form action="<?= base_url('buku/update/' . $buku['id']) ?>" method="post" novalidate>
            <?= csrf_field() ?>

            <div class="mb-[35px]">
                <label for="judul" class="block text-xs font-medium text-[#94a3b8] mb-1">Judul Buku</label>
                <input type="text" id="judul" name="judul" value="<?= old('judul', $buku['judul']) ?>"
                       class="w-full py-2 bg-transparent text-[15px] text-[#334155] outline-none transition-all duration-200 border-b <?= $validation->hasError('judul') ? 'border-red-500 focus:border-red-600' : 'border-[#e2e8f0] focus:border-b-2 focus:border-[#10b981]' ?>">
                <?php if ($validation->hasError('judul')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= $validation->getError('judul') ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-[35px]">
                <label for="penulis" class="block text-xs font-medium text-[#94a3b8] mb-1">Nama Penulis</label>
                <input type="text" id="penulis" name="penulis" value="<?= old('penulis', $buku['penulis']) ?>"
                       class="w-full py-2 bg-transparent text-[15px] text-[#334155] outline-none transition-all duration-200 border-b <?= $validation->hasError('penulis') ? 'border-red-500 focus:border-red-600' : 'border-[#e2e8f0] focus:border-b-2 focus:border-[#10b981]' ?>">
                <?php if ($validation->hasError('penulis')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= $validation->getError('penulis') ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-[35px]">
                <label for="penerbit" class="block text-xs font-medium text-[#94a3b8] mb-1">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" value="<?= old('penerbit', $buku['penerbit']) ?>"
                       class="w-full py-2 bg-transparent text-[15px] text-[#334155] outline-none transition-all duration-200 border-b <?= $validation->hasError('penerbit') ? 'border-red-500 focus:border-red-600' : 'border-[#e2e8f0] focus:border-b-2 focus:border-[#10b981]' ?>">
                <?php if ($validation->hasError('penerbit')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= $validation->getError('penerbit') ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-[35px]">
                <label for="tahun_terbit" class="block text-xs font-medium text-[#94a3b8] mb-1">Tahun Terbit</label>
                <input type="number" id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit', $buku['tahun_terbit']) ?>"
                       class="w-full py-2 bg-transparent text-[15px] text-[#334155] outline-none transition-all duration-200 border-b <?= $validation->hasError('tahun_terbit') ? 'border-red-500 focus:border-red-600' : 'border-[#e2e8f0] focus:border-b-2 focus:border-[#10b981]' ?>">
                <?php if ($validation->hasError('tahun_terbit')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= $validation->getError('tahun_terbit') ?></p>
                <?php endif; ?>
            </div>

            <div class="flex justify-end items-center gap-3 mt-10">
                <a href="<?= base_url('buku/table') ?>" class="bg-[#ef4444] text-white hover:bg-[#dc2626] px-5 py-2.5 rounded-md text-sm font-medium text-center transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" class="bg-[#10b981] hover:bg-[#059669] text-white px-6 py-2.5 rounded-lg text-sm font-semibold active:scale-[0.98] transition-all duration-200 ease-in-out">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>
</html>