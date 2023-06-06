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

    #map {
        height: 180px;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
@endsection

@section('content')
<div class="row" style="margin-top: 70px">
    <div class="col webcam-div">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture">
        </div>
        @if ($cek > 0)
        <button id="takeabsen" class="btn btn-danger" style="width: inherit;">
            <ion-icon name="camera-outline"></ion-icon>
            Absen Pulang
        </button>
        @else
        <button id="takeabsen" class="btn btn-primary" style="width: inherit;">
            <ion-icon name="camera-outline"></ion-icon>
            Absen Masuk
        </button>
        @endif
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <div id="map"></div>
    </div>
</div>

<audio id="notifications_in">
    <source src="{{ asset('assets/notifications/absen_in.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifications_out">
    <source src="{{ asset('assets/notifications/absen_out.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifications_outframe">
    <source src="{{ asset('assets/notifications/luar_radius.mp3')}}" type="audio/mpeg">
</audio>
@endsection

@push('myscript')
<script>

    var notifications_in = document.getElementById('notifications_in');
    var notifications_out = document.getElementById('notifications_out');
    var notifications_outframe = document.getElementById('notifications_outframe');
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
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 16);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        var circle = L.circle([-7.8962942, 112.6678137], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 300000
        }).addTo(map);
    }

    function errorCallback(position) {

    }

    $('#takeabsen').click(function (e) {
        Webcam.snap(function (uri) {
            image = uri;
        });
        var lokasi = $('#lokasi').val();
        $.ajax({
            type: 'POST',
            url: '/presensi/store',
            data: {
                _token: "{{ csrf_token() }}",
                image: image,
                lokasi: lokasi
            }
            , cache: false
            , success: function (respond) {
                var status = respond.split("|");

                if (status[0] == "success") {
                    if (status[2] == "in") {
                        notifications_in.play();
                    } else {
                        notifications_out.play();
                    }
                    Swal.fire({
                        title: 'Absen Berhasil!',
                        text: status[1],
                        icon: 'success',
                    }), setTimeout("location.href='/dashboard'", 3000);
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: status[1],
                        icon: 'error',
                    }),
                    notifications_outframe.play();
                }
            }

        });
    });
</script>
@endpush
