<?php
    ob_start();
    require_once "functions/db.php";

    session_start();

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }

    $email = $_SESSION['email'];

    $sql = 'SELECT * FROM contacts';

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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <h4>Mesajlar (<b style="color: orange;"><?php echo mysqli_num_rows($query);?></b>)</h4>
                                    
                            <?php 
                                if (mysqli_num_rows($query)==0) {
                                echo "<i style='color:orange;'>Mesaj bulunmamaktadır.</i> ";}
                            ?>
                            
                        </th>
                    </tr>
                </thead>
            <tbody>    
                
                <?php
                    while ($row = mysqli_fetch_array($query)) {
                    echo
                    '
                    <tr>
                        <td class="hidden-xs"><a href="inbox-detail.php?id='.$row["id"].'" />'.$row["names"].'</td>
                        <td class="max-texts"><a href="inbox-detail.php?id='.$row["id"].'" />'.$row["message"].'</td>
                        <td class="text-right">'.$row["date"].'</td>
                    </tr>';
                    }
                ?>
                
            </tbody>
            </table>
        </div>
        <footer class="footer text-center"> 2021 &copy; Admin Dashboard </footer>
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