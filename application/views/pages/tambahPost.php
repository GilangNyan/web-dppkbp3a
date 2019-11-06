<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/post/addPost') ?>" method="post" name="formtambah" id="formtambah" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul" placeholder="" value="<?= set_value('judul') ?>">
                                <?= form_error('judul', '<small id="judul" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi Tulisan</label>
                                <textarea class="form-control" name="isi" id="isi" row="10" value="<?= set_value('isi') ?>"></textarea>
                                <?= form_error('isi', '<small id="isi" class="text-danger">', '</small>') ?>
                            </div>
                            <h6 class="font-weight-bold">Upload Gambar Cover</h6>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" aria-describedby="image">
                                <label class="custom-file-label" for="gambar">Upload cover tulisan. Ukuran file maksimal 5MB.</label>
                            </div>
                            <!-- <div class="form-group">
                                <label for="image">Gambar Cover</label>
                                <input type="file" class="form-control-file" name="gambar" id="gambar" placeholder="" aria-describedby="image" accept="image/*">
                                <small id="image" class="form-text text-muted">Tambahkan gambar untuk tampilan cover tulisan. Ukuran file maksimal 4mb.</small>
                            </div> -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="0">Konsep</option>
                                    <option value="1">Terbitkan</option>
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