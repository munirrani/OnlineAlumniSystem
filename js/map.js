// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = {
        lat: 3.128770468020777,
        lng: 101.65073771534342
    };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 17,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}