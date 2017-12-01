var mainContainer;
var notifyElement;

// When the DOM is ready
document.addEventListener("DOMContentLoaded", function(event){
    // Check notification
    mainContainer = document.getElementById("dy-content");
    notifyElement = document.getElementById("dy-notify");
    if(notifyElement != null){ // If there are notification
        notifyElement.style.visibility = "visible";
        mainContainer.style.filter = "blur(7px)"

        setTimeout(notifyClose, 2000);
    }
});

function notifyClose(){
    notifyElement.style.visibility = "hidden";
    mainContainer.style.filter = "none"
}