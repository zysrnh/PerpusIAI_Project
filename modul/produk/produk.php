<h1 class="mb-0">Pesan Buku</h1>
<a href="index.php?pilih=produk&amp;modul=yes">List Buku</a> | 
<a href="index.php?pilih=produk&amp;modul=yes&amp;action=cari">Cari Judul Buku</a>


<?php






$index_hal = 1;
$content='';
$tampil='';
$no=0;
include 'modul/functions.php';



$_GET['str'] = isset($_GET['str']) ? $_GET['str'] : null;
$_GET['sort'] = isset($_GET['sort']) ? $_GET['sort'] : NULL;
$_GET['order'] = isset($_GET['order']) ? $_GET['order'] : NULL;

$sort_url_orderby = $_GET['sort'] == 'asc' ? 'dsc' : 'asc';

function sortorder($sort_url_orderby,$field,$nama){
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
	



$sort_url_name = '<a title="Sort Berdasarkan '.$nama.'" href="?'.$qs.'&amp;sort='.$sort_url_orderby.'&amp;order='.$field.'">'.$nama.'</a>';
$sort_url_name_img = '';
if (isset($_GET['sort']) && $_GET['order'] == $field){
$sort_url_name_img = $_GET['sort'] == 'asc' ? '&nbsp;<IMG height=10 alt=^ src="gambar/_arrowup.gif" width=10 align=absMiddle border=0>' : '&nbsp;<IMG height=10 alt=^ src="gambar/_arrowdown.gif" width=10 align=absMiddle border=0>';
}

return $sort_url_name.$sort_url_name_img;
}


switch (@$_GET['action']){

	
	
	


default:

if (isset ($_POST['deleted'])){
	if (is_array (@$_POST['delete'])){
	foreach ($_POST['delete'] as $k=>$v){
		$query = $koneksi_db->sql_query ("DELETE FROM `mod_data_produk` WHERE `id`='$v'");
	}
	}
	
}



$query_add = '';
if (isset ($_GET['str']) && !empty($_GET['str'])){
	$str = substr($_GET['str'],0,1);
$query_add .= "WHERE LEFT (`nama`,1) = '$str'";
}




$num = $koneksi_db->sql_query("SELECT `id` FROM `mod_data_produk`");
$jumlah = $koneksi_db->sql_numrows ($num);
//mysql_free_result ($num);

$limit = 20;
if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}else {
$offset = int_filter ($_GET['offset']);	
}

$a = new paging ($limit);

// Pembagian mod_data_produk dimulai
 if (!isset ($_GET['pg'],$_GET['stg'])){
	  $_GET['pg'] = 1;
	  $_GET['stg'] = 1;
  }
  
  
$qs = '';
	
 $arr = explode("&",$_SERVER["QUERY_STRING"]);
      
      if (is_array($arr)) {
        for ($i=0;$i<count($arr);$i++) {
          if (!is_int(strpos($arr[$i],"str=")) && trim($arr[$i]) != "") {
	          list ($kunci,$isi) = explode ('=',$arr[$i]);
	          $isi = urldecode($isi);
	          $isi = urlencode ($isi);
	          
              $qs .= $kunci . '=' . $isi ."&amp;";
          }
        }
      }  
  
 





  
$content .= <<<js
<script language="javascript">
all_checked = true;
function checkall(formName, boxName) {
	for(i = 0; i < document.getElementById(formName).elements.length; i++)
	{
		var formElement = document.getElementById(formName).elements[i];
		if(formElement.type == 'checkbox' && formElement.name == boxName && formElement.disabled == false)
		{
			formElement.checked = all_checked;
		}
	}	
all_checked = all_checked ? false : true;
}
</script>


js;

$referer = referer_encode();
$content .= '<form method="POST" action="" id="namaform">
<div class="table-responsive"><table class="table table-hover">';

$content .= '<tr>
<th>No.</th>
<th>Foto</th>
<th>Judul Buku</th>
<th>Keterangan</th>
<th>Action</th>

</tr>';



$query = $koneksi_db->sql_query ("SELECT * FROM `mod_data_produk` $SORT_SQL LIMIT $offset, $limit");



$warna = null;
while ($data = $koneksi_db->sql_fetchrow($query)){
if (!isset($warna)) $warna = 'style="background:#"';
else $warna = null;	
$no++;
$id = $data['id'];
$urlkat=str_replace(" ", "-", $data['nama']);
$content .= '<tr>
	<td>'.$no.'.</td>
<td><img src="images/produk/'.$data['foto'].'"  width="100px"></td>

		<td><b>'.$data['nama'].'</b><br/>'.$data['harga'].'</td>
	<td>'.limitTXT(strip_tags($data['konten']),140).'
	<br/><a href="produk/'.$data['id'].'/'.$urlkat.'.html" title="'.$data['nama'].'">Selengkapnya</a> </td>


	
	<td><a href="booking/'.$data['id'].'/'.$urlkat.'.html" title="Pesan '.$data['nama'].'">Pesan</a></td>

</tr>';
}


