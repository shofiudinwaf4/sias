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
                    <th>Kelas</th>
                    <th width="100px">Aksi</th>
                </tr>
                <?php $no = 1;
                foreach ($kelas as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $value['kelas']; ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_kelas']; ?>"><i class="fas fa-pencil-alt"></i></button>
                                <a href="<?= base_url('kelas/deletedata/' . $value['id_kelas']); ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $subjudul; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('kelas/insertdata'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas" class="form-control" placeholder="Kelas" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($kelas as $key => $edit) { ?>
    <div class="modal fade" id="edit<?= $edit['id_kelas']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('kelas/updatedata/' . $edit['id_kelas']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kelas</label>
                        <input name="kelas" value="<?= $edit['kelas']; ?>" class="form-control" placeholder="Kelas" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>