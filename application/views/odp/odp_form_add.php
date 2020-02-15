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
            <a href="<?=site_url('Admin/getODP')?>" class="btn btn-danger btn-flat">
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
                    <div class="form-group <?=form_error('namaODP') ? 'has-error' : null ?>">
                        <label>Nama ODP *</label>
                        <input type="text" name="namaODP" value="<?=set_value('namaODP')?>" class="form-control"> 
                        <?=form_error('namaODP')?>
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
                        <label>Cluster Name </label>
                        <input type="text" name="clusterName" value="<?=set_value('clusterName')?>" class="form-control"> 
                        <?=form_error('clusterName')?>
                    </div>
                    <div class="form-group <?=form_error('clusterStatus') ? 'has-error' : null ?>">
                        <label>Cluster Status </label>
                        <input type="text" name="clusterStatus" value="<?=set_value('clusterStatus')?>" class="form-control">
                        <?=form_error('clusterStatus')?>
                    </div>
                    <div class="form-group <?=form_error('avai') ? 'has-error' : null ?>">
                        <label>Available *</label>
                        <input type="number" min="0" name="avai" value="<?=set_value('avai')?>" class="form-control"> 
                        <?=form_error('avai')?>
                    </div>
                    <div class="form-group <?=form_error('used') ? 'has-error' : null ?>">
                        <label>Used *</label>
                        <input type="number" min="0" name="used" value="<?=set_value('used')?>" class="form-control">
                        <?=form_error('used')?>
                    </div>
                    <div class="form-group <?=form_error('rsv') ? 'has-error' : null ?>">
                        <label>RSV *</label>
                        <input type="number" min="0" name="rsv" value="<?=set_value('rsv')?>" class="form-control"> 
                        <?=form_error('rsv')?>
                    </div>
                    <div class="form-group <?=form_error('rsk') ? 'has-error' : null ?>">
                        <label>RSK *</label>
                        <input type="number" min="0" name="rsk" value="<?=set_value('rsk')?>" class="form-control">
                        <?=form_error('rsk')?>
                    </div>
                    <div class="form-group <?=form_error('STO') ? 'has-error' : null ?>">
                        <label>STO *</label>
                        <select name="STO" class="form-control">
                            <option value="" selected="selected">- Pilih STO -</option>
                            <?php foreach($row->result() as $key => $STO) {?>
                                <option value="<?=$STO->idSTO?>" <?=set_value('STO') == $STO->idSTO ? "selected" : null?>><?=$STO->namaSTO?>
                              </option>
                            <?php }?>
                        </select>
                        <?=form_error('STO')?>
                    </div>
                    <div class="form-group <?=form_error('infoODP') ? 'has-error' : null ?>">
                        <label>Info ODP</label>
                        <textarea style="resize:none" name="infoODP" class="form-control" rows="3" ><?=set_value('keterangan')?></textarea>
                        <?=form_error('infoODP')?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">
                            <i class=""></i> Tambah
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                </form>
             </div>
         </div>
      </div>
  </div>
</section>