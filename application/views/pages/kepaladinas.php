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
                            <div class="col-sm-12 col-md-2 text-center" id="divfoto">
                                <img class="img-fluid mb-2" src="<?= base_url('assets/dist/img/') . $fotokepala->foto ?>" alt="Foto Kepala Dinas">
                                <form method="post" action="" enctype="multipart/form-data" id="formfoto">
                                    <input type="file" name="foto" id="foto" accept="image/*" hidden>
                                    <button type="button" id="btnfoto" class="btn btn-primary">Ganti Foto</button>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-10">
                                <form action="<?= base_url('admin/preferences/editKepala') ?>" method="post">
                                    <div class="form-group">
                                        <label for="namakadis">Nama Kepala Dinas</label>
                                        <input type="text" class="form-control" name="namakadis" id="namakadis" aria-describedby="namakadis" value="<?= $kepala->nama ?>" placeholder="Masukkan Nama Kepala Dinas">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" aria-describedby="jabatan" value="<?= $kepala->jabatan ?>" placeholder="Masukkan Jabatan">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button id="btnKepala" class="btn btn-primary">Simpan</button>
                                    </div>
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
                        <form action="<?= base_url('admin/preferences/editSambutan') ?>" method="post">
                            <div class="form-group">
                                <label for="sambutan">Isi Sambutan</label>
                                <textarea class="form-control" name="sambutan" id="sambutan" row="10"><?= $sambutan->sambutan ?></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button id="btnSambutan" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>