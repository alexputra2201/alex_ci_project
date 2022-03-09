<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Jumlah Laptop</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('Barang') ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-300"><?= $barang ?></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Jumlah Supplier</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('Supplier') ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-300"><?= $supplier ?></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Penjualan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('Penjualan') ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-300"><?= $penjualan ?></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Jumlah User</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('User') ?>">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-300"><?= $us ?></div>
                </div>
            </div>
        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="chart-body">

        </div>
    </div>
    <div class="row">
        <div class="card shadow mb-4">
            <div class="chart-body">
                <div class="chart-bar">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>