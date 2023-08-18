<?= $this->extend('Dashboard/Layout') ?>

<?= $this->section('database') ?>
<div class="card">
    <div class="card-body py-4">

        <!-- Table with hoverable rows -->
        <?php if ($url == 'jadwal_harian') : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col text-center">Jam</th>
                        <th scope="col text-center">Kegiatan</th>
                        <th scope="col text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($harian as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row['Waktu'] ?></th>
                            <td><?= $row['Kegiatan'] ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <!-- End Table with hoverable rows -->

        <?php if ($url == 'jadwal_mingguan') : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col text-center">Hari</th>
                        <th scope="col text-center">Jam</th>
                        <th scope="col text-center">Kegiatan</th>
                        <th scope="col text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mingguan as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row['Hari'] ?></th>
                            <th scope="row"><?= $row['Waktu'] ?></th>
                            <td><?= $row['Kegiatan'] ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>