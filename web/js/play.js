(function(map, $, undefined) {
    var mapData = [];

    map.initMap = function() {
        $.get("/map/get", function(data) {
            mapData = data.map;
            map.draw();
        });
    };

    map.draw = function() {
        $('#map').empty();

        for (var y = 0; y < mapData.length; y++) {
            var mapRow = mapData[y];
            $.each(mapRow, function(x, fieldData) {
                map.drawField(x, y, fieldData.img);
            });
        };
    };

    map.drawField = function(x, y, img, additionalClass) {
        var additionalClass = (typeof additionalClass !== 'undefined')? additionalClass:'';

        var offsetX = 0;
        if (y%2 == 1) {
            offsetX = 95;
        }
        var shiftX = x * 190 + offsetX;
        var shiftY = y * 55;
        var positionStyle = 'left: ' + shiftX + 'px; top: ' + shiftY + 'px; ';

        var field = '<div class="field ' + additionalClass + '" style="' + positionStyle + ' background-image: url(/';
        field += img + ');"></div>';
        field = $(field);
        field.appendTo($('#map'));
    };

    map.clearFields = function(additionalClass) {
        $('#map .' + additionalClass).remove();
    };
}(window.map = window.map || {}, jQuery));

(function() {
    window.map.initMap();
})();