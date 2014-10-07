<div class="clear"></div>
	<div class="main search_cas">
	  <center>
	    <h1>Sélectionnez, validez et trouvez !</h1>
	    <p class="top_description"> En France, l’intervention d’un conseiller à la sécurité pour le transport de marchandises dangereuses est une obligation légale. Si vous vous aprêtez à faire transporter des matières dangereuses, vous devez sélectionner un conseiller à la sécurité qui exerce pour la classe correspondant à la matière dangereuse transportée ET au mode de transport qui sera utilisé : transport de marchandises par route (ADR), transport de marchandises dangereuses par chemin de fer (RID), transport de marchandises dangereuses par voies navigables (ADN). </p>
	  </center>
	  <div class="container">
	    <div class="container_left">
	      <center>
	        <span class="region"></span>
	        <h2>Région d’intervention</h2>
	        <p>Choisissez la région dans laquelle<br>
	          le conseiller à la sécurité devra intervenir.<br>
	          Un conseiller à la sécurité peut intervenir<br>
	          dans plusieurs régions).</p>
	        <span class="fleche"></span>
	      </center>
	    </div>
	    <div class="container_middle">
	      <center>
	        <span class="classe"></span>
	        <h2>Classe de matières</h2>
	        <p>La classe de matières dangereuses<br>
	          correspond au domaine de spécialisation<br>
	          du conseiller à la sécurité.<br>
	          Choisissez au moins une classe.</p>
	        <span class="fleche"></span>
	      </center>
	    </div>
	    <div class="container_right">
	      <center>
	        <span class="mode"></span>
	        <h2>Mode de transport</h2>
	        <p>Par la route, le train ou le bateau.<br>
	          Choisissez le mode que vous souhaitez<br>
	          emprunter pour le transport<br>
	          de vos matières dangereuses.</p>
	        <span class="fleche"></span>
	      </center>
	    </div>
	  </div><!-- CONTAINER -->
	  
	  <div class="clear"></div>
		  <form action="" method="post" id="search_cas_form">
			  <div class="counsel">
			    
			    <div id="region_selector">
					<center>
					  <h2>1- Région d’intervention</h2>
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
					   <span class="arrow-big"></span>
					  <h2>2- Classe de matière</h2>
					</center>
			    </div>
				
				<div class="counsel_class_selection">
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
				
				<div class="counsel_class_selection">
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
					    </li>
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
			    
			    <div class="clear"></div>
			    <span class="arrow-big"></span>
			    
			    <div class="counsel_left">
			    	<center>
						<h2>3- Mode de transport</h2>
						<a href="rch-conseiller.html#"><img src="<?php echo base_url("assets/img"); ?>/ancs_logo.png"/></a>
					</center>
			    </div>
				<div class="counsel_right">
				    <center>
				    	<label for="route" class="route" > Route <span>Réglementation ADR</span></label>
				    	<input type="checkbox" name="mdtransp[]" id="route" value="route"/><br />
				    	
				    	<label for="fer" class="chemin" > Chemin de fer <span>Réglementation RID</span></label>
				    	<input type="checkbox" name="mdtransp[]" id="fer" value="fer"/><br />
				    	
				    	<label for="navigation" class="voie" > Voies navigables <span>Réglementation ADN</span></label>
				    	<input type="checkbox" name="mdtransp[]" id="navigation" value="navigation"/><br />
				    </center>
			    </div>
			    <div class="clear"></div>
			    <span class="arrow-big"></span>
			    <center>
				    <h1 id="search_result_nbr">Sélectionnez vos critères de recherche ci-dessus</h1>
				    <a class="new_search" href="rch-conseiller.html#">Effectuer une nouvelle recherche</a>
			    </center>
			  </div><!-- DIV COUNSEL -->
		  </form>
	  </div><!-- DIV MAIL -->
			
			
			
			