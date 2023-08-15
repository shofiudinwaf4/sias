<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('siswa/input'); ?>" class="btn btn-primary btn-flat btn-sm ">
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
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tempat, Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Angkatan</th>
                        <th>Kelas</th>
                        <th>Foto</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center">
                                <?= $value['nisn']; ?><br>
                                <?php if ($value['status'] == '1') {
                                    echo '<span class="badge bg-success">Aktif</span>';
                                } elseif ($value['status'] == '2') {
                                    echo '<span class="badge bg-primary">Alumni</span>';
                                } elseif ($value['status'] == '3') {
                                    echo '<span class="badge bg-warning">Pindah</span>';
                                } elseif ($value['status'] == '4') {
                                    echo '<span class="badge bg-danger">Drop Out</span>';
                                } ?>
                            </td>
                            <td><?= $value['nama_siswa']; ?></td>
                            <td class="text-center"><?= $value['tempat_lahir'] . '-' . $value['tgl_lahir']; ?></td>
                            <td class="text-center"><?= $value['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                            <td class="text-center"><?= $value['angkatan'] ?></td>
                            <td class="text-center"><?= $value['kelas'] ?></td>
                            <td class="text-center"><img class="img-size-50 img-circle mr-3" src="<?= base_url('fotosiswa/' . $value['foto']); ?>"></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('siswa/editdata/' . $value['id_siswa']); ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('siswa/deletedata/' . $value['id_siswa']); ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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