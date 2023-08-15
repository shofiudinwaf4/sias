<div class="col-md-4">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Logo Header
            </h3>
        </div>
        <?php session();
        $validasi = \Config\Services::validation();
        ?>
        <?php echo form_open_multipart('setting/updatelogoheader') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <img src="<?= base_url('Gambar/' . $logo['logo_header']); ?>" width="100%">
                </div>
                <div class="form-group">
                    <label>Ganti Logo Header</label>
                    <input type="file" accept=".png" name="logo_header" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('logo_header'); ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <!-- <a href="<?= base_url('download'); ?>" class="btn btn-success btn-flat">Kembali</a> -->
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->
<div class="col-md-4">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Logo Sekolah
            </h3>
        </div>
        <?php session();
        $validasi = \Config\Services::validation();
        ?>
        <?php echo form_open_multipart('setting/updatelogosekolah') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <img src="<?= base_url('Gambar/' . $logo['logo_sekolah']); ?>" width="100%">
                </div>
                <div class="form-group">
                    <label>Ganti Logo Sekolah</label>
                    <input type="file" accept=".png" name="logo_sekolah" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('logo_sekolah'); ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <!-- <a href="<?= base_url('download'); ?>" class="btn btn-success btn-flat">Kembali</a> -->
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->
<div class="col-md-4">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Logo Dinas
            </h3>
        </div>
        <?php session();
        $validasi = \Config\Services::validation();
        ?>
        <?php echo form_open_multipart('setting/updatelogodinas') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <img src="<?= base_url('Gambar/' . $logo['logo_dinas']); ?>" width="100%">
                </div>
                <div class="form-group">
                    <label>Ganti Logo Dinas</label>
                    <input type="file" accept=".png" name="logo_dinas" class="form-control">
                    <p class="text-danger"><?= $validasi->getError('logo_dinas'); ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <!-- <a href="<?= base_url('download'); ?>" class="btn btn-success btn-flat">Kembali</a> -->
        </div>
        <?= form_close(); ?>
    </div>
</div>