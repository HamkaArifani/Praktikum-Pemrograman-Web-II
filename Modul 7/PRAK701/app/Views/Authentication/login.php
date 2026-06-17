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
        
        <h2>Sign In to Librazy</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-100 text-red-600 text-xs p-3 rounded-md mb-6">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post" novalidate>
            <?= csrf_field() ?>

            <div class="mb-[35px]">
                <label for="email" class="block text-xs font-medium text-[#94a3b8] mb-1">Alamat Email</label>
                <input type="email" id="email" name="email" value="<?= old('email') ?>" placeholder="contoh@domain.com"
                       class="w-full py-2 bg-transparent text-[15px] text-[#334155] outline-none transition-all duration-200 border-b <?= $validation->hasError('email') ? 'border-red-500 focus:border-red-600' : 'border-[#e2e8f0] focus:border-b-2 focus:border-[#10b981]' ?>">
                <?php if ($validation->hasError('email')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= $validation->getError('email') ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-[35px]">
                <label for="password" class="block text-xs font-medium text-[#94a3b8] mb-1">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="••••••••"
                       class="w-full py-2 bg-transparent text-[15px] text-[#334155] outline-none transition-all duration-200 border-b <?= $validation->hasError('password') ? 'border-red-500 focus:border-red-600' : 'border-[#e2e8f0] focus:border-b-2 focus:border-[#10b981]' ?>">
                <?php if ($validation->hasError('password')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= $validation->getError('password') ?></p>
                <?php endif; ?>
            </div>

            <div class="flex justify-end gap-3 mt-10">
                <button type="submit" class="bg-[#10b981] hover:bg-[#059669] text-white px-6 py-3 rounded-lg text-sm font-semibold active:scale-[0.98] transition-all duration-200 ease-in-out">
                    Masuk
                </button>
            </div>

            <p class="text-xs text-center text-[#94a3b8] mt-6">
                Belum memiliki akun? 
                <a href="<?= base_url('register') ?>" class="text-[#10b981] font-semibold hover:underline">Daftar di sini</a>
            </p>
        </form>
    </div>

</body>
</html>