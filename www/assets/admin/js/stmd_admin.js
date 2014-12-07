/**
 * Created by Rumeau on 07/12/14.
 */

/** *******************
 *  ON LOAD
 ****************** */
$(document).ready(function(){

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


    //Lorsqu'on décoche un type, il faut décocher toutes les catégories du type.

});
