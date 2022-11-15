<?php
if(isset($conid)){
include ("conconfig.php");
include ("../connect.php");
include ("../cookie.php");
include ("construct1.php");
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="60"><img src="<?php echo $condir; ?>/crul.gif" width="60" height="481"></td>
            <td><table width="100%"  border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#000000"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="<?php echo $condir; ?>/spacer.gif" width="19" height="19"></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="701" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#000000"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                          <tr>
                            <td width="100%" class="rulesbox"><?php 
                            	$result=MYSQL_QUERY("SELECT rules from contest WHERE id='$conid'");
	echo MYSQL_RESULT($result,0,"rules");
                            ?></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="39" align="right" valign="bottom" class="fontreg">&copy;2007 SPALANCA SOFTWORKS</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="60" border="0" cellspacing="0" cellpadding="0">

            </table></td>
            </tr>
        </table>
<?php
include ("construct2.php");
}
?>