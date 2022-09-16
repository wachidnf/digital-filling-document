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
            // mywindow.document.write("<p id='qrcodeKode' class='col-12' style='font-size:12px'> XXXXX</p>");
            mywindow.document.write("<div class='col-12'><div style='width:115px;display: inline-block;margin:auto'>"+string+"</div></div>");
            mywindow.document.write("<div class='col-12'>");
            mywindow.document.write("<h6 class='col-12' id='font_size_cetakan1' style='font-size:14px;margin:auto;'>"+department+"</h6>");
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
            // mywindow.document.write("<p id='qrcodeKode' class='col-12' style='font-size:12px'> XXXXX</p>");
            mywindow.document.write("<div class='col-12'><div style='width:115px;display: inline-block;margin:auto'>"+string+"</div></div>");
            mywindow.document.write("<div class='col-12'>");
            mywindow.document.write("<h6 class='col-12' id='font_size_cetakan1' style='font-size:14px;margin:auto;'>LOKASI</h6>");
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
</script>
