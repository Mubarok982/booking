<?php
$role = $this->session->userdata('role');
if ($role == 'admin'):
?>
<div class="pull-right">
    <a href="<?= site_url('berita/tambah'); ?>" class="btn btn-success">TAMBAH DATA</a>
</div>
<?php endif; ?>
<h2 style="margin-top: 0;margin-bottom: 0;">Berita</h2>
<div class="clearfix"></div>
<hr />

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
                $no = 1;
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
