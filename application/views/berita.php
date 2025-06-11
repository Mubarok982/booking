<?php if ($this->session->userdata('role') == 'admin') : ?>
<div class="pull-right">
    <a href="<?= site_url('berita/tambah'); ?>" class="btn btn-success">TAMBAH DATA</a>
</div>
<?php endif; ?>

<h2>Berita</h2>
<hr>

<!-- Form Pencarian -->
<form method="get" class="form-inline" action="<?= site_url('berita') ?>">
    <div class="form-group">
        <input type="text" name="q" class="form-control" placeholder="Cari berita..." value="<?= $keyword ?? '' ?>">
    </div>
    <button type="submit" class="btn btn-info">Cari</button>
    <a href="<?= site_url('berita'); ?>" class="btn btn-default">Reset</a>
</form>

<!-- Info pencarian -->
<?php if (!empty($keyword)) : ?>
    <p><em>Hasil pencarian untuk: <strong><?= htmlspecialchars($keyword); ?></strong></em></p>
<?php endif; ?>

<!-- Tabel -->
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <?php if ($this->session->userdata('role') != 'user') : ?>
                    <th style="width: 80px;">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($berita)) :
                $no = 1 + ($this->input->get('start') ?? 0); // buat nomor tetap naik saat paging
                foreach ($berita as $b) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b->judul; ?></td>
                        <td><?= word_limiter($b->deskripsi, 20); ?></td>
                        <td><?= date('d M Y', strtotime($b->tanggal)); ?></td>
                        <?php if ($this->session->userdata('role') != 'user') : ?>
                            <td>
                                <a href="<?= site_url('berita/edit/' . $b->id); ?>" class="btn btn-default btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a href="<?= site_url('berita/delete/' . $b->id); ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach;
            else : ?>
                <tr>
                    <td colspan="<?= ($this->session->userdata('role') != 'user') ? 5 : 4; ?>" class="text-center">
                        Tidak ada data
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Pagination-->
<div class="text-center">
    <?= $this->pagination->create_links(); ?>
</div>
