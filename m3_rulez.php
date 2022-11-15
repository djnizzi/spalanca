<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
mysql_select_db($database2);
include ("sm_structure.php");
include ("m3_login.php");
include ("m3_nav.php");

?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center"><img src="images/sm_rego.jpg" width="338" height="20"></td>
  </tr>
  <tr>
    <td class="mastoxic">
<?php include("m3_rulezcore.php"); ?>    
    </td>
  </tr>
</table>

<?php  include ("m3_copy.php");
?>

