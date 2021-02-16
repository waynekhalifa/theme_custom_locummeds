import GoogleMapsApi from './GoogleMapsApi'
import { stylers }   from './stylers'
import markerTmpl from './marker.tmpl'

/**
 * Location Map
 * Main map rendering function that uses our GMaps API class
 * @param {string} el - Google Map selector
 */
export function LocationMap(el) {

    const gApiKey = 'AIzaSyDbfszi1v76VH-tT68_RmhSQ3LGCZdjN50'
    const gmapApi = new GoogleMapsApi(gApiKey)
    const mapEl   = document.querySelector(el)
    const data    = {
        lat:     30.07708,
        lng:     31.285909,
        address: 'Locum Meds, Iveco House, Station Road, Watford, WD17 1ET',
        title:   'Locum Meds',
        zoom:    14,
    }
    // Call map renderer
    gmapApi.load().then(() => {
        renderMap(mapEl, data)
    })
}

/**
 * Render Map
 * @param {map obj} mapEl - Google Map
 * @param {obj} data - map data
 */
function renderMap(mapEl, data) {

    const options = {
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles:    stylers.styles,
        zoom:      data.zoom,
        center:    {
            lat: data.lat,
            lng: data.lng
        }
    }

    const map = new google.maps.Map(mapEl, options)

    renderMarker(map, data)
}

/**
 * Render Marker
 * Renders custom map marker and infowindow
 * @param {map element} mapEl
 * @param {object} data
 */
function renderMarker(map, data) {

    const icon = {
        url:        stylers.icons.red,
        scaledSize: new google.maps.Size(80, 80)
    }

    const tmpl = markerTmpl(data)

    const marker = new google.maps.Marker({
        position:  new google.maps.LatLng(data.lat, data.lng),
        map:       map,
        // icon:      icon,
        title:     data.title,
        content:   tmpl,
        // animation: google.maps.Animation.DROP
    })

    const infowindow = new google.maps.InfoWindow()

    handleMarkerClick(map, marker, infowindow)
}

/**
 * Handle Marker Click
 *
 * @param {map obj} mapEl
 * @param {marker} marker
 * @param {infowindow} infoWindow
 */
function handleMarkerClick(map, marker, infowindow) {

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(marker.content)
        infowindow.open(map, marker)
    })

    google.maps.event.addListener(map, 'click', function(event) {
        if (infowindow) {
            infowindow.close(map, infowindow)
        }
    })
}