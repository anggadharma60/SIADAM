<section class="content-header">
  <h1>
    Kelola Data ODP
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
    <li class="active">ODP</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data ODP</h3>
      <div class="pull-right">
        <a href="<?= site_url('Admin/deleteAllODP')?>">
        <button onclick="return confirm('Apakah Anda Yakin ingin menghapus semua Data?')" class="btn btn-danger btn-flat">
          <i class="fa fa-trash"></i> Delete All
          </button>
        </a>
        <a href="<?= site_url('Admin/exportODP')?>" class="btn btn-info btn-flat">
          <i class="fa fa-upload"></i> Export
        </a>
        <a href="<?= site_url('Admin/uploadODP') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-download"></i> Import
        </a>
        <a href="<?= site_url('Admin/addODP') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped dt-responsive nowrap" style="width:100%" border="1" cellpadding="8" id="tableODP">
      <thead>
						<tr>
						<th>ID ODP</th>
						<th>ID NOSS</th>
						<th>index ODP</th>
						<th>Nama ODP</th>
						<th>FTP</th>
						<th>Latitude</th>
						<th>Longitude</th>
						<th>Cluster Name</th>
						<th>Cluster Status</th>
						<th>Available</th>
						<th>Used</th>
						<th>RSV</th>
						<th>RSK</th>
						<th>Total</th>
						<th>Regional</th>
						<th>Witel</th>
						<th>Datel</th>
						<th>STO</th>
						<th>Info ODP</th>
						<th>Update Date</th>
						<th>Actions</th>
						</tr>
					</thead>
        <tbody id="show_data">
         
        </tbody>
        <tfoot>
          <tr>
            <th>ID ODP</th>
            <th>ID NOSS</th>
            <th>index ODP</th>
            <th>Nama ODP</th>
            <th>FTP</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Cluster Name</th>
            <th>Cluster Status</th>
            <th>Available</th>
            <th>Used</th>
            <th>RSV</th>
            <th>RSK</th>
            <th>Total</th>
            <th>Regional</th>
            <th>Witel</th>
            <th>Datel</th>
            <th>STO</th>
            <th>Info ODP</th>
            <th>Update Date</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div id="loading" class="overlay">
      <i class="fa fa-spinnner fa-spin"></i>
    </div>
</section>
