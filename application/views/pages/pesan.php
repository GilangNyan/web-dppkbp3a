<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-envelope-open-text mr-1"></i>
                            Semua Pesan
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="semuaPesan" width="100%">
                            <thead>
                                <tr>
                                    <th>Pengirim</th>
                                    <th>Pesan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesan as $row) : ?>
                                    <tr>
                                        <td><?= $row->email ?></td>
                                        <td><?= $row->isi ?></td>
                                        <td><a href="<?= base_url('admin/pesan/delete/') . $row->id ?>" class="btn btn-sm text-danger"><i class="fas fa-trash-alt"></i> Hapus</a></td>
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