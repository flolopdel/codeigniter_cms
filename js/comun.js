function lookup(inputString) {
	if(inputString.length == 0) {
		$('#display2').fadeOut(); // Hide the suggestions box
	} else {
		// $.post("usuario/buscador", {query: ""+inputString+""}, function(data) { // Do an AJAX call
			// $('#display2').fadeIn(); // Show the suggestions box
			// $('#display2').html(data); // Fill the suggestions box
		// });
		$("input").blur(function(){
	 	$('#display2').fadeOut();
	 });
	}
}