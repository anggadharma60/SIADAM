<section class="content-header">
  <h1>
    Kelola Data Pegawai
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user-plus"></i></a></li>
    <li class="active">Pegawai</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pegawai</h3>
      <div class="pull-right">
        <a href="<?= site_url('Admin/addPegawai') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-user-plus"></i> Create
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <!-- id="table1" buat searching pagination dan row -->
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>ID Pegawai</th>
            <!-- <th>NIP</th> -->
            <th>Nama Pegawai</th>
            <th>Username</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $data->idPegawai ?></td>
              <!-- <td><?= $data->NIP ?></td> -->
              <td><?= $data->namaPegawai ?></td>
              <td><?= $data->username ?></td>
              <td><?= $data->status ?></td>
              <td class="text-center" width="160px">
                <form action="<?= site_url('Admin/deletePegawai') ?>" method="post">
                  <a href="<?= site_url('Admin/detailPegawai/' . $data->idPegawai) ?>" class="btn btn-default btn-xs">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="<?= site_url('Admin/editPegawai/' . $data->idPegawai) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <input type="hidden" name="idPegawai" value="<?= $data->idPegawai ?>">
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
            <th>ID Pegawai</th>
            <!-- <th>NIP</th> -->
            <th>Nama Pegawai</th>
            <th>Username</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</section>