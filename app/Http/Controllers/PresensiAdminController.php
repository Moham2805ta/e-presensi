<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresensiAdmin;
use Illuminate\Support\Facades\DB;


class PresensiAdminController extends Controller
{
    public function index()
    {
        $presensi = PresensiAdmin::orderBy('tgl_presensi', 'desc')->get();
        // dump($presensi);
        return view('admin.presensi.index', ['presensis' => $presensi]);
    }

    public function destroy($presensi_admin){
        //hapus file 
        $presensi_admin = DB::table('presensi')->where('id',$presensi_admin);
        $presensi_admin->delete();
        $presensi = PresensiAdmin::orderBy('tgl_presensi', 'desc')->get();
        // dump($presensi);
        return redirect()->route('presensi.index', ['presensis' => $presensi])->with('hapus',"hapus data berhasil");

    }
}

