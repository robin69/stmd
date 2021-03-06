<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>TERMINATOR: Settings</title>

<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>
<link rel="stylesheet" href="css/fancybox.css" type="text/css"/>
<link rel="stylesheet" href="css/jquery.wysiwyg.css" type="text/css"/>
<link rel="stylesheet" href="css/jquery.ui.css" type="text/css"/>
<link rel="stylesheet" href="css/visualize.css" type="text/css"/>
<link rel="stylesheet" href="css/visualize-light.css" type="text/css"/>
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->	
</head>

<body>

<div class="pagetop">
	<div class="head pagesize"> <!-- *** head layout *** -->
		<div class="head_top">
			<div class="topbuts">
				<ul class="clear">
				<li><a href="#">View Site</a></li>
				<li><a href="#">Messages</a></li>
				<li><a href="#">Settings</a></li>
				<li><a href="login.html" class="red">Logout</a></li>
				</ul>
				
				<div class="user clear">
					<img src="images/avatar.jpg" class="avatar" alt="" />
					<span class="user-detail">
						<span class="name">Welcome Arnold</span>
						<span class="text">Logged as admin</span>
						<span class="text">You have <a href="#">5 messages</a></span>
					</span>
				</div>
			</div>
			
			<div class="logo clear">
			<a href="index.html" title="View dashboard">
				<img src="images/logo_earth.png" alt="" class="picture" />
				<span class="textlogo">
					<span class="title">TERMINATOR</span>
					<span class="text">admin template</span>
				</span>
			</a>
			</div>
		</div>
		
		<div class="menu">
			<ul class="clear">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="articles.html">Articles</a></li>
			<li>
				<a href="styles.html">Styles</a>
				<ul>
					<li><a href="boxes.html">Content Boxes</a></li>
					<li><a href="columns.html">Columns</a>
						<ul>
							<li><a href="columns1.html">Boxes in Columns</a></li>
							<li><a href="columns2.html">Columns in Boxes</a></li>
						</ul>
					</li>
					<li><a href="forms.html">Forms</a></li>
				</ul>				
			</li>
			<li><a href="tables.html">Tables</a></li>
			<li><a href="charts.html">Charts</a></li>
			<li><a href="gallery.html">Image Gallery</a></li>
			<li class="active"><a href="settings.html">Settings</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="breadcrumb">
	<div class="bread-links pagesize">
		<ul class="clear">
		<li class="first">You are here:</li>
		<li><a href="#">Settings</a></li>
		</ul>
	</div>
