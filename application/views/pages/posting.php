<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-file-alt mr-1"></i>
                            Post
                        </h3>
                        <div class="sisi ml-auto p-2">
                            <a href="<?= base_url('admin/post/addpost') ?>" class="btn btn-primary">
                                Tambah Post
                            </a>
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
                                            <?php
                                                $time = strtotime($post->tanggal);
                                                $year = date('Y', $time);
                                                $month = date('m', $time);
                                                ?>
                                            <a href="<?= base_url() . $year . '/' . $month . '/' . $post->slug ?>" class="btn btn-sm text-success" target="_blank"><i class="fas fa-eye"></i> Lihat</a>
                                            <?php if ($this->session->userdata('role') == 'GOD' || $this->session->userdata('role') == 'ADMIN' || $post->username == $this->session->userdata('username')) : ?>
                                                <a href="<?= base_url('admin/post/editPost/') . $post->id ?>" class="btn-edit btn btn-sm text-primary"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('admin/post/deletePost/') . $post->id ?>" class="btn-hapus btn btn-sm text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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