        <!-- TOP BAR -->

				
				<?php

global $koneksi_db, $maxkonten;
$perintah="SELECT * FROM mod_data_profil";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
				$coint_i++;
				$id = md5($data['id']);
				
 echo '
		
											
											
							        <div class="ed-top"  style="background:'.$data['warnah'].';">
            <div class="container">
                <div class="row">				
											
  <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#" style="color:white;">'.$data['sambutan'].'</a>
                                </li>
                                <li><a href="#" style="color:white;">Telp. '.$data['telp'].'</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                <li><a href="login.html" style="color:white;">Login</a>
                                </li>
                                <li><a href="register.html" style="color:white;">Daftar</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="'.$data['fb'].'"  style="color:white;"><i class="fa fa-facebook" aria-hidden="true"  style="color:white;"></i></a>
                                </li>
                                <li><a href="'.$data['in'].'"  style="color:white;"><i class="fa fa-instagram" aria-hidden="true"  style="color:white;"></i></a>
                                </li>
                                <li><a href="'.$data['tw'].'"  style="color:white;"><i class="fa fa-twitter" aria-hidden="true"  style="color:white;"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>											
											
											
											
											
											
'; 
					
} ?>	
				
				
                  
                </div>
            </div>
        </div>