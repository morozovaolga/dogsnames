<?php 
require('database.php');

if (isset($_POST['addname'])) {
    $newname = htmlspecialchars($_POST['addname']);
}


$newname = trim($newname); 
$newname = stripslashes($newname); 


// Проверки
$error = '';
if (!preg_match('/^[А-ЯЁ][а-яё]{1,19}$/u', $newname)) {
	$error = 'Кличка должна быть написана кириллицей, начинаться с заглавной буквы и содержать от 2 до 20 символов.';
}
if (preg_match('/["\'`;]|(SELECT|INSERT|UPDATE|DELETE|DROP|ALTER|--)/i', $newname)) {
	$error = 'Кличка содержит недопустимые символы или команды.';
}

if ($error) {
	echo "<p style='color:red;'>Ошибка: $error</p>";
	exit;
}


function addname($base, $newname) {
$result = "INSERT INTO `names` (`name`) VALUES ('$newname')";


	// Проверка на уникальность
	$check_query = "SELECT COUNT(*) FROM `names` WHERE `name` = '" . mysqli_real_escape_string($base, $newname) . "'";
	$check_result = mysqli_query($base, $check_query);
	$row = mysqli_fetch_row($check_result);
	if ($row[0] > 0) {
		echo "<p style='color:red;'>Ошибка: такая кличка уже есть в базе!</p>";
		mysqli_close($base);
		return;
	}

	$result = "INSERT INTO `names` (`name`) VALUES ('" . mysqli_real_escape_string($base, $newname) . "')";
	if (mysqli_query($base, $result)) {
		echo "<p style='color:green;'>Новая кличка успешно добавлена!</p>";
	} else {
		echo "Error";
	}
	mysqli_close($base);
}
addname($base, $newname);