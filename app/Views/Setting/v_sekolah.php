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
        <?php echo form_open_multipart('setting/updatesekolah') ?>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->get('pesan')) {
                echo '<div Class="alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <div class="form-group">
                <label>Nama Sekolah</label>
                <input name="nama_sekolah" class="form-control" value="<?= $sekolah['nama_sekolah'] ?>"> </input>
                <p class="text-danger">
                    <?= $validasi->getError('nama_Sekolah'); ?></p>
            </div>
            <div class="form-group">
                <label>Alamat Sekolah</label>
                <input name="alamat_sekolah" class="form-control" placeholder="Alamat Sekolah" value="<?= $sekolah['alamat_sekolah'] ?>"> </input>
                <p class="text-danger">
                    <?= $validasi->getError('alamat_sekolah'); ?></p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input name="email" class="form-control" placeholder="E-Mail" value="<?= $sekolah['email'] ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('email'); ?></p>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Telpon</label>
                        <input name="no_telp" class="form-control" placeholder="Telpn" value="<?= $sekolah['no_telp'] ?>"> </input>
                        <p class="text-danger">
                            <?= $validasi->getError('no_telp'); ?></p>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Visi Misi Sekolah</label>
                <textarea name="visimisi_sekolah" id="summernote" class="form-control" width="1000px"><?= $sekolah['visimisi_sekolah'] ?></textarea>
                <p class="text-danger"><?= $validasi->getError('visimisi_sekolah'); ?></p>
            </div>
            <div class="form-group">
                <label>Sejarah Sekolah</label>
                <textarea name="sejarah_sekolah" id="summernote1" class="form-control" width="1000px"><?= $sekolah['sejarah_sekolah'] ?></textarea>
                <p class="text-danger"><?= $validasi->getError('sejarah_sekolah'); ?></p>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            <a href="<?= base_url('setting/sekolah'); ?>" class="btn btn-success btn-flat">Kembali</a>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<!-- /.col-->

<!-- js summernote -->
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote({
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