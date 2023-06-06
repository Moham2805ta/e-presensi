@extends('admin.layout.master')

@section('content')
<style>
    div.col-md-5 {
  display: flex;
  align-items: center;
  justify-content: center;
}

div.col-md-5 i {
  color: white;
  font-size: 24px; /* Atur ukuran ikon sesuai kebutuhan */
}

</style>
<div class="card mt-4 mb-3">
    <div class="card-body">
        <h4>Cetak Laporan</h4>
        <p>
            Ini tempat Cetak laporan bulanan
        </p>
    </div>
</div>
<div class="row">
    @forelse($tahuns as $tahun)
    <div class="col-lg-2 col-md-3 col-sm-4">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-5 bg-primary">
                    <a href="{{route('cetaklaporan.index.bulan', ['tahun' => $tahun->tahun])}}">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="bi bi-archive-fill"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$tahun->tahun}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="text-center">--- Tidak Ada Data ----</div>
    @endforelse
</div>
@endsection