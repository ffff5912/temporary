var Request = require('superagent');
require('superagent-csrf')(Request);
require('superagent-jsonp')(Request);

var MediaStore = (function() {
    function MediaStore(dispatcher) {
        this.url = '';
        this.token = '';
        dispatcher.on('fetch', this.find.bind(this));
    }

    MediaStore.prototype.find = function(data) {
        Request.get(this.url).csrf(this.token).query({
            lat: data.latLng.H,
            lng: data.latLng.L
        }).jsonp().end(function(err, res) {
            if (err) {
                throw err;
            }
            data.setMedia(res);
        });
    };

    return MediaStore;
})();

module.exports = MediaStore;
