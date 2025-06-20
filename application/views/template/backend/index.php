<?php $this->load->view('template/backend/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 p-0">
            <?php $this->load->view('template/backend/sidebar'); ?>
        </div>

        <!-- Konten Utama -->
        <div class="col-md-9 col-lg-10 mt-4">
            <?= $contents ?>
        </div>
    </div>
</div>

<?php $this->load->view('template/backend/footer'); ?>
