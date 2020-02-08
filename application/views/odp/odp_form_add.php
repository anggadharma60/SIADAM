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
        <h3 class="box-title">Tambah ODP</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getODP')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors() ?>
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('idNOSS') ? 'has-error' : null ?>">
                        <label>ID NOSS *</label>
                        <input type="text" name="idNOSS" value="<?=set_value('idNOSS')?>" class="form-control"> 
                        <?=form_error('idNOSS')?>
                    </div>
                    <div class="form-group <?=form_error('indexODP') ? 'has-error' : null ?>">
                        <label>Index ODP *</label>
                        <input type="text" name="indexODP" value="<?=set_value('indexODP')?>" class="form-control">
                        <?=form_error('indexODP')?>
                    </div>
                    <div class="form-group <?=form_error('idODP') ? 'has-error' : null ?>">
                        <label>ID ODP *</label>
                        <input type="text" name="idODP" value="<?=set_value('idODP')?>" class="form-control"> 
                        <?=form_error('idODP')?>
                    </div>
                    <div class="form-group <?=form_error('ftp') ? 'has-error' : null ?>">
                        <label>FTP *</label>
                        <input type="text" name="ftp" value="<?=set_value('ftp')?>" class="form-control">
                        <?=form_error('ftp')?>
                    </div>
                    <div class="form-group <?=form_error('latitude') ? 'has-error' : null ?>">
                        <label>Latitude *</label>
                        <input type="text" name="latitude" value="<?=set_value('latitude')?>" class="form-control"> 
                        <?=form_error('latitude')?>
                    </div>
                    <div class="form-group <?=form_error('longitude') ? 'has-error' : null ?>">
                        <label>Longitude *</label>
                        <input type="text" name="longitude" value="<?=set_value('longitude')?>" class="form-control">
                        <?=form_error('longitude')?>
                    </div>
                    <div class="form-group <?=form_error('clusterName') ? 'has-error' : null ?>">
                        <label>Cluster Name *</label>
                        <input type="text" name="clusterName" value="<?=set_value('clusterName')?>" class="form-control"> 
                        <?=form_error('clusterName')?>
                    </div>
                    <div class="form-group <?=form_error('clusterStatus') ? 'has-error' : null ?>">
                        <label>Cluster Status *</label>
                        <input type="text" name="clusterStatus" value="<?=set_value('clusterStatus')?>" class="form-control">
                        <?=form_error('clusterStatus')?>
                    </div>
                    <div class="form-group <?=form_error('avai') ? 'has-error' : null ?>">
                        <label>Available *</label>
                        <input type="text" name="avai" value="<?=set_value('avai')?>" class="form-control"> 
                        <?=form_error('avai')?>
                    </div>
                    <div class="form-group <?=form_error('used') ? 'has-error' : null ?>">
                        <label>Used *</label>
                        <input type="text" name="used" value="<?=set_value('used')?>" class="form-control">
                        <?=form_error('used')?>
                    </div>
                    <div class="form-group <?=form_error('rsv') ? 'has-error' : null ?>">
                        <label>RSV *</label>
                        <input type="text" name="rsv" value="<?=set_value('rsv')?>" class="form-control"> 
                        <?=form_error('rsv')?>
                    </div>
                    <div class="form-group <?=form_error('rsk') ? 'has-error' : null ?>">
                        <label>RSK *</label>
                        <input type="text" name="rsk" value="<?=set_value('rsk')?>" class="form-control">
                        <?=form_error('rsk')?>
                    </div>
                    <div class="form-group <?=form_error('total') ? 'has-error' : null ?>">
                        <label>Total *</label>
                        <input type="text" name="total" value="<?=set_value('total')?>" class="form-control"> 
                        <?=form_error('total')?>
                    </div>
                    <div class="form-group <?=form_error('idRegional') ? 'has-error' : null ?>">
                        <label>ID Regional *</label>
                        <input type="text" name="idRegional" value="<?=set_value('idRegional')?>" class="form-control">
                        <?=form_error('idRegional')?>
                    </div>
                    <div class="form-group <?=form_error('idWitel') ? 'has-error' : null ?>">
                        <label>ID Witel *</label>
                        <input type="text" name="idWitel" value="<?=set_value('idWitel')?>" class="form-control"> 
                        <?=form_error('idWitel')?>
                    </div>
                    <div class="form-group <?=form_error('idDatel') ? 'has-error' : null ?>">
                        <label>ID Datel *</label>
                        <input type="text" name="idDatel" value="<?=set_value('idDatel')?>" class="form-control">
                        <?=form_error('idDatel')?>
                    </div>
                    <div class="form-group <?=form_error('idSTO') ? 'has-error' : null ?>">
                        <label>ID STO *</label>
                        <input type="text" name="idSTO" value="<?=set_value('idSTO')?>" class="form-control"> 
                        <?=form_error('idSTO')?>
                    </div>
                    <div class="form-group <?=form_error('infoODP') ? 'has-error' : null ?>">
                        <label>Info ODP *</label>
                        <input type="text" name="infoODP" value="<?=set_value('infoODP')?>" class="form-control">
                        <?=form_error('infoODP')?>
                    </div>
                    <div class="form-group <?=form_error('updateDate') ? 'has-error' : null ?>">
                        <label>Update Date *</label>
                        <input type="text" name="updateDate" value="<?=set_value('updateDate')?>" class="form-control">
                        <?=form_error('updateDate')?>
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