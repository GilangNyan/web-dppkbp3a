<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/_partials/blog/head') ?>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/postingstyle.css') ?>">
</head>

<body>
    <?php $this->load->view('templates/_partials/blog/navbar') ?>

    <?php
    $this->session->set_userdata('referred_from', current_url());
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
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Komentar</h4>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active text-muted" id="nav-site-tab" data-toggle="tab" href="#nav-site" role="tab" aria-controls="nav-site" aria-selected="true">Komentar</a>
                                    <a class="nav-item nav-link text-muted" id="nav-disqus-tab" data-toggle="tab" href="#nav-disqus" role="tab" aria-controls="nav-disqus" aria-selected="false">Disqus</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-site" role="tabpanel" aria-labelledby="nav-site-tab">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <form action="<?= base_url('blog/artikel/addKomentar') ?>" method="post" class="my-3">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <input type="text" name="displayname" id="displayname" class="form-control" placeholder="Nama Tampilan" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="komentar" id="komentar" rows="3" placeholder="Komentar anda..." required></textarea>
                                                </div>
                                                <input type="hidden" name="postid" value="<?= $artikel->id ?>">
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary px-3" type="submit">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <?php foreach ($komentar as $comment) : ?>
                                                <div class="col-2 p-1 d-flex flex-row-reverse">
                                                    <img class="rounded-circle img-fluid" src="<?= base_url('assets/dist/img/default.jpg') ?>" alt="Foto User">
                                                </div>
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <h6 class="card-title"><?= $comment->display_name ?></h6>
                                                            <small class="text-muted"><?= $comment->tanggal ?></small>
                                                        </div>
                                                    </div>
                                                    <p class="card-text"><?= $comment->komentar ?></p>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-disqus" role="tabpanel" aria-labelledby="nav-disqus-tab">
                                    <div class="mt-3">
                                        <?= $disqus ?>
                                    </div>
                                </div>
                            </div>

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