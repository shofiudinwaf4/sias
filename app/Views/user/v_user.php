<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('user/input'); ?>" class="btn btn-primary btn-flat btn-sm ">
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
                        <th>Kode Guru</th>
                        <th>NIK</th>
                        <th>Nama Guru</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Foto Guru</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>

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