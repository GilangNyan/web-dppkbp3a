<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <form action="<?= base_url('admin/post/updatePost/') . $posting->id ?>" method="post" name="formedit" id="formedit" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul" placeholder="" value="<?= $posting->judul ?>">
                                <?= form_error('judul', '<small id="judul" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="isi2">Isi Tulisan</label>
                                <textarea class="form-control" name="isi2" id="isi2" row="10"><?= $posting->isi ?></textarea>
                                <?= form_error('isi2', '<small id="isi2" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar Cover</label>
                                <input type="file" class="form-control-file" name="gambar" id="gambar" placeholder="" accept="image/*" aria-describedby="image">
                                <small id="image" class="form-text text-muted">Jika tidak mengupload gambar, maka gambar sebelumnya akan digunakan.</small>
                                <input type="hidden" name="gambarlama" id="gambarlama" value="<?= $posting->image ?>">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="0" <?= $posting->status == 0 ? 'selected' : ''; ?>>Konsep </option>
                                    <option value="1" <?= $posting->status == 1 ? 'selected' : ''; ?>>Terbitkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="formedit">Simpan</button>
                        <a class="btn btn-secondary" href="<?= base_url('admin/post') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
