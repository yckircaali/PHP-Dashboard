<?php

	require_once "admin/functions/db.php";

    if (isset($_GET['id'])) {
    $postid = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id='$postid'";
    $query = mysqli_query($connection, $sql);

    $sql2 = "SELECT * FROM comments WHERE blogid=$postid";
    $query2 = mysqli_query($connection, $sql2);  
    }

    else {
    	header('Location:blog.php');
    }
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
			<div class="agileits_w3layouts_banner_nav">
				<nav class="navbar navbar-default">
					<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
						<nav class="cl-effect-13" id="cl-effect-13">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Ana Sayfa</a></li>
								<li><a href="hakkimda.php">Hakkımda</a></li>
								<li class="active"><a href="blog.php">Blog</a></li>
								<li><a href="iletisim.php">İLETİŞİM</a></li>
							</ul>
					    </nav>
					</div>
				</nav>
			</div>
		</div>
	</div>

	<div class="gallery">
		<div class="container">
			<h2 class="w3l_head w3l_head1">Blog Post</h2>
				<div class="wthree_gallery_grids">
					<div class="row">

					<?php 

                    while ($row = mysqli_fetch_assoc($query)) 

                    {  	
					echo
					'<div class="col-md-12">

					<br>
					<h2>'.$row["title"].'</h2>
					<br>
					<h6 style="color: orange;">'.$row["author"].' <b style="color: #000;">|</b> ('.mysqli_num_rows($query2).') Comments <b style="color: #000;">|</b> '.$row["date"].'</h6>
					<br>
					<p>
						'.$row["content"].'
					</p>'
						;
					}

					?>
						
					<hr>
					<h4>Yorumlar(<?php echo mysqli_num_rows($query2); ?>)</h4>
					<br/>
					<div style=";">
						<div style="padding: 10px;">

						<?php 
						while ($row2 = mysqli_fetch_assoc($query2)) 
						{
						echo
						'
							 
						<b>'.$row2["name"].' :</b>
						<p>
							'.$row2["comment"].'
							<i style="color: orange; float: right;">'.$row2["date"].'</i>
						</p>
						<hr>

						';
						}
						?>

						</div>
					</div>

						<h4>Yorum bırakabilirsiniz.</h4>
						<br/>
						
						<div class="agileits_mail_grid_left col-md-9" >
							<form action="functions/comment.php" method="post">
								<input type="hidden" name="blogid" value="<?php echo $postid;?>" />
								<input type="text" name="name" placeholder="İsim*" required />
								<textarea placeholder="Yorum*" name="comment" required></textarea>
								<input type="submit" value="Gönder" name="submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
		include("footer.php");
	?>