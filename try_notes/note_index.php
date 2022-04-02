<?php

$connection = require_once 'try_new_oop.php';
// Read notes from database

if($_SERVER['REQUEST_METHOD'] ==='POST'){
 $connection->addRequest($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
<div>
    <form class="new-note" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post" class="form-horizontal">
    <!-- <form class="new-note" action="create.php" method="post"> -->
        <input type="hidden" name="id" value="">
        <input type="text" name="title" placeholder="Name" autocomplete="off"
               value=" ">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Note Description"></textarea>
        
        <button>New note</button>

    </form>
</div>
</body>
</html>
