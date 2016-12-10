/**
 * Created by 1406519 on 21/11/2016.
 */

// create var to store the lat/lng
var up_lat_lng = "";

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