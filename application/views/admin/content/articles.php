<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>TERMINATOR: Articles</title>

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
			<li class="active"><a href="articles.html">Articles</a></li>
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
			<li><a href="settings.html">Settings</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="breadcrumb">
	<div class="bread-links pagesize">
		<ul class="clear">
		<li class="first">You are here:</li>
		<li><a href="#">Articles</a></li>
		</ul>
	</div>
</div>
	
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1>Manage Articles <a href="#modal-label" class="label modal-link">HELP</a></h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>    

			<!-- MODAL WINDOW -->
			<div id="modal-label" class="modal-window modal-600">
				<div class="notification note-attention">
					<a href="#" class="close" title="Close notification"><span>close</span></a>
					<span class="icon"></span>
					<p><strong>Attention:</strong> More about settings of modal windows is described in Dashboard - Open Modal icon.</p>
				</div>
				<h2>Modal Window : size 600</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique, lorem id hendrerit sodales, nisl felis sollicitudin lacus, et facilisis felis quam at quam. Nullam vel nunc at sapien sagittis feugiat. Vestibulum est eros, condimentum ac sodales vel, iaculis vitae neque.</p>
				<p>Nam nisl odio, scelerisque non venenatis quis, venenatis a leo. Cras non vehicula justo. Nam vel arcu sem. Suspendisse quam enim, dictum quis lacinia sed, lobortis eget libero. Suspendisse potenti. Suspendisse et ante vitae turpis vestibulum fermentum nec nec elit. Suspendisse ullamcorper lacus in arcu mollis fringilla porta mi placerat. Ut at elit non diam tristique scelerisque. </p>
			</div>

			<div class="columns clear">
				<div class="col2-3">
				
					<!-- CONTENT BOXES -->
					<div class="content-box">
					<div class="box-body">
						<div class="box-header clear">
							<h2>Articles Preview</h2>
						</div><!-- box-header -->
						<div class="box-wrap clear">
					
							<table class="style1">
							<thead>
							<tr>
								<th>Thumbs</th>
								<th>Description</th>
								<th>Status</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<tr class="box-slide-head">
								<td><a href="#" title="preview"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb size48 clickable" /></a></td>
								<td><h4>Lorem ipsum dolor</h4><p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p></td>
								<td class="center vcenter"><img src="images/ico_active_16.png" class="icon16 block center" title="active" alt="" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td colspan="4" class="box-slide-body ln-normal">
									<h5>Article Details</h5>
									<div class="clear">
										<div class="trio fl">
											<div class="mark bt-space5">
											<ul class="bt-space10">	
											<li class="clear bt-space5"><img src="images/ball_blue_16.png" class="fl-space" alt="" /><span class="fl">Sales:</span>		<span class="fr value">325</span></li>
											<li class="clear bt-space5"><img src="images/ball_green_16.png" class="fl-space" alt="" /><span class="fl">Price:</span>	<span class="fr value">25$</span></li>
											<li class="clear bt-space0"><img src="images/ball_red_16.png" class="fl-space" alt="" /><span class="fl">Total:</span>		<span class="fr value">8.125$</span></li>
											</ul>
											</div>
										</div>
										<div class="fr">
											<ul>
											<li class="bt-space5"><a href="#" class="button blue size-80">Edit Category</a></li>
											<li class="bt-space5"><a href="#" class="button green size-80">Edit Article</a></li>
											<li class="bt-space5"><a href="#" class="button red size-80">Delete Article</a></li>
											</ul>
										</div>
										<div class="article-detail-body">
											<p><strong>Category:</strong> <span class="value">Female / Fashion article</span></p>
											<p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</small></p>
											<p><small><a href="#" class="fr-space2">6 comments</a> <strong>Published:</strong> by <a href="#">Arnold</a> | 20/03/2010</small></p>
										</div>
									</div>
								</td>
							</tr>
							<tr class="box-slide-head">
								<td><a href="#" title="preview"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb size48 clickable" /></a></td>
								<td><h4>Sed in porta lectus</h4><p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p></td>
								<td class="center vcenter"><img src="images/ico_inactive_16.png" class="icon16 block center" title="inactive" alt="" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td colspan="4" class="box-slide-body hidden ln-normal">
									<h5>Article Details</h5>
									<div class="clear">
										<div class="trio fl">
											<div class="mark bt-space5">
											<ul class="bt-space10">	
											<li class="clear bt-space5"><img src="images/ball_blue_16.png" class="fl-space" alt="" /><span class="fl">Sales:</span>		<span class="fr value">154</span></li>
											<li class="clear bt-space5"><img src="images/ball_green_16.png" class="fl-space" alt="" /><span class="fl">Price:</span>	<span class="fr value">22$</span></li>
											<li class="clear bt-space0"><img src="images/ball_red_16.png" class="fl-space" alt="" /><span class="fl">Total:</span>		<span class="fr value">3.388$</span></li>
											</ul>
											</div>
										</div>
										<div class="fr">
											<ul>
											<li class="bt-space5"><a href="#" class="button blue size-80">Edit Category</a></li>
											<li class="bt-space5"><a href="#" class="button green size-80">Edit Article</a></li>
											<li class="bt-space5"><a href="#" class="button red size-80">Delete Article</a></li>
											</ul>
										</div>
										<div class="article-detail-body">
											<p><strong>Category:</strong> <span class="value">Male / Tools article</span></p>
											<p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</small></p>
											<p><small><a href="#" class="fr-space2">75 comments</a> <strong>Published:</strong> by <a href="#">Arnold</a> | 30/12/2009</small></p>
										</div>
									</div>
								</td>
							</tr>
							<tr class="box-slide-head">
								<td><a href="#" title="preview"><img src="images/tmp/thumbnail3.jpg" alt="" class="thumb size48 clickable" /></a></td>
								<td><h4>Quis nostrud</h4><p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p></td>
								<td class="center vcenter"><img src="images/ico_active_16.png" class="icon16 block center" title="active" alt="" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td colspan="4" class="box-slide-body hidden ln-normal">
									<h5>Article Details</h5>
									<div class="clear">
										<div class="trio fl">
											<div class="mark bt-space5">
											<ul class="bt-space10">	
											<li class="clear bt-space5"><img src="images/ball_blue_16.png" class="fl-space" alt="" /><span class="fl">Sales:</span>		<span class="fr value">1.023</span></li>
											<li class="clear bt-space5"><img src="images/ball_green_16.png" class="fl-space" alt="" /><span class="fl">Price:</span>	<span class="fr value">10$</span></li>
											<li class="clear bt-space0"><img src="images/ball_red_16.png" class="fl-space" alt="" /><span class="fl">Total:</span>		<span class="fr value">10.230$</span></li>
											</ul>
											</div>
										</div>
										<div class="fr">
											<ul>
											<li class="bt-space5"><a href="#" class="button blue size-80">Edit Category</a></li>
											<li class="bt-space5"><a href="#" class="button green size-80">Edit Article</a></li>
											<li class="bt-space5"><a href="#" class="button red size-80">Delete Article</a></li>
											</ul>
										</div>
										<div class="article-detail-body">
											<p><strong>Category:</strong> <span class="value">Male / Fashion article</span></p>
											<p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</small></p>
											<p><small><a href="#" class="fr-space2">123 comments</a> <strong>Published:</strong> by <a href="#">Arnold</a> | 17/10/2009</small></p>
										</div>
									</div>
								</td>
							</tr>
							<tr class="box-slide-head">
								<td><a href="#" title="preview"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb size48 clickable" /></a></td>
								<td><h4>Lorem ipsum dolor</h4><p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p></td>
								<td class="center vcenter"><img src="images/ico_active_16.png" class="icon16 block center" title="active" alt="" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td colspan="4" class="box-slide-body hidden ln-normal">
									<h5>Article Details</h5>
									<div class="clear">
										<div class="trio fl">
											<div class="mark bt-space5">
											<ul class="bt-space10">	
											<li class="clear bt-space5"><img src="images/ball_blue_16.png" class="fl-space" alt="" /><span class="fl">Sales:</span>		<span class="fr value">325</span></li>
											<li class="clear bt-space5"><img src="images/ball_green_16.png" class="fl-space" alt="" /><span class="fl">Price:</span>	<span class="fr value">25$</span></li>
											<li class="clear bt-space0"><img src="images/ball_red_16.png" class="fl-space" alt="" /><span class="fl">Total:</span>		<span class="fr value">8.125$</span></li>
											</ul>
											</div>
										</div>
										<div class="fr">
											<ul>
											<li class="bt-space5"><a href="#" class="button blue size-80">Edit Category</a></li>
											<li class="bt-space5"><a href="#" class="button green size-80">Edit Article</a></li>
											<li class="bt-space5"><a href="#" class="button red size-80">Delete Article</a></li>
											</ul>
										</div>
										<div class="article-detail-body">
											<p><strong>Category:</strong> <span class="value">Female / Fashion article</span></p>
											<p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</small></p>
											<p><small><a href="#" class="fr-space2">6 comments</a> <strong>Published:</strong> by <a href="#">Arnold</a> | 20/03/2010</small></p>
										</div>
									</div>
								</td>
							</tr>
							<tr class="box-slide-head">
								<td><a href="#" title="preview"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb size48 clickable" /></a></td>
								<td><h4>Sed in porta lectus</h4><p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p></td>
								<td class="center vcenter"><img src="images/ico_inactive_16.png" class="icon16 block center" title="inactive" alt="" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td colspan="4" class="box-slide-body hidden ln-normal">
									<h5>Article Details</h5>
									<div class="clear">
										<div class="trio fl">
											<div class="mark bt-space5">
											<ul class="bt-space10">	
											<li class="clear bt-space5"><img src="images/ball_blue_16.png" class="fl-space" alt="" /><span class="fl">Sales:</span>		<span class="fr value">154</span></li>
											<li class="clear bt-space5"><img src="images/ball_green_16.png" class="fl-space" alt="" /><span class="fl">Price:</span>	<span class="fr value">22$</span></li>
											<li class="clear bt-space0"><img src="images/ball_red_16.png" class="fl-space" alt="" /><span class="fl">Total:</span>		<span class="fr value">3.388$</span></li>
											</ul>
											</div>
										</div>
										<div class="fr">
											<ul>
											<li class="bt-space5"><a href="#" class="button blue size-80">Edit Category</a></li>
											<li class="bt-space5"><a href="#" class="button green size-80">Edit Article</a></li>
											<li class="bt-space5"><a href="#" class="button red size-80">Delete Article</a></li>
											</ul>
										</div>
										<div class="article-detail-body">
											<p><strong>Category:</strong> <span class="value">Male / Tools article</span></p>
											<p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</small></p>
											<p><small><a href="#" class="fr-space2">75 comments</a> <strong>Published:</strong> by <a href="#">Arnold</a> | 30/12/2009</small></p>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="notification note-attention bt-space0">
										<a href="#" class="close" title="Close notification">close</a>
										<p><strong>Attention notification:</strong></p>
										<p><small>The Datatable plugin will not work properly in the table with sliding TD because the hidden TD is placed in the next TR. You must use your own custom pager if you need. Thanks for your understanding.</small></p>
									</div>
								</td>
							</tr>
							</tbody>
							</table>
							
							<div class="tab-footer clear">
								<div class="pager fr">
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
							</div>
					
						</div><!-- /.box-wrap -->														
					</div><!-- /.box-body -->
					</div><!-- /.content-box -->
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
				</div>
				<div class="col1-3 lastcol">
				
					<!-- CONTENT BOXES -->
					<div class="content-box bt-space10">
					<div class="box-body">
						<div class="box-header box-slide-head">
							<span class="slide-but">open/close</span>
							<h2>Manage Categories</h2>
						</div><!-- box-header -->
						<div class="box-wrap clear box-slide-body">
            
							<ul class="tree categories">
							<li class="tree-item-main parent">
								<span class="item box-slide-head">Female Articles 	<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
								<ul class="box-slide-body">
								<li class="tree-item parent">
									<span class="item box-slide-head">Fashion		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
									<ul class="box-slide-body">
									<li class="tree-item"><span class="item">Dress			<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item"><span class="item">Pants			<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item last"><span class="item">Gloves		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									</ul>
								</li>
								<li class="tree-item parent">
									<span class="item box-slide-head">Footwear		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
									<ul class="box-slide-body hidden">
									<li class="tree-item"><span class="item">Boots			<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item"><span class="item">Court Shoes		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item last"><span class="item">Sneakers		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									</ul>
								</li>
								<li class="tree-item">
									<span class="item box-slide-head">Sport Tools		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
								</li>
								<li class="tree-item parent last">
									<span class="item box-slide-head">Accessories		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
									<ul class="box-slide-body hidden">
									<li class="tree-item"><span class="item">Make-Up		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item"><span class="item">Jewels			<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item last"><span class="item">Belts		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									</ul>
								</li>
								</ul>
							</li>
							<li class="tree-item-main parent">
								<span class="item box-slide-head">Full Tree Levels	<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
								<ul class="box-slide-body hidden">
								<li class="tree-item parent last">
									<span class="item box-slide-head">Level 2 parent last</span>
									<ul class="box-slide-body hidden">
									<li class="tree-item"><span class="item">Level 3</span></li>
									<li class="tree-item parent">
										<span class="item box-slide-head">Level 3 parent last</span>
										<ul class="box-slide-body hidden">
										<li class="tree-item"><span class="item">Level 4</span></li>
										<li class="tree-item parent">
											<span class="item box-slide-head">Level 4 parent</span>
											<ul class="box-slide-body hidden">
											<li class="tree-item"><span class="item">Level 5</span></li>
											<li class="tree-item"><span class="item">Level 5</span></li>
											<li class="tree-item parent last">
												<span class="item box-slide-head">Level 5 parent last</span>
												<ul class="box-slide-body hidden">
												<li class="tree-item"><span class="item">Level 6</span></li>
												<li class="tree-item"><span class="item">Level 6</span></li>
												<li class="tree-item parent last">
													<span class="item box-slide-head">Level 6 parent last</span>
													<ul class="box-slide-body hidden">
													<li class="tree-item"><span class="item">Level 7</span></li>
													<li class="tree-item"><span class="item">Level 7</span></li>
													<li class="tree-item last"><span class="item">Level 7 last</span></li>
													</ul>
												</li>
												</ul>
											</li>
											</ul>
										</li>
										<li class="tree-item last"><span class="item">Level 4 last</span></li>
										</ul>
									</li>
									<li class="tree-item last"><span class="item">Level 3 last</span></li>
									</ul>
								</li>
								</ul>
							</li>
							<li class="tree-item-main parent last">
								<span class="item box-slide-head">Male Articles		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
								<ul class="box-slide-body hidden">
								<li  class="tree-item parent last">
									<span class="item box-slide-head">Fashion		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span>
									<ul class="box-slide-body hidden">
									<li class="tree-item"><span class="item">Dress			<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item"><span class="item">Pants			<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									<li class="tree-item last"><span class="item">Shoes		<span class="cat-links"><a href="#" class="cat-edit clickable" title="edit">edit</a><a href="#" class="cat-del clickable" title="delete">delete</a></span></span></li>
									</ul>
								</li>
								</ul>
							</li>
							</ul>
							
							
							<div class="mark_blue add-category">
								<h4>Add new category</h4>
								<form action="index.html">
								
									<div class="form-field clear">
										<input class="text title onFocusEmpty" id="cat-title" name="cat-title" size="30" value="Category title"/>
									</div>

									<div class="form-field clear">
										<textarea class="text cat-descr" id="cat-descr" name="cat-descr" cols="30" rows="4" title="description"></textarea>
									</div>
									<div class="form-field clear">
										<select id="select" class="cat-parent" title="Parent Category">
											<option value="1">Female Articles</option>
											<optgroup label="Female">
												<option value="110">Fashion</option>
												<option value="111">Fashion: Dress</option>
												<option value="112">Fashion: Pants</option>
												<option value="113">Fashion: Gloves</option>
												<option value="120">Footwear</option>
												<option value="121">Footwear: Boots</option>
												<option value="122">Footwear: Court Shoes</option>
												<option value="123">Footwear: Sneakers</option>
												<option value="140">Accessories</option>
												<option value="141">Accessories: Make-Up</option>
												<option value="142">Accessories: Jewels</option>
												<option value="143">Accessories: Belts</option>
											</optgroup>
											<option value="2">Male Articles</option>
											<optgroup label="Male">
												<option value="210">Fashion</option>
												<option value="211">Fashion: Dress</option>
												<option value="212">Fashion: Pants</option>
												<option value="213">Fashion: Shoes</option>
											</optgroup>
										</select>
									</div>

									<div class="form-field clear bt-space5">
										<input type="checkbox" class="checkbox fl-space" name="status" id="cat-status" />
                        	                				<label for="cat-status" class="fl-space">Active Category</label>
										
                                        					<input type="submit" class="button fr" id="cat-submit" name="cat-submit" value="Submit" />
									</div>
									
								</form>

							</div>
							
							<div class="notification note-info bt-space10">
								<a href="#" class="close" title="Close notification">close</a>
								<p><strong>Information:</strong></p>
								<p><small>The Tree list is openable. You can place &lt;a&gt; tags inside and discard sliding by "clickable" class.</small></p>
							</div>
						
						</div><!-- /.box-wrap -->														
					</div><!-- /.box-body -->
					</div><!-- /.content-box -->
					
					
					<!-- CONTENT BOX - CLOSED -->
					<div class="content-box bt-space10">
					<div class="box-body">
						<div class="box-header box-slide-head">
							<span class="slide-but">open/close</span>
							<h2>Closed Box</h2>
						</div>
						<div class="box-wrap clear box-slide-body hidden">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem.</p>
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
					
					<!-- CONTENT BOX - NEXT CLOSED -->
					<div class="content-box bt-space10">
					<div class="box-body">
						<div class="box-header box-slide-head">
							<span class="slide-but">open/close</span>
							<h2>Next Closed Box</h2>
						</div>
						<div class="box-wrap clear box-slide-body hidden">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem.</p>
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
					
					<!-- CONTENT BOX - LAST CLOSED -->
					<div class="content-box">
					<div class="box-body">
						<div class="box-header box-slide-head">
							<span class="slide-but">open/close</span>
							<h2>Last Closed Box</h2>
						</div>
						<div class="box-wrap clear box-slide-body hidden">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem.</p>
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
