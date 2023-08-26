<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<?php if ($url == 'profile') : ?>
    <div class="card">
        <form action="profile_update" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card-body my-5">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="hidden" name="foto_lama" value="<?= $user['image'] ?>">
                <div class="d-flex justify-content-center" style="border-radius:50%;">
                    <img id="image" src="<?= base_url() ?>login/<?= ($user['image'] == null) ? "default.png" : 'profile/'. $user['image'] ?>" style=" max-width: 200px; width: 100%; aspect-ratio: 1 / 1 ; object-fit: cover; border-radius:50%; border: 1px solid #00593B; padding: 2px;" />
                    <input type="file" id="myfile" name="foto_baru" style="display:none" onchange="readURL(this);" />
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

                <div class="alert alert-warning" role="alert">
                    <p class="text-center">Gunakan foto sopan tidak mengandung unsur sara, rasis, dan pornografi, sesuai kan nama dengan nama anda. <br> melanggar maka akun akan di non aktifkan</p>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                </div>
            </div>
        </form>
    </div>
<?php endif; ?>

<?php if ($url == 'ganti_password') : ?>
    <div class="card py-4">
        <div class="card-body">
            <form action="profile_update_password" method="post">
            <?= csrf_field() ?>
                <input type="hidden" name="username" value="<?= $user['email'] ?>">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input required oninvalid="this.setCustomValidity('Masukkan Password')" oninput="this.setCustomValidity('')" autocomplete="off" type="password" name="password_lama" class="form-control" id="floatingPassword" placeholder="Password" maxlength="20">
                        <label for="floatingPassword">Password Lama</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input required oninvalid="this.setCustomValidity('Masukkan Password')" oninput="this.setCustomValidity('')" autocomplete="off" type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" maxlength="20">
                            <label for="floatingPassword">Password</label>
                            <small>Maksimal 20 karakter</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input required oninvalid="this.setCustomValidity('Masukkan Password')" oninput="this.setCustomValidity('')" autocomplete="off" type="password" name="password_confirm" class="form-control" id="floatingPassword" placeholder="Password" maxlength="20">
                            <label for="floatingPassword">Konfirmasi Password</label>
                        </div>
                    </div>
                </div>
                <div>
                    <div type="submit" class="d-flex justify-content-center w-100 py-2">
                        <button class="btn btn-success">
                            Ubah Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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