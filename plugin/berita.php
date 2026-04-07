	<div class="tour_right tour_incl tour-ri-com">
						<h3>Headline News</h3>
				
							
					
											<ul>
											
			
<?php
global $koneksi_db, $maxkonten;
$perintah="SELECT * FROM artikel WHERE publikasi='1' ORDER BY `hits` DESC limit 4";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
?>
<?php
				while ($data = $koneksi_db->sql_fetchrow($hasil)) {
				$coint_i++;
				$id = $data[0];
$url=str_replace(" ", "-", $data[1]);
$post   = $data[2];
	$na = catch_that_image($post);
	$idzz = $data['id'];
	$topik = $data['topik'];
	$gambar = $data['gambar'];
$ada=$koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT * FROM komentar where artikel='".$idzz."'"));

$propinsi4 = $koneksi_db->sql_query("SELECT * FROM topik WHERE id='$topik'");
while($p4=$koneksi_db->sql_fetchrow($propinsi4)){
	$kelas24 = $p4['topik'];
}

				?>
			
					<?php echo '
					
			<li>
												
												
			
												
												
													<div class="post-info">
														<a href="artikel/'.$data[0].'/'.$url.'.html" title="'.$data[1].'">'.$data['judul'].'</a> ('.$data['hits'].' View)
														<div class="post-meta">
															'.datetimes($data['tgl']).'
														</div>
													</div>
												</li>

					'; ?>
<?php } ?>						  
				  		
		
		
	
													
											
												
															
												
									
											</ul>
									
							</div>























