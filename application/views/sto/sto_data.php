<section class="content-header">
  <h1>
    Kelola Data STO
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
    <li class="active">STO</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data STO</h3>
      <div class="pull-right">
        <a href="<?= site_url('Admin/addSTO') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>ID STO</th>
            <th>Kode STO</th>
            <th>Nama STO</th>
            <th>Keterangan</th>
            <th>Datel</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td style="width: 10%";><?= $data->idSTO ?></td>
              <td style="width: 10%";><?= $data->kodeSTO ?></td>
              <td style="width: 15%";><?= $data->namaSTO ?></td>
              <td><?= $data->keterangan ?></td>
              <td style="width: 15%";><?= $data->namaDatel ?></td>
              <td class="text-center" width="10%">
                <form action="<?= site_url('Admin/deleteSTO') ?>" method="post">
                  <a href="<?= site_url('Admin/editSTO/' . $data->idSTO) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <input type="hidden" name="idSTO" value="<?= $data->idSTO ?>">
                  <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php
          } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID STO</th>
            <th>Kode STO</th>
            <th>Nama STO</th>
            <th>Keterangan</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</section>