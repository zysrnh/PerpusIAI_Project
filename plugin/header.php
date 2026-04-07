	<!--HEADER SECTION-->
	<section style="margin-bottom: 120px">
		<div>
			<div>
				<div>
			<div class="slider fullscreen">
				<ul class="slides">
				
				
				
				
			<?php
$perintah="SELECT * FROM slider ORDER By id DESC LIMIT 4";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
				$coint_i++;
			
 echo '
 <li> <img src="images/slides/'.$data['foto'].'" alt="'.$data['nama'].'">
						<!-- random image -->
						<div class="caption center-align slid-cap">
							<h5 class="light grey-text text-lighten-3"><br/></h5>
							<h2>'.$data['nama'].'</h2>
							<p>'.$data['ket'].'</p> <a href="'.$data['link'].'" class="waves-effect waves-light">Detail</a> </div>
					</li>
 
 
 
'; 
					
} ?>	                 
								
				
				
				
				
				
				
				
				
				
				
				</ul>
			</div>
				</div>
			</div>
		</div>
	</section>
	<!--END HEADER SECTION-->	
	
	
		