<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-user-edit mr-1"></i>
                            Edit Data Pengguna
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/user/edit/') . $edituser->id ?>" method="post" name="formedituser" id="formedituser">
                            <div class="form-group">
                                <label for="namalengkap">Nama Lengkap</label>
                                <input type="text" name="namalengkap" id="namalengkap" class="form-control" placeholder="Masukkan Nama Lengkap" aria-describedby="namalengkap" value="<?= $edituser->nama ?>" required>
                                <?= form_error('namalengkap', '<small id="namalengkap" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Tambahkan Username" aria-describedby="username" value="<?= $edituser->username ?>" readonly>
                                <?= form_error('username', '<small id="username" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" aria-describedby="email" value="<?= $edituser->email ?>">
                                <small id="email" class="text-muted">Email boleh dikosongkan.</small>
                                <?= form_error('email', '<small id="email" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="USER" <?= $edituser->role == 'USER' ? 'selected' : ''; ?>>User</option>
                                    <option value="ADMIN" <?= $edituser->role == 'ADMIN' ? 'selected' : ''; ?>>Admin</option>
                                </select>
                                <?= form_error('role', '<small id="role" class="text-danger">', '</small>') ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="formedituser">Ubah</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin/user') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>