<?php if (isset($id)){ 
	mysql_select_db($database2);
	?>
<script>MM_preloadImages('images/sm_b02.jpg','images/sm_b12.jpg','images/sm_b22.jpg','images/sm_b32.jpg','images/sm_b42.jpg');</script>
<table border="0" cellpadding="0" cellspacing="0" width=100%>
  <tr><td class=masblack align=center><table border="0" cellpadding="0" cellspacing="0"><tr>
     <td><img src=images/sm_br.jpg></td><td><a href="t8_class.php" onMouseOver="MM_nbGroup('over','sm_b11','images/sm_b12.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="sm_b11" src="images/sm_b11.jpg" border="0" onLoad="" width="154" height="20"></a></td>
        	<?php $result = mysql_query("SELECT tc_paid FROM t8_playaz WHERE tc_pid='$id'"); 
        		if (@MYSQL_RESULT($result,0,"tc_paid")=='Y'){
        			?>      <td><a href="t8_hiclass.php" onMouseOver="MM_nbGroup('over','sm_b01','images/sm_b02.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="sm_b01" src="images/sm_b01.jpg" border="0" onLoad="" width="154" height="20"></a></td>
  <?php } ?>
      <td><a href="t8_risultati.php" onMouseOver="MM_nbGroup('over','sm_b21','images/sm_b22.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="sm_b21" src="images/sm_b21.jpg" border="0" onLoad="" width="154" height="20"></a></td>
            <td><a href="t8_scheda.php?zid=<?php echo $id; ?>"  onMouseOver="MM_nbGroup('over','sm_b31','images/sm_b32.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="sm_b31" src="images/sm_b31.jpg" border="0" onLoad="" width="154" height="20"></a></td>
    <td><a href="t8_rulez.php"  onMouseOver="MM_nbGroup('over','sm_b41','images/sm_b42.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="sm_b41" src="images/sm_b41.jpg" border="0" onLoad="" width="154" height="20"></a></td>
         <td><img src=images/sm_bl.jpg></td></tr></table></td></tr></table>
<br><?php } ?>