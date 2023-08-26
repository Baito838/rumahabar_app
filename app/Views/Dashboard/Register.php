<?php
if ($user['role_id'] == 4 || $user['role_id'] == 5) {
    session()->setFlashdata('danger', "Halaman Khusus Pembina dan Pengurus");
    return redirect()->to('jadwal_mingguan');
}
?>

<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>


<div class="card py-5">
    <form action="daftar" method="post">
        <?= csrf_field() ?>
        <div class="card-body">
            <h1 class="text-center">Register</h1>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input required oninvalid="this.setCustomValidity('Masukan Nama Depan')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="nama_depan" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="50">
                        <label for="floatingInput">Nama Depan</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input required oninvalid="this.setCustomValidity('Masukan Nama Belakang')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="nama_belakang" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="50">
                        <label for="floatingInput">Nama Belakang</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input required oninvalid="this.setCustomValidity('Masukan Nama Email')" oninput="this.setCustomValidity('')" autocomplete="off" type="email" name="email" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="50">
                        <label for="floatingInput">Email</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3 mt-3">
                        <input required oninvalid="this.setCustomValidity('Masukan Username')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="username" class="form-control" id="floatingInput" placeholder="bagas838" maxlength="15">
                        <label for="floatingInput">Username</label>
                        <small>Maksimal 15 karakter</small>
                    </div>
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



            <div class="text-center">
                <button type="submit" class="btn btn-success">Daftar</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>