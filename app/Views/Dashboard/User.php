<?php

if ($user['role_id'] == 3 || $user['role_id'] == 4 || $user['role_id'] == 5) {
    session()->setFlashdata('danger', "Halaman Khusus Pembina dan Pengurus");
    return redirect()->to('jadwal_mingguan');
}

?>

<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<style>
    .foto {
        width: 100px;
        aspect-ratio: 1 / 1;
    }
</style>

<div class="card">
    <div class="card-body py-5">
        <?php if ($url == 'user') : ?>
            <table id="myTable" class="display table">
                <thead>
                    <tr>
                        <th scope="col text-center">Foto</th>
                        <th scope="col text-center">Username</th>
                        <th scope="col text-center">Email</th>
                        <th scope="col text-center">Role</th>
                        <th scope="col text-center">Status</th>
                        <th scope="col text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nooo = 1 ?>
                    <?php foreach ($user_acc as $row) : ?>
                        <?php if ($row['role_id'] != 6) : ?>

                            <tr>
                                <td><img src="<?= base_url(); ?>/login/profile/<?= $row['image'] ?>" alt="" class="foto"></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?php if ($row['role_id'] == 1) {
                                        echo "Pembina";
                                    } else if ($row['role_id'] == 2) {
                                        echo "Pengurus";
                                    } else if ($row['role_id'] == 3) {
                                        echo "Pengajar";
                                    } else if ($row['role_id'] == 4) {
                                        echo "Wali";
                                    } else if ($row['role_id'] == 5) {
                                        echo "Santri";
                                    } else if ($row['role_id'] == 6) {
                                        echo "IT Support";
                                    } ?></td>
                                <td><?= ($row['is_active'] == 1) ? "Aktif" : "Tidak Aktif" ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update<?= $nooo ?>">
                                        <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                    </button>
                                    <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 6) : ?>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $nooo ?>">
                                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endif; ?>

                        <div class="modal fade" id="update<?= $nooo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="update" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h1 class="modal-title fs-5 text-light" id="updateLabel">Ubah Akun</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelect" name="role" aria-label="Floating label select example">
                                                    <option value="<?= $row['role_id'] ?>" selected><?php if ($row['role_id'] == 1) {
                                                                                                        echo "Pembina";
                                                                                                    } else if ($row['role_id'] == 2) {
                                                                                                        echo "Pengurus";
                                                                                                    } else if ($row['role_id'] == 3) {
                                                                                                        echo "Pengajar";
                                                                                                    } else if ($row['role_id'] == 4) {
                                                                                                        echo "Wali";
                                                                                                    } else if ($row['role_id'] == 5) {
                                                                                                        echo "Santri";
                                                                                                    } else if ($row['role_id'] == 6) {
                                                                                                        echo "IT Support";
                                                                                                    } ?></option>
                                                    <?php if ($user['role_id'] == 6) : ?>
                                                        <option value="1">Pembina</option>
                                                    <?php endif; ?>
                                                    <?php if ($user['role_id'] == 1 || $user['role_id'] == 6) : ?>
                                                        <option value="2">Pengurus</option>
                                                    <?php endif; ?>
                                                    <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 6) : ?>
                                                        <option value="3">Pengajar</option>
                                                        <option value="7">Bloger</option>
                                                    <?php endif; ?>
                                                    <option value="4">Wali</option>
                                                    <option value="5">Santri</option>
                                                </select>
                                                <label for="floatingSelect">Role User</label>

                                                <div class="form-floating mt-2">
                                                    <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example">
                                                        <option value="<?= $row['is_active'] ?>"><?= ($row['is_active'] == 1) ? "Aktif" : "Tidak Aktif" ?></option>
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                    <label for="floatingSelect">Status</label>
                                                </div>
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

                        <div class="modal fade" id="hapus<?= $nooo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="hapus" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h1 class="modal-title fs-5 text-light" id="hapusLabel">Hapus Akun</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <input type="hidden" name="image" value="<?= $row['image'] ?>">
                                            Yakin ingin menghapus Akun
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
    </div>
</div>

<?= $this->endSection() ?>