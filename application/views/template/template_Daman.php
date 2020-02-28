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
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!--  chart -->
  <!-- <script src="<?= base_url() ?>chart.js/Chart.min.js"></script> -->
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/all.css">
  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatables/lib/css/dataTables.bootstrap.min.css') ?>" />
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
  <!-- <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.js"></script> -->

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
    canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
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
      <a href="<?= base_url('Daman') ?>" class="logo">
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
                    <a href="<?= site_url('Daman/editProfile') ?>" class="btn btn-default btn-flat">Profile</a>
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
          <li class="active treeview">
            <a href="<?= site_url('dashboard') ?>">
              <i class="fa fa-bar-chart"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" >
              <li><a href="<?= site_url('Daman/filtering') ?>"><i class="fa fa-filter fa-fw mr-3"></i> Filtering</a></li>
              <li><a href="<?= site_url('Daman/chart') ?>"><i class="fa fa-pie-chart fa-fw mr-3"></i> Chart</a></li>
            </ul>
          </li>
          
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
  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatables/lib/css/dataTables.bootstrap.min.css') ?>">
  <!-- date-range-picker -->
  <script src="<?= base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!--  chart -->
  <script src="<?= base_url() ?>chart.js/Chart.bundle.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
 

  <script>
    var tabel = null;

    $(document).ready(function() {

      tabel = $('#table1').DataTable({});

    });
  </script>
  <script>
    var tabel = null;

    $(document).ready(function() {

      tabel = $('#tableValidasi').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [
          [0, 'asc']
        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        "processing": true,
        "serverSide": true,
        "columnDefs": [{
            "width": "5px",
            "targets": 0
          },
          {
            "width": "150px",
            "targets": 1
          },
          {
            "width": "30px",
            "targets": 2
          },
          {
            "width": "150px",
            "targets": 3
          },
          {
            "width": "110px",
            "targets": 4
          },
          {
            "width": "100px",
            "targets": 5
          },
          {
            "width": "100px",
            "targets": 6
          },
          {
            "width": "100px",
            "targets": 7
          },
          {
            "width": "130px",
            "targets": 8
          },
          {
            "width": "70px",
            "targets": 9
          },
          {
            "width": "100px",
            "targets": 10
          },
          {
            "width": "110px",
            "targets": 11
          },
          {
            "width": "130px",
            "targets": 12
          },
          {
            "width": "120px",
            "targets": 13
          },
          {
            "width": "35px",
            "targets": 14
          },
          {
            "width": "80px",
            "targets": 15
          },
          {
            "width": "35px",
            "targets": 16
          },
          {
            "width": "90px",
            "targets": 17
          },
          {
            "width": "100px",
            "targets": 18
          },
          {
            "width": "100px",
            "targets": 19
          },
          {
            "width": "160px",
            "targets": 20
          },
          {
            "width": "120px",
            "targets": 21
          },
          {
            "width": "185px",
            "targets": 22
          },
          {
            "width": "75px",
            "targets": 23
          },
          {
            "width": "45px",
            "targets": 24
          },
          {
            "width": "170px",
            "targets": 25
          },
          {
            "width": "150px",
            "targets": 26
          },
          {
            "width": "120px",
            "targets": 27
          },
          {
            "width": "80px",
            "targets": 28
          },
          {
            "width": "130px",
            "targets": 29
          },
          {
            "width": "100px",
            "targets": 30
          },
          {
            "width": "120px",
            "targets": 31
          }
        ],
        "sScrollY": "35em", //scroll tambahan y
        "sScrollX": "100%", //scroll tambahan x
        "bScrollCollapse": true,
        "ajax": {
          "url": "<?= base_url() ?>index.php/Daman/loadDataValidasi", // URL file untuk proses select datanya
          "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [
          [10, 25, 50, 75, 100],
          [10, 25, 50, 75, 100]
        ], // Combobox Limit
        "columns": [{
            "data": 'id'
          },
          {
            "data": 'tanggalPelurusan'
          },
          {
            "data": 'ondesk'
          },
          {
            "data": 'onsite'
          },
          {
            "data": 'namaODP'
          },
          {
            "data": 'noteODP'
          },
          {
            "data": 'QRODP'
          },
          {
            "data": 'koordinatODP'
          },
          {
            "data": 'hostname'
          },
          {
            "data": 'portOLT'
          },
          {
            "data": 'totalIN'
          },
          {
            "data": 'kapasitasODP'
          },
          {
            "data": 'portOutSplitter'
          },
          {
            "data": 'QRPortOutSplitter'
          },
          {
            "data": 'portODP'
          },
          {
            "data": 'statusPortODP'
          },
          {
            "data": 'ONU'
          },
          {
            "data": 'serialNumber'
          },
          {
            "data": 'serviceNumber'
          },
          {
            "data": 'QRDropCore'
          },
          {
            "data": 'noteUrut'
          },
          {
            "data": 'flagOLTPort'
          },
          {
            "data": 'ODPtoOLT'
          },
          {
            "data": 'ODPtoONT'
          },
          {
            "data": 'RFS'
          },
          {
            "data": 'noteHDDaman'
          },
          {
            "data": 'updateDateUIM'
          },
          {
            "data": 'updaterUIM'
          },
          {
            "data": 'noteQRODP'
          },
          {
            "data": 'noteQROutSplitter'
          },
          {
            "data": 'noteQRDropCore'
          },
          {
            "data": 'updaterDava'
          },
          {
            "render": function(data, type, row) { // Tampilkan kolom aksi
              var html = "<div class='text-center'>" +
                "<a href='<?= site_url() ?>Daman/editValidasi/" + row.id + "' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a> " +
                " <a href='<?= site_url() ?>Daman/deleteValidasi/" + row.id + "' onclick='return confirm(\"Anda yakin?\");' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a> " +
                "</div>";

              return html
            }
          },
        ],
      });
    });
  </script>

  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
      var tabelFilter = $('#tableFilter').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [
          [0, 'asc']
        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        "processing": true,
        "serverSide": true,
        "sScrollY": "35em", //scroll tambahan y
        "sScrollX": "100%", //scroll tambahan x
        "bScrollCollapse": true,
        "columnDefs": [{
            "width": "5px",
            "targets": 0
          },
          {
            "width": "150px",
            "targets": 1
          },
          {
            "width": "30px",
            "targets": 2
          },
          {
            "width": "150px",
            "targets": 3
          },
          {
            "width": "110px",
            "targets": 4
          },
          {
            "width": "100px",
            "targets": 5
          },
          {
            "width": "100px",
            "targets": 6
          },
          {
            "width": "100px",
            "targets": 7
          },
          {
            "width": "130px",
            "targets": 8
          },
          {
            "width": "70px",
            "targets": 9
          },
          {
            "width": "100px",
            "targets": 10
          },
          {
            "width": "110px",
            "targets": 11
          },
          {
            "width": "130px",
            "targets": 12
          },
          {
            "width": "120px",
            "targets": 13
          },
          {
            "width": "35px",
            "targets": 14
          },
          {
            "width": "80px",
            "targets": 15
          },
          {
            "width": "35px",
            "targets": 16
          },
          {
            "width": "90px",
            "targets": 17
          },
          {
            "width": "100px",
            "targets": 18
          },
          {
            "width": "100px",
            "targets": 19
          },
          {
            "width": "160px",
            "targets": 20
          },
          {
            "width": "120px",
            "targets": 21
          },
          {
            "width": "185px",
            "targets": 22
          },
          {
            "width": "75px",
            "targets": 23
          },
          {
            "width": "45px",
            "targets": 24
          },
          {
            "width": "170px",
            "targets": 25
          },
          {
            "width": "150px",
            "targets": 26
          },
          {
            "width": "120px",
            "targets": 27
          },
          {
            "width": "80px",
            "targets": 28
          },
          {
            "width": "130px",
            "targets": 29
          },
          {
            "width": "100px",
            "targets": 30
          },
          {
            "width": "120px",
            "targets": 31
          }
        ],
        "ajax": {
          "url": "<?= base_url() ?>index.php/Daman/loadDataValidasi", // URL file untuk proses select datanya
          "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [
          [10, 25, 50, 75, 100],
          [10, 25, 50, 75, 100]
        ], // Combobox Limit
        "columns": [{
            "data": 'id'
          },
          {
            "data": 'tanggalPelurusan'
          },
          {
            "data": 'ondesk'
          },
          {
            "data": 'onsite'
          },
          {
            "data": 'namaODP'
          },
          {
            "data": 'noteODP'
          },
          {
            "data": 'QRODP'
          },
          {
            "data": 'koordinatODP'
          },
          {
            "data": 'hostname'
          },
          {
            "data": 'portOLT'
          },
          {
            "data": 'totalIN'
          },
          {
            "data": 'kapasitasODP'
          },
          {
            "data": 'portOutSplitter'
          },
          {
            "data": 'QRPortOutSplitter'
          },
          {
            "data": 'portODP'
          },
          {
            "data": 'statusPortODP'
          },
          {
            "data": 'ONU'
          },
          {
            "data": 'serialNumber'
          },
          {
            "data": 'serviceNumber'
          },
          {
            "data": 'QRDropCore'
          },
          {
            "data": 'noteUrut'
          },
          {
            "data": 'flagOLTPort'
          },
          {
            "data": 'ODPtoOLT'
          },
          {
            "data": 'ODPtoONT'
          },
          {
            "data": 'RFS'
          },
          {
            "data": 'noteHDDaman'
          },
          {
            "data": 'updateDateUIM'
          },
          {
            "data": 'updaterUIM'
          },
          {
            "data": 'noteQRODP'
          },
          {
            "data": 'noteQROutSplitter'
          },
          {
            "data": 'noteQRDropCore'
          },
          {
            "data": 'updaterDava'
          },
        ],
      });

    $('.showHideColumn').on('click', function() {
        var tableColumn = tabel.column($(this).attr('data-columnindex'));
        tableColumn.visible(!tableColumn.visible());
    });

    $("#but_checkall").click(function() {
      $.each($('input[type="checkbox"]:not(:checked)').prop('checked', true));
      
      $.each($('input[type="checkbox"]:not(:disabled)').prop('checked', false));
    });
    
    //Tambahan
    $('#but_showhide').click(function(){
     var checked_arr = [];var unchecked_arr = [];

     // Read all checked checkboxes
     $.each($('input[type="checkbox"]:checked'), function (key, value) {
        checked_arr.push(this.value);
     });

     // Read all unchecked checkboxes
     $.each($('input[type="checkbox"]:not(:checked)'), function (key, value) {
        unchecked_arr.push(this.value);
     });

     // Hide the checked columns
     tabelFilter.columns(checked_arr).visible(true);

     // Show the unchecked columns
     tabelFilter.columns(unchecked_arr).visible(false);
  });

    

      $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
      });
      
      $('#search').click(function() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        if (start_date != '' && end_date != '') {
          $('#tableFilter').DataTable().destroy();

          $('#tableFilter').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [
              [0, 'asc']
            ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            "processing": true,
            "serverSide": true,
            "sScrollY": "35em", //scroll tambahan y
            "sScrollX": "100%", //scroll tambahan x
            "bScrollCollapse": true,
            "columnDefs": [{
              "width": "5px",
              "targets": 0
              },
              {
                "width": "150px",
                "targets": 1
              },
              {
                "width": "30px",
                "targets": 2
              },
              {
                "width": "150px",
                "targets": 3
              },
              {
                "width": "110px",
                "targets": 4
              },
              {
                "width": "100px",
                "targets": 5
              },
              {
                "width": "100px",
                "targets": 6
              },
              {
                "width": "100px",
                "targets": 7
              },
              {
                "width": "130px",
                "targets": 8
              },
              {
                "width": "70px",
                "targets": 9
              },
              {
                "width": "100px",
                "targets": 10
              },
              {
                "width": "110px",
                "targets": 11
              },
              {
                "width": "130px",
                "targets": 12
              },
              {
                "width": "120px",
                "targets": 13
              },
              {
                "width": "35px",
                "targets": 14
              },
              {
                "width": "80px",
                "targets": 15
              },
              {
                "width": "35px",
                "targets": 16
              },
              {
                "width": "90px",
                "targets": 17
              },
              {
                "width": "100px",
                "targets": 18
              },
              {
                "width": "100px",
                "targets": 19
              },
              {
                "width": "160px",
                "targets": 20
              },
              {
                "width": "120px",
                "targets": 21
              },
              {
                "width": "185px",
                "targets": 22
              },
              {
                "width": "75px",
                "targets": 23
              },
              {
                "width": "45px",
                "targets": 24
              },
              {
                "width": "170px",
                "targets": 25
              },
              {
                "width": "150px",
                "targets": 26
              },
              {
                "width": "120px",
                "targets": 27
              },
              {
                "width": "80px",
                "targets": 28
              },
              {
                "width": "130px",
                "targets": 29
              },
              {
                "width": "100px",
                "targets": 30
              },
              {
                "width": "120px",
                "targets": 31
              }
            ],  
            "ajax": {
              "url": "<?= base_url() ?>index.php/Daman/filterDate", // URL file untuk proses select datanya
              "type": "POST",
              data: {
                start_date: start_date,
                end_date: end_date
              },
            },
            "deferRender": true,
            "aLengthMenu": [
              [10, 25, 50, 75, 100],
              [10, 25, 50, 75, 100]
            ], // Combobox Limit
            "columns": [{
                "data": 'id'
              },
              {
                "data": 'tanggalPelurusan'
              },
              {
                "data": 'ondesk'
              },
              {
                "data": 'onsite'
              },
              {
                "data": 'namaODP'
              },
              {
                "data": 'noteODP'
              },
              {
                "data": 'QRODP'
              },
              {
                "data": 'koordinatODP'
              },
              {
                "data": 'hostname'
              },
              {
                "data": 'portOLT'
              },
              {
                "data": 'totalIN'
              },
              {
                "data": 'kapasitasODP'
              },
              {
                "data": 'portOutSplitter'
              },
              {
                "data": 'QRPortOutSplitter'
              },
              {
                "data": 'portODP'
              },
              {
                "data": 'statusPortODP'
              },
              {
                "data": 'ONU'
              },
              {
                "data": 'serialNumber'
              },
              {
                "data": 'serviceNumber'
              },
              {
                "data": 'QRDropCore'
              },
              {
                "data": 'noteUrut'
              },
              {
                "data": 'flagOLTPort'
              },
              {
                "data": 'ODPtoOLT'
              },
              {
                "data": 'ODPtoONT'
              },
              {
                "data": 'RFS'
              },
              {
                "data": 'noteHDDaman'
              },
              {
                "data": 'updateDateUIM'
              },
              {
                "data": 'updaterUIM'
              },
              {
                "data": 'noteQRODP'
              },
              {
                "data": 'noteQROutSplitter'
              },
              {
                "data": 'noteQRDropCore'
              },
              {
                "data": 'updaterDava'
              },
            ],
          })

          // fetch_data('yes', start_date, end_date);
        } else {
          alert("Both Date is Required");
        }
      });

    });
  </script>

  <script>
    var tabel = null;

    $(document).ready(function() {

      tabel = $('#tableODP').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [
          [0, 'asc']
        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        "processing": true,
        "serverSide": true,
        "sScrollY": "35em", //scroll tambahan y
        "sScrollX": "100%", //scroll tambahan x
        "bScrollCollapse": true,
        "ajax": {
          "url": "<?= base_url() ?>index.php/Daman/loadDataODP", // URL file untuk proses select datanya
          "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [
          [10, 25, 50, 75, 100],
          [10, 25, 50, 75, 100]
        ], // Combobox Limit
        "columns": [{
            "data": 'idODP'
          },
          {
            "data": 'idNOSS'
          },
          {
            "data": 'indexODP'
          },
          {
            "data": 'namaODP'
          },
          {
            "data": 'ftp'
          },
          {
            "data": 'latitude'
          },
          {
            "data": 'longitude'
          },
          {
            "data": 'clusterName'
          },
          {
            "data": 'clusterStatus'
          },
          {
            "data": 'avai'
          },
          {
            "data": 'used'
          },
          {
            "data": 'rsv'
          },
          {
            "data": 'rsk'
          },
          {
            "data": 'total'
          },
          {
            "data": 'namaRegional'
          },
          {
            "data": 'namaWitel'
          },
          {
            "data": 'namaDatel'
          },
          {
            "data": 'namaSTO'
          },
          {
            "data": 'infoODP'
          },
          {
            "data": 'updateDate'
          },
          {
            "render": function(data, type, row) { // Tampilkan kolom aksi
              var html = "<div class='text-center'>" +
                "<a href='<?= site_url() ?>Daman/editODP/" + row.idODP + "' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a> " +
                " <a href='<?= site_url() ?>Daman/deleteODP/" + row.idODP + "' onclick='return confirm(\"Anda yakin?\");' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a> " +
                "</div>";

              return html
            }
          },
        ],
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $("#load").fadeOut(500); //jika document html sudah siap maka fungsi ini akan dijalankan 500

      $("#loading").addClass('overlay');
      $("#loading").html('<i class="fa fa-spinnner fa-spin"></i>');
      setTimeout(RemoveClass, 100); // 100
    });

    function RemoveClass() {
      $("#loading").RemoveClass('overlay');
      $("#loading").fadeOut();
    }
  </script>
  
</body>

</html>