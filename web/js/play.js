(function(map, $, undefined) {
    map.size = 10;

    map.draw = function() {
        $('#map').empty();
        $('#map').append($('<div>', {html: 'blabla'}));
    };
}(window.map = window.map || {}, jQuery));

(function() {
    console.log('start');
    window.map.draw();
})();