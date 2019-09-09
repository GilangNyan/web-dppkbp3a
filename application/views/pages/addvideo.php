<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-image mr-1"></i>
                            Tambahkan Detail Video
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/videos/add/') ?>" method="post" name="uploadvideo" id="uploadvideo" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul Video</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul video" aria-describedby="judul" value="<?= set_value('judul') ?>" required>
                                <?= form_error('judul', '<small id="judul" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required><?= set_value('deskripsi') ?></textarea>
                                <?= form_error('deskripsi', '<small id="deskripsi" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="upload" id="upload" class="custom-file-input" placeholder="Tambahkan Foto maks. 2mb" accept="video/*" aria-describedby="upload" required>
                                <label class="custom-file-label" for="upload">Pilih video maks. 2gb</label>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="uploadvideo">Tambah</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin/videos') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>