<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <?= $this->session->flashdata('message'); ?>
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Barang
            </a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Merk</td>
                            <td>Stok</td>
                            <td>Harga</td>
                            <td>Gambar</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang as $bk) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $bk['nama']; ?></td>
                                <td><?= $bk['merk']; ?></td>
                                <td><?= $bk['stok']; ?></td>
                                <td>Rp.<?= $bk['harga']; ?></td>
                                <td><img src="<?= base_url('assets/img/Barang/') . $bk['gambar']; ?>" style="width:100px" class="img-thumbnail"></td>
                                <td>
                                    <a href="<?= base_url("barang/delete/") . $bk['id_barang']; ?>" class="badge bg-warning"> Hapus</a>
                                    <a href="<?= base_url("barang/edit/") . $bk['id_barang']; ?>" class="badge bg-success"> Edit</a>
                                    <a href="<?= base_url("barang/detail/") . $bk['id_barang']; ?>" class="badge bg-primary"> Detail</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
