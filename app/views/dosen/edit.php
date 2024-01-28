<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Dosen</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/dosen/updateDosen" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['dosen']['DosenID']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" class="form-control" placeholder="masukkan nama dosen..." name="nama_dosen" value="<?= $data['dosen']['NamaDosen']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="masukkan alamat..." name="alamat"><?= $data['dosen']['Alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="masukkan tanggal lahir..." name="tgl_lahir" value="<?= $data['dosen']['TanggalLahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" placeholder="masukkan jenis kelamin..." name="jns_kelamin" value="<?= $data['dosen']['JenisKelamin']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kontak Darurat</label>
                        <input type="text" class="form-control" placeholder="masukkan kontak..." name="kontak" value="<?= $data['dosen']['KontakDarurat']; ?>">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->