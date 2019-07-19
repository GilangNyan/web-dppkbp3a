<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="card-title">Post</h3>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalPost">
                                    Tambah Post
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="allPost" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 35%">Judul Post</th>
                                    <th style="width: 25%">Author</th>
                                    <th style="width: 15%">Dibuat Pada</th>
                                    <th style="width: 25%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posting as $post) : ?>
                                    <tr>
                                        <td><?= $post->judul ?></td>
                                        <td><?= $post->nama ?></td>
                                        <td><?= $post->tanggal ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm text-success" data-postid="<?= $post->id ?>"><i class="fas fa-eye"></i> Lihat</button>
                                            <?php if ($post->role == 'ADMIN' || $post->username == $this->session->userdata('username')) : ?>
                                                <a href="<?= base_url('admin/post/getSpecificPost/') . $post->id ?>" class="btn-edit btn btn-sm text-primary" data-toggle="modal" data-target="#modalEditPost" data-postid="<?= $post->id ?>"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('admin/post/deletePost/') . $post->id ?>" class="btn-hapus btn btn-sm text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            <?php endif ?>
                                        </td>
                                        <input type="hidden" name="val-judul" class="val-judul" value="<?= $post->judul ?>">
                                        <input type="hidden" name="val-isi" class="val-isi" value="<?= htmlspecialchars($post->isi) ?>">
                                        <input type="hidden" name="val-gambar" class="val-gambar" value="<?= $post->image ?>">
                                        <input type="hidden" name="val-status" class="val-status" value="<?= $post->status ?>">
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <th>Judul Post</th>
                                <th>Author</th>
                                <th>Dibuat Pada</th>
                                <th>Opsi</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>