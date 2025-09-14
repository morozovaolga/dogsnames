<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <meta charset="UTF-8">
    <title>Поиск среди собачьих кличек</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript">

$(function() {

    $(".searchbutton").click(function() {
        var searchString = $("#searchbox").val();
        var data = 'search='+ searchString;
        if(searchString) {
            $.ajax({
                type: "POST",
                url: "search.php",
                data: data,
                beforeSend: function(html) { 
                    $("#results").html(''); 
               },
               success: function(html) { 
                    $("#results").show();
                    $("#results").append(html);
                    
              }
            });
        }
        return false;
    });
});
</script>
</head>
<body>
    <section>
    <h1>Поиск среди собачьих кличек</h1>

<input type="text" name="search" id="searchbox" maxlength="20" placeholder="Поиск">
<input type="submit" value="Поиск" class="searchbutton" /><br />
<ul id="results" class="update">
</ul>
<br>
 <h1>Добавление клички</h1>
<p>Добавляйте клички по одной, проверяйте перед отправкой</p>
    <form action="add.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="text" maxlength="20" name="addname" placeholder="Не более 20 символов">
            <button class="addbutton" type="submit">Добавить</button>
    </form>
    <h2>Какими кличками не называем:</h2>
    <ul>
        <li>В которых есть буквосочетание -марс-</li>
        <li>Двойными</li>
        <li>Человеческими именами</li>
    </ul>
    </section>
</body>
</html>