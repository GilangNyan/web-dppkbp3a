<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url('assets/dist/img/' . $user->image) ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="<?= base_url('admin/setelan/') . $user->id ?>" class="d-block"><?= $user->nama ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= base_url('admin') ?>" class="nav-link <?= $pagename == 'Dashboard' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-eye"></i>
                    <p>Lihat Blog</p>
                </a>
            </li>
            <li class="nav-header">BLOG</li>
            <li class="nav-item has-treeview <?= $pagename == 'Semua Artikel' || $pagename == 'Artikel Diterbitkan' ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link <?= $pagename == 'Semua Artikel' || $pagename == 'Artikel Diterbitkan' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Artikel Blog<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/post') ?>" class="nav-link <?= $pagename == 'Semua Artikel' ? 'active' : ''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Semua Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/post/published') ?>" class="nav-link <?= $pagename == 'Artikel Diterbitkan' ? 'active' : ''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Artikel Diterbitkan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/komentar') ?>" class="nav-link <?= $pagename == 'Komentar' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>Komentar</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link <?= $pagename == 'Pesan Masuk' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>Pesan Masuk</p>
                </a>
            </li>
            <?php if ($this->session->userdata('role') == 'ADMIN' || $this->session->userdata('role') == 'GOD') : ?>
            <li class="nav-header">TAMPILAN</li>
            <li class="nav-item has-treeview <?= $pagename == 'Album Foto' || $pagename == 'Video' ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link <?= $pagename == 'Album Foto' || $pagename == 'Video' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-photo-video"></i>
                    <p>Media<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= site_url('admin/albums') ?>" class="nav-link <?= $pagename == 'Album Foto' ? 'active' : ''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Album Foto</p>
                        </a>
                        <a href="<?= base_url('') ?>" class="nav-link <?= $pagename == 'Video' ? 'active' : ''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Video</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?= $pagename == 'Halaman' || $pagename == 'Menu' ? 'active' : ''; ?>">
                <a href="#" class="nav-link <?= $pagename == 'Halaman' || $pagename == 'Menu' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Menu<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/halaman') ?>" class="nav-link <?= $pagename == 'Halaman' ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Halaman</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">ADMINISTRATOR</li>
            <li class="nav-item">
                <a href="<?= base_url('admin/user') ?>" class="nav-link <?= $pagename == 'Kelola Pengguna' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Kelola Pengguna</p>
                </a>
            </li>
            <li class="nav-item has-treeview <?= $pagename == 'Kepala Dinas' || $pagename == 'Profil Dinas' ? 'menu-open' : ''; ?>">
                <a href="#" class="nav-link <?= $pagename == 'Kepala Dinas' || $pagename == 'Profil Dinas' ? 'active' : ''; ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>Pengaturan<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/profil') ?>" class="nav-link <?= $pagename == 'Profil Dinas' ? 'active' : ''; ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Profil Dinas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/kepala') ?>" class="nav-link <?= $pagename == 'Kepala Dinas' ? 'active' : '' ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kepala Dinas</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-medkit"></i>
                    <p>Pemeliharaan<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pemeliharaan/backupDB') ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Backup Database</p>
                        </a>
                        <a href="<?= base_url('admin/pemeliharaan/restoreDB') ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Restore Database</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
