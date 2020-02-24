<section class="content-header">
    <h1>
        Chart
        <!-- <small>Control Panel</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-pie-chart"></i></a></li>
        <li class="active">Chart</li>
    </ol>
</section>
<?php $data = json_decode($chart);
// print_r($data->total);
?>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Statistik Data</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>

                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <?php
    for ($i = 0; $i < $totalSTO; $i++) { ?>
        <?php
        if ($i % 2 == 1) { ?>
            <div class="row">

            <?php } ?>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $data->namaSTO[$i] ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="<?= $i ?>" style="height:250px"></canvas>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <?php
            if ($i % 2 == 1) { ?>
            </div>

        <?php } ?>
    <?php  } ?>
    </div>

    <script>
        var chart = JSON.parse('<?php echo $chart ?>');
        var n;
        var m;

        var config = new Array();
        for(n=0;n<chart.totalSTO;n++){
            // console.log(chart.total[n]);
            // console.log(chart.grand_total[n]);
            config[n] = {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [
                            chart.total[n],
                            chart.grand_total[n],
                        ],
                        backgroundColor: [
                            'rgba(81, 244, 40, 0.95)',
                            'rgba(40, 183, 244, 0.95)',
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Rekap ODP',
                        'Rekap Validasi',
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: false,
                        text: 'Chart.js Doughnut Chart'
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            };


        }

        var ctx = new Array();
        window.onload = function() {
            for (m = 0; m < chart.totalSTO; m++) {
                ctx[m] = document.getElementById(m).getContext('2d');
                // ctx[1] = document.getElementById(1).getContext('2d');
                window.myDoughnut = new Chart(ctx[m], config[m]);
                // window.myDoughnut = new Chart(ctx[1], config[2]);
            }


        };
    </script>
</section>