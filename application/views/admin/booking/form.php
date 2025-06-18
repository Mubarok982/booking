<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Booking Ruangan</title>
</head>
<body>

    <div class="form-container">
        <h2>Formulir Booking Ruangan</h2>
        <form method="post" action="<?= site_url('admin/booking/simpan') ?>">
            
            <div class="form-group">
                <label for="idRuangan">Ruangan:</label>
                <select name="idRuangan" id="idRuangan" class="form-control" required>
                    <option value="">-- Pilih Ruangan --</option>
                    <?php foreach ($ruangan as $r): ?>
                        <option value="<?= $r->id ?>"><?= $r->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dariJam">Dari Jam:</label>
                <input type="time" name="dariJam" id="dariJam" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sampaiJam">Sampai Jam:</label>
                <input type="time" name="sampaiJam" id="sampaiJam" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="agenda">Agenda:</label>
                <textarea name="agenda" id="agenda" class="form-control" required></textarea>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Booking</button>
                <a href="<?= site_url('admin/booking') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('tanggal');
            const dariJamInput = document.getElementById('dariJam');
            const sampaiJamInput = document.getElementById('sampaiJam');

            const today = new Date().toISOString().split('T')[0];
            tanggalInput.setAttribute('min', today);

            function setSampaiJamMin() {
                if (dariJamInput.value) {
                    sampaiJamInput.min = dariJamInput.value;
                }
            }

            dariJamInput.addEventListener('change', setSampaiJamMin);
            
            setSampaiJamMin();
        });
    </script>

</body>
</html>