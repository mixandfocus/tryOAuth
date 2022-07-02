<?php
include('config.php');
if (isset($_COOKIE['displayName_ck'])){
	header('Location:ordernotify.php');
}
$auth_host = 'https://access.line.me/oauth2/v2.1/authorize?response_type=code';
$client_id = '&client_id=' . $CLIENT_ID;
$redirect_uri = '&redirect_uri='. $REDIRECT_URI;
$state = '&state=12345';
$scope = '&scope=' . $SCOPE;
$authUrl = $auth_host . $client_id . $redirect_uri . $state . $scope;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEST</title>
	<link href="https://use.fontawesome.com/releases/v5.0.0/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../demo.css" rel="stylesheet">
	<link rel="stylesheet" href="../line-login.css">
	<style>
		.bd-placeholder-img {
		  font-size: 1.125rem;
		  text-anchor: middle;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		}
		@media (min-width: 768px) {
		  .bd-placeholder-img-lg {
			font-size: 3.5rem;
		  }
		}
	  </style>
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
		<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $authUrl; ?>">(前台) Sign in</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../admin/signin.php">前往後台</a>
				</li>
			</ul>
		</div>
		<a class="navbar-brand mr-auto mr-lg-0" href="#">OOOOOOAuth</a>
		<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
<div class="container">
	<header class="py-3">
	</header>
	<main>
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<div class="card-body"><div width = "400px">
							<h1 class="h3 mb-3 font-weight-normal">
								Sign in with
							</h1>
							<div id="web-login-button">
								<a href="<?php echo $authUrl; ?>"><img src="../img/btn_login_base.png"/></a>
							</div>
						</div></div>
					</div>
				</div>
			</div>
	</main>
	<footer class="container">
		<p class="float-right"><a href="#"></a></p>
	</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="../offcanvas.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
