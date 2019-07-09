<!-- Modal -->
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
                <form action="<?= base_url('post/savePost') ?>" method="post" name="formtambah" id="formtambah">
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
                        <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="image">
                        <small id="image" class="form-text text-muted">Tambahkan gambar untuk tampilan cover artikel</small>
                    </div>
                    <div class="form-group">
                        <label for="status">Terbitkan atau Simpan</label>
                        <select class="form-control" name="status" id="status">
                            <option>Simpan Saja</option>
                            <option>Langsung Terbitkan</option>
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