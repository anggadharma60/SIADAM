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
        <h3 class="box-title">Tambah OLT</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getOLT')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors() ?>
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('hostname') ? 'has-error' : null ?>">
                        <label>HOSTNAME *</label>
                        <input type="text" name="hostname" value="<?=set_value('hostname')?>" class="form-control"> 
                        <?=form_error('hostname')?>
                    </div>
                    <div class="form-group <?=form_error('ipOLT') ? 'has-error' : null ?>">
                        <label>IP GPON *</label>
                        <input type="text" name="ipOLT" value="<?=set_value('ipOLT')?>" class="form-control">
                        <?=form_error('ipOLT')?>
                    </div>
                    <div class="form-group <?=form_error('idLogicalDevice') ? 'has-error' : null ?>">
                        <label>ID Logical Device *</label>
                        <input type="text" name="idLogicalDevice" value="<?=set_value('idOidLogicalDeviceLT')?>" class="form-control"> 
                        <?=form_error('idLogicalDevice')?>
                    </div>
                    <div class="form-group <?=form_error('idSTO') ? 'has-error' : null ?>">
                        <label>ID STO *</label>
                        <input type="text" name="idSTO" value="<?=set_value('idSTO')?>" class="form-control">
                        <?=form_error('idSTO')?>
                    </div>
                    <div class="form-group <?=form_error('idSpecOLT') ? 'has-error' : null ?>">
                        <label>ID Specification OLT *</label>
                        <input type="text" name="idSpecOLT" value="<?=set_value('idSpecOLT')?>" class="form-control"> 
                        <?=form_error('idSpecOLT')?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                </form>
             </div>
         </div>
      </div>
  </div>

</section>