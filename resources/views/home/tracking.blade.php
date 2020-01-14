@extends('layouts.app')

@section('styles')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
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

        // If you're adding a number of markers, you may want to drop them on the map
        // consecutively rather than all at once. This example shows how to use
        // window.setTimeout() to space your markers' animation.

        var orders = $('.order');
        var orderPoint = [];

        orders.each(function (index, el) {
            orderPoint.push({
                    lat: 52.511,
                    lng: 13.447,
                }
            );
        });

        var neighborhoods = [

            {lat: 52.511, lng: 13.447},
            {lat: 52.549, lng: 13.422},
            {lat: 52.497, lng: 13.396},
            {lat: 52.517, lng: 13.394}
        ];

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
            for (let i = 0; i < neighborhoods.length; i++) {
                addMarkerWithTimeout(neighborhoods[i], i * 200);
            }
        }

        function animate() {
            clearMarkers();
            setTimeout(function () {
                for (var i = 0; i < neighborhoods.length; i++) {
                    neighborhoods[i]['lat'] += Math.random();
                    neighborhoods[i]['lng'] += Math.random();
                    addMarkerWithTimeout(neighborhoods[i], i * 200);
                }
            }, 5000);
        }

        function addMarkerWithTimeout(position, timeout) {
            window.setTimeout(function () {
                markers.push(new google.maps.Marker({
                    position: position,
                    map: map,
                    animation: google.maps.Animation.DROP,
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


