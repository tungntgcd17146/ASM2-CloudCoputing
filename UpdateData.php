<!DOCTYPE html>
<html>
<title>HOME PAGE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="image/w3.css">
<style>
* {box-sizing: border-box}
img {vertical-align: middle;}
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}
.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 25%; /* Four links of equal widths */
  text-align: center;
}
.navbar a:hover {
  background-color: #000;
}
.navbar a.active {
  background-color: #4CAF50;
}
@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<head>
</head><body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="index.php" class="w3-bar-item w3-button">ATN shop</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="ConnectToDB.php" class="w3-bar-item w3-button">View</a>
      <a href="InsertData.php" class="w3-bar-item w3-button">Insert</a>
      <a href="UpdateData.php" class="w3-bar-item w3-button">Update</a>
      <a href="DeleteData.php" class="w3-bar-item w3-button">Delete</a>
    </div>
  </div>
</div>
</head>
<body>
  <h1>Update DATA TO DATABASE</h1>
</body>
<h1>Update DATA TO DATABASE</h1>
<?php
echo "Update database!";
?>
<ul>
    <form name="UpdateData" action="UpdateData.php" method="POST" >
<li>toyID:</li><li><input type="text" name="toyid" /></li>
<li>Toy Name:</li><li><input type="text" name="toyname" /></li>

<li><input type="submit" /></li>
</form>
</ul>
<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=postgres', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
       "host=ec2-18-233-137-77.compute-1.amazonaws.com;port=5432;user=cibttxrjklxbqp;password=be605ce69ac7c5cf26b6b3a833e65b243685409a9d385e0a9872bdd17299b098;dbname=dfuhjimp17l4vf",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  
$sql = "UPDATE toy SET  toyname = '$_POST[toyname]' WHERE toyid = '$_POST[toyid]'";
      $stmt = $pdo->prepare($sql);
if(is_null ($_POST[toyid])== FALSE)  {    
if($stmt->execute() == TRUE){
    echo "Record updated successfully.";
} else {
    echo "Error updating record. ";
}}
    
?>
</body>
</html>
