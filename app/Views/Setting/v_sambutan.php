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
        <?php echo form_open_multipart('setting/updatesambutan') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->get('pesan')) {
                echo '<div Class="alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <div class="form-group">
                <label>Nama Kepala Sekolah</label>
                <input name="kepsek" class="form-control" value="<?= $sambutan['kepsek'] ?>"> </input>
                <p class="text-danger">
                    <?= $validasi->getError('kepsek'); ?></p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>Foto Kepala Sekolah</label><br>
                    <img src="<?= base_url('fotoguru/' . $sambutan['foto_kepsek']); ?>" width="200px">
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" accept="imgae/*" name="foto_kepsek" class="form-control">
                        <p class="text-danger"><?= $validasi->getError('foto_kepsek'); ?></p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Sambutan</label>
                        <textarea name="sambutan" id="summernote1" class="form-control" width="1000px"><?= $sambutan['sambutan'] ?></textarea>
                        <p class="text-danger"><?= $validasi->getError('sambutan'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->

<!-- js summernote -->
<script>
    $(function() {
        // Summernote
        $('#summernote1').summernote({
            height: 200,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        })

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>