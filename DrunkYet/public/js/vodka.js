var mainContainer;
var notifyElement;
var searchInput;
var searchResults;

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

    searchInput = document.getElementById("search_drink");
    searchResults = document.getElementById("drink_results")
    if(searchInput != null){
        searchInput.addEventListener("input", searchDrink);
        searchDrink();
    }
});

function notifyClose(){
    notifyElement.style.visibility = "hidden";
    notifyElement.style.display = "none";
    mainContainer.style.filter = "none";
}

var searchDrink = function(){
    // Search in Drinks
    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            if(request.status == 200){
                var drinks = JSON.parse(request.responseText);
                searchResults.innerHTML = "";
                if(drinks.length > 0){
                    drinks.forEach(function(drink){
                        searchResults.innerHTML += `<a href="/consume/${drink.id}">
                                                        <div class='dy-list-element'> \
                                                            <span class='dy-element-main'>${drink.name}</span> \
                                                            <div class='dy-element-right'> \
                                                                <span class='dy-element-second'>${drink.default_degree}° ${drink.default_quantity}ml</span> \
                                                                <span class='dy-button-strong dy-element-action'> \
                                                                    &rsaquo; \
                                                                </span> \
                                                            </div> \
                                                        </div>
                                                    </a>`;});
                }
                else{
                    searchResults.innerHTML = `<div class="dy-list-element">
                                                    <span class="dy-element-main">Aucune boisson ne correspond à la recherche.</span>
                                               </div>`;
                }
            } else{
                searchResults.innerHTML = `<div class="dy-list-element"><span>Problème lors de l'accès au serveur.</span></div>`;
            }
        }
    }

    request.open("get","/search?s="+searchInput.value,true);
    request.send(null);
}
