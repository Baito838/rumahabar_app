<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<style>
    @media(max-width : 800px){
        .card {
            padding: 10px;
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

<?php if ($url == 'dashboard') : ?>

    <?php foreach ($artikel as $row) : ?>
        <a href="dashboard/<?= $row['csrf'] ?>">
            <div class="card w-100 py-2" style="min-height: 250px; max-height: min-content;">
                <div class="card-body p-2">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="col-lg-4">
                            <img src="<?= base_url() ?>blog/<?= $row['blog_image'] ?>" style="max-height: 220px; height: 100%; width: auto; border: 2px solid #00593B ; border-radius: 10px; padding: 2px; ">
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex flex-column">
                                <h2 class="blog-tema"><?= $row['tema'] ?></h2>
                                <p class="blog-text"><?= $row['text_1'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
<?php endif; ?>



<script>
    $('#image').click(function() {
        $('#myfile').click()
    })
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= $this->endSection() ?>