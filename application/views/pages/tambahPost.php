<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-user-plus mr-1"></i>
                            Tambahkan Detail Post
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/post/addPost') ?>" method="post" name="formtambah" id="formtambah" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul Post</label>
                                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul" placeholder="" value="<?= set_value('judul') ?>">
                                <?= form_error('judul', '<small id="judul" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi Post</label>
                                <textarea class="form-control" name="isi" id="isi" row="10" value="<?= set_value('isi') ?>"></textarea>
                                <?= form_error('isi', '<small id="isi" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar Cover</label>
                                <input type="file" class="form-control-file" name="gambar" id="gambar" placeholder="" aria-describedby="image" accept="image/*">
                                <small id="image" class="form-text text-muted">Tambahkan gambar untuk tampilan cover artikel. Ukuran file maksimal 4mb.</small>
                            </div>
                            <div class="form-group">
                                <label for="status">Terbitkan atau Simpan</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="0">Simpan Saja</option>
                                    <option value="1">Langsung Terbitkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="formtambah">Tambah</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin/post') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>