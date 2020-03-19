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
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Regional</h3>
      <?php if (
        $this->fungsi->user_login()->status == 'Admin' || $this->fungsi->user_login()->status == 'Ondesk' || $this->fungsi->user_login()->status == 'HD Daman' ||
        $this->fungsi->user_login()->status == 'Onsite' ||
        $this->fungsi->user_login()->status == 'Daman' ||
        $this->fungsi->user_login()->status == 'DAVA' ||
        $this->fungsi->user_login()->status == 'SDI'
      ) { ?>
        <div class="pull-right">
          <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
            <a href="<?= site_url('Admin/addRegional') ?>" class="btn btn-primary btn-flat">
              <i class="fa fa-user-plus"></i> Create
            </a>
          <?php  } ?>
        </div>
      <?php  } ?>
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
                <td class="text-center" width="10%">
                  <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                    <form action="<?= site_url('Admin/deleteRegional') ?>" method="post">
                      <a href="<?= site_url('Admin/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                    <form action="<?= site_url('Ondesk/deleteRegional') ?>" method="post">
                      <a href="<?= site_url('Ondesk/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Onsite') { ?>
                    <form action="<?= site_url('Onsite/deleteRegional') ?>" method="post">
                      <a href="<?= site_url('Onsite/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Daman') { ?>
                    <form action="<?= site_url('Daman/deleteRegional') ?>" method="post">
                      <a href="<?= site_url('Daman/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                    <form action="<?= site_url('Daman/deleteRegional') ?>" method="post">
                      <a href="<?= site_url('Daman/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                    <form action="<?= site_url('Daman/deleteRegional') ?>" method="post">
                      <a href="<?= site_url('Daman/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                    <form action="<?= site_url('Daman/deleteRegional') ?>" method="post">
                      <a href="<?= site_url('Daman/editRegional/' . $data->idRegional) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idRegional" value="<?= $data->idRegional ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php } ?>
                </td>
            </tr>
          <?php } ?>
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