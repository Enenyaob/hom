<?php

$connection = require_once 'notes_pdo.php';
$notes = $connection->getNotes();

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $connection->removeNote($_POST['id']);
    header('Location: view_notes.php');
}






?>



<!DOCTYPE html>
<html>
<head>
    <title>view notes</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>



<div class="notes">
        <?php foreach ($notes as $note): ?>
            <div class="note">
                <div class="title">
                        <?php echo $note['title'] ?>
                </div>
                <div class="description">
                    <?php echo $note['description'] ?>
                </div>
                <small><?php echo date('d/m/Y H:i', strtotime($note['create_date'])) ?></small>
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post" class="form-horizontal">
                <!--<form action="delete.php" method="post">-->
                    <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                    <button class="close">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>