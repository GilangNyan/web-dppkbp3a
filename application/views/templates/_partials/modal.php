<!-- Modal -->
<!-- Modal Create Halaman -->
<div class="modal fade" id="modalPage" tabindex="-1" role="dialog" aria-labelledby="modalPage" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Halaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/halaman/addPages') ?>" method="post" name="formpages" id="formpages" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="parent">Sub Halaman dari</label>
                        <select class="form-control" name="parent" id="parent">
                            <option value="">Pilih :</option>
                            <?php foreach ($parent_pages->result() as $row) : ?>
                                <option value="<?= $row->id_halaman ?>"><?= $row->judul ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Judul Halaman</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="">
                        <small id="judul" class="form-text text-muted">Tambahkan judul halaman</small>
                    </div>
                    <div class="form-group">
                        <label for="konten">Isi Halaman</label>
                        <textarea class="form-control" name="konten" id="konten" row="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary" form="formpages">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Halaman -->
<div class="modal fade" id="modalPageUpdate" tabindex="-1" role="dialog" aria-labelledby="modalPageUpdate" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Halaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/halaman/editPage') ?>" method="post" name="formpagesedit" id="formpagesedit" enctype="multipart/form-data">
                    <input type="hidden" name="idhal" id="idhal">
                    <div class="form-group">
                        <label for="parentedit">Pilih Menu</label>
                        <select class="form-control" name="parentedit" id="parentedit">
                            <?php foreach ($menu as $menus) : ?>
                                <option value="<?= $menus->id_menu ?>"><?= $menus->nama_menu ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="titleedit">Judul Halaman</label>
                        <input type="text" class="form-control" name="titleedit" id="titleedit" aria-describedby="titleedit" placeholder="">
                        <small id="judul" class="form-text text-muted">Tambahkan judul halaman</small>
                    </div>
                    <div class="form-group">
                        <label for="kontenedit">Isi Halaman</label>
                        <textarea class="form-control" name="kontenedit" id="kontenedit" row="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary" form="formpagesedit">Simpan</button>
            </div>
        </div>
    </div>
</div>