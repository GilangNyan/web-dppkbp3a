<div class="content-wrapper">
    <?php $this->load->view('templates/_partials/contentheader') ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                            <i class="fas fa-envelope-open-text mr-1"></i>
                            Detail Pesan
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="card-title">Dikirim oleh <?= $pesan->email ?></h4>
                            <small class="text-muted"><?= date('l, d F Y', strtotime($pesan->tanggal)) ?></small>
                        </div>
                        <p class="card-text"><?= $pesan->isi ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>