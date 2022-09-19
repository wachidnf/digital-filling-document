<!DOCTYPE html>
<html>
<head>
	{{-- @include("master/header") --}}
    @include("master/header_qrcode")
</head>
<body>
	{{-- @include("master/right-sidebar")
	@include("master/left-sidebar") --}}
	<div class="mobile-menu-overlay"></div>

	<div class="main">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">

				<!-- Default Basic Forms Start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">TRANSAKSI DOKUMEN</h4>
					</div>
					<div class="pb-20">
                        <div class="btn-list">
                            {{-- <a class="btn btn-primary" type="button" href="create-document">ADD</a> --}}
                            {{-- <button class="btn btn-primary" type="button">EDIT</button>
                            <button class="btn btn-primary" type="button">DELETE</button> --}}
                            {{-- <button class="btn btn-primary" type="button">SYNCH</button>
                            <button class="btn btn-primary" type="button">SEND</button> --}}
                        </div>
						<table class="table nowrap" id="index_document" style="width: 100%">
							<thead style="width: 100%">
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
                                    <th>Lokasi</th>
									<th>Seq Number</th>
									<th>Tgl Proses</th>
									<th>Keterangan</th>
                                    {{-- <th>Qr Code</th> --}}
                                    <th>action</th>
								</tr>
							</thead>
							<tbody style="width: 100%">
                                @foreach ($document as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        {{-- <td><input type="checkbox" name="select_one" value="1" id="example-select-one"></td> --}}
                                        <td>{{$value->department->name}}</td>
                                        <td>{{$value->document_no}}</td>
                                        <td>{{ $value->lokasi->level_storages->name  }} - {{$value->lokasi->name}}</td>
                                        <td>{{$value->seq_no}}</td>
                                        <td>{{$value->process_date}}</td>
                                        <td>{{$value->description}}</td>
                                        {{-- <td>{{$value->link_qrcode}}</td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="view-document-direct?id={{$value->id}}"><i class="dw dw-eye"></i> View</a>
                                                    {{-- <a class="dropdown-item" href="edit-document?id={{ $value->id }}"><i class="dw dw-edit2"></i> Edit</a> --}}
                                                    {{-- <a class="dropdown-item" href="delete-document?id={{ $value->id }}"><i class="dw dw-delete-3"></i> Delete</a> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
						</table>
					</div>
				</div>
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
    {{-- <script src="{{ url('/') }}/assets/bower_components/select2/dist/js/select2.full.min.js"></script> --}}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            }
        });

    </script>
</body>
</html>
