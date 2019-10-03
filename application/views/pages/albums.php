<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <!-- <h3 class="card-title p-3">
                            <i class="fas fa-image mr-1"></i>
                            List Album
                        </h3> -->
                        <div class="sisi mr-auto p-2">
                            <a href="<?= base_url('admin/albums/add') ?>" class="btn btn-primary">
                                Buat Album
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered" id="allAlbums">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $row) : ?>
                                    <tr>
                                        <td><?= $row->album_title ?></td>
                                        <td><?= $row->album_description ?></td>
                                        <td><?= $row->created_at ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/albums/view/') . $row->id ?>" class="btn btn-sm text-success"><i class="fas fa-eye"></i> Lihat</a>
                                            <a href="<?= site_url('admin/albums/edit/') . $row->id ?>" class="btn btn-sm text-primary"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= site_url('admin/albums/delete/') . $row->id ?>" class="btn-hapusalbum btn btn-sm text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
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
