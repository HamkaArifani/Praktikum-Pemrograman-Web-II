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
            }
            .btn-transparan{
                background-color: transparent;
                color: #ecf0f1;
                border: 1px solid #ecf0f1;
                transition: all 0.3s ease;
            }
            .btn-transparan:hover {
                background-color: #00f0ff; 
                color: #ecf0f1; 
                box-shadow: 0 0 15px rgba(0, 240, 255, 0.4);
            }

        </style>
</head>
    </head>
    <Body>
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
                            <a class="nav-link active fw-bold" href="<?= base_url('/'); ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('profil'); ?>">Profil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container flex-grow-1 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-9">  
                    <div class="card card-custom shadow-lg rounded-4 p-5 text-center">
                        <div class="card-body">
                            <h2 class="display-4 fw-bold text-white mb-5">
                                Selamat Datang Di <?= $Profile['Web_Title']; ?>
                            </h2>
                            
                            <p class="fs-5 text-light opacity-75 mb-5">
                                Website ini dibuat oleh mahasiswa bernama <?= $Profile['Name']; ?>,
                                yang merupakan mahasiswa dari Prodi <?= $Profile['Major']; ?> Universitas Lambung Mangkurat dengan NIM <?= $Profile['NIM']; ?>,
                                di mana sama seperti mahasiswa lainnya Aku sedang berjuang untuk melewati berbagai tantangan
                                pada dunia perkuliahan, seperti tugas dan proyek. Ingin berkenalan lebih lanjut? Silahkan klik tombol di bawah ini
                                untuk melihat profil lengkapku, salam kenal!
                            </p>
                            
                            <a class="btn btn-transparan btn-lg px-3 text-light" href="<?= base_url('profil'); ?>">
                                More About Me
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </Body>
</html>