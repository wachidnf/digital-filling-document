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
							<h4 class="text-blue h4">EDIT LOKASI</h4>
							{{-- <p class="mb-30">All bootstrap element classies</p> --}}
						</div>
						<div class="pull-right">
							{{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a> --}}
						</div>
					</div>
					<form  method="post" action="{{ route('update-lokasi') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
						<div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
                            <div class="col-sm-12 col-md-10">
                                <input type="hidden" value="{{ $document->id }}" name="id">
                                <input class="form-control" placeholder="" type="text" name="name" value="{{ $document->name }}" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Code</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="code" value="{{ $document->code }}" id="code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Department</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="department" id="department">
                                    <option disabled selected>Pilih Department...</option>
                                    @foreach ($department as $key => $value)
                                        <option value="{{$value->id}}" {{ $document->department_id == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Sequence No</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="sequence_no" value="{{ $document->sequence_no }}" id="sequence_no">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Sumber Lokasi</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="sumber_lokasi" id="sumber_lokasi">
                                    <option disabled selected>-- Pilih Sumber Lokasi --</option>
                                    @foreach ($lokasi as $key => $value)
                                        <option value="{{$value->id}}" {{ $document->parent_id == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Level</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="level">
                                    <option disabled selected>-- Pilih Level --</option>
                                    @foreach ($level as $key => $value)
                                        <option value="{{$value->id}}" {{ $document->level == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="keterangan" id="keterangan">{{ $document->description }}</textarea>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
					</form>
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
</body>
</html>
