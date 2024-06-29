<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use DB;

use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{

    public function __construct()
    {
        define('DOMAIN', "items");
        define('VIEW', "masterdata.skill");
        define('URL', "masterdata/skill");
        $this->limit = 10;
        $this->data = null;
        $this->data_edit = null;
        $this->data_delete = null;
        $this->model = new skill();
    }

    public function index(Request $request)
    {
        if (Auth::user()->role !== "superuser") {
            abort(401);
        }
        $this->data = $this->model
            ->where("deleted_by", null)
            ->orderBy("id", "desc")
            ->simplePaginate($this->limit);
        $total = $this->model->where("deleted_by", null)->count();
        $total_page = ceil($total / $this->limit);
        $page = $request->page == null ? 1 : $request->page;
        return view(VIEW . '.index', [
            DOMAIN => $this->data,
            "url" => URL,
            "view" => VIEW,
            "show" => $this->data->count(),
            "total" => $total,
            "total_page" => $total_page,
            "page" => $page,
            "prev" => $page <= 1 ? 1 : $page - 1,
            "next" => $page >= $total_page ? $total_page : $page + 1,
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
        ]);
    }

    public function postCreate(Request $request)
    {
        $return_data = [
            "message" => "",
            "url" => URL,
            "view" => VIEW,
        ];
        $data_exists = $this->model
            ->where([
                "skill" => $request->skill,
                "deleted_at" => null
            ])
            ->count();

        if ($data_exists > 0) {
            $return_data['message'] = "Skill '{$request->skill}' sudah ada, coba yang lain!";
            return view(VIEW . '.create', $return_data);
        }
        $data = $request->except('_token');
        $data['created_by'] = Auth::user()->id;
        $this->model->create($data);
        return redirect("/" . URL);
    }

    public function edit($id)
    {
        if (Auth::user()->role !== "superuser") {
            abort(401);
        }
        $this->data_edit = $this->model->findOrFail($id);
        return view(VIEW . '.edit', [
            DOMAIN => $this->data_edit,
            "message" => null,
            "url" => URL,
            "view" => VIEW,
        ]);
    }

    public function postEdit($id, Request $request)
    {
        $this->data_edit = $this->model->find($id);
        if ($request->skill != $this->data_edit->skill) {
            $data_exists = $this->model->where(["skill" => $request->skill])
                ->count();
            if ($data_exists > 0) {
                return view(VIEW . '.edit', [
                    "message" => "Skill PRT '{$request->skill}' sudah ada, coba yang lain!",
                    DOMAIN => $this->data_edit,
                    "url" => URL,
                    "view" => VIEW,
                ]);
            }
        }
        $this->data_edit->skill = $request->skill;
        $this->data_edit->save();
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
