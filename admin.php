<?php

// session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli('localhost' ,'root', '', 'answers');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$answer = $mysqli->real_escape_string($_POST['answer']);

$_SESSION['answer'] = $answer;

$sql = "INSERT INTO admin (answer)"."VALUES ('$answer')";

if ($mysqli->query($sql) === true) {
    // $_SESSION['message'] = "Registeration successful! Added $username to the database!";
    header("location: home.php");

} 
}
     
?>

