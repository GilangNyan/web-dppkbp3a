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
        <div class="footer text-center">
            <small class="text-muted text-uppercase">
                <a href="<?= site_url('sambutan') ?>">Selengkapnya</a>
            </small>
        </div>
    </div>
    <?php } ?>
    <div class="card">
        <div class="card-header bg-primary text-light">
            <h5 class="card-title mb-0">
                Arsip
            </h5>
        </div>
        <div class="card-body">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Collapsible Group Item #1
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>