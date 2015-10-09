var React = require('react');

var Media = React.createClass({
    render: function() {
        var rows = this.props.media.map(function(value) {
            return (
                <li>{value}</li>
            );
        });
        return (
            <div>
                <ul>{rows}</ul>
            </div>
        );
    }
});

module.exports = Media;
