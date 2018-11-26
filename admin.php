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

<!-- 
<link rel="stylesheet" href="form.css" type="text/css">
<form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
<input type='text' name='answer' placeholder="Write your Answer">
<input type="submit" value="Submit" name="register" class="btn btn-block btn-primary" />
</form>  -->