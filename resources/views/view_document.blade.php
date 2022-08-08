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
							<h4 class="text-blue h4">VIEW DOKUMEN FILE</h4>
							{{-- <p class="mb-30">All bootstrap element classies</p> --}}
                            <button class="btn btn-primary" type="button" id="add_lokasi" onclick="cetak('{{$data}}')">QRCODE</button>
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
								<input class="form-control" type="date" placeholder="" name="tgl_process" value="{{date('Y-m-d', strtotime($document->process_date))}}" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Seq Nomor</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" type="text" name="seq_nomor" value="{{$document->seq_no}}" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No Dokumen</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="{{$document->document_no}}" type="text" name="no_dokumen" disabled>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Project</label>
							<div class="col-sm-12 col-md-10">
								{{-- <select class="custom-select col-12" name="project" disabled>
									<option disabled selected>Pilih Project...</option>
                                    @foreach ($project as $key => $value)
                                        @if ($value->id == $document->project_id)
                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endif
                                    @endforeach
								</select> --}}
                                <input class="form-control" value="{{$document->project->name}}" type="text" name="project" disabled>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pt</label>
							<div class="col-sm-12 col-md-10">
								{{-- <select class="custom-select col-12" name="pt" disabled>
									<option disabled selected>Pilih Pt...</option>
                                    @foreach ($pt as $key => $value)
                                        @if ($value->id == $document->pt_id)
                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endif
                                    @endforeach
								</select> --}}
                                <input class="form-control" value="{{$document->pt->name}}" type="text" name="pt" disabled>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Department</label>
							<div class="col-sm-12 col-md-10">
								{{-- <select class="custom-select col-12" name="department" disabled>
									<option disabled selected>Pilih Department...</option>
                                    @foreach ($department as $key => $value)
                                        @if ($value->id == $document->department_id)
                                            <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endif
                                    @endforeach
								</select> --}}
                                <input class="form-control" value="{{$document->department->name}}" type="text" name="department" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Lokasi File</label>
							<div class="col-sm-12 col-md-10">
								{{-- <input class="form-control" value="{{$document->storage_id}}" type="text" name="lokasi"> --}}
                                {{-- <select class="custom-select col-12" name="lokasi" disabled>
									<option disabled selected>Pilih Lokasi...</option>
                                    @foreach ($lokasi as $key => $value)
                                        @if ($value->id == $document->storage_id)
                                            <option value="{{$value->id}}" selected>{{ $value->level_storages->name  }} - {{$value->name}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{ $value->level_storages->name  }} - {{$value->name}}</option>
                                        @endif
                                    @endforeach
								</select> --}}
                                <input class="form-control" value="{{ $document->lokasi->level_storages->name  }} - {{$document->lokasi->name}}" type="text" name="lokasi" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="keterangan" disabled>{{$document->description}}</textarea>
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
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($detail_document as $key => $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->reference_no}}</td>
                                        <td>{{$value->notes}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    {{-- <a class="dropdown-item" href="view-document?id={{$value->id}}"><i class="dw dw-eye"></i> View</a> --}}
                                                    <a class="dropdown-item"  onclick="file('{{$value->id}}','detail document')">File</a>
                                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                    <a class="dropdown-item" href="delete-detail-document?id={{ $value->id }}"><i class="dw dw-delete-3"></i> Delete</a>
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

    <div class="modal fade" id="ModalAddDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('save-detail-document') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">ADD DETAIL DOCUMENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" placeholder="" type="hidden" name="document_id" value="{{$document->id}}" id="document_id">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="name" value="" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">No Referensi</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="no_referensi" value="" id="no_referensi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Catatan</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="catatan" id="catatan" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">File Lampiran</label>
                            <div class="col-sm-12 col-md-10">
                                <table class="table nowrap" id="table_file">
                                    <thead>
                                        <th style="width:40%">file</th>
                                        <th>Note</th>
                                    </thead>
                                    <tbody>
                                        <tr class="baris">
                                            <td>
                                                <input class="form-control" placeholder="" type="file" name="file[]" value="" id="file">
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="file_note[]" id="file_note" style="height: 10%;"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <td colspan="2" style="text-align: center">
                                            <button type="button" class="btn btn-success" id="tambah_file"><i class="icon-copy fi-plus"> Tambah File</i></button>
                                        </td>
                                    </tfoot>
                                </table>
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

    <div class="modal fade" id="ModalFile" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true" style="overflow-y:auto;padding-top: 100px;">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="modal-title" id="myModalLabel"><span style="color: grey" id="modalfiletitle"></span></h3>
        </div>
        <form>
            <div class="modal-body">
                <div class="tab-pane table-responsive" id="tab_2">
                <table id="file_attachment" class="table table-bordered bg-white mg-b-0 tx-center" style="font-size:15px; width: 100%; ">
                    <thead class="head_table">
                    <tr style="border: 1px solid black;">
                        <td rowspan="" style="vertical-align: middle;text-align: center">No</td>
                        <td rowspan="" style="vertical-align: middle;text-align: center">File Lampiran</td>
                        <td rowspan="" style="vertical-align: middle;text-align: center">Note</td>
                    </tr>
                    </thead>
                </table>
                </div>
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

    <script src="{{ url('/') }}/qrcode/build/qrcode.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.min.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.min.js"></script>
    {{-- <script src="{{ url('/') }}/assets/bower_components/select2/dist/js/select2.full.min.js"></script> --}}

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

        var t = $('#table_file').DataTable({
            autoWidth: false,
            paging:false,
            ordering:false,
            searching:false
            // columnDefs: [
            //     {
            //         "targets": 3,
            //         "className": "text-center",
            //         // "width": "4%"
            //     },
            // ],
        });
        $(document).on('click', '#tambah_file', function() {
            t.row.add( [
                "<input class='form-control' placeholder='' type='file' name='file[]' value='' id='file'>",
                "<textarea class='form-control' name='file_note[]' id='file_note' style='height: 10%;'></textarea>",
            ] ).draw( false );
            $("#table_file").find('tr').addClass('baris');
        });

        // $(document).on('click', '#save_detail', function() {
        //     var url = "{{ url('/') }}/save-detail-document";
        //     $.ajax({
        //         type: 'post',
        //         dataType: 'json',
        //         url: url,
        //         data: {
        //             name: $("#name").val(),
        //             no_referensi: $("#no_referensi").val(),
        //             catatan: $("#catatan").val(),
        //             document_id: $("#document_id").val(),
        //         },
        //         beforeSend: function() {
        //             // waitingDialog.show();
        //         },
        //         success: function(data) {
        //             window.location.reload();
        //         },
        //         complete: function() {
        //             // waitingDialog.hide();
        //         },
        //     });
        // });

        function cetak(uuid){
            // $("#table_qrcode").on('click', '.cetak', function() {
            // console.log($(this).parents(".test").find(".qr").html());

            QRCode.toString(uuid, function (err, string) {
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

            //     // return true;
        };

        $('#file_attachment').DataTable({
            "paging":false,
            "destroy": true,
            "columns":[
                    {data:"no",name:"no"},
                    {data:"file",name:"file"},
                    {data:"description",name:"description"},
            ],
            "order": [[ 0, 'asc' ]]
            // "columnDefs": [
            //     {
            //         "targets": 1,
            //         // "className": "text-center",
            //     }
            // ],
        });

        function file(source_id,type){
            var url = "{{ url('/')}}/file_attachment";
            $('#file_attachment').DataTable().clear().draw();
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    source_id : source_id,
                    type : type,
                },
                // beforeSend: function() {
                //     waitingDialog.show();
                // },
                success: function(data) {
                    if (data.file.length > 0) {
                    // console.log(data);
                        $(data.file).each(function(i, v) {
                        // console.log(v.status);
                            var ItemTable = {
                                no: i+1,
                                file: v.file,
                                description: v.description,

                            };
                            $('#file_attachment').DataTable().row.add(ItemTable);
                        });
                    }
                    // $('#modalfiletitle').text("File Lampiran");
                    $('#file_attachment').DataTable().draw();
                    // $('#index_detail').DataTable().columns.adjust();
                },
                // complete: function() {
                //     waitingDialog.hide();
                // }
            });
            $("#ModalFile").modal('show');
        }
    </script>
</body>
</html>
