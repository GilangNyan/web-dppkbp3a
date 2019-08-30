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
                <p class="login-box-msg">Masukkan email akun anda</p>
                <form action="<?= base_url('admin/auth/forget') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                    </div>
                </form>
                <p class="mb-1 mt-1 text-center">
                    <a href="<?= base_url('login') ?>">Kembali ke halaman login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php $this->load->view('templates/_partials/javascript') ?>
</body>

</html>