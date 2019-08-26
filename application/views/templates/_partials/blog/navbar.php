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
            <?php foreach ($parent_pages->result() as $parent_page) : ?>
            <div class="nav-item">
                <a href="#" class="nav-link dropdown-toggle" id="<?= $parent_page->id_halaman ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= strtoupper($parent_page->judul) ?></a>
                <?php if ($sub_pages->num_rows() > 0) { ?>
                <div class="dropdown-menu" aria-labelledby="<?= $parent_page->id_halaman ?>">
                    <?php foreach ($sub_pages->result() as $sub_page) : ?>
                    <?php if ($parent_page->id_halaman == $sub_page->parent) : ?>
                    <a class="dropdown-item" href="<?= base_url('pages/') . $sub_page->slug ?>"><?= $sub_page->judul ?></a>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
             <?php } ?>
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
