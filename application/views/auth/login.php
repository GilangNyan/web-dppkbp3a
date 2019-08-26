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
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="<?= base_url('admin/auth') ?>" method="post">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>" required minlength="3" maxlength="12">
                  <div class="input-group-append input-group-text">
                     <span class="fas fa-user"></span>
                  </div>
               </div>
               <?= form_error('username', '<small class="text-danger">', '</small>') ?>
               <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" required minlength="6">
                  <div class="input-group-append input-group-text">
                     <span class="fas fa-lock"></span>
                  </div>
               </div>
               <?= form_error('password', '<small class="text-danger">', '</small>') ?>
               <div class="row">
                  <div class="col-8 justify-content-center">
                     <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                           Remember Me
                        </label>
                     </div>
                  </div>
                  <!-- /.col -->
                  <!-- /.col -->
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
               </div>
            </form>
            <p class="mb-1 mt-1 text-center">
               <a href="#">I forgot my password</a>
            </p>
         </div>
         <!-- /.login-card-body -->
      </div>
   </div>
   <!-- /.login-box -->

   <?php $this->load->view('templates/_partials/javascript') ?>
</body>

</html>
