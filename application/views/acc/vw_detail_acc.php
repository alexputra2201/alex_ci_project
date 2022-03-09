<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-center">
                    Detail Barang
                </div>
            </div>
            <table class="card-body">
                <h2 class="card-title"><?= $acc['nama']; ?></h2>
        </div>

        <div class="row ">
            <div class="col-md-1">Nama</div>
            <div class="col-md-1">:</div>
            <div class="col-md-3"><?= $acc['nama']; ?></div>
        </div>

        <div class="row">
            <div class="col-md-1">Merk</div>
            <div class="col-md-1">:</div>
            <div class="col-md-3"><?= $acc['merk']; ?></div>
        </div>

        <div class="row">
            <div class="col-md-1">Harga</div>
            <div class="col-md-1">:</div>
            <div class="col-md-3"><?= $acc['harga']; ?>
            
        </div>
        <div class="row">
            <div class="col-md-1">Gambar</div>
            <div class="col-md-1">:</div>
            <div class="col-md-3"><img src="<?= base_url('assets/img/acc/') . $acc['gambar']; ?>" style="width: 100px" class="img-thumbnail"></div>
        </div>
        <div class="row">
            <div class="col-md-1">Description</div>
            <div class="col-md-1">:</div>
            <div class="col-md-3"><?= $acc['description']; ?>
            
        </div>
    </div>
    <div class="card-footer justify-content-center">
        <a href="<?= base_url('Acc') ?>" class="btn btn-danger">Tutup</a>
    </div>
</div>