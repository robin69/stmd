<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<meta http-equiv="cache-control" content="no-cache"/>
<title>TERMINATOR: Login Page</title>

<link rel="stylesheet" href="<?php echo base_url("assets/admin"); ?>/css/reset.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url("assets/admin"); ?>/css/screen.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url("assets/admin"); ?>/css/fancybox.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url("assets/admin"); ?>/css/jquery.wysiwyg.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url("assets/admin"); ?>/css/jquery.ui.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url("assets/admin"); ?>/css/visualize.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url("assets/admin"); ?>/css/visualize-light.css" type="text/css"/>
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->	
</head>

<body class="login">

<div class="login-box">
<div class="login-border">
<div class="login-style">
	<div class="login-header">
		<div class="logo clear">
			<img src="images/logo_earth_bw.png" alt="" class="picture" />
			<span class="textlogo">
				<span class="title">TERMINATOR LOGIN</span>
				<span class="text">admin template</span>
			</span>
		</div>
	</div>
	<?php
	/** OUVERTURE DU FORMULAIRE **/
	$args = array(
		"method" => "POST"
	);
	echo validation_errors();
	echo form_open("admin/login/", $args);
	echo form_hidden('form_admin', TRUE);
	?>	
		<div class="login-inside">
			<div class="login-data">
				<div class="row clear">
					<?php
					$args = 0;
					if(set_value("email") == "")
					{
						$returned_value_user = "robin.rumeau@gmail.com";
					}else{
						$returned_value_user = set_value("email");
					}
					
					
					
					$args = array(
						"id" 	=> 	"email",
						"value"	=>	$returned_value_user,
						"size"	=>	"25",
						"class"	=>	"text",
						"name"	=>	"email"
					);?>
					<?php 
					echo form_label("Identifant : ", "email");
					echo form_input($args);
					echo form_error('email');	
						
					?>
				</div>
 				<div class="row clear">
 					
 					<?php 
 					$args = 0;
 					$returned_value_password = set_value("userpass");
 					
 					$args = array(
	 					"id" 	=> 	"userpass",
						"value"	=>	$returned_value_password,
						"size"	=>	"25",
						"class"	=>	"text",
						"name"	=>	"userpass"
 					);
 					
 					echo form_label("Pass : ", "userpass");
 					echo form_password($args);
 					echo form_error('userpass');
 					?>
				</div>
				<?php
					$args = 0;
					$args = array(
						"class"	=>	"button",
						"value"	=>	"Identification"
					);
					echo form_submit($args);
				?>
			</div>
		</div>
		<div class="login-footer clear">
			<span class="remember">
				<input type="checkbox" class="checkbox" checked="checked" id="remember" /> <label for="remember">Remember</label>
			</span>
			<a href="#" class="button green fr-space">Back to Page</a>
		</div>
	</form>

</div>
</div>
</div>

<div class="login-links">
	<p><strong>&copy; 2014 Copyright par <a href="http://www.ait.sk">Robin Rumeau STUDIO HTTP.</a></strong> Tous droits réservés.</p> 
</div>

<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.visualize.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.idtabs.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.datatables.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.jeditable.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/jquery.validate.js"></script>

<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/excanvas.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/cufon.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/Zurich_Condensed_Lt_Bd.js"></script>
<script type="text/javascript" src="<?php base_utl("assets/admin"); ?>/js/script.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
