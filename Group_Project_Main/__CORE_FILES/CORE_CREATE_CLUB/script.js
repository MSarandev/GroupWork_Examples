/**
 * Created by Max on 03-Dec-16.
 */
// .. .. .. .. .. ..
// Magical AJAX below, watch out
function submitMe() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/saveNewClub.php",
        data: { name: "John" }
    }).done(function( msg ) {
        alert( "Club Submitted! " + msg );
    });
}
// .. .. .. .. .. .. 


// create individual functions to change elements
// - - - - - - -
// Club Name
function clubNameChange(){
    // define the element
    var txt_value = document.getElementById('club_name_txt');
    // get the value
    txt_value = txt_value.value;

    // define the other element
    var thing = document.getElementById('preview_head');

    // change the text to new text
    thing.innerHTML = txt_value.toString();
}

// Short Description
function shortDescChange() {
    // define the element
    var txt_value = document.getElementById('short_des_txt');
    // get the value
    txt_value = txt_value.value;

    // define the other element
    var thing = document.getElementById('preview_short');

    // change the text to new text
    thing.innerHTML = txt_value.toString();
}

// Contact Info
function contactChange() {
    // define the element
    var txt_value = document.getElementById('contact_txt');
    // get the value
    txt_value = txt_value.value;

    // define the other element
    var thing = document.getElementById('preview_contact');

    // change the text to new text
    thing.innerHTML = txt_value.toString();
}

// Location
function locationChange() {
    // define the element
    var txt_value = document.getElementById('location_txt');
    // get the value
    txt_value = txt_value.value;

    // define the other element
    var thing = document.getElementById('preview_location');

    // change the text to new text
    thing.innerHTML = txt_value.toString();
}

// Long Description
function longDescChange() {
    // define the element
    var txt_value = document.getElementById('long_desc_txt');
    // get the value
    txt_value = txt_value.value;

    // -- -- -- -- -- --
    // Count the characters and display
    var char_count = "";
    var stat_count = "/500";
    var lbl = document.getElementById('char_count_lbl');

    char_count = txt_value.length.toString();

    if(char_count < 500) {
        lbl.innerHTML = char_count + stat_count.toString();

        // define the other element
        var thing = document.getElementById('preview_long');

        // change the text to new text
        thing.innerHTML = txt_value.toString();

    }else{
        alert("Character limit - 500!");
    }
}

// Creator
function creatorChange() {
    // define the element
    var txt_value = document.getElementById('creator_txt');
    // get the value
    txt_value = txt_value.value;

    // define the other element
    var thing = document.getElementById('preview_creator');

    // change the text to new text
    thing.innerHTML = txt_value.toString();
}

// Background Image
function bckImgChange() {
    // define the element
    var txt_value = document.getElementById('bck_img_txt');
    // get the value
    txt_value = txt_value.value;

    // define the other element
    var thing = document.getElementById('div_main_preview');

    if(txt_value.toString() != "") {
        // change the background image
        thing.style.backgroundImage = "url(" + txt_value.toString() + ")";
    }else{
        thing.style.backgroundImage = 'url("../CORE_IMG/dark-blue-texture-14411.jpg")';
    }
}

// Header Colour
function headCChange() {
    // define the element
    var txt_value = document.getElementById('header_c_txt');

    var thing = document.getElementById('preview_head_div');

    thing.style.backgroundColor = txt_value.value;
}

// Footer Colour
function footCChange() {
    // define the element
    var txt_value = document.getElementById('footer_c_txt');

    var thing = document.getElementById('preview_foot_div');

    thing.style.backgroundColor = txt_value.value;
}

// Text Colour
function textCChange() {
    // define the element
    var txt_value = document.getElementById('text_c_txt');

    var thing = document.getElementById('div_main_preview');

    thing.style.color = txt_value.value;
}

// . . . . . . .

// Clear data function
/*

WHY DON'T YOU WORK???

function clearMe() {
    var ans = confirm('You will lose all the information. Are you sure?');

    if (ans != true) {
        window.location.replace(location);
    }
}
*/