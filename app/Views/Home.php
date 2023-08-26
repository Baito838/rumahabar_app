<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>

<style>
    .hero-galery{
        border-radius: 10px;
        border: 1px solid;
        padding: 2px;
    }
</style>

<section id="hero">
    <img class="hidden" style="width: 100%; max-width: 450px;" src="<?= base_url() ?>/logo/logo.png" alt="">
    <h4 class="hidden text-center subtitle-hero">
        Lembaga pendidikan Islam hususnya dibidang Tahsin & Tahfidz Al Quran, Kajian Kitab ulama,
        dan Pendidikan umum sekolah
    </h4>
</section>

<section id="ayat">
    <div style=" max-width: 850px;">
        <h1 class="pt-5 hidden text-center">Abar Rumah Tahfidz</h1>
        <div class="d-flex justify-content-center">
            <div style="max-width: 450px;">
                <div class=" text-center">
                    <img class="hidden" style="width: 100%; max-width: 350px;" src="<?= base_url() ?>/landingpage/ayat.png" alt="">
                </div>
                <p class="hidden text-center ayat">عن عثمانَ بن عفانَ رضيَ اللَّه عنهُ قال : قالَ رسولُ اللَّهِ صَلّى اللهُ عَلَيْهِ وسَلَّم : « خَيركُم مَنْ تَعَلَّمَ القُرْآنَ وَعلَّمهُ » رواه البخاري</p>
                <p class="hidden text-center">
                    Dari Usman bin Affan رضي الله عنه, Rasulullah ﷺ . bersabda, “Sebaik-baik kalian adalah yang mempelajari al-Qur’an dan mengajarkannya.” (HR. Tirmidzi);
                </p>
            </div>
        </div>
        <p class="text-center hidden">
            Yayasan Abar rumah tahfidz menjelma sebagai lembaga pendidikan Islam yang mengemban peran penting dalam mengarahkan para generasi muda menuju kesempurnaan spiritual melalui pendalaman khusus dalam tiga aspek utama, yaitu Tahsin & Tahfidz Al Quran, Kajian Kitab Ulama, dan Kesetaraan Pendidikan sekolahan umum. Dalam komitmennya terhadap Tahsin & Tahfidz Al Quran, yayasan ini mengupayakan pembinaan intensif bagi para pelajar agar mereka tidak hanya menghafal dan merutinkan membaca ayat suci Al Quran, tetapi juga merasakan keindahan makna-makna yang terkandung di dalamnya, sehingga setiap ayat menjadi cahaya yang membimbing mereka dalam kehidupan sehari-hari.
        </p>
        <div class="d-flex justify-content-center w-100 hero-galery py-4 hidden">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url() ?>/galeri/1 (15).jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url() ?>/galeri/1 (16).jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url() ?>/galeri/1 (10).jpeg" class="d-block w-100" alt="...">
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
    </div>
</section>


<section id="lokasi">
    <h1 class="pt-5 hidden text-center">Lokasi</h1>

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
<?= $this->endSection() ?>