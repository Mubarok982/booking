<h2><?= isset($row) ? 'Edit' : 'Tambah'; ?> Pengguna</h2>
<hr>

<form method="post">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?= isset($row) ? $row->username : ''; ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Password <?= isset($row) ? '(biarkan kosong jika tidak diganti)' : ''; ?></label>
        <input type="password" name="password" class="form-control" <?= isset($row) ? '' : 'required'; ?>>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= isset($row) ? $row->nama : ''; ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="admin" <?= (isset($row) && $row->role == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="operator" <?= (isset($row) && $row->role == 'operator') ? 'selected' : ''; ?>>Operator</option>
            <option value="user" <?= (isset($row) && $row->role == 'user') ? 'selected' : ''; ?>>User</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('pengguna'); ?>" class="btn btn-default">Kembali</a>
</form>
