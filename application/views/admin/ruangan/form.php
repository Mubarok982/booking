<?php $this->load->view('template/backend/header', ['title' => isset($ruangan) ? 'Edit Ruangan' : 'Tambah Ruangan']); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><?= isset($ruangan) ? 'Edit Ruangan' : 'Tambah Ruangan' ?></h1>
    </section>

    <section class="content">
        <form action="<?= isset($ruangan) ? site_url('admin/ruangan/update/' . $ruangan->id) : site_url('admin/ruangan/simpan') ?>" method="post">
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control" value="<?= isset($ruangan) ? $ruangan->kode : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= isset($ruangan) ? $ruangan->nama : '' ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= site_url('admin/ruangan') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
</div>
