<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"><?= $notifications ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= $notifications ?> Notifikasi</span>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('admin/pesan') ?>" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> <?= $notifications ?> pesan belum dibaca
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a>
                <!-- <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a> -->
                <!-- <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
            </div>
        </li>
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="<?= base_url('admin/setelan/') . $user->id ?>" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Setelan
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('logout') ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
            </div>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
    </ul>
</nav>
<!-- /.navbar -->