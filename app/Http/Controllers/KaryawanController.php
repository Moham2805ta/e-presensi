<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;


class KaryawanController extends Controller
{
    //ini menampilkan index.blade.php
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan.index', compact('karyawan'));
    }

    //ini menampilkan tampilan form tambah tambah.blade.php
    public function create() {
        return view('admin.karyawan.tambah');
    }

    //ini melakukan proses penambahan data
    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/|min:3',
            'nik' => 'required|unique:karyawan|size:16',
            'password' => 'required|min:5',
            // 'email' => 'required',
        ]);

        $User = new Karyawan();
        $User->nik = $validateData['nik'];
        $User->nama_lengkap = $validateData['nama'];
        $User->no_hp = '0812';
        $User->jabatan = 'Guru';
        // $User->email = $validateData['email'];
        $User->remember_token = Str::random(10);
        $User->password =  Hash::make($validateData['password']);
        $User->save();

        return redirect()->route('karyawan.index')
                ->with('tambah',"penambahan data {$validateData['nama']} berhasil");

    }

    public function edit(Karyawan $karyawan){
        return view('admin.karyawan.edit',['karyawan' => $karyawan]);
    }

    public function destroy(Karyawan $karyawan){
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('hapus',"hapus data $karyawan->nama_lengkap berhasil");

    }

    public function update(Karyawan $karyawan, Request $request){
        $karyawan = Karyawan::find($karyawan->nik);
            $validateData = $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/|min:3',
            'nik' => 'required|size:16|unique:karyawan,nik,'.$karyawan->nik.',nik',
            'password' => 'nullable|min:5',
        ]);

        $karyawan->nik = $validateData['nik'];
        $karyawan->nama_lengkap = $validateData['nama'];
        $karyawan->no_hp = '0812';
        $karyawan->jabatan = 'Guru';
        $karyawan->remember_token = Str::random(10);

        if(trim($validateData['password']) !== '') {
            $karyawan->password = Hash::make($validateData['password']);
        }

        $karyawan->save();
        return redirect()->route('karyawan.index')->with('ubah',"Update data {$validateData['nama']} berhasil");
    }

}
