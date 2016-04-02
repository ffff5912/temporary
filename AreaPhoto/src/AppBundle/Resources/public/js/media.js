var React = require('react');

var Media = React.createClass({
    render: function() {
        var rows = this.props.media.map(function(value) {
            return (
                <div className="visible-*-inline-block col-md-3">
                    <a href={value.link} ><img src={value.images.thumbnail.url} className="img-responsive img-thumbnail" /></a>
                    <p>{value.caption.text}</p>
                </div>
            );
        });
        return (
            <div className="row center-block">
                {rows}
            </div>
        );
    }
});

module.exports = Media;
