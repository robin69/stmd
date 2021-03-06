/**
*
*	Après le chargement de la page et du CSS
*
*
*
*************/



$(document).ready(function()
{

    //On détecte le navigateur
    var sBrowser, sUsrAg = navigator.userAgent;

    if(sUsrAg.indexOf("Chrome") > -1) {
        sBrowser = "chrome";
    } else if (sUsrAg.indexOf("Safari") > -1) {
        sBrowser = "safari";
    } else if (sUsrAg.indexOf("Opera") > -1) {
        sBrowser = "opera";
    } else if (sUsrAg.indexOf("Firefox") > -1) {
        sBrowser = "firefox";
    } else if (sUsrAg.indexOf("MSIE") > -1) {
        sBrowser = "ie";
    }

    $('.BookmarkMe').click(function (e) {
        var bTitle = document.title, bUrl = window.location.href;
        if (sBrowser == "firefox" || sBrowser == "opera") { // Mozilla Firefox or Opera
            if (window.sidebar.addPanel) {
                e.preventDefault();
                window.sidebar.addPanel(bTitle, bUrl, "");
            }
            else {
                $('.BookmarkMe').attr("href", bUrl);
                $('.BookmarkMe').attr("title", bTitle);
                $('.BookmarkMe').attr("rel", "sidebar");
            }
        } else if (sBrowser =="ie") { // IE Favorite
            e.preventDefault();
            window.external.AddFavorite(bUrl, bTitle);
        } else { // webkit - safari/chrome
            e.preventDefault();
            alert('Appuyez sur ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Cmd' : 'CTRL') + ' + D pour ajouter ce site aux favoris.');
        }
    });


	//On détecte la présence de la class
	if($(".scroll-down-to").length)
	{
		$("html, body").animate({
			scrollTop:	$(".ui-state-error").offset().top
		}, 750,  "easeInOutExpo");

	}

	 $("*[id^='infos_']").hide(); // Tous les volets d'information sont fermés par défaut à l'ouverture de la page.
	 
	  // On instancie les variable pour les cartes Google
	 var geocoder;
	 var map = new Array();
	 
	 
	 // Dans le formulaire de recherhce d'un CAS, lorsqu'on clic sur un li contenant un label, on coche la case
	 $(".counsel li label").click(function(){
	 	$(this).parent().toggleClass('check_list');
	 });


	 
	//Si route est sélectionné
	 $(".counsel input[type='checkbox']").change(function(){
		 send_cas_request();
	 });

    $(".route").click(function(){
        $(this).toggleClass("route_checked");

    });
    $(".chemin").click(function(){
        $(this).toggleClass("chemin_checked");

    });
    $(".voie").click(function(){
        $(this).toggleClass("voie_checked");

    });


	 
	 $("#send_search_cas").click(function(){
		 $("#search_cas_form").submit();
		 return false; 
	 });

    /***********
     *
     * Apparition de la barre de nav pour le formulaire
     * de recherche de CAS
     */
    $("#bar_cas_recherche").show('scale');


    /******
     * FORMULAIRE D'INSCRIPTION > Classement catégorie
     *******/

    // On innialise les variables du formulaire
    if($("#classement_form").length)
    {
        classement_form_init();
    }


    //Lorsqu'une checkbox du formulaire de sélection de classement est cochée, on affiche les sous-catégories
    $("#classement_form ul li input.has_sscats").change(function(){
        //Pour la liste de sous menu trouvé
        $(this).closest("li").find("ul").each(function(a){
            $(this).slideToggle();
        });
    });

    //On n'affiche les blocs de catégories que des types principaux sélectionnés
    $("input[class='type']").change(function(){
        //on récupère l'id de la case cocher
        box_name = "#cat_sel_" + $(this).attr("id");
        $(box_name).slideToggle();
    });


	 $("input[type='checkbox']:not(:checked)").click(function(){
		 $(this).find("ul").css("display","block");
	 });




    /**
     * Fonction qui permet de counter les caractères d'un textarea et de renvoyer le nombre
     * de caractères restants.
     * La page contenant le textarea doit contenir 2 autres champs identifiés avec les ID
     * suivants :
     * max_char => le nombre de caractères maximum autorisés
     * left_char => le nombre de caractères restants.
     */
    $("textarea.countchar").keyup(function(){
        countChar(this);
    });
});


function countChar(field)
{
    var max_char = $("#max_char").html();
    var text_length = $(field).val().length;
    left_char = max_char - text_length;

    //On renseignes le nombres de caractères restants
    if(left_char >= 0){
        $("#left_char").html(left_char);
    }else{
        $("#left_char").html('<span class="alert-warning">' + left_char + '</span>');

    }



}

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
			mdtransp:	mdtransp
		},
		type: "GET",
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
function fiche_count_up(id_fiche) {



    $.ajax({
        type: "POST",
        url: "/annuaire/fiche_count_up/" + id_fiche
    })
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

	

	$.ajax({
		type: "POST",
		url: "/annuaire/fiche_eval/"+id_fiche+"/"+note
	})

}


/**************************
 * Lorsqu'on charge la page contenant
 * le formulaire de classement dans
 * des catégories, on affiche les valeurs qui sont
 * déjà cochées. Exemple, si l'utilisateur a coché
 * le type Transporteur MD, on affiche les catégories
 * de ce formulaire.
 * Idem avec les <ul> des sous-catégories.
 */
function classement_form_init()
{

    //Si un type est coché on affiche les cats correspondantes
    $("input[class='type']:checked").each(function(){
        box_name = "#cat_sel_" + $(this).attr("id");
        $(box_name).slideToggle();

        //Si une cat est cochée et qu'elle contient une sous-cat, on affiche la sous-cat
        $("input:checked").each(function(){
            $(this).closest("li").find("ul").each(function(a){
             console.log(a);
             $(this).slideToggle();
             });
        });
    });

}

function scrollDownTo(anchor_id)
{
    if($("#" + anchor_id).length)
    {
        $("html, body").animate({
            scrollTop:	$("#" + anchor_id).offset().top
        }, 750,  "easeInOutExpo");

    }
}


/**************************
*
*	Moteur de recherche de 
*	conseillers à la sécurité
*
***************************/
$(function(){
	$("#search_section a").each(function(){
		this.click(function(){
			console.log("ok");
		});
	});


    /***********
     * Appel Ajax pour la demande d'un forfait
     * L'url doit être comme suit
     */
    $(".forfait_select").click(function(){


        var url_to_call = $(this).attr("href");
        $.ajax({
            type: "GET",
            url: url_to_call,
            data: {},
            success: function(){
                alert("Votre demande de changement de forfait a été prise en compte. Vous allez être contacté dans les meilleurs délais.");
                location.reload(true);
                return true;
            },
            error: function(){
                console.log("erreur ajax");
                return false;
            }

        });
    });
});
