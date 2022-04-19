<?php
require_once 'php/includes/function.php';
require_once 'php/includes/pdo_connect.php';
// *** Validate request to login to this site.


if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $user_name =  htmlspecialchars(trim(post_data('user_name')));
    $password = htmlspecialchars(trim(post_data('password')));
    $role =  htmlspecialchars(trim(post_data('role')));

    validateUsername($user_name, $errors);
    validatePassword($password, $errors);
    validateRole($role, $errors);
    if(!empty($errors)){
			$status = 'Oh Snap! Ensure required fields are filled correctly';
    }else{
   
      $statement = $conn->prepare("SELECT user_id,  user_name, role, secure_pass FROM  user_pass WHERE user_name = :user_name  AND role = :role" );
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('role', $role);
        $statement->execute();
        $count = $statement->rowCount();
        
//new
     if ($count > 0){
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $passCheck = password_verify($password, $row['secure_pass']);
        if ($passCheck == false) {
          $status = "Login Failed! check your login details and try again.";
        }elseif ($passCheck == true) {
          session_start();
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['MM_Username'] = $row['user_name'];
          $_SESSION['role'] = $row['role'];

          if($_SESSION['role'] == 'Pastorate'){
            header("Location: pastorate.php");
          }
          if($_SESSION['role'] == 'Counselor'){
            header("Location: counselor.php");
          }
          if($_SESSION['role'] == 'Admin'){
            header("Location: admin.php");
          }
        }else{
          $status ="Oh Snap! Login Failed, Check if you have verified your account Please try again.";
        }
        $row = null;
      }
     }else{
      $status = "No user found.";
     }
     $statement = null;
  }
}

