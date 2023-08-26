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

<?php if ($url == 'blog_create') : ?>
    <div class="card p-4">
        <div class="card-body">
            <form action="tambah_blog" method="post" enctype="multipart/form-data">

                <?= csrf_field() ?>

                <h5 class="text-center">Foto Artikel</h5>
                <div class="d-flex justify-content-center py-2" style="border-radius:50%;">
                    <img id="image" src="<?= base_url() ?>landingpage/hero.png" style=" width: 100%; height: 300px; object-fit: cover; border-radius:20px; border: 1px solid #00593B; padding: 2px;" />
                    <input required type="file" id="myfile" name="foto_baru" style="display:none" onchange="readURL(this);" />
                </div>

                <div class="form-floating mb-3">
                    <input required type="text" name="kegiatan" class="form-control" id="floatingInput" maxlength="25">
                    <label for="floatingInput">Judul Artikel</label>
                </div>

                <div class="form-floating py-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_1" maxlength="1000"></textarea>
                    <label for="floatingTextarea2">Teks 1</label>
                </div>
                <div class="form-floating py-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_2" maxlength="1000"></textarea>
                    <label for="floatingTextarea2">Teks 2</label>
                </div>
                <div class="form-floating py-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_3" maxlength="1000"></textarea>
                    <label for="floatingTextarea2">Teks 3</label>
                </div>
                <div class="form-floating py-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_4" maxlength="1000"></textarea>
                    <label for="floatingTextarea2">Teks 4</label>
                </div>

                <div class="form-floating py-2">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="link_yt" maxlength="1000"></textarea>
                    <label for="floatingTextarea2">Link Youtube Opsional</label>
                </div>

                <input type="hidden" name="user" value="<?= $user['id'] ?>">

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>

            </form>
        </div>
    </div>

<?php endif; ?>

<?php if ($url == 'blog_update') : ?>
    <div class="card py-4">
        <div class="card-body">
            <table id="myTable" class="table display">
                <thead>
                    <th>Foto</th>
                    <th>Tema</th>
                    <th>Text 1</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <?php $no = 1 ?>
                <?php foreach ($blog as $row) : ?>
                    <tbody>

                        <tr>
                            <td>
                                <img src="<?= base_url() ?>/blog/<?= $row['blog_image'] ?>" style="max-width: 200px; width: 100%; border-radius: 10px;" alt="">
                            </td>
                            <td><?= $row['tema'] ?></td>
                            <td><?= $row['text_1'] ?></td>
                            <td><?= ($row['status'] == 1) ? "Publish" : "Pending" ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update<?= $no ?>">
                                    <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">
                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </button>
                            </td>
                        </tr>



                    </tbody>
                    <div class="modal fade" id="update<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="update<?= $no ?>Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h1 class="modal-title fs-5 text-light" id="update<?= $no ?>Label">Ubah Artikel</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="ubah_blog" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <input value="<?= $row['blog_image'] ?>" type="hidden" id="myfile<?= $no ?>" name="foto_lama" style="display:none" />


                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                        <h5 class="text-center">Foto Artikel</h5>
                                        <div class="d-flex justify-content-center py-2" style="border-radius:50%;">
                                            <img id="image" src="<?= base_url() ?>blog/<?= $row['blog_image'] ?>" style=" width: 100%; height: 300px; object-fit: cover; border-radius:20px; border: 1px solid #00593B; padding: 2px;" />
                                            <input type="file" id="myfile" name="foto_baru" style="display:none" onchange="readURL(this);" />
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input required type="text" name="kegiatan" class="form-control" id="floatingInput" maxlength="25" value="<?= $row['tema'] ?>">
                                            <label for="floatingInput">Judul Artikel</label>
                                        </div>

                                        <div class="form-floating py-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_1" maxlength="1000"><?= $row['text_1'] ?></textarea>
                                            <label for="floatingTextarea2">Teks 1</label>
                                        </div>
                                        <div class="form-floating py-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_2" maxlength="1000"><?= $row['text_2'] ?></textarea>
                                            <label for="floatingTextarea2">Teks 2</label>
                                        </div>
                                        <div class="form-floating py-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_3" maxlength="1000"><?= $row['text_3'] ?></textarea>
                                            <label for="floatingTextarea2">Teks 3</label>
                                        </div>
                                        <div class="form-floating py-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="teks_4" maxlength="1000"><?= $row['text_4'] ?></textarea>
                                            <label for="floatingTextarea2">Teks 4</label>
                                        </div>

                                        <div class="form-floating py-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="link_yt" maxlength="1000"></textarea>
                                            <label for="floatingTextarea2">Link Youtube Opsional</label>
                                        </div>

                                        <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 3 || $user['role_id'] == 6) : ?>
                                            <select class="form-select py-2" name="status" aria-label="Default select example">
                                                <option value="0">Pending</option>
                                                <option value="1">Publish</option>
                                            </select>
                                        <?php endif; ?>

                                        <input type="hidden" name="user" value="<?= $user['id'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning text-light">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="hapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="hapus_blog" method="post">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h1 class="modal-title fs-5 text-light" id="hapusLabel">Hapus Blog</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input value="<?= $row['blog_image'] ?>" type="hidden" id="myfile<?= $no ?>" name="foto_lama" style="display:none" />
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <h4>Yakin ingin menghapus Blog</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning text-light" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger text-light">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <?php $no++; ?>
                <?php endforeach; ?>
            </table>
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