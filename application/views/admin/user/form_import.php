<div class="container mt-4">
    <h4>Import User dari Excel</h4>
    <form method="post" action="<?= site_url('admin/user/import') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Upload File (.xlsx)</label>
            <input type="file" name="fileExcel" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
        <a href="<?= site_url('admin/user') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
