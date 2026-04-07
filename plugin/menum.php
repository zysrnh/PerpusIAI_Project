<li class="level0"><a   href=""><span>Home</span></a></li>
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
        echo '<li class="level0 parent col1 all-product">
				<a href="#"><span>'.$link_menu.'</span>
					<i class="fa fa-chevron-down"></i><i class="fa fa-chevron-right"></i>
				</a> ';
            	
} else {
	
	 echo '
            	<li class="level0"><a  class="nav-link" href="'.$link_url.'" title="'.$link_menu.'"><span>'.$link_menu.'</span></a>  ';
}



        

       if ($jmlsub>0) {
            echo ' 
<ul  class="cate_list">';

            while ($subdata = $koneksi_db->sql_fetchrow($subhasil)) {
                $target="";
				$parent2= $subdata['id'];
                if (eregi("http://",$subdata['url'])) $target="target=\"_blank\"";

				
				
				
				
				
            
				
				$subhasil2 = $koneksi_db->sql_query( "SELECT * FROM submenumenu WHERE published=1 AND parent='$parent2' ORDER BY ordering" );
        $jmlsub2 = $koneksi_db->sql_numrows($subhasil2);	
				
				
				

	 echo '
 <li class="level1"><a  href="'.$subdata['url'].'" '.$target.' title="'.$subdata[1].'"> '.$subdata['menu'].'</a>';
				

					
		
			echo '	</li>';

            }
          echo "</ul>
                    
                
                   ";


        }

}

