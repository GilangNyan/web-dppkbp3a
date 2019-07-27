<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-stream mr-1"></i>
                            Pengaturan Menu
                        </h3>
                        <div class="sisi ml-auto p-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMenu">
                                Tambah Menu
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover menu">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menu as $menus) : ?>
                                    <tr data-index="<?= $menus->id_menu ?>" data-position="<?= $menus->posisi ?>">
                                        <td><?= $menus->nama_menu ?></td>
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