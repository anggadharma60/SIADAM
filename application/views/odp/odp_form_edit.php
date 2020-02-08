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
        <h3 class="box-title">Edit ODP</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getODP')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('idNOSS') ? 'has-error' : null?>">
                        <label>ID NOSS *</label>
                        <input type="hidden" name="idNOSS" value="<?=$row->idNOSS?>">
                        <input type="text" name="idNOSS" value="<?=$this->input->post('idNOSS') ?? $row->idNOSS?>" class="form-control" disabled> 
                        <?=form_error('idNOSS')?>
                    </div>
                    <div class="form-group <?=form_error('indexODP') ? 'has-error' : null?>">
                        <label>Index ODP *</label>
                        <input type="text" name="indexODP" value="<?=$this->input->post('indexODP') ?? $row->indexODP?>" class="form-control">
                        <?=form_error('indexODP')?>
                    </div>
                    <div class="form-group <?=form_error('idODP') ? 'has-error' : null?>">
                        <label>ID ODP *</label>
                        <input type="text" name="idODP" value="<?=$this->input->post('idODP') ?? $row->idODP?>" class="form-control">
                        <?=form_error('idODP')?>
                    </div>
                    <div class="form-group <?=form_error('ftp') ? 'has-error' : null?>">
                        <label>FTP *</label>
                        <input type="text" name="ftp" value="<?=$this->input->post('ftp') ?? $row->ftp?>" class="form-control">
                        <?=form_error('ftp')?>
                    </div>
                    <div class="form-group <?=form_error('latitude') ? 'has-error' : null?>">
                        <label>Latitude *</label>
                        <input type="text" name="latitude" value="<?=$this->input->post('latitude') ?? $row->latitude?>" class="form-control">
                        <?=form_error('latitude')?>
                    </div>
                    <div class="form-group <?=form_error('longitude') ? 'has-error' : null?>">
                        <label>Longitude *</label>
                        <input type="text" name="longitude" value="<?=$this->input->post('longitude') ?? $row->longitude?>" class="form-control">
                        <?=form_error('longitude')?>
                    </div>
                    <div class="form-group <?=form_error('clusterName') ? 'has-error' : null?>">
                        <label>Cluster Name *</label>
                        <input type="text" name="clusterName" value="<?=$this->input->post('clusterName') ?? $row->clusterName?>" class="form-control">
                        <?=form_error('clusterName')?>
                    </div>
                    <div class="form-group <?=form_error('clusterStatus') ? 'has-error' : null?>">
                        <label>Cluster Status *</label>
                        <input type="text" name="clusterStatus" value="<?=$this->input->post('clusterStatus') ?? $row->clusterStatus?>" class="form-control">
                        <?=form_error('clusterStatus')?>
                    </div>
                    <div class="form-group <?=form_error('avai') ? 'has-error' : null?>">
                        <label>Available *</label>
                        <input type="text" name="avai" value="<?=$this->input->post('avai') ?? $row->avai?>" class="form-control">
                        <?=form_error('avai')?>
                    </div>
                    <div class="form-group <?=form_error('used') ? 'has-error' : null?>">
                        <label>Used *</label>
                        <input type="text" name="used" value="<?=$this->input->post('used') ?? $row->used?>" class="form-control">
                        <?=form_error('used')?>
                    </div>
                    <div class="form-group <?=form_error('rsv') ? 'has-error' : null?>">
                        <label>RSV *</label>
                        <input type="text" name="rsv" value="<?=$this->input->post('rsv') ?? $row->rsv?>" class="form-control">
                        <?=form_error('rsv')?>
                    </div>
                    <div class="form-group <?=form_error('rsk') ? 'has-error' : null?>">
                        <label>RSK *</label>
                        <input type="text" name="rsk" value="<?=$this->input->post('rsk') ?? $row->rsk?>" class="form-control">
                        <?=form_error('rsk')?>
                    </div>
                    <div class="form-group <?=form_error('total') ? 'has-error' : null?>">
                        <label>Total *</label>
                        <input type="text" name="total" value="<?=$this->input->post('total') ?? $row->total?>" class="form-control">
                        <?=form_error('total')?>
                    </div>
                    <div class="form-group <?=form_error('idRegional') ? 'has-error' : null?>">
                        <label>ID Regional *</label>
                        <input type="text" name="idRegional" value="<?=$this->input->post('idRegional') ?? $row->idRegional?>" class="form-control">
                        <?=form_error('idRegional')?>
                    </div>
                    <div class="form-group <?=form_error('idWitel') ? 'has-error' : null?>">
                        <label>ID Witel *</label>
                        <input type="text" name="idWitel" value="<?=$this->input->post('idWitel') ?? $row->idWitel?>" class="form-control">
                        <?=form_error('idWitel')?>
                    </div>
                    <div class="form-group <?=form_error('idDatel') ? 'has-error' : null?>">
                        <label>ID Datel *</label>
                        <input type="text" name="idDatel" value="<?=$this->input->post('idDatel') ?? $row->idDatel?>" class="form-control">
                        <?=form_error('idDatel')?>
                    </div>
                    <div class="form-group <?=form_error('idSTO') ? 'has-error' : null?>">
                        <label>ID STO *</label>
                        <input type="text" name="idSTO" value="<?=$this->input->post('idSTO') ?? $row->idSTO?>" class="form-control">
                        <?=form_error('idSTO')?>
                    </div>
                    <div class="form-group <?=form_error('infoODP') ? 'has-error' : null?>">
                        <label>Info ODP *</label>
                        <input type="text" name="infoODP" value="<?=$this->input->post('infoODP') ?? $row->infoODP?>" class="form-control">
                        <?=form_error('infoODP')?>
                    </div>
                    <div class="form-group <?=form_error('updateDate') ? 'has-error' : null?>">
                        <label>Update Date *</label>
                        <input type="text" name="updateDate" value="<?=$this->input->post('updateDate') ?? $row->updateDate?>" class="form-control">
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