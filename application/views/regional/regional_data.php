<section class="content-header">
  <h1>
    Kelola Data Regional
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-flag"></i></a></li>
    <li class="active">Regional</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Regional</h3>
      <div class="pull-right">
        <a href="<?= site_url('Admin/addRegional') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>ID Regional</th>
            <th>Nama Regional</th>
            <th>Keterangan</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $data->idRegional ?></td>
              <td><?= $data->namaRegional ?></td>
              <td><?= $data->keterangan ?></td>
              <td class="text-center" width="160px">
                <form action="<?= site_url('Admin/deleteRegional') ?>" method="post">
                  <a href="<?= site_url('Admin/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
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
            <th>ID Regional</th>
            <th>Nama Regional</th>
            <th>Keterangan</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</section>