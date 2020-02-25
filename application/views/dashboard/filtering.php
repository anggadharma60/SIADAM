<style>
    .input-group-addon {
        width: ;
    }

    .showHideColumn {
        cursor: pointer;
        color: blue;
    }
</style>



<section class="content-header">
    <h1>
        Filtering </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-filter"></i></a></li>
        <li class="active">Filtering</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Filtering</h3>
            <div class="pull-right">
                <a onclick="Custom()" href="#!" class="btn btn-danger btn-flat">
                    Show / Hide
                </a>
                <a href="<?= site_url('Admin/exportValidasi') ?>" class="btn btn-danger btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>


            </div>
        </div>
        <!-- Date range -->
        <div class="form-group" style="width: 50%; margin-left: 20px;">
            <label>Date range:</label>
            <div class="row">
                <div class="input-daterange">
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="start_date" id="start_date" class="form-control pull-right" readonly="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="end_date" id="end_date" class="form-control pull-right" readonly="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
                </div>
            </div>
        </div>
        <!-- <div style="padding:5px; padding-left:0px">
            <a class="showHideColumn" data-columnindex="0">ID</a> -
            <a class="showHideColumn" data-columnindex="1">TANGGAL PELURUSAN</a> -
            <a class="showHideColumn" data-columnindex="2">ONDESK</a> -
            <a class="showHideColumn" data-columnindex="3">ONSITE</a> -
            <a class="showHideColumn" data-columnindex="4">NAMA ODP</a> -
            <a class="showHideColumn" data-columnindex="5">NOTE</a> -
            <a class="showHideColumn" data-columnindex="6">QR ODP</a> -
            <a class="showHideColumn" data-columnindex="7">KOORDINAT ODP</a> -
            <a class="showHideColumn" data-columnindex="8">NAMA OLT (IP OLT)</a> -
            <a class="showHideColumn" data-columnindex="9">PORT OLT</a> -
            <a class="showHideColumn" data-columnindex="10">TOTAL IN ODP</a> -
            <a class="showHideColumn" data-columnindex="11">KAPASITAS ODP</a> -
            <a class="showHideColumn" data-columnindex="12">PORT OUT SPLITTER</a> -
            <a class="showHideColumn" data-columnindex="13">QR OUT SPLITTER</a> -
            <a class="showHideColumn" data-columnindex="14">PORT</a> -
            <a class="showHideColumn" data-columnindex="15">STATUS</a> -
            <a class="showHideColumn" data-columnindex="16">ONU</a> -
            <a class="showHideColumn" data-columnindex="17">SN</a> -
            <a class="showHideColumn" data-columnindex="18">SERVICE</a> -
            <a class="showHideColumn" data-columnindex="19">QR DROPCORE</a> -
            <a class="showHideColumn" data-columnindex="20">NOTE URUT DROPCORE</a> -
            <a class="showHideColumn" data-columnindex="21">FLAG OLT & PORT</a> -
            <a class="showHideColumn" data-columnindex="22">CONNECTIVITY ODP TO OLT</a> -
            <a class="showHideColumn" data-columnindex="23">ODP - ONT</a> -
            <a class="showHideColumn" data-columnindex="24">RFS</a> -
            <a class="showHideColumn" data-columnindex="25">NOTE</a> -
            <a class="showHideColumn" data-columnindex="26">TANGGAL UPDATE UIM</a> -
            <a class="showHideColumn" data-columnindex="27">UPDATER UIM</a> -
            <a class="showHideColumn" data-columnindex="28">QR ODP</a> -
            <a class="showHideColumn" data-columnindex="29">QR OUT SPLITTER</a> -
            <a class="showHideColumn" data-columnindex="30">QR DROPCORE</a> -
            <a class="showHideColumn" data-columnindex="31">UPDATER DAVA</a>
        </div> -->
        <div class="box-body table-responsive">
            <!-- id="table1" buat searching pagination dan row -->
            <table class="table table-bordered table-striped" border="1" cellpadding="8" id="tableFilter">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TANGGAL PELURUSAN</th>
                        <th>ONDESK</th>
                        <th>ONSITE</th>
                        <th>NAMA ODP</th>
                        <th>NOTE</th>
                        <th>QR ODP</th>
                        <th>KOORDINAT ODP</th>
                        <th>NAMA OLT (IP OLT)</th>
                        <th>PORT OLT</th>
                        <th>TOTAL IN ODP</th>
                        <th>KAPASITAS ODP</th>
                        <th>PORT OUT SPLITTER</th>
                        <th>QR OUT SPLITTER</th>
                        <th>PORT</th>
                        <th>STATUS</th>
                        <th>ONU</th>
                        <th>SN</th>
                        <th>SERVICE</th>
                        <th>QR DROPCORE</th>
                        <th>NOTE URUT DROPCORE</th>
                        <th>FLAG OLT & PORT</th>
                        <th>CONNECTIVITY ODP TO OLT</th>
                        <th>ODP - ONT</th>
                        <th>RFS</th>
                        <th>NOTE</th>
                        <th>TANGGAL UPDATE UIM</th>
                        <th>UPDATER UIM</th>
                        <th>QR ODP</th>
                        <th>QR OUT SPLITTER</th>
                        <th>QR DROPCORE</th>
                        <th>UPDATER DAVA</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>TANGGAL PELURUSAN</th>
                        <th>ONDESK</th>
                        <th>ONSITE</th>
                        <th>NAMA ODP</th>
                        <th>NOTE</th>
                        <th>QR ODP</th>
                        <th>KOORDINAT ODP</th>
                        <th>NAMA OLT (IP OLT)</th>
                        <th>PORT OLT</th>
                        <th>TOTAL IN ODP</th>
                        <th>KAPASITAS ODP</th>
                        <th>PORT OUT SPLITTER</th>
                        <th>QR OUT SPLITTER</th>
                        <th>PORT</th>
                        <th>STATUS</th>
                        <th>ONU</th>
                        <th>SN</th>
                        <th>SERVICE</th>
                        <th>QR DROPCORE</th>
                        <th>NOTE URUT DROPCORE</th>
                        <th>FLAG OLT & PORT</th>
                        <th>CONNECTIVITY ODP TO OLT</th>
                        <th>ODP - ONT</th>
                        <th>RFS</th>
                        <th>NOTE</th>
                        <th>TANGGAL UPDATE UIM</th>
                        <th>UPDATER UIM</th>
                        <th>QR ODP</th>
                        <th>QR OUT SPLITTER</th>
                        <th>QR DROPCORE</th>
                        <th>UPDATER DAVA</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenter">Find Your Data</h5>
            </div>
            <!-- <div class="modal-body">
                <label>
                    <input type="checkbox" class="minimal-red" id="checkall" checked>
                </label>
                <label>
                    SELECT ALL / DESELECT ALL
                </label>
            </div> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Amija</p>

                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='0'
                            class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="2" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            ONDESK
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='1' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="3" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            ONSITE
                        </label>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <p>UIM Non-Connectivity</p>
                            <label>
