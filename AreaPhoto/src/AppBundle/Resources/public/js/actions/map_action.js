var callback = function(data) {
    console.log(data);
}

var Action = (function() {
    function Action(dispatcher) {
        this.dispatcher = dispatcher;
    }

    Action.prototype.fetch = function(data) {
        data.callback = callback;
        this.dispatcher.emit('fetch', data);
    };

    return Action;
})();

module.exports = Action;
