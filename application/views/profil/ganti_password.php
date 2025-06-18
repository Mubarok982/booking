<div class="container mt-4">
    <h4>Ganti Password</h4>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('profil/simpan_password') ?>" class="card p-4 shadow-sm">
        <div class="form-group">
            <label>Password Lama</label>
            <input type="password" name="password_lama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="password_baru" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
