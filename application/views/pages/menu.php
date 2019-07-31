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
                        <div class="alert alert-primary" role="alert">
                            Bagian menu ini digunakan untuk membuat menu yang berfungsi menampung submenu halaman dan tidak akan mempunyai link. Jadi disarankan jangan terlalu banyak membuat menu jika tidak terlalu dibutuhkan.
                        </div>
                        <table class="table table-bordered table-hover menu">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menu as $menus) : ?>
                                    <tr data-index="<?= $menus->id_menu ?>" data-position="<?= $menus->posisi ?>">
                                        <td><?= $menus->nama_menu ?></td>
                                        <td style="width: 30%">
                                            <a href="<?= base_url('admin/halaman/getMenu/') . $menus->id_menu ?>" class="btn-edit btn btn-sm text-primary" data-toggle="modal" data-target="#modalEditPost"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('admin/halaman/deleteMenu/') . $menus->id_menu ?>" class="btn-hapus btn btn-sm text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
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