//When submitting for Search List Form, validateSearchListForm() is executed
function validateSearchListForm()
{
    var errors = ''; // we will use this to store any error messages.
    var focus = "";
    
    var list = document.getElementById('list').value;

    if( list.trim() == "")
    {
        if (focus == "")
        {
            focus = "list";
        }

        errors += "Select one of the List.<br/>";
   }

    // Comparing the errors string if any errors were found.
    if(errors.trim() != ''){ // trim is the function that trims any empty spaces from front or back
        // Showing the errors
        document.getElementById('searchListErrors').innerHTML = errors + '-- Please fix the above errors --';
        document.getElementById('searchListErrors').style.border = '2px dashed white';

        if (focus != "")
        {
            document.getElementById(focus).focus();
        }
    }
    else{
        // If no errors found

        return true;
    }
    
    return false;
}

