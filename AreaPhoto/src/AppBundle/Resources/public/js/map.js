var Map = (function() {
    function Map() {
        var canvas = document.getElementById( 'map-canvas' ) ;
        var latlng = new google.maps.LatLng( 35.792621 , 139.806513 );
        var mapOptions = {
            zoom: 15 ,
            center: latlng ,
        };
        var map = new google.maps.Map( canvas , mapOptions ) ;
    }

    return Map;
})();

exports.module = new Map();
