<?php
    while($row=mysql_fetch_assoc($result))
    {
?>
<div class="col-lg-3 photo post-id text-center" id="<?php echo $row['ID']; ?>">
	
<img src="<?php echo $row['catalog']?>/<?php echo $row['ser_name']?>"  height="200"    alt="">
	
</div>
<?php
    }
?>

  	

