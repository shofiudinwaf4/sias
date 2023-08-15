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
        <?php echo form_open_multipart('user/insertdata') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nama user</label>
                        <input name="nama_user" class="form-control" maxlength="4" placeholder="Nama user" value="<?= old('nama_user'); ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('nama_user'); ?></p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" class="form-control" maxlength="20" placeholder="Username" value="<?= old('username'); ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('username'); ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" class="form-control" placeholder="Password" value="<?= old('password'); ?>"></input>
                <p class="text-danger"><?= $validasi->getError('password'); ?></p>
            </div>
            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option value="1">Admin</option>
                            <option value="2">Staf</option>
                        </select>
                        <p class="text-danger"><?= $validasi->getError('jk'); ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" accept="imgae/*" name="foto_guru" id="preview_gambar" class="form-control">
                        <p class="text-danger"><?= $validasi->getError('foto_guru'); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group"> <br>
                        <label>Preview Foto</label><br>
                        <img src="" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                <a href="<?= base_url('user'); ?>" class="btn btn-success btn-flat">Kembali</a>
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