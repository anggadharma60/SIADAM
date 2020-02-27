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
                    // "<th> Tanggal Update UIM </th>"+
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
                        "<input type='text' class='form-control' id='QROutSplitterr' name='QROutSplitter[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='port' name='port[]' value='"+i+"' readonly style='width:50px;text-align:center;'  />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='status' name='status[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='ONU' name='ONU[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='serialNumber' name='serialNumber[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='service' name='service[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='QRDropCore' name='QRDropCore[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='noteUrut' name='noteUrut[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='flagOLTPort' name='flagOLTPort[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='ODPtoOLT' name='ODPtoOLT[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='ODPtoONT' name='ODPtoONT[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='RFS' name='RFS[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='noteHDDaman' name='noteHDDaman[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    // "<td>"+
                    //     "<input type='text' class='form-control' id='updateDateUIM' name='updateDateUIM[]' value='' style='width:225px' />"+
                    // "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='updaterUIM' name='updaterUIM[]' value='' style='width:225px' />"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='noteQROutSplitter' name='noteQROutSplitter[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    "<td>"+
                        "<textarea class='form-control' id='noteQRDropCore' name='noteQRDropCore[]' rows='2' style='resize:none;width:225px'></textarea>"+
                    "</td>"+
                    "<td>"+
                        "<input type='text' class='form-control' id='updaterDava' name='updaterDava[]' value='' style='width:225px' />"+
                    "</td>"+
                "</tr>";
            
               
                
    }           
    tbl += "</tbody>"+"</table>";

    $("#AddControll").append(tbl);
    
   
}