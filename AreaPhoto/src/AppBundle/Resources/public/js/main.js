var map = require('./map.js');
var React = require('react');

map.media_store.url = media_store_url;
map.media_store.token = token;
map.onLoad();

var Main = React.createClass({
    getInitialState: function() {
        return {
        };
    },
    render: function() {
        return (
            <div>test
            </div>
        );
    }
});

React.render(<Main />, document.getElementById('photo_box'));
