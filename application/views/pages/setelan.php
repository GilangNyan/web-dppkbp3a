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
                        <form action="<?= base_url('admin/user/edit/') . $user->id ?>" id="setelanuser">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" aria-describedby="nama" value="<?= $user->nama ?>">
                                <?= form_error('nama', '<small id="nama" class="text-danger">', '</small>') ?>
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
            </div>
        </div>
    </section>
</div>