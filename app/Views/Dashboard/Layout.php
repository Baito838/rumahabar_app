<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $page ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>

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

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/fh-3.4.0/r-2.5.0/sc-2.2.0/sb-1.5.0/datatables.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/fh-3.4.0/r-2.5.0/sc-2.2.0/sb-1.5.0/datatables.min.js"></script>

    <!-- =======================================================
  * Template Name: NicePengajar
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-Pengajar-bootstrap-Pengajar-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="<?= base_url() ?>logo/top.png" alt="">
                <span class="d-none d-lg-block">
                    <?php if ($user['role_id'] == 1) {
                        echo "Pembina";
                    } else if ($user['role_id'] == 2) {
                        echo "Pengurus";
                    } else if ($user['role_id'] == 3) {
                        echo "Pengajar";
                    } else if ($user['role_id'] == 4) {
                        echo "Wali Santri";
                    } else if ($user['role_id'] == 5) {
                        echo "Santri";
                    } else if ($user['role_id'] == 6) {
                        echo "IT Support";
                    } ?>
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img style="object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url() ?>/login/profile/<?= $user['image'] ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['first_name'] ?> <?= $user['last_name'] ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $user['first_name'] ?> <?= $user['last_name'] ?></h6>
                            <span>
                                <?php
                                if ($user['role_id'] == 1) {
                                    echo "Pembina";
                                } else if ($user['role_id'] == 2) {
                                    echo "Pengurus";
                                } else if ($user['role_id'] == 3) {
                                    echo "Pengajar";
                                } else if ($user['role_id'] == 4) {
                                    echo "Pengajar";
                                } else if ($user['role_id'] == 5) {
                                    echo "Santri";
                                }

                                ?>
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/">
                                <span>Halaman Utama</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" onclick="logout()">
                                <span>Keluar</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">

                <a class="nav-link collapsed" href="/profile">
                    <i class="fa-regular fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <?php if ($user['role_id'] == "1" || $user['role_id'] == "2" || $user['role_id'] == "3" || $user['role_id'] == "6" || $user['role_id'] == "7") : ?>
                <a class="nav-link collapsed" data-bs-target="#blog" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-newspaper"></i><span>Artikel</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="blog" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/blog_create">
                            <i class="bi bi-circle"></i><span>Buat Artikel</span>
                        </a>
                        <a href="/blog_update">
                            <i class="bi bi-circle"></i><span>Ubah Artikel</span>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>

            <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 3 || $user['role_id'] == 6) : ?>
                <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 6) : ?>

                    <a class="nav-link collapsed" data-bs-target="#account" data-bs-toggle="collapse" href="#">
                        <i class="fa-regular fa-address-card"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="account" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/user">
                                <i class="bi bi-circle"></i><span>Activation</span>
                            </a>
                            <a href="/register">
                                <i class="bi bi-circle"></i><span>Register</span>
                            </a>
                            <a href="/ganti_password">
                                <i class="bi bi-circle"></i><span>Ganti Password</span>
                            </a>
                        </li>
                    </ul>
                    <a class="nav-link collapsed" data-bs-target="#biodata" data-bs-toggle="collapse" href="#">
                        <i class="fa-solid fa-database"></i><span>Database</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="biodata" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/santri">
                                <i class="bi bi-circle"></i><span>Data Santri</span>
                            </a>
                            <a href="/wali">
                                <i class="bi bi-circle"></i><span>Data Wali</span>
                            </a>
                            <a href="/karyawan">
                                <i class="bi bi-circle"></i><span>Data Pengajar Dan Staff</span>
                            </a>
                        </li>
                    </ul>
                <?php endif ?>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi bi-calendar3"></i><span>Kegiatan</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/unggulan">
                                <i class="bi bi-circle"></i><span>Kegiatan Unggulan</span>
                            </a>
                            <a href="/jadwal_harian">
                                <i class="bi bi-circle"></i><span>Jadwal Harian</span>
                            </a>
                            <a href="/jadwal_mingguan">
                                <i class="bi bi-circle"></i><span>Jadwal Mingguan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#absen" data-bs-toggle="collapse" href="#">
                        <i class="fa-solid fa-clipboard-check"></i><span>Absensi</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="absen" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/absen_pengajar">
                                <i class="bi bi-circle"></i><span>Pengajar</span>
                            </a>
                            <a href="/absen_santri">
                                <i class="bi bi-circle"></i><span>Santri</span>
                            </a>
                            <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 6) : ?>
                                <a href="/laporan_absen">
                                    <i class="bi bi-circle"></i><span>Absen Pengajar</span>
                                </a>

                                <a href="/laporan_absen_santri">
                                    <i class="bi bi-circle"></i><span>Absen Santri</span>
                                </a>

                                <a href="/laporan_full">
                                    <i class="bi bi-circle"></i><span>Keseluruhan Absen</span>
                                </a>
                            <?php endif ?>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#nilai" data-bs-toggle="collapse" href="#">
                        <i class="fa-solid fa-file-pen"></i><span>Laporan Nilai</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="nilai" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/diniyah">
                                <i class="bi bi-circle"></i><span>Diniyah</span>
                            </a>
                            <a href="/ziyadah">
                                <i class="bi bi-circle"></i><span>Ziyadah</span>
                            </a>
                            <a href="/bahasa_arab">
                                <i class="bi bi-circle"></i><span>Bahasa Arab</span>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php endif ?>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#uang" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-coins"></i><span>Laporan Keuangan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="uang" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/donasi">
                            <i class="bi bi-circle"></i><span>Donasi</span>
                        </a>
                        <a href="/pemasukan">
                            <i class="bi bi-circle"></i><span>Pemasukan</span>
                        </a>
                        <a href="/pengeluaran">
                            <i class="bi bi-circle"></i><span>Pengeluaran</span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>

    </aside><!-- End Sidebar-->
    <div class="flash-data" data-flashdata="<?= session()->get('success'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->get('warning'); ?>"></div>
    <div class="flash-data-error" data-flashdata="<?= session()->get('error'); ?>"></div>
    <main id="main" class="main">

        <!-- <div class="pagetitle">
            <h1><?php if ($url == 'jadwal_harian') {
                    echo "Jadwal Harian";
                } else if ($url == 'jadwal_mingguan') {
                    echo "Jadwal Mingguan";
                } else if ($url == 'karyawan') {
                    echo "Pengajar dan Staff";
                } else if ($url == 'absen_santri') {
                    echo "Absen Santri";
                } else if ($url == 'absen_pengajar') {
                    echo "Absen Pengajar";
                } else if ($url == 'laporan_absen') {
                    echo "Laporan";
                } else if ($url == 'bahasa_arab') {
                    echo "Bahasa Arab";
                } else if ($url == 'laporan_absen_santri') {
                    echo "Absen Santri";
                } else if ($url == 'ganti_password') {
                    echo "Ubah Password";
                } else {
                    echo ucfirst($url);
                } ?></h1>
        </div> -->

        <?= $this->renderSection('database') ?>
    </main><!-- End #main -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
    </script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url() ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                buttons: [
                    'excel',
                    'pdf'
                ]
            });
        });

        $("textarea").each(function() {
            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
        }).on("input", function() {
            this.style.height = 0;
            this.style.height = (this.scrollHeight) + "px";
        });

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