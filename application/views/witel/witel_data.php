<section class="content-header">
  <h1>
    Kelola Data Witel
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
    <li class="active">Witel</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Witel</h3>
      <?php if (
        $this->fungsi->user_login()->status == 'Admin' || $this->fungsi->user_login()->status == 'Ondesk' || $this->fungsi->user_login()->status == 'HD Daman' ||
        $this->fungsi->user_login()->status == 'Onsite' ||
        $this->fungsi->user_login()->status == 'Daman' ||
        $this->fungsi->user_login()->status == 'DAVA' || $this->fungsi->user_login()->status == 'SDI'
      ) { ?>
        <div class="pull-right">
          <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
            <a href="<?= site_url('Admin/addWitel') ?>" class="btn btn-primary btn-flat">
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
            <th>ID Witel</th>
            <th>Nama Witel</th>
            <th>Keterangan</th>
            <th>Regional</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $data->idWitel ?></td>
              <!-- <td><?= $data->NIP ?></td> -->
              <td><?= $data->namaWitel ?></td>
              <td><?= $data->keterangan ?></td>
              <td><?= $data->namaRegional ?></td>
              <td class="text-center" width="10%">
                <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                  <form action="<?= site_url('Admin/deleteWitel') ?>" method="post">
                    <a href="<?= site_url('Admin/editWitel/' . $data->idWitel) ?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idWitel" value="<?= $data->idWitel ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                  <form action="<?= site_url('Ondesk/deleteWitel') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editWitel/' . $data->idWitel) ?>" class="btn btn-primary btn-xs disabled" disabled>
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idWitel" value="<?= $data->idWitel ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Onsite') { ?>
                  <form action="<?= site_url('Ondesk/deleteWitel') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editWitel/' . $data->idWitel) ?>" class="btn btn-primary btn-xs disabled" disabled>
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idWitel" value="<?= $data->idWitel ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Daman') { ?>
                  <form action="<?= site_url('Ondesk/deleteWitel') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editWitel/' . $data->idWitel) ?>" class="btn btn-primary btn-xs disabled" disabled>
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idWitel" value="<?= $data->idWitel ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                  <form action="<?= site_url('Ondesk/deleteWitel') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editWitel/' . $data->idWitel) ?>" class="btn btn-primary btn-xs disabled" disabled>
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idWitel" value="<?= $data->idWitel ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                  <form action="<?= site_url('Ondesk/deleteWitel') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editWitel/' . $data->idWitel) ?>" class="btn btn-primary btn-xs disabled" disabled>
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idWitel" value="<?= $data->idWitel ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                  <form action="<?= site_url('Ondesk/deleteWitel') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editWitel/' . $data->idWitel) ?>" class="btn btn-primary btn-xs disabled" disabled>
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idWitel" value="<?= $data->idWitel ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
              </td>
            </tr>
          <?php
          } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID Witel</th>
            <th>Nama Witel</th>
            <th>Keterangan</th>
            <th>Regional</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</section>