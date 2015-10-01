var EventEmitter = require('./event_emitter.js');
var MapAction = require('./actions/map_action.js');
var MediaStore = require('./stores/media_store.js');

var event_emitter = new EventEmitter();
var media_store = new MediaStore(event_emitter)
var action = new MapAction(event_emitter);

var Map = (function() {
    function Map(action, media_store) {
        this.map;
        this.action = action;
        this.media_store = media_store;
    }

    Map.prototype.onLoad = function() {
        google.maps.event.addDomListener(window, 'load', this.initialize.call(this));
        google.maps.event.addListener(this.map, 'click', this.action.fetch.bind(this.action));
    };

    Map.prototype.initialize = function() {
        var canvas = document.getElementById('map-canvas') ;
        var latlng = new google.maps.LatLng( 35.792621 , 139.806513 );
        var mapOptions = {
            zoom: 15 ,
            center: latlng ,
        };
        this.map = new google.maps.Map(canvas, mapOptions);
    };

    return Map;
})();

module.exports = new Map(action, media_store);
