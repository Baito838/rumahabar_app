<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $page ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/308efbf9d4.js" crossorigin="anonymous"></script>

    <!-- My Script -->
    <script defer src="<?= base_url() ?>/script/script.js"></script>
    <script defer src="<?= base_url() ?>/script/pure-snow.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icon Website -->
    <link rel="shortcut icon" href="<?= base_url() ?>logo/top.png" type="image/x-icon">

    <!-- Jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        * {
            padding: 0;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #00593B;
        }

        html {
            scroll-behavior: smooth;
        }

        section {
            width: 100%;
            min-height: 100vh;
            max-height: max-content;
        }

        body {
            overflow-x: hidden;
            background-image: url("<?= base_url() ?>/landingpage/arabic.png");
            width: 100%;
            height: max-content;
            background-repeat: repeat-y;
            background-size: 100%;
        }


        @font-face {
            font-family: basmala;
            src: url('<?= base_url() ?>/font/Basmala.ttf');
        }

        h1 {
            font-family: 'basmala';
            color: #FE6C0D;
            padding-bottom: 20px;
        }

        .snowflake {
            position: absolute;
            width: 10px;
            height: 10px;
            background: linear-gradient(white, white);
            border-radius: 50%;
            filter: drop-shadow(0 0 10px white);
        }

        .hidden {
            opacity: 0;
            transform: scale(0.5);
            transition: all 2s;
        }

        .show {
            opacity: 1;
            transform: scale(1);
        }

        .ayat {
            font-size: larger;
        }

        .nav-link {
            color: #00593B;
        }

        .card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 2px solid #00593B;
        }

        .ul-visi {
            list-style: none;
        }

        .li-visi::before {
            content: "➥ ";
            color: #fe6c0d;
        }

        .login-menu .dropdown-menu {
            left: -100px;
        }

        .sub-title {
            background-color: #00593B;
            color: white;
            padding: 2px 5px;
            border-radius: 10px;
        }

        a {
            text-decoration: none;
        }

        #hero {
            background-image: url("<?= base_url() ?>/landingpage/hero.png");
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .subtitle-hero {
            color: #00593B;
            max-width: 900px;
            margin-top: 20px;
            text-shadow: 2px 2px 5px white;
        }

        #ayat {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #visi {
            display: flex;
            flex-direction: column;
            background-color: #FFFFF0;
            padding: 50px 0;
        }

        #visi .card {
            max-width: 620px;

        }

        #galeri {
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            height: max-content;
        }

        .galery {
            width: 100%;
            height: max-content;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 0 50px 20px 50px;
        }

        .galery img {
            border-radius: 10px;
            width: 100%;
            max-width: 250px;
            height: 300px;
            object-fit: cover;
            background-size: cover;
            border: 2px solid #00593B;
            padding: 2px;
        }

        .hero-galery {
            border-radius: 10px;
            overflow: hidden;
            padding: 0 50px;
        }

        .galeri-hero {
            max-width: 1050px;
            width: 100%;
            height: auto;
            border-radius: 10px;
            border: 2px solid #00593B;
            padding: 2px;
        }



        #sejarah {
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding-top: 50px;
            padding-bottom: 50px;
            height: min-content;
        }

        #sejarah .card {
            width: 100%;
            max-width: 500px;
        }

        #sejarah img {
            height: 400px;
            width: auto;
        }


        #pendaftaran,
        #kegiatan,
        #struktur,
        #legalitas {
            padding: 50px 0;
            background-color: #FFFFF0;
        }

        #tata_tertib,
        #donasi {
            padding: 50px 0;
        }

        #lokasi {
            padding: 50px 100px;
        }

        .profile {
            width: 20px;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile_android {
            display: none;
        }


        @media(max-width: 1012px) {
            .profile {
                display: none;
            }

            .profile_android {
                border-radius: 50%;
                display: block;
                max-width: 200px;
                width: 100%;
                aspect-ratio: 1/1;
            }
        }


        @media(max-width: 800px) {
            section {
                padding-top: 0px;
            }

            .login {
                text-align: center;
            }

            #pendaftaran,
            #tata_tertib,
            #kegiatan,
            #sejarah,
            #blog,
            #visi {
                padding: 0 10px;
            }

            #hero {
                background-position: left;
                padding: 0 20px;
            }

            #ayat,
            #bio {
                padding: 0 20px;
            }


            #galeri {
                background-color: #FFFFF0;
                padding: 0 10px;
            }

            #about,
            #donasi {
                padding: 0px 10px 20px 10px;
            }


            #lokasi {
                padding: 0px 10px 50px 10px;
            }

            .login-menu .dropdown-menu {
                left: 0;
            }
        }
    </style>
</head>

