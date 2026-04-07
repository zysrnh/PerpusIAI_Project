<h1 class="mb-0">Themes Setting</h1>
<?php



if (!defined('cms-ADMINISTRATOR')) {
	Header("Location: ../index.php");
	exit;
}

if (!cek_login()){
    warning("Access Denied!.... You Must Login First","index.php", 3, 2);
    exit;
}

//$index_hal = 1;

$content='';
$no=0;
 
include 'modul/functions.php';





$_GET['str'] = isset($_GET['str']) ? $_GET['str'] : null;
$_GET['sort'] = isset($_GET['sort']) ? $_GET['sort'] : NULL;
$_GET['order'] = isset($_GET['order']) ? $_GET['order'] : NULL;

$sort_url_orderby = $_GET['sort'] == 'asc' ? 'dsc' : 'asc';

function sortorder($sort_url_orderby,$field,$judul){
//order name
$qs = '';
	
 $arr = explode("&",$_SERVER["QUERY_STRING"]);
      
      if (is_array($arr)) {
        for ($i=0;$i<count($arr);$i++) {
          if (!is_int(strpos($arr[$i],"sort=")) && !is_int(strpos($arr[$i],"order=")) && trim($arr[$i]) != "") {
	          list ($kunci,$isi) = explode ('=',$arr[$i]);
	          $isi = urldecode($isi);
	          $isi = urlencode ($isi);
	          
              $qs .= $kunci . '=' . $isi ."&amp;";
          }
        }
      }	
	



$sort_url_name = '<a title="Sort Berdasarkan '.$judul.'" href="?'.$qs.'&amp;sort='.$sort_url_orderby.'&amp;order='.$field.'">'.$judul.'</a>';
$sort_url_name_img = '';
if (isset($_GET['sort']) && $_GET['order'] == $field){
$sort_url_name_img = $_GET['sort'] == 'asc' ? '&nbsp;<IMG height=10 alt=^ src="gambar/_arrowup.gif" width=10 align=absMiddle border=0>' : '&nbsp;<IMG height=10 alt=^ src="gambar/_arrowdown.gif" width=10 align=absMiddle border=0>';
}

return $sort_url_name.$sort_url_name_img;
}


switch (@$_GET['action']){


	
	
	
	
	
	
	
default:


$id = $_GET['id'];

$datawajibdiisi = array ('header');

if (isset ($_POST['submit'])){
	
	
$error = '';	
	
foreach ($datawajibdiisi as $k=>$v){
	
	if (empty ($_POST[$v])){
		input_alert($v);
		$error .= '<li>Error at Form : '.$v.'</li>';
	}
}

$header = cleantext($_POST['header']);
$footer = cleantext($_POST['footer']);

if ($error != ''){
	$content .= '<div class=error>'.$error.'</div>';
}else {
	$insert = $koneksi_db->sql_query ("UPDATE `mod_data_themes` SET `header`='$header',`footer`='$footer' WHERE `id` = '1'");
	if ($insert) {
		$content .= '<div class=sukses>Data berhasil diperbarui.</div>';

		}
	else {
		$content .= '<div class=error>Data Gagal Di Update<br>'.mysqli_error().'</div>';
		if (eregi ($no_induk,mysqli_error())) {
			input_alert('no_induk');
		}
		
		
		}
	
}	
	
	
	
	
}

if (!isset ($_POST['submit'])){
$query = $koneksi_db->sql_query ("SELECT * FROM `mod_data_themes` WHERE `id` = '1'");
$getdata = $koneksi_db->sql_fetchrow($query);

$_POST = $getdata;
$header = $getdata['header'];
$footer = $getdata['footer'];
}

$content .= '
<form method="POST" action="" enctype="multipart/form-data" name="input_jabatan">
<table width=100%>

<tr>
<td>Sub Header</td>
<td>:</td>
<td><select name="header">
<option value="'.$header.'">'.$header.'  </option>
<option value="Light">Light  </option>
<option value="Dark">Dark </option>
<option value="Orange">Orange </option>
<option value="Blue">Blue </option>
<option value="Quaternary">Quaternary </option>
<option value="Tertiary">Tertiary </option>
</select></td>
</tr>

<tr>
<td>Footer</td>
<td>:</td>
<td><select name="footer">
<option value="'.$footer.'">'.$footer.'  </option>
<option value="Light">Light  </option>
<option value="Dark">Dark </option>
<option value="Orange">Orange </option>
<option value="Blue">Blue </option>
<option value="Quaternary">Quaternary </option>
<option value="Tertiary">Tertiary </option>
</select></td>
</tr>


<tr>
<td></td>
<td></td>
<td><input type="submit" name="submit" value="Edit"></td>
</tr>

</table>
</form>
';



break;	
	
	
	

}














/////////////
echo $content;

?> 