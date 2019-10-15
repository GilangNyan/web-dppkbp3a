<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <div class="sisi mr-auto p-2">
                            <a href="<?= base_url('admin/videos/add') ?>" class="btn btn-primary">
                                Tambah Video
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="allPost" width="100%">
                            <thead>
                                <tr>
                                    <th>Judul Video</th>
                                    <th>Deskripsi</th>
                                    <th>Diupload</th>
                                    <th style="width: 25%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($video as $row) : ?>
                                    <tr>
                                        <td><?= $row->judul ?></td>
                                        <td><?= $row->deskripsi ?></td>
                                        <td><?= $row->diupload ?></td>
                                        <td>
                                            <a href="<?= base_url('assets/videos/') . $row->filename ?>" class="btn btn-sm text-success" data-lity><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url('admin/videos/update/') . $row->id ?>" class="btn btn-sm text-primary"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('admin/videos/delete/') . $row->id ?>" class="btn-hapus btn btn-sm text-danger"><i class="fas fa-trash-alt"></i></a>
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
