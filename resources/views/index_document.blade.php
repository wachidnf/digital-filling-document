<!DOCTYPE html>
<html>
<head>
	@include("master/header")
</head>
<body>
	@include("master/right-sidebar")
	@include("master/left-sidebar")
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				{{-- <div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
				<!-- Checkbox select Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">TRANSAKSI DOKUMEN</h4>
					</div>
					<div class="pb-20">
                        <div class="btn-list">
                            <a class="btn btn-primary" type="button" href="create-document">ADD</a>
                            {{-- <button class="btn btn-primary" type="button">EDIT</button>
                            <button class="btn btn-primary" type="button">DELETE</button> --}}
                            {{-- <button class="btn btn-primary" type="button">SYNCH</button>
                            <button class="btn btn-primary" type="button">SEND</button> --}}
                        </div>
						<table class="table nowrap" id="index_document">
							<thead>
								<tr>
                                    <th>No</th>
									{{-- <th>
                                        <div class="dt-checkbox">
											<input type="checkbox" name="select_all" value="1" id="example-select-all">
											<span class="dt-checkbox-label"></span>
										</div>
									</th> --}}
									<th>Department</th>
									<th>No. Dokumen</th>
									<th>Seq Number</th>
									<th>Tgl Proses</th>
									<th>Keterangan</th>
                                    <th>Qr Code</th>
                                    <th>action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($document as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        {{-- <td><input type="checkbox" name="select_one" value="1" id="example-select-one"></td> --}}
                                        <td>{{$value->department->name}}</td>
                                        <td>{{$value->document_no}}</td>
                                        <td>{{$value->seq_no}}</td>
                                        <td>{{$value->process_date}}</td>
                                        <td>{{$value->description}}</td>
                                        <td>{{$value->link_qrcode}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="view-document?id={{$value->id}}"><i class="dw dw-eye"></i> View</a>
                                                    <a class="dropdown-item" href="edit-document?id={{ $value->id }}"><i class="dw dw-edit2"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete-document?id={{ $value->id }}"><i class="dw dw-delete-3"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
						</table>
					</div>
				</div>
				<!-- Checkbox select Datatable End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				{{-- DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a> --}}
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>

    <script src="{{ url('/') }}/qrcode/build/qrcode.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.min.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            }
        });

        var table = $('#index_document').DataTable({
            "language": {
                "processing": '<i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 50px;"></i>',
            },
            // "dom": 'Bfrtip',
            "searching": true,
            "autoWidth": true,
            "processing": true,
            "serverSide": false,
            "columnDefs": [
                {
                    // "className" : 'dt-body-right'
                    "render": function(data, type, row) {
                        var html = "";
                        QRCode.toString(data, function (err, string) {
                            if (err) throw err
                            html += "<div style='width:100%;display: inline-block;margin:auto' class='qrcode' data-link='"+data+"'>"+string+"</div>"
                        })
                        return html;
                    },
                    "targets" : 6,

                },
            ],
        });

        $(document).on('click', '.qrcode', function() {
            QRCode.toString($(this).attr("data-link"), function (err, string) {
                if (err) throw err
                var mywindow = window.open("", "PRINT", "height=400,width=600");
                mywindow.document.write("<html><head>");
                mywindow.document.write("</head><body >");
                // mywindow.document.write("<h1>" + document.title  + "</h1>");
                mywindow.document.write("<row>");
                // for (i = 0; i < 10; i++) {
                // mywindow.document.write("<div style='display: inline-block'><div style='width:2300px;height:1550px;border: 2px dashed black;margin: 10px;display: flex'>");
                // mywindow.document.write("<div  style='width:1000px;display: inline-block'>"+
                // "<div style='width:100%;height:500px;padding-top:20px;padding-left:10px;margin:auto'><img class='img img-responsive' src='{{ url('/') }}/assets/dist/img/logo-ciputra_original_old2.png' style='width:100%'></div>"+
                // "<div style='width:100$;padding:10px'><h2 style='margin: 0 auto;text-align: left'><label>Unit:</label><br><br><label>Kawasan:</label><br><br><br></h2></div></div>");
                mywindow.document.write("<div style='width:500px;display: inline-block;margin:auto'>"+string+"</div>");
                // mywindow.document.write("</div></div>");
                // }
                mywindow.document.write("</row>");
                mywindow.document.write("</body></html>");
                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/
                mywindow.print();
                console.log(string)
            })
        });

    </script>
</html>
