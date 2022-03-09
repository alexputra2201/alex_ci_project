<div class="container-fuild">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Update Data Accessories
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $acc['id']; ?>">
                        <div class="form-floating mb-3">

                            <input type="text" name="nama" value="<?= $acc['nama']; ?>" class="form-control" id="nama" placeholder="Nama acc">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="merk" value="<?= $acc['merk']; ?>" class="form-control" id="merk" placeholder="merk">
                            <?= form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="merk">Merk</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="stok" value="<?= $acc['stok']; ?>" class="form-control" id="stok" placeholder="stok">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="stok">Stok</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="harga" value="<?= $acc['harga']; ?>" class="form-control" id="harga" placeholder="Harga">
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="harga">Harga</label>
                        </div>

                        <div class="form-floating mb-3">
                            <img src="<?= base_url('assets/img/Acc/') . $acc['gambar']; ?>" style="width: 100px" class="img-thumbnail">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar">
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea type="text" name="description" cols="30" rows="10" class="form-control" id="description" placeholder="Description">
                            <?= $acc['description']; ?></textarea>
                            <?= form_error('description', '<small class="textarea-danger pl-3">', '</small>'); ?>
                            <label for="harga">Description</label>

                        </div>

                        <a href="<?= base_url('Acc') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Update Accessories</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>