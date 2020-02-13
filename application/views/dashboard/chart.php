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

<!-- Main content -->
<section class="content">

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Donut Chart</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
        <canvas id="pieChart" style="height:250px"></canvas>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </div>
    


</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if (count($graph) > 0) {
                    foreach ($graph as $data) {
                        echo "'" . $data->provinsi . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Penduduk',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo $data->jumlah . ", ";
                        }
                    }
                    ?>
                ]
            }]
        },
    });
</script>