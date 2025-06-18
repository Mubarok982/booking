<div class="content-wrapper">
    <section class="content-header">
        <h1>Data User</h1>
    </section>

    <section class="content">
        <a href="<?= site_url('admin/user/tambah') ?>" class="btn btn-primary mb-3">+ Tambah User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($user as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u->nama ?></td>
                        <td><?= $u->username ?></td>
                        <td><?= $u->telp ?></td>
                        <td><?= $u->email ?></td>
                        <td><?= $u->role ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($u->terdaftar)) ?></td>
                        <td>
                            <a href="<?= site_url('admin/user/edit/' . $u->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('admin/user/hapus/' . $u->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</div>
