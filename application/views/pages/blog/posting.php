<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/_partials/blog/head') ?>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/postingstyle.css') ?>">
</head>

<body>
    <?php $this->load->view('templates/_partials/blog/navbar') ?>

    <?php
    $pattern = "/(<p)/";
    $replace = '<p class="text-justify"';
    $pisah1 = explode("-", $artikel->tanggal);
    $tahun = $pisah1[0];
    $bulan = $pisah1[1];
    $sisa1 = $pisah1[2];
    $pisah2 = explode(" ", $sisa1);
    $tanggal = $pisah2[0];
    switch ($bulan) {
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
    }
    ?>
    <section class="content">
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body py-2">
                            <p class="card-text"><small class="text-muted"><i class="far fa-edit mr-1"></i><a href="<?= base_url() ?>">Home</a> &raquo; Artikel &raquo; <?= $artikel->judul ?></small></p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <img src="<?= base_url('assets/img/') . $artikel->image ?>" class="card-img-top" alt="<?= $artikel->judul ?>">
                        <div class="card-body">
                            <h3 class="card-title font-weight-bolder"><?= $artikel->judul ?></h3>
                            <p class="card-text"><small class="text-muted"><i class="fas fa-user mr-1"></i><?= "$artikel->nama" ?><i class="far fa-clock ml-2 mr-1"></i><?= $tanggal . ' ' . $nbulan . ' ' . $tahun ?></small></p>
                            <p class="card-text"><?= preg_replace($pattern, $replace, $artikel->isi) ?></p>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('templates/_partials/blog/sidebar') ?>
            </div>
        </div>
    </section>

    <?php $this->load->view('templates/_partials/blog/javascript') ?>
    <?php $this->load->view('templates/_partials/blog/footer') ?>
</body>

</html>