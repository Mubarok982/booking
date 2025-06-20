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

    canvas {
    max-height: 250px;
}

</style>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-4">

    <!-- Statistik Total dan Per Status (sejajar setengah layar) -->
    <div class="row mb-5">
        <!-- Pie Chart -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <strong>Statistik Total</strong>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" height="250"></canvas>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <strong>Statistik Booking per Status</strong>
                </div>
                <div class="card-body">
                    <canvas id="barChart" height="250"></canvas>
                </div>
            </div>
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
                $akses = [
                    'Dashboard' => 'Read',
                    'Booking' => 'Read, Update, Delete',
                    'Ruangan' => 'Create, Read, Update, Delete',
                    'User' => 'Create, Read, Update, Delete',
                    'Log' => 'Read',
                    'Profil' => 'Update'
                ];
                foreach ($akses as $menu => $aksi): ?>
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card dashboard-card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-folder-open text-info me-2"></i><?= $menu ?></h5>
                                <p class="card-text"><strong>Akses:</strong> <?= $aksi ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 mb-3 text-muted">
        &copy; <?= date('Y'); ?> Sistem Booking Ruangan
    </div>
</div>

<!-- Chart Rendering -->
<script>
    // Pie Chart
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Booking', 'Ruangan', 'User'],
            datasets: [{
                label: 'Total',
                data: [<?= $total_booking ?>, <?= $total_ruangan ?>, <?= $total_user ?>],
                backgroundColor: ['#28a745', '#ffc107', '#17a2b8']
            }]
        },
        options: {
            responsive: true
        }
    });

    // Bar Chart
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: <?= $status_labels ?>, // contoh: ["Menunggu", "Diterima", "Ditolak"]
            datasets: [{
                label: 'Jumlah Booking',
                data: <?= $status_totals ?>, // contoh: [5, 3, 1]
                backgroundColor: ['#ffc107', '#28a745', '#dc3545']
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