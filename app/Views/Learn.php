<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>

<style>
    iframe {
        max-width: 1200px;
        height: 600px;
        width: 100%;
    }
</style>

<section class="d-flex justify-content-center px-2">
    <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTq3YM8Hva-TD6XhyebwujwgkuihMvA0DsoTEo50BHspGU09U-kTHoO3K3uhVzn_w/embed?start=false&loop=false&delayms=3000" frameborder="0" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
</section>

<?= $this->endSection() ?>