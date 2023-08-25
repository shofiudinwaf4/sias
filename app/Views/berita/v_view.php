<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('berita/input'); ?>" class="btn btn-primary btn-flat btn-sm ">
                    <i class=" fas fa-plus"></i>Tambah Data
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3><?= $berita['judul_berita']; ?></h3>
            <p class="bg-primary color-palette col-sm-1 text-center"><?= $berita['nama_kategori']; ?></p>
            <img src="<?= base_url('gambar/' . $berita['gambar']); ?>" width="50%" alt="" srcset="">
            <p><?= $berita['isi_berita']; ?></p>
        </div>

        <div class="card-footer">
            <a href="<?= base_url('berita'); ?>" class="btn btn-success btn-flat">Kembali</a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>