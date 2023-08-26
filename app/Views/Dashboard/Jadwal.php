<?php

if ($user['role_id'] == 4 || $user['role_id'] == 5) {
    session()->setFlashdata('danger', "Halaman Khusus Pembina dan Pengurus");
    return redirect()->to('jadwal_mingguan');
}

?>

<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>
<div class="card">
    <div class="card-body py-4">

        <?php if ($url == 'unggulan') : ?>
            <div class="d-flex justify-content-end p-2">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_unggulan">
                    <i class="fa-regular fa-plus" style="color: #ffffff;"></i>
                </button>
            </div>
            <table id="myTable" class="display table">
                <thead>
                    <tr>
                        <th scope="col text-center">Nama Kegiatan</th>
                        <th scope="col text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nooo = 1 ?>
                    <?php foreach ($program as $row) : ?>
                        <tr>
                            <td><?= $row['nama'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_unggulan<?= $nooo ?>">
                                    <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus_unggulan<?= $nooo ?>">
                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </button>
                            </td>

                        </tr>

                        <div class="modal fade" id="update_unggulan<?= $nooo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="update_unggulan" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h1 class="modal-title fs-5 text-light" id="updateLabel">Ubah Kegiatan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nama" class="form-control" id="floatingInput" value="<?= $row['nama'] ?>" placeholder="name@example.com" maxlength="100">
                                                <label for="floatingInput">Nama Kegiatan</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-warning text-light">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal fade" id="hapus_unggulan<?= $nooo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="hapus_unggulan" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5 text-light" id="hapusLabel">Hapus Kegiatan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            Yakin ingin menghapus kegiatan
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning text-light" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger text-light">Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php $nooo++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <!-- Table with hoverable rows -->
        <?php if ($url == 'jadwal_harian') : ?>
            <table id="myTable" class="display table">
                <thead>
                    <tr>
                        <th scope="col text-center">Jam</th>
                        <th scope="col text-center">Kegiatan</th>
                        <th scope="col text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($harian as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row['Waktu'] ?></th>
                            <td><?= $row['Kegiatan'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update<?= $no ?>">
                                    <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="update<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="jadwal_harian" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-light" id="updateLabel">Update Jadwal Harian</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <?= csrf_field() ?>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="kegiatan" value=""><?= $row['Kegiatan'] ?></textarea>
                                                <label for="floatingTextarea2">Kegiatan</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-warning text-light">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <!-- End Table with hoverable rows -->

        <?php if ($url == 'jadwal_mingguan') : ?>
            <div class="d-flex justify-content-end p-2">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_jadwal">
                    <i class="fa-regular fa-plus" style="color: #ffffff;"></i>
                </button>
            </div>
            <table id="myTable" class="display table">
                <thead>
                    <tr>
                        <th scope="col text-center">Hari</th>
                        <th scope="col text-center">Jam</th>
                        <th scope="col text-center">Kegiatan</th>
                        <th scope="col text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $noo = 1 ?>
                    <?php foreach ($mingguan as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row['Hari'] ?></th>
                            <th scope="row"><?= $row['Waktu'] ?></th>
                            <td><?= $row['Kegiatan'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_mingguan<?= $noo ?>">
                                    <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus_mingguan<?= $noo ?>">
                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </button>
                            </td>

                        </tr>

                        <div class="modal fade" id="update_mingguan<?= $noo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="jadwal_mingguan" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h1 class="modal-title fs-5 text-light" id="updateLabel">Update Jadwal Mingguan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <?= csrf_field() ?>
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="hari" class="form-control" id="floatingInput" value="<?= $row['Hari'] ?>" placeholder="name@example.com" maxlength="10">
                                                <label for="floatingInput">Hari</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="waktu" class="form-control" id="floatingInput" value="<?= $row['Waktu'] ?>" placeholder="name@example.com" maxlength="20">
                                                <label for="floatingInput">Waktu</label>
                                            </div>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="kegiatan" value="" maxlength="100"><?= $row['Kegiatan'] ?></textarea>
                                                <label for="floatingTextarea2">Kegiatan</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-warning text-light">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="modal fade" id="hapus_mingguan<?= $noo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="hapus_mingguan" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5 text-light" id="hapusLabel">Hapus Jadwal Mingguan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            Yakin ingin menghapus kegiatan
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning text-light" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger text-light">Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php $noo++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>


<div class="modal fade" id="tambah_jadwal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="tambah_jadwal_mingguan" method="post">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-light" id="updateLabel">Tambah Jadwal Mingguan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?= csrf_field() ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="hari" class="form-control" id="floatingInput" placeholder="name@example.com" maxlength="10">
                        <label for="floatingInput">Hari</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="waktu" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" maxlength="20">Waktu</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="kegiatan" value=""></textarea>
                        <label for="floatingTextarea2">Kegiatan</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success text-light">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>



<div class="modal fade" id="tambah_unggulan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="tambah_unggulan" method="post">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-light text-light" id="updateLabel">Tambah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                    <?= csrf_field() ?>
                        <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="name@example.com" maxlength="30">
                        <label for="floatingInput">Nama Kegiatan</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success text-light">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>