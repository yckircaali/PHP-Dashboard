<?php 
require_once "db.php";

  $author = $_POST['author'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  if (isset($_POST["submit"])) 
  {
    $sql = "INSERT INTO posts(author, title, content)
    VALUES (?,?,?)";

    $stmt = $db->prepare($sql);

    try 
    {
      $stmt->execute([$author, $title, $content]);
      header('Location:../gonderiler.php');
    }

    catch (Exception $e) 
    {
        $e->getMessage();
        echo "Error";
    }
  }
?>