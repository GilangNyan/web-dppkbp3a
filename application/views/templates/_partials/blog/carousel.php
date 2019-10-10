<div class="container">
    <div id="carouselId" class="carousel slide" data-ride="carousel">
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
                        <?php
                            $time = strtotime($row->tanggal);
                            $year = date('Y', $time);
                            $month = date('m', $time);
                            ?>
                        <a class="text-light" href="<?= base_url() . $year . '/' . $month . '/' . $row->slug ?>">
                            <h3 class="text-reset"><?= $row->judul ?></h3>
                        </a>
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
</div>