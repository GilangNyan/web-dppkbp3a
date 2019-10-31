<div class="col-lg-4 col-md-4 col-sm-12 sidebar">
    <!-- Sambutan Kepala Dinas PPKBP3A -->
    <?php if ($this->uri->segment(1) != 'sambutan') { ?>
        <div class="card mb-3">
            <?php foreach ($kepala as $head) : ?>
                <img class="card-img-top" src=" <?= base_url('assets/dist/img/') . $head->foto ?> " alt="Potret Kepala Dinas">
                <div class="card-body">

                    <h5 class="card-title text-center"><?= $head->nama ?></h5>
                    <p class="card-text text-center mt-0 text-muted">- <?= $head->jabatan ?> -</p>
                    <p class="card-text text-justify crop-content">
                        <?= strip_tags($head->sambutan) ?>
                    </p>
                </div>
            <?php endforeach; ?>
            <div class="footer text-center mb-3">
                <small class="text-muted text-uppercase">
                    <a href="<?= site_url('sambutan') ?>">Selengkapnya</a>
                </small>
            </div>
        </div>
    <?php } ?>

    <!-- arsip -->
    <div class="card">
        <div class="card-header bg-primary text-light">
            <h5 class="card-title mb-0">
                Arsip
            </h5>
        </div>
        <div class="card-body">
            <div class="accordion" id="accordionExample">
                <?php foreach ($archiveyear as $year) : ?>
                    <div class="card">
                        <div class="card-header p-0" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <?= $year->tahun ?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <?php foreach ($archivemonth as $month) :
                                        switch ($month->bulan) {
                                            case "01":
                                                $nbulan = "Januari";
                                                break;
                                            case "02":
                                                $nbulan = "Februari";
                                                break;
                                            case "03":
                                                $nbulan = "Maret";
                                                break;
                                            case "04":
                                                $nbulan = "April";
                                                break;
                                            case "05":
                                                $nbulan = "Mei";
                                                break;
                                            case "06":
                                                $nbulan = "Juni";
                                                break;
                                            case "07":
                                                $nbulan = "Juli";
                                                break;
                                            case "08":
                                                $nbulan = "Agustus";
                                                break;
                                            case "09":
                                                $nbulan = "September";
                                                break;
                                            case "10":
                                                $nbulan = "Oktober";
                                                break;
                                            case "11":
                                                $nbulan = "November";
                                                break;
                                            case "12":
                                                $nbulan = "Desember";
                                                break;
                                        } ?>
                                        <a name="bulan" id="bulan" class="btn btn-block btn-outline-secondary" href="<?= base_url('arsip/') . $year->tahun . '/' . $month->bulan . '/0' ?>" role="button"><?= $nbulan ?></a>
                                    <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- sidebar photos -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-light">
            <h5 class="card-title mb-0">
                Photos
            </h5>
        </div>
        <div class="card-body">
            <div class="accordion" id="accordionPhoto">
                <?php foreach ($photoyear as $year) : ?>
                    <div class="card">
                        <div class="card-header p-0" id="headingPhotoOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsePhotoOne" aria-expanded="false" aria-controls="collapsePhotoOne">
                                    <?= $year->tahun ?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapsePhotoOne" class="collapse" aria-labelledby="headingPhotoOne" data-parent="#accordionPhoto">
                            <div class="card-body">
                                <?php foreach ($photomonth as $month) :
                                        switch ($month->bulan) {
                                            case "01":
                                                $nbulan = "Januari";
                                                break;
                                            case "02":
                                                $nbulan = "Februari";
                                                break;
                                            case "03":
                                                $nbulan = "Maret";
                                                break;
                                            case "04":
                                                $nbulan = "April";
                                                break;
                                            case "05":
                                                $nbulan = "Mei";
                                                break;
                                            case "06":
                                                $nbulan = "Juni";
                                                break;
                                            case "07":
                                                $nbulan = "Juli";
                                                break;
                                            case "08":
                                                $nbulan = "Agustus";
                                                break;
                                            case "09":
                                                $nbulan = "September";
                                                break;
                                            case "10":
                                                $nbulan = "Oktober";
                                                break;
                                            case "11":
                                                $nbulan = "November";
                                                break;
                                            case "12":
                                                $nbulan = "Desember";
                                                break;
                                        } ?>
                                        <a name="bulan" id="bulan" class="btn btn-block btn-outline-secondary" href="<?= base_url('album/') . $year->tahun . '/' . $month->bulan ?>" role="button"><?= $nbulan ?></a>
                                    <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Videos -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-light">
            <h5 class="card-title mb-0">
                Videos
            </h5>
        </div>
        <div class="card-body">
            <div class="accordion" id="accordionVideo">
                <?php foreach ($videoyear as $year) : ?>
                    <div class="card">
                        <div class="card-header p-0" id="headingVideoOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVideoOne" aria-expanded="false" aria-controls="collapseVideoOne">
                                    <?= $year->tahun ?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseVideoOne" class="collapse" aria-labelledby="headingVideoOne" data-parent="#accordionVideo">
                            <div class="card-body">
                                <?php foreach ($videomonth as $month) :
                                        switch ($month->bulan) {
                                            case "01":
                                                $nbulan = "Januari";
                                                break;
                                            case "02":
                                                $nbulan = "Februari";
                                                break;
                                            case "03":
                                                $nbulan = "Maret";
                                                break;
                                            case "04":
                                                $nbulan = "April";
                                                break;
                                            case "05":
                                                $nbulan = "Mei";
                                                break;
                                            case "06":
                                                $nbulan = "Juni";
                                                break;
                                            case "07":
                                                $nbulan = "Juli";
                                                break;
                                            case "08":
                                                $nbulan = "Agustus";
                                                break;
                                            case "09":
                                                $nbulan = "September";
                                                break;
                                            case "10":
                                                $nbulan = "Oktober";
                                                break;
                                            case "11":
                                                $nbulan = "November";
                                                break;
                                            case "12":
                                                $nbulan = "Desember";
                                                break;
                                        } ?>
                                        <a name="bulan" id="bulan" class="btn btn-block btn-outline-secondary" href="<?= base_url('video/') . $year->tahun . '/' . $month->bulan ?>" role="button"><?= $nbulan ?></a>
                                    <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
