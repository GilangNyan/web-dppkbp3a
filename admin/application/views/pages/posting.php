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
                        <table class="table table-bordered table-striped table-hover" id="allPost">
                            <thead>
                                <tr>
                                    <th>Judul Post</th>
                                    <th>Author</th>
                                    <th>Dibuat Pada</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posting as $post) : ?>
                                    <tr>
                                        <td><?= $post->judul ?></td>
                                        <td><?= $post->author ?></td>
                                        <td><?= $post->tanggal ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-rounded"><i class="fas fa-pen"></i></button>
                                            <button type="button" class="btn btn-primary btn-rounded"><i class="fas fa-trash-alt"></i></button>
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