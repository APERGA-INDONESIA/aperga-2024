<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Type;
use App\Models\Talent;
use App\Models\TalentSkill;
use App\Models\Contract;
use Cloudinary;
use DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class ApperlogController extends Controller
{
    public function __construct()
    {
        define('DOMAIN', "items");
        define('VIEW', "apperlog");
        define('URL', "apperlog");
        $this->limit = 12;
        $this->data = null;
        $this->data_edit = null;
        $this->data_delete = null;
    }

    public function index(Request $request){
        $this->data = Contract::with("talent.type");
        if($request->type_id){
            $this->data = $this->data->where("type_id", $request->type_id);
        }
        if($request->search){
            $this->data = $this->data->where("name", "like", "%$request->search%");
        }
        if (Auth::user()->role !== "superuser") {
            $this->data = $this->data->where("customer_id", Auth::user()->id);
        }
        $this->data = $this->data->orderBy("id", "desc")->simplePaginate($this->limit);
        $total = 10;
        $page = 1;
        $total_page = 1;
        return view('apperlog.index', [
            "url" => "apperlog",
            "show" => $this->data->count(),
            "items" => $this->data,
            "total" => $total,
            "total_page" => $total_page,
            "page" => $page,
            "prev" => $page <= 1 ? 1 : $page - 1,
            "next" => $page >= $total_page ? $total_page : $page + 1,
            "type" => Type::where("deleted_by", null)->get(),
            "type_id" => @$request->type_id,
            "search" => @$request->search,
        ]);
    }

    public function view($id, Request $request){
        if (Auth::user()->role !== "superuser") { abort(401); }
        $this->data = Contract::with("talent.type")->find($id);
        if(!$this->data){
            abort(404);
        }
        return view('apperlog.approval', [
            "url" => "apperlog",
            "data" => $this->data,
        ]);
    }

    public function sign($id, Request $request){
        $this->data = Contract::with("talent.type")->find($id);
        if(!$this->data){
            abort(404);
        }
        return view('apperlog.sign', [
            "url" => "apperlog",
            "data" => $this->data,
        ]);
    }
    public function signPost($id, Request $request){
        $this->data = Contract::with("talent.type")->find($id);
        if(!$this->data){
            abort(404);
        }
        if($request->agree){
            $this->data->document_signed = 1;
            $this->data->document_signed_at = date("Y-m-d H:i:s");
            $this->data->document_signed_by = Auth::user()->id;
            $this->data->save();
        }
        return view('apperlog.sign', [
            "url" => "apperlog",
            "data" => $this->data,
        ]);
    }

    public function viewPost($id, Request $request){
        $this->data = Contract::find($id);
        if(!$this->data){
            abort(404);
        }
        if($request->file){
            $path = $request->file->store('pdfs');
            $this->data->document = $path;
        }
        $this->data->status = $request->status;
        $this->data->save();
        return redirect("/apperlog/progress/$id");
    }

    public function viewPDF($id, Request $request){
        $this->data = Contract::find($id);
        if(!$this->data){
            abort(404);
        }
        $path = storage_path('app/' . $this->data->document);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        return response($file, 200)->header('Content-Type', 'application/pdf');
    }
}
