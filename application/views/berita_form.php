<h2><?= isset($row) ? 'Edit' : 'Tambah'; ?> Berita</h2>
<hr>
<?php if (validation_errors()): ?>
<div class="alert alert-danger">
    <?= validation_errors(); ?>
</div>
<?php endif; ?>

<form method="post">
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="<?= isset($row) ? $row->judul : ''; ?>" required>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="6" required><?= isset($row) ? $row->deskripsi : ''; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('berita'); ?>" class="btn btn-default">Kembali</a>
</form>
