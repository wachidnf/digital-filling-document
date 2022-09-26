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
                            <button class="btn btn-primary qrcode" type="button" id="add_lokasi" data-link='{{$data}}' data-department='{{$document->department->name}}' data-nodoc='{{$document->no}}' data-lokasi='{{$document->lokasi->name}}' data-sequence_no='{{$document->seq_no}}'>QRCODE</button>
                            <button class="btn btn-primary" type="button" id="btn_modal_mail" >EMAIL</button>
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
                                <input class="form-control" value="{{$document->project->name}}" type="text" name="project" disabled>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pt</label>
							<div class="col-sm-12 col-md-10">
                                <input class="form-control" value="{{$document->pt->name}}" type="text" name="pt" disabled>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Department</label>
							<div class="col-sm-12 col-md-10">
                                <input class="form-control" value="{{$document->department->name}}" type="text" name="department" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Lokasi File</label>
							<div class="col-sm-12 col-md-10">
                                <input class="form-control" value="{{ $document->lokasi->level_storages->name  }} - {{$document->lokasi->name}}" type="text" name="lokasi" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="keterangan" disabled>{{$document->description}}</textarea>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Status</label>
							<div class="col-sm-12 col-md-10">
                                <input class="form-control" value="{{$document->status == 0 ? 'Public' : 'Private'}}" type="text" name="status" disabled>
							</div>
						</div>
                        <div>
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
                                                    <a class="dropdown-item edit_detail" data-id="{{ $value->id }}"><i class="dw dw-edit2"></i> Edit</a>
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
                <button class="btn btn-success btn-sm add_filedetail" type="button"><i class="icon-copy fi-plus"> Tambah File</i></button>
                <input id="count_file" type="hidden">
                <div class="tab-pane table-responsive" id="tab_2">
                <table id="file_attachment" class="table table-bordered bg-white mg-b-0 tx-center" style="font-size:15px; width: 100%; ">
                    <thead class="head_table">
                    <tr style="border: 1px solid black;">
                        <td rowspan="" style="vertical-align: middle;text-align: center">No</td>
                        <td rowspan="" style="vertical-align: middle;text-align: center">File Lampiran</td>
                        <td rowspan="" style="vertical-align: middle;text-align: center">Note</td>
                        <td rowspan="" style="vertical-align: middle;text-align: center">Action</td>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEditDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('edit-detail-document') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">ADD DETAIL DOCUMENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" placeholder="" type="hidden" name="edit_detail_document_id" value="" id="edit_detail_document_id">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="edit_name" value="" id="edit_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">No Referensi</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="text" name="edit_no_referensi" value="" id="edit_no_referensi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Catatan</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="edit_catatan" id="edit_catatan" required></textarea>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
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
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_detail">SIMPAN DETAIL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalAddFileDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('save-file-detail') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">TAMBAH FILE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        {{-- <input class="form-control" placeholder="" type="text" name="add_detail_document_id" value="" id="add_detail_document_id"> --}}
                        <input id="detail_doc_id" name="detail_doc_id" type="hidden">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">File Lampiran</label>
                            <div class="col-sm-12 col-md-10">
                                <table class="table nowrap" id="table_file_detail">
                                    <thead>
                                        <th style="width:40%">file</th>
                                        <th>Note</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr class="baris_detail">
                                            <td>
                                                <input class="form-control" placeholder="" type="file" name="file[]" value="" id="file">
                                            </td>
                                            <td>
                                                <textarea class="form-control" name="file_note[]" id="file_note" style="height: 10%;"></textarea>
                                            </td>
                                            <td><button type="button" class="btn btn-danger kurang_file_detail" id="kurang_file_detail"><i class="icon-copy fi-minus"></i></button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <td colspan="2" style="text-align: center">
                                            <button type="button" class="btn btn-success" id="tambah_file_detail"><i class="icon-copy fi-plus"> Add Row</i></button>
                                            {{-- <button type="button" class="btn btn-danger kurang_file_detail" id="kurang_file_detail"><i class="icon-copy fi-minus"> Delete Row</i></button> --}}
                                        </td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_change">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEditFile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('update-file-document') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">EDIT FILE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" placeholder="" type="hidden" name="edit_document_id" value="" id="edit_document_id">
                        <input class="form-control" placeholder="" type="hidden" name="edit_attachment_id" value="" id="edit_attachment_id">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">File</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="" type="file" name="edit_file[]" value="" id="edit_file">
                                <br>
                                <span id="link_file"><a class="btn btn-info font_kecil btn-sm"><i class="fa fa-cloud-download"> Download</i></a></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Note</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="edit_file_note" id="edit_file_note" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save_change">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="clone_email_to" hidden>
        <div class="form-group row baris">
            <label class="col-sm-12 col-md-2 col-form-label"></label>
            <div class="col-sm-12 col-md-10" style="display: contents;">
                <div class="col-md-10" style="display: contents;">
                    <div class="col-sm-12 col-md-9">
                        <input class="form-control email_to" placeholder="" type="mail" name="email_to" value="" id="email_to" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger kurang_email" id="kurang_email"><i class="icon-copy fi-minus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="clone_email_cc" hidden>
        <div class="form-group row baris">
            <label class="col-sm-12 col-md-2 col-form-label"></label>
            <div class="col-sm-12 col-md-10" style="display: contents;" >
                <div class="col-md-10" style="display: contents;">
                    <div class="col-sm-12 col-md-9">
                        <input class="form-control email_cc" placeholder="" type="mail" name="email_cc" value="" id="email_cc" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger kurang_email" id="kurang_email"><i class="icon-copy fi-minus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEmail" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true" style="overflow-y:auto;padding-top: 100px;">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            {{-- <h3 class="modal-title" id="myModalLabel"><span style="color: grey" id="modalemailtitle">Email</span></h3> --}}
        </div>
        <div class="modal-body">
            <div id="div_email_to">
                <div class="form-group row baris">
                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                    <div class="col-sm-12 col-md-10" style="display: contents;">
                        <div class="col-md-10" style="display: contents;">
                            <div class="col-sm-12 col-md-9">
                                <input class="form-control email_to" placeholder="" type="mail" name="email_to" value="" id="email_to" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success" id="tambah_email_to"><i class="icon-copy fi-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="div_email_cc">
                <div class="form-group row baris">
                    <label class="col-sm-12 col-md-2 col-form-label">Cc</label>
                    <div class="col-sm-12 col-md-10" style="display: contents;" >
                        <div class="col-md-10" style="display: contents;">
                            <div class="col-sm-12 col-md-9">
                                <input class="form-control email_cc" placeholder="" type="mail" name="email_cc" value="" id="email_cc" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-success" id="tambah_email_cc"><i class="icon-copy fi-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Body Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control email_body" placeholder="" type="text" name="email_body" value="" id="email_body" required>
                </div>
            </div> --}}
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Lampiran</label>
                <div class="col-sm-12 col-md-10">
                    <div class="tab-pane table-responsive" id="tab_2">
                    {{-- <input class="form-control email_lampiran" placeholder="" type="mail" name="email_lampiran" value="" id="email_lampiran" required> --}}
                    <table class="table" id="file_lampiran">
                        <thead class="head_table">
                            <th>Check</th>
                            <th>Name</th>
                            <th>No Referensi</th>
                            <th>File Name</th>
                            <th>File Note</th>
                        </thead>
                        <tbody>
                            @foreach ($detail_document as $key => $value)
                                @foreach ($value->attachment as $key2 => $value2)
                                    <tr>
                                        <td><input type="checkbox" class="email_file" name="email_file" value="{{$value2->id}}"></td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->reference_no}}</td>
                                        <td>{{$value2->filename}}</td>
                                        <td>{{$value2->description}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="send_email">Kirim Email</button>
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

    <script src="{{ url('/') }}/qrcode/build/qrcode.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.min.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.js"></script>
    <script src="{{ url('/') }}/qrcode/build/qrcode.tosjis.min.js"></script>
    {{-- <script src="{{ url('/') }}/assets/bower_components/select2/dist/js/select2.full.min.js"></script> --}}

    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    @include("qrcode_app")
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name=_token]').val()
            }
        });

        $(document).ready(function(){
            CKEDITOR.replace( 'email_body' );
        });

        $(document).on('click', '#add_detail', function() {
            $("#index").val("");
            $("#no_referensi").val("");
            $("#catatan").val("");
            $("#ModalAddDetail").modal('show');
        });

        $(document).on('click', '#btn_modal_mail', function() {
            // $("#index").val("");
            // $("#no_referensi").val("");
            // $("#catatan").val("");
            $("#ModalEmail").modal('show');
        });

        $(document).on('click', '#tambah_email_to', function() {
            $("#div_email_to").append($('#clone_email_to').clone().html());
        });

        $(document).on('click', '#tambah_email_cc', function() {
            $("#div_email_cc").append($('#clone_email_cc').clone().html());
        });

        $(document).on('click', '.kurang_email', function() {
            $(this).parents(".baris").remove();
            // $("#div_email_cc").append($('#clone_email_cc').clone().html());
        });

        $(document).on('click', '#send_email', function() {
            var array_to = [];
            var array_cc = [];
            var array_file = [];

            $("#div_email_to").find(".email_to").each(function () {
                array_to.push($(this).val());
            });

            $("#div_email_cc").find(".email_cc").each(function () {
                array_cc.push($(this).val());
            });

            $(".email_file").each(function () {
                if ($(this).is(':checked')) {
                    array_file.push($(this).val());
                }
            });

            var url = "{{ url('/')}}/send-email-document";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    document_id : $("#document_id").val(),
                    array_to : array_to,
                    array_cc : array_cc,
                    // body_mail : CKEDITOR.instances.email_body.getData(),
                    array_file : array_file,
                },
                // beforeSend: function() {
                //     waitingDialog.show();
                // },
                success: function(data) {
                    if(data.status == 1){
                        alert('Berhasil Kirim Email');
                        location.reload();
                    }else{
                        alert('Gagal Kirim Email ! Harap ulangi.');
                        // location.reload();
                    }
                },
                // complete: function() {
                //     waitingDialog.hide();
                // }
            });
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

        var tf = $('#table_file_detail').DataTable({
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
        $(document).on('click', '#tambah_file_detail', function() {
            tf.row.add( [
                "<input class='form-control' placeholder='' type='file' name='file[]' value='' id='file'>",
                "<textarea class='form-control' name='file_note[]' id='file_note' style='height: 10%;'></textarea>",
                "<button type='button' class='btn btn-danger kurang_file_detail' id='kurang_file_detail'><i class='icon-copy fi-minus'></i></button>"
            ] ).draw( false );
            $("#table_file_detail").find('tr').addClass('baris_detail');
        });


        // $(document).on( 'click', '#kurang_file_detail', function () {
        //     tf
        //         .row( $(this).parents('tr') )
        //         .remove()
        //         .draw();
        // } );

        $('#table_file_detail').on('click', '.kurang_file_detail', function () {
            var table = $('#table_file_detail').DataTable();
            table
                .row($(this).parents('tr'))
                .remove()
            .draw();
		});

        // $(document).on('click', '.kurang_file_detail', function() {
        //     $(this).parents(".baris_detail").remove();
        //     // $("#div_email_cc").append($('#clone_email_cc').clone().html());
        // });

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

        // function cetak(uuid){
        //     // $("#table_qrcode").on('click', '.cetak', function() {
        //     // console.log($(this).parents(".test").find(".qr").html());

        //     QRCode.toString(uuid, function (err, string) {
        //         if (err) throw err
        //         var mywindow = window.open("", "PRINT", "height=400,width=600");
        //         mywindow.document.write("<html><head>");
        //         mywindow.document.write("</head><body >");
        //         // mywindow.document.write("<h1>" + document.title  + "</h1>");
        //         mywindow.document.write("<row>");
        //         // for (i = 0; i < 10; i++) {
        //         // mywindow.document.write("<div style='display: inline-block'><div style='width:2300px;height:1550px;border: 2px dashed black;margin: 10px;display: flex'>");
        //         // mywindow.document.write("<div  style='width:1000px;display: inline-block'>"+
        //         // "<div style='width:100%;height:500px;padding-top:20px;padding-left:10px;margin:auto'><img class='img img-responsive' src='{{ url('/') }}/assets/dist/img/logo-ciputra_original_old2.png' style='width:100%'></div>"+
        //         // "<div style='width:100$;padding:10px'><h2 style='margin: 0 auto;text-align: left'><label>Unit:</label><br><br><label>Kawasan:</label><br><br><br></h2></div></div>");
        //         mywindow.document.write("<div style='width:500px;display: inline-block;margin:auto'>"+string+"</div>");
        //         // mywindow.document.write("</div></div>");
        //         // }
        //         mywindow.document.write("</row>");
        //         mywindow.document.write("</body></html>");
        //         mywindow.document.close(); // necessary for IE >= 10
        //         mywindow.focus(); // necessary for IE >= 10*/
        //         mywindow.print();
        //         console.log(string)
        //     })

        //     //     // return true;
        // };

        $('#file_attachment').DataTable({
            "paging":true,
            "destroy": true,
            "columns":[
                    {data:"no",name:"no"},
                    {data:"file",name:"file"},
                    {data:"description",name:"description"},
                    {data:"aksi",name:"aksi"}
            ],
            "order": [[ 0, 'asc' ]]
            // "columnDefs": [
            //     {
            //         "targets": 1,
            //         // "className": "text-center",
            //     }
            // ],
        });

        $('#file_lampiran').DataTable({
            "paging":true,
            "destroy": true,
            "columns":[
                    {data:"id"},
                    {data:"no",name:"no"},
                    {data:"file",name:"file"},
                    {data:"description",name:"description"},
                    {data:"aksi",name:"aksi"}
            ],
            "order": [[ 0, 'asc' ]]
            // "columnDefs": [
            //     {
            //         "targets": 1,
            //         // "className": "text-center",
            //     }
            // ],
        });

        // var t = $('#file_attachment').DataTable({
        //         autoWidth: false,
        //         paging:false,
        //         columnDefs: [
        //         {
        //             "targets": 3,
        //             "className": "text-center",
        //             // "width": "4%"
        //         },
        //         // {
        //         //     "targets": 2,
        //         //     "className": "text-right",
        //         // },
        //         ],
        // });

        // $('#addRow').on( 'click', function () {
        //     t.row.add( [
        //         null,
        //         "<input type='file' class='form-control file' name='file[]' style='width:100%;' accept='application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, image/jpeg, image/png, application/pdf'>",
        //         "<input type='text' class='form-control file_name' name='file_name[]' autocomplete='off' style='width:100%;' placeholder='Nama File'>",
        //         "<button type='button' class='btn btn-danger hapus' ><i class='fa fa-trash' style='font-size:15px'></i></button>"
        //     ] ).draw( false );
        //     // $("#file_attachment").find('tr');
        //     // $("select").select2();
        // });

        function hapus(id, document_id){
            var url = "{{ url('/')}}/delete-file";
            if(confirm("Apakah anda yakin menghapus file ini?")){
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: url,
                    data: {
                        id : id,
                        document_id : document_id
                    },
                    // beforeSend: function() {
                    //     waitingDialog.show();
                    // },
                    success: function(data) {
                    },
                    // complete: function() {
                    //     waitingDialog.hide();
                    // }
                });
            }else{
                return false;
            }
        }

        $(document).on('click', '.edit_file_document', function() {
            // $("#index").val("");
            // $("#no_referensi").val("");
            // $("#catatan").val("");
            var id = $(this).data("id");
            // $("#id_department").val(id);
            var url = "{{ url('/') }}/edit-file";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    id: id
                    // document_id: $("#document_id").val(),
                },
                success: function(data) {
                    $("#edit_document_id").val(data.data.document_id)
                    $("#edit_attachment_id").val(data.data.attachment_id);
                    $("#edit_file_note").val(data.data.notes);
                    var  link = "{{ url('/') }}/download-file?id=" + data.data.attachment_id;
                    document.getElementById('link_file').innerHTML = '<a  class="btn btn-info font_kecil btn-sm" href="' + link + '"><i class="fa fa-cloud-download"> Download</i></a>';
                },
            });
            $("#ModalEditFile").modal('show');
        });

        function file(source_id,type){
            var url = "{{ url('/')}}/file_attachment";
            $('#file_attachment').DataTable().clear().draw();
            $("#detail_doc_id").val(source_id);
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
                                aksi: v.aksi,
                                cek: v.cek
                            };
                            $('#file_attachment').DataTable().row.add(ItemTable);
                        });
                        $("#count_file").val(data.file.length);
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

        $(document).on('click', '.edit_detail', function() {
            // $("#index").val("");
            // $("#no_referensi").val("");
            // $("#catatan").val("");
            var id = $(this).data("id");
            // $("#id_department").val(id);
            var url = "{{ url('/') }}/data-detail-document";
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url,
                data: {
                    id: id
                    // document_id: $("#document_id").val(),
                },
                success: function(data) {
                    $("#edit_detail_document_id").val(id)
                    $("#edit_name").val(data.data.name);
                    $("#edit_no_referensi").val(data.data.reference_no);
                    $("#edit_catatan").val(data.data.notes);
                },
            });
            $("#ModalEditDetail").modal('show');
        });

        $(document).on('click', '.add_filedetail', function() {
            var id = $(this).data("id");
            // $("#edit_detail_document_id").val(id);
            $("#ModalAddFileDetail").modal('show');
        });
    </script>
</body>
</html>
