<?php
require_once 'php/includes/function.php';
require_once 'php/includes/pdo_connect.php';
// *** Validate request to login to this site.


if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $user_name =  htmlspecialchars(trim(post_data('user_name')));
    $password = htmlspecialchars(trim(post_data('password')));
    $role1 =  htmlspecialchars(trim(post_data('role')));

    validateUsername($user_name, $errors);
    validatePassword($password, $errors);
    validateRole($role1, $errors);
    if(!empty($errors)){
			$status = 'Oh Snap! Ensure required fields are filled correctly';
    }
   
      $statement = $conn->prepare("SELECT user_id,  user_name, role, secure_pass FROM  user_pass WHERE user_name = :user_name  AND role = :role" );
        $statement->bindValue('user_name', $user_name);
        $statement->bindValue('role', $role1);
        $statement->execute();
        $count = $statement->rowCount();
    //$results = $statement->fetchALL(PDO::FETCH_ASSOC);
        
    
    
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


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RCCG Hom Ejigbo | Portal</title>
    <?php include("php/meta.php"); ?>
    
    <link href="css/custom.css" rel="stylesheet">


    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">



    <style>
 
body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #fff !important;
}

h1{
  font-family: serif;
    font-size: 30px;
    color: #29272778;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      #select{
        margin-top: -10px;
        border-top-left-radius: 0;
       border-top-right-radius: 0;
       color: #ab9d9d;
          }


      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  
  </head>

  <body class="text-center">

  <form action="" method="post" class="form-signin" id="portal-form">
  <img class="mb-4"  src="images/logo.png" alt="Houseofmercy" width="130" height="70">
  <h1 >Please sign in</h1>
                  <?php if(isset($status)) : ?>
										<p class='text-center text-uppercase' style='color:red'><?php echo $status; ?></p>

									<?php elseif(isset($msg)) : ?>
										<p class='text-center text-uppercase' style='color:green'><?php echo $msg; ?></p>
									
									<?php else : ?>
										
									<?php endif; ?> 
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="text" class="form-control" name="user_name" id="uname" placeholder="User Name" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>
  <label for="role" class="sr-only">Role</label>
    <select name="role" class="form-control" id="select">
                            <option value="">Select role</option>
                                  <option value="Admin">Admin</option>
                                  <option value="Counselor">Counselor</option>
                                  <option value="Pastorate">Pastorate</option>
                        </select>
  <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy;obinna 2021</p>
</form>




  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="plugins/jquery.min.js"></script>
    
    <!-- Modernizr javascript -->
    <script type="text/javascript" src="plugins/modernizr.js"></script>
    <!-- Magnific Popup javascript -->
    <script type="text/javascript" src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Appear javascript -->
    <script type="text/javascript" src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <!-- Count To javascript -->
    <script type="text/javascript" src="plugins/jquery.countTo.js"></script>
    <!-- Parallax javascript -->
    <script src="plugins/jquery.parallax-1.1.3.js"></script>
    <!-- Contact form -->
    <script src="plugins/jquery.validate.js"></script>
    <!-- Owl carousel javascript -->
    <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.js"></script>
    <!-- SmoothScroll javascript -->
    <script type="text/javascript" src="plugins/jquery.browser.js"></script>
    <script type="text/javascript" src="plugins/SmoothScroll.js"></script>
    <!-- Initialization of Plugins -->
    <script type="text/javascript" src="js/template.js"></script>
    <!-- Custom Scripts -->
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
