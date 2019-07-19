<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url('assets/dist/img/' . $user['image']) ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= $user['nama'] ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= base_url('admin/home') ?>" class="nav-link <?php if ($pagename == 'Dashboard') {
                                                                            echo 'active';
                                                                        } ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview <?php if ($pagename == 'Semua Post' || $pagename == 'Post Diterbitkan') {
                                                    echo 'menu-open';
                                                } ?>">
                <a href="#" class="nav-link <?php if ($pagename == 'Semua Post' || $pagename == 'Post Diterbitkan') {
                                                echo 'active';
                                            } ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        Postingan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/post') ?>" class="nav-link <?php if ($pagename == 'Semua Post') {
                                                                                    echo 'active';
                                                                                } ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/post/published') ?>" class="nav-link <?php if ($pagename == 'Post Diterbitkan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Diterbitkan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?php if ($pagename == 'Komentar' || $pagename == 'Spam') {
                                                    echo 'menu-open';
                                                } ?>">
                <a href="#" class="nav-link <?php if ($pagename == 'Komentar' || $pagename == 'Spam') {
                                                echo 'active';
                                            } ?>">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Komentar
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link <?php if ($pagename == 'Komentar') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Diterbitkan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?php if ($pagename == 'Spam') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Spam</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?php if ($pagename == 'Halaman' || $pagename == 'Halaman Diterbitkan') {
                                                    echo 'menu-open';
                                                } ?>">
                <a href="#" class="nav-link <?php if ($pagename == 'Halaman' || $pagename == 'Halaman Diterbitkan') {
                                                echo 'active';
                                            } ?>">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Halaman
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link <?php if ($pagename == 'Halaman') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?php if ($pagename == 'Halaman Diterbitkan') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Diterbitkan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link <?php if ($pagename == 'Kelola Pengguna') {
                                                echo 'active';
                                            } ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Kelola Pengguna
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->