<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Type;
use App\Models\Talent;
use App\Models\TalentSkill;
use App\Models\Contract;
use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;
use Cloudinary;
use DB;

use Illuminate\Support\Facades\Auth;

class ApperfindController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        define('DOMAIN', "items");
        define('VIEW', "apperfind");
        define('URL', "apperfind");
        $this->limit = 12;
        $this->data = null;
        $this->data_edit = null;
        $this->data_delete = null;
        $this->model = new Talent();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $this->data = Talent::with(["type", "skills", "location_", "placement_location"]);
        if($request->type_id){
            $this->data = $this->data->where("type_id", $request->type_id);
        }
        if($request->search){
            $this->data = $this->data->where("name", "like", "%$request->search%");
        }
        if($request->location_id){
            $this->data = $this->data->where("location_id", $request->location_id);
        }
        if($request->age){
            $now = Carbon::now();
            $ageStart = null;
            $ageEnd = null;

            switch ($request->age) {
                case "18":
                    $ageStart = 18;
                    $ageEnd = 24;
                    break;
                case "25":
                    $ageStart = 25;
                    $ageEnd = 34;
                    break;
                case "35":
                    $ageStart = 35;
                    $ageEnd = 44;
                    break;
                case "45":
                    $ageStart = 45;
                    $ageEnd = 55;
                    break;
                case "55":
                    $ageStart = 55;
                    break;
                default:
                    $startDate = null;
                    $endDate = null;
            }
            if ($ageStart) {
                $startDate = $now->copy()->subYears($ageEnd + 1)->startOfDay();
                $endDate = $now->copy()->subYears($ageStart)->endOfDay();
        
                $this->data = $this->data->whereBetween('birthday', [$startDate, $endDate]);
            } else {
                $endDate = $now->copy()->subYears($ageStart)->endOfDay();
                $this->data = $this->data->where('birthday', '<=', $endDate);
            }
        }
        $this->data = $this->data->where("deleted_at", null)->orderBy("id", "desc")->simplePaginate($this->limit);
        $total = $this->model->where("deleted_by", null)->count();
        $total_page = ceil($total / $this->limit);
        $page = $request->page == null ? 1 : $request->page;
        return view('apperfind.index', [
            "url" => "apperfind",
            "show" => $this->data->count(),
            "items" => $this->data,
            "total" => $total,
            "total_page" => $total_page,
            "page" => $page,
            "prev" => $page <= 1 ? 1 : $page - 1,
            "next" => $page >= $total_page ? $total_page : $page + 1,
            "type" => Type::where("deleted_by", null)->get(),
            "type_id" => @$request->type_id,
            "location_id" => @$request->location_id,
            "search" => @$request->search,
            "locations" => Location::where("deleted_at", null)->get(),
            "age" => $request->age,
            "ages" => [
                "18" => "18 - 24 Tahun",
                "25" => "25 - 34 Tahun",
                "35" => "35 - 44 Tahun",
                "45" => "45 - 55 Tahun",
                "55" => ">55 Tahun",
            ]
        ]);
    }

    public function detail($id, Request $request)
    {
        $this->data = Talent::with(["type", "skills"])->where("id", $id)->first();
        return view('apperfind.detail', [
            "url" => "apperfind",
            "data" => $this->data,
        ]);
    }

    public function contract($id, Request $request)
    {
        $this->data = Talent::with(["type", "skills"])->where("id", $id)->first();
        return view('apperfind.contract', [
            "url" => "apperfind",
            "data" => $this->data,
            "locations" => Location::where("deleted_at", null)->get(),
            "customers" => User::where(["role" => "customer", "deleted_at" => null])->get(),
        ]);
    }
    public function contractPost($id, Request $request)
    {
        // apperfind_contract_success
        $dateNow = date("dmY");
        $lastDataToday = Contract::whereDate("created_at", date("Y-m-d"))->orderBy("id", "desc")->first();
        if ($lastDataToday) {
            $generated_id = substr($lastDataToday->generated_id, -4) + 1;
            $generated = $dateNow . sprintf("%04d", $generated_id);
        } else {
            $generated_id = 1;
            $generated = $dateNow . sprintf("%04d", $generated_id);
        }
        $this->data = Contract::create([
            "generated_id" => $generated,
            "talent_id" => $id,
            "customer_id" => $request->customer_id ? $request->customer_id : Auth::user()->id,
            "name" => $request->name,
            "contact" => @$request->contact,
            "status" => "onreview",
            "address" => $request->address,
            "outside_address" => @$request->outside_address == "on" ? 1 : 0,
            "plan_number" => $request->plan_number,
            "plan_type" => $request->plan_type,
            "payment_type" => $request->payment_type,
            "dp_amount" => @$request->dp_amount ? $request->dp_amount : 0,
            "amount" => $request->amount,
            "note" => $request->note,
        ]);
        return redirect("/apperfind/success/{$this->data->id}");
    }
    public function success($id, Request $request)
    {
        $this->data = Contract::where("id", $id)->with("talent")->first();
        if(!$this->data){
            abort(404);
        }
        return view('apperfind.success', [
            "url" => "apperfind",
            "data" => $this->data,
        ]);
    }

    public function progress($id, Request $request)
    {
        $this->data = Contract::where("id", $id)->with("talent")->first();
        if(!$this->data){
            abort(404);
        }
        return view('apperfind.progress', [
            "url" => "apperfind",
            "data" => $this->data,
        ]);
    }

    public function create()
    {
        if (Auth::user()->role !== "superuser") {
            abort(401);
        }
        return view(VIEW . '.create', [
            "message" => null,
            "url" => URL,
            "view" => VIEW,
            "type" => Type::where("deleted_at", null)->get(),
            "skill" => Skill::where("deleted_at", null)->get(),
            "education" => ["SD", "SMP", "SMA", "SMK", "D1", "D2", "D3", "D4", "S1", "S2", "S3"],
            "locations" => Location::where("deleted_at", null)->get(),
        ]);
    }

    public function postCreate(Request $request)
    {
        $return_data = [
            "message" => "",
            "url" => URL,
            "view" => VIEW,
        ];
        
        $images = [];
        if($request->file){
            foreach ($request->allFiles() as $file) {
                if($file){
                    foreach ($file as $f) {
                        $images[] = Cloudinary::upload($f->getRealPath())->getSecurePath();
                    }
                }
            }
        }
        foreach ($images as $key => $value) {
            $request['image'.$key+1] = @$value;
        }

        $skills = $request->skills;
        $data = $request->except('_token');
        $data['created_by'] = Auth::user()->id;
        $talent = $this->model->create($data);
        if($skills){
            foreach ($skills as $skill) {
                TalentSkill::create([
                    "talent_id" => $talent->id,
                    "skill_id" => $skill,
                ]);
            }
        }
        return redirect("/" . URL);
    }

    public function edit($id, Request $request)
    {
        if (Auth::user()->role !== "superuser") {
            abort(401);
        }

        $this->data_edit = $this->model->where("id", $id)->with("skills")->first();
        return view(VIEW . '.edit', [
            "data" => $this->data_edit,
            "message" => null,
            "url" => URL,
            "view" => VIEW,
            "type" => Type::where("deleted_at", null)->get(),
            "skill" => Skill::where("deleted_at", null)->get(),
            "selected_skill" => TalentSkill::where(["talent_id" =>  $id, "status" => 1])->pluck("skill_id")->toArray(),
            "education" => ["SD", "SMP", "SMA", "SMK", "D1", "D2", "D3", "D4", "S1", "S2", "S3"],
            "locations" => Location::where("deleted_at", null)->get(),
        ]);
    }

    public function postEdit($id, Request $request)
    {
        $this->data_edit = $this->model->find($id);
        if($request->image1){
            $this->data_edit->image1 = Cloudinary::upload($request->image1->getRealPath())->getSecurePath();
        }
        if($request->image2){
            $this->data_edit->image2 = Cloudinary::upload($request->image2->getRealPath())->getSecurePath();
        }
        if($request->image3){
            $this->data_edit->image3 = Cloudinary::upload($request->image3->getRealPath())->getSecurePath();
        }
        if($request->image4){
            $this->data_edit->image4 = Cloudinary::upload($request->image4->getRealPath())->getSecurePath();
        }
        $skills = $request->skills;
        $data = $request->except('_token', 'skills', 'image1', 'image2', 'image3', 'image4');
        $this->data_edit->update($data);
        $this->data_edit->save();
        if($skills){
            //update status to 1
            foreach ($skills as $skill) {
                $exist = TalentSkill::where(["talent_id" =>  $this->data_edit->id, "skill_id" => $skill])->first();
                if($exist){
                    $exist->status = 1;
                    $exist->save();
                }else{
                    TalentSkill::create([
                        "talent_id" => $this->data_edit->id,
                        "skill_id" => $skill,
                    ]);
                }
            }

            //update status to 0
            $selected_skill = TalentSkill::where(["talent_id" =>  $this->data_edit->id, "status" => 1])->pluck("skill_id")->toArray();
            foreach ($selected_skill as $skill) {
                if(!in_array($skill, $skills)){
                    $exist = TalentSkill::where(["talent_id" =>  $this->data_edit->id, "skill_id" => $skill])->first();
                    if($exist){
                        $exist->status = 0;
                        $exist->save();
                    }
                }
            }
        }
        return redirect("/" . URL);
    }


    public function delete($id)
    {
        if (Auth::user()->role !== "superuser") {
            abort(401);
        }
        $this->data_delete = $this->model->findOrFail($id);
        return view(VIEW . '.delete', [
            DOMAIN => $this->data_delete,
            "message" => null,
            "url" => URL,
            "view" => VIEW,
        ]);
    }

    public function postDelete($id)
    {
        $this->data_edit = $this->model->find($id);
        $this->data_edit->deleted_by = Auth::user()->id;
        $this->data_edit->deleted_at = date("Y-m-d h:i:s");
        $this->data_edit->save();
        return redirect("/" . URL);
    }
}
