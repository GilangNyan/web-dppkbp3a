<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-user-plus mr-1"></i>
                            Tambah Data Pengguna
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/user/add') ?>" method="post" name="formadduser" id="formadduser">
                            <div class="form-group">
                                <label for="namalengkap">Nama Lengkap</label>
                                <input type="text" name="namalengkap" id="namalengkap" class="form-control" placeholder="Masukkan Nama Lengkap" aria-describedby="namalengkap" value="<?= set_value('namalengkap') ?>" required>
                                <?= form_error('namalengkap', '<small id="namalengkap" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Tambahkan Username" aria-describedby="username" value="<?= set_value('username') ?>" required>
                                <?= form_error('username', '<small id="username" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" aria-describedby="email" value="<?= set_value('email') ?>">
                                <small id="email" class="text-muted">Email boleh dikosongkan.</small>
                                <?= form_error('email', '<small id="email" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" aria-describedby="password" required>
                                <?= form_error('password', '<small id="password" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="passconf">Password</label>
                                <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Masukkan Lagi Password" aria-describedby="passconf" required>
                                <?= form_error('passconf', '<small id="password" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="USER" <?= set_value('role') == 'USER' ? 'selected' : ''; ?>>User</option>
                                    <option value="ADMIN" <?= set_value('role') == 'ADMIN' ? 'selected' : ''; ?>>Admin</option>
                                </select>
                                <?= form_error('role', '<small id="role" class="text-danger">', '</small>') ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="formadduser">Tambah</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin/user') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>