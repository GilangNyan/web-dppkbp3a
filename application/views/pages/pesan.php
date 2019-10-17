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
                                    <th style="width: 55%;">Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesan as $row) : ?>
                                    <tr class="<?= $row->dibaca == 0 ? '' : 'table-secondary' ?>">
                                        <td style="transform: rotate(0);"><a href="<?= base_url('admin/pesan/detail/') . $row->id ?>" class="stretched-link"></a><?= $row->email ?></td>
                                        <td style="transform: rotate(0);">
                                            <p class="crop-text"><?= $row->isi ?><a href="<?= base_url('admin/pesan/detail/') . $row->id ?>" class="stretched-link"></p>
                                        </td>
                                        <td style="transform: rotate(0);"><?= date('d-m-Y H:i', strtotime($row->tanggal)) ?><a href="<?= base_url('admin/pesan/detail/') . $row->id ?>" class="stretched-link"></td>
                                        <td><a href="<?= base_url('admin/pesan/delete/') . $row->id ?>" class="btn btn-sm text-danger btn-hapuspesan"><i class="fas fa-trash-alt"></i></a></td>
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