echo '      </li>';









}else{
if ($_SESSION['LevelAkses']=="Administrator"){

echo '

<li class="level0 parent col1 all-product">
				<a href="#"><span>Konten </span>
					<i class="fa fa-chevron-down"></i><i class="fa fa-chevron-right"></i>
				</a>
            
	<ul  class="cate_list">
		 	<li class="level1"><a  href="admin.php?pilih=profil&modul=yes"> Data Profil</a></li>
		<li class="level1"><a  href="admin.php?pilih=admin_info"> Rubah Password</a></li>
<li class="level1"><a  href="admin.php?pilih=pages&modul=yes"> Halaman Dinamis</a></li>
<li class="level1"><a  href="admin.php?pilih=admin_menu"> Header Menu</a></li>
<li class="level1"><a  href="admin.php?pilih=admin_menu2"> Footer Menu</a></li>
<li class="level1"><a  href="admin.php?pilih=topik&modul=yes"> Topik Artikel</a></li>
<li class="level1"><a  href="admin.php?pilih=artikel&modul=yes"> Buat Artikel</a></li>
<li class="level1"><a  href="admin.php?pilih=admin_blok"> Widget HTML</a></li>
<li class="level1"><a  href="admin.php?pilih=slider&modul=yes"> Pengaturan Slider</a></li>
<li class="level1"><a  href="admin.php?pilih=admin_setting"> Konfigurasi Website</a></li>
            </ul>
			
</li>


<li class="level0 parent col1 all-product">
				<a href="#"><span>Modul </span>
					<i class="fa fa-chevron-down"></i><i class="fa fa-chevron-right"></i>
				</a>
<ul  class="cate_list">
			
					<li class="level1"><a  href="admin.php?pilih=testi&modul=yes"> Data Testimonial</a></li>
				<li class="level1"><a  href="admin.php?pilih=file&modul=yes"> Penyimpanan Files</a></li>
				<li class="level1"><a  href="admin.php?pilih=links&modul=yes"> Direktori  Link</a></li> 
<li class="level1"><a  href="admin.php?pilih=team&modul=yes"> Team Work</a></li>  
<li class="level1"><a  href="admin.php?pilih=meta&modul=yes"> SEO Meta Pages</a></li>  
      <li class="level1"><a  href="admin.php?pilih=pengaduan&modul=yes"><span> Pengaduan</span></a></li>  
	  <li><a  href="admin.php?pilih=client&modul=yes"> Banner Client</a></li>  
	  	  <li class="level1"><a  href="admin.php?pilih=fotokat&modul=yes"> Kategori Foto</a></li>
		<li class="level1"><a  href="admin.php?pilih=foto&modul=yes"> Gallery Foto</a></li>
	  
	  
            </ul>
        </li>
		
		
		


		
<li class="level0 parent col1 all-product">
				<a href="#"><span>Produk </span>
					<i class="fa fa-chevron-down"></i><i class="fa fa-chevron-right"></i>
				</a>
  <ul  class="cate_list">
	
	  	  <li class="level1"><a  href="admin.php?pilih=ukuran&modul=yes"> Data Ukuran</a></li>
	  	  <li class="level1"><a  href="admin.php?pilih=orientasi&modul=yes"> Data Orientasi</a></li>
	  	  <li class="level1"><a  href="admin.php?pilih=cover&modul=yes"> Data Cover</a></li>
		  	  	  <li class="level1"><a  href="admin.php?pilih=coverpw&modul=yes"> Data Cover Paper Weight</a></li>
				  	  	  <li class="level1"><a  href="admin.php?pilih=inner&modul=yes"> Data Inner Paper Type</a></li>
						  			  	  	  <li class="level1"><a  href="admin.php?pilih=innerw&modul=yes"> Data Inner Paper Weight</a></li>
						  	  	  <li class="level1"><a  href="admin.php?pilih=clam&modul=yes"> Data Cover Lamination</a></li>
       	  	  	  <li class="level1"><a  href="admin.php?pilih=ilam&modul=yes"> Data Inner Lamination</a></li>
				  
				  	  <li class="level1"><a  href="admin.php?pilih=pesanan&modul=yes"> Data Pesanan</a></li>
            </ul>
        </li>		
		
		
		
		
		
		
		
		







<li class="level0"><a  href="admin.php?pilih=pengguna&modul=yes"><span> Pengguna</span></a></li>  
 
<li class="level0"><a   href="admin.php?pilih=backup&modul=yes"><span> Backup</span></a></li>  




<li class="level0"><a   href="index.php?aksi=logout"><span>Keluar</span></a></li>




			



'; 


} elseif ($_SESSION['LevelAkses']=="Editor"){ 
$user = $_SESSION['UserName'];

echo '
<li class="level0"><a   href="index.php?pilih=user&amp;aksi=change"> <span>Password</span></a></li>
<li class="level0"><a   href="admin.php?pilih=artikel&modul=yes"> <span>Artikel</span></a></li>
<li class="level0"><a    href="forum.html"> <span>Forum</span></a></li>
<li class="level0"><a    href="index.php?aksi=logout"><span>Keluar</span></a></li>
';
					                       									   
		}								   
										   
			else { 
$user = $_SESSION['UserName'];

echo '
<li class="level0"><a    href="index.php?pilih=user&amp;aksi=change"><span> Password</span></a></li>
<li class="level0"><a   href="admin.php?pilih=artikel&modul=yes"><span> Artikel</span></a></li>

<li class="level0 parent col1 all-product">
				<a href="#"><span>Interaktif </span>
					<i class="fa fa-chevron-down"></i><i class="fa fa-chevron-right"></i>
				</a>
    <ul  class="cate_list">
			
			<li class="level1"><a  href="testimonial.html">Testimonial</a></li>
						<li class="level1"><a   href="direktori-link">Weblinks</a></li>
       	<li class="level1"><a   href="file-sharing.html">File Sharing</a></li>
		    	<li class="level1"><a   href="gallery.html">Gallery Foto</a></li>
			
		
            </ul>
        </li>
		


						
											
<li class="level0"><a   href="forum.html"><span> Forum</span></a></li>
<li class="level0"><a    href="index.php?aksi=logout"><span>Keluar</span></a></li>
';
					                       									   
		}								   
										   


} 
	


?>