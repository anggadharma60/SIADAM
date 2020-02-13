<section class="content-header">
  <h1>
    OLT
    <small>Data OLT</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">OLT</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">IMPORT OLT</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getOLT')?>" class="btn btn-danger btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php if(form_error('fileURL')) {?>    
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <?php print form_error('fileURL'); ?>
                  </div>       
                <?php } ?>
               
                   <form action="<?=site_url('Admin/importOLT')?>" method="post" id="excel-upl" enctype="multipart/form-data">
                      <p><label>Select Excel File</label>
                      <input type="file" name="fileURL" id="validatedCustomFile" required accept=".csv, .xls, .xlsx"></p>
                      <p>Unggah file dengan tipe *.xls / .csv</p>
                      <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
                    </form>
             </div>   
         </div>

      </div>
  </div>

</section>

