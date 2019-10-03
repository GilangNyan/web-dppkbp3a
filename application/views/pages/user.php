<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <!-- <h3 class="card-title p-3">
                            <i class="fas fa-users mr-1"></i>
                            List User
                        </h3> -->
                        <div class="sisi mr-auto p-2">
                            <a href="<?= base_url('admin/user/add') ?>" class="btn btn-primary">
                                Buat User
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered" id="allUser">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Dibuat Pada</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listuser as $row) : ?>
                                <tr>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->role ?></td>
                                    <td><?= $row->dibuat_pada ?></td>
                                    <td>
                                        <!-- <a href="<?= base_url() ?>" class="btn btn-sm text-success"><i class="fas fa-eye"></i> Lihat</a> -->
                                        <a href="<?= base_url('admin/user/edit/') . $row->id ?>" class="btn btn-sm text-primary"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('admin/user/delete/') . $row->id ?>" class="btn-hapususer btn btn-sm text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
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
