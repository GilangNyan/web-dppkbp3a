<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand ml-lg-3" href="<?= base_url() ?>">
        <img src="<?= base_url('assets/dist/img/Logo_Kota_Tasikmalaya.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="Logo Kota Tasik">
        <span class="text-warning">DPPKBP3A</span> Tasikmalaya
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-left" id="navbarSupportedContent">
        <div class="row ml-auto mr-sm-2">
            <?php if ($parent_pages->num_rows() > 0) : ?>
                <ul class="navbar-nav mt-2 mt-lg-0 mr-2">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
                    </li>
                    <?php foreach ($parent_pages->result() as $parent_page) :
                            $sub_pages = $this->halaman_model->get_sub_pages($parent_page->id_halaman);
                            if ($sub_pages->num_rows() > 0) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('pages/') . $parent_page->slug ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= strtoupper($parent_page->judul) ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($sub_pages->result() as $sub_page) : ?>
                                        <a class="dropdown-item" href="<?= base_url('pages/') . $sub_page->slug ?>"><?= strtoupper($sub_page->judul) ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('pages/') . $parent_page->slug ?>"><?= strtoupper($parent_page->judul) ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form class="form-inline my-2 my-lg-0">
                <div class="form-group has-search">
                    <i class="fas fa-search form-control-feedback"></i>
                    <div class="holder">
                        <form action="<?= base_url('blog/artikel/liveSearch') ?>" method="post" id="formsearch">
                            <input type="text" class="form-control" name="cari" id="cari" placeholder="Cari..." aria-label="Cari..." aria-describedby="basic-addon">
                        </form>
                        <div class="drop">
                            <div class="list-group" id="searchData"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>