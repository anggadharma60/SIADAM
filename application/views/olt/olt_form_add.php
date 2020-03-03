<section class="content-header">
    <h1>
        OLT
        <small>Data OLT</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">OLT</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah OLT</h3>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                    <a href="<?= site_url('Admin/getOLT') ?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php } ?>
                <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                    <a href="<?= site_url('Ondesk/getOLT') ?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-undo"></i> Back
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php //echo validation_errors() 
                    ?>
                    <form action="" method="post">
                        <div class="form-group <?= form_error('hostname') ? 'has-error' : null ?>">
                            <label>Hostname *</label>
                            <input type="text" name="hostname" value="<?= set_value('hostname') ?>" class="form-control">
                            <?= form_error('hostname') ?>
                        </div>
                        <div class="form-group <?= form_error('ipOLT') ? 'has-error' : null ?>">
                            <label>IP GPON *</label>
                            <input type="text" name="ipOLT" value="<?= set_value('ipOLT') ?>" class="form-control">
                            <?= form_error('ipOLT') ?>
                        </div>
                        <div class="form-group <?= form_error('idLogicalDevice') ? 'has-error' : null ?>">
                            <label>ID Logical Device *</label>
                            <input type="text" name="idLogicalDevice" value="<?= set_value('idLogicalDevice') ?>" class="form-control">
                            <?= form_error('idLogicalDevice') ?>
                        </div>
                        <div class="form-group <?= form_error('STO') ? 'has-error' : null ?>">
                            <label>STO *</label>
                            <select name="STO" class="form-control">
                                <option value="" selected="selected">- Pilih STO -</option>
                                <?php foreach ($sto->result() as $key => $STO) { ?>
                                    <option value="<?= $STO->idSTO ?>" <?= set_value('STO') == $STO->idSTO ? "selected" : null ?>><?= $STO->namaSTO ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?= form_error('STO') ?>
                        </div>
                        <div class="form-group <?= form_error('SpecOLT') ? 'has-error' : null ?>">
                            <label>Specificaton OLT *</label>
                            <select name="SpecOLT" class="form-control">
                                <option value="" selected="selected">- Pilih Specification OLT -</option>
                                <?php foreach ($spec->result() as $key => $spec) { ?>
                                    <option value="<?= $spec->idSpecOLT ?>" <?= set_value('SpecOLT') == $spec->idSpecOLT ? "selected" : null ?>><?= $spec->namaSpecOLT ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?= form_error('SpecOLT') ?>
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-success btn-flat">
                                <i class=""></i> Tambah
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>