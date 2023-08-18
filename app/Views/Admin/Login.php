<?= $this->extend('Layout') ?>

<?= $this->section('content') ?>

<style>
    #login {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .card {
        width: 100%;
        max-width: 400px;
        height: min-content;
        border: 0;
    }

    @media(max-width: 800px) {
        #login {
            padding: 0 10px;
        }
    }
</style>

<section id="login">

    <div class="card">
        <form action="masuk/auth" method="post">
        <?= csrf_field() ?>
            <div class="card-body">
                <h1 class="text-center">Login</h1>
                <div class="form-floating mb-3 mt-3">
                    <input required oninvalid="this.setCustomValidity('Masukan Username')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="username" class="form-control" id="floatingInput" placeholder="bagas838">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input required oninvalid="this.setCustomValidity('Masukan Password')" oninput="this.setCustomValidity('')" autocomplete="off" type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <small >Belum Punya Akun ? <a href="register">Daftar</a></small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </div>
        </form>
    </div>

</section>
<?= $this->endSection() ?>