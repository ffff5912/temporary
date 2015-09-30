var EventListener = function(map) {
    google.maps.event.addListener(map, 'click', function() {
    });
};

var Map = (function(EventListener) {
    function Map() {
        var map;
        this.initialize();
    }

    Map.prototype.onLoad = function() {
        google.maps.event.addDomListener(window, 'load');
        EventListener(this.map);
    };

    Map.prototype.initialize = function(map) {
        var canvas = document.getElementById('map-canvas') ;
        var latlng = new google.maps.LatLng( 35.792621 , 139.806513 );
        var mapOptions = {
            zoom: 15 ,
            center: latlng ,
        };
        this.map = new google.maps.Map(canvas, mapOptions);
    };

    return Map;
})(EventListener);

module.exports = new Map();
