<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('slider/input'); ?>" class="btn btn-primary btn-flat btn-sm ">
                    <i class=" fas fa-plus"></i>Tambah Data
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->get('insert')) {
                echo '<div Class="alert-success">';
                echo session()->getFlashdata('insert');
                echo '</div>';
            }
            if (session()->get('update')) {
                echo '<div Class="alert-primary">';
                echo session()->getFlashdata('update');
                echo '</div>';
            }
            if (session()->get('delete')) {
                echo '<div Class="alert-danger">';
                echo session()->getFlashdata('delete');
                echo '</div>';
            } ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center bg-primary">
                        <th width="50px">No</th>
                        <th>Judul Slider</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($slider as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value['judul_slider']; ?></td>
                            <td class="text-center"><?= $value['deskripsi_slider']; ?></td>
                            <td><img src="<?= base_url('gambar/' . $value['gambar_slider']); ?>" width="120px" height="100px"></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('slider/editdata/' . $value['id_slider']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('slider/deletedata/' . $value['id_slider']); ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "paging": true,
            "responsive": true,
            "searching": true,
            "lengthChange": true,
            "autoWidth": false,
            "lengthChange": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>