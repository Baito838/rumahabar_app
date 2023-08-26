<?php
if ($user['role_id'] == 4 || $user['role_id'] == 5) {
    session()->setFlashdata('danger', "Halaman Khusus Pembina dan Pengurus");
    return redirect()->to('jadwal_mingguan');
}
if ($url == 'laporan_absen') {

    if ($user['role_id'] == 3) {
        session()->setFlashdata('danger', "Halaman Khusus Pembina dan Pengurus");
        return redirect()->to('jadwal_mingguan');
    }
}


?>

<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<style>
    .pict {
        max-width: 200px;
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        border-radius: 50%;
        border: 1px solid #00593B;
        padding: 2px;
        background-image: url("<?= base_url() ?>/login/profile/camera.png");
        background-position: center;
        background-size: cover;
    }

    .map {
        width: 100px;
        aspect-ratio: 1 / 1;
    }
</style>

<?php if ($url == 'absen_santri' || $url == 'absen_pengajar') : ?>
    <div class="card">
        <form action="absensi" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card-body my-5">
                <div class="d-flex justify-content-center" style="border-radius:50%;">
                    <img id="image" class="pict" />
                    <input type="file" id="myfile" name="foto" style="display:none" onchange="readURL(this);" accept="image/*" capture="user" />
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3 mt-3">
                            <input required onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;" oninvalid="this.setCustomValidity('Masukan NIG / NIS')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="<?= ($url == 'absen_pengajar') ? "nig" : "nis" ?>" class="form-control" id="floatingInput" maxlength="50">
                            <label for="floatingInput"><?= ($url == 'absen_pengajar') ? "NIG" : "NIS" ?></label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3 mt-3">
                            <input required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="this.setCustomValidity('')" autocomplete="off" type="text" name="nama" class="form-control" id="floatingInput" maxlength="50">
                            <label for="floatingInput">Nama</label>
                        </div>
                    </div>
                </div>


                <div class="form-floating">
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="kegiatan" value=""></textarea>
                    <label for="floatingTextarea2">Kegiatan</label>
                </div>
                <div class="row py-4 px-5 d-flex justify-content-center">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" value="hadir" type="radio" name="keterangan" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Hadir
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" value="izin" type="radio" name="keterangan" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Izin
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" value="sakit" type="radio" name="keterangan" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Sakit
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" value="alfa" type="radio" name="keterangan" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Alfa
                            </label>
                        </div>
                    </div>
                </div>

                <div class="w-100 px-3 d-flex justify-content-center">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <input type="hidden" name="page" value="<?= $url ?>">
                    <input type="hidden" name="role" value="<?= ($url == 'absen_pengajar') ? "1" : "0" ?>">
                </div>

                <div class="alert alert-warning" role="alert">
                    <p class="text-center">Gunakan foto sopan tidak mengandung unsur sara, rasis, dan pornografi, sesuai kan nama dengan nama anda. <br> melanggar maka akun akan di non aktifkan</p>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Absen</button>
                </div>
            </div>
        </form>
    </div>

<?php endif; ?>

<?php if ($url == 'laporan_absen' || $url == 'laporan_absen_santri') : ?>

    <div class="card py-2">
        <div class="card-body">
            <table id="myTable" class="display table">
                <thead>
                    <th>Nama</th>
                    <?= ($url == 'laporan_absen_santri') ? '<th>NIS</th>' : '' ?>
                    <?= ($url == 'absen_pengajar') ? '<th>NIG</th>' : '' ?>
                    <th>Kegiatan</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>foto</th>
                    <th>lokasi</th>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $row) : ?>
                        <?php
                        $date = date_create($row['tanggal']);
                        $tanggal = date_format($date, 'd-m-Y');
                        $jam = date_format($date, 'H:i');
                        ?>
                        <tr>
                            <td><?= ucfirst($row['nama']) ?></td>
                            <?= ($url == 'laporan_absen_santri') ? '<td>' . $row['nis'] . '</td>' : '' ?>
                            <?= ($url == 'absen_pengajar') ? '<td>' . $row['nig'] . '</td>' : '' ?>
                            <td><?= $row['kegiatan'] ?></td>
                            <td><?= ucfirst($row['keterangan']) ?></td>
                            <td><?= $tanggal ?></td>
                            <td><?= $jam ?></td>
                            <td>
                                <img style="width: 100px; aspect-ratio: 1 / 1; object-fit: cover;" src="<?= base_url() ?>absen/<?= ($row['role_user'] == 1) ? 'guru' : 'santri'  ?>/<?= $row['image'] ?>" alt="">
                            </td>
                            <td style="overflow: hidden;">
                                <iframe class="map" src="https://maps.google.com/maps?q=<?= $row['latitude'] ?>,<?= $row['longitude'] ?>&hl=es;z=14&amp;output=embed" allowfullscreen="" loading="lazy"></iframe>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php endif; ?>

<?php if ($url == 'laporan_full') : ?>

    <div class="card py-2">
        <div class="card-body">
            <div class="d-flex justify-content-end py-2">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">
                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                </button>
            </div>
            <table id="myTable" class="display table">
                <thead>
                    <th>Nama</th>
                    <th>NIS / NIG</th>
                    <th>Kegiatan</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>foto</th>
                    <th>lokasi</th>
                </thead>
                <tbody>
                    <?php foreach ($laporan as $row) : ?>
                        <?php
                        $date = date_create($row['tanggal']);
                        $tanggal = date_format($date, 'd-m-Y');
                        $jam = date_format($date, 'H:i');
                        ?>
                        <tr>
                            <td><?= ucfirst($row['nama']) ?></td>
                            <?= ($row['role_user'] == 1) ? '<td>' . $row['nig'] . '</td>' : '<td>' . $row['nis'] . '</td>' ?>
                            <td><?= $row['kegiatan'] ?></td>
                            <td><?= ucfirst($row['keterangan']) ?></td>
                            <td><?= $tanggal ?></td>
                            <td><?= $jam ?></td>
                            <td>
                                <img style="width: 100px; aspect-ratio: 1 / 1; object-fit: cover;" src="<?= base_url() ?>absen/<?= ($row['role_user'] == 1) ? 'guru' : 'santri'  ?>/<?= $row['image'] ?>" alt="">
                            </td>
                            <td style="overflow: hidden;">
                                <iframe class="map" src="https://maps.google.com/maps?q=<?= $row['latitude'] ?>,<?= $row['longitude'] ?>&hl=es;z=14&amp;output=embed" allowfullscreen="" loading="lazy"></iframe>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php endif; ?>

<div class="modal fade" id="hapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-light" id="hapusLabel">Format Absen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="truncate_absen" method="post">
                <div class="modal-body">

                    <input type="hidden" name="page" value="<?= $url ?>">

                    <h3>Yakin ingin mengformat absen</h3>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                    </button>
                    <button type="submit" class="btn btn-danger text-light">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

</script>

<script type="text/javascript">
    function getLocation() {
        navigator.geolocation.getCurrentPosition(showPosition);
    }

    function showPosition(position) {
        document.querySelector('#latitude').value = position.coords.latitude;
        document.querySelector('#longitude').value = position.coords.longitude;
    }
    getLocation();
</script>

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