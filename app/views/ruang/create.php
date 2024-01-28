<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
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
            <form role="form" action="<?= base_url; ?>/ruang/simpanRuang" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Ruang</label>
                        <input type="text" class="form-control" placeholder="Masukkan kode ruang..." name="kode_ruang">
                    </div>
                    <div class="form-group">
                        <label>Gedung</label>
                        <input type="text" class="form-control" placeholder="Masukkan gedung..." name="gedung">
                    </div>
                    <div class="form-group">
                        <label>Lantai</label>
                        <input type="number" class="form-control" placeholder="Masukkan lantai..." name="lantai">
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="form-control" name="program_studi_id">
                            <option value="">Pilih</option>
                            <?php foreach ($data['program_studi'] as $row) : ?>
                                <option value="<?= $row['ProgramStudiID']; ?>"><?= $row['NamaProgram']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" class="form-control" placeholder="Masukkan kelas..." name="kelas">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->