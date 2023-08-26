<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<div class="card py-4">
    <div class="card-body">
        <div class="d-flex justify-content-end my-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        <table id="myTable" class="display table">
            <thead>
                <?php if ($url != 'donasi') : ?>
                    <th>Jenis</th>
                <?php endif; ?>
                <?php if ($url == 'donasi') : ?>
                    <th>Nama</th>
                    <th>Telfon</th>
                <?php endif; ?>
                <th>Jumlah</th>
                <th><?= ($url == 'pemasukan') ? 'Deskripsi' : 'Keterangan' ?></th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Bukti</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($keuangan as $row) : ?>
                    <?php
                    $date = date_create($row['waktu']);
                    $tanggal = date_format($date, 'd-m-Y');
                    $jam = date_format($date, 'H:i');
                    ?>
                    <tr>
                        <?php if ($url != 'donasi') : ?>
                            <td><?= $row['jenis'] ?></td>
                        <?php endif; ?>
                        <td><?= $row['nama'] ?></td>
                        <?php if ($url == 'donasi') : ?>
                            <td><?= $row['telfon'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                        <?php endif; ?>
                        <td><?= $row['keterangan'] ?></td>
                        <td><?= $tanggal ?></td>
                        <td><?= $jam ?></td>
                        <td>
                            <img src="<?= base_url() ?>bukti/<?= $row['bukti'] ?>" style="max-width: 100px; width: 100%;" alt="">
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubah<?= $no ?>">
                                <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="ubah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubah<?= $no ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h1 class="modal-title fs-5 text-light" id="ubah<?= $no ?>Label">Ubah <?php if ($url == 'pemasukan') {
                                                                                                                echo 'Pemasukan';
                                                                                                            } else if ($url == 'pengeluaran') {
                                                                                                                echo 'Pengeluaran';
                                                                                                            } else if ($url == 'donasi') {
                                                                                                                echo 'Donasi';
                                                                                                            } ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="ubah_keuangan" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <?php if ($url != 'donasi') : ?>
                                            <div class="form-floating mb-3">
                                                <input value="<?= $row['jenis'] ?>" type="text" name="jenis" class="form-control" id="floatingInput" maxlength="25">
                                                <label for="floatingInput">Jenis</label>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($url == 'donasi') : ?>
                                            <div class="form-floating mb-3">
                                                <input value="<?= $row['nama'] ?>" type="text" name="nama" class="form-control" id="floatingInput" maxlength="25">
                                                <label for="floatingInput">Nama</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input value="<?= $row['telfon'] ?>" type="number" name="telfon" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;">
                                                <label for="floatingInput">Telfon</label>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-floating mb-3">
                                            <input value="<?= $row['jumlah'] ?>" type="number" name="jumlah" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==8 && event.keyCode!=8) return false;">
                                            <label for="floatingInput">Jumlah</label>
                                        </div>


                                        <div class="form-floating py-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="keterangan" maxlength="1000"></textarea>
                                            <label for="floatingTextarea2"><?php if ($url == 'pemasukan') {
                                                                                echo 'Deskripsi';
                                                                            } else if ('pengeluaran') {
                                                                                echo 'Keterangan';
                                                                            } else if ($url == 'donasi') {
                                                                                echo 'Keterangan';
                                                                            } ?><?= $row['keterangan'] ?></label>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <label class="my-2" for="floatingTextarea2">Bukti <?php if ($url == 'pemasukan') {
                                                                                                    echo 'Transfer';
                                                                                                } else if ('pengeluaran') {
                                                                                                    echo 'Keterangan';
                                                                                                } else if ($url == 'donasi') {
                                                                                                    echo 'Transfer';
                                                                                                } ?></label>
                                            <img id="image" src="<?= base_url() ?>bukti/<?= ($row['bukti'] == null) ? 'default.jpg' : $row['bukti'] ?>" style=" width: 200px; height: 250px; object-fit: cover; border-radius:5px; border: 1px solid #00593B; padding: 2px;" />
                                            <input type="file" id="myfile" name="foto_baru" style="display:none" onchange="readURL(this);" />
                                        </div>

                                        <input type="hidden" name="page" value="<?= $url ?>">
                                        <input type="hidden" name="foto_lama" value="<?= $row['bukti'] ?>">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="hapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapus<?= $no ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h1 class="modal-title fs-5 text-light" id="hapus<?= $no ?>Label">Hapus <?php if ($url == 'pemasukan') {
                                                                                                                echo 'Pemasukan';
                                                                                                            } else if ($url == 'pengeluaran') {
                                                                                                                echo 'Pengeluaran';
                                                                                                            } else if ($url == 'donasi') {
                                                                                                                echo 'Donasi';
                                                                                                            } ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="hapus_keuangan" method="post">
                                    <div class="modal-body">
                                        <h2>Yakin ingin menghapus <?php if ($url == 'pemasukan') {
                                                                        echo 'Pemasukan';
                                                                    } else if ($url == 'pengeluaran') {
                                                                        echo 'Pengeluaran';
                                                                    } else if ($url == 'donasi') {
                                                                        echo 'donasi dari ' . $row['nama'];
                                                                    } ?></h2>
                                        <input type="hidden" name="page" value="<?= $url ?>">
                                        <input type="hidden" name="foto_lama" value="<?= $row['bukti'] ?>">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger text-light">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-light" id="tambahLabel">Tambah <?php if ($url == 'pemasukan') {
                                                                                    echo 'Pemasukan';
                                                                                } else if ($url == 'pengeluaran') {
                                                                                    echo 'Pengeluaran';
                                                                                } else if ($url == 'donasi') {
                                                                                    echo 'Donasi';
                                                                                } ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="tambah_keuangan" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php if ($url != 'donasi') : ?>
                        <div class="form-floating mb-3">
                            <input type="text" name="jenis" class="form-control" id="floatingInput" maxlength="25">
                            <label for="floatingInput">Jenis</label>
                        </div>
                    <?php endif; ?>

                    <?php if ($url == 'donasi') : ?>
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" class="form-control" id="floatingInput" maxlength="25">
                            <label for="floatingInput">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="telfon" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;">
                            <label for="floatingInput">Telfon</label>
                        </div>
                    <?php endif; ?>

                    <div class="form-floating mb-3">
                        <input type="number" name="jumlah" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==8 && event.keyCode!=8) return false;">
                        <label for="floatingInput">Jumlah</label>
                    </div>


                    <div class="form-floating py-2">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="keterangan" maxlength="1000"></textarea>
                        <label for="floatingTextarea2"><?php if ($url == 'pemasukan') {
                                                            echo 'Deskripsi';
                                                        } else if ('pengeluaran') {
                                                            echo 'Keterangan';
                                                        } else if ($url == 'donasi') {
                                                            echo 'Keterangan';
                                                        } ?></label>
                    </div>

                    <div class="d-flex flex-column">
                        <label class="my-2" for="floatingTextarea2">Bukti <?= ($url == 'pemasukan') ? 'Transfer' : 'Pengeluaran' ?></label>
                        <img id="image" src="<?= base_url() ?>bukti/default.jpg" style=" width: 200px; height: 250px; object-fit: cover; border-radius:5px; border: 1px solid #00593B; padding: 2px;" />
                        <input required type="file" id="myfile" name="foto_baru" style="display:none" onchange="readURL(this);" />
                    </div>

                    <input type="hidden" name="page" value="<?= $url ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

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