jQuery(document).ready(function($) {
    var allstations;
    
    $.activeMarker = null;
    
    //read json
    $.getJSON('/wp-content/themes/sparkling/inc/js/MetaverseStationData20150421.json', function(data){
        allstations = data;
        initialize();
    });
    
    function initialize() {
        //initialize map
        var mapOptions = {
            center : {
                lat : 38.056778,
                lng : -98.616709
            }, //set default map center
            zoom : 5,
            maxZoom : 18,
            disableDefaultUI : true,
            zoomControl : true,
            scrollwheel : false,
            // Google Map Color Styles
            styles : [{
                featureType : 'water',
                stylers : [{
                    hue : "#1790d2"
                }, {
                    visibility : 'on'
                }, {
                    saturation : 100
                }]
            }, {
                featureType : 'landscape',
                stylers : [{
                    color : '#f2f2f2'
                }]
            }, {
                featureType : 'road',
                stylers : [{
                    saturation : -100
                }, {
                    lightness : 45
                }]
            }, {
                featureType : 'road.highway',
                stylers : [{
                    visibility : 'simplified'
                }]
            }, {
                featureType : 'road.arterial',
                elementType : 'labels.icon',
                stylers : [{
                    visibility : 'off'
                }]
            }, {
                featureType : 'administrative',
                elementType : 'labels.text.fill',
                stylers : [{
                    color : '#444444'
                }]
            }, {
                featureType : 'transit',
                stylers : [{
                    visibility : 'off'
                }]
            }, {
                featureType : 'poi',
                stylers : [{
                    visibility : 'off'
                }]
            }]
    
        };
        var map = new google.maps.Map(document.getElementById('sb-site'), mapOptions);
        setMapMarkers(map, allstations);
    
        // Detects GMap canvas/div size and adds css height to canvas. Used to prevents the page from jumping when map icon is clicked and slideout panel is initiated.
        var gMapHeight = $('#sb-site').height();
        $('#sb-site').height(gMapHeight);

    }

    function setMapMarkers(map, allstations) {

          //add markers on map
        var clusters = [];
        var latlongmap = {};
        for (var i = 0; i < allstations.length; i++) {
        
            var station = allstations[i];
        
            if (station.Location !== "" && station.Location !== "NULL") {
        
                //extract lat long
                var point = station.Location;
                var point1 = point.replace("Point (", "");
                var point2 = point1.replace(")", "");
                var point3 = point2.split(" ");
                var lat = point3[1].toString();
                var lng = point3[0].toString();
        
                // var latlng = lat + lng;
        
                //round
                var latr = (parseFloat(lat)).toFixed(4);
                var lngr = (parseFloat(lng)).toFixed(4);
        
                var latlng = latr + lngr;
        
                while ( latlng in latlongmap) {
                    lat = (parseFloat(lat) + 0.0001).toString();
                    //alter repeating position
                    lng = (parseFloat(lng) + 0.0001).toString();
                    latr = (parseFloat(lat)).toFixed(4);
                    lngr = (parseFloat(lng)).toFixed(4);
                    latlng = latr + lngr;
                }
        
                latlongmap[latlng] = latlng;
        
                //var markerLatLng = new google.maps.LatLng(station.lat, station.lng);
                var markerLatLng = new google.maps.LatLng(lat, lng);
                var pin_img = '/wp-content/themes/sparkling//map-icons/pin.png';
                var pin_active_img = '/wp-content/themes/sparkling//map-icons/pin_active.png';
        
                var marker = new MarkerWithLabel({
                    position : markerLatLng,
                    map : map,
                    title : station.Call_Letter,
                    icon : pin_img,
                    labelContent : station.Call_Letter,
                    labelAnchor : new google.maps.Point(22, 0),
                    labelClass : "labels",
                    labelStyle : {
                        opacity : 0.75
                    }
                });
        
                clusters.push(marker);
        
                var slideBar = new $.slidebars();
                var slidePanel = $('#sb-panel');
        
                $('#sb-close').click(function() {
                    if ($.activeMarker) {
                        $.activeMarker.setIcon(pin_img);
                    }
                    $.activeMarker = null;
                    slideBar.slidebars.close();
                });
        
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        if ($.activeMarker) {
                            $.activeMarker.setIcon(pin_img);
                        }
                        marker.setIcon(pin_active_img);
                        $.activeMarker = marker;
        
                        if (slideBar.slidebars.active('right')) {
                            slideBar.slidebars.close();
                            setTimeout(function() {
                                slideBar.slidebars.toggle('right');
                            }, 500);
                        } else {
                            slideBar.slidebars.toggle('right');
                        }
        
                        var station = allstations[i];
        
                        //extract address
                        var fulladdr = station.Station_Address;
                        var extaddr = fulladdr.split(",");
                        var street = extaddr[0];
        
                        slidePanel.empty();
        
                        var logo;
                        if (station.Logo_Map !== "") {
                            logo = '/wp-content/themes/sparkling//station-logos-map/' + station.Logo_Map;
                        } else {
                            logo = '/wp-content/themes/sparkling//station-logos-map/sbg_noimage_map.jpg';
                        }
        
                        var web = "";
                        web = station.Web_Address;
                        web1 = web.replace("http://www.", "");
                        var logo_url = "<a target=\"_blank\" href=\"" + web + "\">" + "<img src=\"" + logo + "\" />" + "</a>";
                        var web_url = "<a target=\"_blank\" href=\"" + web + "\">" + web1 + "</a>";
        
                        var station_info = "<li class=\"station-logo\"><span class=\"sb-column\"></span><span class=\"sb-value\">" + logo_url + "</span></li>";
                        station_info += "<li class=\"station-letters\"><span class=\"sb-column\"></span><span class=\"sb-value\">" + station.Call_Letter + "</span></li>";
                        station_info += "<li class=\"station-city-state\"><span class=\"sb-column\"></span><span class=\"sb-value\">" + station.Station_City + ", " + station.Station_State + "</span></li>";
                        station_info += "<li class=\"station-address\"><span class=\"sb-column\"></span><span class=\"sb-value\">" + street + "<br/>" + station.Station_City + ", " + station.Station_State + " " + station.Station_Zip + "</span></li>";
                        station_info += "<li class=\"station-phone\"><span class=\"sb-column\">Phone:</span><span class=\"sb-value\">" + station.Station_Phone_Number + "</span></li>";
        
                        if (station.Station_Fax_Number !== "") {
                            station_info += "<li class=\"station-fax\"><span class=\"sb-column\">Fax:</span><span class=\"sb-value\">" + station.Station_Fax_Number + "</span></li>";
                        }
                        if (station.Web_Address !== "") {
                            station_info += "<li class=\"station-url\"><span class=\"sb-column\"></span><span class=\"sb-value\">" + web_url + "</span></li>";
                            //can extract http://www
                        }
                        if (station.Affiliation !== "") {
                            station_info += "<li class=\"station-affiliation\"><span class=\"sb-column\">Affiliation:</span><span class=\"sb-value\">" + station.Affiliation + "</span></li>";
                        }
                        if (station.DMA_Rank !== "") {
                            station_info += "<li class=\"station-affiliation\"><span class=\"sb-column\">DMA Rank:</span><span class=\"sb-value\">" + station.DMA_Rank + "</span></li>";
                        }
                        // if (station.Station_Status !== "") {
                            // station_info += "<li class=\"station-affiliation\"><span class=\"sb-column\">Status:</span><span class=\"sb-value\">" + station.Station_Status + "</span></li>";
                        // }
                        if (station.Channel !== "") {
                            station_info += "<li class=\"station-affiliation\"><span class=\"sb-column\">Channel:</span><span class=\"sb-value\">" + station.Actual_RF_Channel + "</span></li>";
                        }
        
                        slidePanel.append(station_info);
        
                    };
                })(marker, i));
            }
        }
         
        //cluster styles
        var clusterStyles = [
            {
            textColor: 'white',
            url: '/wp-content/themes/sparkling/map-icons/cl1.png',
            height: 40,
            width: 40,
            textSize: 15
            },{
            textColor: 'white',
            url: '/wp-content/themes/sparkling/map-icons/cl2.png',
            height: 45,
            width: 45,
            textSize: 17
            },{
            textColor: 'white',
            url: '/wp-content/themes/sparkling/map-icons/cl3.png',
            height: 50,
            width: 50,
            textSize: 20
            },{
            textColor: 'white',
            url: '/wp-content/themes/sparkling/map-icons/cl4.png',
            height: 55,
            width: 55,
            textSize: 21
            },{
            textColor: 'white',
            url: '/wp-content/themes/sparkling/map-icons/cl5.png',
            height: 60,
            width: 60,
            textSize: 20
            },{
            textColor: 'white',
            url: '/wp-content/themes/sparkling/map-icons/cl6.png',
            height: 65,
            width: 65,
            textSize: 22
            },{
            textColor: 'white',
            url: '/wp-content/themes/sparkling/map-icons/cl7.png',
            height: 70,
            width: 70,
            textSize: 24
            }
        ];

        var mcOptions = {gridSize: 50, maxZoom: 15, styles: clusterStyles};
        var markerCluster = new MarkerClusterer(map, clusters, mcOptions);

        markerCluster.setCalculator(function(markers, numStyles){
            //create an index for icon styles
            var index = -1,
                count = markers.length,
                total = count;
        
            while (total !== 0) {
        
                total--;
                index++;
            }
        
            //pick highest style if num markers exceed num styles
            index = Math.min(index, numStyles);
        
            return {
                text: count,
                index: index
            };
        });

        $('#map-reset').click(function() {
            
            if ($.activeMarker) {
                $.activeMarker.setIcon(pin_img);
                $.activeMarker = null;
                slideBar.slidebars.close();
            }  
            
            //initialize();
            map.setZoom(5);
            map.setCenter({lat: 38.056778, lng: -98.616709});   
                  
        });
    }

});
