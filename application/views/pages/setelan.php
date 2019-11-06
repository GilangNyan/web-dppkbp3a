<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-user mr-1"></i>
                            Data Pribadi
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/user/setelan/') . $user->id ?>" method="post" name="setelanuser" id="setelanuser">
                            <input type="hidden" name="formname" value="setelanuser">
                            <div class="form-group">
                                <label for="namalengkap">Nama Lengkap</label>
                                <input type="text" name="namalengkap" id="namalengkap" class="form-control" placeholder="Masukkan Nama Lengkap" aria-describedby="namalengkap" value="<?= $user->nama ?>">
                                <?= form_error('namalengkap', '<small id="namalengkap" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Tambahkan Username" aria-describedby="username" value="<?= $user->username ?>" readonly>
                                <?= form_error('username', '<small id="username" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" aria-describedby="email" value="<?= $user->email ?>">
                                <?= form_error('email', '<small id="email" class="text-danger">', '</small>') ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="setelanuser">Simpan</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin') ?>">Kembali</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-unlock-alt mr-1"></i>
                            Ubah Password
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/user/setelan/') . $user->id ?>" method="post" name="setelanpassword" id="setelanpassword">
                            <input type="hidden" name="formname" value="setelanpassword">
                            <div class="form-group">
                                <label for="oldpassword">Password Lama</label>
                                <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="Masukkan Password Lama" aria-describedby="oldpassword">
                                <?= form_error('oldpassword', '<small id="oldpassword" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="newpassword">Password Baru</label>
                                <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Masukkan Password Baru" aria-describedby="newpassword">
                                <?= form_error('newpassword', '<small id="newpassword" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="retypepassword">Ketikkan Ulang Password</label>
                                <input type="password" name="retypepassword" id="retypepassword" class="form-control" placeholder="Masukkan Password Lama" aria-describedby="retypepassword">
                                <?= form_error('retypepassword', '<small id="retypepassword" class="text-danger">', '</small>') ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="setelanpassword">Simpan</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin') ?>">Kembali</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="far fa-images mr-1"></i>
                            Ganti Foto Profil
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <h6 class="text-bold">Foto Saat Ini</h6>
                                <img class="img-fluid" src="<?= base_url('assets/dist/img/') . $user->image ?>" alt="Foto Saat Ini">
                            </div>
                            <div class="col-10">
                                <form action="<?= base_url('admin/user/editFoto/') . $user->id ?>" method="post" name="setelanfoto" id="setelanfoto" enctype="multipart/form-data">
                                    <input type="hidden" name="formname" value="setelanfoto">
                                    <!-- <div class="form-group">
                                        <label for="fotoprofil">Upload Foto Baru</label>
                                        <input type="file" name="fotoprofil" id="fotoprofil" class="form-control" placeholder="Upload foto profil baru" accept="image/*" aria-describedby="fotoprofil">
                                        <small id="fotoprofil" class="text-muted">Ukuran file maksimal 2mb.</small>
                                    </div> -->
                                    <h6 class="font-weight-bold">Upload Foto baru</h6>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fotoprofil" name="fotoprofil" accept="image/*" aria-describedby="fotoprofil">
                                        <label class="custom-file-label" for="fotoprofil">Upload foto dengan ukuran maksimal 5MB.</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="setelanfoto">Simpan</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>