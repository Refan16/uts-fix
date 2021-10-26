@extends('layouts.main')
@section('script')
<script>
        mapboxgl.accessToken = 'pk.eyJ1IjoicjNmcmFpbjA4NyIsImEiOiJja3Y3eThoMjExeXFoMzBxcDcwYjhjbmV3In0.R1Jygr1e_rkwn62vQ2Duag';
        var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [112.47667, -7.883889, ], 
          zoom: 7
        });
        var test ='<?php echo $dataArray;?>'; 
        var dataMap = JSON.parse(test); 

        
        dataMap.features.forEach(function(marker) {

            var el = document.createElement('div');
            el.className = 'marker';

            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
            .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'+
            '<img src="/storage/'+marker.properties.image+'" alt="" width="100px">'))
                .addTo(map);
        });

    </script>
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
        .marker {
            background-image: url('/storage/images/marker.png');
            background-repeat:no-repeat;
            background-size:100%;
            width: 20px;
            height: 100px;
            cursor: pointer; 
        }
        
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2>Search Location</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           <form action="{{route('google.map.store')}}" method="post" id="boxmap" enctype="multipart/form-data">
           @csrf
                <div class="form-group">
                    <label for="title">Name Location</label>
                    <input type="text" name="title" placeholder="Name Location" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <input type="text" name="description" placeholder="Description" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="lat">latitude</label>
                    <input type="text" name="lat" placeholder="latitude" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="lng">longitude</label>
                    <input type="text" name="lng" placeholder="longitude" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="lng">Kode Pos</label>
                    <input type="text" name="kode_pos" placeholder="kode_pos" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" placeholder="image" class="form-control"/>
                </div> 
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Map" class="btn btn-success"/>
                </div>
                <div class="form-group">
                    <a href="/info">Information</a>
                </div>
            </form>     
        </div>
        <div class="col-md-8">
            <h2> Google Map</h2>
            <div id="map"></div>       
        </div>
        
    </div>
</div>
@endsection