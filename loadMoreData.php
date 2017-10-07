<?php

   require('connection.php');

   $sql = "SELECT * FROM images
         WHERE ID < '".$_GET['last_id']."' ORDER BY ID DESC LIMIT 4"; 

  $result = mysql_query($sql);
if(mysql_num_rows($result)>0){
   $json = include('data.php');
    return json_encode($json);
   }
   else{
   	$json = 1;
   	 echo json_encode($json);
   }
  
?>