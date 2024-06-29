<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\Models\User;

class AdminController extends Controller
{
    private int $limit;
    private $data;

    public function __construct()
    {
        define('DOMAIN', "admins");
        define('VIEW', "admin");
        define('URL', "administrator");
        $this->limit = 10;
        $this->data = null;
        $this->dataEdit = null;
        $this->model = new User();
    }
    
    public function index(Request $request)
    {
        if (Auth::user()->role !== "superuser") { abort(401); }
        $this->data = $this->model;
        $total = $this->data->count();
        $this->data = $this->data->orderBy("id", "desc")->simplePaginate($this->limit);
        $total_page = ceil($total / $this->limit);
        $page = $request->page == null ? 1 : $request->page;
        return view(VIEW.'.index', [
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
        if (Auth::user()->role !== "superuser") { abort(401); }
        return view(VIEW.'.create', [
            "message" => null,
            "url" => URL,
            "view" => VIEW,
        ]);
    }

    public function postCreate(Request $request)
    {
        if (Auth::user()->role !== "superuser") { abort(401); }
        $return_data = [
            "message" => "",
            "url" => URL,
            "view" => VIEW,
        ];
        if ($request->password !== $request->password_confirm) {
            $return_data['message'] = "Password & Konfirmasinya harus sama!";
            return view(VIEW.'.create', $return_data);
        }
        $data_exists = $this->model
                    ->where(["name" => $request->name])
                    ->orWhere(["email" => $request->email])
                    ->count();
            
        if ($data_exists > 0) {
            $return_data['message'] = "Nama '{$request->name}' atau Email '{$request->email}' sudah ada, mohon coba lainnya!";
            return view(VIEW.'.create', $return_data);
        }
        $data = $request->except('_token');
        $data['created_by'] = Auth::user()->id;
        $this->model->create($data);
        return redirect("/".URL);
    }

    public function edit($id)
    {
        if (Auth::user()->role !== "superuser") { abort(401); }
        $this->dataEdit = $this->model->findOrFail($id);
        return view(VIEW.'.edit', [
            DOMAIN => $this->dataEdit,
            "message" => null,
            "url" => URL,
            "view" => VIEW,
        ]);
    }

    public function postEdit($id, Request $request)
    {
        if (Auth::user()->role !== "superuser") { abort(401); }
        $this->dataEdit = $this->model->find($id);
        if ($request->name != $this->dataEdit->name || $request->email != $this->dataEdit->email) {
            $data_exists = $this->model->where(["name" => $request->name])
                        ->orWhere(["email" => $request->email])
                        ->where("id", "!=", $id)
                        ->count();
            if ($data_exists > 0) {
                return view(VIEW.'.edit', [
                    "message" => "Nama '{$request->name}' sudah ada, mohon coba yang lain!",
                    DOMAIN => $this->dataEdit,
                    "url" => URL,
                    "view" => VIEW,
                ]);
            }
        }
        $this->dataEdit->name = $request->name;
        $this->dataEdit->email = $request->email;
        $this->dataEdit->phone = $request->phone;
        $this->dataEdit->role = $request->role;
        $this->dataEdit->save();
        return redirect("/".URL);
    }

    public function pass($id)
    {
        if (Auth::user()->role !== "superuser") { abort(401); }
        $this->dataEdit = $this->model->findOrFail($id);
        return view(VIEW.'.pass', [
            DOMAIN => $this->dataEdit,
            "message" => null,
            "url" => URL,
            "view" => VIEW,
        ]);
    }

    public function postPass($id, Request $request)
    {
        if (Auth::user()->role !== "superuser") { abort(401); }
        $return_data = [
            DOMAIN => $this->dataEdit,
            "message" => null,
            "url" => URL,
            "view" => VIEW,
        ];
        if ($request->password !== $request->password_confirm) {
            $return_data['message'] = "Password & Confirm should be same!";
            return view(VIEW.'.pass', $return_data);
        }
        $this->dataEdit = $this->model->findOrFail($id);
        $this->dataEdit->password = Hash::make($request->password);
        $this->dataEdit->save();
        return redirect("/".URL);
    }

    public function postDelete($id)
    {
        if (Auth::user()->role !== "superuser") { abort(401); }
        $this->dataEdit = $this->model->find($id);
        $this->dataEdit->deleted_by = Auth::user()->id;
        $this->dataEdit->deleted_at = date("Y-m-d h:i:s");
        $this->dataEdit->save();
        return redirect("/".URL);
    }
}
