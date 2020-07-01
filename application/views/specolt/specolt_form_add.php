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
        <h3 class="box-title">Tambah Specification OLT</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getSpecOLT')?>" class="btn btn-danger btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
             
                
                <form action="" method="post">
                    <div class="form-group <?=form_error('namaSpecOLT') ? 'has-error' : null ?>">
                        <label>Nama Specification OLT *</label>
                        <input type="text" name="namaSpecOLT" value="<?=set_value('namaSpecOLT')?>" class="form-control">
                        <?=form_error('namaSpecOLT')?>
                    </div>
                    <div class="form-group <?=form_error('merekOLT') ? 'has-error' : null ?>">
                        <label>Merek OLT</label>
                        <input type="text" list="merek" name="merekOLT" id="merekOLT" value="<?=set_value('merekOLT')?>" class="form-control">
                        <datalist id="merek">
                            <option value="ZTE">
                            <option value="ALU">
                            <option value="HUAWEI">
                        </datalist>
                        <?=form_error('merekOLT')?>
                    </div>
                    <div class="form-group <?=form_error('typeOLT') ? 'has-error' : null ?>">
                        <label>Type OLT</label>
                        <input type="text" list="type" name="typeOLT" id="typeOLT" value="<?=set_value('typeOLT')?>" class="form-control">
                        <datalist id="type">
                            <option value="C300">
                            <option value="C220v1.2">
                            <option value="C300v2.0">
                            <option value="C220v2.0">
                            <option value="C320v2.0 (Mini OLT)">
                        </datalist>
                        <?=form_error('typeOLT')?>
                    </div>
                    <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                        <label>Keterangan</label>
                        <textarea style="resize:none" name="keterangan" class="form-control" rows="3" value="<?=set_value('keterangan')?>" ></textarea>
                        <?=form_error('keterangan')?>
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-success btn-flat">
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