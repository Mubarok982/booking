<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);

$foto = $this->session->userdata('foto');
$foto_url = base_url('uploads/foto_user/' . ($foto ? $foto : 'default.png'));

$CI =& get_instance();
$CI->load->model('Aplikasi_model');
$aplikasi = $CI->Aplikasi_model->get();

$logo_url = base_url('uploads/logo/' . ($aplikasi->logo ?? 'default.png'));
$nama_aplikasi = $aplikasi->nama ?? 'Booking App';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Booking</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap (jika belum dimuat lewat template) -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>

<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Logo & Nama Aplikasi -->
        <a class="navbar-brand" href="<?= site_url('page/home') ?>">
            <img src="<?= $logo_url ?>" alt="Logo" style="
    height: 36px;
    width: 36px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 8px;
    border: 2px solid #fff;
    box-shadow: 0 0 4px rgba(0,0,0,0.1);
">

            <span style="font-weight: bold; font-size: 18px;"><?= $nama_aplikasi ?></span>
        </a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <!-- Menu umum -->
            <li class="<?= ($segment1 == 'page' && $segment2 == 'home') ? 'active' : '' ?>">
                <a href="<?= site_url('page/home'); ?>">Dashboard</a>
            </li>
            <li class="<?= ($segment1 == 'admin' && $segment2 == 'booking') ? 'active' : '' ?>">
                <a href="<?= site_url('admin/booking'); ?>">Booking</a>
            </li>
            <li class="<?= ($segment1 == 'profil') ? 'active' : '' ?>">
                <a href="<?= site_url('profil'); ?>">Profil</a>
            </li>

            <!-- Menu admin -->
            <?php if ($this->session->userdata('role') == 'Admin'): ?>
                <li class="<?= ($segment1 == 'ruangan') ? 'active' : '' ?>">
                    <a href="<?= site_url('admin/ruangan'); ?>">Ruangan</a>
                </li>
                <li class="<?= ($segment1 == 'user') ? 'active' : '' ?>">
                    <a href="<?= site_url('admin/user'); ?>">User</a>
                </li>
                <li class="<?= ($segment1 == 'log') ? 'active' : '' ?>">
                    <a href="<?= site_url('admin/log'); ?>">Log</a>
                </li>
                <li class="<?= ($segment1 == 'backup') ? 'active' : '' ?>">
                    <a href="<?= site_url('admin/backup'); ?>">Backup Data</a>
                </li>
                <li class="<?= ($segment1 == 'aplikasi') ? 'active' : '' ?>">
                    <a href="<?= site_url('admin/aplikasi'); ?>">Manajemen Aplikasi</a>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Profil & Logout -->
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="<?= site_url('profil') ?>">
                    <img src="<?= $foto_url ?>" width="40" height="40"
                        style="object-fit:cover; border-radius:50%; border:2px solid #fff; box-shadow:0 0 4px rgba(0,0,0,0.2);">
                </a>
            </li>
            <li>
                <a href="<?= site_url('auth/logout') ?>">Logout</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</div>
<body/>