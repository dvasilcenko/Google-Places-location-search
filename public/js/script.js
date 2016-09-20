function initAutocomplete() {
    var input = document.getElementById('searchTextField');
    var searchBox = new google.maps.places.SearchBox(input);
    var geocoder = new google.maps.Geocoder();
    var map;

    $('#searchButton').click(function() {
        var input_value = $('#searchTextField').val();
        
        geocoder.geocode({'address': input_value}, function(results, status) {
        
        var lat = results[0].geometry.location.lat();
        var lng = results[0].geometry.location.lng();
        
        var real_lat;
        var real_lng;
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: 'getJson',
            type: "POST",
            dataType: 'json',
            data: ({name: input_value,
                   lat: lat,
                   lng: lng}),
            success: function(data){
                console.log(data);
                real_lat = data.lat;
                real_lng = data.lng;
                
                if (real_lat == null || real_lng == null){
                    real_lat = lat;
                    real_lng = lng;
                }
                
                var template = '<div class="box">\
                    Address: <b>' + input_value + '</b><br>\
                    Langitude: <b>' + real_lat + '</b><br>\
                    Longitude: <b>' + real_lng + '</b>\
                </div>';
                $('.historyBox').prepend(template);
                            
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: real_lat, lng: real_lng},
                    zoom: 17
                });
                
                var marker = new google.maps.Marker({
                    position: {lat: real_lat, lng: real_lng},
                    map: map,
                });
                
            },
        });             
        });
    });
    
    $("#searchTextField").keyup(function(event){
        if(event.keyCode == 13){
            $('#searchButton').trigger('click');
        }
    });
    
    $('#searchButton').trigger('click');
}