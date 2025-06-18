<div class="container mt-4">
    <h3 class="mb-3">Profil Saya</h3>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <form action="<?= site_url('profil/update') ?>" method="post" enctype="multipart/form-data" class="card p-4 shadow-sm mt-3">
        <form action="<?= site_url('profil/update') ?>" method="post" enctype="multipart/form-data"
            class="card p-4 shadow-sm mt-3">
            <div class="form-group">
                <label for="foto">Foto Profil</label><br>
                <?php if ($user->foto): ?>
                    <img src="<?= base_url('uploads/foto_user/' . $user->foto) ?>" alt="Foto Profil" width="100"
                        class="mb-2 rounded">
                <?php endif; ?>
                <input type="file" name="foto" id="foto" class="form-control-file">
            </div>


            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $user->nama ?>" required>
            </div>

            <div class="form-group">
                <label for="jenisKelamin">Jenis Kelamin</label>
                <select name="jenisKelamin" id="jenisKelamin" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" <?= ($user->jenisKelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki
                    </option>
                    <option value="Perempuan" <?= ($user->jenisKelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" name="telp" id="telp" class="form-control" value="<?= $user->telp ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $user->email ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3"
                    required><?= $user->alamat ?></textarea>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $user->username ?>"
                    required>
            </div>

            <div class="form-actions d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= site_url('profil/ganti_password') ?>" class="btn btn-warning mt-3">Ganti Password</a>
                <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</div>