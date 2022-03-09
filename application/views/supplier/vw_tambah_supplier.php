<div class="container-fuild px-4">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Supplier
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            
                            <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama Barang">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            
                            <input type="text" name="nama_barang" value="<?= set_value(''); ?>" class="form-control" id="nama_barang" placeholder="nama_barang">
                            <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nama_barang">Nama Barang</label>
                        </div>

                        <div class="form-floating mb-3">
                            
                            <input type="text" name="jumlah" value="<?= set_value('jumlah'); ?>" class="form-control" id="jumlah" placeholder="jumlah">
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="jumlah">Jumlah</label>
                        </div>

                        <a href="<?= base_url('Supplier') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="Tambah" class="btn btn-primary float-right">Tambah Supplier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>