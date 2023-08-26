<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>
<style>
    .card {
        background-color: transparent;
        border: 0px solid transparent;
        padding: 30px 10px;
    }

    .carousel {
        max-width: 1050px;
        overflow: hidden;
        border-radius: 10px;
        border: 2px solid #00593B;
        padding: 2px;
    }

    .carousel-item img {
        overflow: hidden;
        object-fit: center;
        max-width: 100%;
        height: auto;
        border-radius: 10px;

    }

    #legalitas a {
        text-decoration: none;
    }

    #legalitas table {
        border-radius: 10px;
        overflow: hidden;
    }


    @media(max-width: 800px) {
        .about {
            gap: 30px;
        }
    }
</style>

<section id="visi">
    <h1 class="hidden text-center pt-5" style="overflow: hidden">
        Visi & Misi
    </h1>

    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 100%; max-width: 1050px;">
            <div class="card-detail row p-4">
                <div class="col-lg-6">
                    <div class="d-flex justify-content-center align-items-center px-2">
                        <img style="min-width: 300px; max-width: 350px; width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 10px;border: 2px solid #00593b; padding: 2px" src="<?= base_url() ?>galeri/1 (16).jpeg" alt="" class="hidden" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="text-center sub-title">VISI</p>
                    <p class="text-center">
                        Mencetak generasi yang hafizh, mutqin, dan amil, yang memiliki
                        tilawah yang bagus, hafalan yang lancar, pemahaman yang memadai,
                        dan akhlak yang mulia..
                    </p>
                    <p class="text-center sub-title">MISI</p>
                    <ul class="ul-visi">
                        <li class="li-visi">
                            Melaksanakan pembelajaran tahsin dan tahfiz yang intensif
                        </li>
                        <li class="li-visi">
                            Memberikan pemahaman tentang kosakata dan makna ayat
                        </li>
                        <li class="li-visi">
                            Memberikan bimbingan dan pembinaan akhlak melalui tafsir dan
                            tadabbur
                        </li>
                        <li class="li-visi">
                            Bersinergi dengan masyarakat untuk menjadi motor penggerak
                            budaya islami yang berlandaskan Al-Quran dan Sunnah.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="sejarah">
    <h1 class="pt-5 hidden text-center">Sejarah</h1>
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="card p-3 " style="width: 100%; max-width: 1050px;">
            <div class="card-detail row p-2">
                <div class="col-lg-6">
                    <div class="d-flex justify-content-center align-items-center px-2">
                        <img style="min-width: 300px; max-width: 350px; width: 100%; height: auto; object-fit: contain; border-radius: 10px; border: 2px solid #00593b; padding: 2px;" src="<?= base_url() ?>landingpage/sejarah.jpeg" alt="" class="hidden" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center flex-column">
                        <h3 class="text-center sub-title">Sejarah Berdirinya</h3>
                        <p class="text-center">
                            Berangkat dari niat mulia <b>Haji Zendy Astreanto</b> untuk memberikan pendidkan yang baik dan layak untuk anak-anak yatim dan Du'afa.
                            yang kemudian bersama-sama <b>Muhammad Jawahir S.Sos</b> mendirikan Abar Rumah Tahfidz pada 27 Januari 2021 dan kemudian membentuk Yayasan Abar Rumah Tahfidz pada 14 Juni 2022
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="struktur">
    <h1 class="pt-5 hidden text-center">Struktur</h1>

    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 1050px;">
            <div class="card-body d-flex justify-content-between flex-column flex-wrap">
                <h3 class="text-center py-2 sub-title">
                    Pembina
                </h3>
                <div class="d-flex justify-content-around gap-3">
                    <div>
                        <img style="margin-bottom: 20px;width: 100%; max-width: 120px; border-radius: 50%; object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url(); ?>/pengurus/zendy.jpeg" alt="">
                        <p>Pembina<br><b>Haji Zendy Astreanto</b></b></p>
                    </div>
                </div>
                <h3 class="text-center py-2 sub-title">
                    Pengurus
                </h3>
                <div class="d-flex justify-content-around gap-3">
                    <div>
                        <img style="margin-bottom: 20px;width: 100%; max-width: 120px; border-radius: 50%; object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url(); ?>/pengurus/waher.jpeg" alt="">
                        <p>Pengurus<br><b>Muhammad Jawahir, S.Sos</b></p>
                    </div>
                </div>
                <h3 class="text-center py-2 sub-title">
                    Pengajar
                </h3>
                <div class="d-flex justify-content-around gap-3">
                    <div>
                        <img style="margin-bottom: 20px;width: 100%; max-width: 120px; border-radius: 50%; object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url(); ?>/pengurus/ebnal.jpeg" alt="">
                        <p>Bahasa Arab <br><b>Ebnal Ayyem S.Pd</b></p>

                    </div>
                    <div>
                        <img style="margin-bottom: 20px;width: 100%; max-width: 120px; border-radius: 50%; object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url(); ?>/pengurus/akbar.jpeg" alt="">
                        <p>Musyrif <br><b>Syifatul Akbar</b></p>
                    </div>
                </div>
                <h3 class="text-center py-2 sub-title">
                    Staff
                </h3>
                <div class="d-flex justify-content-around gap-3">
                    <!-- <div>
                        <img style="margin-bottom: 20px;width: 100%; max-width: 120px; border-radius: 50%; object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url(); ?>/pengurus/gojo.jpg" alt="">
                        <p>Wahaboii<br><b>Bagas Aji Prasetyo</b></p>
                    </div> -->
                    <div>
                        <img style="margin-bottom: 20px;width: 100%; max-width: 120px; border-radius: 50%; object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url(); ?>/pengurus/rijal.jpeg" alt="">
                        <p>Juru Masak<br><b>Rizalda</b></p>
                    </div>
                    <div>
                        <img style="margin-bottom: 20px;width: 100%; max-width: 120px; border-radius: 50%; object-fit: cover; aspect-ratio: 1 / 1;" src="<?= base_url(); ?>/pengurus/Panji.jpg" alt="">
                        <p>Guru Pencak Silat<br><b>Panji Sukma</b></p>
                    </div>
                </div>
            </div>
        </div>
