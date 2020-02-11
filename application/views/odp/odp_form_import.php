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
            <a href="<?=site_url('Admin/getODP')?>" class="btn btn-danger btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors() ?>
                <form > 
                   <form action="<?=site_url('Admin/importODP')?>" method="post" id="import_form" enctype="multipart/form-data">
                      <p><label>Select Excel File</label>
                      <input type="file" name="fileODP" id="fileODP" required accept=".csv, .xls, .xlsx"></p>
                      <p>Unggah file dengan tipe *.xls / .csv</p>
                      <input type="submit" name="import" value="Import" class="btn btn-success">
                    </form>
                </form>
             </div>
         </div>
      </div>
  </div>

</section>

