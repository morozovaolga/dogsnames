<?php

require('database.php');

mb_internal_encoding("UTF-8");

if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
$keyword = trim($keyword); 
$keyword = stripslashes($keyword); 
$keyword = htmlspecialchars($keyword);
$keyword1 = mb_substr($keyword, 0, 1);
$keyword2 = mb_substr($keyword, 2, 2);
$search_query = "SELECT name FROM names WHERE name LIKE '%" . $keyword1 . "%" . $keyword2 . "%' LIMIT 100"; 
$query = mysqli_query($base, $search_query); 
    if (mysqli_num_rows($query) > 0) {
        $end_result = '';
        foreach($query as $q) {
            $result         = $q['name'];
            $bold           = '<span class="found">' . $keyword . '</span>';
            $end_result     .= '<li class="list-group-item">' . str_ireplace($keyword, $bold, $result) . '</li>';
        }
        echo $end_result;
    } else {
        echo '<li class="list-group-item">По вашему запросу ничего не найдено</li>';
    }
}
?>