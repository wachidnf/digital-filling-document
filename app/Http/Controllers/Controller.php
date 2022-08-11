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
use App\Models\Project;
use App\Models\Pt;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Crypt;
use Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function indexDocument(Request $request)
    {
        $user = \Auth::user();
        $project = [];
        $pt = [];
        $department = [];
        foreach ($user->detail as $key => $value) {
            # code...
            // array_push($project, $value->project_id);
            array_push($pt, $value->pt_id);
            array_push($department, $value->department_id);
        }
        if($user->level == "admin"){
            $document = Document::get();
        }else{
            $document = Document::whereIn("department_id",$department)->get();
        }
        return view('index_document',compact("document","user"));
    }

    public function createDocument(Request $request)
    {
        // $document = Document::all();
        $department = Department::get();
        $lokasi = MStorage::get();
        $project = Project::get();
        $pt = Pt::get();
        return view('create_document',compact("department","lokasi","project","pt"));
    }

    public function editDocument(Request $request)
    {
        // $document = Document::all();
        $document = Document::find($request->id);
        $department = Department::get();
        $lokasi = MStorage::get();
        $project = Project::get();
        $pt = Pt::get();
        return view('edit_document',compact("department","lokasi","document","project","pt"));
    }

    public function saveDocument(Request $request)
    {
        // dd($request);
        $roman         = [
            '01' => 'I',
            '02' => 'II',
            '03' => 'III',
            '04' => 'IV',
            '05' => 'V',
            '06' => 'VI',
            '07' => 'VII',
            '08' => 'VIII',
            '09' => 'IX',
            '10' => 'X',
            '11' => 'XI',
            '12' => 'XII',
        ];

        $document_lama = Document::where("project_id", $request->project)->get();
        $department = Department::find($request->department);
        $bulan      = $roman[\Carbon\Carbon::now()->format('m')];
        $tahun      = \Carbon\Carbon::now()->format('Y');
        $project    = Project::find($request->project);
        $pt         = Pt::find($request->pt);
        // 0136/TENDER/CD/VI/2022/CGSDJ/CFAT
        $no = (count($document_lama)+1).'/'.'DOC'.'/'.$department->code.'/'.$bulan.'/'.$tahun .'/'.$project->code.'/'.$pt->code;

        $document = new Document;
        $document->process_date = $request->tgl_process;
        $document->seq_no = $request->seq_nomor;
        $document->document_no = $no;
        $document->department_id = $request->department;
        $document->project_id = $request->project;
        $document->pt_id = $request->pt;
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
        $project = Project::get();
        $pt = Pt::get();
        // return $pt;
        // return $request;
        // $data = [
        //     "document_id" => $document->id,
        //     "type" => "document",
        //     "url" => "http://localhost/digital-filling-document/public/view-document?id=".$document->id,
        // ];
        // $data = json_encode($data);
        $data = "https://digfil.citragran.com/view-document-direct?id=".$document->id;
        return view('view_document',compact("document","detail_document","department","lokasi","data","project","pt"));
    }

    public function deleteDocument(Request $request)
    {
        // dd($request);
        // return $request;
        Document::find($request->id)->delete();

        return redirect("/document");
    }

    public function deleteDetailDocument(Request $request)
    {
        // dd($request);
        // return $request;
        $detail = DetailDocument::find($request->id);
        DetailDocument::find($request->id)->delete();

        return redirect("/view-document?id=".$detail->document_id);
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

    public function dataDetailDocument(Request $request)
    {
        $detail_document = DetailDocument::find($request->id);
        // $data['name']   = $department->name;
        // $data['code']   = $department->code;
        return response()->json(["data" => $detail_document]);
    }

    public function editDetailDocument(Request $request)
    {
        $detail_document = DetailDocument::find($request->edit_detail_document_id);
        $detail_document->reference_no = $request->edit_no_referensi;
        $detail_document->name = $request->edit_name;
        $detail_document->notes = $request->edit_catatan;
        $detail_document->save();

        return redirect("/view-document?id=".$detail_document->document_id);
    }

    public function indexMedia(Request $request)
    {
        $user = \Auth::user();
        $level = LevelStorage::get();
        return view('index_media',compact("level"));
    }

    public function updateMedia(Request $request)
    {
        // dd($request);
        // return $request;
        $media = LevelStorage::find($request->id);
        $media->name = $request->name;
        $media->save();

        return response()->json(['status'=>1]);
    }

    public function listMedia(Request $request)
    {
        $media          = LevelStorage::find($request->id);
        $data['name']   = $media->name;
        return response()->json($data);
    }

    public function deleteMedia(Request $request)
    {
        // dd($request);
        // return $request;
        LevelStorage::find($request->id)->delete();

        return redirect("/media");
    }

    public function saveMedia(Request $request)
    {
        // dd($request);
        // return $request;
        $media = new LevelStorage;
        $media->name = $request->name;
        $media->save();

        return response()->json(['status'=>1]);
    }

    public function indexLokasi(Request $request)
    {
        $user = \Auth::user();
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
        $document = new MStorage;
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

    public function indexUser(Request $request)
    {
        $user = User::get();

        return view('index_user',compact("user"));
    }

    public function saveUser(Request $request)
    {
        // return $request;
        $document = new User;
        $document->username = $request->username;
        $document->name = $request->username;
        $document->email = $request->email;
        $document->password = Hash::make($request->password);
        $document->save();

        return response()->json(['status'=>1]);
    }

    public function updateUser(Request $request)
    {
        // return $request;
        $document = User::find($request->user_id);
        $document->username = $request->name;
        $document->name = $request->name;
        $document->email = $request->email;
        $document->password = Hash::make($request->password);
        $document->save();

        return redirect("/edit-user?id=".$request->user_id);
    }

    public function editUser(Request $request)
    {
        $user = User::find($request->id);
        $department = Department::get();
        $project = Project::get();
        $pt = Pt::get();

        return view('edit_user',compact("user","department","project","pt"));
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        foreach ($user->detail as $key => $value) {
            # code...
            $value->delete();
        }
        $user->delete();
        return redirect("/user");
    }

    public function saveUserDetail(Request $request)
    {
        // return $request;
        $document = new UserDetail;
        $document->user_id = $request->user_id;
        $document->project_id = $request->project;
        $document->pt_id = $request->pt;
        $document->department_id = $request->department;
        $document->save();

        return redirect("/edit-user?id=".$request->user_id);
    }

    public function deleteDetailUser(Request $request)
    {
        $detail_user = UserDetail::find($request->id);
        UserDetail::find($request->id)->delete();

        return redirect("/edit-user?id=".$detail_user->user_id);
    }

    public function getUserCpms(Request $request)
    {
        $dataValidasi = (object) [];
        $dataValidasi->token = "c1nt4cpms";
        $dataValidasi->project_id = 3;
        $url = "https://cpms.ciputragroup.com:81/api/usercpms";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $dataValidasi);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataValidasi);

        $data = curl_exec($ch);
        $data = json_decode($data);

        // dd($data->data);
        DB::beginTransaction();
        try {
            foreach($data->data as $key => $value){
                if($value->email != null){
                    $user = User::where("email", $value->email)->first();
                    if($user == null){
                        $user = new User;
                        $user->username = $value->user_name;
                        $user->name = $value->user_name;
                        $user->email = $value->email;
                        $user->password = Hash::make("sungairaya");
                        $user->save();
                    }
                    $project = Project::where("name", $value->project_name)->first();
                    $pt = Pt::where("name", $value->pt_name)->first();
                    $department = Department::where("name", $value->departemen_name)->first();
                    if($project != null && $pt != null && $department != null){
                        $cek_user_detail = UserDetail::where("user_id", $user->id)->where("project_id", $project->id)->where("pt_id", $pt->id)->where("department_id", $department->id)->first();
                        if($cek_user_detail == null){
                            $user_detail = new UserDetail;
                            $user_detail->user_id = $user->id;
                            $user_detail->project_id = $project->id;
                            $user_detail->pt_id = $pt->id;
                            $user_detail->department_id = $department->id;
                            $user_detail->save();
                        }
                    }
                    // dd($value);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            return $e;
        }

        return "success";
    }

}
