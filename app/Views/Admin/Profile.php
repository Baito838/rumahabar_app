<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>

<style>
    #register {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px;
    }

    .card {
        width: 100%;
        max-width: 800px;
        height: min-content;
        border: 0;
        padding: 20px 10px;
    }

    @media(max-width: 800px) {
        #register {
            padding: 0 10px;
        }
    }
</style>

<section id="register">
    <div class="card">
        <form action="profile_update" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card-body">
                <h1 class="text-center">Profile</h1>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="hidden" name="foto_lama" value="<?= $user['image'] ?>">
                <div class="d-flex justify-content-center" style="border-radius:50%;">
                    <img id="image" src="<?= base_url() ?>login/profile/<?= ($user['image'] == null)? "default.png" : $user['image']?>" style=" max-width: 200px; width: 100%; aspect-ratio: 1 / 1 ; object-fit: cover; border-radius:50%; border: 1px solid #00593B; padding: 2px;" />
                    <input type="file" id="myfile" name="foto_baru" style="display:none" onchange="readURL(this);"/>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3 mt-3">
                            <input required oninvalid="this.setCustomValidity('Masukan Nama Depan')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="nama_depan" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="50" value="<?= $user['first_name'] ?>">
                            <label for="floatingInput">Nama Depan</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3 mt-3">
                            <input required oninvalid="this.setCustomValidity('Masukan Nama Belakang')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="nama_belakang" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="50" value="<?= $user['last_name'] ?>">
                            <label for="floatingInput">Nama Belakang</label>
                        </div>
                    </div>
                </div>


                <div class="form-floating mb-3 mt-3">
                    <input required oninvalid="this.setCustomValidity('Masukan Nama Email')" oninput="this.setCustomValidity('')" autocomplete="off" type="email" name="email" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="50" value="<?= $user['email'] ?>">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input required oninvalid="this.setCustomValidity('Masukan Username')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="username" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="15" value="<?= $user['username'] ?>">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                </div>
            </div>
        </form>
    </div>

</section>

<script>
    $('#image').click(function() {
        $('#myfile').click()
    })
</script>

<script>
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?= $this->endSection() ?>