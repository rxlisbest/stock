<!DOCTYPE html>
<!--[if lt IE 7]>

<html class="lt-ie9 lt-ie8 lt-ie7" lang="en">

<![endif]-->
<!--[if IE 7]>

<html class="lt-ie9 lt-ie8" lang="en">

<![endif]-->
<!--[if IE 8]>

<html class="lt-ie9" lang="en">

<![endif]-->
<!--[if gt IE 8]>
<!-->

<html lang="en">
	
	<!--
<![endif]-->
	<head>
	<meta charset="utf-8">
	<title>
		1024工作室-库存管理系统
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link type="image/x-icon" rel="shortcut icon" href="/public/img/favicon.ico" />
	<link type="image/x-icon" rel="icon" href="/public/img/favicon.ico" />
	<!-- bootstrap css -->
	<link href="/public/css/loading.css" rel="stylesheet">
	<link href="/public/css/date.css" rel="stylesheet">
	<link href="/public/icomoon/style.css" rel="stylesheet">
	<link href="/public/css/main.css" rel="stylesheet"> <!-- Important. For Theming change primary-color variable in main.css    -->
	<!--[if lte IE 7]>
	<script src="/public/css/public/icomoon-font/lte-ie7.js">
	</script>
	<![endif]-->
	<link href="/public/css/bootstrap-editable.css" rel="stylesheet">
	<link href="/public/css/select2.css" rel="stylesheet">
	
	<link href="/public/resources/css/jquery.toastmessage.css" rel="stylesheet">
	<script src="/public/js/jquery-1.7.2.min.js"></script>
	<script src="/public/js/jquery.jqprint-0.3.js"></script>
	
	</head>
	<body>
		<div id="loading" style="position:fixed;z-index:99;width:100%;height:100%;background-color:rgba(0,0,0,0.4);display:none;">
			<div class="solar">
				<i class="mercury"></i>
				<i class="venus"></i>
				<i class="earth"></i>
				<i class="mars"></i>
				<i class="belt"></i>
				<i class="jupiter"></i>
				<i class="saturn"></i>
				<i class="uranus"></i>
				<i class="neptune"></i>
			</div>
		</div>
	<header><!-- Header Starts Here -->
		<a href="/" class="logo">
		<img src="/public/img/logo.png" alt="Logo"/>
		</a>
	<?php if($name):?>
		<div class="btn-group">
		<a href="/profile">
			<button class="btn btn-primary" href="/">
			<font size="2">
				<?php echo $name;?>
			</font>
			</button>
		</a>

		<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
			<span class="caret">
			</span>
		</button>
		<ul class="dropdown-menu pull-right">
			<!-- <li>
			<a href="#">
				Edit Profile
			</a>
			</li>
			<li>
			<a href="#">
				Account Settings
			</a>
			</li> -->
			<li>
			<a href="/profile">
				修改信息
			</a>
			</li>
			<li>
			<a href="/login/logout">
				退出登陆
			</a>
			</li>
		</ul>
		</div>
	<?php endif; ?>
		<ul class="mini-nav">
		<!-- <li>
			<a href="#">
			<div class="fs1" aria-hidden="true" data-icon="&#xe040;"></div>
			<span class="info-label badge badge-warning">
				3
			</span>
			</a>
		</li>
		<li>
			<a href="#">
			<div class="fs1" aria-hidden="true" data-icon="&#xe04c;"></div>
			<span class="info-label badge badge-info">
				5
			</span>
			</a>
		</li>
		<li>
			<a href="#">
			<div class="fs1" aria-hidden="true" data-icon="&#xe037;"></div>
			<span class="info-label badge badge-success">
				9
			</span>
			</a>
		</li> -->
		
		</ul>
	</header><!-- Header Ends Here -->


	<div class="container-fluid"><!-- Container fluid starts here -->

		<div class="dashboard-container"><!-- Dashboard Container starts here -->

		<div class="top-nav"><!-- This is main navigation -->
			<ul>
			<!-- <li>
				<a href="/">
				<div class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></div>
				桌面
				</a>
			</li> -->
			 <!--    <li>
				<a href="graphs.html">
				<div class="fs1" aria-hidden="true" data-icon="&#xe096;"></div>
				Graphs
				</a>
			</li>
			<li>
				<a href="ui-elements.html">
				<div class="fs1" aria-hidden="true" data-icon="&#xe0d2;"></div>
				UI Elements
				</a>
			</li> -->
			<li>
				<a href="/customer"<?php if(CONTROLLER == 'customer'):?> class="selected"<?php endif; ?>>
					<div class="fs1" aria-hidden="true" data-icon=""></div>
					客户
				</a>
			</li>
			<li>
				<a href="/goods"<?php if(CONTROLLER == 'goods'):?> class="selected"<?php endif; ?>>
					<div class="fs1" aria-hidden="true" data-icon=""></div>
					库存
				</a>
			</li>
			<li>
				<a href="/profile"<?php if(CONTROLLER == 'profile'):?> class="selected"<?php endif; ?>>
					<div class="fs1" aria-hidden="true" data-icon=""></div>
					用户
				</a>
			</li>
			<!-- <li>
				<a href="tables.html">
				<div class="fs1" aria-hidden="true" data-icon="&#xe14a;"></div>
				Tables
				</a>
			</li>
			<li>
				<a href="media.html">
				<div class="fs1" aria-hidden="true" data-icon="&#xe00d;"></div>
				Media
				</a>
			</li>
			<li>
				<a href="calendar.html">
				<div class="fs1" aria-hidden="true" data-icon="&#xe052;"></div>
				Calendar
				</a>
			</li>
			<li>
				<a href="typography.html">
				<div class="fs1" aria-hidden="true" data-icon="&#xe100;"></div>
				Typography
				</a>
			</li>
			<li>
				<a href="edit-profile.html">
				<div class="fs1" aria-hidden="true" data-icon="&#xe0aa;"></div>
				Extras
				</a>
			</li> -->
			</ul>
			<!-- clear -->
			<div class="clearfix"></div>
		</div>


		<div class="sub-nav"><!-- This is sub navigation -->
			<ul>
			<!-- <li>
				<a href="#" >
				Link
				</a>
			</li>
			<li>
				<a href="#">
				Link
				</a>
			</li>
			<li>
				<a href="#" class="selected">
				Link
				</a>
			</li>
			<li>
				<a href="#">
				Link
				</a>
			</li>
			<li>
				<a href="#">
				Link
				</a>
			</li>
			<li>
				<a href="#">
				Link
				</a>
			</li> -->
			</ul>
			<div class="btn-group pull-right"><!-- This dropdown menu is for mobile version -->
			<button class="btn btn-primary">
				导航
			</button>
			<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
				<span class="caret">
				</span>
			</button>
			<ul class="dropdown-menu pull-right">
				<!-- <li>
				<a href="index.html" data-original-title="">
					Dashboard
				</a>
				</li>
				<li>
				<a href="forms.html" data-original-title="">
					Forms
				</a>
				</li>
				<li>
				<a href="graphs.html" data-original-title="">
					Graphs
				</a>
				</li>
				<li>
				<a href="ui-elements.html" data-original-title="">
					UI Elements
				</a>
				</li> -->
				<li>
				<a href="/customer" data-original-title="">
					客户
				</a>
				</li>
				<li>
				<a href="/profile" data-original-title="">
					用户
				</a>
				</li>
				<!-- <li>
				<a href="tables.html" data-original-title="">
					Tables
				</a>
				</li>
				<li>
				<a href="media.html" data-original-title="">
					Media
				</a>
				</li>
				<li>
				<a href="calendar.html" data-original-title="">
					Calendar
				</a>
				</li>
				<li>
				<a href="typography.html" data-original-title="">
					Typography
				</a>
				</li>
				<li>
				<a href="edit-profile.html" data-original-title="">
					Edit Profile
				</a>
				</li>
				<li>
				<a href="invoice.html" data-original-title="">
					Invoice
				</a>
				</li>
				<li>
				<a href="login.html" data-original-title="">
					Login
				</a>
				</li>
				<li>
				<a href="404.html" data-original-title="">
					404 Page
				</a>
				</li>
				<li>
				<a href="500.html" data-original-title="">
					500 Page
				</a>
				</li>
				<li>
				<a href="help.html" data-original-title="">
					Help
				</a>
				</li> -->
			</ul>
			</div>
		</div>

		<div class="dashboard-wrapper"><!-- Dashboard wrapper starts here -->
			<?php echo $content;?>
		</div><!-- Dashboard wrapper ends here -->

		</div><!--    Dashboard container ends here    -->

	</div><!--    Container fluid ends here    -->


	<footer><!--    Footer starts here    -->
		<p>
		Copyright © 2014   1024工作室 
		</p>
	</footer><!--    Footer ends here    -->
	<script src="/public/js/bootstrap.js"></script>
	<script src="/public/js/jquery.scrollUp.js"></script>
	<script src="/public/js/jquery.dataTables.js"></script>

	<script src="/public/js/bootstrap-editable.min.js"></script>
	<script src="/public/js/select2.js"></script>
	<script src="/public/js/jquery.toastmessage.js"></script>

	<script type="text/javascript">
		function loading(){
			$("#loading").show();
		}
		function loaded(){
			$("#loading").hide();
		}
		// loading();
		//ScrollUp
		$(function () {
		$.scrollUp({
			scrollName: 'scrollUp', // Element ID
			topDistance: '300', // Distance from top before showing element (px)
			topSpeed: 300, // Speed back to top (ms)
			animation: 'fade', // Fade, slide, none
			animationInSpeed: 400, // Animation in speed (ms)
			animationOutSpeed: 400, // Animation out speed (ms)
			scrollText: '回到顶部', // Text for element
			activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		});
		});

		//Tooltip
		$('a').tooltip('hide');

		//Data Tables
		$(document).ready(function () {
		$('#data-table').dataTable({
			"sPaginationType": "full_numbers"
		});
		});

		jQuery('.delete-row').click(function () {
		var conf = confirm('Continue delete?');
		if (conf) jQuery(this).parents('tr').fadeOut(function () {
			jQuery(this).remove();
		});
			return false;
		});
	</script>
	<script type="text/javascript">
		//Tooltip
		$('a').tooltip('hide');
	</script>
</body>
</html>
