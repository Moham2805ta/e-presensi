@extends('admin.layout.master')

@section('content')
<div class="card mt-4 mb-3">
    <div class="card-body">
        <h4>Data Akun karyawan</h4>
        <p>
            Anda dapat menambah, mengubah, dan menghapus data ini
        </p>
    </div>
</div>
  @if(session()->has('tambah'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session()->get('tambah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if(session()->has('ubah'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session()->get('ubah')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if(session()->has('hapus'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session()->get('hapus')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
<a href="{{ route('karyawan.create') }}" class="btn btn-sm btn-success mb-3">Tambah</a>
<div class="row">
    <div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama karyawan</th>
      <th>NIK</th>
      <th>No Handphone</th>
      <th>Jabatan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($karyawan as $karyawan)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $karyawan->nama_lengkap }}</td>
      <td>{{ $karyawan->nik }}</td>
      <td>{{ $karyawan->no_hp}}</td>
      <td>{{ $karyawan->jabatan}}</td>
      <td>
        <a href="{{route('karyawan.edit', ['karyawan' => $karyawan->nik])}}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{route('karyawan.delete', ['karyawan' => $karyawan->nik])}}" method="post" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

@endsection
@push('scripts')
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.print.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#datatable').DataTable();
} );
 </script>
@endpush