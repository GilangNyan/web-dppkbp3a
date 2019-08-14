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

    <div class="container pt-3">
        <div class="row justify-content-center">
            <!-- LEFT CONTENT START -->
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/1.jpg') ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card Title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                    </div>
                </div>
            </div>
            <!-- LEFT CONTENT END -->

            <!-- CONTENT CENTER START -->
            <div class="col-md-4 justify-content-center">
                <div class="row mb-1">
                    <div class="card mb-2">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/1.jpg') ?>" class="card-img" alt="..." style="size: auto">
                            </div>
                            <div class="col-md-8">
                                <div class="ml-2 mt-2">
                                    <h5>Juduulll</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="card mb-2">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/2.jpg') ?>" class="card-img" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="card mb-2">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/3.jpg') ?>" class="card-img" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="card mb-2">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/4.jpg') ?>" class="card-img" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENT CENTER END -->

            <!-- SIDEBAR START -->
            <div class="col-4 justify-content-center" style="width: 100%">
                <div class="card">
                    <?php foreach ($kepala as $head) : ?>
                        <img class="card-img-top" src="<?= base_url('assets/dist/img/') . $head->foto ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $head->nama ?></h5>
                            <p class="card-text"><?= $head->jabatan ?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- SIDEBAR END -->
        </div>
    </div>

    <div class="card mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>

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