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

    public function viewDocument(Request $request)
    {
        $document = Document::find($request->id);
        $detail_document = DetailDocument::where("document_id",$document->id)->get();
        $department = Department::get();
        $lokasi = Storage::get();
        // return $request;
        return view('view_document',compact("document","detail_document","department","lokasi"));
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
        return view('index_lokasi',compact("lokasi"));
    }

    public function saveLokasi(Request $request)
    {
        // dd($request);
        // return $request;
        $document = new Storage;
        $document->name = $request->name;
        $document->code = $request->code;
        $document->description = $request->keterangan;
        $document->save();

        return response()->json(['status'=>1]);
    }

    public function indexDepartment(Request $request)
    {
        $department = Department::get();
        return view('index_department',compact("department"));
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

}
