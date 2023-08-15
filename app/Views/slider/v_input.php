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
        <?php echo form_open_multipart('slider/insertdata') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label>Judul Slider</label>
                <input name="judul_slider" class="form-control" placeholder="Judul Slider" value="<?= old('judul_slider'); ?>"> </input>
                <p class="text-danger">
                    <?= $validasi->getError('judul_slider'); ?></p>
            </div>
            <div class="form-group">
                <label>Dskripsi Slider</label>
                <textarea name="deskripsi_slider" id="summernote" class="form-control" width="1000px" value="<?= old('deskripsi_slider'); ?>"><?= old('deskripsi_slider'); ?></textarea>
                <p class="text-danger"><?= $validasi->getError('deskripsi_slider'); ?></p>
            </div>
            <div class="form-group">
                <label>Gambar Slider</label>
                <input type="file" accept="imgae/*" name="gambar_slider" id="preview_gambar" class="form-control">
                <p class="text-danger"><?= $validasi->getError('gambar_slider'); ?></p>
            </div>
            <div class="form-group"> <br>
                <label>Preview Gambar</label><br>
                <img src="" id="gambar_load" width="500px">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <a href="<?= base_url('slider'); ?>" class="btn btn-success btn-flat">Kembali</a>
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
<!-- js summernote -->
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote({
            height: 200,
        })

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>