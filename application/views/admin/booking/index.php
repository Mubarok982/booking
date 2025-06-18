<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Booking</h3>
        <a href="<?= site_url('admin/booking/tambah') ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Booking
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Agenda</th>
                    <th>Status</th>
                    <th width="80">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($booking as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $b->nama_user ?></td>
                        <td><?= $b->nama_ruangan ?></td>
                        <td><?= date('d-m-Y', strtotime($b->tanggal)) ?></td>
                        <td><?= $b->dariJam ?> – <?= $b->sampaiJam ?></td>
                        <td><?= $b->agenda ?></td>
                        <td>
                            <?php
                                $badgeClass = $b->status == 'Diterima' ? 'badge-success'
                                            : ($b->status == 'Ditolak' ? 'badge-danger' : 'badge-secondary');
                            ?>
                            <span class="badge <?= $badgeClass ?>"><?= $b->status ?></span>
                        </td>
                        <td>
                            <a href="<?= site_url('admin/booking/hapus/'.$b->id) ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus booking ini?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
