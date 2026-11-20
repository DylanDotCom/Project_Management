$(document).ready(function() {

	$("#FetchShow").on("click", function(){
		$("#ShowData").empty();
		//$("#ShowData").addClass("Styled");

		$.get("https://api.sampleapis.com/cartoons/cartoons2D", function(data){
     	   console.log(data);
	  	      var Title = data[0].title;
	  	      var Year = data[0].year;
	  	      var Creator = data[0].creator;
	  	      var Rating = data[0].rating;
	  	      var Genre = data[0].genre;
              var Runtime = data[0].runtime_in_minutes;
              var Episodes = data[0].episodes;
              var Image = data[0].image;

	 	    $("#ShowData").append().html("<img src=" + Image + ">" +
			     " \n <h2>" + Title + " </h2>" +
			"\n<h3>Year: " + Year + "</h3> \n <h4>Creator: " + Creator + "</h4> \n <h4>Rating: " + Rating + 
            "</h4> \n <h4>Genre: " + Genre + "</h4> \n <h4>Runtime: " + Runtime + "</h4> \n <h4>Episodes: " + 
            Episodes + "</h4>"
	  	   );
   	    });
 	 });
    

	 
}); 

//Search Page Code
var searchTimer = null;
var searchCounter = 0;

function showHint(text) {
    var out = document.getElementById("txtHint");
    text = text.trim();

    if (text.length === 0) {
        out.innerHTML = "";
        return;
    }

    // wait until the person pauses typing so we don't send a request per keystroke
    clearTimeout(searchTimer);
    searchTimer = setTimeout(function () {
        var myRequest = ++searchCounter;

        fetch("getSearch.php?q=" + encodeURIComponent(text))
            .then(function (response) {
                if (!response.ok) throw new Error("HTTP error: " + response.status);
                return response.text();
            })
            .then(function (html) {
                // ignore slow answers from older searches
                if (myRequest === searchCounter) out.innerHTML = html;
            })
            .catch(function (error) {
                console.error("Search error:", error);
                out.innerHTML = "<p>Error loading results.</p>";
            });
    }, 250);
}
    .catch(error => {
        console.error("iube", error);
        hintElement.innerHTML = "Error loading hint.";})
    }

