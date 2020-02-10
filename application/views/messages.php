<!-- penggunaan if jika ada yg gunain -->
<?php if ($this->session->has_userdata('danger')) { ?>

<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i> <?=$this->session->flashdata('danger');?>
</div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-error alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i> <?=strip_tags(str_replace('</P>', '', $this->session->flashdata('error')));?>
    </div>

<?php } ?>
