<!-- ======= Styling dan Chart.js ======= -->
<style>
    .dashboard-card {
        border-radius: 10px;
        transition: 0.3s;
    }

    .dashboard-card:hover {
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .badge-role {
        font-size: 1rem;
        border-radius: 20px;
        padding: 6px 16px;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- ======= Halaman Utama ======= -->
<div class="container mt-4">

    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="mb-1">Selamat Datang</h2>
        <h3><?= $this->session->userdata('nama'); ?></h3>
        <span class="badge badge-info badge-role mt-2"><?= ucfirst($this->session->userdata('role')); ?></span>
    </div>

    <!-- Grafik Statistik Total -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">
            <strong>Statistik Total</strong>
        </div>
        <div class="card-body">
            <canvas id="totalChart" height="100"></canvas>
        </div>
    </div>

    <!-- Grafik Statistik Per Bulan -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-info text-white">
            <strong>Statistik Booking per Bulan</strong>
        </div>
        <div class="card-body">
            <canvas id="perBulanChart" height="100"></canvas>
        </div>
    </div>

    <!-- Hak Akses -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <strong>Hak Akses Menu</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                $role = $this->session->userdata('role');
                $akses = ($role === 'Admin') ? [
                    'Dashboard' => 'Read',
                    'Booking' => 'Create, Read, Update, Delete',
                    'Ruangan' => 'Create, Read, Update, Delete',
                    'User' => 'Create, Read, Update, Delete',
                    'Log' => 'Read',
                    'Profil' => 'Update'
                ] : [
                    'Dashboard' => 'Read',
                    'Booking' => 'Create, Read',
                    'Profil' => 'Update'
                ];

                foreach ($akses as $menu => $aksi): ?>
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card dashboard-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fa fa-folder-open text-info mr-2"></i> <?= $menu ?>
                                </h5>
                                <p class="card-text"><strong>Akses:</strong> <?= $aksi ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-5 mb-3 text-muted">
        &copy; <?= date('Y'); ?> Sistem Booking Ruangan
    </div>
</div>

<!-- ======= Script Chart.js ======= -->
<script>
    // Total Statistik (Booking, Ruangan, User)
    const ctxTotal = document.getElementById('totalChart').getContext('2d');
    new Chart(ctxTotal, {
        type: 'bar',
        data: {
            labels: ['Booking', 'Ruangan', 'User'],
            datasets: [{
                label: 'Jumlah',
                data: [<?= $total_booking ?>, <?= $total_ruangan ?>, <?= $total_user ?>],
                backgroundColor: ['#28a745', '#ffc107', '#17a2b8']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });

    // Statistik Booking Per Bulan
    const ctxPerBulan = document.getElementById('perBulanChart').getContext('2d');
    new Chart(ctxPerBulan, {
        type: 'bar',
        data: {
            labels: <?= $bulan ?>,
            datasets: [{
                label: 'Jumlah Booking',
                data: <?= $total ?>,
                backgroundColor: 'rgba(0, 123, 255, 0.6)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
