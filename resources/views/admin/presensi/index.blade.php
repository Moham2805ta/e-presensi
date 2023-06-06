@extends('admin.layout.master')

@section('content')
<style>
  th {
  text-align: center;
  vertical-align: middle;
}
</style>
<div class="card mt-4 mb-3">
    <div class="card-body">
        <h4>Data Presensi</h4>
        <p>
            Anda dapat melihat presensi yang dilakukan.
        </p>
    </div>
</div>
@if(session()->has('hapus'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session()->get('hapus')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
<div class="row">
    <div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th rowspan="2">No</th>
      <th rowspan="2">Nama karyawan</th>
      <th rowspan="2">NIK</th>
      <th rowspan="2">Tanggal</th>
      <th colspan="2">Jam</th>
      <th colspan="2">Foto</th>
      <th colspan="2">Lokasi</th>
      <th rowspan="2">Aksi</th>

    </tr>
    <tr>
      <th>Masuk</th>
      <th>Keluar</th>
      <th>Masuk</th>
      <th>Keluar</th>
      <th>Masuk</th>
      <th>Keluar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($presensis as $presensi)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $presensi->nama_lengkap }}</td>
      <td>{{ $presensi->nik }}</td>
      <td>{{ $presensi->tgl_presensi}}</td>
      <td>{{ $presensi->jam_masuk}}</td>
      <td>{{ $presensi->jam_keluar}}</td>
      <td><img src="{{ asset('uploads/absensi/'.$presensi->foto_in)}}" alt="" srcset="" width="64"></td>
      <td><img src="{{ asset('uploads/absensi/'.$presensi->foto_out)}}" alt="" srcset="" width="64"></td>
      <td>{{$presensi->lokasi_in}}</td>
      <td>{{$presensi->lokasi_out}}</td>
      <td>
        <form action="{{route('presensi.delete', ['presensi' => $presensi->id])}}" method="post" class="d-inline">
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