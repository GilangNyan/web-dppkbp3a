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
                                    <th style="width: 40%">Judul Post</th>
                                    <th style="width: 25%">Author</th>
                                    <th style="width: 15%">Dibuat Pada</th>
                                    <th style="width: 20%">Opsi</th>
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
                                                <button type="button" class="btn btn-sm text-primary" data-postid="<?= $post->id ?>"><i class="fas fa-edit"></i> Edit</button>
                                                <button type="button" class="btn btn-sm text-danger" data-postid="<?= $post->id ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                            <?php endif ?>
                                        </td>
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