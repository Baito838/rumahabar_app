<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>

<div class="card py-4">
    <div class="card-body">
        <div class="d-flex justify-content-end my-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="fa-regular fa-plus" style="color: #ffffff;"></i>
            </button>
        </div>
        <table id="myTable" class="display table">
            <thead>
                <th>Santri</th>
                <th>Pengajar</th>
                <th>Kegiatan</th>
                <?= ($url == 'ziyadah') ? "<th>Juz</th>" : "" ?>
                <?= ($url == 'ziyadah') ? "<th>Surah</th>" : "" ?>
                <th>Keterangan</th>
                <th>Waktu</th>
                <th>Tanggal</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($nilai as $row) : ?>
                    <?php
                    $date = date_create($row['waktu']);
                    $tanggal = date_format($date, "d-m-Y");
                    $jam = date_format($date, "H:i");

                    $surah = explode("|", $row['surah']);
                    // dd($surah);
                    $no = 1;
                    ?>
                    <tr>
                        <td><?= $row['santri'] ?></td>
                        <td><?= $row['pengajar'] ?></td>
                        <td><?= $row['kegiatan'] ?></td>
                        <?= ($url == 'ziyadah') ? "<td>" . $surah[0] . "</td>" : "" ?>
                        <?= ($url == 'ziyadah') ? "<td>" . $surah[1] . "</td>" : "" ?>
                        <td><?= $row['keterangan'] ?></td>
                        <td><?= $jam ?></td>
                        <td><?= $tanggal ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update<?= $no ?>">
                                <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="update<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="update<?= $no ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h1 class="modal-title fs-5 text-light" id="update<?= $no ?>Label">Ubah Nilai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="update_nilai" method="post">
                                    <div class="modal-body">
                                    <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                        <div class="py-2">
                                            <div class="form-floating">
                                                <select class="form-select" name="santri" id="floatingSelect" aria-label="Floating label select example">
                                                    <?php foreach ($santri as $raw) : ?>
                                                        <option value="<?= $raw['id'] ?>"><?= $raw['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label for="floatingSelect">Santri</label>
                                            </div>
                                        </div>

                                        <div class="py-2">
                                            <div class="form-floating">
                                                <select class="form-select" name="pengajar" id="floatingSelect" aria-label="Floating label select example">
                                                    <?php foreach ($pengajar as $raw) : ?>
                                                        <option value="<?= $raw['id'] ?>"><?= $raw['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label for="floatingSelect">Pengajar</label>
                                            </div>
                                        </div>

                                        <?php if ($url == 'ziyadah') : ?>
                                            <div class="row py-2">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" name="surah[]" class="form-control" id="floatingInput" maxlength="3">
                                                        <label for="floatingInput">Ayat</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="surah[]" class="form-control" id="floatingInput" maxlength="25">
                                                        <label for="floatingInput">Surah</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="kegiatan" class="form-control" id="floatingInput" maxlength="25" value="<?= $row['kegiatan'] ?>">
                                            <label for="floatingInput">Kegiatan</label>
                                        </div>

                                        <div class="form-floating py-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="keterangan" maxlength="100"><?= $row['keterangan'] ?></textarea>
                                            <label for="floatingTextarea2">keterangan</label>
                                        </div>

                                        <input type="hidden" name="mapel" value="<?php
                                                                                    if ($url == 'diniyah') {
                                                                                        echo "0";
                                                                                    } else if ($url == 'ziyadah') {
                                                                                        echo "1";
                                                                                    } else if ($url == 'bahasa_arab') {
                                                                                        echo "2";
                                                                                    }
                                                                                    ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                                        </button>
                                        <button type="submit" class="btn btn-warning text-light">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="hapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapus<?= $no ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h1 class="modal-title fs-5 text-light" id="hapus<?= $no ?>Label">Hapus Nilai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="hapus_nilai" method="post">
                                    <div class="modal-body">

                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                        <h3>Yakin ingin menghapus nilai</h3>

                                        <input type="hidden" name="mapel" value="<?php
                                                                                    if ($url == 'diniyah') {
                                                                                        echo "0";
                                                                                    } else if ($url == 'ziyadah') {
                                                                                        echo "1";
                                                                                    } else if ($url == 'bahasa_arab') {
                                                                                        echo "2";
                                                                                    }
                                                                                    ?>">
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
                <h1 class="modal-title fs-5 text-light" id="tambahLabel">Tambah Nilai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="tambah_nilai" method="post">
                <div class="modal-body">
                <?= csrf_field() ?>
                    <div class="py-2">
                        <div class="form-floating">
                            <select class="form-select" name="santri" id="floatingSelect" aria-label="Floating label select example">
                                <?php foreach ($santri as $row) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Santri</label>
                        </div>
                    </div>

                    <div class="py-2">
                        <div class="form-floating">
                            <select class="form-select" name="pengajar" id="floatingSelect" aria-label="Floating label select example">
                                <?php foreach ($pengajar as $row) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="floatingSelect">Pengajar</label>
                        </div>
                    </div>

                    <?php if ($url == 'ziyadah') : ?>
                        <div class="row py-2">
                            <div class="col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="number" name="surah[]" class="form-control" id="floatingInput" maxlength="3">
                                    <label for="floatingInput">Ayat</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-floating mb-3">
                                    <input type="text" name="surah[]" class="form-control" id="floatingInput" maxlength="25">
                                    <label for="floatingInput">Surah</label>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-floating mb-3">
                        <input type="text" name="kegiatan" class="form-control" id="floatingInput" maxlength="25">
                        <label for="floatingInput">Kegiatan</label>
                    </div>

                    <div class="form-floating py-2">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="keterangan" maxlength="100"></textarea>
                        <label for="floatingTextarea2">keterangan</label>
                    </div>

                    <input type="hidden" name="mapel" value="<?php
                                                                if ($url == 'diniyah') {
                                                                    echo "0";
                                                                } else if ($url == 'ziyadah') {
                                                                    echo "1";
                                                                } else if ($url == 'bahasa_arab') {
                                                                    echo "2";
                                                                }
                                                                ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                    </button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>