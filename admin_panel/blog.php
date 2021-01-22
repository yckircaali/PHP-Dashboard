<?php

  require_once "admin/functions/db.php";

    $sql = 'SELECT * FROM posts';

    $query = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<head>
<title>Blog</title>
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
					<ul class="nav navbar-nav">
						<li><a href="index.php">Ana Sayfa</a></li>
						<li><a href="hakkimda.php">Hakkımda</a></li>
						<li class="active"><a href="blog.php">Blog</a></li>
						<li><a href="iletisim.php">İLETİŞİM</a></li>
						</ul>
				</nav>
		</div>
	</div>
	<div class="gallery">
		<div class="container">
			<h2 class="w3l_head w3l_head1">Blog</h2>
				<div class="wthree_gallery_grids">

					<?php 
                        while ($row=mysqli_fetch_array($query)) 
                        {  	
                    	echo
						'<div class="col-md-4">
						<a href="single.php?id='.$row["id"].'"><h4>'.$row["title"].'</h4></a>
						<br>
						<p>
							'.substr($row["content"], 0, 200).'...
						</p>
						<br>
						<h6 style="color: orange;">'.$row["author"].' <b style="color: #000;">|</b> '.$row["date"].'</h6>
						<hr>
						</div>';
						}
					?>
				</div>
		</div>
	</div>
	
	<?php 
		include("footer.php");
	?>