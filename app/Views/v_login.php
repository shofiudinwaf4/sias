<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="content">
        <!-- /.login-logo -->

        <div class="login-box">
        </div>
        <div class="card-header text-center">

            <a href="<?= base_url(''); ?>" class="h4"><b>SIAS</b>Sekolah</a>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-body">
                <div class="row">
                    <div href="<?= base_url(''); ?>" class="col-sm-12 ">
                        <div class="card-header text-center">
                            <img src="<?= base_url('Gambar/' . $sekolah['logo_sekolah']); ?>" width="180px" height="180px">
                            <h3><?= $sekolah['nama_sekolah'] ?></h3>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <p class="login-box-msg">Silakan Login</p>
                        <?php session();
                        $validasi = \Config\Services::validation();
                        if (session()->get('pesan')) {
                            echo '<div Class="alert-danger">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        } ?>
                        <?php echo form_open('auth/ceklogin') ?>
                        <div class="form-group">
                            <label for="">Usernmae/NIP/NISN</label>
                            <input name="username" class="form-control" placeholder="Usernmae/NIP/NISN">
                            <p class="text-danger"><?= $validasi->getError('username'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" class="form-control">
                                <option value="">Level</option>
                                <option value="1">Admin</option>
                                <option value="2">Guru</option>
                                <option value="3">Wali Kelas</option>
                                <option value="4">Siswa</option>
                            </select>
                            <p class="text-danger"><?= $validasi->getError('level'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <p class="text-danger"><?= $validasi->getError('password'); ?></p>
                        </div>
                        <div class="form-group">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <a href="<?= base_url(''); ?>" class="btn btn-success btn-block btn-flat"><i class="fas fa-globe"></i> Web</a>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in"></i>Login</button>
                            </div>
                            <!-- /.col -->

                        </div>
                        <?= form_close() ?>


                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>