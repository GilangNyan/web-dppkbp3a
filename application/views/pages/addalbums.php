<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-folder-plus"></i>
                            Tambah Album Foto
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/albums/add') ?>" method="post" name="formaddalbums" id="formaddalbums">
                            <div class="form-group">
                                <label for="album_title">Judul Album</label>
                                <input type="text" name="album_title" id="album_title" class="form-control" placeholder="Masukkan Judul Album" aria-describedby="Judul Album" value="<?= set_value('album_title') ?>" required>
                                <?= form_error('album_title', '<small id="album_title" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="album_description">Keterangan</label>
                                <input type="text" name="album_description" id="album_description" class="form-control" placeholder="Tambahkan Keterangan" value="<?= set_value('album_description') ?>" required>
                                <?= form_error('album_description', '<small id="album_description" class="text-danger">', '</small>') ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="formaddalbums">Tambah</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin/albums') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
