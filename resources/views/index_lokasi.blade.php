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
						<h4 class="text-blue h4">LOKASI</h4>
					</div>
					<div class="pb-20">
                        <div class="btn-list">
                            <button class="btn btn-primary" type="button" id="add_lokasi">ADD LOKASI</button>
                            {{-- <button class="btn btn-primary" type="button">EDIT</button>
                            <button class="btn btn-primary" type="button">DELETE</button> --}}
                            {{-- <button class="btn btn-primary" type="button">SYNCH</button>
                            <button class="btn btn-primary" type="button">SEND</button> --}}
                        </div>
						<table class="table nowrap">
							<thead>
								<tr>
                                    <th>No</th>
									{{-- <th>
                                        <div class="dt-checkbox">
											<input type="checkbox" name="select_all" value="1" id="example-select-all">
											<span class="dt-checkbox-label"></span>
										</div>
									</th> --}}
									{{-- <th>Department</th> --}}
									<th>Lokasi</th>
                                    <th>Code</th>
                                    <th>Tempat File</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($lokasi as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->code}}</td>
                                        <td>{{ $value->level_storages->name }}</td>
                                        <td>{{$value->description}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="edit-lokasi?id={{$value->id}}"><i class="dw dw-eye"></i> Edit</a>
                                                    {{-- <a class="dropdown-item" href="#" id="edit_lokasi" data-id="{{ $value->id }}"><i class="dw dw-edit2"></i> Edit</a> --}}
                                                    <a class="dropdown-item" href="delete-lokasi?id={{ $value->id }}"><i class="dw dw-delete-3"></i> Delete</a>
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

    <div class="modal fade" id="ModalAddLokasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">ADD LOKASI DOCUMENT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- <input class="form-control" placeholder="" type="hidden" name="document_id" value="{{$document->id}}" id="document_id"> --}}
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="text" name="lokasi" value="" id="lokasi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Code</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="text" name="code" value="" id="code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Sumber Lokasi</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="sumber_lokasi" id="sumber_lokasi">
                                <option disabled selected>-- Pilih Sumber Lokasi --</option>
                                @foreach ($lokasi as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Lokasi File</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="level" id="level">
                                <option disabled selected>-- Pilih Lokasi File --</option>
                                @foreach ($level as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_lokasi">SIMPAN LOKASI</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEditLokasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">EDIT LOKASI DOCUMENT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- <input class="form-control" placeholder="" type="hidden" name="document_id" value="{{$document->id}}" id="document_id"> --}}
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="hidden" name="id_lokasi" id="id_lokasi">
                            <input class="form-control" placeholder="" type="text" name="lokasi_edit" value="" id="lokasi_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Code</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="text" name="edit_code" value="" id="edit_code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="form-control" name="edit_keterangan" id="edit_keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update_lokasi">SIMPAN LOKASI</button>
                </div>
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            }
        });

        $(document).on('click', '#add_lokasi', function() {
            // $("#index").val("");
            // $("#no_referensi").val("");
            // $("#catatan").val("");
            $("#ModalAddLokasi").modal('show');
        });

        $(document).on('click', '#edit_lokasi', function() {
            // $("#index").val("");
            // $("#no_referensi").val("");
            // $("#catatan").val("");
            var id = $(this).data("id");
            $("#id_lokasi").val(id);
            var url = "{{ url('/') }}/list-lokasi";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    id: id
                    // document_id: $("#document_id").val(),
                },
                success: function(data) {
                    $("#lokasi_edit").val(data.name);
                    $("#edit_code").val(data.code);
                    $("#edit_keterangan").val(data.description);
                    $("#edit_sumber_lokasi").val(data.sumber_lokasi);
                },
            });
            $("#ModalEditLokasi").modal('show');
        });

        $(document).on('click', '#save_lokasi', function() {
            var url = "{{ url('/') }}/save-lokasi";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    name: $("#lokasi").val(),
                    level: $("#level").val(),
                    code: $("#code").val(),
                    keterangan: $("#keterangan").val(),
                    sumber_lokasi: $("#sumber_lokasi").val(),
                    // document_id: $("#document_id").val(),
                },
                beforeSend: function() {
                    // waitingDialog.show();
                },
                success: function(data) {
                    window.location.reload();
                },
                complete: function() {
                    // waitingDialog.hide();
                },
            });
        });

        $(document).on('click', '#update_lokasi', function() {
            var url = "{{ url('/') }}/update-lokasi";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    id: $("#id_lokasi").val(),
                    name: $("#lokasi_edit").val(),
                    code: $("#edit_code").val(),
                    keterangan: $("#edit_keterangan").val(),
                    sumber_lokasi: $("#edit_sumber_lokasi").val(),
                    // document_id: $("#document_id").val(),
                },
                beforeSend: function() {
                    // waitingDialog.show();
                },
                success: function(data) {
                    window.location.reload();
                },
                complete: function() {
                    // waitingDialog.hide();
                },
            });
        });
    </script>
</html>
