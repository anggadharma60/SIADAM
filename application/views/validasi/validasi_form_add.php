
<section class="content-header">
  <h1>
    Validasi
    <small>Data Validasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Validasi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Validasi</h3>
        <div class="pull-right">
          <a href="<?= site_url('Admin/viewListValidasi') ?>" class="btn btn-danger btn-flat">
              <i class="fa fa-undo"></i> Back
          </a>
        </div>                                        
    </div>
    <?php
      print_r($this->input->post(null, TRUE));
    ?>
     <!--end box header  -->
    <div class="box-body table-responsive">
      <form method="post" action="">
        <!-- Input ODP -->
        <div class="col-md-12">
          <fieldset>
            <legend>Input Data</legend>
            <div class="col-md-3">
              <div class="form-group <?= form_error('tanggal_pelurusan') ? 'has-error' : null ?>">
                    <label>Tanggal Pelurusan *</label>
                    <div class="input-group input-daterange">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal_pelurusan" id="taggal_pelurusan" class="form-control pull-right" value="<?= set_value('tanggal_pelurusan')?>" readonly=""/>
                        </div>
                    <?= form_error('tanggal_pelurusan') ?>
              </div>
            </div>
            <div class="row"></div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('ondesk') ? 'has-error' : null ?>">
                <label>Ondesk *</label>
                <select name="ondesk" value="<?= set_value('ondesk') ?>" class="form-control selectpicker" data-live-search="true">
                <option data-tokens=""></option>
                  <option data-tokens="china">China</option>
                  <option data-tokens="malayasia">Malayasia</option>
                  <option data-tokens="singapore">Singapore</option>
                </select>
                <?= form_error('ondesk') ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('onsite1') ? 'has-error' : null ?>">
                <label>Onsite 1 *</label>
                <select name="onsite1" value="<?= set_value('onsite1') ?>" class="form-control selectpicker" data-live-search="true">
                  <option data-tokens=""></option>
                  <option data-tokens="china">China</option>
                  <option data-tokens="malayasia">Malayasia</option>
                  <option data-tokens="singapore">Singapore</option>
                </select>
                <?= form_error('onsite1') ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('onsite2') ? 'has-error' : null ?>">
                <label>Onsite 2 *</label>
                <select name="onsite2" value="<?= set_value('onsite2') ?>" class="form-control selectpicker" data-live-search="true">
                  <option data-tokens=""></option>
                  <option data-tokens="china">China</option>
                  <option data-tokens="malayasia">Malayasia</option>
                  <option data-tokens="singapore">Singapore</option>
                </select>
                <?= form_error('onsite2') ?>
              </div>
            </div>
          </fieldset>
        </div>
        <!-- End Input ODP -->

        <!-- Input Data ODP -->
        <div class="col-md-8">
          <fieldset>
            <legend>Data ODP</legend>
            <div class="col-md-4">
              <div class="form-group <?= form_error('namaODP') ? 'has-error' : null ?>">
                <label>Nama ODP *</label>
                <select name="namaODP" value="<?= set_value('namaODP') ?>" class="form-control selectpicker ui-widget" data-live-search="true">
                  <option data-tokens=""></option>
                  <option data-tokens="china">China</option>
                  <option data-tokens="malayasia">Malayasia</option>
                  <option data-tokens="singapore">Singapore</option>
                </select>
                <?= form_error('namaODP') ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('QRODP') ? 'has-error' : null ?>">
                <label>QR ODP</label>
                <input type="text" name="QRODP" value="<?= set_value('QRODP') ?>" class="form-control">
                <?= form_error('QRODP') ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('koordinatODP') ? 'has-error' : null ?>">
                <label>Koordinat</label>
                <input type="text" name="koordinatODP" value="<?= set_value('koordinatODP') ?>" class="form-control">
                <?= form_error('koordinatODP') ?>
              </div>
            </div>
            <div class="row"></div>
            <div class="col-md-6">
              <div class="form-group <?= form_error('noteODP') ? 'has-error' : null ?>">
                <label>Note ODP</label>
                <textarea style="resize:none" name="noteODP" class="form-control" rows="3" ><?=set_value('noteODP')?></textarea>
                <?= form_error('noteODP') ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group <?= form_error('noteQRODP') ? 'has-error' : null ?>">
                <label>Note QR ODP</label>
                <textarea style="resize:none" name="noteQRODP" class="form-control" rows="3" ><?=set_value('noteQRODP')?></textarea>
                <?= form_error('noteQRODP') ?>
              </div>
            </div>
            <div class="row"></div>
            <div class="col-md-3">
              <div class="form-group <?= form_error('totalIN') ? 'has-error' : null ?>">
                  <label>Total IN </label>
                  <input type="text" name="totalIN" value="<?= set_value('totalIN') ?>" class="form-control">
                  <?= form_error('totalIN') ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group <?= form_error('kapasitasODP') ? 'has-error' : null ?>">
                  <label>Kapasitas</label>
                  <input id="txtNoOfRec" type="text" name="kapasitasODP" value="<?= set_value('kapasitasODP') ?>" class="form-control">
                  <?= form_error('kapasitasODP') ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <br>
                <input class="btn btn-primary btn-flat" type="button" value="GENERATE" id="btnNoOfRec" style="margin-top:5px;height:33px;width:100%;" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <br>
                <input class="btn btn-success btn-flat" type="submit" value="TAMBAH" name="submit" style="margin-top:5px;height:33px;width:100%;">
              </div>
            </div>
          </fieldset>
        </div>
        <!-- End Input Data ODP -->

        <!-- Input Data OLT -->
        <div class="col-md-4">
          <fieldset>
            <legend>Data OLT</legend>
            <div class="col-md-8">
              <div class="form-group <?= form_error('namaOLT') ? 'has-error' : null ?>">
                <label>Nama OLT *</label>
                <select name="namaOLT'" value="<?= set_value('namaOLT') ?>" class="form-control selectpicker ui-widget" data-live-search="true">
                  <option data-tokens=""></option>
                  <option data-tokens="china">China</option>
                  <option data-tokens="malayasia">Malayasia</option>
                  <option data-tokens="singapore">Singapore</option>
                </select>
                <?= form_error('namaOLT') ?>
              </div>
            </div>
            <div class="row"></div>
            <div class="col-md-8">
              <div class="form-group <?= form_error('portOLT') ? 'has-error' : null ?>">
                <label>Port OLT *</label>
                <input type="text" name="portOLT" value="<?= set_value('portOLT') ?>" class="form-control">
                <?= form_error('portOLT') ?>
              </div>
            </div>
          </fieldset>
          
        </div>
        <!-- End Input Data OLT -->

        <!-- Data validasi -->
        <div class="col-md-12">
            <fieldset>
              <legend>Data Validasi</legend>
            </fieldset>
            <div id="AddControll">
  
            </div>
        </div>
        <!-- End Data validasi -->

        <!-- <div class="container">
              <div id="dvMain">
                  <label id="lblNoOfRec"> Enter Value For Create No Of Rows </label>
                  <input type="text" id="txtNoOfRec" />
                  <input type="button" value="CREATE" id="btnNoOfRec" />
              </div>
              <br />
              <div id="AddControll">

              </div>
        </div> -->
      </form>
     
    </div>
    <!-- end box body  -->
    
    
  </div>
  <!-- end box -->
    
    
</section>