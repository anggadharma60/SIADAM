<section class="content-header">
  <h1>
    Kelola Data Validasi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
    <li class="active">Validasi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Validasi</h3>
      <div class="pull-right">
        <a href="<?= site_url('Admin/deleteAllValidasi')?>">
        <button onclick="return confirm('Apakah Anda Yakin ingin menghapus semua Data?')" class="btn btn-danger btn-flat">
          <i class="fa fa-trash"></i> Delete All
          </button>
        </a>
        <a href="<?= site_url('Admin/exportValidasi')?>" class="btn btn-danger btn-flat">
          <i class="fa fa-upload  "></i> Export
        </a>
        <a href="<?= site_url('Admin/uploadValidasi')?>" class="btn btn-success btn-flat">
          <i class="fa fa-download"></i> Import
        </a>
        <a href="<?= site_url('Admin/addValidasi')?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped" border="1" cellpadding="8" id="tableValidasi">
        <thead>
          <tr>
            <th>ID</th>
            <th>TANGGAL PELURUSAN</th>
            <th>ONDESK</th>
            <th>ONSITE</th>
            <th>NAMA ODP</th>
            <th>NOTE</th>
            <th>QR ODP</th>
            <th>KOORDINAT ODP</th>
            <th>NAMA OLT (IP OLT)</th>
            <th>PORT OLT</th>
            <th>TOTAL IN ODP</th>
            <th>KAPASITAS ODP</th>
            <th>PORT OUT SPLITTER</th>
            <th>QR OUT SPLITTER</th>
            <th>PORT</th>
            <th>STATUS</th>
            <th>ONU</th>
            <th>SN</th>
            <th>SERVICE</th>
            <th>QR DROPCORE</th>
            <th>NOTE URUT DROPCORE</th>
            <th>FLAG OLT & PORT</th>
            <th>CONNECTIVITY ODP TO OLT</th>
            <th>ODP - ONT</th>
            <th>RFS</th>
            <th>NOTE</th>
            <th>TANGGAL UPDATE UIM</th>
            <th>UPDATER UIM</th>
            <th>QR ODP</th>
            <th>QR OUT SPLITTER</th>
            <th>QR DROPCORE</th>
            <th>UPDATER DAVA</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>TANGGAL PELURUSAN</th>
            <th>ONDESK</th>
            <th>ONSITE</th>
            <th>NAMA ODP</th>
            <th>NOTE</th>
            <th>QR ODP</th>
            <th>KOORDINAT ODP</th>
            <th>NAMA OLT (IP OLT)</th>
            <th>PORT OLT</th>
            <th>TOTAL IN ODP</th>
            <th>KAPASITAS ODP</th>
            <th>PORT OUT SPLITTER</th>
            <th>QR OUT SPLITTER</th>
            <th>PORT</th>
            <th>STATUS</th>
            <th>ONU</th>
            <th>SN</th>
            <th>SERVICE</th>
            <th>QR DROPCORE</th>
            <th>NOTE URUT DROPCORE</th>
            <th>FLAG OLT & PORT</th>
            <th>CONNECTIVITY ODP TO OLT</th>
            <th>ODP - ONT</th>
            <th>RFS</th>
            <th>NOTE</th>
            <th>TANGGAL UPDATE UIM</th>
            <th>UPDATER UIM</th>
            <th>QR ODP</th>
            <th>QR OUT SPLITTER</th>
            <th>QR DROPCORE</th>
            <th>UPDATER DAVA</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>


