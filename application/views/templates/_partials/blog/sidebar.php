<div class="col-lg-4 col-md-4 col-sm-12 sidebar">
    <!-- Sambutan Kepala Dinas PPKBP3A -->
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
                <a href="#">Selengkapnya</a>
            </small>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-light">
            <h5 class="card-title mb-0">
                Arsip
            </h5>
        </div>
        <div class="card-body">
            Nanti deh
        </div>
    </div>
</div>