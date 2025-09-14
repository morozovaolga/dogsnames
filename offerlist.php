<?php
require('database.php');
mb_internal_encoding("UTF-8");
$offerlist = "SELECT * FROM `potentional_names`";
$query = mysqli_query($base, $offerlist); 

        $end_result = '';
        foreach($query as $q) {
            $result         = $q['name'];
            $end_result.= '<li class="list-group-item">' . $result . '</li>';
        }

