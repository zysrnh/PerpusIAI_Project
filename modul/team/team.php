<h1 class="mb-0">Team Work</h1>


<?php

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
$pilih = cleartext($_GET['pilih']);

$seo1= $koneksi_db->sql_query("SELECT * FROM mod_data_meta WHERE nama='$pilih'");
while($pr1xypd=$koneksi_db->sql_fetchrow($seo1)){
	$judulseo1 = $pr1xypd['judul'];
$desseo1 = $pr1xypd['meta'];
$keyseo1 = $pr1xypd['tags'];
}


$judul_situs = $judulseo1;
$_META['description'] = $desseo1;
$_META['keywords'] = $keyseo1;


$query_add = '';
if (isset ($_GET['str']) && !empty($_GET['str'])){
	$str = substr($_GET['str'],0,1);
$query_add .= "WHERE LEFT (`nama`,1) = '$str'";
}




$num = $koneksi_db->sql_query("SELECT `id` FROM `mod_data_team` $query_add");
$jumlah = $koneksi_db->sql_numrows ($num);
//mysql_free_result ($num);

$limit = 12;
if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}else {
$offset = int_filter ($_GET['offset']);	
}

$a = new paging ($limit);

// Pembagian halaman dimulai
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
  
 






  



$content .= '	<div>
								<div class="row">';



$query = $koneksi_db->sql_query ("SELECT * FROM `mod_data_team` $query_add ORDER By `id` ASC LIMIT $offset, $limit");



$warna = null;
while ($data = $koneksi_db->sql_fetchrow($query)){
if (!isset($warna)) $warna = 'style="background:#"';
else $warna = null;	
$no++;
$id = $data['id'];
	$url=str_replace(" ", "-", $data[1]);

$content .= '
 <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
								<span class="thumb-info thumb-info-hide-wrapper-bg">
									<span class="thumb-info-wrapper">
										<a href="team/'.$data['id'].'/'.$url.'.html" title="Team '.$data['nama'].'">
											<img src="images/team/'.$data['foto'].'" class="img-fluid" alt="'.$data['nama'].'">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">'.$data['nama'].'</span>
												<span class="thumb-info-type">'.$data['pekerjaan'].'</span>
											</span>
										</a>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text">'.limitTXT(strip_tags($data['ket']),140).'</span>
										<span class="thumb-info-social-icons">
											<a target="_blank" href="'.$data['fb'].'" title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="'.$data['tw'].'" title="tw"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="'.$data['in'].'" title="in"><i class="fa fa-instagram"></i><span>Instagram</span></a>
										</span>
									</span>
								</span>
								<br/>
							</div>
								

';
}





$content .= '</div></div><p align=center>';
$content .= $a-> getPagingteam($jumlah, $_GET['pg'], $_GET['stg']);
$content .= '</p>';




break;	





	
case 'detail':
$id = int_filter($_GET['id']);



$query = $koneksi_db->sql_query ("SELECT * FROM `mod_data_team` WHERE id='$id'");



$warna = null;
while ($data = $koneksi_db->sql_fetchrow($query)){
if (!isset($warna)) $warna = 'style="background:#"';
else $warna = null;	
$no++;

$kett = limitTXT2(strip_tags($data['ket']),160);
$urlt=str_replace(" ", ", ", $kett);

$judul_situs = $data['nama'];
$_META['description'] = limitTXT2(strip_tags($data['ket']),160);
$_META['keywords'] = $urlt;


$content .= '

<div class="row">
						<div class="col-lg-4">
							
								<div>
									<span class="img-thumbnail d-block">
										<img alt="'.$data['nama'].'" height="300" class="img-fluid" src="images/team/'.$data['foto'].'">
									</span>
								</div>
								
						
						</div>
						<div class="col-lg-8">

							<h2 class="mb-0">'.$data['nama'].'</h2>
							<h4 class="heading-primary">'.$data['pekerjaan'].'</h4>

							<hr class="solid">

							<p>'.$data['ket'].'
							<br/>Telp. '.$data['hp'].'
							</p>
<span class="thumb-info-caption">
									
										<span class="thumb-info-social-icons">
											<a target="_blank" href="'.$data['fb'].'" title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
											<a href="'.$data['tw'].'" title="tw"><i class="fa fa-twitter"></i><span>Twitter</span></a>
											<a href="'.$data['in'].'" title="in"><i class="fa fa-instagram"></i><span>Instagram</span></a>
										</span>
									</span>
							

						</div>
					</div>
';
}






break;	



}














/////////////
echo $content;

?>