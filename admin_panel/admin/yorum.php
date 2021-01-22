<?php
    ob_start();
    require_once "functions/db.php";

    session_start();

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }

    $email = $_SESSION['email'];

    $sql = 'SELECT * FROM comments';

    $query = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="navbar-default sidebar" role="navigation">
        <ul class="nav" id="side-menu">

            <li class="user-pro">
                <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu">Admin</span></a>
            </li>

            <li> 
                <a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard</a>
            </li>
                   
            <li> 
                <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Blog<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">
   					<li><a href="gonderiler.php">Tüm Gönderiler</a></li>
                    <li><a href="yeni_post.php">Yeni Gönderi Oluştur</a></li>
                    <li><a href="yorum.php">Yorumlar</a></li>
                </ul>
            </li>
                   
            <li>
                <a href="inbox.php" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Mesajlar</span></a>
            </li>

            <li>
                <a href="login.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">ÇIKIŞ</span></a>
            </li>       
        </ul>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <hr>
                <h4>Yorumlar(<b style="color: orange;"><?php echo mysqli_num_rows($query);?></b>)</h4>
                  
                <?php
                    while ($row = mysqli_fetch_array($query))
                {
                    $blogid = $row["blogid"];
                    $sql2 = "SELECT * FROM posts WHERE id='$blogid'";
                    $query2 = mysqli_query($connection, $sql2);
                             
                    while ($row2 = mysqli_fetch_assoc($query2)) 
                {
                    echo
                    '<div class="comment-body">
                    <div class="mail-contnet">
                    <b>'.$row["name"].'</b>
                    <h5>'.$row2["title"].'</h5>
                    <span class="mail-desc">'.$row["comment"].'</span>
                    <span class="time pull-right">'.$row["date"].'</span></div>
                    </div>
                    ';
                } }
                ?>

        	</div>
        <footer class="footer text-center"> 2021 &copy; Admin Dashboard </footer>
    	</div>
    </div>

<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="bootstrap/dist/js/tether.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/waves.js"></script>
<script src="js/custom.min.js"></script>
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>