<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <!-- <h3 class="card-title p-3">
                            <i class="fas fa-project-diagram mr-1"></i>
                            Profil Dinas
                        </h3> -->
                  </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/preferences/profil') ?>" method="post" name="formprofil" id="formprofil">
                            <input type="hidden" name="mode" id="mode" value="<?= $profil == null ? 'tambah' : 'edit' ?>">
                            <div class="form-group">
                                <label for="namadinas">Nama Dinas</label>
                                <input type="text" name="namadinas" id="namadinas" class="form-control" placeholder="Nama Dinas" aria-describedby="namadinas" value="<?= $profil == null ? set_value('namadinas') : $profil->namadinas; ?>" required>
                                <?= form_error('namadinas', '<small id="namadinas" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Dinas" aria-describedby="alamat" value="<?= $profil == null ? set_value('alamat') : $profil->alamat; ?>" required>
                                <?= form_error('alamat', '<small id="alamat" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <select class="form-control select2" name="provinsi" id="provinsi" style="width: 100%;" required>
                                    <?php foreach ($provinsi->semuaprovinsi as $prov) : ?>
                                        <option value="<?= $prov->id ?>" <?= $profil != null ? ($profil->provinsi == $prov->id ? 'selected' : '') : ''; ?>><?= $prov->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten</label>
                                <select class="form-control select2" name="kabupaten" id="kabupaten" style="width: 100%;" required>
                                    <!-- Nanti ajax -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control select2" name="kecamatan" id="kecamatan" style="width: 100%;" required>
                                    <!-- Nanti ajax -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desa">Kelurahan/Desa</label>
                                <select class="form-control select2" name="desa" id="desa" style="width: 100%;" required>
                                    <!-- Nanti ajax -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="telepon" id="telepon" class="form-control" value="<?= $profil == null ? set_value('telepon') : $profil->telepon; ?>" required>
                                </div>
                                <?= form_error('telepon', '<small id="telepon" class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="postal">Kode Pos</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-paper-plane"></i></span>
                                    </div>
                                    <input type="text" name="postal" id="postal" class="form-control" value="<?= $profil == null ? set_value('postal') : $profil->kodepos; ?>" required>
                                </div>
                                <?= form_error('postal', '<small id="postal" class="text-danger">', '</small>') ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-1" form="formprofil">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
