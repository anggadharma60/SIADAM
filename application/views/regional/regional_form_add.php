<section class="content-header">
  <h1>
    Regional
    <small>Data Regional</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Regional</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Regional</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getRegional')?>" class="btn btn-danger btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors() ?>
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('idRegional') ? 'has-error' : null ?>">
                        <label>ID Regional *</label>
                        <input type="text" name="idRegional" value="<?=set_value('idRegional')?>" class="form-control">
                        <?=form_error('idRegional')?>
                    </div>
                    <div class="form-group <?=form_error('namaRegional') ? 'has-error' : null ?>">
                        <label>Nama Regional *</label>
                        <input type="text" name="namaRegional" value="<?=set_value('namaRegional')?>" class="form-control">
                        <?=form_error('namaRegional')?>
                    </div>
                    <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                        <label>Keterangan</label>
                        <textarea style="resize:none" name="keterangan" class="form-control" rows="3" ><?=set_value('keterangan')?></textarea>
                        <?=form_error('keterangan')?>
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