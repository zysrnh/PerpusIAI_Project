<?php

function now(){
global $koneksi_db;
if (preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', getenv("HTTP_X_FORWARDED_FOR")) == ''){
$uipanda = getenv('REMOTE_ADDR');
}else{
$uipanda = getenv('HTTP_X_FORWARDED_FOR');
}
$uproxyserver=getenv("HTTP_VIA");
$uipproxy=getenv("REMOTE_ADDR");
$uhost=gethostbyaddr($uipproxy);
$utime=time();
$now=$utime-600; // (in seconds)

$koneksi_db->sql_query("delete from useronline where timevisit<$now");
$uexists=$koneksi_db->sql_numrows($koneksi_db->sql_query("select id from useronline where ipproxy='$uipproxy'"));
if ($uexists>0){
$koneksi_db->sql_query("update useronline set timevisit='$utime' where ipproxy='$uipproxy'");
} else {
$koneksi_db->sql_query("insert into useronline (ipproxy,host,ipanda,proxyserver,timevisit) values ('$uipproxy','$uhost','$uipanda','$uproxyserver','$utime')");
}

$rs=$koneksi_db->sql_query("select * from useronline");
$jmlonline=$koneksi_db->sql_numrows($koneksi_db->sql_query("select id from useronline"));

return "<b>$jmlonline</b>";

}

function day(){
global $koneksi_db;
if (preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', getenv("HTTP_X_FORWARDED_FOR")) == ''){
$uipanda = getenv('REMOTE_ADDR');
}else{
$uipanda = getenv('HTTP_X_FORWARDED_FOR');
}
$uproxyserver=getenv("HTTP_VIA");
$uipproxy=getenv("REMOTE_ADDR");
$uhost=gethostbyaddr($uipproxy);
$utime=time();
$day=$utime-86400; // (in seconds)

$koneksi_db->sql_query("delete from useronlineday where timevisit<$day");
$uexists=$koneksi_db->sql_numrows($koneksi_db->sql_query("select id from useronlineday where ipproxy='$uipproxy'"));

if ($uexists>0){
$koneksi_db->sql_query("update useronlineday set timevisit='$utime' where ipproxy='$uipproxy'");
} else {
$koneksi_db->sql_query("insert into useronlineday (ipproxy,host,ipanda,proxyserver,timevisit) values ('$uipproxy','$uhost','$uipanda','$uproxyserver','$utime')");
}

$rs=$koneksi_db->sql_query("select * from useronlineday");
$jmlonline=$koneksi_db->sql_numrows($koneksi_db->sql_query("select id from useronlineday"));

return "<b>$jmlonline</b>";


}

function month(){
global $koneksi_db;
if (preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', getenv("HTTP_X_FORWARDED_FOR")) == ''){
$uipanda = getenv('REMOTE_ADDR');
}else{
$uipanda = getenv('HTTP_X_FORWARDED_FOR');
}

$uproxyserver=getenv("HTTP_VIA");
$uipproxy=getenv("REMOTE_ADDR");
$uhost=gethostbyaddr($uipproxy);
$utime=time();
$month=$utime-2592000; // (in seconds)
//$koneksi_db->sql_query("delete from useronlinemonth where timevisit < ".$month."");
$uexists=$koneksi_db->sql_numrows($koneksi_db->sql_query("select id from useronlinemonth where ipproxy='$uipproxy'"));

if ($uexists>0){
$koneksi_db->sql_query("update useronlinemonth set timevisit='$utime' where ipproxy='$uipproxy'");
} else {
$koneksi_db->sql_query("insert into useronlinemonth (ipproxy,host,ipanda,proxyserver,timevisit) values ('$uipproxy','$uhost','$uipanda','$uproxyserver','$utime')");
}

$rs=$koneksi_db->sql_query("select * from useronlinemonth");
$jmlonline=$koneksi_db->sql_numrows($koneksi_db->sql_query("select id from useronlinemonth"));

return "<b>$jmlonline</b>";



}

?>