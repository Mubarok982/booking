<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Booking</h3>

        <?php if ($this->session->userdata('role') !== 'Admin'): ?>
            <a href="<?= site_url('admin/booking/tambah') ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Booking
            </a>
        <?php endif; ?>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Agenda</th>
                    <th>Status</th>
                    <?php if ($this->session->userdata('role') === 'Admin'): ?>
                        <th width="180">Aksi</th>
                    <?php endif; ?>
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
                                $status = strtolower($b->status);
                                $badgeClass = match ($status) {
                                    'diterima' => 'success',
                                    'ditolak'  => 'danger',
                                    'menunggu'=> 'warning',
                                    default    => 'secondary'
                                };
                            ?>
                            <span class="badge bg-<?= $badgeClass ?>"><?= ucfirst($status) ?></span>
                        </td>

                        <?php if ($this->session->userdata('role') === 'Admin'): ?>
                            <td>
                                <div class="d-flex gap-1">
                                    <?php if ($b->status === 'Menunggu'): ?>
                                        <a href="<?= site_url('admin/booking/setujui/' . $b->id) ?>" 
                                           class="btn btn-success btn-sm" title="Setujui">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <a href="<?= site_url('admin/booking/tolak/' . $b->id) ?>" 
                                           class="btn btn-warning btn-sm text-white" title="Tolak">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <a href="<?= site_url('admin/booking/hapus/' . $b->id) ?>" 
                                       class="btn btn-danger btn-sm" title="Hapus"
                                       onclick="return confirm('Yakin hapus booking ini?')">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
