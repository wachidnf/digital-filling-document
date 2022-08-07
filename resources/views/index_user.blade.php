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
						<h4 class="text-blue h4">USER</h4>
					</div>
					<div class="pb-20">
                        <div class="btn-list">
                            <button class="btn btn-primary" type="button" id="add_user">ADD USER</button>
                            {{-- <button class="btn btn-primary" type="button">EDIT</button>
                            <button class="btn btn-primary" type="button">DELETE</button> --}}
                            {{-- <button class="btn btn-primary" type="button">SYNCH</button>
                            <button class="btn btn-primary" type="button">SEND</button> --}}
                        </div>
						<table class="table nowrap">
							<thead>
								<tr>
                                    <th>No</th>
									<th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($user as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->username}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="edit-user?id={{$value->id}}"><i class="dw dw-eye"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete-user?id={{ $value->id }}"><i class="dw dw-delete-3"></i> Delete</a>
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

    <div class="modal fade" id="ModalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">ADD USER DOCUMENT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- <input class="form-control" placeholder="" type="hidden" name="document_id" value="{{$document->id}}" id="document_id"> --}}
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="text" name="username" value="" id="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="email" name="email" value="" id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="password" name="password" value="" id="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_user">SIMPAN USER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEditUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">EDIT USER DOCUMENT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- <input class="form-control" placeholder="" type="hidden" name="document_id" value="{{$document->id}}" id="document_id"> --}}
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">User</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="hidden" name="id_user" id="id_user">
                            <input class="form-control" placeholder="" type="text" name="user_edit" value="" id="user_edit">
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
                    <button type="button" class="btn btn-primary" id="update_user">SIMPAN USER</button>
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

        $(document).on('click', '#add_user', function() {
            // $("#index").val("");
            // $("#no_referensi").val("");
            // $("#catatan").val("");
            $("#ModalAddUser").modal('show');
        });

        $(document).on('click', '#edit_user', function() {
            // $("#index").val("");
            // $("#no_referensi").val("");
            // $("#catatan").val("");
            var id = $(this).data("id");
            $("#id_user").val(id);
            var url = "{{ url('/') }}/list-user";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    id: id
                    // document_id: $("#document_id").val(),
                },
                success: function(data) {
                    $("#user_edit").val(data.name);
                    $("#edit_code").val(data.code);
                    $("#edit_keterangan").val(data.description);
                },
            });
            $("#ModalEditUser").modal('show');
        });

        $(document).on('click', '#save_user', function() {
            var url = "{{ url('/') }}/save-user";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    username: $("#username").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
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

        $(document).on('click', '#update_user', function() {
            var url = "{{ url('/') }}/update-user";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    id: $("#id_user").val(),
                    name: $("#user_edit").val(),
                    code: $("#edit_code").val(),
                    keterangan: $("#edit_keterangan").val(),
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
