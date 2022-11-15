<table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="380"><img src="<?php echo $condir; ?>/spcsplash.jpg" width="661" height="380"></td>
              </tr>
              <tr>
                <td bgcolor="#999999"><table  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td><table width="100%"  border="0" cellspacing="1" cellpadding="0">
                          <tr>
                            <td width="19"><img src="<?php echo $condir; ?>/clat.gif" width="19" height="99"></td>
<?php
for ($i=0;$i<5;$i++) {
$result = mysql_query("SELECT entid,euid,name FROM contentries WHERE conid='$conid' ORDER BY eposted DESC LIMIT $i,1");	
if (@MYSQL_RESULT($result,0,"entid")==null){print("<td class=homelat");print($i+1);print(">&nbsp;</td>");}else
{printf("<td class=homelat%s><a href=conenter.php?conid=%s&entid=%s><img src=%s/thumbs/%s-entryq.jpg border=0 style=\"filter:alpha(opacity=40);\" onmouseover=\"high(this)\" onmouseout=\"low(this)\" class=entry alt=\"%s
by
%s\"></a></td>",$i+1,$conid,MYSQL_RESULT($result,0,"entid"),$conid,MYSQL_RESULT($result,0,"entid"),MYSQL_RESULT($result,0,"name"),MYSQL_RESULT($result,0,"euid"));
}
} ?>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                    <td valign="bottom" bgcolor="#999999"><img src="<?php echo $condir; ?>/whitepix.gif" width="19" height="1"></td>
                    <td><table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                      <tr>
                        <td><table width="100%"  border="0" cellspacing="1" cellpadding="0">
                          <tr>
                            <td width="19"><img src="<?php echo $condir; ?>/cran.gif" width="19" height="99"></td>
<?php

$result = mysql_query("SELECT entid,euid,name FROM contentries WHERE conid='$conid' ORDER BY RAND() DESC LIMIT 0,1");	
if (@MYSQL_RESULT($result,0,"entid")==null){print("<td class=homeran>&nbsp;</td>");}else
{printf("<td class=homeran%s><a href=conenter.php?conid=%s&entid=%s><img src=%s/thumbs/%s-entryq.jpg border=0 style=\"filter:alpha(opacity=40);\" onmouseover=\"high(this)\" onmouseout=\"low(this)\"  class=entry alt=\"%s
by
%s\"></a></td>",$i+1,$conid,MYSQL_RESULT($result,0,"entid"),$conid,MYSQL_RESULT($result,0,"entid"),MYSQL_RESULT($result,0,"name"),MYSQL_RESULT($result,0,"euid"));
} ?>                                             
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="111" valign="top"><table width="179
" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top"><table width="99"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="right" bgcolor="#999999" style="border-top:
1px solid #FFFFFF"><img src="<?php echo $condir; ?>/cht1.gif" width="30" height="80"></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#999999"><img src="<?php echo $condir; ?>/cht2.gif" width="30" height="80"></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#999999"><img src="<?php echo $condir; ?>/cht3.gif" width="30" height="80"></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#999999"><img src="<?php echo $condir; ?>/cht4.gif" width="30" height="80"></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#999999"><img src="<?php echo $condir; ?>/cht5.gif" width="30" height="80"></td>
                  </tr>
                </table></td>
                <td><table width="81" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="1" cellpadding="0">
                    
<?php
for ($i=0;$i<5;$i++) {
$result = mysql_query("SELECT entid,euid,name FROM contentries WHERE conid='$conid' ORDER BY voto DESC LIMIT $i,1");	
if (@MYSQL_RESULT($result,0,"entid")==null){print("<tr><td class=hometop");print($i+1);print(">&nbsp;</td></tr>");}else
{printf("<tr><td class=hometop%s><a href=conenter.php?conid=%s&entid=%s><img src=%s/thumbs/%s-entryq.jpg height=75 width=75 style=\"filter:alpha(opacity=40);\" onmouseover=\"high(this)\" onmouseout=\"low(this)\"  border=0 class=entry alt=\"%s
by
%s\"></a></td></tr>",$i+1,$conid,MYSQL_RESULT($result,0,"entid"),$conid,MYSQL_RESULT($result,0,"entid"),MYSQL_RESULT($result,0,"name"),MYSQL_RESULT($result,0,"euid"));
}
} ?>

                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr><td colspan="2"><table cellpadding="0" cellspacing="0" border="0"><tr><td align="center" valign="middle" bgcolor="#999999" height="39" class="fontreg"><?php
$result = mysql_query("SELECT count(*) as entries from contentries WHERE conid='$conid'");	              

            print( "<strong>".MYSQL_RESULT($result,0,"entries")."</strong> opere in concorso<br>");
$result = mysql_query("SELECT count(*) as contestants from contentries WHERE conid='$conid' GROUP BY euid");	              

            print( "<strong>".mysql_num_rows($result)."</strong> partecipanti");

                                  ?></td></tr><tr><td><img src="<?php echo $condir; ?>/whitepix.gif" width="179" height="1"></td></tr><tr>
<td align="center" valign="middle" bgcolor="#999999" height="39" class="fontreg">created by nizzi <br>
                  &copy;2004 LETH/\L SOFTWORKS</td></tr></table></td></tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table></form>
</body>
</html>
