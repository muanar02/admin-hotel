<?php
    if($data['petugas']) {
        if($data['petugas']['foto']) {
            $image = $data['petugas']['foto'];
        } else {
            $image = "noimage.png";
        }
    } else {
        $image = "noimage.png";
    }   
?>

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
            <form id="<?= $data['id']; ?>" action="<?= BASEURL; ?>/petugas/<?= $data['link']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="username">Username</label>
                            <div>
                                <input type="text" class="form-control textbox"
                                id="username" name="username" placeholder="Masukan Username" value="<?php if($data['petugas']) echo $data['petugas']['username']; ?>">
                                <input type="hidden" name="id" value="<?php if($data['petugas']) echo $data['petugas']['id_user']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="password">Password</label>
                            <div>
                                <input type="password" class="form-control textbox"
                                id="password" name="password" placeholder="Masukan Password" value="<?php if($data['petugas']) echo $data['petugas']['password']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="confirmPass">Konfirmasi Password</label>
                            <div>
                                <input type="password" class="form-control textbox"
                                id="confirmPass" name="confirmPass" placeholder="Masukan Konfirmasi Password" value="<?php if($data['petugas']) echo $data['petugas']['password']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <div>
                                <input type="email" class="form-control textbox"
                                id="email" name="email" placeholder="Masukan Email" value="<?php if($data['petugas']) echo $data['petugas']['email']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="nama">Nama Lengkap</label>
                            <div>
                                <input type="text" class="form-control textbox" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="<?php if($data['petugas']) echo $data['petugas']['nama']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="telp">No. Telp/HP</label>
                            <div>
                                <input type="text" class="form-control textbox"
                                id="telp" name="telp" placeholder="Masukan No. Telp/HP" value="<?php if($data['petugas']) echo $data['petugas']['no_telp']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="alamat">Alamat</label>
                            <div>
                                <textarea name="alamat" id="alamat" class="form-control textbox" rows="4" placeholder="Masukan Alamat"><?php if($data['petugas']) echo $data['petugas']['alamat']; ?></textarea>
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group">
							<label for="file" class="control-label col-lg-3">Foto</label>
							<div class="col-md-12">
								<span id="upload-image"><img src="<?= BASEURL; ?>/img/upload/<?= $image; ?>" class="img-thumbnail" alt="Upload" width="130" /></span>
								<input type="hidden" id="image" name="image" value="" />
							</div>
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
