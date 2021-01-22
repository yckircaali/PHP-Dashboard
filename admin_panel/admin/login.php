<?php 
    ob_start();
    session_start();

        $db['db_host'] = 'localhost';
        $db['db_user'] = 'root';
        $db['db_pass'] = '';
        $db['db_name'] = 'Company';

      foreach($db as $key=>$value){
          define(strtoupper($key),$value);
      }
      global $conn;
      $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
      if(!$conn){
          die('Bağlantı Hatası.');
      }
      
      $email = $password = "";
      $email_err = $password_err = "";

      if($_SERVER["REQUEST_METHOD"] == "POST"){
          if(empty(trim($_POST["email"]))){
              $email_err = 'E-Posta adresi giriniz.';
          } else{
              $email = trim($_POST["email"]);
          }
          if(empty(trim($_POST['password']))){
              $password_err = 'Şifrenizi giriniz.';
          } else{
              $password = trim($_POST['password']);
          }
          if(empty($email_err) && empty($password_err))
          {

              $sql = "SELECT email, password FROM admin WHERE email = ?";

              if($stmt = mysqli_prepare($conn, $sql)){

                  mysqli_stmt_bind_param($stmt, "s", $param_email);

                  $param_email = $email;

                  if(mysqli_stmt_execute($stmt)){

                      mysqli_stmt_store_result($stmt);

                      if(mysqli_stmt_num_rows($stmt) == 1){

                          mysqli_stmt_bind_result($stmt, $email, $hashed_password);

                          if(mysqli_stmt_fetch($stmt)){

                              if(password_verify($password, $hashed_password)){

                                  $_SESSION['email'] = $email;

                                  $statement = mysqli_query($conn, $sql);

                                    header("Location: index.php");} 
                              else
                              {
                                  $password_err = 'Şifreniz yanlış.';
                              }
                          }
                      }
                  }
              }
              mysqli_stmt_close($stmt);
          }
          mysqli_close($conn);
      }
?>

<!DOCTYPE html>
<head>
    <title>Admin Giris Yap</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <section id="wrapper" class="login-register">
        <div class="login-box">

            <form class="form-horizontal form-material" id="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h3 class="box-title m-b-20">Giriş Yap</h3>
            <p style="color:red;">  <?php echo $email_err; ?> </p>
            <p style="color:red;">  <?php echo $password_err; ?> </p>

                <div class="form-group ">
                	<div class="col-xs-12">
                    	<input class="form-control" type="email" name="email" required="" placeholder="Email">
                	</div>
                </div>
                <div class="form-group">
                	<div class="col-xs-12">
                    	<input class="form-control" type="password" name="password" required="" placeholder="Password">
                	</div>
                </div>
                <div class="form-group text-center m-t-20">
                	<div class="col-xs-12">
                    	<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Giriş Yap</button>
                	</div>
                </div>
            </form>  
        </div>
    </section>
</body>
</html>