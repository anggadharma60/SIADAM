<section class="content-header">
  <h1>
  Specification OLT
    <small>Data Specification OLT</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Specification OLT</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Specification OLT</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getSpecOLT')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('namaSpecOLT') ? 'has-error' : null?>">
                        <label>Nama Specification OLT *</label>
                        <input type="hidden" name="idSpecOLT" value="<?=$row->idSpecOLT?>">
                        <input type="text" name="namaSpecOLT" value="<?=$this->input->post('namaSpecOLT') ?? $row->namaSpecOLT?>" class="form-control">
                        <?=form_error('namaSpecOLT')?>
                    </div>
                    <div class="form-group <?=form_error('merekOLT') ? 'has-error' : null?>">
                        <label>Merk OLT *</label>
                        <input type="text" name="merekOLT" value="<?=$this->input->post('merekOLT') ?? $row->merekOLT?>" class="form-control">
                        <?=form_error('merekOLT')?>
                    </div>
                    <div class="form-group <?=form_error('typeOLT') ? 'has-error' : null?>">
                        <label>Type OLT *</label>
                        <input type="text" name="typeOLT" value="<?=$this->input->post('typeOLT') ?? $row->typeOLT?>" class="form-control">
                        <?=form_error('typeOLT')?>
                    </div>
                    <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                            <label>Keterangan</label>
                            <textarea style="resize:none" name="keterangan" class="form-control" rows="3"><?=$row->keterangan?></textarea>
                            <?=form_error('keterangan')?>
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