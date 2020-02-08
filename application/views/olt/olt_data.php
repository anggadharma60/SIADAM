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

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data OLT</h3>
            <div class="pull-right">
                <a href="#" class="btn btn-danger btn-flat">
                    <i class="fa fa-upload  "></i> Export
                </a>
                <a href="#" class="btn btn-success btn-flat">
                    <i class="fa fa-download"></i> Import
                </a>
                <a href="<?= site_url('Admin/addOLT') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <!-- id="table1" buat searching pagination dan row -->
            <table class="table table-bordered table-striped" border="1" cellpadding="8" id="table1">
                <thead>
                    <tr>
                        <th>HOSTNAME</th>
                        <th>IP GPON</th>
                        <th>ID Logical Device</th>
                        <th>ID STO</th>
                        <th>ID Specification OLT</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $data->hostname ?></td>
                            <td><?= $data->ipOLT ?></td>
                            <td><?= $data->idLogicalDevice ?></td>
                            <td><?= $data->idSTO ?></td>
                            <td><?= $data->idSpecOLT ?></td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('Admin/deleteOLT') ?>" method="post">
                                    <a href="<?= site_url('Admin/detailOLT/' . $data->hostname) ?>" class="btn btn-default btn-xs">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="<?= site_url('Admin/editOLT/' . $data->hostname) ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <input type="hidden" name="idOLT" value="<?= $data->hostname ?>">
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
                        <th>HOSTNAME</th>
                        <th>IP GPON</th>
                        <th>ID Logical Device</th>
                        <th>ID STO</th>
                        <th>ID Specification OLT</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</section>