<h2>Manajemen Pengguna</h2>
<hr>
<a href="<?= site_url('pengguna/tambah'); ?>" class="btn btn-success">Tambah Pengguna</a>
<br><br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Role</th>
            <th width="120">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($user as $u): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $u->username ?></td>
            <td><?= $u->nama ?></td>
            <td><?= ucfirst($u->role) ?></td>
            <td>
                <a href="<?= site_url('pengguna/edit/'.$u->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= site_url('pengguna/delete/'.$u->id); ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
