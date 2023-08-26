<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>

<style>
    .foto_blog {
        border: 2px solid #00593B;
        padding: 2px;
        border-radius: 10px;
        max-width: 500px;
    }

    @media(max-width:800px) {
        .foto_blog {
            max-width: 300px;
        }
    }
</style>

<style>
    #blog {
        padding: 20px 100px;
    }

    @media(max-width: 800px) {
        #blog {
            padding: 20px 10px;
        }
    }
</style>

<?php

$date = date_create($artikel['tanggal']);
$tanggal = date_format($date, 'd-m-Y');
$jam = date_format($date, 'H:i');
?>

<section id="blog">
    <div class="card py-4 px-4">
        <div class="card-body">
            <h1 class="text-center">
                <?= $artikel['tema'] ?>
            </h1>

            <div class="text-center mb-2">
                <img src="<?= base_url() ?>/blog/<?= $artikel['blog_image'] ?>" class="foto_blog">
            </div>

            <h5 class="text-center text-muted mb-2">
                Ditulis oleh <?= $artikel['username'] ?> <br>
                <i class="fa-regular fa-clock"></i> <?= $jam ?> | <i class="fa-solid fa-calendar-days"></i> <?= $tanggal ?>
            </h5>

            <div>
                <p>
                    <?= $artikel['text_1'] ?>
                </p>
            </div>
            <div>
                <p>
                    <?= $artikel['text_2'] ?>
                </p>
            </div>
            <div>
                <p>
                    <?= $artikel['text_3'] ?>
                </p>
            </div>
            <div>
                <p>
                    <?= $artikel['text_4'] ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>