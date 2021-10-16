function upperFName(fieldID)
{
    var upperLetter = document.getElementById("fName");

    if (fieldID != null){
        upperLetter.style.textTransform = "capitalize";
    }
}

function upperLName(fieldID)
{
    var upperLetter = document.getElementById("lName");

    if (fieldID != null){
        upperLetter.style.textTransform = "capitalize";
    }
}

function functionGender()
{
    var whatGender = document.getElementById("gender").value;
    var genderM = "M";
    var genderF = "F";
    var genderT = "T";
    if (!whatGender.includes(genderM)){
        document.getElementById("wrongGender").innerText = " Enter only M for male, F for female, T for transgender";
    }
    else if (!whatGender.includes(genderF)){
        document.getElementById("wrongGender").innerText = " Enter only M for male, F for female, T for transgender";
    }
    else if (!whatGender.includes(genderT)){
        document.getElementById("wrongGender").innerText = " Enter only M for male, F for female, T for transgender";
    }

    if (whatGender.includes(genderM)){
        document.getElementById("wrongGender").innerText = " ";
    }
    else if (whatGender.includes(genderF)){
        document.getElementById("wrongGender").innerText = " ";
    }
    else if (whatGender.includes(genderT)){
        document.getElementById("wrongGender").innerText = " ";
    }
}

function validateForm() {
    let valid = 0;

    if (document.forms["myForm"]["fName"].value.length == 0) {
        document.getElementById("labelFName").style.display = "inline-block";
        document.getElementById("labelFName").style.color = "red";
        valid = 1;
    }
    if (document.forms["myForm"]["lName"].value.length == 0) {
        document.getElementById("labelLName").style.display = "inline-block";
        document.getElementById("labelLName").style.color = "red";
        valid = 1;
    }
    if (document.forms["myForm"]["gender"].value.length == 0) {
        document.getElementById("labelGender").style.display = "inline-block";
        document.getElementById("labelGender").style.color = "red";
        valid = 1;
    }
    if (document.forms["myForm"]["birthDate"].value.length == 0) {
        document.getElementById("labelBirthDate").style.display = "inline-block";
        document.getElementById("labelBirthDate").style.color = "red";
        valid = 1;
    }
    if (document.forms["myForm"]["hireDate"].value.length == 0) {
        document.getElementById("labelHireDate").style.display = "inline-block";
        document.getElementById("labelHireDate").style.color = "red";
        valid = 1;
    }

    if (valid == 1) {
        return false;
    }

    if (valid != 1) {
        return true;
    }
}