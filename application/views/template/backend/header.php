<?php if($this->session->userdata('role') == 'admin'): ?>
<li><a href="<?= site_url('pengguna') ?>">Pengguna</a></li>
<?php endif; ?>

<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">My Web Programming</a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="<?= site_url('page/home'); ?>">Home</a></li>
            <li><a href="<?= site_url('page/berita'); ?>">Berita</a></li>
            <?php if ($this->session->userdata('role') == 'admin'): ?>
                <li><a href="<?= site_url('pengguna'); ?>">Pengguna</a></li>
            <?php endif; ?>
            <li><a href="<?= site_url('page/kontak'); ?>">Kontak</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= site_url('auth/logout'); ?>">Logout</a></li>
        </ul>
    </div><!--/.navbar-collapse -->
</div>
