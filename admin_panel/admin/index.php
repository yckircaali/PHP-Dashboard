<?php
    ob_start();
    require_once "functions/db.php";

    session_start();

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }

    $email = $_SESSION['email'];

    $sql_posts = "SELECT * FROM posts";
    $query_posts = mysqli_query($connection, $sql_posts);

    $sql_contacts = "SELECT * FROM contacts";
    $query_contacts = mysqli_query($connection, $sql_contacts);

    $sql_comments = "SELECT * FROM comments";
    $query_comments = mysqli_query($connection, $sql_comments);
?>

<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div class="navbar-default sidebar" role="navigation">
            <ul class="nav" id="side-menu">
                  
                <li class="user-pro">
                    <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu">Admin</span></a>
                </li>

                <li> <a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </a>
                </li>
                    
                <li> 
                    <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Blog<span class="fa arrow"></span></span></a>

                    <ul class="nav nav-second-level">
                        <li><a href="gonderiler.php">Tüm Gönderiler</a></li>
                        <li><a href="yeni_post.php">Yeni Gönderi Oluştur</a></li>
                        <li><a href="yorum.php">Yorumlar</a></li>
                    </ul>
                </li>
                   
                <li>
                    <a href="inbox.php" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Mesajlar</span></a>
                </li>

                <li><a href="functions/logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">ÇIKIŞ</span></a>
                </li>
                   
            </ul>
        </div>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">YORUMLAR</h3>
                            <div class="comment-center">
                                <div class="comment-body">
                                    <div class="mail-contnet">
                                    <?php
                                        
                                    if (mysqli_num_rows($query_comments)==0) 
                                    {
                                        echo "<i style='color:brown;'>Gönderi bulunmamaktadır.</i> ";
                                    }
                                    else
                                    {

                                    $counter = 0;
                                    $max = 99;

                                    while ($row2 = mysqli_fetch_array($query_comments)) {
                                    $blogid = $row2["blogid"];
                                       $sql2 = "SELECT * FROM posts WHERE id='$blogid'";
                                            $query2 = mysqli_query($connection, $sql2);

                                    while (($row3 = mysqli_fetch_assoc($query2)) and ($counter < $max)) {
                                        
                                    echo 
                                    '   <b>'.$row2["name"].'</b>
                                        <h5>Blog Title : '.$row3["title"].'</h5>
                                        <span class="mail-desc">
                                        '.$row2["comment"].'
                                        </span> <span class="time pull-right">'.$row2["date"].'</span>
                                    ';
                                    $counter++;
                                        } } }
                                    ?>
                                    <hr>
                                     <a href="yorum.php" class="btn">Tüm Yorumları Görüntüle</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                                <h3 class="box-title">BLOG YAZILARI</h3>
                            		<div class="table-responsive">
                                		<table class="table ">

                                    <?php
                                        if (mysqli_num_rows($query_posts)==0) 
                                        {
                                            echo "<i style='color:brown;'>Gönderi bulunmamaktadır.";
                                        }
                                        else 
                                        {
                                            echo 
                                            '<thead>
                                            <tr>
                                            <th>TITLE</th>
                                            <th>DATE</th>
                                            <th>COMMENTS</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            ';
                                        }
                                            $counter = 0;
                                            $max = 3;

                                        while (($row = mysqli_fetch_array($query_posts)) and ($counter < $max) )
                                        {
                                            $postid = $row["id"];
                                            $sql2 = "SELECT * FROM comments WHERE blogid=$postid";
                                            $query2 = mysqli_query($connection, $sql2);

                                            echo
                                            '<tr>
                                            <td class="txt-oflo">'.$row["title"].'</td>
                                            <td class="txt-oflo">'.$row["date"].'</td>
                                            <td><span class="text-success">'.mysqli_num_rows($query2).'</span></td>
                                            </tr>
                                        ';
                                    	$counter++;
                                        }
                                    ?>

                                    </tbody>

                                </table> 
                                <a href="posts.php" class="btn">Tüm Postları Görüntüle</a>
                            </div>
                        </div>
                    </div>
                </div>
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