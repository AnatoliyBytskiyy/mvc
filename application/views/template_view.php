<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Список задач</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />

		<!-- Bootstrap CSS (Cloudflare CDN) -->
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous">
  		<!-- jQuery (Cloudflare CDN) -->
  		<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  		<!-- Bootstrap Bundle JS (Cloudflare CDN) -->
  		<script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  <a class="navbar-brand" href="#">Navbar</a>
				  <div id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="/admin">Админ</a>
				      </li>
				      <li class="nav-item" id="signout">
				        <button class="nav-link" href="javascript:void(0);" onclick="signOut();">Выход</button>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>
			<div id="page">
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
					<br class="clearfix"/>
				</div>
				<br class="clearfix"/>
			</div>
		</div>
	</body>
</html>

<script src="../../js/Cookie.js"></script>
<script src="../../js/Signout.js"></script>