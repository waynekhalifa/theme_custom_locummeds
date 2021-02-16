class GoogleMap {
    constructor(elem) {
        this.element = elem;
        this.mapOptions = {
            center: {
                lat: 30.07708,
                lng: 31.285909
            },
            zoom: 6,
            scrollwheel: false
        };
        this.createMap();
    }

    createMap() {
        new google.maps.Map(this.element, this.mapOptions);
    }
}

export default GoogleMap;