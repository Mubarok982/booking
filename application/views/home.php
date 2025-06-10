<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h2 class="text-center">Selamat datang</h2>
            <h3 class="text-center"><?= $this->session->userdata('nama'); ?></h3>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <strong>Role</strong><br>
                    <span class="label label-primary"><?= ucwords($this->session->userdata('role')); ?></span>
                </div>
                <div class="col-md-8">
                    <strong>Hak Akses Menu:</strong>
                    <div class="row">
                        <?php
                        $role = $this->session->userdata('role');

                        // Template akses menu
                        $akses = [];

                        if ($role === 'admin') {
                            $akses = [
                                'Home' => 'Read',
                                'Berita' => 'Create, Read, Update, Delete',
                                'Pengguna' => 'Create, Read, Update, Delete',
                                'Kontak' => 'Read'
                            ];
                        } elseif ($role === 'operator') {
                            $akses = [
                                'Home' => 'Read',
                                'Berita' => 'Read, Update, Delete',
                                'Kontak' => 'Read'
                            ];
                        } else { // user
                            $akses = [
                                'Home' => 'Read',
                                'Berita' => 'Read',
                                'Kontak' => 'Read'
                            ];
                        }

                        // Tampilkan card
                        foreach ($akses as $menu => $aksi) :
                        ?>
                            <div class="col-md-6" style="margin-bottom: 15px;">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><strong><?= $menu ?></strong></div>
                                    <div class="panel-body">
                                        Aksi: <span class="text-success"><?= $aksi ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
