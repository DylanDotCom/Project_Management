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
var cartoons = [];

function fetchCartoons() {
    fetch("getCartoons.php")
    .then(response => response.json())
    .then(data => {
        cartoons = data;
        console.log("Cartoons array:", cartoons);
    })
    .catch(error => console.error("yufol: ", error));
}

fetchCartoons();

var list_cartoons = []; 
 function showHint(substring) {
    
    html_string = html_string + "<img src='db_images/"+ element+".jpg' height = '300px' class = 'hover-pointer' onclick=\"showHintInfo('" + element + "')\";>" + element + "</span> | ";
    html_string = "";
    if(list_cartoons.length == 1){
        showHintInfo(list_cartoons[0]);
    } else{
         list_cartoons.forEach(element => {
        html_string = html_string + "<span class = 'hover-pointer' onclick=\"showHintInfo('" + element + "')\";>" + element + "</span> | ";
            });
        document.getElementById("txtHint").innerHTML = "<br>Title: <br>Runtime:";
    }
    document.getElementById("txtHint").innerHTML = html_string;
}

function showHintInfo(str) {
    const hintElement = document.getElementById("txtHint");

    if(str.length === 0) {
        hintElement.innerHTML = ""; 
        return;
    }

    fetch(`getSearch.php?q=${str}`)
    .then(response => {
        if(!response.ok) {
            throw new Error(`HTTP error!: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        hintElement.innerHTML = data;
    })

    .catch(error => {
        console.error("iube", error);
        hintElement.innerHTML = "Error loading hint.";})
    }
