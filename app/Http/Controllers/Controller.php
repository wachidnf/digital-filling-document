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
use App\Models\Storage;
use App\Models\Department;
use App\Models\LevelStorage;
use Illuminate\Support\Facades\Crypt;

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
        $lokasi = Storage::get();
        return view('create_document',compact("department","lokasi"));
    }

    public function editDocument(Request $request)
    {
        // $document = Document::all();
        $document = Document::find($request->id);
        $department = Department::get();
        $lokasi = Storage::get();
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
        $lokasi = Storage::get();
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

        return response()->json(['status'=>1]);
    }

    public function indexLokasi(Request $request)
    {
        $lokasi = Storage::get();
        $level = LevelStorage::get();
        return view('index_lokasi',compact("lokasi", "level"));
    }

    public function editLokasi(Request $request)
    {
        $document = Storage::find($request->id);
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
        $storage = Storage::find($request->id);
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
        $storage = Storage::find($request->id);
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
        Storage::find($request->id)->delete();

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
        $lokasi = Storage::get();
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

}
