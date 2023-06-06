@extends('admin.layout.master')

@section('content')
<style>
    .img_ku {
  display: flex;
  align-items: center;
  justify-content: center;
}

.img_ku i {
  font-size: 32px; /* Atur ukuran ikon sesuai kebutuhan */
}

</style>
<div class="card mt-4 mb-3">
    <div class="card-body">
        <h4>Cetak Laporan</h4>
        <p>
            Ini tempat Cetak laporan
        </p>
    </div>
</div>
<div class="my-4">
<h5>Periode : {{$tahun}}</h5>
</div>
<div class="row">
    @forelse($bulans as $bulan)
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 bg-primary d-flex align-items-center justify-content-center img_ku">
                    <a href="{{route('cetaklaporan.index', ['tahun'=>$bulan->tahun, 'bulan' => $bulan->bulan])}}">
                        <i class="bi bi-archive-fill text-white"></i>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$bulan->bulan}}</h5>
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