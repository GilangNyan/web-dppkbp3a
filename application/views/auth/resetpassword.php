<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('templates/_partials/head') ?>
</head>

<body class="hold-transition login-page">
    <div class="msg" id="msg" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="login-box">
        <div class="login-logo">
            <img width="100px" class="image mb-4" src="<?= base_url('assets/img/kotatasikmalaya.png') ?>" alt="">
            <h2>DINAS PPKBP3A</h2>
            <h3>KOTA TASIKMALAYA</h3>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan password baru anda</p>
                <form action="<?= base_url('admin/auth/reset/') . $token ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password Baru" name="password" value="<?= set_value('password') ?>" required>
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Ketik Ulang Password" name="passconf" value="<?= set_value('passconf') ?>" required>
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <?= form_error('passconf', '<small class="text-danger">', '</small>') ?>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php $this->load->view('templates/_partials/javascript') ?>
</body>

</html>