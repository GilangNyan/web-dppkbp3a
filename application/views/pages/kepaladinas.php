<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-user-tie mr-1"></i>
                            Kepala Dinas
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 alert alert-primary" role="alert">
                                Data Kepala Dinas akan otomatis diperbaharui ketika selesai mengetik dan fokus sudah berpindah dari form.
                            </div>
                            <div class="col-sm-12 col-md-2 text-center" id="divfoto">
                                <?php foreach ($fotokepala as $foto) : ?>
                                <img class="img-fluid mb-2" src="<?= base_url('assets/dist/img/') . $foto->foto ?>" alt="Foto Kepala Dinas">
                                <?php endforeach; ?>
                                <form method="post" action="" enctype="multipart/form-data" id="formfoto">
                                    <input type="file" name="foto" id="foto" hidden>
                                    <button type="button" id="btnfoto" class="btn btn-primary">Ganti Foto</button>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-10">
                                <form action="<?= base_url('admin/preferences/editKepala') ?>" method="post">
                                    <?php foreach ($kepala as $row) : ?>
                                    <div class="form-group">
                                        <label for="namakadis">Nama Kepala Dinas</label>
                                        <input type="text" class="form-control" name="namakadis" id="namakadis" aria-describedby="namakadis" value="<?= $row->nama ?>" placeholder="Masukkan Nama Kepala Dinas">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Nama Kepala Dinas</label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" aria-describedby="jabatan" value="<?= $row->jabatan ?>" placeholder="Masukkan Jabatan">
                                    </div>
                                    <?php endforeach; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-comment mr-1"></i>
                            Sambutan Kepala Dinas
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            Sambutan akan otomatis diperbaharui ketika selesai mengetik dan fokus sudah berpindah dari form.
                        </div>
                        <form action="<?= base_url('admin/preferences/editSambutan') ?>" method="post">
                            <?php foreach ($sambutan as $speech) : ?>
                            <div class="form-group">
                                <label for="sambutan">Isi Sambutan</label>
                                <textarea class="form-control" name="sambutan" id="sambutan" row="10"><?= $speech->sambutan ?></textarea>
                            </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>