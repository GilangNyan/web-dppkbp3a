<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/_partials/blog/head') ?>
</head>

<body>
    <?php $this->load->view('templates/_partials/blog/navbar_transparent') ?>

    <?php $this->load->view('templates/_partials/blog/carousel') ?>

    <section class="content">
        <div class="container mt-3">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-lg-8 col-sm-12">
                    <!-- TULISAN POPULER -->
                    <h5 class="page-title mb-3">
                        Tulisan Terbaru
                        <hr>
                    </h5>
                    <?php foreach ($postingan as $row) :
                        $pisah1 = explode("-", $row->tanggal);
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
                    <div class="card rounded-0 border border-secondary mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <img src="<?= base_url('assets/img/') . $row->image ?>" class="card-img rounded-0 img-posting" alt="<?= $row->judul ?>">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-3">
                                    <h5 class="card-title">
                                        <a href="<?= base_url() . $tahun . '/' . $bulan . '/' . $row->slug ?>"><?= $row->judul ?></a>
                                    </h5>
                                    <p class="card-text mb-0 text-justify crop-content">
                                        <?= strip_tags($row->isi) ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-1">
                                        <small class="text-muted"><i class="fas fa-user mr-1"></i><?= "$row->nama" ?><i class="far fa-clock ml-2 mr-1"></i><?= $tanggal . ' ' . $nbulan . ' ' . $tahun ?></small>
                                        <a href="#" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;
                    echo $this->pagination->create_links(); ?>
                </div>
                <?php $this->load->view('templates/_partials/blog/sidebar') ?>
            </div>
        </div>
    </section>

    <?php $this->load->view('templates/_partials/blog/footer') ?>

    <?php $this->load->view('templates/_partials/blog/javascript') ?>
</body>

</html>