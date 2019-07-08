<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('templates/_partials/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php $this->load->view('templates/_partials/navbar') ?>

        <div class="msg" id="msg" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url('assets/dist/img/Logo_Kota_Tasikmalaya.png') ?>" alt="Logo Kota Tasik" class="brand-image elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bolder text-white">DPPKBP3A</span>
            </a>

            <?php $this->load->view('templates/_partials/sidebar') ?>
        </aside>