</section>

<section id="galeri">
    <h1 class="pt-5 hidden text-center">Galery</h1>
    <div class="d-flex justify-content-center w-100 hero-galery py-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url() ?>/galeri/1 (15).jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Ziarah</h5>
                        <p>Makam Kramat Mbah Priuk Al Haddad</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url() ?>/galeri/1 (16).jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Ziarah</h5>
                        <p>Makam Kramat Mbah Priuk Al Haddad</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url() ?>/galeri/1 (10).jpeg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Rillah ke Taman Safari</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="galery">
        <img src="<?= base_url() ?>/galeri/2.jpg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (1).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (2).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (3).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (5).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (6).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (14).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (8).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (10).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (11).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (9).jpeg" alt="" class="hidden">
        <img src="<?= base_url() ?>/galeri/1 (13).jpeg" alt="" class="hidden">
    </div>
</section>

<section id="legalitas">
    <h1 class="pt-5 hidden text-center">Legalitas</h1>

    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 1050px;">
            <div class="card-body d-flex justify-content-between flex-column flex-wrap">
                <h3 class="text-center py-2 sub-title">
                    Surat Keputusan Pendirian Yayasan Abar Rumah Tahfidz
                </h3>
                <table class="table table-hover">
                    <thead class="table-success">
                        <th>Nama</th>
                        <th>File</th>
                    </thead>
                    <tbody class="table-success">
                        <tr>
                            <td>Rencana Pendirian</td>
                            <td>
                                <a href="<?= base_url(); ?>file/Rencana Pendirian Rumah Tahfidz.docx" download>
                                    Unduh

                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Proyek Proposal</td>
                            <td>
                                <a href="<?= base_url(); ?>file/projek proposal pembangunan_Bahasa Arab 2.pdf" download>
                                    Unduh

                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row about">
                    <div class="col-lg-6">
                        <div class="text-center hidden">
                            <img style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; border: 2px solid #00593b; padding: 2px;" src="<?= base_url(); ?>/image/1 (1).jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center hidden">
                            <img style="width: 100%; max-width: 300px; height: auto; border-radius: 10px; border: 2px solid #00593b; padding: 2px;" src="<?= base_url(); ?>/image/1 (2).jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>