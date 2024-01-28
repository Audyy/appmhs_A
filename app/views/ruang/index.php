<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Ruang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Ruang</h3>
                <div class="btn-group float-right">
                    <a href="<?= base_url; ?>/ruang/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Ruang</a>
                    <a href="<?= base_url; ?>/ruang/laporan" class="btn float-right btn-xs btn btn-info" target="_blank">Laporan Ruang</a>
                    <a href="<?= base_url; ?>/ruang/lihatlaporan" class="btn float-right btn-xs btn btn-warning" target="_blank">Lihat Laporan Ruang</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Ruang</th>
                            <th>Gedung</th>
                            <th>Lantai</th>
                            <th>Program Studi</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['ruang'] as $key => $ruang) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $ruang['KodeRuang']; ?></td>
                                <td><?= $ruang['Gedung']; ?></td>
                                <td><?= $ruang['Lantai']; ?></td>
                                <td><?= $ruang['NamaProgram']; ?></td>
                                <td><?= $ruang['Kelas']; ?></td>
                                <td>
                                    <a href="<?= base_url; ?>/ruang/edit/<?= $ruang['RuangID']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url; ?>/ruang/hapus/<?= $ruang['RuangID']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ruang ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->