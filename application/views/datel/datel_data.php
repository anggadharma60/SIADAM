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
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Datel</h3>
      <?php if (
        $this->fungsi->user_login()->status == 'Admin' || $this->fungsi->user_login()->status == 'Ondesk' || $this->fungsi->user_login()->status == 'HD Daman' ||
        $this->fungsi->user_login()->status == 'Onsite' ||
        $this->fungsi->user_login()->status == 'Daman' ||
        $this->fungsi->user_login()->status == 'DAVA' ||
        $this->fungsi->user_login()->status == 'SDI'
      ) { ?>
        <div class="pull-right">
          <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
            <a href="<?= site_url('Admin/addDatel') ?>" class="btn btn-primary btn-flat">
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
              <td style="width: 10%" ;><?= $data->idDatel ?></td>
              <td style="width: 15%" ;><?= $data->namaDatel ?></td>
              <td><?= $data->keterangan ?></td>
              <td style="width: 11%" ;><?= $data->namaWitel ?></td>
                <td class="text-center" width="10%">
                  <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                    <form action="<?= site_url('Admin/deleteDatel') ?>" method="post">
                      <a href="<?= site_url('Admin/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php  } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                    <form action="<?= site_url('Ondesk/deleteDatel') ?>" method="post">
                      <a href="<?= site_url('Ondesk/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php  } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Onsite') { ?>
                    <form action="<?= site_url('Ondesk/deleteDatel') ?>" method="post">
                      <a href="<?= site_url('Ondesk/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php  } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Daman') { ?>
                    <form action="<?= site_url('Daman/deleteDatel') ?>" method="post">
                      <a href="<?= site_url('Daman/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php  } ?>
                  <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                    <form action="<?= site_url('Ondesk/deleteDatel') ?>" method="post">
                      <a href="<?= site_url('Ondesk/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php  } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                    <form action="<?= site_url('Ondesk/deleteDatel') ?>" method="post">
                      <a href="<?= site_url('Ondesk/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php  } ?>
                  <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                    <form action="<?= site_url('Ondesk/deleteDatel') ?>" method="post">
                      <a href="<?= site_url('Ondesk/editDatel/' . $data->idDatel) ?>" class="btn btn-primary btn-xs disabled">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <input type="hidden" name="idDatel" value="<?= $data->idDatel ?>">
                      <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  <?php  } ?>

                </td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID Datel</th>
            <th>Nama Datel</th>
            <th>Keterangan</th>
            <th>Witel</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</section>