function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function togglePasswordVisibility(targetId, otherId) {
    var targetInput = document.getElementById(targetId);
    var otherInput = document.getElementById(otherId);

    if (targetInput.type === "password") {
        targetInput.type = "text";
        otherInput.type = "text";
    } else {
        targetInput.type = "password";
        otherInput.type = "password";
    }
}
function myFunctionone() {
    var x = document.getElementById("againpassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


function showhiden() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function showhidenne() {
    var x = document.getElementById("myDIVne");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    var x = document.getElementById("myDIVne");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}