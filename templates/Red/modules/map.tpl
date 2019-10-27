<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=drawing"></script>
        <script src="../js/geometry_generator.js"></script>
        
        <script>
            function initialize() {
                var mapOptions = {
                    center: new google.maps.LatLng(35.6930,51.4332),
                    zoom: 10
                };

                var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                
                var points = generateGeometry(function(x, y) {
                    return new google.maps.LatLng(y, x);
                })
                
                var polygon = new google.maps.Polygon({
                    paths: points,
                    editable: true
                });

                polygon.setMap(map);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
<div class="map_resp">
    <div id="map"></div>
</div>