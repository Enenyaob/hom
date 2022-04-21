<?php
  if($_SERVER['REQUEST_METHOD'] ==='POST'){
  $name = htmlspecialchars(trim($_POST['name2']));
  $email = htmlspecialchars(trim($_POST['email2']));
  $subject = htmlspecialchars(trim($_POST['subject2']));
  $message = htmlspecialchars(trim($_POST['message2']));
  header('Content-Type: application/json');

  
if (empty($name) || empty($email) || empty($message)){
  header("Location:javascript://history.go(-1)");
  # code...
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  header("Location:javascript://history.go(-1)");
}else{
  $header = "From: " . $email;
  $message2 ="You have received a message from " . $name . ".\n\n" . $message;

  
  $myMail = " "; //insert email here
 var_dump($myMail, $subject, $message2, $header);

      if (mail ($myMail, $subject, $message2, $header)) {
         header("Location:../index?mailsend");
    }else{
      echo 'Something went wrong';
       header("Location:../index?error");
    }
  }    

}else{
  echo 'Error!';
}


?>





