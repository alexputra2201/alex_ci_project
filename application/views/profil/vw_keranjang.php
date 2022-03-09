<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <img src="<?= base_url('assets/img/barang/') . $barang['gambar']; ?>" style="width:400px" class="img-thumbnail">
                        </div>
                        <div class="col mr-2">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                                    <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
                                    <input type="hidden" name="stok" value="<?= $barang['stok'] ?>">
                                    <div class="form-floating mb-3">
                                        <input name="nama" type="text" value="<?= $barang['nama']; ?>" readonly class="form-control" id="nama">
                                        <label for="nama">Nama Barang</label>
                                    </div>
                                    <div class="form-floating mb-3">

                                        <input name="merk" value="<?= $barang['merk']; ?>" type="text" readonly class="form-control" id="merk">
                                        <label for="merk">Merk</label>
                                    </div>
                                    <div class="form-floating mb-3">

                                        <input name="stok" value="<?= $barang['stok']; ?>" type="text" readonly class="form-control" id="pengarang">
                                        <label for="stok">Stok</label>
                                    </div>
                                    <div class="form-floating mb-3">

                                        <input name="harga" value="<?= $barang['harga']; ?>" type="text" readonly class="form-control" id="harga">
                                        <label for="harga">Harga</label>
                                    </div>
                                    <div class="form-floating mb-3">

                                        <input type="number" name="jumlah" id="jumlah" class="form-control" min='1'>
                                        <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label for="jumlah">Jumlah</label>
                                    </div>
                                    <div class="form-floating mb-3">

                                        <input type="text" name="total" id="total" readonly class="form-control">
                                        <label for="total">Total Harga</label>
                                    </div>
                                    <button type="submit" id="tambah" name="tambah" class="btn btn-primary float-right">Tambah Ke Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>