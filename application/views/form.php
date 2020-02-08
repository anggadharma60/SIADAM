<html>
<head>
  <title>Form Import</title>
  
  <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
  
  <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
</head>
<body>
  <h3>Form Import</h3>
  <hr>
  
  <a href="<?php echo base_url("excel/default.xlsx"); ?>">Download Format</a>
  <br>
  <br>
  
  <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  <form method="post" action="<?php echo base_url("Import_ODP/form"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file">
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
    <input type="submit" name="preview" value="Preview">
  </form>
  
  <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("Import_ODP/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";
    
    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
        <th>ID NOSS</th>
        <th>index ODP</th>
        <th>ID ODP</th>
        <th>FTP</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Cluster Name</th>
        <th>Cluster Status</th>
        <th>Available</th>
        <th>Used</th>
        <th>RSV</th>
        <th>RSK</th>
        <th>Total</th>
        <th>ID Regional</th>
        <th>ID Witel</th>
        <th>ID Datel</th>
        <th>ID STO</th>
        <th>Info ODP</th>
        <th>Update Date</th>
    </tr>";
    
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $idNOSS            =  $row['A'];
      $indexODP          =  $row['B'];
      $idODP             =  $row['C'];
      $ftp               =  $row['E'];
      $latitude          =  $row['F'];
      $longitude         =  $row['G'];
      $clusterName       =  $row['H'];
      $clusterStatus     =  $row['I'];
      $avai              =  $row['J'];
      $used              =  $row['K'];
      $rsv               =  $row['L'];
      $rsk               =  $row['M'];
      $total             =  $row['N'];
      $idRegional        =  $row['O'];
      $idWitel           =  $row['P'];
      $idDatel           =  $row['Q'];
      $idSTO             =  $row['R'];
      $infoODP           =  $row['T'];
      $updateDate        =  $row['U'];

      
      // Cek jika semua data tidak diisi
      if($idNOSS == "" && $indexODP == "" && $idODP == "" && $ftp == "" && $latitude == "" && $longitude == "" && $clusterName == "" && $clusterStatus == "" && $avai == "" && $used == "" && $rsv == "" && $rsk == "" && $total == "" && $idRegional == "" && $idWitel == "" && $idDatel == "" && $idSTO == "" && $infoODP == "" && $updateDate == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $idNOSS_td = ( ! empty($idNOSS))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $indexODP_td = ( ! empty($indexODP))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $idODP_td = ( ! empty($idODP))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $ftp_td = ( ! empty($ftp))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $latitude_td = ( ! empty($latitude))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $longitude_td = ( ! empty($longitude))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $clusterName_td = ( ! empty($clusterName))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $clusterStatus_td = ( ! empty($clusterStatus))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $avai_td = ( ! empty($avai))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $used_td = ( ! empty($used))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $rsv_td = ( ! empty($rsv))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $rsk_td = ( ! empty($rsk))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $total_td = ( ! empty($total))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $idRegional_td = ( ! empty($idRegional))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $idWitel_td = ( ! empty($idWitel))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $idDatel_td = ( ! empty($idDatel))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $idSTO_td = ( ! empty($idSTO))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $infoODP_td = ( ! empty($infoODP))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $updateDate_td = ( ! empty($updateDate))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        
        // Jika salah satu data ada yang kosong
        if($idNOSS == "" && $indexODP == "" && $idODP == "" && $ftp == "" && $latitude == "" && $longitude == "" && $clusterName == "" && $clusterStatus == "" && $avai == "" && $used == "" && $rsv == "" && $rsk == "" && $total == "" && $idRegional == "" && $idWitel == "" && $idDatel == "" && $idSTO == "" && $infoODP == "" && $updateDate == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td".$idNOSS_td.">".$idNOSS."</td>";
        echo "<td".$indexODP_td.">".$indexODP."</td>";
        echo "<td".$idODP_td.">".$idODP."</td>";
        echo "<td".$ftp_td.">".$ftp."</td>";
        echo "<td".$latitude_td.">".$latitude."</td>";
        echo "<td".$longitude_td.">".$longitude."</td>";
        echo "<td".$clusterName_td.">".$clusterName."</td>";
        echo "<td".$clusterStatus_td.">".$clusterStatus."</td>";
        echo "<td".$avai_td.">".$avai."</td>";
        echo "<td".$used_td.">".$used."</td>";
        echo "<td".$rsv_td.">".$rsv."</td>";
        echo "<td".$rsk_td.">".$rsk."</td>";
        echo "<td".$total_td.">".$total."</td>";
        echo "<td".$idRegional_td.">".$idRegional."</td>";
        echo "<td".$idWitel_td.">".$idWitel."</td>";
        echo "<td".$idDatel_td.">".$idDatel."</td>";
        echo "<td".$idSTO_td.">".$idSTO."</td>";
        echo "<td".$infoODP_td.">".$infoODP."</td>";
        echo "<td".$updateDate_td.">".$updateDate."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='".base_url("admin/getODP")."'>Cancel</a>";
    }
    
    echo "</form>";
  }
  ?>
</body>
