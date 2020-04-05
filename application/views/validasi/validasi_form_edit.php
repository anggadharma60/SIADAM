<section class="content-header">
  <h1>
    Validasi
    <small>Edit Data Validasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Validasi</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Validasi</h3>
      <div class="pull-right">
        <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
          <a href="<?= site_url('Admin/viewListValidasi') ?>" class="btn btn-danger btn-flat">
            <i class="fa fa-undo"></i> Back
          </a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
          <a `href="<?= site_url('Ondesk/viewListValidasi') ?>" class="btn btn-danger btn-flat">
            <i class="fa fa-undo"></i> Back
          </a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
          <a href="<?= site_url('HDDaman/viewListValidasi') ?>" class="btn btn-danger btn-flat">
            <i class="fa fa-undo"></i> Back
          </a>
        <?php  } ?>
        <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
          <a href="<?= site_url('SDI/viewListValidasi') ?>" class="btn btn-danger btn-flat">
            <i class="fa fa-undo"></i> Back
          </a>
        <?php } ?>
        <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
          <a href="<?= site_url('Dava/viewListValidasi') ?>" class="btn btn-danger btn-flat">
            <i class="fa fa-undo"></i> Back
          </a>
        <?php } ?>
      </div>
    </div>
    <!--end box header  -->
    <div class="box-body table-responsive">
      <form id="validasi" method="post" action="">
        <!-- Input ODP -->
        <div class="col-md-12">
          <fieldset>
            <legend>Input Data</legend>
            <div class="col-md-3">
              <div class="form-group <?= form_error('tanggalPelurusan') ? 'has-error' : null ?>">
                <label>Tanggal Pelurusan *</label>
                <div class="input-group input-daterange">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tanggalPelurusan" id="tanggalPelurusan" class="form-control pull-right" value="<?= $row->row(0)->tanggalPelurusan ?>" readonly="" />
                </div>
                <?= form_error('tanggalPelurusan') ?>
              </div>
            </div>

            <div class="row"></div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('ondesk') ? 'has-error' : null ?>">
                <label>Ondesk *</label>
                <input type="text" id="ondesk" name="ondesk" value="<?= $this->input->post('ondesk') ?? $row->row(0)->ondesk ?>" class="form-control" readonly="" style="text-align:center;">
                <?= form_error('ondesk') ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('onsite') ? 'has-error' : null ?>">
                <label>Onsite *</label>
                <input type="text" id="onsite" name="onsite" value="<?= $this->input->post('onsite') ?? $row->row(0)->onsite ?>" class="form-control" readonly="" style="text-align:center;">
                <!-- <select name="onsite[]" class="form-control select2"  multiple="multiple" data-placeholder="Select Onsite"
                        style="width: 100%;color:black;">
                  <?php foreach ($dataOnsite as $key => $ons) { ?>
                        <option value="<?= $ons->namaPegawai ?>" 
                        <?= set_value('onsite[0]') == $ons->namaPegawai ? "selected" : null ?>
                        <?= set_value('onsite[1]') == $ons->namaPegawai ? "selected" : null ?>>
                        <?= $ons->namaPegawai ?>
                        </option>
                      <?php } ?>
                </select> -->
                <?= form_error('onsite') ?>
              </div>
            </div>
          </fieldset>
        </div>
        <!-- End Input ODP -->

        <!-- Input Data ODP -->
        <div class="col-md-8">
          <fieldset>
            <legend>Data ODP</legend>
            <div class="col-md-4">
              <div class="form-group <?= form_error('namaODP') ? 'has-error' : null ?>">
                <label>Nama ODP *</label>
                <input type="text" id="namaODPedit" name="namaODP" value="<?= $this->input->post('namaODP') ?? $row->row(0)->namaODP ?>" class="form-control" readonly="" style="text-align:center;">
                <?= form_error('namaODP') ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('QRODP') ? 'has-error' : null ?>">
                <label>QR ODP</label>
                <input type="text" id="QRODP" name="QRODP" value="<?= $this->input->post('QRODP') ?? $row->row(0)->QRODP ?>" class="form-control" style="text-align:center;">
                <?= form_error('QRODP') ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group <?= form_error('koordinatODP') ? 'has-error' : null ?>">
                <label>Koordinat</label>
                <input type="text" id="koordinatODP" name="koordinatODP" value="<?= $this->input->post('koordinatODP') ?? $row->row(0)->koordinatODP ?>" class="form-control" style="text-align:center;">
                <?= form_error('koordinatODP') ?>
              </div>
            </div>
            <div class="row"></div>
            <div class="col-md-6">
              <div class="form-group <?= form_error('noteODP') ? 'has-error' : null ?>">
                <label>Note ODP</label>
                <textarea style="resize:none" name="noteODP" class="form-control" rows="3"><?= $this->input->post('noteODP') ?? $row->row(0)->noteODP ?></textarea>
                <?= form_error('noteODP') ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group <?= form_error('noteQRODP') ? 'has-error' : null ?>">
                <label>Note QR ODP</label>
                <textarea style="resize:none" name="noteQRODP" class="form-control" rows="3"><?= $this->input->post('noteQRODP') ?? $row->row(0)->noteQRODP ?></textarea>
                <?= form_error('noteQRODP') ?>
              </div>
            </div>
            <div class="row"></div>
            <div class="col-md-3">
              <div class="form-group <?= form_error('totalIN') ? 'has-error' : null ?>">
                <label>Total IN </label>
                <input type="text" name="totalIN" value="<?= $this->input->post('totalIN') ?? $row->row(0)->totalIN ?>" class="form-control" style="text-align:center;">
                <?= form_error('totalIN') ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group <?= form_error('kapasitasODP') ? 'has-error' : null ?>">
                <label>Kapasitas</label>
                <input id="kapasitasODP" type="text" name="kapasitasODP" value="<?= $this->input->post('kapasitasODP') ?? $row->row(0)->kapasitasODP ?>" class="form-control" style="text-align:center;">
                <?= form_error('kapasitasODP') ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group <?= form_error('jumlahPort') ? 'has-error' : null ?>">
                <label>Jumlah Data</label>
                <input id="jumlahPort" type="text" name="jumlahPort" value="<?= $row->num_rows() ?>" class="form-control" readonly style="text-align:center;">
                <?= form_error('jumlahPort') ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <br>
                <button class="btn btn-success btn-flat" id="btn-add" type="submit" style="margin-top:5px;height:33px;width:100%;">
                  <i class=""></i> Simpan
                </button>
              </div>
            </div>
          </fieldset>
        </div>
        <!-- End Input Data ODP -->

        <!-- Input Data OLT -->
        <div class="col-md-4">
          <fieldset>
            <legend>Data OLT</legend>
            <div class="col-md-8">
              <div class="form-group <?= form_error('namaOLT') ? 'has-error' : null ?>">
                <label>Nama OLT *</label>
                <!-- <select id="namaOLT" name="namaOLT" class="form-control select2"  data-placeholder="Select OLT"
                        style="width: 100%;color:black;">
                       
                </select> -->
                <input type="text" id="namaOLTedit" name="namaOLT" value="<?= $this->input->post('namaOLT') ?? $row->row(0)->hostname ?>" class="form-control" readonly="" style="text-align:center;">

                <?= form_error('namaOLT') ?>
              </div>
            </div>
            <div class="row"></div>
            <div class="col-md-8">
              <div class="form-group <?= form_error('portOLT') ? 'has-error' : null ?>">
                <label>Port OLT *</label>
                <input type="text" name="portOLT" value="<?= $this->input->post('portOLT') ?? $row->row(0)->portOLT ?>" class="form-control" style="text-align:center;">
                <?= form_error('portOLT') ?>
              </div>
            </div>
          </fieldset>

        </div>
        <!-- End Input Data OLT -->

        <!-- Data validasi -->
        <div class="col-md-12">
          <fieldset>
            <legend>Data Validasi</legend>
          </fieldset>
          <div id="validasitable" class="box-body table-responsive" style="height:200px;overflow-y: auto;">
            <table class="table table-responsive table-bordered table-hover">
              <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                <thead style="text-align:center">
                  <th> Port Out Splitter </th>
                  <th> QR Out Splitter </th>
                  <th> Port </th>
                  <th> Status </th>
                  <th> ONU </th>
                  <th> SN </th>
                  <th> Service </th>
                  <th> QR Dropcore </th>
                  <th> Note Urut </th>
                  <th> Flag OLT & Port </th>
                  <th> Connectivity ODP - OLT </th>
                  <th> ODP - ONT </th>
                  <th> RFS </th>
                  <th> Note HD Daman</th>
                  <th> Tanggal Update UIM </th>
                  <th> Updater UIM </th>
                  <th> Note QR Out Splitter </th>
                  <th> Note QR Dropcore </th>
                  <th> Updater Dava </th>
                </thead>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                <thead style="text-align:center">
                  <th> Port Out Splitter </th>
                  <th> QR Out Splitter </th>
                  <th> Port </th>
                  <th> Status </th>
                  <th> ONU </th>
                  <th> SN </th>
                  <th> Service </th>
                  <th> QR Dropcore </th>
                  <th> Note Urut </th>
                  <th> Flag OLT & Port </th>
                </thead>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                <thead style="text-align:center">
                  <th> ODP - ONT </th>
                  <th> RFS </th>
                  <th> Note HD Daman</th>
                </thead>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                <thead style="text-align:center">
                  <th> Connectivity ODP - OLT </th>
                </thead>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                <thead style="text-align:center">
                  <th> QR Out Splitter </th>
                  <th> QR Dropcore </th>
                  <th> Note QR Out Splitter </th>
                  <th> Note QR Dropcore </th>
                </thead>
              <?php } ?>
              <tbody>
                <?php $no = 0;
                foreach ($row->result() as $key => $data) { ?>
                  <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                    <tr>
                      <td>
                        <div class="form-group <?= form_error('portOutSplitter['.$no.']') ? 'has-error' : null ?>">
                          <input type="hidden" class="form-control" id="id" name="id[]" value="<?= $data->id ?>" style="text-align:center;" />
                          <input type="text" class="form-control" id="portOutSplitter" name="portOutSplitter[]" value="<?= $this->input->post('portOutSplitter['.$no.']') ?? $data->portOutSplitter ?>" style="text-align:center;" maxlength=10 />
                          <?= form_error('portOutSplitter['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('QROutSplitter['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="QROutSplitter" name="QROutSplitter[]" value="<?= $this->input->post('QROutSplitter['.$no.']') ?? $data->QRPortOutSplitter ?>" style="width:225px;text-align:center;" maxlength=16 />
                          <?= form_error('QROutSplitter['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('port['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="port" name="port[]" value="<?= $this->input->post('port['.$no.']') ?? $data->portODP ?>" style="width:50px;text-align:center;" maxlength=10 />
                          <?= form_error('port['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('status['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="status" name="status[]" value="<?= $this->input->post('status['.$no.']') ?? $data->statusPortODP ?>" style="width:225px;text-align:center;" maxlength=35 />
                          <?= form_error('status['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('ONU['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="ONU" name="ONU[]" value="<?= $this->input->post('ONU['.$no.']') ?? $data->ONU ?>" style="width:225px;text-align:center;" maxlength=30 />
                          <?= form_error('ONU['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('serialNumber['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="serialNumber" name="serialNumber[]" value="<?= $this->input->post('serialNumber['.$no.']') ?? $data->serialNumber ?>" style="width:225px;text-align:center;" maxlength=55 />
                          <?= form_error('serialNumber['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('service['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="service" name="service[]" value="<?= $this->input->post('service['.$no.']') ?? $data->serviceNumber ?>" style="width:225px;text-align:center;" maxlength=55 />
                          <?= form_error('service['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('QRDropCore['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="QRDropCore" name="QRDropCore[]" value="<?= $this->input->post('QRDropCore['.$no.']') ?? $data->QRDropCore ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('QRDropCore['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteUrut['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteUrut[]" class="form-control" rows="2" maxlength=100><?= $this->input->post('noteUrut['.$no.']') ?? $data->noteUrut ?></textarea>
                          <?= form_error('noteUrut['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('flagOLTPort['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="flagOLTPort" name="flagOLTPort[]" value="<?= $this->input->post('flagOLTPort['.$no.']') ?? $data->flagOLTPort ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('flagOLTPort['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('ODPtoOLT['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="ODPtoOLT" name="ODPtoOLT[]" value="<?= $this->input->post('ODPtoOLT['.$no.']') ?? $data->ODPtoOLT ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('ODPtoOLT['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('ODPtoONT['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="ODPtoONT" name="ODPtoONT[]" value="<?= $this->input->post('ODPtoONT['.$no.']') ?? $data->ODPtoONT ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('ODPtoONT['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('RFS['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="RFS" name="RFS[]" value="<?= $this->input->post('RFS['.$no.']') ?? $data->RFS ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('RFS['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteHDDaman['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteHDDaman[]" class="form-control" rows="2" maxlength=100><?= $this->input->post('noteHDDaman['.$no.']') ?? $data->noteHDDaman ?></textarea>
                          <?= form_error('noteHDDaman['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('updateDateUIM['.$no.']') ? 'has-error' : null ?>">
                          <div class="input-group input-daterange">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="updateDateUIM[]" id="updateDateUIM" class="form-control pull-right" value="<?= $this->input->post('updateDateUIM['.$no.']') ?? $data->updateDateUIM ?>" readonly="" style="width:175px" />
                          </div>
                          <?= form_error('updateDateUIM['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('updaterUIM['.$no.']') ? 'has-error' : null ?>">
                          <select class="form-control" id="updaterUIM" name="updaterUIM[]" value="<?= $this->input->post('updaterUIM['.$no.']') ?? $data->updaterUIM ?>" style="width:225px">
                            <option value="<?= $data->updaterUIM ?>" selected="selected"><?= $data->updaterUIM ?></option>
                          </select>
                          <?= form_error('updaterUIM['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteQROutSplitter['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteQROutSplitter[]" class="form-control" rows="2" maxlength=45><?= $this->input->post('noteQROutSplitter['.$no.']') ?? $data->noteQROutSplitter ?></textarea>
                          <?= form_error('noteQROutSplitter['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteQRDropCore['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteQRDropCore[]" class="form-control" rows="2" maxlength=45><?= $this->input->post('noteQRDropCore['.$no.']') ?? $data->noteQRDropCore ?></textarea>
                          <?= form_error('noteQRDropCore['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('updaterDava['.$no.']') ? 'has-error' : null ?>">
                          <select class="form-control" id="updaterDava" name="updaterDava[]" value="<?= $this->input->post('updaterDava['.$no.']') ?? $data->updaterDava ?>" style="width:225px">
                            <option value="<?= $data->updaterDava ?>" selected="selected"><?= $data->updaterDava ?></option>
                          </select>
                          <?= form_error('updaterDava['.$no.']') ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                    <tr>
                    <td>
                        <div class="form-group <?= form_error('portOutSplitter['.$no.']') ? 'has-error' : null ?>">
                          <input type="hidden" class="form-control" id="id" name="id[]" value="<?= $data->id ?>" style="text-align:center;" />
                          <input type="text" class="form-control" id="portOutSplitter" name="portOutSplitter[]" value="<?= $this->input->post('portOutSplitter['.$no.']') ?? $data->portOutSplitter ?>" style="text-align:center;" maxlength=10 />
                          <?= form_error('portOutSplitter['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('QROutSplitter['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="QROutSplitter" name="QROutSplitter[]" value="<?= $this->input->post('QROutSplitter['.$no.']') ?? $data->QRPortOutSplitter ?>" style="width:225px;text-align:center;" maxlength=16 />
                          <?= form_error('QROutSplitter['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('port['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="port" name="port[]" value="<?= $this->input->post('port['.$no.']') ?? $data->portODP ?>" style="width:50px;text-align:center;" maxlength=10 />
                          <?= form_error('port['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('status['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="status" name="status[]" value="<?= $this->input->post('status['.$no.']') ?? $data->statusPortODP ?>" style="width:225px;text-align:center;" maxlength=35 />
                          <?= form_error('status['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('ONU['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="ONU" name="ONU[]" value="<?= $this->input->post('ONU['.$no.']') ?? $data->ONU ?>" style="width:225px;text-align:center;" maxlength=30 />
                          <?= form_error('ONU['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('serialNumber['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="serialNumber" name="serialNumber[]" value="<?= $this->input->post('serialNumber['.$no.']') ?? $data->serialNumber ?>" style="width:225px;text-align:center;" maxlength=55 />
                          <?= form_error('serialNumber['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('service['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="service" name="service[]" value="<?= $this->input->post('service['.$no.']') ?? $data->serviceNumber ?>" style="width:225px;text-align:center;" maxlength=55 />
                          <?= form_error('service['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('QRDropCore['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="QRDropCore" name="QRDropCore[]" value="<?= $this->input->post('QRDropCore['.$no.']') ?? $data->QRDropCore ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('QRDropCore['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteUrut['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteUrut[]" class="form-control" rows="2" maxlength=100><?= $this->input->post('noteUrut['.$no.']') ?? $data->noteUrut ?></textarea>
                          <?= form_error('noteUrut['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('flagOLTPort['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="flagOLTPort" name="flagOLTPort[]" value="<?= $this->input->post('flagOLTPort['.$no.']') ?? $data->flagOLTPort ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('flagOLTPort['.$no.']') ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                    <tr>
                    <td>
                        <div class="form-group <?= form_error('ODPtoONT['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="ODPtoONT" name="ODPtoONT[]" value="<?= $this->input->post('ODPtoONT['.$no.']') ?? $data->ODPtoONT ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('ODPtoONT['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('RFS['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="RFS" name="RFS[]" value="<?= $this->input->post('RFS['.$no.']') ?? $data->RFS ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('RFS['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteHDDaman['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteHDDaman[]" class="form-control" rows="2" maxlength=100><?= $this->input->post('noteHDDaman['.$no.']') ?? $data->noteHDDaman ?></textarea>
                          <?= form_error('noteHDDaman['.$no.']') ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                    <tr>
                      <td>
                        <div class="form-group <?= form_error('ODPtoOLT['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="ODPtoOLT" name="ODPtoOLT[]" value="<?= $this->input->post('ODPtoOLT['.$no.']') ?? $data->ODPtoOLT ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('ODPtoOLT['.$no.']') ?>
                        </div>
                      </td> 
                    </tr>
                  <?php } ?>
                  <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                    <tr>
                      <td>
                        <div class="form-group <?= form_error('QROutSplitter['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="QROutSplitter" name="QROutSplitter[]" value="<?= $this->input->post('QROutSplitter['.$no.']') ?? $data->QRPortOutSplitter ?>" style="width:225px;text-align:center;" maxlength=16 />
                          <?= form_error('QROutSplitter['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('QRDropCore['.$no.']') ? 'has-error' : null ?>">
                          <input type="text" class="form-control" id="QRDropCore" name="QRDropCore[]" value="<?= $this->input->post('QRDropCore['.$no.']') ?? $data->QRDropCore ?>" style="width:225px;text-align:center;" maxlength=40 />
                          <?= form_error('QRDropCore['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteQROutSplitter['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteQROutSplitter[]" class="form-control" rows="2" maxlength=45><?= $this->input->post('noteQROutSplitter['.$no.']') ?? $data->noteQROutSplitter ?></textarea>
                          <?= form_error('noteQROutSplitter['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                        <div class="form-group <?= form_error('noteQRDropCore['.$no.']') ? 'has-error' : null ?>">
                          <textarea style="width:225px;resize:none" name="noteQRDropCore[]" class="form-control" rows="2" maxlength=45><?= $this->input->post('noteQRDropCore['.$no.']') ?? $data->noteQRDropCore ?></textarea>
                          <?= form_error('noteQRDropCore['.$no.']') ?>
                        </div>
                      </td>
                      <td>
                    </tr>
                  <?php } ?>
                <?php $no += 1;
                } ?>
              </tbody>
              <?php if ($this->fungsi->user_login()->status == 'Admin') { ?>
                <tfoot style="text-align:center">
                  <th> Port Out Splitter </th>
                  <th> QR Out Splitter </th>
                  <th> Port </th>
                  <th> Status </th>
                  <th> ONU </th>
                  <th> SN </th>
                  <th> Service </th>
                  <th> QR Dropcore </th>
                  <th> Note Urut </th>
                  <th> Flag OLT & Port </th>
                  <th> Connectivity ODP - OLT </th>
                  <th> ODP - ONT </th>
                  <th> RFS </th>
                  <th> Note HD Daman</th>
                  <th> Tanggal Update UIM </th>
                  <th> Updater UIM </th>
                  <th> Note QR Out Splitter </th>
                  <th> Note QR Dropcore </th>
                  <th> Updater Dava </th>
                </tfoot>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'Ondesk') { ?>
                <tfoot style="text-align:center">
                  <th> Port Out Splitter </th>
                  <th> QR Out Splitter </th>
                  <th> Port </th>
                  <th> Status </th>
                  <th> ONU </th>
                  <th> SN </th>
                  <th> Service </th>
                  <th> QR Dropcore </th>
                  <th> Note Urut </th>
                  <th> Flag OLT & Port </th>
                </tfoot>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'HD Daman') { ?>
                <tfoot style="text-align:center">
                  <th> ODP - ONT </th>
                  <th> RFS </th>
                  <th> Note HD Daman</th>
                </tfoot>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'SDI') { ?>
                <tfoot style="text-align:center">
                  <th> Connectivity ODP - OLT </th>
                </tfoot>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->status == 'Dava') { ?>
                <tfoot style="text-align:center">
                  <th> QR Out Splitter </th>
                  <th> QR Dropcore </th>
                  <th> Note QR Out Splitter </th>
                  <th> Note QR Dropcore </th>
                </tfoot>
              <?php } ?>
            </table>
          </div>
        </div>
        <!-- End Data validasi -->

        <!-- <div class="container">
              <div id="dvMain">
                  <label id="lblNoOfRec"> Enter Value For Create No Of Rows </label>
                  <input type="text" id="txtNoOfRec" />
                  <input type="button" value="CREATE" id="btnNoOfRec" />
              </div>
              <br />
              <div id="AddControll">

              </div>
        </div> -->
        <div class="col-md-12">
          <fieldset>
            <legend></br>Tambah Port</legend>
          </fieldset>
          <div class="col-md-3"></div>
          <div class="col-md-2">
            <div class="form-group">
              <br>
              <input class="btn btn-primary btn-flat" type="button" value="Generate" id="btnNoOfRecEdit" style="margin-top:5px;height:33px;width:100%;" />
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group <?= form_error('newPort') ? 'has-error' : null ?>">
              <label>Jumlah Data Baru</label>
              <input id="txtNoOfRec" type="text" name="newPort" value="<?= set_value('newPort') ?>" class="form-control" style="text-align:center;">
              <?= form_error('newPort') ?>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <br>
              <button class="btn btn-success btn-flat" id="btn-add" type="submit" style="margin-top:5px;height:33px;width:100%;">
                <i class=""></i> Tambah
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-12">
        </div>
        <div id="AddControllEdit" class="box-body table-responsive" style="height:200px;overflow-y: auto;">
        </div>
    </div>
    </form>



  </div>
  <!-- end box body  -->

  </div>
  <!-- end box -->


  <script>

  </script>