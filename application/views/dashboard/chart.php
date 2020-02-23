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

    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Donut Chart</h3>
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
    <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Donut Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="1" style="height:250px"></canvas>
                </div>
            <!-- /.box-body -->
            </div>
             <!-- /.box -->
        </div>

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Donut Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="chart-area2" style="height:250px"></canvas>
                </div>
            <!-- /.box-body -->
            </div>
             <!-- /.box -->
        </div>
    </div>
    

   
    
    

    <script>

		var doughnutData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}

			];

			window.onload = function(){
                var i;
                for(i=1;i<=2;i++){
                    console.log(i);
                    var ctx = push(document.getElementById(i).getContext("2d"));
                    console.log(ctx);
                    window.myDoughnut = new Chart(ctx[i]).Doughnut(doughnutData, {responsive : true});

                }
                
                // var ctx2 = document.getElementById("chart-area2").getContext("2d");
                // window.myDoughnut = new Chart(ctx2).Doughnut(doughnutData, {responsive : true});
			};



	</script>
</section>

