/**
 * Created by 1406519 on 21/11/2016.
 */

// create var to store the lat/lng
var up_lat_lng = "";

function initMap() {
    var uluru = {lat: 57.061681, lng: -2.1294679999999744};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: uluru
    });

    // create a void marker
    var marker = new google.maps.Marker({
        position: null,
        map: null,
        animation: google.maps.Animation.DROP
    }); //init

    google.maps.event.addListener(map, "rightclick", function(event) {

        // check if we have a marker
        if(marker.getMap() == null){
            // no marker, create it
            marker.setPosition(event.latLng);
            marker.setMap(map);

            // update storage
            up_lat_lng = event.latLng;
        }else{
            // marker moved, update position
            marker.setPosition(event.latLng);

            // update storage
            up_lat_lng = event.latLng;
        }
    });
}

// storage AJAX
function storeThisMarker(){
    // check with the user

    if(confirm("Are you sure?")) {

        // fetch all the values
        var img_url = document.getElementById("new_marker_url_txt").value;
        var des_txt = document.getElementById("new_marker_descr_txt").value;

        $.ajax({
            // what is the conn type
            type: "POST",
            // where do you send the request
            url: "../CORE SCRIPTS/AJAXstoreThisMarker.php",
            // what data you pass
            data: {
                action: 'store_a_marker',
                img_u: img_url,
                des_txt: des_txt,
                coor: up_lat_lng
            },
            // show the thing below on success
            success: function (response) {
                if (response.includes("ERROR")) {
                    // error
                    alert(response);
                } else {
                    // pass
                    alert(response);
                }
            }
        });
    }
}