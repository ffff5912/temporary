var MediaStore = (function() {
    function MediaStore(dispatcher) {
        this.url = '';
        this.token = '';
        dispatcher.on('fetch', this.find.bind(this));
    }

    MediaStore.prototype.find = function(data) {
        var self = this;
        $.ajax({
            url: self.url,
            type: 'GET',
            beforeSend: function(xhr) {xhr.setRequestHeader('X-CSRF-Token', self.token)},
            data: {lat: data.latLng.J, lng: data.latLng.M},
            success: function(response) {
                console.log(response);
            }
        });
        return MediaStore;
    };
})();

module.exports = MediaStore;
