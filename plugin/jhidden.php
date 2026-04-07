<div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="index.html">
		<?php

global $koneksi_db, $maxkonten;
$perintah="SELECT * FROM mod_data_profil";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
				$coint_i++;
				$id = md5($data['id']);
				
 echo '

    <img src="images/'.$data['foto'].'" alt="Logo">
'; 
					
} ?>
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
<?php
if (!cek_login ())
{
$hasil = $koneksi_db->sql_query( "SELECT * FROM menu WHERE published=1 ORDER BY ordering" );

while ($data = $koneksi_db->sql_fetchrow($hasil)) {

        $parent= $data['id'];
        $target= "";
        if (eregi("http://",$data['url'])) $target="target=_blank";
        $link_menu = $data['menu'];
        $link_url = $data['url'];
$subhasil = $koneksi_db->sql_query( "SELECT * FROM submenu WHERE published=1 AND parent='$parent' ORDER BY ordering" );
        $jmlsub = $koneksi_db->sql_numrows( $subhasil );
		
	
		
		
if ($jmlsub>0) {
        echo '
				<a href="#"><h5>'.$link_menu.'</h5>
					
				</a> ';
            	
} else {
	
	 echo '
            	<a href="'.$link_url.'" title="'.$link_menu.'"><h5>'.$link_menu.'</h5></a>  ';
}



        

       if ($jmlsub>0) {
            echo ' 
<ul>';

            while ($subdata = $koneksi_db->sql_fetchrow($subhasil)) {
                $target="";
				$parent2= $subdata['id'];
                if (eregi("http://",$subdata['url'])) $target="target=\"_blank\"";

				
				
				
				
				
            
				
				$subhasil2 = $koneksi_db->sql_query( "SELECT * FROM submenumenu WHERE published=1 AND parent='$parent2' ORDER BY ordering" );
        $jmlsub2 = $koneksi_db->sql_numrows($subhasil2);	
				
				
				

	 echo '
 <li><a  href="'.$subdata['url'].'" '.$target.' title="'.$subdata[1].'"> '.$subdata['menu'].'</a>';
				

					
		
			echo '	</li>';

            }
          echo "</ul>
                    
                
                   ";


        }

}

echo '  ';









}else{
if ($_SESSION['LevelAkses']=="Administrator"){

echo '

<a href="#"><h5>Konten </h5></a>
            
		<ul>
		 	<li><a  href="admin.php?pilih=profil&modul=yes"> Data Profil</a></li>
		<li><a  href="admin.php?pilih=admin_info"> Rubah Password</a></li>
<li><a  href="admin.php?pilih=pages&modul=yes"> Halaman Dinamis</a></li>
<li><a  href="admin.php?pilih=admin_menu"> Header Menu</a></li>
<li><a  href="admin.php?pilih=admin_menu2"> Footer Menu</a></li>
<li><a  href="admin.php?pilih=topik&modul=yes"> Topik Artikel</a></li>
<li><a  href="admin.php?pilih=artikel&modul=yes"> Buat Artikel</a></li>
<li><a  href="admin.php?pilih=admin_modul"> Menejemen Modul</a></li>
<li><a  href="admin.php?pilih=admin_blok"> Widget HTML</a></li>
<li><a  href="admin.php?pilih=slider&modul=yes"> Pengaturan Slider</a></li>
<li><a  href="admin.php?pilih=admin_setting"> Konfigurasi Website</a></li>
            </ul>
			



<a href="#"><h5>Modul </h5></a>
          <ul>
			
			
		
				<li><a  href="admin.php?pilih=testi&modul=yes"> Data Testimonial</a></li>
				<li><a  href="admin.php?pilih=file&modul=yes"> Penyimpanan Files</a></li>
				<li><a  href="admin.php?pilih=links&modul=yes"> Direktori  Link</a></li>
					<li><a  href="admin.php?pilih=calendar&modul=yes"> Event Kalender</a></li>
		<li><a  href="admin.php?pilih=polling&modul=yes"> Data Polling</a></li>
		<li><a  href="admin.php?pilih=shoutbox&modul=yes"> Shoutbox</a></li>		

<li><a  href="admin.php?pilih=meta&modul=yes"> SEO Meta Pages</a></li>  
       
            </ul>
     
		
		
		


		
		
<a href="#"><h5>Gallery </h5></a>
          <ul>
		  <li><a  href="admin.php?pilih=fotokat&modul=yes"> Kategori Foto</a></li>
		<li><a  href="admin.php?pilih=foto&modul=yes"> Gallery Foto</a></li>
		<li><a  href="admin.php?pilih=video&modul=yes"> Gallery Video</a></li>

       
            </ul>
     
		
		
		
		
<a href="#"><h5>Produk </h5></a>
          <ul>
		    <li><a  href="admin.php?pilih=stat&modul=yes"> Data Statistik</a></li>
		  <li><a  href="admin.php?pilih=produk&modul=yes"> Database Produk</a></li>
		<li><a  href="admin.php?pilih=pendaftar&modul=yes"> Data Pendaftar</a></li>
		<li><a  href="admin.php?pilih=pengaduan&modul=yes"> Pengaduan</a></li>

       
            </ul>
   
		


<a  href="admin.php?pilih=pengguna&modul=yes"><h5> Pengguna</h5></a>
 
<a  href="admin.php?pilih=backup&modul=yes"><h5> Backup</h5></a>




<a  href="index.php?aksi=logout"><h5> Keluar</h5></a>

			



'; 


} elseif ($_SESSION['LevelAkses']=="Editor"){ 
$user = $_SESSION['UserName'];

echo '
<a  href="index.php?pilih=user&amp;aksi=change"><h5> Password</h5></a>
<a  href="admin.php?pilih=artikel&modul=yes"> <h5>Artikel</h5></a>
<a class="dropdown-item dropdown-toggle" href="#"><h5>Produk</h5> </a>
          <ul>
		    <li><a  href="admin.php?pilih=stat&modul=yes"> Data Statistik</a></li>
		  <li><a  href="admin.php?pilih=produk&modul=yes"> Database Produk</a></li>
		<li><a  href="admin.php?pilih=pendaftar&modul=yes"> Data Pendaftar</a></li>


       
            </ul>
        
		
<a  href="forum.html"><h5>Forum</h5></a>
<a  href="index.php?aksi=logout"><h5>Kelua</h5></a>
';
					                       									   
		}								   
										   
			else { 
$user = $_SESSION['UserName'];

echo '
<a    href="index.php?pilih=user&amp;aksi=change"> <h5>Password</h5></a></li>
<a   href="admin.php?pilih=artikel&modul=yes"> <h5>Artikel</h5></a></li>


				<a href="#"><h5>Interaktif </h5>
					
				</a>
    <ul>
			
			<li><a  href="testimonial.html">Testimonial</a></li>
						<li><a   href="direktori-link">Weblinks</a></li>
       	<li><a   href="file-sharing.html">File Sharing</a></li>
		    	<li><a   href="gallery.html">Gallery Foto</a></li>
			
		
            </ul>
 
		


						
											
<li><a   href="forum.html"><h5> Forum</h5></a></li>
<li><a    href="index.php?aksi=logout"><h5>Keluar</h5></a></li>
';
					                       									   
		}								   
										   


} 
	


?>