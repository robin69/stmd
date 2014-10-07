<?php

	$session = $this->session->all_userdata();
	//Affichage du bouton de déconnexion
	if($this->session->userdata("logged_in"))
	{
		$logout_link = "<li><a href='".site_url("forms/logout")."' class='logout' >Déconnexion</a></li>";
	}else{
		$logout_link = "";
	}

?><!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url("/"); ?>">ImportExport.fr</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Annuaire des prestataires <span class="caret"></span></a>
            	<!-- sous-menu -->
            	<ul class="dropdown-menu" role="menu">
	                <li><a href="#">Catégorie 1</a></li>
	                <li><a href="#">Catégorie 1</a></li>
	                <li><a href="#">Catégorie 1</a></li>
	                <li class="divider"></li>
	                <li class="dropdown-header">Nav header</li>
	                <li><a href="#">Separated link</a></li>
	                <li><a href="#">One more separated link</a></li>
	            </ul>
	            <!-- END OF sous-menu -->
            </li>
            	
            	
            <li><a href="">Formation</a></li>
            <li><a href="">Conseil</a></li>
            <li><a href="">Edition</a></li>
            <li><a href="">Glossaire</a></li>
            <li><a href="">Fiches Techniques</a></li>
            <li><a href="">Agenda</a></li>
            <li><a href="<?php echo site_url("inscription"); ?>">Inscription</a></li>
            <?php echo $logout_link; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
