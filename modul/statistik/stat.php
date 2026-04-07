<?php


ob_start();
echo "<table width=100%>";
include "modul/statistik/counter.php";
include "modul/statistik/online.php";
include "modul/statistik/hits.php";
echo "
<tr>
<td style='padding-right:8px;'><img src=\"images/8.gif\" border=\"0\" alt=\"\" /><td/><td style='padding-right:8px;'> Visitors <td/><td style='padding-right:8px;'>:<td/><td style='padding-right:8px;'><b>$theCount</b> Visitor<td></tr><tr>
<td><img src=\"images/9.gif\" border=\"0\" alt=\"\" /><td/><td> Hits <td/><td>:<td/><td><b>$hits</b> hits<td></tr><tr>
<td><img src=\"images/10.gif\" border=\"0\" alt=\"\" /><td/><td> Month <td/><td>:<td/><td><b>".month()."</b> Users<td></tr><tr>
<td><img src=\"images/8.gif\" border=\"0\" alt=\"\" /> <td/><td>Today <td/><td>:<td/><td> <b>".day()."</b> Users<td></tr><tr>
<td><img src=\"images/9.gif\" border=\"0\" alt=\"\" /><td/><td> Online  <td/><td>:<td/><td> <b>".now()."</b> Users<td><tr>
</table>";
$out = ob_get_contents();
ob_end_clean();
?>
