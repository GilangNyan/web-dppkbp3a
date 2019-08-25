<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-comment mr-1"></i>
                            Manajemen Komentar
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="tblkomentar">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Komentar</th>
                                    <th>Artikel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($komentar as $comment) : ?>
                                <tr>
                                    <td><?= $comment->display_name ?></td>
                                    <td><?= $comment->email ?></td>
                                    <td><?= $comment->komentar ?></td>
                                    <td><?= $comment->judul ?></td>
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