<body>

    <div style="position: absolute; z-index:99;" id="snow" count="200"></div>
    <div class="flash-data" data-flashdata="<?= session()->get('success'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->get('warning'); ?>"></div>
    <div class="flash-data-error" data-flashdata="<?= session()->get('error'); ?>"></div>







    <nav class="navbar sticky-top navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#hero">
                <img style="width: auto; height: 40px" src="logo/head logo.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if ($user != null) : ?>
                            <li class="d-flex justify-content-center">
                                <img class="profile_android" src="<?= base_url() ?>/login/profile/<?= $user['image'] ?>" alt="">
                            </li>
                        <?php endif; ?>
                        <li class="nav-item <?= ($url == "home") ? "active" : "" ?>">
                            <a class=" nav-link active" aria-current="page" href="/home">
                                Home
                            </a>
                        </li>
                        <li class="nav-item <?= ($url == "blogs") ? "active" : "" ?>">
                            <a class=" nav-link active" aria-current="page" href="/blogs">
                                Blog
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link <?= ($url == "pendaftaran") ? "active" : "" ?>" href="about" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pendaftaran
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link text-center" href="/pendaftaran#pendaftaran"> Pendaftaran </a></li>
                                <li><a class="nav-link text-center" href="/pendaftaran#tata_tertib"> Tata Tertib </a></li>
                                <li><a class="nav-link text-center" href="/pendaftaran#kegiatan">Kegiatan </a></li>
                                <li><a class="nav-link text-center" href="/pendaftaran#donasi"> Donasi Online </a></li>
                                <li><a class="nav-link text-center" href="/pendaftaran#lokasi"> Donasi Langsung </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link <?= ($url == "about") ? "active" : "" ?>" href="about" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tentang Kami
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link text-center" href="/about#visi"> Visi Misi </a></li>
                                <li><a class="nav-link text-center" href="/about#sejarah"> Sejarah </a></li>
                                <li><a class="nav-link text-center" href="/about#struktur"> Struktur </a></li>
                                <li><a class="nav-link text-center" href="/about#galeri"> Galery </a></li>
                                <li><a class="nav-link text-center" href="/about#legalitas"> Legalitas </a></li>
                            </ul>
                        </li>
                        <?php if ($user == null) : ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($url == "masuk" || $url == "register") ? "active" : "" ?>" href="masuk">Login</a>
                            </li>
                        <?php endif; ?>

                        <?php if ($user != null) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link <?= ($url == "masuk" || $url == "register") ? "active" : "" ?>" href="about" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="profile" src="<?= base_url() ?>/login/profile/<?= $user['image'] ?>" alt=""> <?= $user['username'] ?>
                                </a>
                                <ul class="dropdown-menu logan">
                                    <li><a class="nav-link" href="/dashboard"> Dashboard </a></li>
                                    <li><a class="nav-link" onclick="logout()"> Keluar </a></li>
                                </ul>
                            </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>


    <nav class="navbar navbar-light bg-light" style="height: 80px;">
        <div class="w-100 d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <a href="https://web.facebook.com/YayasanAbarRumahTahfidz">
                <p class="text-center"><i class="fa-brands fa-facebook"></i> yayasanabarrumahtahfidz</p>
            </a>
            <a href="https://www.instagram.com/yayasanabarrumahtahfidz/">
                <p class="text-center"><i class="fa-brands fa-instagram"></i> yayasanabarrumahtahfidz</p>
            </a>
            <a href="https://www.youtube.com/@YayasanAbarRumahTahfidz">
                <p class="text-center"><i class="fa-brands fa-youtube"></i> yayasanabarrumahtahfidz</p>
            </a>
            <a href="https://www.tiktok.com/@yayasanabarrumahtahfidz">
                <p class="text-center"><i class="fa-brands fa-tiktok"></i> yayasanabarrumahtahfidz</p>
            </a>

        </div>
        <div class="w-100 d-flex justify-content-center align-items-center">
            <p class="text-center">Copyright © 2023 Abar Rumah Tahfidz - All right reserved</p>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


    <!-- <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script> -->


    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            Swal.fire(
                title = 'Success',
                text = flashData,
                'success'
            );
        }

        const flashWarning = $('.flash-data-warning').data('flashdata');
        if (flashWarning) {
            Swal.fire(
                title = 'Cek Kembali',
                text = flashWarning,
                'warning'
            );
        }

        const flashError = $('.flash-data-error').data('flashdata');
        if (flashError) {
            Swal.fire(
                title = 'Stop',
                text = flashError,
                'error'
            );
        }

        function logout() {
            Swal.fire({
                text: "Yakin Ingin Keluar ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#D63131',
                cancelButtonColor: '#00593B',
                confirmButtonText: 'Keluar'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = 'logout';
                }
            })
        }
    </script>

</body>

</html>