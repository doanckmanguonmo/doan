<?php
$list = $duan->getRand(10);
foreach($list as $r)
{
	?>
    <div class=book>
    	<?php echo $r["tenduan"];?>
    </div>
    <?php	
}
?>