<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>TERMINATOR: Tables</title>

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
			<li class="active"><a href="tables.html">Tables</a></li>
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
		<li><a href="#">Tables</a></li>
		</ul>
	</div>
</div>
	
<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="page clear">
			<h1>Table Styles <a href="#modal-label" class="label modal-link">INFO</a></h1>
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
				<div class="col1-2">
					<div class="content-box bt-space20">
					<div class="box-body">
						<div class="box-wrap clear">
							
							<!-- BASIC STYLE TABLE -->
							<h2>Basic Style Table</h2>
							
							<table class="basic" cellspacing="0">
							<caption>Caption of Table</caption>
							<thead>
							<tr>
								<td>THEAD TD</td>
								<th>TH col1</th>
								<th>TH col2</th>
								<th class="right">TH col3</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>TBODY TH row1</th>
								<td>Lorem ipsum dolor sit amet</td>
								<td class="value">value</td>
								<td class="right">right</td>
							</tr>
							<tr>
								<th>TBODY TH row2</th>
								<td>Lorem ipsum dolor sit amet</td>
								<td class="value">value</td>
								<td class="right">right</td>
							</tr>
							<tr>
								<th>TBODY TH row3</th>
								<td>Lorem ipsum dolor sit amet</td>
								<td class="value">value</td>
								<td class="right">right</td>
							</tr>
							<tr>
								<th>TBODY TH row4</th>
								<td>Lorem ipsum dolor sit amet</td>
								<td class="value">value</td>
								<td class="right">right</td>
							</tr>
							</tbody>
							</table>
							
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
				</div>
				<div class="col1-2 lastcol">
					<div class="content-box bt-space20">
					<div class="box-body">
						<div class="box-wrap clear">
						
							<!-- STYLE1 TABLE -->
							<h2>Style1 Table</h2>
							
							<table class="style1">
							<caption>Caption of Table</caption>
							<thead>
							<tr>
								<td>THEAD TD</td>
								<th>TH col1</th>
								<th>TH col2</th>
								<th class="right">TH col3</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>TBODY TH row1</th>
								<td>Lorem ipsum dolor sit amet</td>
								<td class="value">value</td>
								<td class="right">right</td>
							</tr>
							<tr>
								<th>TBODY TH row2</th>
								<td>Lorem ipsum dolor sit amet</td>
								<td class="value">value</td>
								<td class="right">right</td>
							</tr>
							<tr>
								<th>TBODY TH row3</th>
								<td>Lorem ipsum dolor sit amet</td>
								<td class="value">value</td>
								<td class="right">right</td>
							</tr>
							</tbody>
							</table>
							
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
				</div>
			</div>
			
			<div class="columns clear">
				<div class="col1-2">
					<div class="content-box">
					<div class="box-body">
						<div class="box-wrap clear">
						
							<!-- BASIC STYLE TABLE OPENABLE -->
							<h2>Basic Style Table - Openable </h2>
							
							<table class="basic" cellspacing="0">
							<caption>Caption of Table</caption>
							<thead>
							<tr>
								<th>rows</th>
								<th>text</th>
								<th>icon</th>
								<th>more icons</th>
								<th>input</th>
								<th>button</th>
								<th>&nbsp;</th>
							</tr>
							</thead>
							<tbody>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 1</td>
								<td class="vcenter nowrap">Lorem ipsum dolor</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input1" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit1" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7"><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 2</td>
								<td class="vcenter nowrap">Lorem ipsum dolor</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input2" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit2" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7"><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 3</td>
								<td class="vcenter nowrap">Lorem ipsum dolor</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input3" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit3" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7"><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 4</td>
								<td class="vcenter nowrap">Lorem ipsum dolor</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input4" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit4" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7"><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							</tbody>
							</table>
							
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
				</div>
				<div class="col1-2 lastcol">
					<div class="content-box">
					<div class="box-body">
						<div class="box-wrap clear">
						
							<!-- STYLE1 TABLE OPENABLE -->
							<h2>Style1 Table - Openable </h2>
							
							<table class="style1">
							<caption>Caption of Table</caption>
							<thead>
							<tr>
								<th>rows</th>
								<th>text</th>
								<th>icon</th>
								<th>more icons</th>
								<th>input</th>
								<th>button</th>
								<th>&nbsp;</th>
							</tr>
							</thead>
							<tbody>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 1</td>
								<td class="vcenter nowrap">Lorem ipsum</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input1" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit1" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7" ><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 2</td>
								<td class="vcenter nowrap">Lorem ipsum</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input2" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit2" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7"><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 3</td>
								<td class="vcenter nowrap">Lorem ipsum</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input3" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit3" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7"><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							<tr class="box-slide-head">
								<td class="vcenter title">Title 4</td>
								<td class="vcenter nowrap">Lorem ipsum</td>
								<td class="vcenter"><img src="images/ball_green_16.png" class="block" alt="" /></td>
								<td class="vcenter">
									<img src="images/ico_settings_16.png" class="fl-space" alt="" />
									<img src="images/ico_edit_16.png" class="fl-space" alt="" />
									<img src="images/ico_delete_16.png" class="fl" alt="" />
								</td>
								<td class="vcenter"><input type="text" name="input4" value="" class="text clickable" size="5" /></td>
								<td class="vcenter"><input type="submit" name="submit4" value="OK" class="button clickable" /></td>
								<td class="vcenter slide-but"><span>more</span></td>
							</tr>
							<tr>
								<td class="box-slide-body hidden" colspan="7"><p class="clean-padding bt-space5"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p></td>
							</tr>
							</tbody>
							</table>
							
						</div> <!-- end of box-wrap -->
					</div> <!-- end of box-body -->
					</div> <!-- end of content-box -->
				</div>
			</div>
			
			
			<!-- CONTENT BOX - DATATABLE -->
			<div class="content-box">
			<div class="box-body">
				<div class="box-header clear">
					<ul class="tabs clear">
						<li><a href="#data-table">JS plugin</a></li>
						<li><a href="#table">Table only</a></li>
					</ul>
					
					<h2>Data Table</h2>
				</div>
				
				<div class="box-wrap clear">
					
					<!-- DATA-TABLE JS PLUGIN -->
					<div id="data-table">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem.</p> 
					
						<form method="post" action="">
						
						<table class="style1 datatable">
						<thead>
							<tr>
								<th class="bSortable"><input type="checkbox" class="checkbox select-all" /></th>
								<th>Column 1</th>
								<th>Column 2</th>
								<th>Column 3</th>
								<th>Column 4</th>
								<th>Column 5</th>
								<th>Column 6</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Lorem ipsum dolor</td>
								<td><a href="#">John</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input1" id="input1" value="235" class="text" size="10" /></td>
								<td>sed in porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
                                                        
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Dignissim enim</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input2" id="input2" value="124" class="text" size="10" /></td>
								<td>duis nec rutrum</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input3" id="input3" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input4" id="input4" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input5" id="input5" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input6" id="input6" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input7" id="input7" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input8" id="input8" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input9" id="input9" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Maecenas velit</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input10" id="input10" value="58" class="text" size="10" /></td>
								<td>porta lectus</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Duis nec rutrum</td>
								<td><a href="#">John</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input11" id="input11" value="10" class="text" size="10" /></td>
								<td>enim quis ipsum</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td>Elit gravida</td>
								<td><a href="#">Admin</a></td>
								<td>5/6/2010</td>
								<td><input type="text" name="input12" id="input12" value="356" class="text" size="10" /></td>
								<td>dolor sit amet</td>
								<td>
									<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
									<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
									<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
								</td>
							</tr>
						</tbody>
						</table>
						
						<div class="tab-footer clear fl">
							<div class="fl">
								<select name="dropdown" class="fl-space">
									<option value="option1">choose action...</option>
									<option value="option2">Edit</option>
									<option value="option3">Delete</option>
								</select>
								<input type="submit" value="Apply" id="submit1" class="button fl-space" />
							</div>
						</div>
						</form>
					</div><!-- /#table -->
					
					<!-- DATA-TABLE ONLY -->
					<div id="table">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem.</p> 
					
						<form method="post" action="">
						<table class="style1">
							<thead>
								<tr>
									<th><input type="checkbox" class="checkbox select-all" /></th>
									<th>Column 1</th>
									<th>Column 2</th>
									<th>Column 3</th>
									<th>Column 4</th>
									<th>Column 5</th>
									<th>Column 6</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td><input type="checkbox" class="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td><a href="#">John</a></td>
									<td>5/6/2010</td>
									<td><input type="text" name="input21" id="input21" value="235" class="text" size="10" /></td>
									<td>sed in porta lectus</td>
									<td>
										<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
										<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
										<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
									</td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkbox" /></td>
									<td>Dignissim enim</td>
									<td><a href="#">Admin</a></td>
									<td>5/6/2010</td>
									<td><input type="text" name="input22" id="input22" value="124" class="text" size="10" /></td>
									<td>duis nec rutrum</td>
									<td>
										<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
										<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
										<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
									</td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkbox" /></td>
									<td>Maecenas velit</td>
									<td><a href="#">Admin</a></td>
									<td>5/6/2010</td>
									<td><input type="text" name="input23" id="input23" value="58" class="text" size="10" /></td>
									<td>porta lectus</td>
									<td>
										<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
										<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
										<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
									</td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkbox" /></td>
									<td>Duis nec rutrum</td>
									<td><a href="#">John</a></td>
									<td>5/6/2010</td>
									<td><input type="text" name="input24" id="input24" value="10" class="text" size="10" /></td>
									<td>enim quis ipsum</td>
									<td>
										<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
										<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
										<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
									</td>
								</tr>
								<tr>
									<td><input type="checkbox" class="checkbox" /></td>
									<td>Elit gravida</td>
									<td><a href="#">Admin</a></td>
									<td>5/6/2010</td>
									<td><input type="text" name="input25" id="input25" value="356" class="text" size="10" /></td>
									<td>dolor sit amet</td>
									<td>
										<a href="#"><img src="images/ico_edit_16.png" class="icon16 fl-space2" alt="" title="edit" /></a>
										<a href="#"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete" /></a>
										<a href="#"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="settings" /></a>
									</td>
								</tr>
							</tbody>
						</table>
						
						<div class="tab-footer clear">
							<div class="fl">
								<select name="dropdown" class="fl-space">
									<option value="option1">choose action...</option>
									<option value="option2">Edit</option>
									<option value="option3">Delete</option>
								</select>
								<input type="submit" value="Apply" id="submit2" class="button fl-space" />
							</div>
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
						</form>
					</div><!-- /#table -->
					
				</div><!-- end of box-wrap -->
			</div> <!-- end of box-body -->
			</div> <!-- end of content-box -->
			
			
			<!-- TABLE-DETAIL - QUICK EDIT -->
			<div class="content-box">
			<div class="box-body">
				<div class="box-header clear">
					<h2>Detail - Quick Edit Table</h2>
				</div>
				<div class="box-wrap clear">
					<form method="post" action="">
					<table class="style1">
					<thead>
					<tr>
						<th>Item</th>
						<th class="full">Value</th>
						<th>Edit</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<th>Name</th>
						<td class="edit-field edit-textfield long">Lorem ipsum dolor</td>
						<td><a href="#" class="quick_edit"><img src="images/ico_edit_16.png" alt="" class="icon16 fl" title="quick edit" /></a></td>
					</tr>
					<tr>
						<th>Pictures</th>
						<td><a href="images/tmp/picture1.jpg" title="preview" rel="group1"><img src="images/tmp/thumbnail1.jpg" alt="" class="thumb size64 fl-space" /></a>
						    <a href="images/tmp/picture2.jpg" title="preview" rel="group1"><img src="images/tmp/thumbnail2.jpg" alt="" class="thumb size64 fl-space" /></a>
						    <a href="images/tmp/picture3.jpg" title="preview" rel="group1"><img src="images/tmp/thumbnail3.jpg" alt="" class="thumb size64 fl-space" /></a></td>
						
                                                <td></td>
					</tr>
					<tr>
						<th>Short Description</th>
						<td class="edit-field edit-textfield long"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></td>
						<td><a href="#" class="quick_edit"><img src="images/ico_edit_16.png" alt="" class="icon16 fl" title="quick edit" /></a></td>
					</tr>
					<tr>
						<th>Long Description</th>
						<td class="edit-field edit-textarea"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p></td>
						<td><a href="#" class="quick_edit"><img src="images/ico_edit_16.png" alt="" class="icon16 fl" title="quick edit" /></a></td>
					</tr>
					<tr>
						<th>Status</th>
						<td class="edit-field edit-select"><img src="images/ico_inactive_16.png" class="icon16 fl" title="inactive" alt="" /></td>
						<td><a href="#" class="quick_edit"><img src="images/ico_edit_16.png" alt="" class="icon16 fl" title="quick edit" /></a></td>
					</tr>
					<tr>
						<th>Available From</th>
						<td class="edit-field edit-date">5/6/2010</td>
						<td><a href="#" class="quick_edit"><img src="images/ico_edit_16.png" alt="" class="icon16 fl" title="quick edit" /></a></td>
					</tr>
					<tr>
						<th>Available To</th>
						<td class="edit-field edit-date">30/6/2010</td>
						<td><a href="#" class="quick_edit"><img src="images/ico_edit_16.png" alt="" class="icon16 fl" title="quick edit" /></a></td>
					</tr>
					<tr>
						<th>Priority</th>
						<td  class="edit-field edit-textfield">2</td>
						<td><a href="#" class="quick_edit"><img src="images/ico_edit_16.png" alt="" class="icon16 fl" title="quick edit" /></a></td>
					</tr>
					</tbody>
					</table>
					
					<div class="tab-footer clear">
						<div class="fr">
							<input type="submit" value="Apply Changes" id="apply" class="button" />
						</div>
					</div>
					</form>
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
