<div class="container-fuild px-4">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Accessories
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            
                            <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama Barang">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            
                            <input type="text" name="merk" value="<?= set_value('merk'); ?>" class="form-control" id="merk" placeholder="merk">
                            <?= form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="merk">Merk</label>
                        </div>

                        <div class="form-floating mb-3">
                            
                            <input type="text" name="stok" value="<?= set_value('stok'); ?>" class="form-control" id="stok" placeholder="stok">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="stok">Stok</label>
                        </div>

                        <div class="form-floating mb-3">
                            
                            <input type="text" name="harga" value="<?= set_value('harga'); ?>" class="form-control" id="harga" placeholder="Harga">
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="harga">Harga</label>
                        </div>                 
                        <div class="form-floating mb-3">
                            <label for="Gambar"></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                <label for="gambar" class="custom-file-label"></label>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            
                            <textarea type="text" name="description" cols="30" rows="10" value="<?= set_value('description'); ?>" class="form-control" id="description" placeholder="Description">
                            </textarea>
                            <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="description">Description</label>
                        </div>

                        <a href="<?= base_url('Acc') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="Tambah" class="btn btn-primary float-right">Tambah Accessories</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>