<section class="content-header">
    <h1>
        Kelola Data OLT
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-location-arrow"></i></a></li>
        <li class="active">OLT</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data OLT</h3>
            <?php if (
                $this->fungsi->user_login()->status == 'Admin' || $this->fungsi->user_login()->status == 'Ondesk' || $this->fungsi->user_login()->status == 'HD Daman' ||
                $this->fungsi->user_login()->status == 'Daman' ||
                $this->fungsi->user_login()->status == 'Onsite' ||
                $this->fungsi->user_login()->status == 'Dava' || $this->fungsi->user_login()->status == 'SDI'
            ) { ?>
                <div class="pull-right">
                    <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                        <a href="<?= site_url('Admin/deleteAllOLT') ?>">
                            <button onclick="return confirm('Apakah Anda Yakin ingin menghapus semua Data?')" class="btn btn-danger btn-flat">
                                <i class="fa fa-trash"></i> Delete All
                            </button>
                        </a>
                    <?php } ?>

                    <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                        <a href="<?= site_url('Admin/exportOLT') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-upload  "></i> Export
                        </a>
                    <?php } ?>

                    <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                        <a href="<?= site_url('Admin/uploadOLT') ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-download"></i> Import
                        </a>
                    <?php } ?>

                    <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                        <a href="<?= site_url('Admin/addOLT') ?>" class="btn btn-primary btn-flat">
                            <i class="fa fa-user-plus"></i> Create
                        </a>
                    <?php } ?>

                </div>
            <?php  } ?>
        </div>
        <div class="box-body table-responsive">
            <!-- id="table1" buat searching pagination dan row -->
            <table class="table table-bordered table-striped" border="1" cellpadding="8" id="table1">
                <thead>
                    <tr>
                        <th>ID OLT</th>
                        <th>Hostname</th>
                        <th>IP GPON</th>
                        <th>ID Logical Device</th>
                        <th>STO</th>
                        <th>Specification OLT</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 9%" ;><?= $data->idOLT ?></td>
                            <td style="width: 16%" ;><?= $data->hostname ?></td>
                            <td><?= $data->ipOLT ?></td>
                            <td style="width: 15%" ;><?= $data->idLogicalDevice ?></td>
                            <td><?= $data->namaSTO ?></td>
                            <td><?= $data->namaSpecOLT ?></td>
                            <td class="text-center" width="10%">
                                <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                                    <form action="<?= site_url('Admin/deleteOLT') ?>" method="post">
                                        <a href="<?= site_url('Admin/editOLT/' . $data->idOLT) ?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idOLT" value="<?= $data->idOLT ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                                    <form action="<?= site_url('Ondesk/deleteOLT') ?>" method="post">
                                        <a href="<?= site_url('Ondesk/editOLT/' . $data->idOLT) ?>" class="btn btn-primary btn-xs disabled">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idOLT" value="<?= $data->idOLT ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($this->fungsi->user_login()->status == 'Onsite') { ?>
                                    <form action="<?= site_url('Onsite/deleteOLT') ?>" method="post">
                                        <a href="<?= site_url('Onsite/editOLT/' . $data->idOLT) ?>" class="btn btn-primary btn-xs disabled">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idOLT" value="<?= $data->idOLT ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($this->fungsi->user_login()->status == 'Daman') { ?>
                                    <form action="<?= site_url('Daman/deleteOLT') ?>" method="post">
                                        <a href="<?= site_url('Daman/editOLT/' . $data->idOLT) ?>" class="btn btn-primary btn-xs disabled">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idOLT" value="<?= $data->idOLT ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                                    <form action="<?= site_url('Daman/deleteOLT') ?>" method="post">
                                        <a href="<?= site_url('Daman/editOLT/' . $data->idOLT) ?>" class="btn btn-primary btn-xs disabled">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idOLT" value="<?= $data->idOLT ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                                    <form action="<?= site_url('Daman/deleteOLT') ?>" method="post">
                                        <a href="<?= site_url('Daman/editOLT/' . $data->idOLT) ?>" class="btn btn-primary btn-xs disabled">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idOLT" value="<?= $data->idOLT ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                                <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                                    <form action="<?= site_url('Daman/deleteOLT') ?>" method="post">
                                        <a href="<?= site_url('Daman/editOLT/' . $data->idOLT) ?>" class="btn btn-primary btn-xs disabled">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <input type="hidden" name="idOLT" value="<?= $data->idOLT ?>">
                                        <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID OLT</th>
                        <th>Hostname</th>
                        <th>IP GPON</th>
                        <th>ID Logical Device</th>
                        <th>STO</th>
                        <th>Specification OLT</th>
                        <th>Actions</th>
                </tfoot>
            </table>
        </div>
    </div>

</section>