$content .= '</table></div>';


$content .= '<p align=center>';
$content .= $a-> getPagingproduk($jumlah, $_GET['pg'], $_GET['stg']);
$content .= '</p>';




break;	















case 'cari':


$_GET['field'] = !isset ($_GET['field']) ? 'nama' : $_GET['field'];



$content .= '
<form method="GET" action="">
<table border=0 width=100% style="border:0px solid">
<tr>
<td>Search </td><td>:</td><td>'.input_text ('search',@$_GET['search'],$type='text',$size=33,$opt='').'</td>
</tr>

<tr>
<td></td><td></td><td><input type="submit" name="submit" value="Search"></td>
</tr>
</table>
<input type="hidden" name="pilih" value="produk">
<input type="hidden" name="modul" value="yes">
<input type="hidden" name="action" value="cari">

</form>

';

if (isset ($_POST['deleted'])){
	if (is_array (@$_POST['delete'])){
	foreach ($_POST['delete'] as $k=>$v){
		$query = $koneksi_db->sql_query ("DELETE FROM `mod_data_produk` WHERE `id`='$v'");
	}
	}
	
}

$filter_field = array ('nama');
if (!empty ($_GET['search']) && !empty($_GET['field']) && in_array ($_GET['field'],$filter_field)){
$search = cleartext($_GET['search']);
$field = cleartext($_GET['field']);

$SQLOPERATOR = "LIKE '%$search%'";
if ($field == 'no_induk'){
	$SQLOPERATOR = "= '$search'";
}

$query_add = "WHERE `$field` $SQLOPERATOR";






$num = $koneksi_db->sql_query("SELECT `id` FROM `mod_data_produk` $query_add");
$jumlah = $koneksi_db->sql_numrows ($num);
$koneksi_db->sql_freeresult ($num);

$limit = 20;
if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}else {
$offset = int_filter ($_GET['offset']);	
}

$a = new paging ($limit);

// Pembagian mod_data_produk dimulai
 if (!isset ($_GET['pg'],$_GET['stg'])){
	  $_GET['pg'] = 1;
	  $_GET['stg'] = 1;
  }


$content .= <<<js
<script language="javascript">
all_checked = true;
function checkall(formName, boxName) {
	for(i = 0; i < document.getElementById(formName).elements.length; i++)
	{
		var formElement = document.getElementById(formName).elements[i];
		if(formElement.type == 'checkbox' && formElement.name == boxName && formElement.disabled == false)
		{
			formElement.checked = all_checked;
		}
	}	
all_checked = all_checked ? false : true;
}
</script>


js;
$referer = referer_encode();
$content .= '<form method="POST" action="" id="namaform">
<div class="table-responsive"><table class="table table-hover">';

$content .= '<tr>
<th>No.</th>
<th>Foto</th>
<th>Judul Buku</th>
<th>Keterangan</th>
<th>Action</th>

</tr>';


$query = $koneksi_db->sql_query ("SELECT * FROM `mod_data_produk` $query_add $SORT_SQL LIMIT $offset, $limit");



$warna = null;
while ($data = $koneksi_db->sql_fetchrow($query)){
if (!isset($warna)) $warna = 'style="background:#"';
else $warna = null;	
$no++;
$id = $data['id'];
$urlkat=str_replace(" ", "-", $data['nama']);
$content .= '<tr>
	<td>'.$no.'.</td>
<td><img src="images/produk/'.$data['foto'].'"  width="100px"></td>

		<td><b>'.$data['nama'].'</b><br/>'.$data['harga'].'</td>
	<td>'.limitTXT(strip_tags($data['konten']),140).'
	<br/><a href="produk/'.$data['id'].'/'.$urlkat.'.html" title="'.$data['nama'].'">Selengkapnya</a> </td>


	
	<td><a href="booking/'.$data['id'].'/'.$urlkat.'.html" title="Pesan '.$data['nama'].'">Pesan</a></td>

</tr>';
}



$content .= '</table></div>';


$content .= '<p align=center>';
$content .= $a-> getPagingprodukcari($jumlah, $_GET['pg'], $_GET['stg']);
$content .= '</p>';

	
	
}







break;	











	
	
case 'detail':


