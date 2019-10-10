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
                            <!--  -->
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