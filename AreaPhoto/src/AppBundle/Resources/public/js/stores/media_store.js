var Request = require('superagent');
var EventEmitter = require('../event_emitter.js');
require('superagent-jsonp')(Request);

var MediaStore = (function(EventEmitter) {
    function MediaStore(dispatcher) {
        this.url;
        EventEmitter.call(this);
        dispatcher.on('fetch', this.find.bind(this));
    }

    MediaStore.prototype.find = function(data) {
        Request.get(this.url).query({
            lat: data.lat,
            ing: data.ing
        }).jsonp().end(function(err, res) {
            if (err) {
                throw err;
            }
            data.callback(res);
        });
    };

    return MediaStore;
})(EventEmitter);

module.exports = MediaStore;
