var Request = require('superagent');
require('superagent-jsonp')(Request);

var MediaStore = (function() {
    function MediaStore(dispatcher) {
        this.url;
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
})();

module.exports = MediaStore;
