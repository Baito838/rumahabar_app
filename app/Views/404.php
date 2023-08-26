<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script defer src="<?= base_url() ?>/script/script.js"></script>
    <script defer src="<?= base_url() ?>/script/pure-snow.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .error {
            background-image: url("<?= base_url() ?>/landingpage/arabic.png");
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100%;
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

        @font-face {
            font-family: basmala;
            src: url('<?= base_url() ?>/font/Basmala.ttf');
        }

        h2 {
            font-family: 'basmala';
            color: #FE6C0D;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="error d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center py-4">
            <img class="hidden" src="<?= base_url() ?>/logo/logo.png" style="max-width: 300px; width: 100%; height: auto; object-fit: cover;" alt="">
            <br>
            <h2 class="hidden">Halaman Tidak ditemukan</h2>
            <a href="/" class='text-center hidden'>
                <button class="btn btn-success">
                    Kembali ke Halaman Utama
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>