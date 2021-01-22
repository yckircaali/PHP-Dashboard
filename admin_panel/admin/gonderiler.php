<?php
    ob_start();
    require_once "functions/db.php";

    session_start();

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }

    $email = $_SESSION['email'];

    $sql = 'SELECT * FROM posts';

    $query = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="navbar-default sidebar" role="navigation">
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Admin</span></a>
            </li>
               
            <li> 
            	<a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><span class="hide-menu">Dashboard</a>
            </li>
                   
            <li>
            	<a href="#" class="waves-effect active"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Blog<span class="fa arrow"></span></span></a>
                    
                    <ul class="nav nav-second-level">
                        <li><a href="gonderiler.php">Tüm Gönderiler</a></li>
                        <li><a href="yeni_post.php">Yeni Gönderi Oluştur</a></li>
                        <li><a href="yorum.php">Yorumlar</a></li>
                    </ul>
                    
                    </li>
                        <li><a href="inbox.php" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Mesajlar</span></a>
                    </li>

                    <li>
                    	<a href="login.php" class="waves-effect"><i class="icon-logout fa-fw"></i><span class="hide-menu">ÇIKIŞ</span></a>
                    </li>
        </ul>
    </div>
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-9 col-sm-12 col-xs-12 mail_listing">
                    <div class="inbox-center">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <h4>Tüm Gönderiler (<b style="color: orange;"><?php echo mysqli_num_rows($query);?></b>)</h4>
                                    </th>
                                </tr>
                            </thead>    
                                <tbody>
                                    
                                    <?php
                                    while ($row = mysqli_fetch_array($query))
                                    {
                                    echo
                                    '<tr>
                                    <td class="hidden-xs"> '.$row["title"].'</td>
                                    <td class="max-texts"> '.$row["content"].'</td>
                                    <td class="text-right">'.$row["date"].'</td>
                                    </tr>
                                    ';
                                    }
                                    ?>

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>