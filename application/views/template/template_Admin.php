<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIADAM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Data Tables -->
  
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatables/lib/css/dataTables.bootstrap.min.css') ?>"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/skin-blue-light.css">
  <!-- icon -->
  <link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('assets/img/') . 'siadampng.png' ?>">
  <!-- css admin ltw -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@2.4.1/dist/css/AdminLTE.min.css">
  <!-- cdn bootstraps -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  
  
  
  <style>
    #load {
      width: 100%;
      height: 100%;
      position: fixed;
      text-indent: 100%;
      background: #e0e0e0 url('./assets/dist/img/loadingg.gif') no-repeat center;
      z-index: 1;
      opacity: 0.6;
      background-size: 8%;
    }

    #loading {
      width: 100%;
      height: 100%;
      position: fixed;
      text-indent: 100%;
      background: #e0e0e0 url('./assets/dist/img/loadingg.gif') no-repeat center;
      z-index: 1;
      opacity: 0.6;
      background-size: 8%;
    }
  </style>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600i,700i&display=swap" rel="stylesheet">

</head>

<body class="hold-transition skin-blue-light sidebar-mini">
  <div id="load">loading...</div>
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('Admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <img src="<?= base_url() ?>assets/dist/img/50x50.png" class="user-image" alt="User Image">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SIADAM</b>Witel</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">

              <ul class="dropdown-menu">

                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <div class="progress xs">
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/dist/img/siadampng.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/dist/img/siadampng.png" class="img-circle" alt="User Image">

                  <p>
                    <?= $this->fungsi->user_login()->namaPegawai ?>
                    <small><?= $this->fungsi->user_login()->status ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= site_url('Autentikasi/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"></li>
          <li class="treeview">
            <a href="<?= site_url('dashboard') ?>">
              <i class="fa fa-bar-chart"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('Admin/filtering') ?>"><i class="fa fa-filter fa-fw mr-3"></i> Filtering</a></li>
              <li><a href="<?= site_url('Admin/chart') ?>"><i class="fa fa-pie-chart fa-fw mr-3"></i> Chart</a></li>
            </ul>
          </li>
          <li>
            <a href="<?= site_url('Admin/getKelValidasi') ?>">
              <i class="fa fa-cog"></i> <span>Kelola Data Validasi</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-tasks"></i>
              <span>Validasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-user-o fa-fw mr-3"></i> Validasi SDI</a></li>
              <li><a href="#"><i class="fa fa-user fa-fw mr-3"></i> Validasi HD Daman</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-microchip"></i>
              <span>Kelola Data ODP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('Admin/viewListODP') ?>"><i class="fa fa-cube fa-fw mr-3"></i> Data ODP</a></li>
              <li><a href="#"><i class="fa fa-sitemap fa-fw mr-3"></i> Data Port ODP</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-database"></i>
              <span>Kelola Data OLT</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('Admin/getOLT') ?>"><i class="fa fa-clone fa-fw mr-3"></i> Data OLT</a></li>
              <li><a href="#"><i class="fa fa-codepen fa-fw mr-3"></i> Data Port Out Splitter</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-archive"></i>
              <span>Kelola Data Pendukung</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('Admin/getRegional') ?>"><i class="fa fa-flag fa-fw mr-3"></i> Regional</a></li>
              <li><a href="<?= site_url('Admin/getWitel') ?>"><i class="fa fa-map-marker fa-fw mr-3"></i> Witel</a></li>
              <li><a href="<?= site_url('Admin/getDatel') ?>"><i class="fa fa-tag fa-fw mr-3"></i> Datel</a></li>
              <li><a href="<?= site_url('Admin/getSTO') ?>"><i class="fa fa-location-arrow fa-fw mr-3"></i> STO</a></li>
              <li><a href="<?= site_url('Admin/getSpecOLT') ?>"><i class="fa fa-wrench fa-fw mr-3"></i> Specification OLT</a></li>
            </ul>
          </li>
          <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
            <li class="header">SETTNGS</li>
            <li <?= $this->uri->segment(1) == 'Admin/getPegawai' ? 'class="active"' : '' ?>>
              <a href="<?= site_url('Admin/getPegawai') ?>">
                <i class="fa fa-user-plus"></i> <span>Kelola Data Pegawai</span>
                <span class="pull-right-container"></span>
              </a>
            </li>
          <?php  } ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php echo $contents ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2020 <a href="https://www.telkom.co.id/">Telkom Witel Semarang</a>.</strong> All rights
      reserved.
    </footer>
    <div id="loading" class="overlay">
      <i class="fa fa-spinnner fa-spin"></i>
    </div>

  </div>

  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?= base_url() ?>assets//bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url() ?>assets//bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<<<<<<< HEAD
  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>
=======
  
		<script type="text/javascript" src="<?php echo base_url('datatables/datatables.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>
		
  <script>
		var tabel = null;

		$(document).ready(function() {
		    tabel = $('#tableODP').DataTable({
		        "processing": true,
		        "serverSide": true,
		        "ordering": true, // Set true agar bisa di sorting
		        "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            "processing": true,
            "serverSide": true,
            // "sScrollY": "35em",//scroll tambahan y
            "sScrollX": "100%",//scroll tambahan x
            "bScrollCollapse": true,
		        "ajax":
		        {
		            "url": "<?=base_url()?>index.php/Admin/loadDataODP", // URL file untuk proses select datanya
		            "type": "POST"
		        },
		        "deferRender": true,
		        "aLengthMenu": [[10, 25, 50, 75, 100],[10, 25, 50, 75, 100]], // Combobox Limit
		        "columns": [
					{ "data" : 'idODP' },
					{ "data": 'idNOSS' },
					{ "data": 'indexODP' },
					{ "data": 'namaODP' },
					{ "data": 'ftp' },
					{ "data": 'latitude' },
					{ "data": 'longitude' },
					{ "data": 'clusterName' },
					{ "data": 'clusterStatus' },
					{ "data": 'avai' },
					{ "data": 'used' },
					{ "data": 'rsv' },
					{ "data": 'rsk' },
					{ "data": 'total' },
					{ "data": 'namaRegional' },
					{ "data": 'namaWitel' },
					{ "data": 'namaDatel' },
					{ "data": 'namaSTO' },
					{ "data": 'infoODP' },
					{ "data": 'updateDate' },
		            { "render": function ( data, type, row ) { // Tampilkan kolom aksi
		                    var html  = "<button href=''>EDIT</button> | "
							html += "<button href=''>DELETE</button>|"
							html += "<button href=''>DETAIL</button>"
>>>>>>> a8a20deca4317a0e22649de6a5beb6786acf0285

		                    return html
		                }
		            },
		        ],
		    });
        // $(window).bind('resize', function () {
        //   table.draw();
        // });
		});
		</script>
  <script>
    $(document).ready(function() {
     
        $('#table2').DataTable({
          responsive: true,
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        "processing": true,
        "serverSide": true,
        "sScrollY": "35em",
        "sScrollX": "100%",
        "bScrollCollapse": true, 
        
        "ajax": {
          "url":"<?=base_url()?>index.php/Admin/loadDataODP",
        "type": "POST"
        },
        "columns": [
          { "data" : 'idODP' },
          { "data": 'idNOSS' },
          { "data": 'indexODP' },
          { "data": 'namaODP' },
          { "data": 'ftp' },
          { "data": 'latitude' },
          { "data": 'longitude' },
          { "data": 'clusterName' },
          { "data": 'clusterStatus' },
          { "data": 'avai' },
          { "data": 'used' },
          { "data": 'rsv' },
          { "data": 'rsk' },
          { "data": 'total' },
          // { "data": 'namaRegional' },
          // { "data": 'namaWitel' },
          // { "data": 'namaDatel' },
          // { "data": 'namaSTO' },
          { "data": 'infoODP' },
          { "data": 'updateDate' }
        ]
      });
      $(window).bind('resize', function () {
      table.draw();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#load").fadeOut(5); //jika document html sudah siap maka fungsi ini akan dijalankan 500

      $("#loading").addClass('overlay');
      $("#loading").html('<i class="fa fa-spinnner fa-spin"></i>');
      setTimeout(RemoveClass, 1); // 100
    });

    function RemoveClass() {
      $("#loading").RemoveClass('overlay');
      $("#loading").fadeOut();
    }
  </script>

  <script>
    $(document).ready(function() {

      load_data();

      function load_data() {
        $.ajax({
          url: "<?php echo base_url(); ?>excel_import/fetch",
          method: "POST",
          success: function(data) {
            $('#customer_data').html(data);
          }
        })
      }

      $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "<?php echo base_url(); ?>excel_import/import",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $('#file').val('');
            load_data();
            alert(data);
          }
        })
      });

    });

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart = new Chart(pieChartCanvas)
    var PieData = [{
        value: 700,
        color: '#f56954',
        highlight: '#f56954',
        label: 'Chrome'
      },
      {
        value: 500,
        color: '#00a65a',
        highlight: '#00a65a',
        label: 'IE'
      },
      {
        value: 400,
        color: '#f39c12',
        highlight: '#f39c12',
        label: 'FireFox'
      },
      {
        value: 600,
        color: '#00c0ef',
        highlight: '#00c0ef',
        label: 'Safari'
      },
      {
        value: 300,
        color: '#3c8dbc',
        highlight: '#3c8dbc',
        label: 'Opera'
      },
      {
        value: 100,
        color: '#d2d6de',
        highlight: '#d2d6de',
        label: 'Navigator'
      }
    ]
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
  </script>
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

</body>

</html>