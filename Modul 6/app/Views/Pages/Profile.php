<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $Profile['Web_Title']; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }
            body{
                background-color: #0f2544;
                color: #ecf0f1;
                display: flex;
                flex-direction: column;
            }
            .navbar-custom {
                background-color: #0f2544;
            }
            .card-custom {
                background-color: #4a94fc;
                border-radius: 30px;
                border: none;
                position: relative;
                padding: 30px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                display: inline-block;
            }
            .image-3d{
                width: 100%;
                max-width: 320px;
                height: auto;
                border-radius: 30px;
                transform: translateY(-20px); 
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
                object-fit: cover;
                transition: transform 0.3s ease;
            }
            .image-3d:hover{
                transform: translateY(-30px) scale(1.03);
            }
            .bio-text {
                margin-bottom: 15px !important;
                line-height: 1.6;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container">
                <a class="navbar-brand fw-bold" href="<?= base_url('/'); ?>">
                    <?= $Profile['Web_Title']; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/'); ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="<?= base_url('profil'); ?>">Profil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="row align-items-center w-100 gy-5">
                <div class="col-md-7 text-start">
                    <h2 class="display-4 fw-bold text-white mb-4">Profile</h2>

                    <div class="ps-2" style="border-left: 3px solid #4a94fc;">
                        <p class="fs-5 text-light opacity-90 bio-text">
                        <strong>Nama:</strong> <?= $Profile['Name']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>NIM:</strong> <?= $Profile['NIM']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Program Studi:</strong> <?= $Profile['Major']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Hobi:</strong> <?= $Profile['Hobby']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Skill:</strong> <?= $Profile['Skill']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Bahasa Pemrograman yang Sedang Dipelajari:</strong> <?= $Profile['Programming_Language']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Pengalaman Lomba:</strong> <?= $Profile['Competition_Experience']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Prestasi:</strong> <?= $Profile['Achievement']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Organisasi:</strong> <?= $Profile['Organization']; ?>
                        </p>  
                        <p class="fs-5 text-light opacity-90 bio-text">
                            <strong>Pengalaman Project:</strong> <?= $Profile['Project_Experience']; ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-5 text-center text-md-end mt-5 mt-md-0">
                    <div class="card-custom text-center mx-auto me-md-0">
                        <img src="<?= base_url('images/' . $Profile['Image']); ?>" alt="Foto Profil" class="image-3d">
                    </div>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>