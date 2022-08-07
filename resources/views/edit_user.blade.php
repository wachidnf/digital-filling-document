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
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
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
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Detail User</h4>
							{{-- <p class="mb-30">All bootstrap element classies</p> --}}
						</div>
						<div class="pull-right">
							{{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a> --}}
						</div>
					</div>
					<form  method="post" action="{{ route('update-user') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
						<div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="hidden" value="{{ $user->id }}" name="id">
                                <input class="form-control" placeholder="" type="text" name="name" value="{{ $user->name }}" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="code" value="{{ $user->email }}" id="code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="password" value="" id="code">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
					</form>
				</div>

                <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">DETAIL USER</h4>
							{{-- <p class="mb-30">All bootstrap element classies</p> --}}
						</div>
						<div class="pull-right">
							{{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a> --}}
						</div>
					</div>
                    <div class="btn-list">
                        <button class="btn btn-primary" type="button" id="add_detail">ADD DETAIL</button>
                    </div>
                    <table class="table nowrap">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Pt</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->detail as $key => $value)
                                <tr>
                                    <td>{{$value->project->name}}</td>
                                    <td>{{$value->pt->name}}</td>
                                    <td>{{$value->department->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                {{-- <a class="dropdown-item"  onclick="file('{{$value->id}}','detail document')">File</a> --}}
                                                {{-- <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a> --}}
                                                <a class="dropdown-item" href="delete-detail-user?id={{ $value->id }}"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				{{-- DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a> --}}
			</div>
		</div>
	</div>

    <div class="modal fade" id="ModalAddDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('save-detail-user') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">ADD DETAIL DOCUMENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" placeholder="" type="hidden" name="user_id" value="{{$user->id}}" id="document_id">
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Project</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="project" id="project">
									<option disabled selected>Pilih Project...</option>
                                    @foreach ($project as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pt</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="pt" id="pt">
									<option disabled selected>Pilih Pt...</option>
                                    @foreach ($pt as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Department</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="department" name="department">
									<option disabled selected>Pilih Department...</option>
                                    @foreach ($department as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_detail">SIMPAN DETAIL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            }
        });

        $(document).on('click', '#add_detail', function() {
            // $("#project").val("");
            // $("#pt").val("");
            // $("#department").val("");
            $("#ModalAddDetail").modal('show');
        });
    </script>
</body>
</html>
