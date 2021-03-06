<header class="header_home">
    <div class="header_top">
        <center>
            <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url("assets"); ?>/img/logo_home.png" alt=" " /></a>
                <div class="slogan">
                    <p> Le carnet d’adresses des expéditeurs et des transporteurs<br />
                        de marchandises dangereuses </p>
                </div>
            </div>
        </center>
        <div class="social">
            <a href="<?php echo $this->config->item("gplus"); ?>" class="gplus" title="GMJ Phoenix sur Google+" target="_blank"></a>
            <a href="<?php echo $this->config->item("twitter"); ?>" class="twitter" target="_blank"></a>
            <a href="<?php echo $this->config->item("facebook"); ?>" class="facebook" target="_blank"></a>
            <a href="<?php echo $this->config->item("linkedin"); ?>" class="linkedin" target="_blank"></a>
            <a href="<?php echo $this->config->item("viadeo"); ?>" class="viadeo" target="_blank"></a>
            <a href="<?php echo base_url("login"); ?>" class="connexion">connexion</a>
            <a href="#" class="copy"></a>
            <a href="#" class="favoris bookmark BookmarkMe" ></a> </div>
    </div>
</header>

<div class="clear"></div>
<div class="main">
    <div class="home">
        <center>
            <h1>Moteur de recherche et annuaire</h1>

            <p class="top_description">
                Numéro 1 Français pour le transport de marchandises dangereuses
            </p>
        </center>
        <div class="home_search">
            <form id="search_form" method="get" action="<?php echo base_url("recherche"); ?>" >
                <label for="search_field"></label>
                <input type="search" name="string" id="string" placeholder="Tapez votre recherche. Ex: éditions"/><button id="search"></button>
            </form>
        </div>
        <div class="container">
            <div class="container_left">
                <center>


                    <a href="<?php echo base_url("annuaire"); ?>/transporteurs-md-adr" class="transporteur_md">Vous êtes transporteurs de MD ?
                        <span>Trouvez le prestataire qu’il vous faut.</span></a>

                </center>

            </div>
            <div class="container_middle">
                <center>

                    <a href="<?php echo base_url("annuaire"); ?>/expediteurs-md-adr-iata-imdg/" class="expediteur_md">Vous êtes expéditeurs de MD?
                        <span>Trouvez des prestataires pour vous aider à gérer, stocker et transporter vos marchandises dangereuses.</span></a>

                </center>

            </div>
            <div class="container_right">
                <center>

                    <a href="<?php echo base_url(); ?>rechercher-un-conseiller-a-la-securite-adr/" class="conseiller_md">Vous recherchez un conseiller à la sécurité?
                        <span>Trouvez un conseiller ADR externe proche de chez vous.</span></a>

                </center>

            </div>
        </div>
        <div class="clear"></div>
        <p class="home_info">Depuis 2007, www.solutionstmd.fr référence les principaux prestataires pour aider les entreprises à expédier et transporter des marchandises dangereuses. Nous référençons des entreprises ayant un service à destination des expéditeurs et transpor- teurs de marchandises classées à risque : des fabricants d’emballage, des éditeurs de fiche de données de sécurité, des trans- porteurs, des logisticiens, des formateurs, des emballeurs, etc..</p>
    </div>

</div>
<?php if($rss) : ?>
<div class="home_carousel">
    <div class="home_carousel_cont">
        <div id="ca-container" class="ca-container">
            <div class="ca-wrapper"data-slick='{"slidesToShow": 3, "slidesToScroll": 1}'>
                <?php
                    $i=1;
                    foreach($rss as $article):?>

                        <div class="ca-item ca-item-<?php echo $i;?>">
                            <div class="ca-item-main">
                                <h3><a href="<?php echo $article["link"]; ?>" target="_blank" ><?php echo $article["title"]; ?></a></h3>
                                <?php
                                    //On supprime les liens de la chaine description
                                    $article["description"] = preg_replace('#<p>The post (.*)</p>#siU','',$article["description"]);
                                    echo $article["description"] ; ?>
                                <p><a href="<?php echo $article["link"]; ?>" class="" >Lire la suite >></a> </p>

                            </div>
                        </div>

                <?php  $i++; endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="clear"></div>