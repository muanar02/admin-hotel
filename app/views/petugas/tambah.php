
<div id="tambah-petugas">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data['judul']; ?></h1>
    </div>

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?= $data['judul']; ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= BASEURL; ?>/petugas/<?= $data['link']; ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-user"
                                id="username" name="username" placeholder="Masukan Username" value="<?php if($data['petugas']) echo $data['petugas']['username']; ?>">
                                <input type="hidden" name="id" value="<?php if($data['petugas']) echo $data['petugas']['id_user']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-user"
                                id="password" name="password" placeholder="Masukan Password" value="<?php if($data['petugas']) echo $data['petugas']['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="konfirmPass">Konfirmasi Password</label>
                            <input type="password" class="form-control form-control-user"
                                id="konfirmPass" name="konfirmPass" placeholder="Masukan Konfirmasi Password" value="<?php if($data['petugas']) echo $data['petugas']['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-user"
                                id="email" name="email" placeholder="Masukan Email" value="<?php if($data['petugas']) echo $data['petugas']['email']; ?>">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <div>
                                <input type="text" class="form-control textbox" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="<?php if($data['petugas']) echo $data['petugas']['nama']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telp">No. Telp/HP</label>
                            <input type="number" class="form-control form-control-user"
                                id="telp" name="telp" placeholder="Masukan No. Telp/HP" value="<?php if($data['petugas']) echo $data['petugas']['no_telp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Masukan Alamat"><?php if($data['petugas']) echo $data['petugas']['alamat']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="col-lg-2 col-md-3 col-sm-4 col-xs-5 btn btn-primary m-2">Simpan</button>
                    <a href="<?= BASEURL; ?>/petugas/" class="col-lg-2 col-md-3 col-sm-4 col-xs-5 btn btn-danger m-2">
                        Batal
                    </a>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
