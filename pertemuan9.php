<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $nimErr = $emailErr = "";
$name = $nim = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Nama wajib diisi";
  } else {
    $name = test_input($_POST["name"]);
 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Hanya Huruf";
    }
  }
  
  if (empty($_POST["nim"])) {
    $nimErr = "NIM wajib diisi";
  } else {
    $nim = test_input($_POST["nim"]);
    if (!is_numeric($nim)) {
      $nimErr = "Hanya angka";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email wajib diisi";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Email tidak valid";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>FORM SEDERHANA</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  NIM: <input type="text" name="nim">
  <span class="error">* <?php echo $nimErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $nim;
echo "<br>";
echo $email;
?>

</body>
</html>
