<div class="content-wrapper">
    <section class="content-header">
        <h1>Data User</h1>
        <p class="text-muted">Kelola semua akun pengguna aplikasi</p>
    </section>

    <section class="content">
        <div class="card shadow-sm p-4">
            <div class="d-flex justify-content-between mb-3">
                <a href="<?= site_url('admin/user/form_import') ?>" class="btn btn-success">
                    <i class="fa fa-upload"></i> Import User
                </a>
                <a href="<?= site_url('admin/user/tambah') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah User
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terdaftar</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($user as $u): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $u->nama ?></td>
                                <td><?= $u->username ?></td>
                                <td><?= $u->telp ?></td>
                                <td><?= $u->email ?></td>
                                <td class="text-center">
                                    <span class="badge badge-<?= $u->role == 'Admin' ? 'primary' : 'secondary' ?>">
                                        <?= $u->role ?>
                                    </span>
                                </td>
                                <td class="text-center"><?= date('d-m-Y H:i', strtotime($u->terdaftar)) ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('admin/user/edit/' . $u->id) ?>" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= site_url('admin/user/hapus/' . $u->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus user ini?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
