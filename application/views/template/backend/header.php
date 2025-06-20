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

$nama_user = $this->session->userdata('nama');
$role_user = ucfirst($this->session->userdata('role'));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Dashboard'; ?></title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 56px; /* tinggi navbar */
        }

        /* SIDEBAR */
        #sidebar-wrapper {
            position: fixed;
            top: 56px;
            left: 0;
            width: 240px;
            height: calc(100vh - 56px);
            overflow-y: auto;
            background: linear-gradient(180deg,#343a40 0,#212529 100%);
            color: #f8f9fa;
            transition: all .25s ease;
            z-index: 1030;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1rem 1.25rem;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        #sidebar-wrapper .list-group-item {
            background: transparent;
            color: #adb5bd;
            border: none;
            padding: .75rem 1.25rem;
        }

        #sidebar-wrapper .list-group-item:hover,
        #sidebar-wrapper .list-group-item.active {
            background: #495057;
            color: #fff;
        }

        #sidebar-wrapper .list-group-item i {
            width: 20px;
        }

        /* PAGE CONTENT */
        #page-content {
            margin-left: 240px;
            padding: 2rem 1rem;
        }

        /* RESPONSIVE */
        @media (max-width:768px){
            #sidebar-wrapper {
                margin-left: -240px;
            }
            #sidebar-wrapper.show {
                margin-left: 0;
            }
            #page-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <!-- Logo & Nama Aplikasi -->
        <a class="navbar-brand d-flex align-items-center" href="<?= site_url('page/home') ?>">
            <img src="<?= $logo_url ?>" alt="Logo" style="height:36px; width:36px; object-fit:cover; border-radius:50%; margin-right:8px;">
            <span style="font-weight: bold;"><?= $nama_aplikasi ?></span>
        </a>

        <!-- Admin Info + Profil -->
        <div class="d-flex align-items-center ms-auto">
            <?php if ($this->session->userdata('role') === 'Admin'): ?>
                <div class="text-end me-3 text-white d-none d-md-block">
                    <div><strong><?= $nama_user ?></strong></div>
                    <small class="text-muted"><?= $role_user ?></small>
                </div>
            <?php endif; ?>
            <a href="<?= site_url('profil') ?>" class="me-2">
                <img src="<?= $foto_url ?>" width="40" height="40" class="rounded-circle border" style="object-fit:cover;">
            </a>
            <a class="btn btn-outline-light" href="<?= site_url('auth/logout') ?>">Logout</a>
        </div>
    </div>
</nav>
