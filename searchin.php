
<?php require_once("connection.php"); ?>
<?php
if(!empty($_POST["referal"])){ //Принимаем данные

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));

    $query =mysql_query("SELECT * from tags WHERE name_tags LIKE '%$referal%' LIMIT 3");
while($row=mysql_fetch_array($query)) {
        echo "\n<li>".$row["name_tags"]."</li>"; //$row["name"] - имя поля таблицы
    }

}
?>