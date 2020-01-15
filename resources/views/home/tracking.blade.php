@extends('layouts.app')

@section('styles')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 500px;
            width: 500px;
        }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #floating-panel {
            margin-left: -52px;
        }
    </style>
@endsection

@section('content')
    <div id="floating-panel">
        <button id="drop" onclick="drop()">Show order's place</button>
    </div>
    <div id="map"></div>
    @foreach($orders as $order)
        <div class="order" data-id="{{ $order->id }}"></div>
    @endforeach
@endsection

@section('scripts')
    <script>

        var orders = {!! json_encode($orders) !!};
        var orderPoints = [];

        for (let i = 0; i < orders.length; i++) {
            orderPoints.push({
                    lat: 52.520 + Math.random(),
                    lng: 13.410 + Math.random(),
                    id: orders[i].id,
                }
            );
        }

        var markers = [];
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: 52.520, lng: 13.410}
            });
        }

        function drop() {
            clearMarkers();
            let timerId = setInterval(() => animate(), 2000);

            setTimeout(() => {
                clearInterval(timerId);
            }, 10000 * 5);
        }

        function animate() {
            window.setTimeout(function () {
                clearMarkers();
                for (var i = 0; i < orderPoints.length; i++) {
                    orderPoints[i]['lat'] += Math.random() % 0.005;
                    orderPoints[i]['lng'] += Math.random() % 0.005;
                    addMarkerWithTimeout(orderPoints[i], i * 200, orderPoints[i]['id']);
                }
            }, 3000);
        }

        function addMarkerWithTimeout(position, timeout, label) {
            window.setTimeout(function () {
                markers.push(new google.maps.Marker({
                    position: position,
                    map: map,
                    animation: google.maps.Animation.BOUNCE,
                    label: label.toString(),
                }));
            }, timeout);
        }

        function clearMarkers() {
            for (let i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzkf64mBVP4ysgkFf0itFX-qewqBG52wc&callback=initMap">
    </script>
@endsection




