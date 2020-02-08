<section class="content-header">
  <h1>
    Kelola Data Datel
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tag"></i></a></li>
    <li class="active">Datel</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Datel</h3>
      <div class="pull-right">
        <a href="<?= site_url('Admin/addDatel') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>ID Datel</th>
            <th>Nama Datel</th>
            <th>Keterangan</th>
            <th>Witel</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $data->idDatel ?></td>
              <td><?= $data->namaDatel ?></td>
              <td><?= $data->keterangan ?></td>
              <td><?= $data->namaWitel ?></td>
              <td class="text-center" width="160px">
                <form action="<?= site_url('Admin/deleteDatel') ?>" method="post">
                  <a href="<?= site_url('Admin/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i> 
                  </a>
                  <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
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
            <th>ID Datel</th>
            <th>Nama Datel</th>
            <th>Keterangan</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</section>