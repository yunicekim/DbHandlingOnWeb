function firstFocus()
{
    //in order to give a focus to the first text element when the form loading
    var focus1 = document.getElementById('partId');
    focus1.focus();
}

//When submitting for Part Form, validatePartForm() is executed
function validatePartForm()
{

    var errors = ''; // we will use this to store any error messages.
    var focus = "";
    
    var partId = document.getElementById('partId').value;
    var vendorNumber = document.getElementById('vendorNumber').value;
    var description = document.getElementById('description').value;
    var onHand = document.getElementById('onHand').value;
    var onOrder = document.getElementById('onOrder').value;
    var cost = document.getElementById('cost').value;
    var listPrice = document.getElementById('listPrice').value;
    
    if( partId.trim() == "")
    {
        if (focus == "")
        {
            focus = "partId";
        }

        errors += "Type the Part ID.<br/>";
    }
    else
    {
        if(isNaN(partId))
        {
            if (focus == "")
            {
                focus = "partId";
            }

            errors += "Type the Part ID as a number.<br/>";
        }
        else
        {
            partId = parseInt(partId);
        }
    }

    if( vendorNumber.trim() == "")
    {
        if (focus == "")
        {
            focus = "vendorNumber";
        }

        errors +="Type the Vendor Number.<br/>";
    }
    else
    {
        if(isNaN(vendorNumber))
        {
            if (focus == "")
            {
                focus = "vendorNumber";
            }

            errors += "Type the Vendor Number as a number.<br/>";
        }
        else
        {
            vendorNumber = parseInt(vendorNumber);
        }
    }

    if( description.trim() == "")
    {
        if (focus == "")
        {
            focus = "description";
        }

        errors +="Type the Description.<br/>";
    }

    if( onHand.trim() == "")
    {
        if (focus == "")
        {
            focus = "onHand";
        }

        errors +="Type the on Hand Amount.<br/>";
    }
    else
    {
        if(isNaN(onHand))
        {
            if (focus == "")
            {
                focus = "onHand";
            }

            errors += "Type the on Hand Amount as a number.<br/>";
        }
        else
        {
            onHand = parseInt(onHand);
        }
    }    

    if( onOrder.trim() == "")
    {
        if (focus == "")
        {
            focus = "onOrder";
        }

        errors +="Type the Order Amount.<br/>";
    }
    else
    {
        if(isNaN(onOrder))
        {
            if (focus == "")
            {
                focus = "onOrder";
            }

            errors += "Type the on Order Amount as a number.<br/>";
        }
        else
        {
            onOrder = parseInt(onOrder);
        }
    } 

    if( cost.trim() == "")
    {
        if (focus == "")
        {
            focus = "cost";
        }

        errors +="Type the cost.<br/>";
    }
    else
    {
        if(isNaN(cost))
        {
            if (focus == "")
            {
                focus = "cost";
            }

            errors += "Type the cost as a number.<br/>";
        }
        else
        {
            cost = parseInt(cost);
        }
    } 

    if( listPrice.trim() == "")
    {
        if (focus == "")
        {
            focus = "listPrice";
        }

        errors +="Type the List Price.<br/>";
   }
    else
    {
        if(isNaN(listPrice))
        {
            if (focus == "")
            {
                focus = "listPrice";
            }

            errors += "Type the List Price as a number.<br/>";
        }
        else
        {
            listPrice = parseInt(listPrice);
        }
    } 

    // Comparing the errors string if any errors were found.
    if(errors.trim() != ''){ // trim is the function that trims any empty spaces from front or back
        // Showing the errors
        document.getElementById('partErrors').innerHTML = errors + '-- Please fix the above errors --';
        document.getElementById('partErrors').style.border = '2px dashed white';

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

