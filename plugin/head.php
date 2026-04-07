	<section >
		<div class="rows inner_banner">
			<div class="container">
			
			<?php
						
						
						
	
$perintah="SELECT * FROM mod_data_profil";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
	
					
					 echo '
					 
					<h2>'.$data['nama'].'</h2>
'; 
}			
	?>
			
				
				<ul>
					<li><a href="index.html">Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					
				
					
					<li><a href="" class="bread-acti">	<?php
								$pilih = ucfirst($_GET['pilih']);
						
						echo ''.$pilih.'';
							
							
							?></a>
					</li>
				</ul>
		<?php
						
						
						
	
$perintah="SELECT * FROM mod_data_profil";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
	
					
					 echo '
					 
					<p>'.$data['alamat'].'. Telp. '.$data['telp'].'</p>
'; 
}			
	?>
			</div>
		</div>
	</section>