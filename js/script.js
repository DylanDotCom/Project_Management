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
