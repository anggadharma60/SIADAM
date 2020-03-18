 // JavaScript source code

 function load() {
    //alert("Working...");
    $("#txtNoOfRec").focus();
   

    $("#btnNoOfRec").click(function () {
        $("#AddControll").empty();
     
        var NoOfRec = $("#txtNoOfRec").val();

        //alert("" + NoOfRec);

        if (NoOfRec >= 0) {
            createControll(NoOfRec);
            
        }  
    });
}

function createControll(NoOfRec) {
    var tbl = "";
    
    tbl = 
            "<table class='table table-responsive table-bordered table-hover' >"+
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
                    "<th> Note QR Out Splitter </th>"+
                    "<th> Note QR Dropcore </th>"+
                    "<th> Updater Dava </th>"+
                "</thead>"+
                "<tbody>";
    if(!isNaN(NoOfRec)){
        for (i = 1; i <= NoOfRec; i++) {
            tbl += 
            "<tr>" +    
                "<td>"+
                    "<input type='text' class='form-control' id='portOutSplitter' name='portOutSplitter[]' value='"+i+"' readonly style='text-align:center;'/>"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='QROutSplitter' name='QROutSplitter[]' value='' style='width:225px' maxlength=16/>"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='port' name='port[]' value='"+i+"' readonly style='width:50px;text-align:center;'  />"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='status' name='status[]' value='' style='width:225px' /maxlength=35>"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='ONU' name='ONU[]' value='' style='width:225px' maxlength=30/>"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='serialNumber' name='serialNumber[]' value='' style='width:225px' maxlength=55/>"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='service' name='service[]' value='' style='width:225px' maxlength=55 />"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='QRDropCore' name='QRDropCore[]' value='' style='width:225px' maxlength=40/>"+
                "</td>"+
                "<td>"+
                    "<textarea class='form-control' id='noteUrut' name='noteUrut[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='flagOLTPort' name='flagOLTPort[]' value='' style='width:225px' maxlength=40/>"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='ODPtoOLT' name='ODPtoOLT[]' value='' style='width:225px' maxlength=40 />"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='ODPtoONT' name='ODPtoONT[]' value='' style='width:225px' maxlength=40 />"+
                "</td>"+
                "<td>"+
                    "<input type='text' class='form-control' id='RFS' name='RFS[]' value='' style='width:225px' maxlength=40/>"+
                "</td>"+
                "<td>"+
                    "<textarea class='form-control' id='noteHDDaman' name='noteHDDaman[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
                "</td>"+
                "<td>"+
                "<div class='input-group input-daterange'>"+
                        "<div class='input-group-addon'>"+
                        "<i class='fa fa-calendar'></i>"+
                        "</div>"+
                        "<input type='text' name='updateDateUIM[]' id='updateDateUIM' class='form-control pull-right datepicker' value='' readonly='' style='width:175px'/>"+
                "</div>"+
                "</td>"+
                "<td>"+
                    "<select type='text' class='form-control' id='updaterUIM' name='updaterUIM[]' value='' style='width:225px' /></select>"+
                "</td>"+
                "<td>"+
                    "<textarea class='form-control' id='noteQROutSplitter' name='noteQROutSplitter[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
                "</td>"+
                "<td>"+
                    "<textarea class='form-control' id='noteQRDropCore' name='noteQRDropCore[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
                "</td>"+
                "<td>"+
                    "<select type='text' class='form-control' id='updaterDava' name='updaterDava[]' value='' style='width:225px' /></select>"+
                "</td>"+
            "</tr>";
        }
    }
    if(NoOfRec == 0){
        tbl += 
    "<tr>" +    
        "<td>"+
            "<input type='text' class='form-control' id='portOutSplitter' name='portOutSplitter[]' value='' readonly style='text-align:center;'/>"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='QROutSplitter' name='QROutSplitter[]' value='' style='width:225px' maxlength=16/>"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='port' name='port[]' value='' readonly style='width:50px;text-align:center;'  />"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='status' name='status[]' value='' style='width:225px' /maxlength=35>"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='ONU' name='ONU[]' value='' style='width:225px' maxlength=30/>"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='serialNumber' name='serialNumber[]' value='' style='width:225px' maxlength=55/>"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='service' name='service[]' value='' style='width:225px' maxlength=55 />"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='QRDropCore' name='QRDropCore[]' value='' style='width:225px' maxlength=40/>"+
        "</td>"+
        "<td>"+
            "<textarea class='form-control' id='noteUrut' name='noteUrut[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='flagOLTPort' name='flagOLTPort[]' value='' style='width:225px' maxlength=40/>"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='ODPtoOLT' name='ODPtoOLT[]' value='' style='width:225px' maxlength=40 />"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='ODPtoONT' name='ODPtoONT[]' value='' style='width:225px' maxlength=40 />"+
        "</td>"+
        "<td>"+
            "<input type='text' class='form-control' id='RFS' name='RFS[]' value='' style='width:225px' maxlength=40/>"+
        "</td>"+
        "<td>"+
            "<textarea class='form-control' id='noteHDDaman' name='noteHDDaman[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
        "</td>"+
        "<td>"+
        "<div class='input-group input-daterange'>"+
                "<div class='input-group-addon'>"+
                "<i class='fa fa-calendar'></i>"+
                "</div>"+
                "<input type='text' name='updateDateUIM' id='updateDateUIM' class='form-control pull-right datepicker' value='' readonly='' style='width:175px'/>"+
        "</div>"+
        "</td>"+
        "<td>"+
            "<select type='text' class='form-control' id='updaterUIM' name='updaterUIM[]' value='' style='width:225px' /></select>"+
        "</td>"+
        "<td>"+
            "<textarea class='form-control' id='noteQROutSplitter' name='noteQROutSplitter[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
        "</td>"+
        "<td>"+
            "<textarea class='form-control' id='noteQRDropCore' name='noteQRDropCore[]' rows='2' style='resize:none;width:225px' maxlength=100></textarea>"+
        "</td>"+
        "<td>"+
            "<select type='text' class='form-control' id='updaterDava' name='updaterDava[]' value='' style='width:225px' /></select>"+
        "</td>"+
    "</tr>";
    }
               
    tbl += 
    "</tbody>"+
    "<tfoot style='text-align:center'>"+
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
        "<th> Note QR Out Splitter </th>"+
        "<th> Note QR Dropcore </th>"+
        "<th> Updater Dava </th>"+
    "</tfoot>"+
    "</table>";
    console.log(NoOfRec);
    $("#AddControll").append(tbl);  
}