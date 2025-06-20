<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Booking Ruangan</title>

    <!-- Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Formulir Booking Ruangan</h2>

        <form method="post" action="<?= site_url('admin/booking/simpan') ?>">

            <div class="mb-3">
                <label for="idRuangan" class="form-label">Ruangan:</label>
                <select name="idRuangan" id="idRuangan" class="form-select" required>
                    <option value="">-- Pilih Ruangan --</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dariJam" class="form-label">Dari Jam:</label>
                <input type="time" name="dariJam" id="dariJam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sampaiJam" class="form-label">Sampai Jam:</label>
                <input type="time" name="sampaiJam" id="sampaiJam" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="agenda" class="form-label">Agenda:</label>
                <textarea name="agenda" id="agenda" class="form-control" required></textarea>
            </div>

            <div class="d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-primary">Simpan Booking</button>
                <a href="<?= site_url('admin/booking') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const tanggalEl = document.getElementById('tanggal');
            const dariEl = document.getElementById('dariJam');
            const sampaiEl = document.getElementById('sampaiJam');
            const ruanganEl = document.getElementById('idRuangan');

            function loadRuangan() {
                const tgl = tanggalEl.value;
                const dari = dariEl.value;
                const sampai = sampaiEl.value;

                // Semua field harus terisi dulu
                if (!tgl || !dari || !sampai) return;

                fetch(`<?= site_url('admin/booking/get_ruangan_tersedia') ?>?tanggal=${tgl}&dariJam=${dari}&sampaiJam=${sampai}`)
                    .then(res => res.json())
                    .then(list => {
                        console.log('Data ruangan:', list);   // debug
                        ruanganEl.innerHTML = '<option value="">-- Pilih Ruangan --</option>';

                        list.forEach(r => {
                            ruanganEl.innerHTML += `<option value="${r.id}">${r.nama}</option>`;
                        });
                    })
                    .catch(err => console.error('Fetch error:', err));
            }

            // pasang listener
            [tanggalEl, dariEl, sampaiEl].forEach(el => el.addEventListener('change', loadRuangan));

        });
    </script>



</body>

</html>