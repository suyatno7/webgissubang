<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div>
        <div class="shadow p-2 mb-2 rounded bg-white">
            <div class="row container px-md-2">
                <div class="button col-sm-2">
                    <button class="dariSini btn btn-info"><i class="fa fa-map-marker"></i>  Pusatkan</button>
                </div>
                <div class="form-group col-md-4">
                  <input type="text" name="latNow" value="" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="lngNow" value="" class="form-control">
                </div>
            </div>
        </div>
</div>

<div class="content">
    <div id="map" style="width: 100%; height: 650px; color:black;"></div>
</div>

<script>
    var map = L.map('map', {
        center: [-6.57041, 107.759736],
        zoom: 10,
        zoomControl: false,
        layers: []
    });
    var Stadia_OSMBright = L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(map);


    L.Control.geocoder({
        position: "topleft",
        collapsed: true
    }).addTo(map);

    /* GPS enabled geolocation control set to follow the user's location */
    var locateControl = L.control.locate({
        position: "topleft",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: true,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8
        },
        circleStyle: {
            weight: 1,
            clickable: false
        },
        icon: "fa fa-location-arrow",
        metric: false,
        strings: {
            title: "My location",
            popup: "You are within {distance} {unit} from this point",
            outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
        },
        locateOptions: {
            maxZoom: 18,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000
        }
    }).addTo(map);

    var zoom_bar = new L.Control.ZoomBar({
        position: 'topleft'
    }).addTo(map);

    L.control.coordinates({
        position: "bottomleft",
        decimals: 2,
        decimalSeperator: ",",
        labelTemplateLat: "Latitude: {y}",
        labelTemplateLng: "Longitude: {x}"
    }).addTo(map);
    /* scala */
    L.control.scale({
        metric: true,
        position: "bottomleft"
    }).addTo(map)

    var north = L.control({
        position: "bottomleft"
    });
    north.onAdd = function(map) {
        var div = L.DomUtil.create("div", "info legend");
        div.innerHTML = '<img src="/assets/images/utara.png"style=width:50px;>';
        return div;
    }
    north.addTo(map)

    //routing machine
    var control = L.Routing.control({
        waypoints: [
            L.latLng(-6.57041, 107.759736),

        ],
        router: L.Routing.mapbox('pk.eyJ1Ijoic3V5YXRubzciLCJhIjoiY2t2dDVtanRpM2MxODJwcWc0dHBlcmhsbyJ9.4X1h6pTqfPqBzVyLUs2rJw'),
        routeWhileDragging: true,
        reverseWaypoints: true,
        geocoder: L.Control.Geocoder.nominatim(),

    }).addTo(map);

    //geojson
    $.getJSON("<?= base_url('assets/wisata.geojson') ?>", function(data) {
        var ratIcon = L.icon({
            iconUrl: "<?= base_url('assets/images/utara.png') ?>",
            iconSize: [15, 15]
        });

        L.geoJson(data, {
            pointToLayer: function(feature, latlng) {
                var marker = L.marker(latlng, {
                    icon: ratIcon
                });
                marker.bindPopup(feature.properties.nama + '</br>' + feature.properties.kec);
                return marker;
            }
        }).addTo(map);
    });
    
    

    getLocation();

		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else {
				x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}

		function showPosition(position) {
			$("[name=latNow]").val(position.coords.latitude);
			$("[name=lngNow]").val(position.coords.longitude);
		}

        $(document).on("click", ".keSini", function() {
			let latLng = [$(this).data('lat'), $(this).data('lng')];
			control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
		})

		$(document).on("click", ".dariSini", function() {
			let latLng = [$("[name=latNow]").val(), $("[name=lngNow]").val()];
			control.spliceWaypoints(0, 1, latLng);
			map.panTo(latLng);
		})
</script>

<?= $this->endSection(); ?>