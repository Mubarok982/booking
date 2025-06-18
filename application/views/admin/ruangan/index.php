<div class="content-wrapper">
    <section class="content-header">
        <h1>Data Ruangan</h1>
    </section>

    <section class="content">
        <a href="<?= site_url('admin/ruangan/tambah') ?>" class="btn btn-primary mb-3">+ Tambah Ruangan</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($ruangan as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r->kode ?></td>
                        <td><?= $r->nama ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($r->terdaftar)) ?></td>
                        <td>
                            <a href="<?= site_url('admin/ruangan/edit/' . $r->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('admin/ruangan/hapus/' . $r->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