<<<<<<< HEAD
                                <input type="checkbox" name='hide_columns[]' value='2' class="minimal-red">
=======
                                <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="23" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                            </label>
                            <label>
                                ODP - ONT
                            </label>
                            <br>
                            <label>
<<<<<<< HEAD
                                <input type="checkbox" name='hide_columns[]' value='3' class="minimal-red">
=======
                                <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="24" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                            </label>
                            <label>
                                RFS
                            </label>
                            <br>
                            <label>
<<<<<<< HEAD
                                <input type="checkbox" name='hide_columns[]' value='4' class="minimal-red">
=======
                                <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="25" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                            </label>
                            <label>
                                NOTE
                            </label>
                            <br>
                            <label>
<<<<<<< HEAD
                                <input type="checkbox" name='hide_columns[]' value='5' class="minimal-red">
=======
                                <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="26" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                            </label>
                            <label>
                                TANGGAL UPDATE UIM
                            </label>
                            <br>
                            <label>
<<<<<<< HEAD
                                <input type="checkbox" name='hide_columns[]' value='6' class="minimal-red">
=======
                                <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="27" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                            </label>
                            <label>
                                UPDATER UIM
                            </label>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p>ODP</p>
                        </div>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='7' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="4" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            NAMA ODP
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='8' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="5" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            NOTE
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='9' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="6" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            QR ODP
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='10' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="7" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            KOORDINAT ODP
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='11' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="10" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            TOTAL IN ODP
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='12' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="11" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            KAPASITAS ODP
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='13' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="14" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            PORT
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='14' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="15" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            STATUS
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='15' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="16" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            ONU
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='16' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="17" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            SN
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='17' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="18" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            SERVICE
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='18' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="19" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            QR DROPCORE
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='19' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="20" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            NO URUT DROPCORE
                        </label>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <p>OLT</p>
                        </div>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='20' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="8" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            NAMA OLT (IP OLT)
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='21' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="9" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            PORT OLT
                        </label>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p>Out Splitter</p>
                        </div>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='22' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="12" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            PORT OUT SPLITTER
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='23' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="13" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            QR OUT SPLITTER
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='24' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="21" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            FLAG OLT & PORT
                        </label>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p>UIM Connectivity</p>
                        </div>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='25' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="22" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            CONNECTIVITY ODP TO OLT
                        </label>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p>Update Dava</p>
                        </div>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='26' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="28" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            QR ODP
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='27' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="29" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            QR OUT SPLITTER
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='28' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="30" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            QR DROPCORE
                        </label>
                        <br>
                        <label>
<<<<<<< HEAD
                            <input type="checkbox" name='hide_columns[]' value='29' class="minimal-red">
=======
                            <input type="checkbox" class="minimal-red showHideColumn" data-columnindex="31" checked>
>>>>>>> ad9163f93b2c7dbb40c3ec32ee33d1e9a78920a7
                        </label>
                        <label>
                            UPDATER DAVA
                        </label>
                    </div>
                </div>

                <!-- Minimal red style -->
            </div>


            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-custom" class="btn btn-danger" style="width: 80px" href="#">Find</a>
            </div>
        </div>
    </div>
</div>

<script>
    function Custom(url) {
        $('#btn-custom').attr('href', url);
        $('#customModal').modal();
    }
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

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

        $('#datepicker').datepicker({
            autoclose: true
        })

    })
</script>

