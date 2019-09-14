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
                        <div class="card-header bg-primary text-light">
                            <h5 class="card-title mb-0">
                                <?= $judulcard ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <?php foreach ($album as $row) : ?>
                                <?php $count = 0 ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $row->album_title ?></h4>
                                        <div class="row">
                                            <?php foreach ($foto as $photo) : ?>
                                                <?php if ($row->id == $photo->photo_album_id) : ?>
                                                    <?php $count++ ?>
                                                    <div class="col-6 col-md-4">
                                                        <a href="<?= base_url('assets/img/album/') . $photo->photo_name ?>" data-lightbox="<?= $row->id ?>">
                                                            <img src="<?= base_url('assets/img/album/thumbs/') . $photo->photo_name ?>" class="card-img" alt="<?= $photo->photo_name ?>">
                                                        </a>
                                                    </div>
                                                    <?php if ($count == 3) break 1; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="<?= base_url('album/') . $row->id ?>" class="btn btn-primary float-right">Selengkapnya &raquo;</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('templates/_partials/blog/sidebar') ?>
            </div>
        </div>
        <?php $this->load->view('templates/_partials/blog/backtotop') ?>
    </section>

    <?php $this->load->view('templates/_partials/blog/javascript') ?>
    <?php $this->load->view('templates/_partials/blog/footer') ?>
</body>

</html>