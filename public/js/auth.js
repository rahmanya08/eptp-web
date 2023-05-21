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