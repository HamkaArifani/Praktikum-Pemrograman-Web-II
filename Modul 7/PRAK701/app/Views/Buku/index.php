<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8fafc] font-sans flex justify-center items-center min-h-screen px-5">

    <div class="bg-white p-10 rounded-xl shadow-[0_4px_30px_rgba(0,0,0,0.03)] w-full max-w-md text-center border border-slate-100">
        <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-5 text-2xl font-bold">
            L
        </div>
        <h1 class="text-2xl font-bold text-[#1e293b] mb-2">Librazy</h1>
        <p class="text-sm text-slate-500 mb-8 leading-relaxed">Website Manajemen Buku Perpustakaan Modern</p>
        
        <a href="<?= base_url('/buku/tabel') ?>" class="block w-full bg-[#10b981] hover:bg-[#059669] text-white text-sm font-semibold py-3 px-5 rounded-md transition-colors duration-200 shadow-sm">
            Masuk ke Perpustakaan;
        </a>
    </div>

</body>
</html>