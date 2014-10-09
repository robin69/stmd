/**
*
*	Après le chargement de la page et du CSS
*
*
*
*************/

$(document).ready(function()
{



	 $("*[id^='infos_']").hide(); // Tous les volets d'information sont fermés par défaut à l'ouverture de la page.
	 
	  // On instancie les variable pour les cartes Google
	 var geocoder;
	 var map = new Array();
	 
	 
	 // Dans le formulaire de recherhce d'un CAS, lorsqu'on clic sur un li contenant un label, on coche la case
	 $(".counsel li label").click(function(){
	 	$(this).parent().toggleClass('check_list');
	 });
	 
	 
	 $(".counsel input[type='checkbox']").change(function(){
		 send_cas_request();
		 console.log("Une checkbox a changée");
	 });
	 
	 $("#send_search_cas").click(function(){
		 $("#search_cas_form").submit();
		 return false; 
	 });
});

function send_form(form_id)
{
	console.log(form_id);
	$("#" + form_id ).submit();
}

function send_cas_request()
{
	
	//On instancie les tableaux pour la recherche de CAS
	 var search 	= 	[];
	 var zone 		= 	[];
	 var classe		= 	[];
	 var mdtransp	=	[];
	 	
	//On récupère les valeurs des zones
	$("input[name='zone[]']:checked").each(function(){
		zone.push($(this).val());
	});
	console.log(zone);
	//On récupère les valeurs des classes
	$("input[name='classe[]']:checked").each(function(){
		classe.push($(this).val());
	});
	console.log(classe);
	//On récupère les valeurs des modes de transport
	$("input[name='mdtransp[]']:checked").each(function(){
		mdtransp.push($(this).val());
	});
	console.log(mdtransp);
	
	
	var now = new Date(); //On instancie une variable à ajouter à l'url ajax pour éviter le cache navigateur
	
	//On envoie la requête
	$.ajax({
		url: "/annuaire/search_cas_ajax/"+ now.valueOf().toString(),
		data: {
			zone:		zone,
			classe:		classe,
			mdtransp:	mdtransp,
		},
		type: "POST",
		dataType: "json",
		success: function(data){
			console.log(data[0]["nbr_fiches"]);	
			var nbr_fiches = data[0]["nbr_fiches"];

					
			if(nbr_fiches ==0)
			{
				$("#search_result_nbr").html("Il n'y a pas de résultat avec ces critères. Modifiez votre recherche.");
			}
			if(nbr_fiches ==1)
			{
				$("#search_result_nbr").html("<a href='#' onclick='send_form(\"search_cas_form\"); return false;' title='' >Voir le résultat trouvé.</a>");
			}
			
			if(nbr_fiches >=2)
			{
				$("#search_result_nbr").html("<a href='#' onclick='send_form(\"search_cas_form\"); return false;' title='' >Voir les "+ nbr_fiches +" résultats trouvés.</a>");
			}
			
			
		},
		error: function(xhr, status, errorThrown){
			console.log("status : " + status);
			console.log("Error : " + errorThrown);
			console.dir(xhr);
		},
		complete: function(xhr, status){
			console.log("Ajax complete");
		}
		
	});

}


function slide_info(id)
{
	//On détermine le volet d'information sur lequel on doit agir
	var id_to_show = "#infos_"+id;
	
	//On lance l'anim
	$(id_to_show).slideToggle("slow", function(){
		//animation terminée
		block_status = $(this).css("display");
		if(block_status == "block"){
			//On récupère la valeur de l'adresse
			adresse = $('#adresse_'+id).val();
			
			initialize(adresse, id);
			
/*
			//On récupère l'ID de la fiche
			id_fiche = $('#id_fiche_'+id).val();
*/
			
			//On met à jour les statisitques d'ouverture
			fiche_count_up(id);
		}else{
			//on vide le contenu de la carte pour libérer de la mémoire.
			$("#map_canvas"+id).empty();
		}
		console.log("OK !");
	});
}



function this_close(id)
{
	//On ferme le volet, et on supprime son contenu.
	$("#infos_"+id).slideToggle("slow", function(){
		$("#map_canvas"+id).empty();
	}); 
	
	return false;
}


/**
*
*	Fonction de chargement des cartes
*	dans les pages de résultat.
*
*	Adr = adresse complète (Pays facultatif)
*	map_id = numéro d'incrément de la carte sur la page.
*******************************************************/

function initialize(adr, map_id) {
		
	//On géocode l'adresse.
	geocoder = new google.maps.Geocoder();
	geocoder.geocode( { 'address': adr}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var myOptions = {
				zoom: 13,
				center: results[0].geometry.location
			}
			
			//On affiche la carte dans le div map_canvasXX
			map[map_id] = new google.maps.Map(document.getElementById('map_canvas'+map_id), myOptions);
			
			//On ajoute le marker sur la carte
			var marker = new google.maps.Marker({
			      position: results[0].geometry.location,
			      map: map[map_id]
			  });

    
		} else {
			//Si google n'arrive pas à trouver la carte, on affiche un message d'erreur.
			$("#map_canvas"+map_id ).html("<psan class='google_error'>L'adresse n'a pu être trouvée. Nous vous invitons à faire une recherche sur <a href='https://maps.google.fr/' title='Google Map' target='_blank'>Google Map</a></span>");
		}
		
	});
}


/**********************************
*
*	Fonction d'appel Ajax de
*	la fonction PHP qui incrémente
*	le compte des vues d'une fiche
*
***********************************/
function fiche_count_up(id_fiche)
{

	
	//console.log("Je met à jour les statistiques");
	
	$.ajax({
		type: "POST",
		url: "/annuaire/fiche_count_up/"+id_fiche
	})
	
	//Je récup!re l'ID de la Fiche
	
	//J'envois ma requête Ajax
}

/**********************************
*
*	Fonction d'appel Ajax de
*	la fonction PHP qui permet d'ajouter
*	une évaluation pour une fiche
*
***********************************/
function fiche_eval(id_fiche, note)
{

	
	//console.log("Je met à jour les statistiques");
	
	$.ajax({
		type: "POST",
		url: "/annuaire/fiche_eval/"+id_fiche+"/"+note
	})
	
	//Je récup!re l'ID de la Fiche
	
	//J'envois ma requête Ajax
}








/**************************
*
*	Moteur de recherche de 
*	conseillers à la sécurité
*
***************************/
$(function(){
	$("#search_rection a").each(function(){
		this.click(function(){
			console.log("ok");
		});
	});
});