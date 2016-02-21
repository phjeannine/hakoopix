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
    var start = $("#date-first");
    var end = $("#date-end");

	$(start).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      minDate: -0,
      maxDate: "+1M +10D",
      onClose: function( selectedDate ) {
        $(end).datepicker( "option", "minDate", selectedDate );
      }
    });

    $(end).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $(start).datepicker( "option", "maxDate", selectedDate );
      }
    });

    /* -------- ADD PRICES -------- */
    // Affichage du formulaire d'ajout de prix
 /*   $('#add-prices').hide();
    var contestName = $('#select-contest-name');

    $(contestName).on('change', function() {
        var value = $(this).val();
        if(value != 'no-value') {
            $('#add-prices').show();
        }

        if(value == 'no-value') {
            $('#add-prices').hide();
        }
    });

    // Control maximum chars on textarea => add contest page
    var maxchars = 200;
	$('#contest-description').keyup(function () {
	    var tlength = $(this).val().length;
	    $(this).val($(this).val().substring(0, maxchars));
	    var tlength = $(this).val().length;
	    remain = maxchars - parseInt(tlength);
	    $('#remain').text(remain);
	});  
*/


	// Prévisulation du contest
	//Ajout du logo
	function readImage(input) {
    	if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.previewLogo').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
    	}
	}

    $("#logo-theme").change(function(){
        readImage(this);
    });

    function readBanner(input) {
    	if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.previewBanner').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
    	}
	}

    $("#banner-theme").change(function(){
        readBanner(this);
    });

	$('input.preview-contest').on('click', function(e){
		e.preventDefault();

		// Ajout du titre
		addTitle = $('input#contest-title').val();
		if(addTitle) {
			$('div.previewTitle').text(addTitle);
		}

		// Ajout de la description
		addDescription = $('textarea#contest-description').val();
		if(addDescription){
			$('div.previewDescription').text(addDescription);
		}

		// Ajout couleur du thème
		addColor = $('input#color-theme').val();
		if(addColor) {
			$('div.previewColor').css('background-color', addColor);
			$('div.previewColorBarre').css('background-color', 'none');
			$('div.previewColorBarre').css('border-color', addColor);
			$('i.previewFa').css('color', addColor);
		}
	});	

	// INFINITE LOADER



});