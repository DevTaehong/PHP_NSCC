function italicsText(fieldID)
{
    var myFormItem = document.getElementById(fieldID);
    if(myFormItem != null)
    {
        myFormItem.style.fontStyle = "italic";
    }
}

function normalText(fieldID)
{
    var myFormItem = document.getElementById(fieldID);
    if(myFormItem != null)
    {
        myFormItem.style.fontStyle = "normal";
    }
}

function BGColorText(fieldID)
{
    var myFormItem = document.getElementById(fieldID);
    if(myFormItem != null)
    {
        myFormItem.style.backgroundColor = "yellow";
    }
}

function BGColorTextBack(fieldID)
{
    var myFormItem = document.getElementById(fieldID);
    if(myFormItem != null)
    {
        myFormItem.style.backgroundColor = "";
    }
}

function UnderlineText(num)
{
    switch (num){
        case 1: document.getElementById("labelFName").style.textDecoration = "underline";
            break;
        case 2: document.getElementById("labelLName").style.textDecoration = "underline";
            break;
        case 3:document.getElementById("labelAddress1").style.textDecoration = "underline";
            break;
        case 4:document.getElementById("labelAddress2").style.textDecoration = "underline";
            break;
        case 5:document.getElementById("labelEmail").style.textDecoration = "underline";
            break;
    }
}

function NonUnderlineText(num)
{
    switch (num){
        case 1: document.getElementById("labelFName").style.textDecoration = "none";
            break;
        case 2: document.getElementById("labelLName").style.textDecoration = "none";
            break;
        case 3:document.getElementById("labelAddress1").style.textDecoration = "none";
            break;
        case 4:document.getElementById("labelAddress2").style.textDecoration = "none";
            break;
        case 5:document.getElementById("labelEmail").style.textDecoration = "none";
            break;
    }
    document.style.dateStyle = "full"
}
 function validateForm() {
    let valid = 0;

    if (document.forms["myForm"].fName.value.length == 0) {
        document.getElementById("fName").style.borderColor = "red";
        valid = 1;
    }
    if (document.forms["myForm"].lName.value.length == 0) {
        document.getElementById("lName").style.borderColor = "red";
         valid = 1;
    }
    if (document.forms["myForm"].address1.value.length == 0) {
        document.getElementById("address1").style.borderColor = "red";
         valid = 1;
    }
    if (document.forms["myForm"].address2.value.length == 0) {
        document.getElementById("address2").style.borderColor = "red";
         valid = 1;
    }
    if (document.forms["myForm"].email.value.length == 0) {
        document.getElementById("email").style.borderColor = "red";
         valid = 1;
    }

    if (document.forms["myForm"].box.checked == false){
        document.getElementById("boxLabel").style.display = "inline-block";
        document.getElementById("boxLabel").style.color="red";
        valid = 1;
    }

    if (valid == 1) {
        return false;
    }

    if (valid != 1) {
        return true;
    }

}