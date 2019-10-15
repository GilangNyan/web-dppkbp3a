<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="tblkomentar">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Komentar</th>
                                    <th>Tulisan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($komentar as $comment) : ?>
                                    <tr>
                                        <td><?= $comment->display_name ?></td>
                                        <td><?= $comment->email ?></td>
                                        <td><?= $comment->komentar ?></td>
                                        <td><?= $comment->judul ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/komentar/delete/') . $comment->id ?>" class="btn-hapuskomentar btn btn-sm text-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>