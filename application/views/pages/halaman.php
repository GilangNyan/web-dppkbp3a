<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-folder-open mr-1"></i>
                            Manajemen Halaman
                        </h3>
                        <div class="sisi ml-auto p-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPage">
                                Tambah Halaman
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            Halaman yang dibuat di sini akan menjadi sub menu pada menu yang dibuat di halaman Pengaturan Menu. Jika menu dihapus, maka halaman yang terkait juga akan ikut terhapus.
                        </div>
                        <table class="table table-bordered table-hover" id="allPages" width="100%">
                            <thead>
                                <tr>
                                    <th>Judul Halaman</th>
                                    <th style="width: 20%">Dibuat Pada</th>
                                    <th>Menu</th>
                                    <th style="width: 25%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($halaman as $page) : ?>
                                <tr>
                                    <td><?= $page->judul ?></td>
                                    <td><?= $page->tanggal ?></td>
                                    <td><?= $page->nama_menu ?></td>
                                    <td>
                                        <a href="<?= base_url('pages/') . $page->slug ?>" class="btn btn-sm text-success" target="_blank"><i class="fas fa-eye"></i> Lihat</a>
                                        <a href="<?= base_url('admin/halaman/getPage/') . $page->id_halaman ?>" class="btn-edithal btn btn-sm text-primary" data-toggle="modal" data-target="#modalPageUpdate" data-postid="<?= $page->id_halaman ?>" data-judulhal="<?= $page->judul ?>" data-isihal="<?= htmlspecialchars($page->isi) ?>" data-parent="<?= $page->parent ?>"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('admin/halaman/deletePage/') . $page->id_halaman ?>" class="btn-hapus btn btn-sm text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <th>Judul Halaman</th>
                                <th>Dibuat Pada</th>
                                <th>Menu</th>
                                <th>Opsi</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>