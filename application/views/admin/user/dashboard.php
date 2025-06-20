<?php
// File: application/views/user/dashboard.php
?>
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h3>Selamat Datang, <?= $this->session->userdata('nama'); ?>!</h3>
            <p class="text-muted">Berikut ringkasan aktivitas booking Anda.</p>
        </div>
    </div>

    <!-- Notifikasi jika ada booking yang masih menunggu -->
    <?php
    $adaMenunggu = false;
    foreach ($booking_terbaru as $bk) {
        if ($bk->status === 'Menunggu') {
            $adaMenunggu = true;
            break;
        }
    }
    ?>
    <?php if ($adaMenunggu): ?>
        <div class="alert alert-warning">
            <i class="fas fa-clock"></i> Kamu memiliki booking yang masih <strong>menunggu</strong> persetujuan.
        </div>
    <?php endif; ?>

    <!-- Tombol aksi cepat -->
    <div class="mb-4">
        <a href="<?= site_url('admin/booking/tambah') ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i> Booking Ruangan Baru
        </a>
    </div>

    <!-- Tabel Booking Terbaru -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-clock"></i> Riwayat Booking Terbaru
        </div>
        <div class="card-body">
            <?php if (!empty($booking_terbaru)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Ruangan</th>
                                <th>Agenda</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($booking_terbaru as $b): ?>
                                <tr>
                                    <td><?= date('d-m-Y', strtotime($b->tanggal)) ?></td>
                                    <td><?= $b->nama_ruangan ?></td>
                                    <td><?= $b->agenda ?></td>
                                    <td>
                                        <?php
                                            $badgeClass = $b->status === 'Diterima' ? 'success'
                                                        : ($b->status === 'Ditolak' ? 'danger' : 'warning');
                                        ?>
                                        <span class="badge bg-<?= $badgeClass ?>"><?= $b->status ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted">Belum ada riwayat booking.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
