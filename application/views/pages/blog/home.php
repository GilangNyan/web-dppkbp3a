<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DPPKBP3A Kota Tasikmalaya</title>
    <link rel="icon" href="<?= base_url('assets/favico.ico') ?>" type="image/gif">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/blogstyle.css') ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand ml-lg-3" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/dist/img/Logo_Kota_Tasikmalaya.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="Logo Kota Tasik">
            <span class="text-warning">DPPKBP3A</span> Tasikmalaya
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-2">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
                </li>
                <?php foreach ($menu as $menus) : ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="<?= $menus->id_menu ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= strtoupper($menus->nama_menu) ?></a>
                        <div class="dropdown-menu" aria-labelledby="<?= $menus->id_menu ?>">
                            <?php foreach ($submenu as $submenus) : ?>
                                <?php if ($menus->id_menu == $submenus->parent) : ?>
                                    <a class="dropdown-item" href="<?= base_url('pages/') . $submenus->slug ?>"><?= $submenus->judul ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-lg-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari..." aria-describedby="basic-addon">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>
        </div>
    </nav>
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            $i = 0;
            foreach ($carousel as $row) : ?>
            <?php $i++ ?>
            <div class="carousel-item <?php if ($i == 1) {
                echo 'active';
            } ?>">
            <img src="<?= base_url('assets/img/') . $row->image ?>" alt="<?= $row->judul ?>">
            <div class="carousel-caption d-none d-md-block">
                <h3><?= $row->judul ?></h3>
                <div class="container">
                    <p class="crop-text"><?= strip_tags($row->isi) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>

<section class="content">
    <div class="container mt-3">
        <div class="row">
            <!-- CONTENT -->
            <div class="col-lg-8 col-sm-12">
                <!-- TULISAN POPULER -->
                <h5 class="page-title mb-3">
                    Tulisan Terbaru
                </h5>
                <div class="card rounded-0 border border-secondary mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src=" <?= base_url('assets/dist/img/post_image.png') ?> " class="card-img rounded-0" alt="Sample Post 1">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-3">
                                <h5 class="card-title">
                                    <a href="#">Sample Post 1</a>
                                </h5>
                                <p class="card-text mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <small class="text-muted">Administrator</small>
                                    <a href="#" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-0 border border-secondary mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="" class="card-img rounded-0" alt="Sample Post 1">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-3">
                                <h5 class="card-title">
                                    <a href="#">Sample Post 2</a>
                                </h5>
                                <p class="card-text mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <small class="text-muted">Administrator</small>
                                    <a href="#" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-0 border border-secondary mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="" class="card-img rounded-0" alt="Sample Post 1">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-3">
                                <h5 class="card-title">
                                    <a href="#">Sample Post 3</a>
                                </h5>
                                <p class="card-text mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <small class="text-muted">Administrator</small>
                                    <a href="#" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-0 border border-secondary mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="" class="card-img rounded-0" alt="Sample Post 1">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-3">
                                <h5 class="card-title">
                                    <a href="#">Sample Post 4</a>
                                </h5>
                                <p class="card-text mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <small class="text-muted">Administrator</small>
                                    <a href="#" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-0 border border-secondary mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="" class="card-img rounded-0" alt="Sample Post 1">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-3">
                                <h5 class="card-title">
                                    <a href="#">Sample Post 5</a>
                                </h5>
                                <p class="card-text mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-1">
                                    <small class="text-muted">Administrator</small>
                                    <a href="#" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 sidebar">
                <!-- Sambutan Kepala Dinas PPKBP3A -->
                <div class="card-img-top">
                    <img class="card-img-top" src=" <?= base_url('assets/dist/img/headmaster_photo.png') ?> " alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Lusy Robiatul Fadilah., S.Kom.</h5>
                    <p class="card-text text-center mt-0 text-muted">- Kepala Dinas -</p>
                    <p class="card-text text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER START -->
<div class="footer">
    <div class="footer-social-icon">
        <ul>
            <li><a href="#" target="blank"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#" target="blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" target="blank"><i class="fab fa-google-plus"></i></a></li>
            <li><a href="#" target="blank"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>
    <div class="copyright">
        <p><i class="far fa-copyright"></i> Dinas PPKBP3A 2019</i></p>
    </div>
</div>
<!-- FOOTER END -->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Nav Shrink -->
<script src="<?= base_url('assets/dist/js/navshrink.js') ?>"></script>
</body>

</html>
