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
        <h3 class="box-title">Detail Pegawai</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/getPegawai')?>" class="btn btn-danger btn-flat">
                <i class="fa fa-undo"></i> Back 
            </a>
        </div>
        <table class="table">
          <tr>
            <th style="width: 30%">ID Pegawai</th>
            <td><?php echo $detailPegawai->idPegawai ?></td>
          </tr>
          <tr>
            <th>Nama Pegawai</th>
            <td><?php echo $detailPegawai->namaPegawai ?></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><?php echo $detailPegawai->username ?></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><?php echo base64_decode($detailPegawai->password) ?></td>
          </tr>
          <tr>
            <th>Status</th>
            <td><?php echo $detailPegawai->status ?></td>
          </tr>
        </table>
      </div>
  </div>

</section>