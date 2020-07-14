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
                <div class="col-md-8 col-md-offset-2">
                    <?php $hostname = $this->input->post('STO');
                    print_r($hostname);
                    ?>
                    <form action="" method="post">
                        
                        <div class="form-group <?= form_error('hostname[]') ? 'has-error' : null ?> <?= form_error('temp') ? 'has-error' : null ?>">
                            <label>Hostname *</label>
                            <!-- <input type="text" id="hostname" name="hostname" value="<?= set_value('hostname') ?>" class="form-control"> -->
                            <div class="input-group">
                                <input id="hostname0" list="pon" type="text" name="hostname[]" value="<?= set_value('hostname[0]') ?>" class="form-control" style="text-align:center" maxlength=4>
                                <datalist id="pon">
                                    <option value="GPON">
                                </datalist>
                                <span type="hidden" class="input-group-addon"></span>
                                <input id="hostname4" type="number" min="0" max="16" name="hostname[]" value="<?= set_value('hostname[1]') ?>"  class="form-control" style="text-align:center" maxlength=2>
                                <span type="text" class="input-group-addon">-</span>
                                <input id="hostname1" type="text" name="hostname[]" value="<?= set_value('hostname[2]') ?>"  class="form-control" style="text-align:center" maxlength=2 readonly>
                                <span class="input-group-addon">-</span>
                                <input id="hostname2" type="text" name="hostname[]" value="<?= set_value('hostname[3]') ?>"  class="form-control" style="text-align:center" maxlength=5 readonly>
                                <span class="input-group-addon">-</span>
                                <input id="hostname3" type="number" min="1" max="16" name="hostname[]" value="<?= set_value('hostname[4]') ?>" class="form-control" style="text-align:center" maxlength="2" >
                            </div>
                            <?= form_error('hostname[]') ?>
                            <?= form_error('temp') ?>
                            <input id="hostname" type="text" name="temp" value="<?= set_value('temp') ?>" class="form-control" style="text-align:center" readonly>
                        </div>
                        <div class="form-group <?= form_error('regional') ? 'has-error' : null ?>">
                            <label>Regional *</label>
                            <select id="regional" name="regional" class="form-control">
                                <option value="" selected="selected">- Pilih Regional -</option>
                                <?php foreach ($regional->result() as $key => $regional) { ?>
                                    
                                    <!-- <option value="<?= $regional->idRegional ?>"><?= $regional->namaRegional ?> -->
                                    <option value="<?= $regional->idRegional ?>" <?= set_value('regional') == $regional->idRegional ? "selected" : null ?>><?= $regional->namaRegional ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?= form_error('regional') ?>
                        </div>
                        <div class="form-group <?= form_error('STO') ? 'has-error' : null ?>">
                            <label>STO *</label>
                            <select id="STO" name="STO" class="form-control">
                                <option value="" selected="selected">- Pilih STO -</option>
                                <option value="<?=set_value('STO')?>" selected="selected"><?=set_value('STO')?></option>
                            </select>
                            <?= form_error('STO') ?>
                        </div>
                        <div class="form-group <?= form_error('ipOLT') ? 'has-error' : null ?>">
                            <label>IP GPON *</label>
                            <input type="text" id="ipOLT" name="ipOLT" value="<?= set_value('ipOLT') ?>" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                            <?= form_error('ipOLT') ?>
                        </div>
                        <div class="form-group <?= form_error('idLogicalDevice') ? 'has-error' : null ?>">
                            <label>ID Logical Device *</label>
                            <input type="text" name="idLogicalDevice" value="<?= set_value('idLogicalDevice') ?>" class="form-control">
                            <?= form_error('idLogicalDevice') ?>
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