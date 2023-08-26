<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>

<style>
    #blog {
        padding: 20px 100px;
    }

    @media(max-width: 800px) {
        #blog {
            padding: 20px 10px;
        }

        .blog-tema {
            text-align: center;
            margin: 10px 0;
        }

        .blog-text {
            text-align: justify;
        }
    }
</style>

<section id="blog">
    <h1 class="pt-5 hidden text-center">Artikel</h1>

    <?php foreach ($artikel as $row) : ?>
        <?php
        $date = date_create($row['tanggal']);
        $tanggal = date_format($date, 'd-m-Y');
        $jam = date_format($date, 'H:i');
        ?>
        <a href="blog/<?= $row['csrf'] ?>">
            <div class="card w-100 py-2" style="min-height: 250px; max-height: min-content;">
                <div class="card-body p-2">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="col-lg-4">
                            <img src="<?= base_url() ?>blog/<?= $row['blog_image'] ?>" style="max-height: 280px; height: 100%; width: auto; border: 2px solid #00593B ; border-radius: 10px; padding: 2px; ">
                        </div>
                        <div class="col-lg-8 px-2">
                            <div class="d-flex flex-column">
                                <h2 class="blog-tema"><?= $row['tema'] ?></h2>
                                <h5 class="blog-tema"><i class="fa-regular fa-clock"></i> <?= $jam ?> | <i class="fa-solid fa-calendar-days"></i> <?= $tanggal ?></h5>
                                <p class="blog-text"><?= $row['text_1'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</section>

<?= $this->endSection() ?>