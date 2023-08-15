<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

            <div class="card-tools">
                <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#add">
                    <i class=" fas fa-plus"></i>Tambah Data
                </button>
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
            <table class="table table-bordered table-sm">
                <tr class="text-center bg-primary">
                    <th width="50px">No</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th width="100px">Aksi</th>
                </tr>
                <?php $no = 1;
                foreach ($ta as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $value['ta1'] . '/' . $value['ta2']; ?></td>
                        <td><?= $value['semester']; ?></td>
                        <td>

                            <?php if ($value['status'] == '1') {
                                echo '<span class="badge bg-success">Aktif</span>';
                            } elseif ($value['status'] == '0') {
                                echo '<span class="badge bg-primary">Tidak Aktif</span>';
                            } ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_ta']; ?>"><i class="fas fa-pencil-alt"></i></button>
                                <a href="<?= base_url('kelas/deletedata/' . $value['id_ta']); ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>