<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/_partials/blog/head') ?>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/postingstyle.css') ?>">
</head>

<body>
    <?php $this->load->view('templates/_partials/blog/navbar') ?>

    <section class="content">
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card mb-3">
                        <?php foreach ($artikel as $row) : ?>
                        <img src="<?= base_url('assets/img/') . $row->image ?>" class="card-img-top" alt="<?= $row->judul ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row->judul ?></h5>
                            <p class="card-text"><?= $row->isi ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <?php endforeach; ?>
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