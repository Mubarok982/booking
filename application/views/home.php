<!-- ======= Tambahkan di atas untuk Chart.js & styling ======= -->
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

<!-- ========== Halaman Utama ========== -->
<div class="container mt-4">
    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="mb-1">Selamat Datang</h2>
        <h3><?= $this->session->userdata('nama'); ?></h3>
        <span class="badge badge-info badge-role mt-2">
            <?= ucfirst($this->session->userdata('role')); ?>
        </span>
    </div>

    <!-- ====== Statistik dengan Chart.js ====== -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">
            <strong>Statistik Booking</strong>
        </div>
        <div class="card-body">
            <canvas id="bookingChart" height="100"></canvas>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        const ctx = document.getElementById('bookingChart').getContext('2d');
        const chart = new Chart(ctx, {
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
                        precision: 0
                    }
                }
            }
        });
    </script>

    <!-- ====== Hak Akses Menu ====== -->
    <div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <strong>Hak Akses Menu</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <?php
            $role  = $this->session->userdata('role');
            $akses = ($role === 'Admin')
                ? [
                    'Dashboard' => 'Read',
                    'Booking'   => 'Create, Read, Update, Delete',
                    'Ruangan'   => 'Create, Read, Update, Delete',
                    'User'      => 'Create, Read, Update, Delete',
                    'Log'       => 'Read',
                    'Profil'    => 'Update'
                  ]
                : [
                    'Dashboard' => 'Read',
                    'Booking'   => 'Create, Read',
                    'Profil'    => 'Update'
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
    <!-- ====== Footer ====== -->
    <div class="text-center mt-5">
        <p class="text-muted">&copy; <?= date('Y'); ?> Sistem Booking Ruangan</p>
    </div>
</div>
