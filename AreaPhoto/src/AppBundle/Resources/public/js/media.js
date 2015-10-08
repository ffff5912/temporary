var React = require('react');

var Media = React.createClass({
    getInitialState: function() {
        return {
            map: "",
            media: []
        };
    },
    setMap: function(map) {
        this.setState({map: map});
    }

});

exports.module = new Media();
