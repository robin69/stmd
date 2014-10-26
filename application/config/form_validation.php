<?php
    //On récupère le nombre maxi de caractère pour l'utiliser come règle de validation
    $max_allowed_carracters = $this->config->item('nbr_carr_max_excerpt');
$config = array(
					"fiche_infos_update"=>	array(
										array(
											"field"	=>	"nom_contact",
											"label"	=>	"Nom",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"prenom_contact",
											"label"	=>	"Prénom",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"email_contact",
											"label"	=>	"Email",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"tel_contact",
											"label"	=>	"Téléphone",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"raison_sociale",
											"label"	=>	"Raison sociale",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"adr1",
											"label"	=>	"Adresse 1",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"ville",
											"label"	=>	"Ville",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"cp",
											"label"	=>	"CP",
											"rules"	=>	"trim|required"
										),
								),
					"fiche_infos_add"=>		array(
										array(
											"field"	=>	"tel_contact",
											"label"	=>	"Téléphone",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"email_contact",
											"label"	=>	"Email",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"prenom_contact",
											"label"	=>	"Prénom",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"nom_contact",
											"label"	=>	"Nom",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"raison_sociale",
											"label"	=>	"Raison sociale",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"ville",
											"label"	=>	"Ville",
											"rules"	=>	"trim|required"
										),
										array(
											"field"	=>	"cp",
											"label"	=>	"CP",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"adr1",
											"label"	=>	"Adresse 1",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"adr2",
											"label"	=>	"Adresse 2",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"email_societe",
											"label"	=>	"Email public",
											"rules"	=>	"trim|valid_email"
										),
										array(
											"field"	=>	"tel_societe",
											"label"	=>	"Téléphone public",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"fax",
											"label"	=>	"Fax",
											"rules"	=>	"trim"
										),
										array(
											"field"	=>	"site",
											"label"	=>	"Site Internet",
											"rules"	=>	"trim"
										),
								),
					"change_pass"	=>	array(
											array(
												"field"	=>	"userpass",
												"label"	=>	"Mot de passe",
												"rules"	=>	"required|trim|matches[passconf]|md5"
												),
											array(
												"field"	=>	"passconf",
												"label"	=>	"Mot de passe",
												"rules"	=>	"required|trim|md5"
											)
										),//END OF CHANGE PASS
										
					"utilisateur_form"=> array(
											array(
												"field"	=>	"email",
												"label"	=>	"Email",
												"rules"	=>	"required|trim|valid_email"
											),
											array(
												"field"	=>	"nom",
												"label"	=>	"Nom",
												"rules"	=>	"trim"
											),
											array(
												"field"	=>	"prenom",
												"label"	=>	"Prénom",
												"rules"	=>	"trim"
											),
											array(
												"field"	=>	"tel",
												"label"	=>	"Téléphone",
												"rules"	=>	"trim"
											),
											array(
												"field"	=>	"userpass",
												"label"	=>	"Mot de passe",
												"rules"	=>	"matches[passconf]|md5"
												),
											array(
												"field"	=>	"passconf",
												"label"	=>	"de confirmation",
												"rules"	=>	"md5"
											)
										),//END OF UTILISATEUR_FORM
					"login"=>array(
											array(
												"field"	=>	"email",
												"label"	=>	"Email",
												"rules"	=>	"required|trim"
											),
											array(
												"field"	=>	"userpass",
												"label"	=>	"Mot de passe",
												"rules"	=>	"required|trim|md5"
											)
										),//END OF LOGIN
					"cat_form"=>array(
											array(
												"field"	=>	"public_name",
												"label"	=>	"Nom",
												"rules"	=>	"required|trim"
											)						
										),//END OF CAT FORM
					"cat_form_modif"=>array(
											array(
												"field"	=>	"public_name",
												"label"	=>	"Nom",
												"rules"	=>	"required|trim"
											)						
										),//END OF CAT FORM
					"front_sign_up_form"=>array(
											array(
												"field"	=>	"nom",
												"label"	=>	"Nom",
												"rules"	=>	"required|trim"
											),
											array(
												"field"	=>	"prenom",
												"label"	=>	"Prénom",
												"rules"	=>	"required|trim"
											),
											array(
												"field"	=>	"email",
												"label"	=>	"Email",
												"rules"	=>	"required|trim|valid_email|is_unique[user.email]"
											),
											array(
												"field"	=>	"tel",
												"label"	=>	"Tél.",
												"rules"	=>	"trim"
											),
											array(
												"field"	=>	"userpass",
												"label"	=>	"Mot de passe",
												"rules"	=>	"required|trim|matches[passconf]|md5"
											),
											array(
												"field"	=>	"passconf",
												"label"	=>	"Confirmation de mot de passe",
												"rules"	=>	"required"
											),
											array(
												"field"	=>	"accept_cgu_first",
												"label"	=>	"Acceptation des CGU",
												"rules"	=>	"required"
											)
												
										),//END OF CAT FORM
					"contenu_form"=>array(
											array(
												"field"	=>	"title",
												"label"	=>	"Title",
												"rules"	=>	"required|trim"
											),
											array(
												"field"	=>	"guid",
												"label"	=>	"Adresse",
												"rules"	=>	"trim"
											),
											array(
												"field"	=>	"meta_title",
												"label"	=>	"Meta_title",
												"rules"	=>	"trim"
											),
											array(
												"field"	=>	"meta_desc",
												"label"	=>	"Meta_desc",
												"rules"	=>	"trim"
											),
											array(
												"field"	=>	"contenu",
												"label"	=>	"Texte principal",
												"rules"	=>	"trim"
											)
											
										),
					"form_fiche_contact" => array(
                                            array(
                                                "field"	=>	"nom_contact",
                                                "label"	=>	"Nom Contact",
                                                "rules"	=>	"required|trim"
                                            ),
                                            array(
                                                "field"	=>	"prenom_contact",
                                                "label"	=>	"Prénom Contact",
                                                "rules"	=>	"required|trim"
                                            ),
                                            array(
                                                "field"	=>	"email_contact",
                                                "label"	=>	"Email Contact",
                                                "rules"	=>	"required|trim|valid_email"
                                            ),
                                            array(
                                                "field"	=>	"tel_contact",
                                                "label"	=>	"Tél. Contact",
                                                "rules"	=>	"required|trim"
                                            )
                    ),
                    "form_fiche_societe" => array(
                                            array(
                                                "field"	=>	"raison_sociale",
                                                "label"	=>	"Raison sociale",
                                                "rules"	=>	"required|trim"
                                            ),
                                            array(
                                                "field"	=>	"adr1",
                                                "label"	=>	"Adresse 1",
                                                "rules"	=>	"required|trim"
                                            ),
                                            array(
                                                "field"	=>	"adr2",
                                                "label"	=>	"Adresse 2",
                                                "rules"	=>	"trim"
                                            ),
                                            array(
                                                "field"	=>	"ville",
                                                "label"	=>	"Ville",
                                                "rules"	=>	"required|trim"
                                            ),
                                            array(
                                                "field"	=>	"cp",
                                                "label"	=>	"CP",
                                                "rules"	=>	"required|trim"
                                            ),
                                            array(
                                                "field"	=>	"email_societe",
                                                "label"	=>	"Email société",
                                                "rules"	=>	"required|trim|valid_email"
                                            ),
                                            array(
                                                "field"	=>	"tel_societe",
                                                "label"	=>	"Téléphone société",
                                                "rules"	=>	"required|trim"
                                            ),
                                            array(
                                                "field"	=>	"fax",
                                                "label"	=>	"Fax",
                                                "rules"	=>	"trim"
                                            ),
                                            array(
                                                "field"	=>	"site",
                                                "label"	=>	"Site internet  ",
                                                "rules"	=>	"trim"
                                            )
                    ),
                    "form_fiche_description"    => array(
                                            array(
                                                "field" =>  "description",
                                                "label" =>  "description",
                                                "rules" =>  "trim|max_length[".$max_allowed_carracters."]"
                                            )

                    ),
                    "form_fiche_reseaux"    => array(
                                            array(
                                                "field" =>  "facebook",
                                                "label" =>  "Facebook",
                                                "rules" =>  "trim"
                                            ),
                                            array(
                                                "field" =>  "twitter",
                                                "label" =>  "Twitter",
                                                "rules" =>  "trim"
                                            ),
                                            array(
                                                "field" =>  "googleplus",
                                                "label" =>  "Google +",
                                                "rules" =>  "trim"
                                            ),
                                            array(
                                                "field" =>  "viadeo",
                                                "label" =>  "Viadeo",
                                                "rules" =>  "trim"
                                            ),
                                            array(
                                                "field" =>  "linkedin",
                                                "label" =>  "LinkedIN",
                                                "rules" =>  "trim"
                                            )

                    )//END OF CAT FORM
			);
	