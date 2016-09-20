<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body>
        @yield('content')
    
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>  
    <script src="{{ asset('js/script.js') }}"></script>    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5uVmtGAi8aZSHP5Oyl6QcNiatyuMUmC4&libraries=places&callback=initAutocomplete"></script>
    </body>
</html>