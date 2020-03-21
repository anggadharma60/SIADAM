<style>
    .input-group-addon {
        width: ;
    }
</style>


<section class="content-header">
    <h1>
        Filtering </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-filter"></i></a></li>
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
                <a onclick="Custom()" class="btn btn-success btn-flat">
                    Show/Hide
                </a>
                <?php if($this->fungsi->user_login()->status == 'Admin') { ?>
                <a href="<?= site_url('Admin/exportValidasi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>
                <?php } ?>
                <?php if($this->fungsi->user_login()->status == 'Ondesk') { ?>
                <a href="<?= site_url('Ondesk/exportValidasi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>
                <?php } ?>
                <?php if($this->fungsi->user_login()->status == 'HD Daman') { ?>
                <a href="<?= site_url('HDDaman/exportValidasi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>
                <?php } ?>
                <?php if($this->fungsi->user_login()->status == 'Daman') { ?>
                <a href="<?= site_url('HDDaman/exportValidasi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>
                <?php } ?>
                <?php if($this->fungsi->user_login()->status == 'SDI') { ?>
                <a href="<?= site_url('SDI/exportValidasi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>
                <?php } ?>
                <?php if($this->fungsi->user_login()->status == 'Dava') { ?>
                <a href="<?= site_url('Dava/exportValidasi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>
                <?php } ?>
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
                    <input type="button" name="search" id="search" value="Search" class="btn btn-danger" />
                </div>
            </div>
            <!-- <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="reservation">
            </div> -->
            <!-- /.input group -->
        </div>
        <!-- customm -->
        <!-- <div class="form-group" style="margin-left: 20px;">
            <div class="input-group">
                <div class="pull-right">
                    <a onclick="Custom()" href="#!" class="btn btn-danger btn-flat">
                        CUSTOM
                    </a>
                </div>
            </div> -->
        <!-- /.input group -->
        <!-- </div> -->
        <!-- /.form group -->
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
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Amija</p>

                        <label>
                            <input type="checkbox" name='hide_columns[]' value='2' class="minimal-red">
                        </label>
                        <label>
                            ONDESK
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='3' class="minimal-red">
                        </label>
                        <label>
                            ONSITE
                        </label>
                    </div>

                    <div class="col-md-6">
                        <div>
                            <p>UIM Non-Connectivity</p>
                            <label>
                                <input type="checkbox" name='hide_columns[]' value='23' class="minimal-red">
                            </label>
                            <label>
                                ODP - ONT
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name='hide_columns[]' value='24' class="minimal-red">
                            </label>
                            <label>
                                RFS
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name='hide_columns[]' value='25' class="minimal-red">
                            </label>
                            <label>
                                NOTE
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name='hide_columns[]' value='26' class="minimal-red">
                            </label>
                            <label>
                                TANGGAL UPDATE UIM
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" name='hide_columns[]' value='27' class="minimal-red">
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
                            <input type="checkbox" name='hide_columns[]' value='4' class="minimal-red" checked disabled>
                        </label>
                        <label>
                            NAMA ODP
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='5' class="minimal-red">
                        </label>
                        <label>
                            NOTE
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='6' class="minimal-red">
                        </label>
                        <label>
                            QR ODP
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='7' class="minimal-red">
                        </label>
                        <label>
                            KOORDINAT ODP
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='10' class="minimal-red">
                        </label>
                        <label>
                            TOTAL IN ODP
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='11' class="minimal-red">
                        </label>
                        <label>
                            KAPASITAS ODP
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='14' class="minimal-red" checked disabled>
                        </label>
                        <label>
                            PORT
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='15' class="minimal-red" checked disabled>
                        </label>
                        <label>
                            STATUS
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='16' class="minimal-red">
                        </label>
                        <label>
                            ONU
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='17' class="minimal-red">
                        </label>
                        <label>
                            SN
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='18' class="minimal-red">
                        </label>
                        <label>
                            SERVICE
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='19' class="minimal-red">
                        </label>
                        <label>
                            QR DROPCORE
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='20' class="minimal-red">
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
                            <input type="checkbox" name='hide_columns[]' value='8' class="minimal-red" checked disabled>
                        </label>
                        <label>
                            NAMA OLT (IP OLT)
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='9' class="minimal-red">
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
                            <input type="checkbox" name='hide_columns[]' value='12' class="minimal-red" checked disabled>
                        </label>
                        <label>
                            PORT OUT SPLITTER
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='13' class="minimal-red" checked disabled>
                        </label>
                        <label>
                            QR OUT SPLITTER
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='21' class="minimal-red">
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
                            <input type="checkbox" name='hide_columns[]' value='22' class="minimal-red" checked disabled>
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
                            <input type="checkbox" name='hide_columns[]' value='28' class="minimal-red">
                        </label>
                        <label>
                            QR ODP
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='29' class="minimal-red">
                        </label>
                        <label>
                            QR OUT SPLITTER
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='30' class="minimal-red">
                        </label>
                        <label>
                            QR DROPCORE
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name='hide_columns[]' value='31' class="minimal-red">
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
                <a id="but_checkall" class="btn btn-success" style="width: 100px">Check All</a>
                <a id="but_showhide" class="btn btn-danger" style="width: 80px">Find</a>
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

        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red'
        })
    })
</script>