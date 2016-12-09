/**
 * Created by 1406519 on 21/11/2016.
 * Modified: SARANDEV 09/12 @ 3:43AM
 */

// |*|*|*|*|*|*|*|
// CLUBS GENERATION FUNCTIONS

// My Clubs
function dispMyClubs() {
    $.ajax({
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/filterBtnScript.php",
        // what data you pass
        data: {action: 'show_my_clubs'},
        // show the thing below on success
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}

// Age Group 1
function dispAG1() {
    $.ajax({
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/filterBtnScript.php",
        // what data you pass
        // With the age groups, pass a number as an id
        // passing this will load the correct age group clubs
        data: {action: 'show_AG1', param1:'1'},
        // show the thing below on success
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}

// Age Group 2
function dispAG2() {
    $.ajax({
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/filterBtnScript.php",
        // what data you pass
        // With the age groups, pass a number as an id
        // passing this will load the correct age group clubs
        data: {action: 'show_AG2', param1:'2'},
        // show the thing below on success
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}

// Age Group 3
function dispAG3() {
    $.ajax({
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/filterBtnScript.php",
        // what data you pass
        // With the age groups, pass a number as an id
        // passing this will load the correct age group clubs
        data: {action: 'show_AG3', param1:'3'},
        // show the thing below on success
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}

// |*|*|*|*|*|*|*|

// |*|*|*|*|*|*|*|
// SEARCH FUNCTION
function whatAreYouLookingFor(){
    // get the search query value
    var search_val = document.getElementById("search_club_txt").value;

    $.ajax({
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/AJAXsearchClubs.php",
        // what data you pass
        // send the value as an extra param
        data: {action: 'search_my_clubs', val:search_val},
        // show the thing below on success
        success: function (response) {
            // check for errors
            if(response.includes("ERROR")){
                alert(response);
            }else {
                // get the element in question
                var el1 = document.getElementById("search_res_inner");

                // update the innerHTML with the response
                el1.innerHTML = response;
            }
        }
    });
}
// |*|*|*|*|*|*|*|


// display the create event div
function displDiv(){
    // fetch the element
    var el = document.getElementById("create_event_div");

    // set the param
    if(el.style.visibility == 'visible'){
        el.style.visibility = 'hidden';
    }else{
        el.style.visibility = 'visible'
    }
}

// |*|*|*|*|*|*|
// New event function
function aNewEvent(){
    // get all the values
    var clubID = document.getElementById("create_event_id_txt").value;
    var event_text = document.getElementById("create_event_txt_txt").value;
    var event_day = document.getElementById("create_event_day_txt").value;
    var event_time = document.getElementById("create_event_time_txt").value;


    $.ajax({
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/AJAXnewEvent.php",
        // what data you pass
        // send the values as extra params
        data: {action: 'add_new_club',
            clubID:clubID,
            event_text:event_text,
            event_day:event_day,
            event_time:event_time},
        // show the thing below on success
        success: function (response) {
            // check for errors
            if(response.includes("ERROR")){
                // show the error
                alert(response);
            }else {
                // hide the div
                displDiv();

                // show the msg
                alert(response);
            }
        }
    });
}
// |*|*|*|*|*|*|