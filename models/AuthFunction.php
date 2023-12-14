<?php
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "oop_reglog";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}










class Register extends Connection{
  public function registration($name, $username, $email, $password, $confirmpassword){
    $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      
    }
    else{
      if($password == $confirmpassword){
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $id_role = 2 ;
        $query = "INSERT INTO t_user VALUES('', '$name', '$username', '$email', '$hashedPwd',$id_role )";
        mysqli_query($this->conn, $query);
        return 1;
       
      }
      else{
        return 100;
        // Pass not match
      }
    }
  }
}




class Login extends Connection {
  public $id;

  const LOGIN_SUCCESSFUL = 1;
  const WRONG_PASSWORD = 10;
  const USER_NOT_REGISTERED = 100;
  
  protected function getUserData($usernameemail) {
    $result = mysqli_query($this->conn, "SELECT * FROM t_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    return mysqli_fetch_assoc($result);
}

public function idUser() {
    return $this->id;
}

  public function login($usernameemail, $password) {
      $row = $this->getUserData($usernameemail);

      // var_dump($row);
      if ($row) {
          
          if (password_verify($password, $row["password"])) {
              $this->id = $row["ID"];

             
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
              return self::LOGIN_SUCCESSFUL;
          } else {
              return self::WRONG_PASSWORD;
          }
      } else {
          return self::USER_NOT_REGISTERED;
      }
  }

  
}






class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM t_user WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
