$(document).ready(function() {

	// Si un des champs dul  formulaire d'ajout d'un concours
	// est vide, on affiche une erreur
	$(".fields-error").hide();
    $("#add-contest").on("submit", function(e) {
    	var title = $("#contest-title").val();
    	var date_begin = $("#date-first").val();
    	var date_ending = $("#date-end").val();
    	var description = $("#contest-description").val();
    	var logo = $("#logo-theme").val();
    	var banner = $("#banner-theme").val();

		if(title == "" || date_begin == "" || date_ending == "" || description == "" || logo == "" || banner == "") {
			e.preventDefault();
 			$(".fields-error").addClass('animated bounceInRight').show();
		}
	});

    $(".logo-size-error").hide();
	var _URL = window.URL || window.webkitURL;
		$("#logo-theme").change(function(e) {
    		var file, img;

    		if ((file = this.files[0])) {
		        img = new Image();
		        img.onload = function() {
		            if(this.width > 150 && this.height > 100) {
		            	$(".logo-size-error").show();
		            	$("#logo-theme").val("");
		            }
		        };
		        img.onerror = function() {
		            alert("L'extension de votre fichier n'est pas valide : " + file.type);
		            $("#logo-theme").val("");
		        };
		        img.src = _URL.createObjectURL(file);
		    }
		});

    // Ajout d'un concours - Champs Date
	$("#date-first").datepicker();
	$("#date-end").datepicker();

});