<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresensiAdmin;


class DashboardAdminController extends Controller
{
    public function index() {
        // return view('admin.dashboard.index');
        $presensi = PresensiAdmin::orderBy('tgl_presensi', 'desc')->get();
        // dump($presensi);
        return view('admin.presensi.index', ['presensis' => $presensi]);    
    }
}
