<?php 
require('database.php');
mb_internal_encoding("UTF-8");
$newname = "";
if (isset($_POST['offer'])) {
    $newname = htmlspecialchars($_POST['offer']);
}
$newname = trim($newname); 
$newname = stripslashes($newname); 

$newoffer = "INSERT INTO `potentional_names` (`name`) VALUES ('$newname')";

if (mysqli_query($base, $newoffer)) {

return;
	} else {
console.log("Error");
	}
	mysqli_close($base);