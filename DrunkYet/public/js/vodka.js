var mainContainer;
var notifyElement;

// When the DOM is ready
document.addEventListener("DOMContentLoaded", function(event){
    // Check notification
    mainContainer = document.getElementById("dy-content");
    notifyElement = document.getElementById("dy-notify");
    if(notifyElement != null){ // If there are notification
        notifyElement.style.visibility = "visible";
        notifyElement.style.display = "block";
        mainContainer.style.filter = "blur(7px)";

        setTimeout(notifyClose, 2000);
    }

    var searchInput = document.getElementById("search_drink");
    var searchResults = document.getElementById("drink_results")
    if(searchInput != null){
        searchInput.addEventListener("input", function(event){
            // Search in Drinks
            var request = new XMLHttpRequest();

            request.onreadystatechange = function(){
                if(request.status == 200){
                    var drinks = JSON.parse(request.responseText);
                    console.log(drinks);
                    searchResults.innerHTML = "";
                    drinks.forEach(function(drink){
                        searchResults.innerHTML += `<a href="/consume/${drink.id}"><div class='dy-list-element'> \
                                                        <span class='dy-element-main'>${drink.name}</span> \
                                                        <div class='dy-element-right'> \
                                                            <span class='dy-element-second'>${drink.default_degree}° ${drink.default_quantity}ml</span> \
                                                                <span class='dy-button-strong dy-element-action'> \
                                                                    &rsaquo; \
                                                                </span>
 \
                                                        </div> \
                                                    </div>
                                                </a>`;
                    });
                }
            }

            request.open("get","/search?s="+searchInput.value,true);
            request.send(null);
        });
    }
});

function notifyClose(){
    notifyElement.style.visibility = "hidden";
    notifyElement.style.display = "none";
    mainContainer.style.filter = "none";
}
