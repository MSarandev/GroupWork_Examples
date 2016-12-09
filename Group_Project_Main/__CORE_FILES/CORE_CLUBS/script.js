/**
 * Created by 1406519 on 21/11/2016.
 */


// My Clubs
function dispMyClubs() {
    var param1 = "my clubs";

    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_my_clubs', id: param1},
        success: function (response) {
            alert(response);
        }
    });
}

// Age Group 1
function dispAG1() {
    var param1 = "age group 1";

    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG1', id: param1},
        success: function (response) {
            alert(response);
        }
    });
}
// Age Group 2
function dispAG2() {
    var param1 = "age group 2";

    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG2', id: param1},
        success: function (response) {
            alert(response);
        }
    });
}
// Age Group 3
function dispAG3() {
    var param1 = "age group 3";

    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG3', id: param1},
        success: function (response) {
            alert(response);
        }
    });
}
