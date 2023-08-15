<div class="col-md-12">
    <div class="card card-outline card-info">
        <!-- <div class="card-header">
            <h3 class="card-title">
                Summernote
            </h3>
        </div> -->
        <?php session();
        $validasi = \Config\Services::validation();
        ?>
        <?php echo form_open_multipart('guru/updatedata/' . $guru['id_guru']) ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kode Guru</label>
                        <input name="kode_guru" class="form-control" maxlength="4" placeholder="Kode Guru" value="<?= $guru['kode_guru']; ?>" readonly> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('kode_guru'); ?></p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>NIK</label>
                        <input name="nik" class="form-control" maxlength="20" placeholder="NIK" value="<?= $guru['nik']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('nik'); ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nama Guru</label>
                <input name="nama_guru" class="form-control" placeholder="Nama Guru" value="<?= $guru['nama_guru']; ?>"></input>
                <p class="text-danger"><?= $validasi->getError('nama_guru'); ?></p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input name="tempat_lahir" class="form-control" placeholder="tempat Lahir" value="<?= $guru['tempat_lahir']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('tempat_lahir'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input name="tgl_lahir" class="form-control" type="date" value="<?= $guru['tgl_lahir']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('tgl_lahir'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="L" <?= $guru['jk'] == 'L' ? 'selected' : ''; ?>>Laki-Laki</option>
                            <option value="P" <?= $guru['jk'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                        <p class="text-danger"><?= $validasi->getError('jk'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>No telphone</label>
                        <input name="telp_guru" class="form-control" placeholder="No. Telephone" value="<?= $guru['telp_guru']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('telp_guru'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <select class="form-control" name="pendidikan">
                            <option value="">--Pilih jenjang Pendidikan--</option>
                            <option value="S1" <?= $guru['pendidikan'] == 'S1' ? 'selected' : ''; ?>>Sarjana-</option>
                            <option value="S2" <?= $guru['pendidikan'] == 'S2' ? 'selected' : ''; ?>>Magister</option>
                            <option value="S3" <?= $guru['pendidikan'] == 'S3' ? 'selected' : ''; ?>>Doctor</option>
                        </select>
                        <p class="text-danger"><?= $validasi->getError('jk'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Program Studi</label>
                        <input name="prodi" class="form-control" placeholder="Program Studi" value="<?= $guru['prodi']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('prodi'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" accept="imgae/*" name="foto_guru" id="preview_gambar" class="form-control">
                        <p class="text-danger"><?= $validasi->getError('foto_guru'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Preview Foto</label><br>
                        <img src="<?= base_url('fotoguru/' . $guru['foto_guru']); ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <a href="<?= base_url('guru'); ?>" class="btn btn-success btn-flat">Kembali</a>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->
<!-- js preview gambar -->
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#preview_gambar').change(function() {
        bacaGambar(this);
    })
</script>