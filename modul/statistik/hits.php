<?php

$perintah = "SELECT * FROM usercounter WHERE id=1";
$hasil =$koneksi_db->sql_query( $perintah );
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
	$hits=$data[3];
}

?>
