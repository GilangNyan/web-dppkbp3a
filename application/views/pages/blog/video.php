<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/_partials/blog/head') ?>
    <!-- <link rel="stylesheet" href="<?= base_url('assets/dist/css/postingstyle.css') ?>"> -->
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
                            <div class="row">
                                <?php foreach ($video as $row) :
                                    $explode = explode(".", $row->filename);
                                    $thumbs = $explode[0] . '.jpg';
                                    ?>
                                    <div class="col-md-4 vidthumb">
                                        <img class="img-fluid" src="<?= base_url('assets/videos/thumbs/') . $thumbs ?>" alt="<?= $row->judul ?>">
                                        <div class="overlay">
                                            <div class="isihover"><i class="far fa-play-circle"></i></div>
                                        </div>
                                        <a href="<?= base_url('blog/video/modalVideo') ?>" class="stretched-link videomodal" data-id="<?= $row->id ?>">
                                            <h6 class="text-bold mt-2 text-truncate"><?= $row->judul ?></h6>
                                        </a>
                                        <small class="text-muted"><?= date('d F Y', strtotime($row->tanggal)) ?></small>
                                        <input type="hidden" name="url" id="url" value="<?= base_url('assets/videos/') ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('templates/_partials/blog/sidebar') ?>
            </div>
        </div>
        <?php $this->load->view('templates/_partials/blog/backtotop') ?>
    </section>

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="videomodal" aria-hidden="true" id="videomodal">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="#" frameborder="0" class="embed-responsive-item" id="framevid" allowfullscreen></iframe>
                            </div>
                            <p class="mt-3" id="deskripsi"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/_partials/blog/javascript') ?>
    <script src="<?= base_url('assets/dist/js/video.js') ?>"></script>
    <?php $this->load->view('templates/_partials/blog/footer') ?>
</body>

</html>