$id = int_filter($_GET['id']);
$prop1xys= $koneksi_db->sql_query("SELECT * FROM mod_data_produk WHERE id='$id'");
while($pr1xys=$koneksi_db->sql_fetchrow($prop1xys)){
	$nama = $pr1xys['nama'];
	$konten = $pr1xys['konten'];
	$harga = $pr1xys['harga'];
	$foto = $pr1xys['foto'];
	$hits = $pr1xys['hits'];
	$tags = $pr1xys['tags'];
}



$judul_situs = $nama;
$_META['description'] = limittxt(htmlentities(strip_tags($konten)),140);
$_META['keywords'] = empty($tags) ? implode(',',explode(' ',htmlentities(strip_tags($nama)))) : $tags;

















$urlkat=str_replace(" ", "-", $nama);
$hits = $hits +1;
$updatehits = $koneksi_db->sql_query("UPDATE mod_data_produk SET hits='$hits' WHERE id='$id'");

$content .= '<h4>'.$nama.'</h4>
Pengarang <b>'.$harga.'</b>
<br/><br/>
<img src="images/produk/'.$foto.'" alt="'.$nama.'"   class="img-responsive"><br/>
'.$konten.'

<a href="produk.html">Kembali</a> | <a href="booking/'.$id.'/'.$urlkat.'.html" title="Pesan '.$data['nama'].'"><p><span style="color: #ffffff; background-color: #0000ff;"><strong>Pesan Sekarang</strong></span></p></a>

 ';

break;	
	



case 'pesan':

$id = int_filter($_GET['id']);
$prop1xys= $koneksi_db->sql_query("SELECT * FROM mod_data_produk WHERE id='$id'");
while($pr1xys=$koneksi_db->sql_fetchrow($prop1xys)){
	$nama = $pr1xys['nama'];
	$konten = $pr1xys['konten'];
	$harga = $pr1xys['harga'];
	$foto = $pr1xys['foto'];
}



$datawajibdiisi = array ('nama');

if (isset ($_POST['submit'])){
	
	
$error = '';	
	
foreach ($datawajibdiisi as $k=>$v){
	
	if (empty ($_POST[$v])){
		input_alert($v);
		$error .= '- Error at Form : '.$v.'<br />';
	}
}




$nama = cleantext($_POST['nama']);
$alamat = cleantext($_POST['alamat']);
$telp = cleantext($_POST['telp']);
$email = cleantext($_POST['email']);
$jumlah = cleantext($_POST['jumlah']);
$total = $harga*$jumlah;

if ($error != ''){
	$content .= '<div class=error>'.$error.'</div>';
}else {

   
    
	$insert = $koneksi_db->sql_query ("INSERT INTO `mod_data_pendaftar` (`nama`,`alamat`,`telp`,`email`,`produk`,`harga`,`jumlah`,`total`) VALUES ('$nama','$alamat','$telp','$email','$id','$harga','$jumlah','$total')");
	if ($insert) {
		$content .= '<div class=sukses>Terimakasih, petugas kami akan menghubungi anda secepatnya.</div>';
		}
	else {
		$content .= '<div class=error>Data Gagal Dimasukkan<br>'.mysql_error().'</div>';
		if (eregi ($no_induk,mysql_error())) {
			input_alert('no_induk');
		}
		}
		
		
	
}	
	
	
	
	
}





$content .= '
<form method="POST" action="" enctype="multipart/form-data" name="input_jabatan">
<table width=100%>

<tr>
<td>Judul Buku</td>
<td>:</td>
<td><input type="text" value="'.$nama.'" disabled size="33"></td>
</tr>
<tr>
<td>Pengarang</td>
<td>:</td>
<td><input type="text" value="'.$harga.'" disabled size="33"></td>
</tr>

<tr>
<td>Jumlah (Buku)</td>
<td>:</td>
<td><select name="jumlah">
<option value="1">1 </option>
<option value="2">2 </option>
<option value="3">3 </option>
<option value="4">4 </option>
<option value="5">5 </option>
<option value="6">6 </option>
<option value="7">7 </option>
<option value="8">8 </option>
</select></td>
</tr>


<tr>
<td><br/><b>Detail Pemesan</b></td>
<td></td>
<td></td>
</tr>
<tr>
<td>Nama Lengkap</td>
<td>:</td>
<td>'.input_text ('nama',@$_POST['nama']).'</td>
</tr>

<tr>
<td>Alamat</td>
<td>:</td>
<td>'.input_text ('alamat',@$_POST['alamat']).'</td>
</tr>
<tr>
<td>No. Telp</td>
<td>:</td>
<td>'.input_text ('telp',@$_POST['telp']).'</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td>'.input_text ('email',@$_POST['email']).'</td>
</tr>




<tr>
<td></td>
<td></td>
<td><input type="submit" name="submit" value="Pesan"></td>
</tr>

</table>
</form>
';



break;	
	












}














/////////////
echo $content;

?>