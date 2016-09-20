@extends('layout')

@section('content')
    <div class="wrap">
        <input type="text" id="searchTextField" value="vilnius">    
        <input type="button" id="searchButton" value="Search">
        <div id="map"></div>
        
        <div class="historyBox">
            @foreach ($history as $adress)
                <div class="box">
                    Address: <b>{{ $adress->name }}</b><br>
                    Langitude: <b>{{ $adress->lat }}</b><br>
                    Longitude: <b>{{ $adress->lng }}</b>
                </div>
            @endforeach
        </div>
    </div>
@stop