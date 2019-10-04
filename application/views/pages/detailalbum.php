<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-image mr-1"></i>
                            Tambah Foto
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/albums/view/') . $album->id ?>" method="post" name="uploadfoto" id="uploadfoto" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul Foto</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul foto" aria-describedby="judul" value="<?= set_value('judul') ?>" required>
                                <?= form_error('judul', '<small id="judul" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="upload" id="upload" class="custom-file-input" placeholder="Tambahkan Foto maks. 2mb" accept="image/*" aria-describedby="upload">
                                <label class="custom-file-label" for="upload">Pilih foto maks. 2mb</label>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="uploadfoto">Tambah</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-image mr-1"></i>
                            <?= $album->album_title ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="card-columns">
                            <?php foreach ($foto as $row) : ?>
                                <div class="card" style="position: relative !important;">
                                    <a href="<?= base_url('assets/img/album/') . $row->photo_name ?>" data-lightbox="galerifoto">
                                        <img src="<?= base_url('assets/img/album/thumbs/') . $row->photo_name ?>" class="card-img" alt="<?= $row->photo_name ?>">
                                    </a>
                                    <div class="div-hapus">
                                        <a class="btn-hapusfoto btn btn-danger" href="<?= base_url('admin/albums/deletePhoto/') . $row->id ?>"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>