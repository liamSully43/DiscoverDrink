/*
    saveMarkers() is called first by PHP to save the markers to show on the map
    Once the map has loaded initMap() is called which then calls addMarkers()

    If the venues are unable to be fetched then at least the map will load with no errors
*/

markers = [];
activeMarkers = [];

function initMap() {
    const map =  new google.maps.Map(document.getElementById("map"), {
        center: { lat: 51.455, lng: -2.59 },
        zoom: 16,
        disableDefaultUI: true,
        styles: [{
            "elementType": "geometry",
            "stylers": [{
                "color": "#212121"
            }]
        },
        {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#ffffff"
            },
            {
                "visibility": "off"
            },
            {
                "weight": 1
            }]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#ffffff"
            }]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [{
                "color": "#757575"
            }]
        },
        {
            "featureType": "administrative.country",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#9e9e9e"
            }]
        },
        {
            "featureType": "administrative.land_parcel",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#bdbdbd"
            }]
        },
        {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#757575"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
                "color": "#181818"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#616161"
            }]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#1b1b1b"
            }]
        },
        {
            "featureType": "road",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#2c2c2c"
            }]
        },
        {
            "featureType": "road",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#8a8a8a"
            }]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
                "color": "#373737"
            }]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [{
                "color": "#3c3c3c"
            }]
        },
        {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry",
            "stylers": [{
                "color": "#4e4e4e"
            }]
        },
        {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#616161"
            }]
        },
        {
            "featureType": "transit",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#ffa100"
            },
            {
                "visibility": "on"
            }]
        },
        {
            "featureType": "transit",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#757575"
            }]
        },
        {
            "featureType": "transit",
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#ffa100"
            },
            {
                "visibility": "on"
            }]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#000000"
            }]
        },
        {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#3d3d3d"
            }]
        }
    ],
    });

    if(markers.length < 1) { // delay adding the markers if they have not been fetched from the DB yet
        setTimeout(() => addMarkers(map), 1000);
    }
    else {
        addMarkers(map);
    }
}

// called by PHP when fetching venues from the DB
function saveMarkers(venues) {
    for(let venue of venues) {
        markers.push(venue);
    }
}

function addMarkers(map) {
    let activeMarker = false; // used when a user is sent from the search page - stops the for loop from looping through all markers once the correct one has been found
    // add markers to the map
    for(let marker of markers) {
        const lat = parseFloat(marker.lat);
        const lng = parseFloat(marker.lng);
        let mapMarker = new google.maps.Marker({
            position: {lat, lng},
            map,
            icon: "./images/pin.png",
            title: `Click to view ${marker.name}`,
            index: marker.index,
        })
        activeMarkers.push(mapMarker);
        // only get run if the ?id=* query is included in the url & the correct venue has not been displayed yet
        if(!activeMarker && window.location.search.length >= 4) {
            const query = window.location.search;
            const id = query.substr(4);
            // if the venue index/id included in the URL matches the current marker being added - show the venue's information
            if(mapMarker.index == id) {
                expandMarker(marker);
                mapMarker.setIcon("./images/pin-selected.png"); // show the venue on the map
                map.panTo({lat, lng});
                activeMarker = true; // prevent the if statement from running as it's not going to match to any other venues
            }
        }
        // show a venue when a marker is clicked on
        mapMarker.addListener("click", () => {
            expandMarker(marker);
            map.panTo({lat, lng});
            for(let marker of activeMarkers) {
               marker.setIcon("./images/pin.png"); 
            }
            mapMarker.setIcon("./images/pin-selected.png");
        })
    }
}

function expandMarker(venue) {
    document.querySelector(".venue-image").src = venue.img;
    document.querySelector(".venue-image").alt = venue.name;
    document.querySelector(".venue-image").title = venue.name;
    document.querySelector(".venue-name").innerHTML = venue.name;
    document.querySelector(".venue-cost").innerHTML = venue.price;
    document.querySelector(".venue-description").innerHTML = venue.description;
    document.querySelector(".venue-link").href = venue.link;
    document.querySelector(".venue-link").title = `Visit ${venue.name}'s website`;
    document.querySelector("aside").classList.add("expand");
    document.querySelector("aside").classList.remove("shrink");
}

function hideMenu() {
    document.querySelector("aside").classList.add("shrink");
    document.querySelector("aside").classList.remove("expand");
}