<div class="container mt-4">
    <h3>Manajemen Aplikasi</h3>
    <form method="post" action="<?= site_url('admin/aplikasi/simpan') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Aplikasi</label>
            <input type="text" name="nama" class="form-control" value="<?= $aplikasi->nama ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $aplikasi->email ?>">
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telp" class="form-control" value="<?= $aplikasi->telp ?>">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $aplikasi->alamat ?></textarea>
        </div>
        <div class="form-group">
            <label>Logo Aplikasi</label><br>
            <?php if ($aplikasi->logo): ?>
                <img src="<?= base_url('uploads/logo/' . $aplikasi->logo) ?>" width="80" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="logo" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>