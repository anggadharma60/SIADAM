<section class="content-header">
  <h1>
    Kelola Data Specification OLT
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wrench"></i></a></li>
    <li class="active">Specification OLT</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Specification OLT</h3>
      <?php if (
        $this->fungsi->user_login()->status == 'Admin' || $this->fungsi->user_login()->status == 'Ondesk' || $this->fungsi->user_login()->status == 'HD Daman' ||
        $this->fungsi->user_login()->status == 'Onsite' ||
        $this->fungsi->user_login()->status == 'Daman' ||
        $this->fungsi->user_login()->status == 'DAVA' || $this->fungsi->user_login()->status == 'SDI'
      ) { ?>
        <div class="pull-right">
          <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
            <a href="<?= site_url('Admin/addSpecOLT') ?>" class="btn btn-primary btn-flat">
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
            <th>ID Specification OLT</th>
            <th>Nama Specification OLT</th>
            <th>Merek OLT</th>
            <th>Type OLT</th>
            <th>Keterangan</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?= $data->idSpecOLT ?></td>
              <td><?= $data->namaSpecOLT ?></td>
              <td><?= $data->merekOLT ?></td>
              <td><?= $data->typeOLT ?></td>
              <td><?= $data->keterangan ?></td>
              <td class="text-center" width="10%">
                <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                  <form action="<?= site_url('Admin/deleteSpecOLT') ?>" method="post">
                    <a href="<?= site_url('Admin/editSpecOLT/' . $data->idSpecOLT) ?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idSpecOLT" value="<?= $data->idSpecOLT ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                  <form action="<?= site_url('Ondesk/deleteSpecOLT') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editSpecOLT/' . $data->idSpecOLT) ?>" class="btn btn-primary btn-xs disabled">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idSpecOLT" value="<?= $data->idSpecOLT ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Onsite') { ?>
                  <form action="<?= site_url('Ondesk/deleteSpecOLT') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editSpecOLT/' . $data->idSpecOLT) ?>" class="btn btn-primary btn-xs disabled">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idSpecOLT" value="<?= $data->idSpecOLT ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Daman') { ?>
                  <form action="<?= site_url('Ondesk/deleteSpecOLT') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editSpecOLT/' . $data->idSpecOLT) ?>" class="btn btn-primary btn-xs disabled">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idSpecOLT" value="<?= $data->idSpecOLT ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                  <form action="<?= site_url('Ondesk/deleteSpecOLT') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editSpecOLT/' . $data->idSpecOLT) ?>" class="btn btn-primary btn-xs disabled">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idSpecOLT" value="<?= $data->idSpecOLT ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                  <form action="<?= site_url('Ondesk/deleteSpecOLT') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editSpecOLT/' . $data->idSpecOLT) ?>" class="btn btn-primary btn-xs disabled">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idSpecOLT" value="<?= $data->idSpecOLT ?>">
                    <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                  <form action="<?= site_url('Ondesk/deleteSpecOLT') ?>" method="post">
                    <a href="<?= site_url('Ondesk/editSpecOLT/' . $data->idSpecOLT) ?>" class="btn btn-primary btn-xs disabled">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <input type="hidden" name="idSpecOLT" value="<?= $data->idSpecOLT ?>">
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
            <th>ID Specification OLT</th>
            <th>Nama Specification OLT</th>
            <th>Merek OLT</th>
            <th>Type OLT</th>
            <th>Keterangan</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</section>