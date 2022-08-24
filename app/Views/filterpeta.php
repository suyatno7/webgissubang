<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
</div>
<div id="panel">
    <form>
        <input type="radio" id="radioOne" name="verify" value="Ciater" checked> Semua Wisata &nbsp;<div class="box red"></div> <br>
        <input type="radio" id="radioTwo" name="verify" value="Sagalaherang"> Sagalaherang &nbsp;<div class="box blue"></div><br>
        <input type="radio" id="radioThree" name="verify" value="Jalancagak"> Jalancagak &nbsp;<div class="box yellow"></div><br>
        <input type="radio" id="radioFour" name="verify" value="Jalancagak"> Ciater &nbsp;<div class="box green"></div><br>
    </form>
    <hr>

</div>
<div class="content">
    <div id="map" style="width: 100%; height: 650px; color:black;"></div>

    <script>
        var wisata = new L.LayerGroup();
        var administratif = new L.LayerGroup();


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

        var GoogleSatelliteHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            maxZoom: 22,
            attribution: 'Latihan Web GIS'
        });

        var baseLayers = {
            'Stadia OSMBright': Stadia_OSMBright,
            'Google Satellite Hybrid': GoogleSatelliteHybrid
        };

        var groupedOverlays = {
            "Peta Dasar": {
                'Wisata': wisata,
                'Batas': administratif,
                'Ciater': wisata
            }
        };


        L.control.groupedLayers(baseLayers, groupedOverlays).addTo(map);

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

        ////////////////////	
        var ci_data;

        //coba2
        //Initial Setup  with layer Verified No
        ci_data = L.geoJson(null, {

            pointToLayer: function(feature, latlng) {

                return L.circleMarker(latlng, {
                    color: 'black',
                    fillColor: 'red',
                    fillOpacity: 1,
                    radius: 8
                })
            },
            onEachFeature: function(feature, layer) {
                layer.bindPopup('<h6>' + feature.properties.nama + '</h6><p>kecamatan: ' + feature.properties.kec + '</p>');
            },
            filter: function(feature, layer) {
                return (feature.properties.kec !== "");
            },

        });

        $.getJSON("<?= base_url('assets/wisata.geojson') ?>", function(data) {
            ci_data.addData(data);
        });
        /// END Initial Setup

        //Using a Layer Group to add/ remove data from the map.
        var myData = L.layerGroup([]);
        myData.addLayer(ci_data);
        myData.addTo(map);

        //If Radio Button one is clicked.  
        document.getElementById("radioOne").addEventListener('click', function(event) {
            theExpression = 'feature.properties.kec !== "" ';
            console.log(theExpression);

            myData.clearLayers();
            map.removeLayer(myData);

            ci_data = L.geoJson(null, {

                pointToLayer: function(feature, latlng) {

                    return L.circleMarker(latlng, {
                        color: 'black',
                        fillColor: 'red',
                        fillOpacity: 1,
                        radius: 8
                    })
                },
                onEachFeature: function(feature, layer) {
                    layer.bindPopup('<h6>' + feature.properties.nama + '</h6><p>kecamatan: ' + feature.properties.kec + '</p>');
                },
                filter: function(feature, layer) {
                    return (feature.properties.kec !== "");
                },

            });


            $.getJSON("<?= base_url('assets/wisata.geojson') ?>", function(data) {
                ci_data.addData(data);
            });

            myData.addLayer(ci_data);
            myData.addTo(map);;
        });
        //If Radio button two is clicked.
        document.getElementById("radioTwo").addEventListener('click', function(event) {
            theExpression = 'feature.properties.kec == "Sagalaherang" ';
            console.log(theExpression);
            map.removeLayer(myData);
            myData.clearLayers();

            ci_data = L.geoJson(null, {

                pointToLayer: function(feature, latlng) {

                    return L.circleMarker(latlng, {
                        color: 'black',
                        fillColor: 'blue',
                        fillOpacity: 1,
                        radius: 8
                    })
                },
                onEachFeature: function(feature, layer) {
                    layer.bindPopup('<h6>' + feature.properties.nama + '</h6><p>kecamatan: ' + feature.properties.kec + '</p>');
                },
                filter: function(feature, layer) {
                    return (feature.properties.kec == "Sagalaherang");
                },

            });

            $.getJSON("<?= base_url('assets/wisata.geojson') ?>", function(data) {
                ci_data.addData(data);
            });

            myData.addLayer(ci_data);
            myData.addTo(map);
        });

        //If Radio button three is clicked.
        document.getElementById("radioThree").addEventListener('click', function(event) {
            theExpression = 'feature.properties.kec == "Jalancagak" ';
            console.log(theExpression);
            map.removeLayer(myData);
            myData.clearLayers();

            ci_data = L.geoJson(null, {

                pointToLayer: function(feature, latlng) {

                    return L.circleMarker(latlng, {
                        color: 'black',
                        fillColor: 'yellow',
                        fillOpacity: 1,
                        radius: 8
                    })
                },
                onEachFeature: function(feature, layer) {
                    layer.bindPopup('<h6>' + feature.properties.nama + '</h6><p>kecamatan: ' + feature.properties.kec + '</p>');
                },
                filter: function(feature, layer) {
                    return (feature.properties.kec == "Jalancagak");
                },

            });

            $.getJSON("<?= base_url('assets/wisata.geojson') ?>", function(data) {
                ci_data.addData(data);
            });

            myData.addLayer(ci_data);
            myData.addTo(map);
        });
        //If Radio button four is clicked.
        document.getElementById("radioFour").addEventListener('click', function(event) {
            theExpression = 'feature.properties.kec == "Ciater" ';
            console.log(theExpression);
            map.removeLayer(myData);
            myData.clearLayers();

            ci_data = L.geoJson(null, {

                pointToLayer: function(feature, latlng) {

                    return L.circleMarker(latlng, {
                        color: 'black',
                        fillColor: 'green',
                        fillOpacity: 1,
                        radius: 8
                    })
                },
                onEachFeature: function(feature, layer) {
                    layer.bindPopup('<h6>' + feature.properties.nama + '</h6><p>kecamatan: ' + feature.properties.kec + '</p>');
                },
                filter: function(feature, layer) {
                    return (feature.properties.kec == "Ciater");
                },

            });

            $.getJSON("<?= base_url('assets/wisata.geojson') ?>", function(data) {
                ci_data.addData(data);
            });

            myData.addLayer(ci_data);
            myData.addTo(map);
        });

        //geojson
        $.getJSON("<?= base_url('assets/wisata.geojson') ?>", function(data) {
            var ratIcon = L.icon({
                iconUrl: "<?= base_url('assets/images/utara.png') ?>",
                iconSize: [12, 10]
            });
            L.geojson(data, {
                filter: function(feature, layer) {
                    return feature.properties.nama == "Ciater";
                }
            }).addTo(wisata);

            L.geoJson(data, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng, {
                        icon: ratIcon
                    });
                    marker.bindPopup(feature.properties.nama);
                    return marker;
                },
            }).addTo(wisata);
        });

        $.getJSON("<?= base_url('/assets/administratif.geojson') ?>", function(kode) {
            L.geoJson(kode, {
                style: function(feature) {
                    var fillColor,
                        kode = feature.properties.kode;
                    if (kode > 29) fillColor = "#006837";
                    else if (kode > 28) fillColor = "#f106f6"
                    else if (kode > 27) fillColor = "#062af6"
                    else if (kode > 26) fillColor = "#f6062a"
                    else if (kode > 25) fillColor = "#f6ba06"
                    else if (kode > 24) fillColor = "#564719"
                    else if (kode > 23) fillColor = "#347730"
                    else if (kode > 22) fillColor = "#53bcb5"
                    else if (kode > 21) fillColor = "#ffd6fb"
                    else if (kode > 20) fillColor = "#aec54g"
                    else if (kode > 19) fillColor = "#c2e699"
                    else if (kode > 18) fillColor = "#fee0d2"
                    else if (kode > 17) fillColor = "#756bb1"
                    else if (kode > 16) fillColor = "#8c510a"
                    else if (kode > 15) fillColor = "#01665e"
                    else if (kode > 14) fillColor = "#e41a1c"
                    else if (kode > 13) fillColor = "#636363"
                    else if (kode > 12) fillColor = "#762a83"
                    else if (kode > 11) fillColor = "#1b7837"
                    else if (kode > 10) fillColor = "#d53e4f"
                    else if (kode > 9) fillColor = "#67001f"
                    else if (kode > 8) fillColor = "#c994c7"
                    else if (kode > 7) fillColor = "#fdbb84"
                    else if (kode > 6) fillColor = "#dd1c77"
                    else if (kode > 5) fillColor = "#3182bd"
                    else if (kode > 4) fillColor = "#f03b20"
                    else if (kode > 3) fillColor = "#31a354";
                    else if (kode > 2) fillColor = "#78c679";
                    else if (kode > 1) fillColor = "#c2e699";
                    else if (kode > 0) fillColor = "#ffffcc";
                    else fillColor = "#f7f7f7"; // no data
                    return {
                        color: "#999",
                        weight: 1,
                        fillColor: fillColor,
                        fillOpacity: .6
                    };
                },
                onEachFeature: function(feature, layer) {
                    layer.bindPopup(feature.properties.WADMKC)
                }
            }).addTo(administratif);
        });
    </script>

    <?= $this->endSection(); ?>