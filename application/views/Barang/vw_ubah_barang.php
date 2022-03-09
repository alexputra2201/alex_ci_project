<div class="container-fuild">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Update Data Barang
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                        <div class="form-floating mb-3">

                            <input type="text" name="nama" value="<?= $barang['nama']; ?>" class="form-control" id="nama" placeholder="Nama barang">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="merk" value="<?= $barang['merk']; ?>" class="form-control" id="merk" placeholder="merk">
                            <?= form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="merk">Merk</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="stok" value="<?= $barang['stok']; ?>" class="form-control" id="stok" placeholder="stok">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="stok">Stok</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="harga" value="<?= $barang['harga']; ?>" class="form-control" id="harga" placeholder="Harga">
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="harga">Harga</label>
                        </div>

                        <div class="form-floating mb-3">
                            <img src="<?= base_url('assets/img/barang/') . $barang['gambar']; ?>" style="width: 100px" class="img-thumbnail">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar">
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea type="text" name="description" cols="30" rows="10" class="form-control" id="description" placeholder="Description">
                            <?= $barang['description']; ?></textarea>
                            <?= form_error('description', '<small class="textarea-danger pl-3">', '</small>'); ?>
                            <label for="harga">Description</label>

                        </div>

                        <a href="<?= base_url('Barang') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Update barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>