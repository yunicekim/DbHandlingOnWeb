//When submitting for Vendor Form, validateVendorForm() is executed
function validateVendorForm()
{
    var errors = ''; // we will use this to store any error messages.
    var focus = "";
    
    var vendorNumber = document.getElementById('vendorNumberInVendorForm').value;
    var vendorName = document.getElementById('vendorName').value;
    var address1 = document.getElementById('address1').value;
    var address2 = document.getElementById('address2').value;
    var city = document.getElementById('city').value;
    var postcode = document.getElementById('postcode').value;
    var country = document.getElementById('country').value;
    var phone = document.getElementById('phone').value;
    var fax = document.getElementById('fax').value;
    
    if( vendorNumber.trim() == "")
    {
        if (focus == "")
        {
            focus = "vendorNumberInVendorForm";
        }
       
        errors += "Type the Vendor Number.<br/>";
    }
    else
    {
        if(isNaN(vendorNumber))
        {
            if (focus == "")
            {
                focus = "vendorNumberInVendorForm";
            }
            
            errors += "Type the Vendor Number as a number.<br/>";
        }
        else
        {
            vendorNumber = parseInt(vendorNumber);
        }
    }

    if( vendorName.trim() == "")
    {
        if (focus == "")
        {
            focus = "vendorName";
        }

        errors +="Type the Vendor Name.<br/>";
    }

    if( address1.trim() == "")
    {

        if (focus == "")
        {
            focus = "address1";
        }

        errors +="Type the Address 1.<br/>";
    }
/*    
    if( address2.trim() == "")
    {

        if (focus == "")
        {
            focus = "address2";
        }
        errors +="Type the Address 2.<br/>";
    }
*/
    if( city.trim() == "")
    {
        if (focus == "")
        {
            focus = "city";
        }

        errors +="Type the City.<br/>";
    }

    if( postcode.trim() == "")
    {
        if (focus == "")
        {
            focus = "postcode";
        }
        
        errors +="Type the Postcode.<br/>";
    }
    else
    {
        var postcoderegex = /^[A-Z][0-9][A-Z]\s[0-9][A-Z][0-9]$/;

        // Converting the postcode to uppercase before testing
        postcode = postcode.toUpperCase(); 

        // Testing if the postcode fits the pattern
        if(postcoderegex.test(postcode)){ // Returns true if postcode satisfies the pattern
            errors += ''; // No error in postcode
        }
        else{
            if (focus == "")
            {
                focus = "postcode";
            }

            errors += 'Post code is not in correct format <br/>'; // Error found in postcode
        }
    } 

    if( country.trim() == "")
    {
        if (focus == "")
        {
            focus = "country";
        }

        errors +="Type the Country.<br/>";
    }

    if( phone.trim() == "")
    {
        if (focus == "")
        {
            focus = "phone";
        }
        
        errors +="Type the Phone Number.<br/>";
    }
    else
    {
        // Writing a regular expression to validate Phone
        // Phone format example is 123-123-1234 or 123.123.1234
        // or (123)-(123)-(1234) or (123).(123).(1234) or 1231231234
        // or 123/123/1234 or (123)/123/1234
        // or (123).123.1234 or (123)-123-1234 and some more that satisfy the rules

        var phoneregex = /^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/;

        // Testing if the phone fits the pattern
        if(phoneregex.test(phone)){ // Returns true if phone satisfies the pattern
            errors += ''; // No error in phone
        }
        else{
            // Error found in phone; concatenating to the existing list of errors
            if (focus == "")
            {
                focus = "phone";
            }
            
            errors += 'Phone is not in correct format <br/>'; 
        }
     }

    if( fax.trim() == "")
    {
        if (focus == "")
        {
            focus = "fax";
        }

        errors +="Type the Fax Number.<br/>";
    }
    else
    {
        // Writing a regular expression to validate Phone
        // Phone format example is 123-123-1234 or 123.123.1234
        // or (123)-(123)-(1234) or (123).(123).(1234) or 1231231234
        // or 123/123/1234 or (123)/123/1234
        // or (123).123.1234 or (123)-123-1234 and some more that satisfy the rules

        var faxregex = /^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/;

        // Testing if the phone fits the pattern
        if(faxregex.test(fax)){ // Returns true if phone satisfies the pattern
            errors += ''; // No error in phone
        }
        else{
            if (focus == "")
            {
                focus = "fax";
            }
            // Error found in phone; concatenating to the existing list of errors
            errors += 'Fax is not in correct format <br/>'; 
        }
     }
     
    // Comparing the errors string if any errors were found.
    if(errors.trim() != ''){ // trim is the function that trims any empty spaces from front or back
        // Showing the errors
        document.getElementById('vendorErrors').innerHTML = errors + '-- Please fix the above errors --';
        document.getElementById('vendorErrors').style.border = '2px dashed white';

        if (focus != "")
        {
            document.getElementById(focus).focus();
            document.getElementById(focus).select();
        }
    }
    else{
        // If no errors found

        return true;
    }

    return false;
}

