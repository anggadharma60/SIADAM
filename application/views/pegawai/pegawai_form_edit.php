<section class="content-header">
  <h1>
    Pegawai
    <small>Data Pegawai</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Pegawai</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Pegawai</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getPegawai')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
      </div>
      <div class="box-body">
         <div class="row">
             <div class="col-md-4 col-md-offset-4">
                <form action="" method="post"> 
                    <div class="form-group <?=form_error('namaPegawai') ? 'has-error' : null?>">
                        <label>Nama *</label>
                        <input type="hidden" name="idPegawai" value="<?=$row->idPegawai?>">
                        <input type="text" name="namaPegawai" value="<?=$this->input->post('namaPegawai') ?? $row->namaPegawai?>" class="form-control"> 
                        <?=form_error('namaPegawai')?>
                    </div>
                    <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
                        <label>Username *</label>
                        <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>" class="form-control">
                        <?=form_error('username')?>
                    </div>
                    <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
                        <label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                        <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                        <?=form_error('password')?>
                    </div>
                    <div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
                        <label>Password Confirmation</label>
                        <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                        <?=form_error('passconf')?>
                    </div>
                    <div class="form-group <?=form_error('status') ? 'has-error' : null?>">
                        <label>Status *</label>
                        <select name="status" class="form-control">
                            <?php $status = $this->input->post('status') ?? $row->status?>
                            <option value="Admin" <?=$status == "Admin" ? 'selected' : null ?>>Admin</option>
                            <option value="Daman" <?=$status == "Daman" ? 'selected' : null ?>>Daman</option>
                            <option value="HD Daman" <?=$status == "HD Daman" ? 'selected' : null ?>>HD Daman</option>
                            <option value="Dava" <?=$status == "Dava" ? 'selected' : null ?>>Dava</option>
                            <option value="SDI" <?=$status == "SDI" ? 'selected' : null ?>>SDI</option>
                            <option value="Ondesk" <?=$status == "Ondesk" ? 'selected' : null ?>>Ondesk</option>
                            <option value="Onsite" <?=$status == "Onsite" ? 'selected' : null ?>>Onsite</option>
                        </select>
                        <?=form_error('status')?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                </form>
             </div>
         </div>
      </div>
  </div>

</section>