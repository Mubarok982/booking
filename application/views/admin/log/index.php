<div class="content-wrapper">
    <section class="content-header">
        <h1>Log Aktivitas</h1>
    </section>

    <section class="content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>IP</th>
                    <th>Device</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($log as $l): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $l->nama ?></td>
                    <td><?= $l->status ?></td>
                    <td><?= $l->ipAddress ?></td>
                    <td><?= $l->device ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($l->terdaftar)) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</div>
