/**
 * Created by Rumeau on 07/12/14.
 */

/** *******************
 *  ON LOAD
 ****************** */
$(function(){

    //On vérifie au chargement
    if($('#conseiller_securite').is(':checked'))
    {
        $("#cat_sel_conseiller_securite").show();
    }

    if($('#expediteurs_md').is(':checked'))
    {
        $("#cat_sel_expediteurs_md").show();
    }

    if($('#transporteurs_md').is(':checked'))
    {
        $("#cat_sel_transporteurs_md").show();
    }

    /******************************************************
     *
     * Gestion du cochage de type et de l'apparaition des
     * box de catégories correspondantes
     * dans le formulaire de classement admin
     *
     *****************************************************/
    $("#conseiller_securite").change(function(){
        if($(this).attr("checked")){
            $("#cat_sel_conseiller_securite").show();
        }else{
            //Si des case de catégorie sont cochées, elles sont décochées. (sinon on conserve en base les cats pour cette fiche et ça ne va pas).
            $("#cat_sel_conseiller_securite input").each(function(){
                $(this).removeAttr("checked");
            });
            $("#cat_sel_conseiller_securite").hide();
        }

    });
    $("#expediteurs_md").change(function(){
        if($(this).attr("checked")){
            $("#cat_sel_expediteurs_md").show();
        }else{
            //Si des case de catégorie sont cochées, elles sont décochées.
            $("#cat_sel_expediteurs_md input").each(function(){
                $(this).removeAttr("checked");
            });
            $("#cat_sel_expediteurs_md").hide();
        }

    });
    $("#transporteurs_md").change(function(){
        if($(this).attr("checked")){
            $("#cat_sel_transporteurs_md").show();
        }else{
            //Si des case de catégorie sont cochées, elles sont décochées.
            $("#cat_sel_transporteurs_md input").each(function(){
                $(this).removeAttr("checked");
            });

            $("#cat_sel_transporteurs_md").hide();
        }
    });
    //On lance les événements change sur les champs de type
    $("#conseiller_securite").trigger("change");
    $("#expediteurs_md").trigger("change");
    $("#transporteurs_md").trigger("change");



    /*************************************************************************
     * POPIN DATE DE RÈGLEMENT D'UNE FICHE
     *
     * Lorsqu'on clic sur règlement on affiche une popin qui
     * avant tout va vérifier si une date de règlement existe déjà
     * pour cette fiche.
     * Si oui, on propose de la modifier.
     * Si non, on propose de la saisir.
     * La date saisie peut être présente, passée ou future. Pas de contrainte.
    ********************************************************************************/
    var popin_dt_reglement,dt_reglement_new,
        id_fiche = $("#reglement").data("id_fiche"),
        dt_reglement_originale = $("#reglement").data("dt_reglement");

    popin_dt_reglement = $("#dt_reglement_form").dialog({
        autoOpen: false,
        height:150,
        width:350,
        modal: true,
        buttons:{
            "Modifier la date de règlement" : update_dt_regl,
            "Annuler": function(){
                popin_dt_reglement.dialog("close");
            }
        }
    });

    form = popin_dt_reglement.find("form").on("submit", function(event){
        event.preventDefault();
        update_dt_regl();
    });

    function update_dt_regl()
    {
        //Mise à jour en ajax de la base.
        dt_reglement_new = $("#dt_reglement_field").val();
        $.post("/admin/inscrits/set_date_reglement/",{id_fiche:id_fiche,dt_reglement:dt_reglement_new}).done(function(data) {
            if (data.ok) {
                location.reload();
            }
        })

    };


    $( "#reglement" ).button().on( "click", function(event) {
        event.preventDefault();
        popin_dt_reglement.dialog( "open" );
    });


});
