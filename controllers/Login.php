<?php
include '../models/AuthFunction.php';

if(!empty($_SESSION["id"])){
  header("Location: ../home.php");
}

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    
              // $role = $row["id_role"];

              // switch ($role) {
              //     case 1:
              //         $path = "";
              //         break;
              //     case 2:
              //         $path = "../home.php";
              //         break;
              //     default:
              //         $path = "";
              //         break;
              // }

              // header("Location: " . $path);
              // exit(); 
              
   header("location:../home.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>