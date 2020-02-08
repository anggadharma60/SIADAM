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

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Witel</h3>
        <div class="pull-right">
            <a href="<?=site_url('Admin/addWitel')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-user-plus"></i> Create 
            </a>
        </div>
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
                foreach($row->result() as $key => $data) { ?>
                <tr>
                    <td><?=$data->idWitel?></td>
                    <!-- <td><?=$data->NIP?></td> -->
                    <td><?=$data->namaWitel?></td>
                    <td><?=$data->keterangan?></td>
                    <td><?=$data->namaRegional?></td>
                    <td class="text-center" width="160px">
                      <form action="<?=site_url('Admin/deleteWitel')?>" method="post">
                          <a href="<?=site_url('Admin/editWitel/'.$data->idWitel)?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i>  
                          </a>
                          <input type="hidden" name="idWitel" value="<?=$data->idWitel?>">
                          <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i>  
                          </button>
                        </form>
                    </td>
                </tr>
                <?php
                } ?>
              </tbody>
          </table>
      </div>
  </div>

</section>