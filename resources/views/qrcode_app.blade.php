<script src="{{ url('/') }}/qrcode/build/qrcode.js"></script>
<script src="{{ url('/') }}/qrcode/build/qrcode.min.js"></script>
<script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.js"></script>
<script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '.qrcode', function() {
        var department = $(this).attr("data-department");
        var lokasi = $(this).attr("data-lokasi");
        QRCode.toString($(this).attr("data-link"), function (err, string) {
            if (err) throw err
            var mywindow = window.open("", "PRINT", "height=400,width=600");
            mywindow.document.write("<html><head>");
            mywindow.document.write("</head><body >");
            mywindow.document.write("<row>");
            mywindow.document.write("<div>");
            mywindow.document.write("<div><div style='width:250px;display: inline-block;margin:auto'>"+string+"</div></div>");
            mywindow.document.write("<div><div> Department : "+department+"</div>");
            mywindow.document.write("<div> Lokasi : "+lokasi+"</div></div>");
            mywindow.document.write("</div>");
            mywindow.document.write("</row>");
            mywindow.document.write("</body></html>");
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.print();
            console.log(string)
        })
    });

</script>
