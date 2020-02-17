var tabel = null;

    $(document).ready(function() {

        tabel = $('#tableODP').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        "processing": true,
        "serverSide": true,
        "sScrollY": "35em",//scroll tambahan y
        "sScrollX": "100%",//scroll tambahan x
        "bScrollCollapse": true,
            "ajax":
            {
              "url": "<?=base_url()?>index.php/Admin/loadDataODP", // URL file untuk proses select datanya
              "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[10, 25, 50, 75, 100],[10, 25, 50, 75, 100]], // Combobox Limit
            "columns": [
          { "data" : 'idODP' },
          { "data": 'idNOSS' },
          { "data": 'indexODP' },
          { "data": 'namaODP' },
          { "data": 'ftp' },
          { "data": 'latitude' },
          { "data": 'longitude' },
          { "data": 'clusterName' },
          { "data": 'clusterStatus' },
          { "data": 'avai' },
          { "data": 'used' },
          { "data": 'rsv' },
          { "data": 'rsk' },
          { "data": 'total' },
          { "data": 'namaRegional' },
          { "data": 'namaWitel' },
          { "data": 'namaDatel' },
          { "data": 'namaSTO' },
          { "data": 'infoODP' },
          { "data": 'updateDate' },
          { "render": function ( data, type, row ) { // Tampilkan kolom aksi
              var html  = "<div class='text-center'>"+
                          "<a href='<?=site_url()?>Admin/editODP/"+row.idODP+"' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a> " + 
                          " <a href='<?=site_url()?>Admin/deleteODP/"+row.idODP+"' onclick='return confirm(\"Anda yakin?\");' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a> "+
                          "</div>";

              return html
            }
              },
            ],
    });
    });