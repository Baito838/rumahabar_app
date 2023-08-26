<?php
// dd($santri);


if($user['role_id'] == 3 || $user['role_id'] == 4 || $user['role_id'] == 5 ){
    session()->setFlashdata('danger', "Halaman Khusus Pembina dan Pengurus");
    return redirect()->to('jadwal_mingguan');
}

?>



<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<div class="card py-4">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="fa-regular fa-plus" style="color: #ffffff;"></i>
            </button>
        </div>
        <table id="myTable" class="display table">
            <thead>
                <tr>
                    <th scope="col text-center">Nama</th>
                    <?= ($url == 'santri') ? "<th> NISN </th>" : "" ?>
                    <?= ($url == 'karyawan') ? "<th> NIG </th>" : "" ?>
                    <?= ($url == 'santri') ? "<th> Tanggal Lahir </th>" : "" ?>
                    <?= ($url != 'wali') ? "" : "<th> Wali Dari </th>" ?>
                    <th scope="col text-center">Telfon</th>
                    <?= ($url != 'santri') ? "<th> KTP </th>" : "" ?>
                    <th scope="col text-center">Alamat</th>
                    <th scope="col text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $noo = 1 ?>
                <?php foreach ($santri as $row) : ?>
                    <?php $date = date_create($row['ttl']) ?>
                    <?php $date = date_format($date, 'd-m-Y') ?>
                    <tr>
                        <th><?= ucfirst($row['nama']) ?></th>
                        <?= ($url == 'santri') ? "<th>" . $row['nisn']. "</th>" : ""  ?>
                        <?= ($url == 'karyawan') ? "<th>" . $row['nig'] . "</th>" :  '';  ?>
                        <?= ($url == 'santri') ? "<th>" . $date . "</th>" : ""  ?>
                        <?= ($row['wali'] == 'null') ? "" : "<th>" . ucfirst($row['wali']) . "</th>"  ?>
                        <th><?= $row['telfon'] ?></th>
                        <?= ($url == 'santri') ? "" : "<th>" . $row['ktp'] . "</th>"  ?>
                        <th><?= $row['alamat'] ?></th>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update<?= $noo ?>">
                                <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $noo ?>">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </td>

                    </tr>

                    <div class="modal fade" id="update<?= $noo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="ubah_data" method="post">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h1 class="modal-title fs-5 text-light" id="updateLabel">Ubah Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="page" value="<?= $url ?>">
                                        <?= csrf_field() ?>
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?= $row['nama'] ?>" name="nama" class="form-control" id="floatingInput">
                                            <label for="floatingInput">Nama</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="<?= ($url != 'santri') ? 'hidden' : 'number' ?>" value="<?= ($url != 'santri') ? '000000' : $row['nisn'] ?>" name="nisn" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                                            <?= ($url != 'santri') ? '' : '<label for="floatingInput">Nomor Induk Santri</label>' ?>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="<?= ($url != 'karyawan') ? 'hidden' : 'number' ?>" value="<?= ($url != 'karyawan') ? '000000' : $row['nig'] ?>" name="nisn" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                                            <?= ($url != 'karyawan') ? '' : '<label for="floatingInput">Nomor Induk Guru</label>' ?>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="<?= ($url != 'wali') ? 'hidden' : 'text' ?>" value="<?= ($url != 'wali') ? 'null' : $row['nama'] ?>" name="wali" class="form-control" id="wali">
                                            <?= ($url != 'wali') ? '' : '<label for="floatingInput">Wali Dari</label>' ?>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="<?= ($url != 'santri') ? 'hidden' : 'date' ?>" value="<?= ($url != 'santri') ? '0000-00-00' : $row['ttl'] ?>" name="ttl" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;">
                                            <?= ($url != 'santri') ? '' : '<label for="floatingInput">Tempat Tanggal Lahir</label>' ?>
                                            
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" name="telfon" value="<?= $row['telfon'] ?>" class="form-control" id="floatingInput">
                                            <label for="floatingInput">Telfon</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="<?= ($url == 'santri') ? 'hidden' : 'text' ?>" value="<?= ($url == 'santri') ? '0' : $row['ktp'] ?>" name="ktp" class="form-control" id="ktp">
                                            <?= ($url == 'santri') ? '' : '<label for="floatingInput">KTP</label>' ?>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="alamat" placeholder="" id="floatingInput"><?= $row['alamat'] ?></textarea>
                                            <label for="floatingInput">Alamat</label>
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

                    <div class="modal fade" id="hapus<?= $noo ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="hapus_data" method="post">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h1 class="modal-title fs-5 text-light" id="hapusLabel">Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="page" value="<?= $url ?>">
                                        Yakin ingin menghapus
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
    </div>
</div>

<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="tambah_data" method="post">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-light" id="tambahLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"><?= csrf_field() ?>

                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control" id="floatingInput">
                        <label for="floatingInput">Nama</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="<?= ($url != 'santri') ? 'hidden' : 'number' ?>" name="nisn" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                        <?= ($url != 'santri') ? '' : '<label for="floatingInput">Nomor Induk Santri</label>' ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="<?= ($url != 'karyawan') ? 'hidden' : 'number' ?>" name="nig" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==6 && event.keyCode!=8) return false;">
                        <?= ($url != 'karyawan') ? '' : '<label for="floatingInput">Nomor Induk Guru</label>' ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="<?= ($url != 'wali') ? 'hidden' : 'text' ?>" value="<?= ($url != 'wali') ? 'null' : '' ?>" name="wali" class="form-control" id="wali">
                        <?= ($url != 'wali') ? '' : '<label for="floatingInput">Wali Dari</label>' ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="<?= ($url != 'santri') ? 'hidden' : 'date' ?>" name="ttl" class="form-control" id="floatingInput">
                        <?= ($url != 'santri') ? '' : '<label for="floatingInput">Tempat Tanggal Lahir</label>' ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" name="telfon" class="form-control" id="floatingInput" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;">
                        <label for="floatingInput">Telfon</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="<?= ($url == 'santri') ? 'hidden' : 'text' ?>" name="ktp" class="form-control" id="ktp">
                        <?= ($url == 'santri') ? '' : '<label for="floatingInput">KTP</label>' ?>

                    </div>

                    <input type="hidden" value="<?php if ($url == 'santri') {
                                                    echo 5;
                                                } else if ($url == 'wali') {
                                                    echo 4;
                                                } else {
                                                    echo 3;
                                                } ?>" name="role" class="form-control">


                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="alamat" placeholder="" id="floatingInput"></textarea>
                        <label for="floatingInput">Alamat</label>
                    </div>
                    <input type="hidden" name="page" value="<?= $url ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success text-light">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>