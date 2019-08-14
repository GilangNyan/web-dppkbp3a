<!-- Modal -->
<!-- Modal Create -->
<div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="modalPost" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/post/savePost') ?>" method="post" name="formtambah" id="formtambah" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Judul Post</label>
                        <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul" placeholder="">
                        <small id="judul" class="form-text text-muted">Tambahkan judul artikel</small>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Post</label>
                        <textarea class="form-control" name="isi" id="isi" row="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar Cover</label>
                        <input type="file" class="form-control-file" name="gambar" id="gambar" placeholder="" aria-describedby="image">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary" form="formtambah">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="modalEditPost" tabindex="-1" role="dialog" aria-labelledby="modalEditPost" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/post/updatePost') ?>" method="post" name="formedit" id="formedit" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="judul">Judul Post</label>
                        <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul" placeholder="">
                        <small id="judul" class="form-text text-muted">Tambahkan judul artikel</small>
                    </div>
                    <div class="form-group">
                        <label for="isi2">Isi Post</label>
                        <textarea class="form-control" name="isi2" id="isi2" row="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar Cover</label>
                        <input type="file" class="form-control-file" name="gambar" id="gambar" placeholder="" aria-describedby="image">
                        <small id="image" class="form-text text-muted">Jika tidak mengupload gambar, maka gambar sebelumnya akan digunakan.</small>
                        <input type="hidden" name="gambarlama" id="gambarlama">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary" form="formedit">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Menu -->
<div class="modal fade" id="tambahMenu" tabindex="-1" role="dialog" aria-labelledby="tambahMenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/halaman/simpanMenu') ?>" method="post" name="modalmenu" id="modalmenu">
                    <div class="form-group">
                        <label for="nama">Nama Menu</label>
                        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaMenu" placeholder="Masukkan nama menu">
                        <small id="namaMenu" class="form-text text-muted">Tentukan nama menu yang akan ditambahkan.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="modalmenu">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Menu -->
<div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="editMenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/halaman/editMenu') ?>" method="post" name="editmenu" id="editmenu">
                    <input type="hidden" name="idmenu" id="idmenu">
                    <div class="form-group">
                        <label for="nama">Nama Menu</label>
                        <input type="text" class="form-control" name="namaedit" id="namaedit" aria-describedby="namaMenu" placeholder="Masukkan nama menu">
                        <small id="namaMenu" class="form-text text-muted">Ganti nama menu sebelumnya.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="editmenu">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create -->
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
                        <label for="title">Judul Halaman</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="">
                        <small id="judul" class="form-text text-muted">Tambahkan judul halaman</small>
                    </div>
                    <div class="form-group">
                        <label for="konten">Isi Halaman</label>
                        <textarea class="form-control" name="konten" id="konten" row="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="parent">Simpan di Menu</label>
                        <select class="form-control" name="parent" id="parent">
                            <?php foreach ($menu as $menus) : ?>
                            <option value="<?= $menus->id_menu ?>"><?= $menus->nama_menu ?></option>
                            <?php endforeach; ?>
                        </select>
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