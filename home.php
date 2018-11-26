<link rel="stylesheet" href="form.css">

<?php session_start();
include 'admin.php'
 ?>

<div class="body content">
   <div class="welcome">
   	 <div class="alert alert-success"><?= $_SESSION['message']?></div>
   	 <span id="alert" class="user"> <b id="aler">welcom :</b> <?= $_SESSION['username']?></span>

   	 <?php
      $mysqli = new mysqli('localhost' ,'root', '', 'accounts');
      $sql = 'SELECT username , aq FROM users';
      $result = $mysqli->query($sql);
   	 ?>


 <?php
 
$_SESSION['message'] = '';

$mysqli = new mysqli('localhost' ,'root', '', 'answers');

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// $answer = $mysqli->real_escape_string($_POST['answer']);

// $_SESSION['answer'] = $answer;

// $sql = "INSERT INTO admin (answer)"."VALUES ('$answer')";

// if ($mysqli->query($sql) === true) {
    $sql = 'SELECT id, answer FROM admin';
    $res = $mysqli->query($sql);
     
  // } 
// }
     
?>
      
      <div id="registered">
       <span id="aler"> Here is our collection of the QA ★★★ </span>
       <?php
          while($row = $result->fetch_assoc()) {
          	echo "<span><div class='userlist'><span>$row[username]:<span>";
            echo "<p id='color'>$row[aq]</p>
        <form class='form' action='' method='post' enctype='multipart/form-data' autocomplete='off'>
        <input type='text' name='answer' placeholder='Write your Answer'>
        <input type='submit' value='Submit' name='register' class='btn btn-block btn-primary' />
        </form>
        </div><span>";
          while ($row = $res->fetch_assoc()) {
             $fromID = $row['id'];
        echo "<span><div class='answers'><span>$row[answer]:<span>";
        };
        }
       
           
       ?>
   </div>