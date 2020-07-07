<section class="content-header">
  <h1>
    ODP
    <small>Data ODP</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">ODP</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">IMPORT ODP</h3>
      <div class="pull-right">
        <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
          <a href="<?= site_url('Admin/viewListODP') ?>" class="btn btn-danger btn-flat">
            <i class="fa fa-undo"></i> Back
          </a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
          <a href="<?= site_url('Ondesk/viewListODP') ?>" class="btn btn-danger btn-flat">
            <i class="fa fa-undo"></i> Back
          </a>
        <?php } ?>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <?php if (form_error('fileURL')) { ?>
            <!-- <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php print form_error('fileURL'); ?>
            </div> -->
          <?php } ?>
          <form action="<?= site_url('Admin/importODP') ?>" method="post" id="excel-upl" enctype="multipart/form-data">
            <p><label>Select Excel File</label>
              <br>
              <a href="<?php echo base_url() . 'excel/SampleODP.xlsx' ?>" class="float-right btn-flat btn-xs btn-info">Download Format Data</a></br>
              <p></p>
              <div class="form-group <?= form_error('fileURL') ? 'has-error' : null ?>">
              <input type="file" name="fileURL" id="validatedCustomFile" required accept=".csv, .xls, .xlsx">
              <?= form_error('fileURL')?>
              </div>
            <p>Unggah file dengan tipe *.Xlsx / .Csv</p>
            <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</section>