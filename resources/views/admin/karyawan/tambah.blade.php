@extends('admin.layout.master')
@section('content')
<div class="card mt-4 mb-3">
    <div class="card-body">
        <h4>Tambah Data Akun karyawan</h4>
        <p>
            Anda dapat menambah pada form di bawah ini
        </p>
    </div>
</div>

<div class="card">
    <div class="card-body">
    <form action="{{route('karyawan.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
                <div class="col-md-3">
                    <!-- inputan kalau mau nambah -->
                    <div class="form-group @error('nik') has-error @enderror">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="number" class="form-control" name="nik" value="{{ old('nik')}}"  required>
                        <div id="emailHelp" class="form-text">Pastikan sesuai dengan di KK / KTP</div>
                        @error('nik')
                            <span class="help-block" style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- sampai sini -->
                <!-- inputan kalau mau nambah -->
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="form-group @error('alamat') has-error @enderror ">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="" name="nama" value="{{ old('nama')}}" required>
                        @error('nama')
                            <span class="help-block" style="color:red;">{{$message}}</span>
                        @enderror
                    <div>
                        <!-- sampai sini -->
                
                    <!-- ini inputan kalau mau nambah -->
                    <div class="form-group @error('password') has-error @enderror "> 
                        <label for="" class="form-label mt-3">Password</label>
                        <input type="password" class="form-control" id="" name="password" value="{{ old('password')}}" required>
                        
                        @error('password')
                            <span class="help-block" style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- sampai sini -->
                    <!-- ini inputan kalau mau nambah -->
                    <div class="form-group @error('no_hp') has-error @enderror "> 
                        <label for="" class="form-label mt-3">No Handphone</label>
                        <input type="number" class="form-control" id="" name="no_hp" value="{{ old('no_hp')}}" required>
                        <div id="emailHelp" class="form-text">* Gunakan Nomer Whatsapp</div>
                        @error('no_hp')
                            <span class="help-block" style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- sampai sini -->
                </div>
                <div class="form-group @error('jabatan') has-error @enderror "> 
                    <label for="" class="form-label mt-3">Jabatan</label>
                    <input type="text" class="form-control" id="" name="jabatan" value="{{ old('jabatan')}}" required>
                    
                    @error('jabatan')
                        <span class="help-block" style="color:red;">{{$message}}</span>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary float-end mt-4">Submit</button>

                </div>

           
        </div>
        </form>
    </div>
</div>
@endsection