<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetakLaporanController extends Controller
{
    public function index_tahun(){
        $tahun = DB::table('v_tahun')->get();
        return view('admin.cetak_laporan.index_tahun', ['tahuns' => $tahun]);
    }
    public function index_bulan($tahun){
        $bulan = DB::table('v_bulan')
                    ->where('tahun', $tahun)
                    ->get();
        return view('admin.cetak_laporan.index_bulan', [
            'bulans' => $bulan,
            'tahun' => $tahun]);
    }
    public function index($tahun, $bulan)
    {
        $presensi = DB::table('v_cetak_laporan_presensi')
                        ->where('tahun', $tahun)
                        ->where('nama', $bulan)
                        ->get();
                        // dump($presensi);
        return view('admin.cetak_laporan.index', [
            'presensis' => $presensi,
            'bulan' => $bulan,
            'tahun' => $tahun]);
    }
    
}
