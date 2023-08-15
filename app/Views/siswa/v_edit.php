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
        <?php echo form_open_multipart('siswa/updatedata/' . $siswa['id_siswa']) ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>NISN</label>
                        <input name="nisn" class="form-control" maxlength="10" placeholder="NISN" value="<?= $siswa['nisn']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('nisn'); ?></p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input name="nama_siswa" class="form-control" placeholder="Nama Siswa" value="<?= $siswa['nama_siswa']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('nik'); ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input name="tempat_lahir" class="form-control" placeholder="tempat Lahir" value="<?= $siswa['tempat_lahir']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('tempat_lahir'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input name="tgl_lahir" class="form-control" type="date" value="<?= $siswa['tgl_lahir']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('tgl_lahir'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="">--Pilih jenis Kelamin--</option>
                            <option value="L" <?= $siswa['jk'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="P" <?= $siswa['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <p class="text-danger"><?= $validasi->getError('jk'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="id_kelas">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $key => $k) { ?>
                                <option value="<?= $k['id_kelas']; ?>" <?= $siswa['id_kelas'] == $k['id_kelas'] ? 'selected' : '' ?>><?= $k['kelas']; ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?= $validasi->getError('id_kelas'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="id_jurusan">
                            <?php foreach ($jurusan as $key => $j) { ?>
                                <option value="<?= $j['id_jurusan']; ?>" <?= $siswa['id_jurusan'] == $j['id_jurusan'] ? 'selected' : '' ?>><?= $j['jurusan']; ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger"><?= $validasi->getError('id_jurusan'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Tahun Angkatan</label>
                        <input name="angkatan" type="number" min="2017" maxlength="4" minlength="4" class="form-control" placeholder="Tahun Angkatan" value="<?= $siswa['angkatan']; ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('angkatan'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Foto Siswa</label>
                        <input type="file" accept="imgae/*" name="foto" id="preview_gambar" class="form-control">
                        <p class="text-danger"><?= $validasi->getError('foto'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group"> <br>
                        <label>Preview Foto</label><br>
                        <img src="<?= base_url('fotosiswa/' . $siswa['foto']); ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                <a href="<?= base_url('siswa'); ?>" class="btn btn-success btn-flat">Kembali</a>
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