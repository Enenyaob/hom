<?php

/** @var Connection $connection */
$connection = require_once 'notes_pdo.php';

$connection->removeNote($_POST['id']);

header('Location: view_notes.php');
