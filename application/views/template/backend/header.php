<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);

$foto = $this->session->userdata('foto');
$foto_url = base_url('uploads/foto_user/' . ($foto ? $foto : 'default.png'));
?>

<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0);">My Booking Web</a>
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
            <?php endif; ?>
        </ul>

        <!-- Foto profil + dropdown menu -->
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="<?= site_url('profil') ?>">
                    <img src="<?= $foto_url ?>" width="60" height="60"
                        style="object-fit:cover; border-radius:50%; border:2px solid #fff; box-shadow:0 0 4px rgba(0,0,0,0.2);">
                </a>
            </li>
            <li>
                <a href="<?= site_url('auth/logout') ?>">Logout</a>
            </li>
        </ul>

    </div><!-- /.navbar-collapse -->
</div>