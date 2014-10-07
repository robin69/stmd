<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>TERMINATOR: Styles</title>

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
			<li class="active">
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
			<li><a href="settings.html">Settings</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="breadcrumb">
	<div class="bread-links pagesize">
		<ul class="clear">
		<li class="first">You are here:</li>
		<li><a href="#">Styles</a></li>
		</ul>
	</div>
</div>
	
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
				
			<div class="columns clear">
				
				<div class="col2-3">
					<h1>H1: Heading, Text Styles and the Other <a href="#modal-label" class="label modal-link">LABEL</a></h1>
					<h2>H2: Lorem ipsum dolor sit amet </h2>
					<h3>H3: Lorem ipsum dolor sit amet </h3>
					<h4>H4: Lorem ipsum dolor sit amet </h4>
					<h5>H5: Lorem ipsum dolor sit amet </h5>
					<h6>H6: Lorem ipsum dolor sit amet </h6>
					<br /><br />
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
				</div>
				
				<div class="col1-3 lastcol">
					<div class="notification note-info">
						<a href="#" class="close" title="Close notification">close</a>
						<p><strong>Information:</strong></p>
						<p><small>Look for the other styles and elements of this template.</small></p>
					</div>
					
					<div class="mark">			
						<ul class="standard space">
						<li><strong> <a href="boxes.html">Content Boxes:</a></strong> <small>On this page you can see more Content Box styles, variations and usages.</small></li>
						<li><strong><a href="columns.html">Columns</a> | <a href="columns1.html">Cols in Boxes</a> | <a href="columns2.html">Boxes in Cols:</a></strong> <small>are the pages where the column's codes and its combinations are described.</small></li>
						<li><strong><a href="forms.html">Forms:</a></strong> <small>Form styles and validation examples are designed here.</small></li>
						</ul>
					</div>

				</div>
			</div>
						
			<div class="rule2"></div>
			
			<h2>Text align</h2>
			<div class="columns clear">
				<div class="col1-4">
					<div class="code">&lt;p&gt; or &lt;p <span>class="left"</span>&gt;</div>
					<p class="left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
				<div class="col1-4">
					<div class="code">&lt;p <span>class="center"</span>&gt;</div>
					<p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
				<div class="col1-4">
					<div class="code">&lt;p <span>class="right"</span>&gt;</div>
					<p class="right">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
				<div class="col1-4 lastcol">
					<div class="code">&lt;p <span>class="block"</span>&gt;</div>
					<p class="block">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</div>
			
			<div class="rule"></div>
			
			<h2>Text styles</h2>
			<div class="columns clear">
				<div class="col1-4">
					<div class="code">&lt;p&gt;</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
				<div class="col1-4">
					<div class="code">&lt;strong&gt;</div>
					<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</strong></p>
				</div>
				<div class="col1-4">
					<div class="code">&lt;small&gt;</div>
					<p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</small></p>
				</div>
				<div class="col1-4 lastcol">
					<div class="code">&lt;a&gt;</div>
					<p><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</a></p>
				</div>
			</div>
			<div class="columns clear">
				<div class="col1-4">
					<div class="code">&lt;em&gt;</div>
					<p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</em></p>
				</div>
				<div class="col1-4">
					<div class="code">&lt;code&gt;</div>
					<p><code>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</code></p>
				</div>
				<div class="col1-4">
					<div class="code">&lt;del&gt;</div>
					<p><del>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</del></p>
				</div>
				<div class="col1-4 lastcol">
					<div class="code">&lt;q&gt;&lt;cite&gt;&lt;/cite&gt;&lt;/q&gt;</div>
					<p><q>Lorem ipsum dolor sit amet, consectetur ... <cite>Lorem ipsum dolor</cite></q></p>
				</div>
			</div>
			
			<div class="rule"></div>
			
			<h2>List Styles</h2>
			<div class="columns clear">
				<div class="col1-3">
					<div class="code">&lt;ul <span>class="standard"</span>&gt;&lt;li&gt;&lt;ul&gt;&lt;li&gt;</div>
					<ul class="standard">
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet
						<ul>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet
							<ul>
							<li>Lorem ipsum dolor sit amet</li>
							<li>Lorem ipsum dolor sit amet</li>
							</ul>
						</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet</li>
						</ul>
					</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					</ul>
				</div>
				<div class="col1-3">
					<div class="code">&lt;ol <span>class="standard"</span>&gt;&lt;li&gt;&lt;ol&gt;&lt;li&gt;</div>
					<ol class="standard">
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet
						<ol>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet
							<ol>
							<li>Lorem ipsum dolor sit amet</li>
							<li>Lorem ipsum dolor sit amet</li>
							</ol>
						</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit amet</li>
						</ol>
					</li>
					<li>Lorem ipsum dolor sit amet</li>
					<li>Lorem ipsum dolor sit amet</li>
					</ol>
				</div>
				<div class="col1-3 lastcol">
					<div class="code">&lt;dl <span>class="standard"</span>&gt;&lt;dt&gt;&lt;dd&gt;</div>
					<dl class="standard">
						<dt>Lorem ipsum</dt>
						<dd>Lorem ipsum dolor sit amet.</dd>
						<dt>Lorem ipsum</dt>
						<dd>Lorem ipsum dolor sit amet.</dd>
						<dt>Lorem ipsum</dt>
						<dd>Lorem ipsum dolor sit amet.</dd>
						<dt>Lorem ipsum</dt>
						<dd>Lorem ipsum dolor sit amet.</dd>
						<dt>Lorem ipsum</dt>
						<dd>Lorem ipsum dolor sit amet.</dd>
					</dl>
				</div>
			</div>
			
			<div class="rule"></div>
			
			<h2>Notifications</h2>
			<div class="notification note-error">
				<a href="#" class="close" title="Close notification">close</a>
				<p><strong>Error notification:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
			<div class="notification note-success">
				<a href="#" class="close" title="Close notification">close</a>
				<p><strong>Success notification:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
			<div class="notification note-info">
				<a href="#" class="close" title="Close notification">close</a>
				<p><strong>Information notification:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			</div>
			<div class="notification note-attention">
				<a href="#" class="close" title="Close notification">close</a>
				<p><strong>Attention notification:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
