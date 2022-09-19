<script src="{{ url('/') }}/qrcode/build/qrcode.js"></script>
<script src="{{ url('/') }}/qrcode/build/qrcode.min.js"></script>
<script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.js"></script>
<script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '.qrcode', function() {
        var department = $(this).attr("data-department");
        var lokasi = $(this).attr("data-lokasi");
        var sequence_no = $(this).attr("data-sequence_no");
        QRCode.toString($(this).attr("data-link"), function (err, string) {
            if (err) throw err
            var mywindow = window.open("", "PRINT", "height=400,width=600");
            mywindow.document.write("<html><head>");
            mywindow.document.write("</head><body >");
            mywindow.document.write("<div id='print_barcode' class='card invoice-print-area' id='invoice-print-area'style='width: 15rem; border-radius:0.5rem !important; border:1px solid;background-color:white !important'>");
            mywindow.document.write("<div class='card-body pb-0 mx-25'>");
            mywindow.document.write("<div class='row my-2'>");
            mywindow.document.write("<div class='col-sm-4 col-12 text-center   order-2 order-sm-1' style='padding-right: 0px; '><center>");
            mywindow.document.write("<img id='gambar_width' src='vendors/images/logo-ciputra.png' alt='logo' style='height: 80px; ' />");
            mywindow.document.write("<div class='col-12'><div style='width:115px;display: inline-block;margin:auto'>"+string+"</div></div>");
            mywindow.document.write("<div class='col-12' style='height: auto;'>");
            mywindow.document.write("<h6 class='col-12' id='font_size_cetakan1' style='font-size:14px;margin:auto;height: 32;'>"+department+"</h6>");
            mywindow.document.write("<label class='col-md-12' id='font_size_cetakan2' style='font-size:14px;margin:auto;'>"+lokasi+"</label>");
            mywindow.document.write("<h6 class='col-12' id='font_size_cetakan2' style='font-size:25px;margin:auto;'><b>"+sequence_no+"</b> </h6>");
            mywindow.document.write("<h4 class='col-12' id='font_size_cetakan3' style='font-size:14px;margin:auto;' class='mt-1 text-bold'><i class='fa fa-arrow-left'></i><u> Scan Here with your Smartphone </u></h4>");
            mywindow.document.write("</div>");
            mywindow.document.write("</center></div>");
            mywindow.document.write("</div>");
            mywindow.document.write("</div>");
            mywindow.document.write("</div>");
            mywindow.document.write("</body></html>");
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.setTimeout( function() {mywindow.print();}, 150 );

            // console.log(string)
        })
    });

    $(document).on('click', '.qrcode-location', function() {
        // var department = $(this).attr("data-department");
        var lokasi = $(this).attr("data-lokasi");
        var sequence_no = $(this).attr("data-sequence_no");
        QRCode.toString($(this).attr("data-link"), function (err, string) {
            if (err) throw err
            var mywindow = window.open("", "PRINT", "height=400,width=600");
            mywindow.document.write("<html><head>");
            mywindow.document.write("</head><body >");
            mywindow.document.write("<div id='print_barcode' class='card invoice-print-area' id='invoice-print-area'style='width: 15rem; border-radius:0.5rem !important; border:1px solid;background-color:white !important'>");
            mywindow.document.write("<div class='card-body pb-0 mx-25'>");
            mywindow.document.write("<div class='row my-2'>");
            mywindow.document.write("<div class='col-sm-4 col-12 text-center   order-2 order-sm-1' style='padding-right: 0px; '><center>");
            mywindow.document.write("<img id='gambar_width' src='vendors/images/logo-ciputra.png' alt='logo' style='height: 80px; ' />");
            mywindow.document.write("<div class='col-12'><div style='width:115px;display: inline-block;margin:auto'>"+string+"</div></div>");
            mywindow.document.write("<div class='col-12' style='height: auto;'>");
            mywindow.document.write("<h6 class='col-12' id='font_size_cetakan1' style='font-size:14px;margin:auto;height: 32;'>LOKASI</h6>");
            mywindow.document.write("<label class='col-md-12' id='font_size_cetakan2' style='font-size:14px;margin:auto;'>"+lokasi+"</label>");
            mywindow.document.write("<h6 class='col-12' id='font_size_cetakan2' style='font-size:25px;margin:auto;'><b>"+sequence_no+"</b> </h6>");
            mywindow.document.write("<h4 class='col-12' id='font_size_cetakan3' style='font-size:14px;margin:auto;' class='mt-1 text-bold'><i class='fa fa-arrow-left'></i><u> Scan Here with your Smartphone </u></h4>");
            mywindow.document.write("</div>");
            mywindow.document.write("</center></div>");
            mywindow.document.write("</div>");
            mywindow.document.write("</div>");
            mywindow.document.write("</div>");
            mywindow.document.write("</body></html>");
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.setTimeout( function() {mywindow.print();}, 150 );

            // console.log(string)
        })
    });

    $(document).on('click', '#cetak_qrcode_document', function() {
        var insert_check = [];
        var insert_uncheck = [];
        var rows = table_document_qrcode.rows({ 'search': 'applied' }).nodes();

        $('input[type="checkbox"]', rows).each(function(){
            if(this.checked == true){
                var arr = [
                    $(this).val(),
                    $(this).attr("data-department"),
                    $(this).attr("data-lokasi"),
                    $(this).attr("data-sec_number"),
                    $(this).attr("data-link"),
                ];
                insert_check.push(arr);
            }else{
                // insert_uncheck.push($(this).val());
            }
        })

        var mywindow = window.open("", "PRINT", "height=400,width=600");
            mywindow.document.write("<!DOCTYPE html><head>");
            mywindow.document.write("</head><body>");
            mywindow.document.write("<table style='page-break-inside: auto;'>");
            for (let index = 0; index < insert_check.length; index++) {
                QRCode.toString(insert_check[index][4], function (err, string) {
                    if (err) throw err
                    if(index == 0){
                        mywindow.document.write("<tr style='page-break-inside: auto;'>");
                    }
                    mywindow.document.write("<td>");
                    mywindow.document.write("<div id='print_barcode' class='card invoice-print-area' id='invoice-print-area'style='width: 15rem; margin: 10px 10px 10px 10px;; border-radius:0.5rem !important; border:1px solid;background-color:white !important'>");
                    mywindow.document.write("<div class='card-body pb-0 mx-25'>");
                    mywindow.document.write("<div class='row my-2'>");
                    mywindow.document.write("<div class='col-sm-4 col-12 text-center   order-2 order-sm-1' style='padding-right: 0px; '><center>");
                    mywindow.document.write("<img id='gambar_width' src='vendors/images/logo-ciputra.png' alt='logo' style='height: 80px; ' />");
                    mywindow.document.write("<div class='col-12'><div style='width:115px;display: inline-block;margin:auto'>"+string+"</div></div>");
                    mywindow.document.write("<div class='col-12' style='height: auto;'>");
                    mywindow.document.write("<h6 class='col-12' id='font_size_cetakan1' style='font-size:14px;margin:auto;height: 32;'>"+insert_check[index][1]+"</h6>");
                    mywindow.document.write("<label class='col-md-12' id='font_size_cetakan2' style='font-size:14px;margin:auto;'>"+insert_check[index][2]+"</label>");
                    mywindow.document.write("<h6 class='col-12' id='font_size_cetakan2' style='font-size:25px;margin:auto;'><b>"+insert_check[index][3]+"</b> </h6>");
                    mywindow.document.write("<h4 class='col-12' id='font_size_cetakan3' style='font-size:14px;margin:auto;' class='mt-1 text-bold'><i class='fa fa-arrow-left'></i><u> Scan Here with your Smartphone </u></h4>");
                    mywindow.document.write("</div>");
                    mywindow.document.write("</center></div>");
                    mywindow.document.write("</div>");
                    mywindow.document.write("</div>");
                    mywindow.document.write("</div>");
                    mywindow.document.write("<td>");
                    if((index+1)%3 == 0){
                        mywindow.document.write("</tr>");
                        if(index+1 != insert_check.length){
                            mywindow.document.write("<tr style='page-break-inside: auto;'>");
                        }
                    }
                })
            }
            mywindow.document.write("</table>");
            mywindow.document.write("</body></html>");
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.setTimeout( function() {mywindow.print();}, 150 );
    });

    $(document).on('click', '#check_all_qr', function() {
        var check_all = $(this);
        $(".check_select_qr").each(function () {
            if(! $(this).is('disabled')){
                if (check_all.is(':checked')) {
                    $(this).prop('checked',true);
                } else {
                    $(this).prop('checked', false);
                }
            }
        });
    });
</script>
