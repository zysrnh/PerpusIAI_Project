<?php


if (defined('cms-KONTEN')) {
exit;	
}
ob_start('ob_gzhandler');
include "../../ikutan/session.php";
include '../../ikutan/config.php';
include '../../ikutan/fungsi.php';
include '../../ikutan/mysqli.php';


$content = '

<style type="text/css">

BODY {
margin : 0 0 0 0;
padding : 0 0 0 0;
width : auto; 

	font-family: "Poppins", sans-serif;
	font-size: 14px;

}
td,body
{
	
	font-family: "Poppins", sans-serif;
	font-size: 14px;

color:#333333;
}
a:link
{
color:#517DBF;
text-decoration:none;
}
a:visited
{
color:#517DBF;
text-decoration:none;
}
a:hover
{
color:red;
text-decoration:underline;
}
</style>
';
	
	
function hideEmail($email){
if (empty($email)) return '';
list($user,$domain) = explode ('@',$email);
if (empty($user) or empty($domain)) return $email;
$lenUSER = strlen($user);
$rand = rand(1,$lenUSER);
$out = '';
for($i=0;$i<$rand;$i++){
$out .= '&#'.ord($user[$i]).';';	
}
$out .= substr($user,$rand);	
return $out.'@'.$domain;
}


$content .= '<table>';



global $koneksi_db,$maxadmindata;

$perintah = "SELECT * FROM shoutbox ORDER BY id DESC LIMIT 10";
$hasil = $koneksi_db->sql_query( $perintah );
$no = 0 ;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$WAKTu = $data['waktu'];	
$NAMA = $data['nama'];
$EMAIL = hideEmail($data['email']);
$ISI = $data['isi'];
$KET = $data['ket'];
$pecah = explode ('|', $KET);

$ISI = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.){2}+)(\/)?(\S+)?/i', '<a href="\0" target="_blank">Klik Here</a>', $ISI);	
$ISI = wordwrap($ISI, 20, ' ', 1);

if ($no % 2 == 0) {
$class = '';
}else {
$class = '';	
}	
$content .= "<tr $class><td style='padding:5px;text-align:right;font-size:14px;font-family: \"Poppins\", sans-serif;'><a href=\"mailto:$EMAIL\" title=\"Ip: $pecah[0]
$pecah[1]\">" .substr($NAMA,0,15)."</a></br></td></tr>\n";
$content .= "<tr $class><td><span style=\"font-color:gray;font-size:13px;\">$ISI<br/>$WAKTu</span></td></tr>\n";

$no++;	
}
//mysql_free_result ($hasil);


$content .= '</table>';
echo '<div id="marquee1" style=" overflow:hidden; z-index:0">
            <marquee width="100%" height="150" direction="up" scrollamount="1" scrolldelay="60" onmouseover="this.stop()" onmouseout="this.start()">';
echo $content;

echo '</marquee>     </div>';
echo '</body></html>';
?>