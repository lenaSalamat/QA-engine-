<?php
session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli('localhost' ,'root', '', 'accounts');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if ($_POST['password'] == $_POST['confirmpassword']){
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = md5($_POST['password']);
    $aq = $mysqli->real_escape_string($_POST['aq']);

    $_SESSION['username'] = $username;
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
if($result->num_rows > 0){
  // $_SESSION['message'] = 'User with this email already exists!';
  $sql = "INSERT INTO users (username ,aq)"."VALUES ('$username','$aq')";
  if ($mysqli->query($sql) === true) {
    // $_SESSION['message'] = "Registeration successful! Added $username to the database!";
    header("location: home.php");
  } else {
      header("location: form.php");
 } 
} 
// if ($mysqli->query($sql) === true) {
//     // $_SESSION['message'] = "Registeration successful! Added $username to the database!";
//     header("location: home.php");

// } 
// else {
//   $_SESSION['message'] = "User could not be added to the database!";
// }

  } 
  else {
    $_SESSION['message'] = "Two password do not match";
  }
}

?>



<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css"/>
<div class="body-content">
  <div class="module">
    <h1>Log in</h1>
    <form class="form" action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <textarea id="subject" type="text" name="aq" style="height:150px"placeholder="Add your Question"></textarea>
      <input type="submit" value="Submit" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>