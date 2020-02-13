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
        <a href="<?= site_url('Admin/exportODP')?>" class="btn btn-danger btn-flat">
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
      <table class="table table-bordered table-striped" border="1" cellpadding="8" id="table1">
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
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $data->idODP ?></td>
              <td><?= $data->idNOSS ?></td>
              <td><?= $data->indexODP ?></td>
              <td><?= $data->namaODP ?></td>
              <td><?= $data->ftp ?></td>
              <td><?= $data->latitude ?></td>
              <td><?= $data->longitude ?></td>
              <td><?= $data->clusterName ?></td>
              <td><?= $data->clusterStatus ?></td>
              <td><?= $data->avai ?></td>
              <td><?= $data->used ?></td>
              <td><?= $data->rsv ?></td>
              <td><?= $data->rsk ?></td>
              <td><?= $data->total ?></td>
              <td><?= $data->namaRegional ?></td>
              <td><?= $data->namaWitel ?></td>
              <td><?= $data->namaDatel ?></td>
              <td><?= $data->namaSTO ?></td>
              <td><?= $data->infoODP ?></td>
              <td><?= $data->updateDate ?></td>
              <td class="text-center" width="10%">
                <form action="<?= site_url('Admin/deleteODP') ?>" method="post">
                  <a href="<?= site_url('Admin/detailODP/' . $data->idODP) ?>" class="btn btn-default btn-xs">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="<?= site_url('Admin/editODP/' . $data->idODP) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <input type="hidden" name="idODP" value="<?= $data->idODP ?>">
                  <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php
          }
          ?>
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
</section>