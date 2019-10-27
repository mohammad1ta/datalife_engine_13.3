function generateGeometry(pointProxy) {
    var POINT_COUNT = 2000;
    var X = 37;
    var Y = 55;
    var R = 2;
    var points = [];
    for (var n = 0; n < POINT_COUNT; n++)
    {
        var curR = R*(0.9 + Math.random() * 0.2);
        var x = X + curR * Math.sin(n / POINT_COUNT * 2 * Math.PI);
        var y = Y + curR * Math.cos(n / POINT_COUNT * 2 * Math.PI);
        points.push(pointProxy(x, y));
    }
    
    return points;
}