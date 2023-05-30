function hideAlert() {
    
    var alert = document.getElementById("alert");
    //var xIcon = document.getElementById("icon");

    if (alert.style.display != "block")
    {
        alert.style.display = "block";
    }else {
        alert.style.display = "none";
    }

}

function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }