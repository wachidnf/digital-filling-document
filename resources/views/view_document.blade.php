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
					<form  method="post" action="{{ route('save-document') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Proses</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="date" placeholder="" name="tgl_process" value="{{date('d/m/Y', strtotime($document->process_date))}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Seq Nomor</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" type="text" name="seq_nomor" value="{{$document->seq_no}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No Dokumen</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="{{$document->document_no}}" type="text" name="no_dokumen">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Department</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="department">
									<option disabled selected>Pilih Department...</option>
                                    @foreach ($department as $key => $value)
                                        @if ($value->id == $document->department_id)
                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endif
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Lokasi File</label>
							<div class="col-sm-12 col-md-10">
								{{-- <input class="form-control" value="{{$document->storage_id}}" type="text" name="lokasi"> --}}
                                <select class="custom-select col-12" name="lokasi">
									<option disabled selected>Pilih Lokasi...</option>
                                    @foreach ($lokasi as $key => $value)
                                        @if ($value->id == $document->storage_id)
                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endif
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="keterangan">{{$document->description}}</textarea>
							</div>
						</div>
						{{-- <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="type">
							</div>
						</div> --}}
                        <div>
                            {{-- <button class="btn btn-primary" type="submit">Simpan</button> --}}
                        </div>
					</form>
				</div>
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">DETAIL DOKUMEN FILE</h4>
							{{-- <p class="mb-30">All bootstrap element classies</p> --}}
						</div>
						<div class="pull-right">
							{{-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a> --}}
						</div>
					</div>
                    <div>
                        <div class="btn-list">
                            <button class="btn btn-primary" type="button" id="add_detail">ADD DETAIL</button>
                        </div>
                        <table class="table nowrap">
							<thead>
								<tr>
                                    <th>Name</th>
									<th>No Referensi</th>
									<th>Catatan</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($detail_document as $key => $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->reference_no}}</td>
                                        <td>{{$value->notes}}</td>
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

    <div class="modal fade" id="ModalAddDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">ADD DETAIL DOCUMENT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input class="form-control" placeholder="" type="hidden" name="document_id" value="{{$document->id}}" id="document_id">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="text" name="name" value="" id="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">No Referensi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="text" name="no_referensi" value="" id="no_referensi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Catatan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="form-control" name="catatan" id="catatan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_detail">SIMPAN DETAIL</button>
                </div>
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
            $("#index").val("");
            $("#no_referensi").val("");
            $("#catatan").val("");
            $("#ModalAddDetail").modal('show');
        });

        $(document).on('click', '#save_detail', function() {
            var url = "{{ url('/') }}/save-detail-document";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    name: $("#name").val(),
                    no_referensi: $("#no_referensi").val(),
                    catatan: $("#catatan").val(),
                    document_id: $("#document_id").val(),
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
</body>
</html>