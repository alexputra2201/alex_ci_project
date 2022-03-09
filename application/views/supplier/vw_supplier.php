<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <?= $this->session->flashdata('message'); ?>
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        </div>
        <div class="float-right">
            <a href="<?= base_url('Supplier/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Supplier
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
                            <td>Nama Barang</td>
                            <td>Jumlah</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($supplier as $bk) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $bk['nama']; ?></td>
                                <td><?= $bk['nama_barang']; ?></td>
                                <td><?= $bk['jumlah']; ?></td>
                                <td>
                                    <a href="<?= base_url("supplier/delete/") . $bk['id']; ?>" class="badge bg-warning"> Hapus</a>
                                    <a href="<?= base_url("supplier/edit/") . $bk['id']; ?>" class="badge bg-success"> Edit</a>
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
