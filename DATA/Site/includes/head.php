
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="language" content="fr" />
		<link href="./style/header.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/footer.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/globalcss.css" media="all" rel="stylesheet " type="text/css" />
		<script type="text/javascript" src="./scripts/jquery-1.12.3.js"></script>


<!-- POUR LE DATEPICKER DE LA PAGE ajoutTutorat-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="./scripts/jquery.ui.datepicker-fr.js"></script>

		<script>
			$(function() {
				$( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );
			});
		</script>


		<!-- POUR LE TIMEPICKER -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

		<script>
			$(document).ready(function(){
			    $("#timepicker").timepicker({
					timeFormat: 'HH:mm',
			    interval: 60,
			    minTime: '08:00',
			    maxTime: '18:00',
			    defaultTime: '08:00',
			    startTime: '08:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true});
			});

		</script>

		<script type="text/javascript">

		$('document').ready(function(){

			$("#search").click(function(e)
				{
					$(this).addClass('anim1');
				});

			$("#bsh4").click(function(e)
				{
					$(this).addClass('anim2');
				});

			$("#warpper").click(function(e)
				{
					$("#bsh4").removeClass('anim2');
					$("#search").removeClass('anim1');
				});

				$("#s1").click(function(e)
					{
						$('#coursS1').slideToggle("fast");
					});
				$("#s2").click(function(e)
					{
						$('#coursS2').slideToggle("fast");
					});
				$("#s3").click(function(e)
					{
						$('#coursS3').slideToggle("fast");
					});
				$("#s4").click(function(e)
					{
						$('#coursS4').slideToggle("fast");
					});
					$("#s1_arbo").click(function(e)
						{
							$('#coursS1_arbo').slideToggle("fast");
							$('#coursS1_arbo_selected').slideToggle("fast");
						});
					$("#s2_arbo").click(function(e)
						{
							$('#coursS2_arbo').slideToggle("fast");
							$('#coursS2_arbo_selected').slideToggle("fast");
						});
					$("#s3_arbo").click(function(e)
						{
							$('#coursS3_arbo').slideToggle("fast");
							$('#coursS3_arbo_selected').slideToggle("fast");
						});
					$("#s4_arbo").click(function(e)
						{
							$('#coursS4_arbo').slideToggle("fast");
							$('#coursS4_arbo_selected').slideToggle("fast");
						});

						$('#zoneClick').click(function(e)
							{
								$('#menuDeroulant').slideToggle("fast");
							});
						
						$('#header,#sousheader,#warpper').click(function(e)
							{
								var pos = document.getElementById('menuDeroulant').style.display ='none' ;
							});
						
							$('#contacts_titre').click(function(e)
									{
										$('#contacts').slideToggle("fast");
									});
	
							$('#infos_titre').click(function(e)
									{
										$('#infos_perso').slideToggle("fast");
									});
	
							$('#outils_titre').click(function(e)
									{
										$('#outils').slideToggle("fast");
									});
								


		});

		//Gérer le scroll
		/*
		$(window).scroll(function (event) {
		    var scroll = $(window).scrollTop();
				if( scroll >20)
				{
					var pos = document.getElementById('header').style.top ='-40px' ;
					var pos = document.getElementById('header').style.opacity ='0.9' ;


				}else
				{
					var pos = document.getElementById('header').style.top ='0px' ;
					var pos = document.getElementById('header').style.opacity ='1' ;
				}
		});
		*/

		$(window).load(function(){
			  document.getElementById("message_comment").focus();
		});
		
		$(document).ready(function() {
		    var s = $("#sousheader");
		    var pos = s.position();

		    $(window).scroll(function() {
		        var windowpos = $(window).scrollTop();
						var bot = "margin-bottom";
		        if (windowpos >= pos.top) {
		            s.addClass("fixed");
								var sousHeader = document.getElementById('sousheader').style.position ='fixed' ;
								var sousHeader = document.getElementById('sousheader').style.top ='0px' ;
								var corpsAccueil = document.getElementById('warpper').style.marginTop ='40px' ;

		        } else {
							var sousHeader = document.getElementById('sousheader').style.position ='relative' ;
							var corpsAccueil = document.getElementById('warpper').style.marginTop ='00px' ;

		        }
		    });
		});

		//Fonction d'affichage d'une image upload�e en temps r�el
	      $(window).load(function(){
	          function readURL(input) {
	              if (input.files && input.files[0]) {
	                  var reader = new FileReader();
	                  reader.onload = function (e) {
	                      $('#imgTempo').attr('src', e.target.result);
	                  }
	                  reader.readAsDataURL(input.files[0]);
	              }
	          }
	          $("#imgInput").change(function(){
	              readURL(this);
	          });
	      });

	    </script>

	    <style type="text/css">#gestion_super_utilisateurs, #gestion_enseignants, #gestion_tuteurs, #gestion_administrateurs{display: none;}</style>
		<script type="text/javascript">
    	function display_gestion(){
			var selectElmt = document.getElementById('affichage_gestion');
	  		var selectValue = selectElmt.options[selectElmt.selectedIndex].value;  
	  		if(selectValue == "Utilisateurs") {
	  			document.getElementById('gestion_utilisateurs').style.display = "block";
	  		}
	  		else {
	  			document.getElementById('gestion_utilisateurs').style.display = "none";
	  		}
	  		if(selectValue == "Super-utilisateurs") {
	  			document.getElementById('gestion_super_utilisateurs').style.display = "block";
	  		}	
	  		else{
	  			document.getElementById('gestion_super_utilisateurs').style.display = "none";
	  		}
	  		if(selectValue == "Enseignants") {
	  			document.getElementById('gestion_enseignants').style.display = "block";
	  		}	
	  		else{
	  			document.getElementById('gestion_enseignants').style.display = "none";
	  		}
	  		if(selectValue == "Tuteurs") {
	  			document.getElementById('gestion_tuteurs').style.display = "block";
	  		}	
	  		else{
	  			document.getElementById('gestion_tuteurs').style.display = "none";
	  		}
	  		if(selectValue == "Administrateurs") {
	  			document.getElementById('gestion_administrateurs').style.display = "block";
	  		}
	  		else{
	  			document.getElementById('gestion_administrateurs').style.display = "none";
	  		}
    	}
</script>