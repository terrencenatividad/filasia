<!DOCTYPE html>
<html>
<header>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $page_title ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="http://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Alegreya:700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/home/css/style.css">
	<script src="<?= BASE_URL ?>assets/js/jquery-2.2.3.min.js"></script>
	<script src="<?= BASE_URL ?>assets/js/bootstrap.min.js"></script>

	<link rel="icon" href = "<?= BASE_URL ?>assets/images/steam.ico">

	<style>
		input {
			outline: none;
		}
		input[type=search] {
			-webkit-appearance: textfield;
			-webkit-box-sizing: content-box;
			font-family: inherit;
			font-size: 100%;
		}

		input::-webkit-search-decoration,
		input::-webkit-search-cancel-button {
			display: none; 
		}
		input[type=search] {
			background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
			border: solid 1px #ccc;
			padding: 9px 10px 9px 32px;
			width: 55px;

			-webkit-border-radius: 10em;
			-moz-border-radius: 10em;
			border-radius: 10em;

			-webkit-transition: all .5s;
			-moz-transition: all .5s;
			transition: all .5s;
		}
		input[type=search]:focus {
			width: 220px;
			background-color: #fff;
			border-color: #66CC75;

			-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
			-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
			box-shadow: 0 0 5px rgba(109,207,246,.5);
		}
		input:-moz-placeholder {
			color: #999;
		}
		input::-webkit-input-placeholder {
			color: #999;
		}
		.demo-2 input[type=search] {
			width: 15px;
			padding-left: 10px;
			color: transparent;
			cursor: pointer;
		}
		.demo-2 input[type=search]:hover {
			background-color: #fff;
		}
		.demo-2 input[type=search]:focus {
			width: 130px;
			padding-left: 32px;
			color: #000;
			background-color: #fff;
			cursor: auto;
		}
		.demo-2 input:-moz-placeholder {
			color: transparent;
		}
		.demo-2 input::-webkit-input-placeholder {
			color: transparent;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-default" id = "navbar-custom" role = "navigation" style = "background-image: 
	url(<?= BASE_URL?>assets/images/metal_nav.jpg);">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>    
			<a class="navbar-brand" href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>assets/images/steam.ico" style = "width: 170px; height: 60px; padding-left: 70px;"></a>
		</div>
		<div class = "navbar-collapse collapse" id = "myNavbar">
			<ul class="nav navbar-nav" id = "fontArial">
				<li><a href="<?= BASE_URL ?>#about" style = "color: black;">ABOUT</a></li>
				<li><a href="<?= BASE_URL ?>#products" style = "color: black;">PRODUCTS</a></li>
				<li><a href="<?= BASE_URL ?>#projects" style = "color: black;">PROJECT HIGHLIGHTS</a></li>
				<li><a href="<?= BASE_URL ?>#lists" style = "color: black;">LIST OF PROJECT & CLIENTS</a></li>
				<li><a href="<?= BASE_URL ?>contact" style = "color: black;">CONTACT US</a></li>
				<!-- <li>
					<form class = "demo-2" action = "" method = "POST" id = "form">
						<input name = "search" type = "search" placeholder = "Search" id = "search" required="required">
					</form>
				</li> -->
				<li>
					<a style = "color: black;">
						<span class = "fa fa-search" data-toggle="modal" data-target="#myModal"></span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Search</h4>
				</div>
				<div class="modal-body">
					<form action = "" method = "POST" id = "form">
						<input name = "search" type = "search" placeholder = "Search" id = "search" required="required">
					</div>
					<div class="modal-footer">
						<input type="submit" name="submit" value = "Search" class = "btn btn-success">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#form').submit(function(e) {
			e.preventDefault();
			var search = $('#search').val();
			window.location = "<?= BASE_URL ?>product/search/"+search;
		});
	</script>

