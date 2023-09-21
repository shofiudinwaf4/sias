<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <?= $subjudul; ?>
            </h3>
        </div>
        <?php session();
        $validasi = \Config\Services::validation();
        ?>
        <?php echo form_open_multipart('download/updatedata/' . $download['id_download']) ?>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="form-group">
                <label>Nama File</label>
                <input name="nama_file" class="form-control" placeholder="Nama File" value="<?= $download['nama_file']; ?>"> </input>
                <p class="text-danger"><?= $validasi->getError('nama_file'); ?></p>
            </div>
            <div class="form-group">
                <label>File Pdf</label>
                <input type="file" accept=".pdf" name="file_download" class="form-control"><?= $download['file_download']; ?></input>
                <p class="text-danger"><?= $validasi->getError('file_download'); ?></p>
            </div>
            <!-- <div class="form-group"> <br>
                <label>Preview File</label><br>
                <img src="<?= base_url('file/' . $download['file_download']); ?>" id="gambar_load" width="500px">
            </div> -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <a href="<?= base_url('download'); ?>" class="btn btn-success btn-flat">Kembali</a>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->