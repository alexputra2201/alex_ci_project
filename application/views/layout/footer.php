</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>js/datatables-simple-demo.js"></script>

<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
    $(document).ready(function() {
        $("#jumlah").on('keydown keyup change blur', function() {
            var harga = $("#harga").val();
            var jumlah = $("#jumlah").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
            if (parseInt($('input[name="stok"]').val()) <= parseInt(jumlah)) {
                alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="stok"]').val()))
                reset()
            }
        });

        function reset() {
            $('input[name="jumlah"]').val('')
            $('input[name="total"]').val('')
        }
    });
</script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                foreach ($totalb as $data) {
                    echo "'" . $data['barang'] . "',";
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Laptop Terjual',
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: [
                    <?php
                    foreach ($totalb as $data) {
                        echo $data['jum'] . ", ";
                    }
                    ?>
                ]
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'barang'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 20
                    },
                    maxBarThickness: 50,
                }],
                yAxes: [{
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "#dddfeb",
                borderwidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColor: false,
                caretPadding: 10,
            },
        }
    });
</script>
</body>

</html>