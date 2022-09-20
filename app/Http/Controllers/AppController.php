<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\CompanyPic;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function dashboard()
    {
        return view("admin.dashboard");
    }

    public function profile()
    {
        return view("admin.profile");
    }

    public function home()
    {
        return view("admin.home.home");
    }

    public function setting()
    {
        return view("admin.setting");
    }

    public function vendor()
    {
        return view("admin.data_vendor");
    }

    public function trans()
    {
        return view("admin.data_trans");
    }

    public function data_pick_up()
    {
        return vieW("admin.data_pick_up");
    }

    public function order()
    {
        return view("admin.order");
    }

    public function bangunan()
    {
        return view("admin.bangunan");
    }

    public function barang()
    {
        return view("admin.barang");
    }

    public function pickup()
    {
        return view("admin.pickup");
    }

    public function payment()
    {
        return view("admin.payment");
    }

    public function pengaturan_user()
    {
        return view("admin.pengaturan_user");
    }

}
