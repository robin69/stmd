<div class="clear"></div>
	<div class="main search_cas">

	    <h1>Sélectionnez, validez et trouvez !</h1>
	    <p class="top_description"><?php echo $description; ?></p>

	  <div class="container center">
	    <div class="container_left">

	        <span class="region"></span>
	        <h2>Régions d’intervention</h2>
	        <p>Choisissez la région dans laquelle<br>
	          le conseiller à la sécurité devra intervenir.<br>
	          Un conseiller à la sécurité peut intervenir<br>
	          dans plusieurs régions).</p>
	        <span class="fleche"></span>

	    </div>
	    <div class="container_middle center">

	        <span class="classe"></span>
	        <h2>Classes de marchandises</h2>
	        <p>La classe de marchandises dangereuses<br>
	          correspond au domaine de spécialisation<br>
	          du conseiller à la sécurité.<br>
	          Choisissez au moins une classe.</p>
	        <span class="fleche"></span>

	    </div>
	    <div class="container_right center">

	        <span class="mode"></span>
	        <h2>Modes de transport</h2>
	        <p>Par la route, le train ou le bateau.<br>
	          Choisissez le mode que vous souhaitez<br>
	          emprunter pour le transport<br>
	          de vos marchandises dangereuses.</p>
            <span class="fleche"></span>

	    </div>
	  </div><!-- CONTAINER -->
	  
	  <div class="clear"></div>
		  <form action="<?php echo base_url("annuaire/votre_recherche_conseiller_a_la_securite"); ?>" method="post" id="search_cas_form">
			  <div class="counsel">
			    
			    <div id="region_selector">
					  <h3 id="region_intervention">1- Régions d’intervention</h3>
					  <div>
					  <br />
					  		<ul>
						  		<li><label for="rp">Région parisienne</label>
						  		<input type="checkbox" id="rp" name="zone[]" value="1"/><br /></li>
						  		
						  		<li><label for="ne">Nord-Est</label>
						  		<input type="checkbox" id="ne" name="zone[]" value="3" /><br /></li>
						  		
						  		<li><label for="se">Sud-Est</label>
						  		<input type="checkbox" id="se" name="zone[]" value="4" /><br /></li>
						  		
						  		<li><label for="so">Sud-Ouest</label>
						  		<input type="checkbox" id="so" name="zone[]" value="5" /><br /></li>
						  		
						  		<li><label for="o">Ouest</label>
						  		<input type="checkbox" id="o" name="zone[]" value="2" /><br /></li>
					  		</ul>	
					  		<p><img src="<?php echo base_url("assets/img"); ?>/map.png" alt=""/></p>
					  </div>
					   <!--<span class="arrow-big"></span>-->


			    </div>
				<div id="counsel_class_selection">
                    <h3 id="classe_marchandises">2- Classes de marchandises</h3>
                    <div class="counsel_block">
                        <ul>
                            <!-- 				    <li class="check_list">Classe 1 : les explosifs</li> -->
                            <li class=""><label for="class_1">Classe 1 : les explosifs</label>
                                <input type="checkbox" name="classe[]" id="class_1" value="1" />
                            <li class="" ><label for="class_2">Classe 2 : les gaz</label>
                                <input type="checkbox" name="classe[]" id="class_2" value="2" />
                            </li>
                            <li class=""><label for="class_3">Classe 3 : les liquides inflammables</label>
                                <input type="checkbox" name="classe[]" id="class_3" value="3" />
                            </li>
                            <li class=""><label for="class_4_1">Classe 4.1 : les solides inflammables</label>
                                <input type="checkbox" name="classe[]" id="class_4_1" value="4.1" />
                            </li>
                            <li class=""><label for="class_4_2">Classe 4.2 : les matières spontanément inflammables</label>
                                <input type="checkbox" name="classe[]" id="class_4_2" value="4.2" />
                            </li>
                            <li class=""><label for="class_4_3">Classe 4.3 : les matières qui dégagent des gaz inflammables au contact de l’eau</label>
                                <input type="checkbox" name="classe[]" id="class_4_3" value="4.3" />
                            </li>
                        </ul>
                    </div>

                    <div class="counsel_block">
                        <ul>
                            <!-- 				    <li class="check_list">Classe 1 : les explosifs</li> -->
                            <li class=""><label for="class_5_1">Classe 5.1 : les matières comburantes</label>
                                <input type="checkbox" name="classe[]" id="class_5_1" value="5.1" />
                            </li>
                            <li class=""><label for="class_5_2">Classe 5.2 : les peroxydes organiques</label>
                                <input type="checkbox" name="classe[]" id="class_5_2" value="5.2" />
                            </li>
                            <li class=""><label for="class_6_1">Classe 6.1 : les matières toxiques</label>
                                <input type="checkbox" name="classe[]" id="class_6_1" value="6.1" />
                            </li>
                            <li class=""><label for="class_6_2">Classe 6.2 : les matières infectieuses</label>
                                <input type="checkbox" name="classe[]" id="class_6_2" value="6.2" />
         git c                   </li>
                            <li class=""><label for="class_7">Classe 7 : les matières radioactives</label>
                                <input type="checkbox" name="classe[]" id="class_7" value="7" />
                            </li>
                            <li class=""><label for="class_8">Classe 8 : les matières corrosives</label>
                                <input type="checkbox" name="classe[]" id="class_8" value="8" />
                            </li>
                            <li class=""><label for="class_9">Classe 9 : les matières et objets dangereux divers</label>
                                <input type="checkbox" name="classe[]" id="class_9" value="9" />
                            </li>
                        </ul>

                    </div>
                    <!--<span class="arrow-big"></span>-->
				</div>

			    
			    <div class="clear"></div>

                  <h3 id="mode_transport">3- Modes de transport</h3>

				<div class="block_1-3">
                        <div class="left">
                            <label for="route" class="route" > Route <span>Réglementation ADR</span></label>
                            <input type="checkbox" name="mdtransp[]" id="route" value="route"/><br />
                        </div>
                    <div class="left">
                        <label for="fer" class="chemin" > Chemin de fer <span>Réglementation RID</span></label>
                        <input type="checkbox" name="mdtransp[]" id="fer" value="fer"/><br />
                    </div>

                    <div class="left">
                        <label for="navigation" class="voie" > Voies navigables <span>Réglementation ADN</span></label>
                        <input type="checkbox" name="mdtransp[]" id="navigation" value="navigation"/><br />
				    </div>


			    </div>
                  <div class="block_2-3">


                      <a href="rch-conseiller.html#"><img src="<?php echo base_url("assets/img"); ?>/ancs_logo.png"/></a>

                  </div>
			    <div class="clear"></div>
			    <!--<span class="arrow-big"></span>-->

				    <h1 id="search_result_nbr">Sélectionnez vos critères de recherche ci-dessus</h1>
				    <a class="new_search" href="rch-conseiller.html#">Effectuer une nouvelle recherche</a>

			  </div><!-- DIV COUNSEL -->
		  </form>

        <!-- MENU RECHERCHE CAS -->
        <div id="bar_cas_recherche" style="display: none;">
            <div class="">
                <h4>VOTRE RECHERCHE</h4>
            </div>
            <div class="">
                <a href="#region_intervention" onclick="scrollDownTo('region_intervention');"><span class="region"></span>Régions d'intervention</a>
                <a href="#classe_marchandises" onclick="scrollDownTo('classe_marchandises');"><span class="classe"></span>Classes des marchandises</a>
                <a href="#mode_transport" onclick="scrollDownTo('mode_transport');"><span class="mode"></span>Modes de transport</a>

            </div>


        </div>
        <!-- EOF MENU RECHERCHE CAS -->
	  </div><!-- DIV MAIN -->
			
			

			