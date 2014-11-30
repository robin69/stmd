<!DOCTYPE html>
<html>
<head>
	<title>stmd</title>
	<meta name="description" content="">
	<meta charset="utf-8">


	<link href="<?php echo base_url("assets"); ?>/css/style_carousel.css" rel="stylesheet" />
	<link href="<?php echo base_url("assets"); ?>/js/jquery-ui-1.11.1/jquery-ui.theme.css" rel="stylesheet" />
    <link href="<?php echo base_url("assets"); ?>/css/styles.css" rel="stylesheet" />

    <!-- REALPERSON -->
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/jquery.realperson.css">
    <script src="<?php echo base_url("assets"); ?>/js/query.plugin.js"></script>
    <script src="<?php echo base_url("assets"); ?>/js/jquery.realperson.js"></script>
    <script>
        $(function() {
            $('#realperson').realperson();
        });
    </script>
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>
<body id="<?php echo $body_id; ?>">
