<section class="content-header">
  <h1>
  Witel
    <small>Data Witel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Witel</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Witel</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getWitel')?>" class="btn btn-danger btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <?php //echo validation_errors() ?>
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('namaWitel') ? 'has-error' : null ?>">
                        <label>Nama Witel *</label>
                        <input type="text" name="namaWitel" value="<?=set_value('namaWitel')?>" class="form-control">
                        <?=form_error('namaWitel')?>
                    </div>
                    <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                        <label>Keterangan</label>
                        <textarea style="resize:none" name="keterangan" class="form-control" rows="3" value="<?=set_value('keterangan')?>" ></textarea>
                        <?=form_error('keterangan')?>
                    </div>
                    <div class="form-group <?=form_error('regional') ? 'has-error' : null ?>">
                        <label>Regional *</label>
                        <select name="regional" class="form-control">
                            <option value="" selected="selected">- Pilih Regional -</option>
                            <?php foreach($row->result() as $key => $regional) {?>
                              <option value="<?=$regional->idRegional?>" <?=set_value('regional') == $regional->idRegional ? "selected" : null?>><?=$regional->namaRegional?>
                              </option>
                            <?php }?>
                        </select>
                        <?=form_error('regional')?>
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