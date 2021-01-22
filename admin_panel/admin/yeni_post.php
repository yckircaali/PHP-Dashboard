<?php 
    ob_start();
    require_once "functions/db.php";

    session_start();

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

      header("location: login.php");

      exit;
    }

    $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="../plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
 
                <li class="user-pro">
                    <a href="#" class="waves-effect"><img src="../plugins/images/user.jpg" alt="user-img" class="img-circle"> <span class="hide-menu">Admin</span></a>
                </li>

                <li> 
                	<a href="index.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Dashboard</a>
                </li>
                   
                <li>
                	<a href="#" class="waves-effect active"><i data-icon="&#xe00b;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Blog<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="gonderiler.php">Tüm Gönderiler</a></li>
                        	<li><a href="yeni_post.php">Yeni Gönderi Oluştur</a></li>
                        	<li><a href="yorum.php">Yorumlar</a></li>
                        </ul>
                </li>
                   
                <li>
                	<a href="inbox.php" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Mesajlar</span></a>
                </li>

                <li>
                	<a href="login.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">ÇIKIŞ</span></a>
                </li>
                   
                </ul>
        </div>
    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="box-title m-b-0">Yeni Gönderi Oluştur</h3>
                        <div id="exampleValidator" class="wizard">

                            <ul class="wizard-steps" role="tablist">
                                <li class="active" role="tab">
                                    <h4><span><i class="ti-user"></i></span>Yazar</h4> </li>
                                <li role="tab">
                                    <h4><span><i class="ti-marker-alt"></i></span>Başlık</h4> </li>
    	                        <li role="tab">
                                    <h4><span><i class="ti-book"></i></span>İçerik</h4> </li>
                            </ul>

                            <form id="validation" class="form-horizontal" action="functions/new_post.php" method="post">
                                <div class="wizard-content">
                                    <div class="wizard-pane active" role="tabpanel">
                                        <div class="form-group">
                                            <label class="col-xs-3 control-label">Yazar İsmi</label>
                                            <input type="text" class="form-control" name="author"/> 
                                        </div>
                                    </div>
                       	                <div class="wizard-pane" role="tabpanel">
                           			        <div class="form-group">
                                                <label class="col-xs-3 control-label">Gönderi Başlığı</label>
                                                <input type="text" class="form-control" name="title" required/> 

                                            </div>
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">İçerik</label>
                                                <textarea class="form-control" name="content" required > </textarea>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
    <script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
    <script src="../plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    (function() {

        $('#exampleValidator').wizard(
        {
            onInit: function() 
            {
                $('#validation').formValidation({
                    framework: 'bootstrap',
                });
            },
        });
    })
    ();
    </script>
    
</body>
</html>