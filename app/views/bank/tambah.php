

<div id="tambah-bank">

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
            <form id="<?= $data['id']; ?>" action="<?= BASEURL; ?>/bank/<?= $data['link']; ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="bank">Nama Bank</label>
                            <div>
                                <input type="text" class="form-control textbox"
                                id="bank" name="bank" placeholder="Masukan Nama Bank" value="<?php if($data['bank']) echo $data['bank']['bank']; ?>">
                                <input type="hidden" name="id" value="<?php if($data['bank']) echo $data['bank']['id_bank']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="norek">No. Rekening</label>
                            <div>
                                <input type="text" class="form-control textbox"
                                id="norek" name="norek" placeholder="Masukan No. Rekening" value="<?php if($data['bank']) echo $data['bank']['norek']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="nama">Nama Nasabah</label>
                            <div>
                                <input type="text" class="form-control textbox"
                                id="nama" name="nama" placeholder="Masukan Nama Nasabah" value="<?php if($data['bank']) echo $data['bank']['nama_nas']; ?>">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning" ></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="col-lg-2 col-md-3 col-sm-4 col-xs-5 btn btn-primary m-2">Simpan</button>
                    <a href="<?= BASEURL; ?>/bank/" class="col-lg-2 col-md-3 col-sm-4 col-xs-5 btn btn-danger m-2">
                        Batal
                    </a>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
