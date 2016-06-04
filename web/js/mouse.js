(function(mouseHandler, map, $, undefined) {
    var x;
    var y;
    var fieldX;
    var fieldY;
    var oldFieldX;
    var oldFieldY;

    var countField = function() {
        var offsetX = 16;
        var tmpX = Math.floor((x - offsetX) / 95);

        var offsetY = 0;
        var addToY = 0;
        if (tmpX%2 == 1) {
            offsetY = 55;
            addToY = 1;
        }
        var tmpY = Math.floor((y - offsetY)/110);
        fieldX = Math.floor(tmpX / 2);
        fieldY = (tmpY * 2) + addToY;
    };

    var drawFrame = function() {
        if (oldFieldX != fieldX || oldFieldY != fieldY) {
            map.clearFields('frame');
            map.drawField(fieldX, fieldY, 'img/frame.png', 'frame');
        }

        var oldFieldX = fieldX;
        var oldFieldY = fieldY;
    };

    var handleMouse = function(e) {
        x = e.pageX - $('#map').offset().left;
        y = e.pageY - $('#map').offset().top;

        countField();
        drawFrame();
    };

    mouseHandler.init = function() {
        $(document).mousemove(handleMouse);
    };
}(window.mouseHandler = window.mouseHandler || {}, window.map, jQuery));

(function() {
    window.mouseHandler.init();
})();