</div>
	
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
				
			<h1>Settings &amp; Classes <a href="#modal-label" class="label modal-link">MODAL</a></h1>
			<p>Nam posuere, felis sed feugiat viverra, quam felis dapibus eros, vitae pulvinar nisl quam ut eros. Curabitur eget fringilla mi. Vivamus sed justo sit amet elit malesuada bibendum. Pellentesque consectetur blandit nisl, a eleifend arcu adipiscing eu. In et neque nec urna mollis fermentum gravida at turpis. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
					
			<!-- MODAL WINDOW -->
			<div id="modal-label" class="modal-window modal-800">
				<div class="notification note-attention">
					<a href="#" class="close" title="Close notification"><span>close</span></a>
					<span class="icon"></span>
					<p><strong>Attention:</strong> More about settings of modal windows is described in Dashboard - Open Modal icon.</p>
				</div>
				<h2>Modal Window : size 800</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique, lorem id hendrerit sodales, nisl felis sollicitudin lacus, et facilisis felis quam at quam. Nullam vel nunc at sapien sagittis feugiat. Vestibulum est eros, condimentum ac sodales vel, iaculis vitae neque.</p>
				<p>Nam nisl odio, scelerisque non venenatis quis, venenatis a leo. Cras non vehicula justo. Nam vel arcu sem. Suspendisse quam enim, dictum quis lacinia sed, lobortis eget libero. Suspendisse potenti. Suspendisse et ante vitae turpis vestibulum fermentum nec nec elit. Suspendisse ullamcorper lacus in arcu mollis fringilla porta mi placerat. Ut at elit non diam tristique scelerisque. </p>
			</div>
			
			<div class="content-box bt-space20">
			<div class="box-body">
				<div class="box-wrap clear">
							
					<h2>Table of Basic Classes</h2>
							
					<table class="basic" cellspacing="0">
					<thead>
					<tr>
						<th class="quad">class</th>
						<th>description</th>
						<th>usable tags</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td class="code nowrap"><p><strong class="value">clear</strong></p></td>
						<td><p>Use for clearing of float left/right elements inside of element with this class.</p></td>
						<td class="nowrap"><p>any block tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">clean-margin</strong></p>
							<p><strong class="value">clean-padding</strong></p></td>
						<td>
							<p>It will set margin of element to 0px.</p>
							<p>It will set padding of element to 0px. It will preserve left padding in UL.standard and OL.standard tags.</p></td>
						<td class="nowrap">
							<p>any tag</p>
							<p>any tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">hidden</strong></p>
							<p><strong class="value">display</strong></p></td>
						<td>
							<p>It will set display: none style. It is used in sliding boxes for example.</p>
							<p>It will set display: block style. It can be used for displaying of hidden elements.</p></td>
						<td class="nowrap">
							<p>any tag</p>
							<p>any tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">half</strong></p>
							<p><strong class="value">trio</strong></p>
							<p><strong class="value">quad</strong></p>
							<p><strong class="value">full</strong></p></td>
						<td>
							<p>It will set width to 48%. It can be used for creating half column with approximate dimension.</p>
							<p>It will set width to 31%. It can be used for creating 1/3 column with approximate dimension.</p>
							<p>It will set width to 23%. It can be used for creating 1/4 column with approximate dimension.</p>
							<p>It will set width to 100%. It can be used for creating full width column. It is recomended to use for elements with no left/right paddings or left/right borders.</p></td>
						<td class="nowrap">
							<p>any block tag</p>
							<p>any block tag</p>
							<p>any block tag</p>
							<p>any block tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">size-80</strong></p>
							<p><strong class="value">size-120</strong></p>
							<p><strong class="value">size-150</strong></p>
							<p><strong class="value">size-170</strong></p>
							<p><strong class="value">size-200</strong></p></td>
						<td>
							<p>It will set width: 80px on the element. The real size of the element may be increased by left/right paddings.</p>
							<p>It will set width: 120px on the element. The real size of the element may be increased by left/right paddings.</p>
							<p>It will set width: 150px on the element. The real size of the element may be increased by left/right paddings.</p>
							<p>It will set width: 170px on the element. The real size of the element may be increased by left/right paddings.</p>
							<p>It will set width: 200px on the element. The real size of the element may be increased by left/right paddings.</p></td>
						<td class="nowrap">
							<p>any block tag</p>
							<p>any block tag</p>
							<p>any block tag</p>
							<p>any block tag</p>
							<p>any block tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">fl</strong></p>
							<p><strong class="value">fr</strong></p>
							<p><strong class="value">fl-space</strong></p>
							<p><strong class="value">fr-space</strong></p>
							<p><strong class="value">fl-space2</strong></p>
							<p><strong class="value">fr-space2</strong></p>
							</td>
						<td>
							<p>It will set float: left to an element.</p>
							<p>It will set float: right to an element.</p>
							<p>It will set float: left and margin-right: 5px to an element.</p>
							<p>It will set float: right and margin-left: 5px to an element.</p>
							<p>It will set float: left and margin-right: 10px to an element.</p>
							<p>It will set float: right and margin-left: 10px to an element.</p></td>
						<td class="nowrap">
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">bt-space0</strong></p>
							<p><strong class="value">bt-space5</strong></p>
							<p><strong class="value">bt-space10</strong></p>
							<p><strong class="value">bt-space15</strong></p>
							<p><strong class="value">bt-space20</strong></p>
							<p><strong class="value">bt-space30</strong></p>
							<p><strong class="value">bt-space40</strong></p></td>
						<td>
							<p>It will set margin-bottom: 0px to an element.</p>
							<p>It will set margin-bottom: 5px to an element.</p>
							<p>It will set margin-bottom: 10px to an element.</p>
							<p>It will set margin-bottom: 15px to an element.</p>
							<p>It will set margin-bottom: 20px to an element.</p>
							<p>It will set margin-bottom: 30px to an element.</p>
							<p>It will set margin-bottom: 40px to an element.</p></td>
						<td class="nowrap">
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p>
							<p>any tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap"><p><strong class="value">ln-normal</strong></p></td>
						<td><p>It will set line-height: normal.</p></td>
						<td class="nowrap"><p>any block tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">left</strong></p>
							<p><strong class="value">center</strong></p>
							<p><strong class="value">right</strong></p>
							<p><strong class="value">block</strong></p></td>
						<td>
							<p>It will set text-align: left.</p>
							<p>It will set text-align: center and margin: auto.</p>
							<p>It will set text-align: right.</p>
							<p>It will set text-align: justify and display: block on IMG tag .</p></td>
						<td class="nowrap">
							<p>any block tag</p>
							<p>any block tag</p>
							<p>any block tag</p>
							<p>any block tag / img tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">button</strong></p>
							<p><strong class="value">button green</strong></p>
							<p><strong class="value">button red</strong></p>
							<p><strong class="value">button blue</strong></p>
							<p><strong class="value">button grey</strong></p>
							</td>
						<td>
							<p>It will set button style to an element. The color of the button is set by next class.</p>
							<p>Green button</p>
							<p>Red button</p>
							<p>Blue button</p>
							<p>Grey button</p></td>
						<td class="nowrap"><p>a, span, input </p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">rule</strong></p>
							<p><strong class="value">rule2</strong></p></td>
						<td>
							<p>It will create single embossed line.</p>
							<p>It will create double embossed line.</p></td>
						<td class="nowrap">
							<p>div</p>
							<p>div</p></td>
					</tr>
					<tr>
						<td class="code nowrap"><p><strong class="value">cr-help</strong></p></td>
						<td><p>It will set cursor: help style to an element.</p></td>
						<td class="nowrap"><p>any tag</p></td>
					</tr>
					<tr>
						<td class="code nowrap">
							<p><strong class="value">mark</strong></p>
							<p><strong class="value">mark_blue</strong></p>
							</td>
						<td>
							<p>It will create white box with grey border.</p>
							<p>It will create blue box with grey border.</p></td>
						<td class="nowrap">
							<p>div</p>
							<p>div</p></td>
					</tr>
					</tbody>
					</table>
					
					<div class="notification note-attention">
						<a href="#" class="close" title="Close notification">close</a>
						<p><strong>Other setting:</strong> See the Styles pages for other class settings, too. Modal window sizes are described in Dashboard page - Open Modal icon. Next classes and settings are described in the relevant pages, too (like forms, tables, galleries, etc.).</p>
					</div>
							
				</div> <!-- end of box-wrap -->
			</div> <!-- end of box-body -->
			</div> <!-- end of content-box -->
			
		</div><!-- end of page -->
	</div>
</div>

<div class="footer">
	<div class="pagesize clear">
		<p class="bt-space15"><span class="copy"><strong>© 2010 Copyright by <a href="http://www.ait.sk">Affinity Information Technology.</a></strong></span> Powered by <a href="#">TERMINATOR ADMIN.</a></p>
		<img src="images/logo_earth_bw50.png" alt="" class="block center" />
	</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/jquery.idtabs.js"></script>
<script type="text/javascript" src="js/jquery.datatables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.js"></script>
<script type="text/javascript" src="js/jquery.ui.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>

<script type="text/javascript" src="js/excanvas.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/Zurich_Condensed_Lt_Bd.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12958851-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
