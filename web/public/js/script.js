$(document).ready(function() {

	/*
    $("#contest-form").on("submit", function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "../data/insertContest.php",
			data: $('#contest-form').serialize(),
			success: function(data){
				alert("INSERT SUCCESS !");
			}
		});
	});
*/

	$(".date-first").datepicker();
	$(".date-end").datepicker();

});