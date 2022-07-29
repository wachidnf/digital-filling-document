<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Document;
use App\Models\DetailDocument;
use App\Models\MStorage;
use App\Models\Department;
use App\Models\LevelStorage;
use App\Models\Attachment;
use Illuminate\Support\Facades\Crypt;
use Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function indexDocument(Request $request)
    {
        $document = Document::get();
        return view('index_document',compact("document"));
    }

    public function createDocument(Request $request)
    {
        // $document = Document::all();
        $department = Department::get();
        $lokasi = MStorage::get();
        return view('create_document',compact("department","lokasi"));
    }

    public function editDocument(Request $request)
    {
        // $document = Document::all();
        $document = Document::find($request->id);
        $department = Department::get();
        $lokasi = MStorage::get();
        return view('edit_document',compact("department","lokasi","document"));
    }

    public function saveDocument(Request $request)
    {
        // dd($request);
        $document = new Document;
        $document->process_date = $request->tgl_process;
        $document->seq_no = $request->seq_nomor;
        $document->document_no = $request->no_dokumen;
        $document->department_id = $request->department;
        $document->description = $request->keterangan;
        $document->storage_id = $request->lokasi;
        $document->save();

        return redirect("/document");
    }

    public function updateDocument(Request $request)
    {
        // dd($request);
        $document = Document::find($request->document_id);
        $document->process_date = $request->tgl_process;
        $document->seq_no = $request->seq_nomor;
        $document->document_no = $request->no_dokumen;
        $document->department_id = $request->department;
        $document->description = $request->keterangan;
        $document->storage_id = $request->lokasi;
        $document->save();

        return redirect("/document");
    }

    public function viewDocument(Request $request)
    {
        $document = Document::find($request->id);
        $detail_document = DetailDocument::where("document_id",$document->id)->get();
        $department = Department::get();
        $lokasi = MStorage::get();
        // return $request;
        // $data = [
        //     "document_id" => $document->id,
        //     "type" => "document",
        //     "url" => "http://localhost/digital-filling-document/public/view-document?id=".$document->id,
        // ];
        // $data = json_encode($data);
        $data = "http://localhost/digital-filling-document/public/view-document-direct?id=".$document->id;
        return view('view_document',compact("document","detail_document","department","lokasi","data"));
    }

    public function deleteDocument(Request $request)
    {
        // dd($request);
        // return $request;
        Document::find($request->id)->delete();

        return redirect("/document");
    }

    public function saveDetailDocument(Request $request)
    {
        // dd($request);
        // return $request;
        $document = new DetailDocument;
        $document->document_id = $request->document_id;
        $document->reference_no = $request->no_referensi;
        $document->name = $request->name;
        $document->notes = $request->catatan;
        $document->save();

        // if (!file_exists("./detail_document/" )) {
        //     mkdir("./detail_document/", 0777, true);
        //     chmod("./detail_document/", 0777);
        // }

        //  if (!file_exists("./detail_document/" . $document->id)) {
        //     mkdir("./detail_document/" . $document->id, 0777, true);
        //     chmod("./detail_document/" . $document->id, 0777);
        // }

        foreach ($_FILES["file"]["error"] as $key => $error) {
            // return $request->file('file')[$key]->getClientMimeType();
            if ($error == 0 && $request->file_note[$key] != null) {
                $attachment = new Attachment;
                $attachment->source_id = $document->id;
                $attachment->type = "detail document";
                $uploadedFile = $request->file('file')[$key];
                $type = $uploadedFile->getClientMimeType();
                $array_file = array(
                    "application/msword",
                    "application/pdf",
                    "image/jpeg",
                    "image/pjpeg",
                    "image/png",
                    "application/excel",
                    "application/vnd.ms-excel",
                    "application/x-excel",
                    "application/x-msexcel",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                    // 'application/zip',
                    // 'application/x-zip-compressed',
                    // 'multipart/x-zip',
                    // 'application/x-compressed',
                    // 'application/rar',
                    // 'application/x-rar-compressed',
                    // 'multipart/x-rar',
                );

                $name = $_FILES['file']['name'][$key];
                $checkpdf = array_search($type, $array_file);
                if ($checkpdf != "") {
                    $pathpdf = Storage::put('detail_document/'.$document->id, $uploadedFile);
                    $new_file_name = explode("/", $pathpdf);
                    $tmp_name = $_FILES['file']['tmp_name'][$key];
                    $attachment->link = $pathpdf;
                    $attachment->description = $request->file_note[$key];
                    $attachment->filename = $name;
                }

                $attachment->save();
            }
        }

        return redirect("/view-document?id=".$request->document_id);
    }

    public function indexLokasi(Request $request)
    {
        $lokasi = MStorage::get();
        $level = LevelStorage::get();
        return view('index_lokasi',compact("lokasi", "level"));
    }

    public function editLokasi(Request $request)
    {
        $document = MStorage::find($request->id);
        $level = LevelStorage::get();
        return view('edit_lokasi',compact("document", "level"));
    }

    public function saveLokasi(Request $request)
    {
        // dd($request);
        // return $request;
        $document = new Storage;
        $document->name = $request->name;
        $document->level = $request->level;
        $document->code = $request->code;
        $document->description = $request->keterangan;
        $document->save();

        return response()->json(['status'=>1]);
    }

    public function updateLokasi(Request $request)
    {
        // dd($request);
        // return $request;
        $storage = MStorage::find($request->id);
        $storage->name = $request->name;
        $storage->level = $request->level;
        $storage->code = $request->code;
        $storage->description = $request->keterangan;
        $storage->save();

        // return response()->json(['status'=>1]);
        return redirect("/lokasi");
    }

    public function listLokasi(Request $request)
    {
        $storage = MStorage::find($request->id);
        $data['name']           = $storage->name;
        $data['level']          = $storage->level;
        $data['code']           = $storage->code;
        $data['description']    = $storage->description;
        return response()->json($data);
    }

    public function deleteLokasi(Request $request)
    {
        // dd($request);
        // return $request;
        MStorage::find($request->id)->delete();

        return redirect("/lokasi");
    }

    public function indexDepartment(Request $request)
    {
        $department = Department::get();
        return view('index_department',compact("department"));
    }

    public function updateDepartment(Request $request)
    {
        // dd($request);
        // return $request;
        $department = Department::find($request->id);
        $department->name = $request->name;
        $department->code = $request->code;
        $department->save();

        return response()->json(['status'=>1]);
    }

    public function listDepartment(Request $request)
    {
        $department     = Department::find($request->id);
        $data['name']   = $department->name;
        $data['code']   = $department->code;
        return response()->json($data);
    }

    public function deleteDepartment(Request $request)
    {
        // dd($request);
        // return $request;
        Department::find($request->id)->delete();

        return redirect("/department");
    }

    public function saveDepartment(Request $request)
    {
        // dd($request);
        // return $request;
        $document = new Department;
        $document->name = $request->name;
        $document->code = $request->code;
        $document->save();

        return response()->json(['status'=>1]);
    }

    public function qrcodeViewDocument(Request $request)
    {
        $document = Document::find($request->id);
        $detail_document = DetailDocument::where("document_id",$document->id)->get();
        $department = Department::get();
        $lokasi = MStorage::get();
        // return $request;
        // $data = [
        //     "document_id" => $document->id,
        //     "type" => "document",
        //     "url" => "http://localhost/digital-filling-document/public/view-document?id=".$document->id,
        // ];
        // $data = json_encode($data);
        $data = "http://localhost/digital-filling-document/public/view-document-direct?id=".$document->id;
        return view('qrcode_view_document',compact("document","detail_document","department","lokasi","data"));
    }

    public function fileAttachment(Request $request){
        // return $request;
        // return Attachment::where('source_id',$request->source_id)->where('type',$request->type)->get();

        $data = [];

        $attachment = Attachment::where('source_id',$request->source_id)->where('type',$request->type)->get();
        foreach ($attachment as $key => $value)
        {
            $url = url('/')."/download-file?id=".$value->id;
            $arr = [
                "file"        => '<a class="btn btn-info font_kecil" href="'.$url.'""><i class="fa fa-cloud-download">Download</i> </a>',
                "description"    => $value->description,
            ];
            array_push($data, $arr);

        }

        return response()->json(['file' => $data]);
    }

    public function downloadFile(Request $request)
    {
        // return "ss";
        $attachment = Attachment::find($request->id);

        // $headers = [
        //     'Content-Type' => 'application/pdf',
        // ];
        if ($attachment != "") {
            $filenames =$attachment->filename;
        }

        // if (count($filenames) != 5) {
        //     $name = "Gambar Lampiran";
        // } else {
            $name = $filenames;
        // }

        // $file = public_path() . "/" . str_replace("public", "", $attachment->filenames);
        // return response()->download($file, $name, $headers);
        return Storage::download($attachment->link, $name);
    }

}
