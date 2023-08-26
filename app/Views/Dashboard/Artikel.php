<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<style>
    .foto_blog {
        border: 2px solid #00593B;
        padding: 2px;
        border-radius: 10px;
        max-width: 500px;
    }

    @media(max-width:800px){
        .foto_blog{
            max-width: 300px;
        }
    }
</style>

<?php

$date = date_create($artikel['tanggal']);
$tanggal = date_format($date, 'd-m-Y');
$jam = date_format($date, 'H:i');
?>

<div class="card py-4 px-4">
    <div class="card-body">
        <h1 class="text-center">
            <?= $artikel['tema'] ?>
        </h1>
        <h5 class="text-center text-muted">
            <?= $artikel['username'] ?> | <?= $jam ?> | <?= $tanggal ?>
        </h5>
        <div class="text-center mb-5">
            <img src="<?= base_url() ?>/blog/<?= $artikel['blog_image'] ?>" class="foto_blog">
        </div>

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

<?= $this->endSection() ?>