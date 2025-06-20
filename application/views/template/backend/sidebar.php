<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);

function active($s1,$s2=null){
    $CI =& get_instance();
    return ($CI->uri->segment(1)==$s1 && ($s2===null || $CI->uri->segment(2)==$s2)) ? 'active' : '';
}
?>
<!-- *** SIDEBAR *** -->
<div id="sidebar-wrapper">
    <div class="sidebar-heading">
        <i class="fas fa-bars mr-2"></i>Menu Navigasi
    </div>

    <div class="list-group list-group-flush">
        <a href="<?= site_url('page/home'); ?>"
           class="list-group-item <?= active('page','home'); ?>">
           <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>

        <a href="<?= site_url('admin/booking'); ?>"
           class="list-group-item <?= active('admin','booking'); ?>">
           <i class="fas fa-calendar-check"></i> Booking
        </a>

        <a href="<?= site_url('profil'); ?>"
           class="list-group-item <?= active('profil'); ?>">
           <i class="fas fa-user"></i> Profil
        </a>

        <?php if($this->session->userdata('role')==='Admin'): ?>
            <a href="<?= site_url('admin/ruangan'); ?>"
               class="list-group-item <?= active('admin','ruangan'); ?>">
               <i class="fas fa-door-open"></i> Ruangan
            </a>
            <a href="<?= site_url('admin/user'); ?>"
               class="list-group-item <?= active('admin','user'); ?>">
               <i class="fas fa-users"></i> User
            </a>
            <a href="<?= site_url('admin/log'); ?>"
               class="list-group-item <?= active('admin','log'); ?>">
               <i class="fas fa-clipboard-list"></i> Log
            </a>
            <a href="<?= site_url('admin/backup'); ?>"
               class="list-group-item <?= active('admin','backup'); ?>">
               <i class="fas fa-database"></i> Backup Data
            </a>
            <a href="<?= site_url('admin/aplikasi'); ?>"
               class="list-group-item <?= active('admin','aplikasi'); ?>">
               <i class="fas fa-cogs"></i> Manajemen Aplikasi
            </a>
        <?php endif; ?>
    </div>
</div>
    <style>
        /* —— SIDEBAR —— */
        #sidebar-wrapper .list-group-item:hover{
            background: rgba(255,255,255,.1);
            color:#f8f9fa;
        }
        #sidebar-wrapper .list-group-item.active{
            background: rgba(255,255,255,.2);
            color:#f8f9fa;
        }
    </style>