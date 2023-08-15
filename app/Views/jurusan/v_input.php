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
        <?php echo form_open('jurusan/insertdata') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kode Jurusan</label>
                        <input name="kode_jurusan" class="form-control"> </input>
                        <p class="text-danger"><?= $validasi->getError('kode_jurusan'); ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input name="jurusan" class="form-control"> </input>
                        <p class="text-danger"><?= $validasi->getError('jurusan'); ?></p>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label>Visi Misi</label>
                <textarea name="visi_misi" id="summernote"> </textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <a href="<?= base_url('jurusan'); ?>" class="btn btn-success btn-flat">Kembali</a>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->
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