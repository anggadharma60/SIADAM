<section class="content-header">
    <h1>
        Validasi
        <small>Edit Data Validasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Validasi</li>
    </ol>
</section>
<?php
$dataOndesk = json_decode($ondesk);
$dataOnsite = json_decode($onsite);
$dataEdit = json_decode($edit);


//  $post = $this->input->post(null, TRUE);
// 			print_r($post);
?>
<!-- Main content -->
<section class="content" id="legend">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Validasi</h3>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                    <a href="<?= site_url('Admin/viewListValidasi') ?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                    <a href="<?= site_url('Ondesk/viewListValidasi') ?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                    <a href="<?= site_url('HDDaman/viewListValidasi') ?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php  } ?>
                <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                    <a href="<?= site_url('SDI/viewListValidasi') ?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                    <a href="<?= site_url('Dava/viewListValidasi') ?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php } ?>
            </div>
        </div>
        <!--end box header  -->
        <div class="box-body table-responsive">
            <form id="validasi" method="post" action="">
                <!-- Input ODP -->
                <div class="col-md-12">
                    <fieldset>
                        <legend>Input Data</legend>
                        <div class="col-md-3">
                            <div class="form-group <?= form_error('tanggalPelurusan') ? 'has-error' : null ?>">
                                <label>Tanggal Pelurusan *</label>
                                <div class="input-group input-daterange">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="tanggalPelurusan" id="tanggalPelurusan" class="form-control pull-right" value="<?= $dataEdit->tanggalPelurusan ?>" readonly="" />
                                </div>
                                <?= form_error('tanggalPelurusan') ?>
                            </div>
                        </div>

                        <div class="row"></div>
                        <div class="col-md-4">
                            <div class="form-group <?= form_error('ondesk') ? 'has-error' : null ?>">
                                <label>Ondesk *</label>
                                <input type="text" id="ondesk" name="ondesk" value="<?= $dataEdit->ondesk ?>" class="form-control" readonly="" style="text-align:center;">
                                <?= form_error('ondesk') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= form_error('onsite') ? 'has-error' : null ?>">
                                <label>Onsite *</label>
                                <input type="text" id="onsite" name="onsite" value="<?= $dataEdit->onsite ?>" class="form-control" style="width: 100%;color:black;">
                                <?= form_error('onsite') ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- End Input ODP -->

                <!-- Input Data ODP -->
                <div class="col-md-8">
                    <fieldset>
                        <legend>Data ODP</legend>
                        <div class="col-md-4">
                            <div class="form-group <?= form_error('namaODP') ? 'has-error' : null ?>">
                                <label>Nama ODP *</label>
                                <select id="namaODP" name="namaODP" class="form-control select2" placeholder="Select ODP" style="width: 100%;color:black;">

                                    <option value="<?= $dataEdit->namaODP ?>"><?= $dataEdit->namaODP ?>
                                    </option>

                                </select>
                                <?= form_error('namaODP') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= form_error('QRODP') ? 'has-error' : null ?>">
                                <label>QR ODP</label>
                                <input type="text" name="QRODP" value="<?= $dataEdit->QRODP ?>" class="form-control">
                                <?= form_error('QRODP') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group <?= form_error('koordinatODP') ? 'has-error' : null ?>">
                                <label>Koordinat</label>
                                <input type="text" name="koordinatODP" value="<?= $dataEdit->koordinatODP ?>" class="form-control">
                                <?= form_error('koordinatODP') ?>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-md-6">
                            <div class="form-group <?= form_error('noteODP') ? 'has-error' : null ?>">
                                <label>Note ODP</label>
                                <textarea style="resize:none" name="noteODP" class="form-control" rows="3"><?= $dataEdit->noteODP ?></textarea>
                                <?= form_error('noteODP') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group <?= form_error('noteQRODP') ? 'has-error' : null ?>">
                                <label>Note QR ODP</label>
                                <textarea style="resize:none" name="noteQRODP" class="form-control" rows="3"><?= $dataEdit->noteQRODP ?></textarea>
                                <?= form_error('noteQRODP') ?>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-md-3">
                            <div class="form-group <?= form_error('totalIN') ? 'has-error' : null ?>">
                                <label>Total IN </label>
                                <input type="text" name="totalIN" value="<?= $dataEdit->totalIN ?>" class="form-control">
                                <?= form_error('totalIN') ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group <?= form_error('kapasitasODP') ? 'has-error' : null ?>">
                                <label>Kapasitas</label>
                                <input id="txtNoOfRec" type="text" name="kapasitasODP" value="<?= $dataEdit->kapasitasODP ?>" class="form-control">
                                <?= form_error('kapasitasODP') ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                <input class="btn btn-primary btn-flat" type="button" value="GENERATE" id="btnNoOfRec" style="margin-top:5px;height:33px;width:100%;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                <button class="btn btn-success btn-flat" id="btn-add" type="submit" style="margin-top:5px;height:33px;width:100%;">
                                    <i class=""></i> Edit
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <!-- End Input Data ODP -->

                <!-- Input Data OLT -->
                <div class="col-md-4">
                    <fieldset>
                        <legend>Data OLT</legend>
                        <div class="col-md-8">
                            <div class="form-group <?= form_error('namaOLT') ? 'has-error' : null ?>">
                                <label>Nama OLT *</label>

                                <select id="namaOLT" name="namaOLT" class="form-control select2" data-placeholder="Select OLT" style="width: 100%;color:black;">

                                    <option value="<?= $dataEdit->hostname ?>"><?= $dataEdit->hostname ?>
                                    </option>

                                </select>
                                <?= form_error('namaOLT') ?>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-md-8">
                            <div class="form-group <?= form_error('portOLT') ? 'has-error' : null ?>">
                                <label>Port OLT *</label>
                                <input type="text" name="portOLT" value="<?= $dataEdit->portOLT ?>" class="form-control">
                                <?= form_error('portOLT') ?>
                            </div>
                        </div>
                    </fieldset>

                </div>
                <!-- End Input Data OLT -->

                <!-- Data validasi -->
                <div class="col-md-12">
                    <fieldset>
                        <legend>Data Validasi</legend>
                    </fieldset>
                    <div id="AddControll">

                    </div>
                </div>
                <!-- End Data validasi -->


            </form>

        </div>
        <!-- end box body  -->


    </div>
    <!-- end box -->


</section>

<script>
    $
</script>