<h2>Daftar Pengguna</h2>
<hr>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($user as $u): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $u->username ?></td>
            <td><?= $u->nama ?></td>
            <td><?= ucfirst($u->role) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>