@extends('layouts.presensi')
@section('header')
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">E-Presensi</div>
    <div class="right"></div>
</div>

<style>

    
        .webcam-div {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .webcam-capture, .webcam-capture video {
            display: inline-block;
            width: 500px !important;
            margin: auto;
            height: auto !important;
            border-radius: 15px;
        }

    /* Extra small devices (portrait phones, less than 576px) */
    @media (max-width: 575.98px) {
        .webcam-capture, .webcam-capture video {
            display: inline-block;
            width: 100% !important;
            margin: auto;
            height: auto !important;
            border-radius: 15px;
        }
    }
</style>
@endsection

@section('content')
<div class="row" style="margin-top: 70px">
    <div class="col webcam-div">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture">
        </div>
        <button id="takeabsen" class="btn btn-primary" style="width: inherit;">
        <ion-icon name="camera-outline"></ion-icon>
        Absen
        </button>
    </div>
</div>
<div class="row">
    <div class="col webcam-div">
    </div>
</div>
@endsection

@push('myscript')
<script>
    Webcam.set({
        height: 460
        , width: 630
        , image_format:  'jpeg'
        , jpeg_quality: 80
    });

    Webcam.attach('.webcam-capture');

    var lokasi = document.getElementById('lokasi');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }

    function successCallback(position) {
        lokasi.value = position.coords.latitude+","+position.coords.longitude;
    }

    function errorCallback(position) {

    }
</script>
@endpush