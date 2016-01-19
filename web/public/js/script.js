$(document).ready(function() {

	$(".display-errors").hide();
    $("#contest-form").on("submit", function(e) {
    	var title = $("#contest-title").val();
    	var date_begin = $("#date-first").val();
    	var date_ending = $("#date-end").val();
    	var description = $("#contest-description").val();

		if(title == "" || date_begin == "" || date_ending == "" || description == "") {
			e.preventDefault();
 			$(".display-errors").show();
		}
	});

	$("#date-first").datepicker();
	$("#date-end").datepicker();

});