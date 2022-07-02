<?php
 //   if (!isset($_COOKIE['displayName_ck'])){
  //      header('Location:signin.php');
 //   }else{
		$pf = $_COOKIE['displayName_ck'];
		$pic = $_COOKIE['pictureUrl_ck'];
//	}
	include('config.php');
	$nhost = "https://notify-bot.line.me/oauth/authorize";
	$bbody = [
		"response_type" => "code",
		"client_id" => $nCLIENT_ID,
		"redirect_uri" => $nREDIRECT_URI,
		"scope" => "notify",
		"state" => "67890"
	];
	$notifyUrl = $nhost."?".http_build_query($bbody);
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
					<a class="nav-link" href="revoke.php">Sign out</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notify</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="<?php echo $notifyUrl; ?>">訂閱通知</a>
						<a class="dropdown-item" href="nrevoke.php">取消訂閱</a>
					</div>
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
				<div class="col-md-8">
					<div class="card mb-4 shadow-sm">
						<div class="card-body"><div width = "400px">
							<?php
								echo '<img src='.$pic.'> ' . ' Hello, '.$pf;
							?>
						</div></div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card mb-4 shadow-sm">
						<div class="card-body"><div width = "400px">
                                <a href="<?php echo $notifyUrl; ?>" class="btn btn-lg btn-success btn-block" >連動notify</a>
                        </div></div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card mb-4 shadow-sm">
						<div class="card-body"><div width = "400px">
                                <a href="nrevoke.php" class="btn btn-lg btn-success btn-block" >取消連動notify</a>
                        </div></div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card mb-4 shadow-sm">
						<div class="card-body"><div width = "400px">

                            <form action="revoke.php" method="POST">
                                <button class="btn btn-lg btn-secondary btn-block" type="submit">
                                Sign out
                                </button>
                            </form>
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


