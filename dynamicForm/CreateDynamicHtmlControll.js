// JavaScript source code

$(document).ready(function () {
    load();
});

function load() {
    //alert("Working...");
    $("#txtNoOfRec").focus();

    $("#btnNoOfRec").click(function () {
        $("#AddControll").empty();
        var NoOfRec = $("#txtNoOfRec").val();

        //alert("" + NoOfRec);

        if (NoOfRec > 0) {
            createControll(NoOfRec);
        }
    });    
}

function createControll(NoOfRec) {
    var tbl = "";

    tbl = 
            "<table class='table table-responsive table-bordered table-hover'>"+
                "<thead style='text-align:center'>"+
                    "<th> Port Out Splitter </th>"+
                    "<th> QR Out Splitter </th>"+
                    "<th> Port </th>"+
                    "<th> Status </th>"+
                    "<th> ONU </th>"+
                    "<th> SN </th>"+
                    "<th> Service </th>"+
                    "<th> QR Dropcore </th>"+
                    "<th> Note Urut </th>"+
                    "<th> Flag OLT & Port </th>"+
                    "<th> Connectivity ODP - OLT </th>"+
                    "<th> ODP - ONT </th>"+
                    "<th> RFS </th>"+
                    "<th> Note </th>"+
                    "<th> Tanggal Update UIM </th>"+
                    "<th> Updater UIM </th>"+
                    "<th> QR Out Splitter </th>"+
                    "<th> QR Dropcore </th>"+
                    "<th> Updater Dava </th>"+
                "</thead>"+
                "<tbody>";

    for (i = 1; i <= NoOfRec; i++) {
        tbl += 
            
                "<tr>" +    
                    "<td>"+
                        "<input type='text' class='form-control' id='portOutSplitter' name='portOutSplitter[]' value='"+i+"' readonly style='text-align:center;'/>"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='outsplitter' name='outsplitter[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='port' name='port[]' value='"+i+"' readonly style='width:50px;text-align:center;'  />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='status' name='status[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='onu' name='onu[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='sn' name='serialnumber[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='service' name='service[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='dropcore' name='dropcore[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='noteurut' name='noteurut[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='flag' name='flag[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='odptoolt' name='odptoolt[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='odptont' name='odptont[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='rfs' name='rfs[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='notehddaman' name='notehaddaman[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='updateuim' name='updateuim[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='updateruim' name='updateruim[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='noteqros' name='noteqros[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='noteqrdc' name='noteqrdc[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='updaterdava' name='updaterdava[]' value='' style='width:225px' />"+
                    "</td>"+
                "</tr>";
            
                console.log(i);
                
    }           
    tbl += "</tbody>"+"</table>";

    $("#AddControll").append(tbl);
   
}