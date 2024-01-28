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
            <form role="form" action="<?= base_url; ?>/ruang/updateRuang" method="POST">
                <input type="hidden" name="id" value="<?= $data['ruang']['RuangID']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeRuang">Kode Ruang</label>
                        <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" value="<?= $data['ruang']['KodeRuang']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gedung">Gedung</label>
                        <input type="text" class="form-control" id="gedung" name="gedung" value="<?= $data['ruang']['Gedung']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lantai">Lantai</label>
                        <input type="number" class="form-control" id="lantai" name="lantai" value="<?= $data['ruang']['Lantai']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="form-control" name="program_studi_id">
                            <option value="">Pilih</option>
                            <?php foreach ($data['program_studi'] as $row) : ?>
                                <option value="<?= $row['ProgramStudiID']; ?>" <?= ($data['ruang']['ProgramStudiID'] == $row['ProgramStudiID']) ? 'selected' : ''; ?>><?= $row['NamaProgram']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['ruang']['Kelas']; ?>" required>
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