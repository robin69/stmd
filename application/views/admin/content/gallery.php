<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>TERMINATOR: Image Gallery</title>

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
			<li class="active"><a href="gallery.html">Image Gallery</a></li>
			<li><a href="settings.html">Settings</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="breadcrumb">
	<div class="bread-links pagesize">
		<ul class="clear">
		<li class="first">You are here:</li>
		<li><a href="#">Image Gallery</a></li>
		</ul>
	</div>
</div>
	
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1>Image Gallery <a href="#modal-label" class="label modal-link">INFO</a></h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			
			<!-- MODAL WINDOW -->
			<div id="modal-label" class="modal-window">
				<div class="notification note-attention">
					<a href="#" class="close" title="Close notification"><span>close</span></a>
					<span class="icon"></span>
					<p><strong>Attention:</strong> More about settings of modal windows is described in Dashboard - Open Modal icon.</p>
				</div>
				<h2>Modal Window : size undefined (auto)</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique, lorem id hendrerit sodales, nisl felis sollicitudin lacus, et facilisis felis quam at quam. Nullam vel nunc at sapien sagittis feugiat. Vestibulum est eros, condimentum ac sodales vel, iaculis vitae neque.</p>
				<p>Nam nisl odio, scelerisque non venenatis quis, venenatis a leo. Cras non vehicula justo. Nam vel arcu sem. Suspendisse quam enim, dictum quis lacinia sed, lobortis eget libero. Suspendisse potenti. Suspendisse et ante vitae turpis vestibulum fermentum nec nec elit. Suspendisse ullamcorper lacus in arcu mollis fringilla porta mi placerat. Ut at elit non diam tristique scelerisque. </p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique, lorem id hendrerit sodales, nisl felis sollicitudin lacus, et facilisis felis quam at quam. Nullam vel nunc at sapien sagittis feugiat. Vestibulum est eros, condimentum ac sodales vel, iaculis vitae neque.</p>
			</div>
			
			<div class="columns clear">
				<div class="col2-3">
					<div class="content-box">
					<div class="box-body">
						<div class="box-wrap clear">
							
							<!-- LARGE GALLERY -->
							<h2>Large Image Gallery</h2>
							
							<div class="gallery gal-large">
								<ul class="clear">								
								<li><a href="images/tmp/picture1.jpg" rel="group1" title="Title of Picture 1"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture1.jpg</span></span></li>
								<li><a href="images/tmp/picture2.jpg" rel="group1" title="Title of Picture 2"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture2 very long filename.jpg</span></span></li>
								<li><a href="images/tmp/picture3.jpg" rel="group1" title="Title of Picture 3"><img src="images/tmp/thumbnail3.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture3.jpg</span></span></li>
								<li><a href="images/tmp/picture4.jpg" rel="group1" title="Title of Picture 4"><img src="images/tmp/thumbnail4.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture4.jpg</span></span></li>
								<li><a href="images/tmp/picture5.jpg" rel="group1" title="Title of Picture 5"><img src="images/tmp/thumbnail5.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture5.jpg</span></span></li>
								<li><a href="images/tmp/picture6.jpg" rel="group1" title="Title of Picture 6"><img src="images/tmp/thumbnail6.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture6.jpg</span></span></li>
								<li><a href="images/tmp/picture7.jpg" rel="group1" title="Title of Picture 7"><img src="images/tmp/thumbnail7.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture7.jpg</span></span></li>
								<li><a href="images/tmp/picture8.jpg" rel="group1" title="Title of Picture 8"><img src="images/tmp/thumbnail8.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture8.jpg</span></span></li>
								
								<li><a href="images/tmp/picture1.jpg" rel="group1" title="Title of Picture 9"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture9.jpg</span></span></li>
								<li><a href="images/tmp/picture2.jpg" rel="group1" title="Title of Picture 10"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture10 very long filename.jpg</span></span></li>
								<li><a href="images/tmp/picture3.jpg" rel="group1" title="Title of Picture 11"><img src="images/tmp/thumbnail3.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture11.jpg</span></span></li>
								<li><a href="images/tmp/picture4.jpg" rel="group1" title="Title of Picture 12"><img src="images/tmp/thumbnail4.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture12.jpg</span></span></li>
								<li><a href="images/tmp/picture5.jpg" rel="group1" title="Title of Picture 13"><img src="images/tmp/thumbnail5.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture13.jpg</span></span></li>
								<li><a href="images/tmp/picture6.jpg" rel="group1" title="Title of Picture 14"><img src="images/tmp/thumbnail6.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture14.jpg</span></span></li>
								<li><a href="images/tmp/picture7.jpg" rel="group1" title="Title of Picture 15"><img src="images/tmp/thumbnail7.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture15.jpg</span></span></li>
								<li><a href="images/tmp/picture8.jpg" rel="group1" title="Title of Picture 16"><img src="images/tmp/thumbnail8.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture16.jpg</span></span></li>
								
								<li><a href="images/tmp/picture1.jpg" rel="group1" title="Title of Picture 17"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture17.jpg</span></span></li>
								<li><a href="images/tmp/picture2.jpg" rel="group1" title="Title of Picture 18"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb" /></a><span class="title"><span class="wrap">picture18 very long filename.jpg</span></span></li>
								</ul>
							</div>
							
							<div class="gal-footer clear">
				
								<div class="pager fl">
									<span class="nav">
										<a href="#" class="first" title="first page"><span>First</span></a>
										<a href="#" class="previous" title="previous page"><span>Previous</span></a>
									</span>
									<span class="pages">
										<a href="#" title="page 1"><span>1</span></a>
										<a href="#" title="page 2" class="active"><span>2</span></a>
										<a href="#" title="page 3"><span>3</span></a>
										<a href="#" title="page 4"><span>4</span></a>
									</span>
									<span class="nav">
										<a href="#" class="next" title="next page"><span>Next</span></a>
										<a href="#" class="last" title="last page"><span>Last</span></a>
									</span>
								</div>
								
								<a href="#" class="button fr">Add New Picture</a>

							</div>
							
							<div class="rule"></div>
							
							<p><strong>Gallery description:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>							
							
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
				</div>
				<div class="col1-3 lastcol">
					<div class="content-box">
					<div class="box-body">
						<div class="box-wrap clear">
						
							<!-- SMALL GALLERY -->
							<h2>Small Image Gallery</h2>
							
							<div class="gallery gal-small">
								<ul class="clear">								
								<li><a href="images/tmp/picture1.jpg" rel="group2" title="Title of Picture 1"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture2.jpg" rel="group2" title="Title of Picture 2"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture3.jpg" rel="group2" title="Title of Picture 3"><img src="images/tmp/thumbnail3.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture4.jpg" rel="group2" title="Title of Picture 4"><img src="images/tmp/thumbnail4.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture5.jpg" rel="group2" title="Title of Picture 5"><img src="images/tmp/thumbnail5.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture6.jpg" rel="group2" title="Title of Picture 6"><img src="images/tmp/thumbnail6.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture7.jpg" rel="group2" title="Title of Picture 7"><img src="images/tmp/thumbnail7.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture8.jpg" rel="group2" title="Title of Picture 8"><img src="images/tmp/thumbnail8.jpg" alt="" class="thumb" /></a></li>
								
								<li><a href="images/tmp/picture1.jpg" rel="group2" title="Title of Picture 9"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture2.jpg" rel="group2" title="Title of Picture 10"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture3.jpg" rel="group2" title="Title of Picture 11"><img src="images/tmp/thumbnail3.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture4.jpg" rel="group2" title="Title of Picture 12"><img src="images/tmp/thumbnail4.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture5.jpg" rel="group2" title="Title of Picture 13"><img src="images/tmp/thumbnail5.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture6.jpg" rel="group2" title="Title of Picture 14"><img src="images/tmp/thumbnail6.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture7.jpg" rel="group2" title="Title of Picture 15"><img src="images/tmp/thumbnail7.jpg" alt="" class="thumb" /></a></li>
								<li><a href="images/tmp/picture8.jpg" rel="group2" title="Title of Picture 16"><img src="images/tmp/thumbnail8.jpg" alt="" class="thumb" /></a></li>
								</ul>
							</div>
							
							<p class="block"><small><strong>Gallery description:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p>
							
							
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
				</div>
			</div>

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
