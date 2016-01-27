//Highcharts
$(function () {
    $('#statistics-chart').highcharts({
        chart: {
            type: 'areaspline',
        },
        title: {
            text: null
        },
        xAxis: {
            categories: [
                'Lun. 25 janv.',
                'Mard. 26 janv.',
                'Mercr. 27 janv.',
                'Jeud. 28 janv.',
                'Vend. 29 janv.',
                'Sam. 30 janv.',
                'Dim. 01 févr.',
                'Lun. 02 févr.'
            ],
        },
        yAxis: {
            title: {
                text: null
            }
        },
        tooltip: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Jours',
            color: '#c2c2c2',
            data: [150, 167, 55, 78, 109, 25, 89, 101],
            marker: {
                fillColor: 'white',
                lineWidth: 2,
                lineColor: '#999'
            }
        }]
    });
});

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

	// On vérifie les dimensions
    // de l'image bannière à uploader
    $(".banner-size-error").hide();
	var _URL = window.URL || window.webkitURL;
	$("#banner-theme").change(function(e) {
		var file, img;

		if ((file = this.files[0])) {
	        img = new Image();
	        img.onload = function() {
	            if(this.width != 1250 && this.height != 400) {
	            	$(".banner-size-error").addClass("animated bounceInRight").show().delay(3000).fadeOut("slow");
	            	$("#banner-theme").val("");
	            }
	        };
	        img.onerror = function() {
	            alert("L'extension de votre fichier n'est pas valide : " + file.type);
	            $("#banner-theme").val("");
	        };
	        img.src = _URL.createObjectURL(file);
	    }
	});
    
    // On vérifie les dimensions
    // de l'image logo à uploader
    $(".logo-size-error").hide();
	var _URL = window.URL || window.webkitURL;
	$("#logo-theme").change(function(e) {
		var file, img;

		if ((file = this.files[0])) {
	        img = new Image();
	        img.onload = function() {
	            if(this.width != 200 && this.height != 200) {
	            	$(".logo-size-error").addClass("animated bounceInRight").show().delay(3000).fadeOut("slow");
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

    $( ".selector" )

    // ADD PRICE
    // Calcul du nombre de caractères restants
    // pour la description d'un prix
    var maxchars = 10;
    $('.max-char').keyup(function () {
        var tlength = $(this).val().length;
        $(this).val($(this).val().substring(0, maxchars));
        var tlength = $(this).val().length;
        remain = maxchars - parseInt(tlength);
        $('.remain-first').text(remain);
        $('.remain-second').text(remain);
        $('.remain-third').text(remain);
    });

});