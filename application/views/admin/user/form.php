<div class="content-wrapper">
    <section class="content-header">
        <h1><?= isset($user) ? 'Edit User' : 'Tambah User' ?></h1>
    </section>

    <section class="content">
        <form action="<?= isset($user) ? site_url('admin/user/update/' . $user->id) : site_url('admin/user/simpan') ?>" method="post">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= isset($user) ? $user->nama : '' ?>" required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenisKelamin" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" <?= (isset($user) && $user->jenisKelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= (isset($user) && $user->jenisKelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Telp</label>
                <input type="text" name="telp" class="form-control" value="<?= isset($user) ? $user->telp : '' ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= isset($user) ? $user->email : '' ?>" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"><?= isset($user) ? $user->alamat : '' ?></textarea>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?= isset($user) ? $user->username : '' ?>" required>
            </div>

            <div class="form-group">
                <label>Password <?= isset($user) ? '(Biarkan kosong jika tidak diubah)' : '' ?></label>
                <input type="password" name="password" class="form-control" <?= isset($user) ? '' : 'required' ?>>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Admin" <?= (isset($user) && $user->role == 'Admin') ? 'selected' : '' ?>>Admin</option>
                    <option value="User" <?= (isset($user) && $user->role == 'User') ? 'selected' : '' ?>>User</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= site_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
</div>
