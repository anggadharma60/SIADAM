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
    <div class="box-body">
      <div class="row">
        <div class="col-md-6 ">
          <?php //echo validation_errors() 
          ?>
          <form action="" method="post">
            <div class="form-group <?= form_error('tanggal_pelurusan') ? 'has-error' : null ?>">
              <label>TANGGAL PELURUSAN *</label>
              <input type="text" name="tanggal_pelurusan" value="<?= set_value('tanggal_pelurusan') ?>" class="form-control">
              <?= form_error('tanggal_pelurusan') ?>
            </div>
            <div class="form-group <?= form_error('ondesk') ? 'has-error' : null ?>">
              <label>ONDESK *</label>
              <input type="text" name="ondesk" value="<?= set_value('ondesk') ?>" class="form-control">
              <?= form_error('ondesk') ?>
            </div>
            <div class="form-group <?= form_error('onsite') ? 'has-error' : null ?>">
              <label>Nama ODP *</label>
              <input type="text" name="onsite" value="<?= set_value('onsite') ?>" class="form-control">
              <?= form_error('onsite') ?>
            </div>
            <div class="form-group <?= form_error('namaODP') ? 'has-error' : null ?>">
              <label>NAMA ODP *</label>
              <input type="text" name="namaODP" value="<?= set_value('namaODP') ?>" class="form-control">
              <?= form_error('namaODP') ?>
            </div>
            <div class="form-group <?= form_error('noteODP') ? 'has-error' : null ?>">
              <label>NOTE ODP *</label>
              <input type="text" name="noteODP" value="<?= set_value('noteODP') ?>" class="form-control">
              <?= form_error('noteODP') ?>
            </div>
          </form>
        </div>

        <div class="col-md-6">
          <?php //echo validation_errors() 
          ?>
          <form action="" method="post">
            <div class="form-group <?= form_error('QRODP') ? 'has-error' : null ?>">
              <label>QR ODP *</label>
              <input type="text" name="QRODP" value="<?= set_value('QRODP') ?>" class="form-control">
              <?= form_error('QRODP') ?>
            </div>
            <div class="form-group <?= form_error('koordinatODP') ? 'has-error' : null ?>">
              <label>KOORDINAT ODP *</label>
              <input type="text" name="koordinatODP" value="<?= set_value('koordinatODP') ?>" class="form-control">
              <?= form_error('koordinatODP') ?>
            </div>
            <div class="form-group <?= form_error('hostname') ? 'has-error' : null ?>">
              <label>NAMA OLT (IP OLT) *</label>
              <input type="text" name="hostname" value="<?= set_value('hostname') ?>" class="form-control">
              <?= form_error('hostname') ?>
            </div>
            <div class="form-group <?= form_error('portOLT') ? 'has-error' : null ?>">
              <label>PORT OLT *</label>
              <input type="text" name="portOLT" value="<?= set_value('portOLT') ?>" class="form-control">
              <?= form_error('portOLT') ?>
            </div>
            <div class="form-group <?= form_error('totalIN') ? 'has-error' : null ?>">
              <label>TOTAL IN ODP *</label>
              <input type="text" name="totalIN" value="<?= set_value('totalIN') ?>" class="form-control">
              <?= form_error('totalIN') ?>
            </div>
          </form>
        </div>

        <div class="col-md-6">
          <?php //echo validation_errors() 
          ?>
          <form action="" method="post">
            <div class="form-group <?= form_error('kapasitasODP') ? 'has-error' : null ?>">
              <label>KAPASITAS ODP *</label>
              <input type="text" name="kapasitasODP" value="<?= set_value('kapasitasODP') ?>" class="form-control">
              <?= form_error('kapasitasODP') ?>
            </div>
            <div class="form-group <?= form_error('QRPortOutSplitter') ? 'has-error' : null ?>">
              <label>QR OUT SPLITTER *</label>
              <input type="text" name="QRPortOutSplitter" value="<?= set_value('QRPortOutSplitter') ?>" class="form-control">
              <?= form_error('QRPortOutSplitter') ?>
            </div>
            <div class="form-group <?= form_error('portODP') ? 'has-error' : null ?>">
              <label>PORT ODP *</label>
              <input type="text" name="portODP" value="<?= set_value('portODP') ?>" class="form-control">
              <?= form_error('portODP') ?>
            </div>
            <div class="form-group <?= form_error('statusPortODP') ? 'has-error' : null ?>">
              <label>STATUS PORT ODP *</label>
              <input type="text" name="statusPortODP" value="<?= set_value('statusPortODP') ?>" class="form-control">
              <?= form_error('statusPortODP') ?>
            </div>
            <div class="form-group <?= form_error('ONU') ? 'has-error' : null ?>">
              <label>ONU *</label>
              <input type="text" name="ONU" value="<?= set_value('ONU') ?>" class="form-control">
              <?= form_error('ONU') ?>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <?php //echo validation_errors() 
          ?>
          <form action="" method="post">
            <div class="form-group <?= form_error('serialNumber') ? 'has-error' : null ?>">
              <label>SERIAL NUMBER *</label>
              <input type="text" name="serialNumber" value="<?= set_value('serialNumber') ?>" class="form-control">
              <?= form_error('serialNumber') ?>
            </div>
            <div class="form-group <?= form_error('serviceNumber') ? 'has-error' : null ?>">
              <label>SERVICE NUMBER *</label>
              <input type="text" name="serviceNumber" value="<?= set_value('serviceNumber') ?>" class="form-control">
              <?= form_error('serviceNumber') ?>
            </div>
            <div class="form-group <?= form_error('QRDropCore') ? 'has-error' : null ?>">
              <label>QR DROPCORE *</label>
              <input type="text" name="QRDropCore" value="<?= set_value('QRDropCore') ?>" class="form-control">
              <?= form_error('QRDropCore') ?>
            </div>
            <div class="form-group <?= form_error('noteUrut') ? 'has-error' : null ?>">
              <label>NOTE URUT DROPCORE *</label>
              <input type="text" name="noteUrut" value="<?= set_value('noteUrut') ?>" class="form-control">
              <?= form_error('noteUrut') ?>
            </div>
            <div class="form-group <?= form_error('flagOLTPort') ? 'has-error' : null ?>">
              <label>FLAG OLT & PORT *</label>
              <input type="text" name="flagOLTPort" value="<?= set_value('flagOLTPort') ?>" class="form-control">
              <?= form_error('flagOLTPort') ?>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- pembatas atas bawah -->
    <br>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <?php //echo validation_errors() 
          ?>
          <form action="" method="post">
            <div class="form-group <?= form_error('ODPtoOLT') ? 'has-error' : null ?>">
              <label>CONNECTIVITY ODP TO OLT *</label>
              <input type="text" name="ODPtoOLT" value="<?= set_value('ODPtoOLT') ?>" class="form-control">
              <?= form_error('ODPtoOLT') ?>
            </div>
            <div class="form-group <?= form_error('ODPtoONT') ? 'has-error' : null ?>">
              <label>ODP - ONT *</label>
              <input type="text" name="ODPtoONT" value="<?= set_value('ODPtoONT') ?>" class="form-control">
              <?= form_error('ODPtoONT') ?>
            </div>
            <div class="form-group <?= form_error('RFS') ? 'has-error' : null ?>">
              <label>RFS *</label>
              <input type="text" name="RFS" value="<?= set_value('RFS') ?>" class="form-control">
              <?= form_error('RFS') ?>
            </div>
            <div class="form-group <?= form_error('noteHDDaman') ? 'has-error' : null ?>">
              <label>NOTE HD DAMAN *</label>
              <input type="text" name="noteHDDaman" value="<?= set_value('noteHDDaman') ?>" class="form-control">
              <?= form_error('noteHDDaman') ?>
            </div>
            <div class="form-group <?= form_error('updateDateUIM') ? 'has-error' : null ?>">
              <label>TANGGAL UPDATE UIM *</label>
              <input type="text" name="updateDateUIM" value="<?= set_value('updateDateUIM') ?>" class="form-control">
              <?= form_error('updateDateUIM') ?>
            </div>
          </form>
        </div>

        <div class="col-md-6">
          <?php //echo validation_errors() 
          ?>
          <form action="" method="post">
            <div class="form-group <?= form_error('updaterUIM') ? 'has-error' : null ?>">
              <label>UPDATER UIM *</label>
              <input type="text" name="updaterUIM" value="<?= set_value('updaterUIM') ?>" class="form-control">
              <?= form_error('updaterUIM') ?>
            </div>
            <div class="form-group <?= form_error('noteQRODP') ? 'has-error' : null ?>">
              <label>NOTE QR ODP *</label>
              <input type="text" name="noteQRODP" value="<?= set_value('noteQRODP') ?>" class="form-control">
              <?= form_error('noteQRODP') ?>
            </div>
            <div class="form-group <?= form_error('noteQROutSplitter') ? 'has-error' : null ?>">
              <label>NOTE QR OUT SPLITTER *</label>
              <input type="text" name="noteQROutSplitter" value="<?= set_value('noteQROutSplitter') ?>" class="form-control">
              <?= form_error('noteQROutSplitter') ?>
            </div>
            <div class="form-group <?= form_error('noteQRDropCore') ? 'has-error' : null ?>">
              <label>NOTE QR DROPCORE *</label>
              <input type="text" name="noteQRDropCore" value="<?= set_value('noteQRDropCore') ?>" class="form-control">
              <?= form_error('noteQRDropCore') ?>
            </div>
            <div class="form-group <?= form_error('updaterDava') ? 'has-error' : null ?>">
              <label>UPDATER DAVA *</label>
              <input type="text" name="updaterDava" value="<?= set_value('updaterDava') ?>" class="form-control">
              <?= form_error('updaterDava') ?>
            </div>
          </form>
        </div>
        <div class="col-md-4  col-md-offset-5">
          <?php //echo validation_errors() 
          ?>
          <form action="" method="post">
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