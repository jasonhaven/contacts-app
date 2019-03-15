@extends('layout')

@section('content')
<style>
    #map {
        height: 90%;
    }

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .container {
        height: 100%;
        width: 100%;
        margin: 0;
        max-width: 100%;
    }

    .hidden {
        display: none;
    }

</style>

<script>

    var map;
    var geocoder;

    function initMap() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
            zoom: 8,
            center: latlng
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        setTimeout(_ => {
            codeAddress();
        }, 1000);        
    }

    function codeAddress() {
        var address = document.getElementById('address').value;
        console.log(address);
        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                icon: 'https://earth.google.com/images/kml-icons/track-directional/track-15.png',
                position: results[0].geometry.location
            });
        } else {
            document.getElementById('map-error').classList.remove("hidden");
        }
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChwIRQmTMxDpVr59v0y5QjxaGORllN8Jw&callback=initMap" async defer></script>

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif

<div id="map-error" class="alert alert-danger hidden" role="alert">
    Something went wrong when loading the map...
</div>

<input id="address" class="hidden" value="{{$contact->address}} {{$contact->city}}, {{$contact->state}} {{$contact->zip}}">

<div class="container">
    <div id="map"></div>
</div>

@endsection
