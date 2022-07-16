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
							<h4 class="text-blue h4">ADD DOKUMEN FILE</h4>
							{{-- <p class="mb-30">All bootstrap element classies</p> --}}
						</div>
						<div class="pull-right">
							{{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a> --}}
						</div>
					</div>
					<form>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Proses</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Johnny Brown">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Seq Nomor</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Search Here" type="search">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No Dokumen</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="bootstrap@example.com" type="email">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Department</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12">
									<option selected="">Choose...</option>
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Lokasi File</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="1-(111)-111-1111" type="tel">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="password" type="password">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="100" type="number">
							</div>
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
