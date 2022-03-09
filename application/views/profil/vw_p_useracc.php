<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message');
            ?>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($acc as $us) : ?>
                <div class="card" style="width: 15rem;">
                    <img src="<?= base_url('assets/img/Acc/') . $us['gambar']; ?>" class="card-img-top" style="width:200px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $us['nama'] ?></h5>
                        <p class="card-text">Rp.<?= $us['harga'] ?></p>
                        <div>Stok <a class="badge bg-info"><?= $us['stok'] ?></a></div>
                        <a href="<?= base_url('Profil/keranjang/') . $us['id'] ?>" class="badge bg-warning">Beli</a>
                    </div>
                </div>
        <?php endforeach ?>
    </div>
</div>