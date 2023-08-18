<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>
<section id="ayat">
    <div style=" max-width: 450px;">
        <div class=" text-center">
            <img class="hidden" style="width: 100%; max-width: 350px;" src="<?= base_url() ?>/landingpage/ayat.png" alt="">
        </div>
        <p class="hidden text-center ayat">عن عثمانَ بن عفانَ رضيَ اللَّه عنهُ قال : قالَ رسولُ اللَّهِ صَلّى اللهُ عَلَيْهِ وسَلَّم : « خَيركُم مَنْ تَعَلَّمَ القُرْآنَ وَعلَّمهُ » رواه البخاري</p>
        <p class="hidden text-center">
            Dari Usman bin Affan رضي الله عنه, Rasulullah ﷺ . bersabda, “Sebaik-baik kalian adalah yang mempelajari al-Qur’an dan mengajarkannya.” (HR. Tirmidzi);
        </p>
    </div>
</section>

<section id="lokasi">
    <h1 class="pt-5 hidden text-center">Lokasi</h1>

    <div class="text-center w-100 d-flex justify-content-center">
        <div class="card" style="height: min-content; width: 100%; max-width: 1050px;">
            <div class="card-body d-flex justify-content-between h-100 flex-column flex-wrap">
                <p class="text-center py-2 sub-title">
                    Jl. H. Anan, RT.03/RW.007, Jatiluhur, Kec. Jatiasih, Kota Bks, Jawa
                    Barat 17425
                </p>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1050&amp;height=400&amp;hl=en&amp;q=villa abar&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
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