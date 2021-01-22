<!DOCTYPE html>
<head>
<title>İletişim</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="//fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="banner1">
		<div class="container">
			<div class="w3_agile_banner_top">
				<div class="agile_phone_mail">
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i>0 555 555 55 55</li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i><a>info@example.com</a></li>
					</ul>
				</div>
			</div>

			<nav class="navbar navbar-default">
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-13" id="cl-effect-13">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Ana Sayfa</a></li>
							<li><a href="hakkimda.php">Hakkımda</a></li>
							<li><a href="blog.php">Blog</a></li>
							<li class="active"><a href="iletisim.php">İLETİŞİM</a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
	
	<div class="mail">
		<div class="container">
			<h2 class="w3l_head w3l_head1">İLETİŞİM</h2>
				<div class="agileits_mail_grid_left">
					<form action="functions/contact.php" method="post">
						<h4>İsim*</h4>
						<input type="text" name="names" required="">
						<h4>E-Mail*</h4>
						<input type="email" name="email" required="">
						<h4>Mesaj*</h4>
						<textarea name="message"></textarea>
						<input type="submit" name="submit" value="GÖNDER">
					</form>
				</div>
		</div>
	</div>

	<?php 
		include("footer.php");
	?>