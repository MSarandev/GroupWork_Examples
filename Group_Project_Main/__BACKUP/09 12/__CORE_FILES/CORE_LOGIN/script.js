/**
 * Created by Max on 06-Dec-16.
 */

/** !!!!!
    Apparently using JS to check the fields before
    parsing to PHP was not a good idea

    LEARN FROM MY MISTAKES
    !!!!!

 */

/*

// now the function that checks the value

function liftOff(param){
    // the param is the object's name
    // .. .. .. ..
    // select the element
    var obj = document.getElementsByName(param)[0].value;
    // define the fail vars, default to 1 because reasons
    var is_empty = true;
    var is_less = true;
    var is_space = true;
    var is_alphanum = true;

    // parse the name of the field
    var el_name = param.toString();

    // start the checks
    // .. .. .. .. ..
    // check if it's a password field
    if(el_name.includes("password")){
        // password field
        // check length
        if(obj.length < 6){
            is_less = true; // set the var
        }else{
            is_less = false;
        }

        // check empty
        if(obj.trim() == ""){
            is_empty = true; // set the var
        }else{
            is_empty = false;
        }

        // check space
        if(obj.trim() == " "){
            is_space = true; // set the var
        }else{
            is_space = false;
        }

        // call the error display function
        errorMyMessage(is_empty, is_less, is_space, "notUsed");
    }else if(el_name.includes("name") &&
        !el_name.includes("username")){
        // name field (but not a username)

        // check empty
        if(obj.trim() == ""){
            is_empty = true; //set the var
        }else{
            is_empty = false;
        }

        // check space
        if(obj.trim() == " "){
            is_space = true; // set the var
        }else{
            is_space = false;
        }

        // check content
        if(isNaN(obj.trim())){
            // value IS NOT A NUMBER
            // yes, confusing, I know
            is_alphanum = false;
        }else{
            // val is a number
            is_alphanum = true;
        }

        // call the error display function
        errorMyMessage(is_empty, "notUsed", is_space, is_alphanum);
    }else{
        // generic input field

        // check empty
        if(obj.trim() == ""){
            is_empty = true; //set the var
        }else{
            is_empty = false;
        }

        // check space
        if(obj.trim() == " "){
            is_space = true; // set the var
        }else{
            is_space = false;
        }

        // call the error display function
        errorMyMessage(is_empty, "notUsed", is_space, "notUsed");
    }

}

// a very boring error messaging function
function errorMyMessage(empty, less, space, content) {
    // check if some params were not used
    if(empty == true && empty != "notUsed"){
        // display error
        alert("One of your fields is empty!");
    }

    if(less == true && less != "notUsed"){
        // display error
        alert("One of your fields requires more characters!");
    }

    if(space == true && space != "notUsed"){
        // display error
        alert("One of your fields is a space?!");
    }

    if(content == true && content != "notUsed"){
        // display error
        alert("One of your fields contains numbers, and it shouldn't!");
    }
}

*/