<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>


<style>
    .tab-harian tr td:nth-child(2) {
        text-align: start;
    }

    .tab-mingguan tr td:nth-child(3) {
        text-align: start;
    }

    li {
        text-align: start;
    }

    .frame {
        border-radius: 10px;
        border: 2px solid #00593B;
        padding: 2px;
    }

    .carousel {
        max-width: 800px;
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

    @media(max-width: 800px) {
        .donasi {
            gap: 30px;
        }
    }
</style>

<section id="pendaftaran">
    <h1 class="pt-5 hidden text-center">Pendaftaran</h1>

    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 1050px; height: min-content;">
            <div class="card-body d-flex justify-content-between flex-column flex-wrap">
                <h3 class="text-center py-2 sub-title">
                    Silahkan Download Formulir lalu isi pendafataran.
                </h3>
                <div class="row donasi">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img class="frame" style="width: 100%; max-width: 300px; height: auto;" src="<?= base_url(); ?>/image/1 (3).png" alt="">
                        </div>
                        <div class="text-center pt-2">
                            <a href="<?= base_url(); ?>/file/FORMULIR CALON SANTRI.docx">
                                <div class="btn btn-primary">
                                    Download Formulir
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center">
                            <h5>Syarat Pendaftaran</h5>
                            <p class="text-start"> 1. Ikhwan </p>
                            <p class="text-start"> 2. Mengisi Formulir pendaftaran</p>
                            <p class="text-start"> 3. Melengkapi administrasi pendaftaran</p>
                            <ul class="ul-visi">

                                <li class="li-visi">Pas Foto 4x6 2 lembar</li>
                                <li class="li-visi">FC KTP orang tua</li>
                                <li class="li-visi">FC KK</li>
                                <li class="li-visi">FC akte kelahiran</li>
                                <li class="li-visi">Surat keterangan tidak mampu/yatim dari RT</li>

                            </ul>
                            <!-- <p class="text-start">4.Melunasi biaya pendaftaran</p>
                            <ul class="ul-visi">
                                <li class="li-visi">Uang Lemari (1x diawal masuk) : Rp. 150.000,00</li>
                                <li class="li-visi">Infak Bulanan : Rp. 100.000,00</li>
                            </ul> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<section id="tata_tertib">
    <h1 class="pt-5 hidden text-center">Tata Tertib</h1>

    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 1050px;">
            <div class="card-body d-flex justify-content-between flex-column flex-wrap">
                <h3 class="text-center py-2 sub-title">
                    Berikut Tata Tertib yang harus diikuti oleh setiap santri
                </h3>
                <div class="row donasi">
                    <div class="col-lg-6">
                        <h5>Larangan Santri </h5>
                        <ul class="ul-visi">
                            <li class="li-visi">Membawa dan mengkonsumsi minuman keras, narkoba dan zat adiktiv lainya.
                            </li>
                            <li class="li-visi">Pacaran melalui apapun ( Langsung, tulisan, media sosial dan lainya.
                            </li>
                            <li class="li-visi">Pulang tanpa idzin Pengasuh / Asatidz / Wali kamar.</li>
                            <li class="li-visi">Keluar tanpa idzin Asatidz dan Wali kamar.</li>
                            <li class="li-visi">Berkelahi dengan teman sesama santri atau masyarakat.</li>
                            <li class="li-visi">Bercanda melampaui batas.</li>
                            <li class="li-visi">Ghosob ( Meminjam/memakai barang milik orang lain tanpa idzin)</li>
                            <li class="li-visi">Membawa dan menggunakan HP atau alat-alat komunikasi elektronik selain
                                di hari libur.</li>
                            <li class="li-visi">Membawa dan menyimpan tulisan, gambar atau media bersifat pornografi
                            </li>
                            <li class="li-visi">Memanjangkan kuku dan rambut.</li>
                            <li class="li-visi">Membuang sampah sembarangan dan menaruh pakaian sembarangan.</li>
                            <li class="li-visi">Mencorat coret dan mengotori Pondok</li>
                            <li class="li-visi">Merokok</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h5>Kewajiban Santri </h5>
                        <ul class="ul-visi">
                            <li class="li-visi">Menjaga nama baik Pondok baik di dalam/di luar Pondok</li>
                            <li class="li-visi">Berakhlaqul karimah/sopan santun kepada guru, tamu, sesama teman, dan
                                masyarakat.</li>
                            <li class="li-visi">Sholat berjama'ah.</li>
                            <li class="li-visi">Mengikuti kegiatan Pondok (Setoran dan ngaji kitab).</li>
                            <li class="li-visi">Menjaga kebersihan Pondok.</li>
                            <li class="li-visi">Memakai busana santri ( Baju koko, sarung, dan peci) pada waktu Sholat
                                berjama'ah, setoran, ngaji kitab dan kegiatan Pondok lainnya.</li>
                        </ul>

                        <h5>SANKSI-SANKSI/TA’ZIRAN </h5>
                        <ul class="ul-visi">
                            <li class="li-visi">Membersihkan semua lingkungan Pondok</li>
                            <li class="li-visi">Kerja Bakti</li>
                            <li class="li-visi">Puasa 3 hari berturut-turut</li>
                            <li class="li-visi">Disimak seluruh hafalanya</li>
                            <li class="li-visi">Dikembalikan kepada orangtua / wali santri ( apabila melanggar pelaturan
                                yang berat )</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>

<section id="kegiatan">
    <h1 class="pt-5 hidden text-center">Kegiatan</h1>
    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 1050px;">
            <div class="card-body d-flex justify-content-center flex-column flex-wrap">
                <div class="d-flex justify-content-center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= base_url() ?>/galeri/1 (7).jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url() ?>/galeri/1 (8).jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url() ?>/galeri/1 (11).jpeg" class="d-block w-100" alt="...">
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
                <h3 class="text-center my-2 sub-title">
                    Kegiatan Unggulan
                </h3>
                <table class="table table-bordered">
                    <tbody>
                        <?php foreach ($program as $row) : ?>
                            <tr>
                                <th scope="row"><?= $row['nama'] ?></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <h3 class="text-center my-2 sub-title">
                    Jadwal Kegiatan Harian
                </h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col text-center">Jam</th>
                            <th scope="col text-center">Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($harian as $row) : ?>
                            <tr>
                                <th scope="row"><?= $row['Waktu'] ?></th>
                                <td class="text-start"><?= $row['Kegiatan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <h3 class="text-center py-2 sub-title">
                    Jadwal Kegiatan Mingguan
                </h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col text-center">Hari</th>
                            <th scope="col text-center">Jam</th>
                            <th scope="col text-center">Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mingguan as $row) : ?>
                            <tr>
                                <th scope="row"><?= $row['Hari'] ?></th>
                                <th scope="row"><?= $row['Waktu'] ?></th>
                                <td class="text-start"><?= $row['Kegiatan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

<section id="donasi">
    <h1 class="pt-5 hidden text-center">Donasi Online</h1>

    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 1050px;">
            <div class="card-body d-flex justify-content-between flex-column flex-wrap">
                <h3 class="text-center py-2 sub-title">
                    Donasi Abar Rumah Tahfidz untuk operasional, santunan yatim duafa dan santri penghafal quran.
                </h3>
                <div class="row donasi">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img style="width: 100%; max-width: 300px;" src="<?= base_url(); ?>/image/bsi.png" alt="">
                        </div>
                        <input type="text" value="8888775774" id="myInput" style="display: none;">
                        <h5 class="text-center">
                            8888775774 BSI Atas Nama Yayasan ABAR RUMAH TAHFIDZ
                        </h5>
                        <div class="w-100 d-flex - justify-content-center gap-2">
                            <button onclick="rekening()" class="btn btn-success text-light"><i class="fa-regular fa-copy" style="color: white;"></i> Salin Nomor Rekening
                                BSI</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center">
                            <img class="frame" style="width: 100%; max-width: 300px; height: auto;" src="<?= base_url(); ?>/image/qris.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="lokasi" style="background-color: #FFFFF0;">
    <h1 class="pt-5 hidden text-center">Donasi Langsung</h1>

    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="height: min-content; width: 100%; max-width: 1050px;">
            <div class="card-body d-flex justify-content-between h-100 flex-column flex-wrap">
                <p class="text-center py-2 sub-title">
                    Jl. H. Anan, RT.03/RW.007, Villa Abar, Jatiluhur, Kec. Jatiasih, Kota Bks, Jawa
                    Barat 17425
                </p>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=abar rumah tahfdiz&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            width: 100%;
                            height: 350px;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            width: 100%;
                            height: 350px;
                            border-radius: 10px;
                        }

                        .gmap_iframe {
                            height: 350px !important;
                        }
                    </style>
                </div>
                <div class="text-center pt-4">
                    <a href="hhttps://goo.gl/maps/uxLHLAVkc2TmfJnn6">
                        <button class="btn btn-success">
                            <i class="fa-solid fa-location-dot fa-bounce" style="color: #ffffff"></i>
                            Ke Lokasi
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function rekening() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        Swal.fire(
            copyText.value,
            'Rekening Berhasil Disalin',
            'success'
        )
    }
</script>


<?= $this->endSection() ?>