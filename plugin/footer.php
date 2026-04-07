<?php
global $koneksi_db, $maxkonten;
$perintah="SELECT * FROM mod_data_profil";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
    $coint_i++;
    $id = md5($data['id']);
    
    echo '   
    <!--====== FOOTER 2 ==========-->
    <section>
        <div class="rows">
            <div class="footer" style="background:'.$data['warnaf'].';">
                <div class="container">
                    <div class="foot-sec2">
                        <div style="margin-top:30px;">
                            <div class="row">
                                ';
                                
}
                                
        
$hasil3 = $koneksi_db->sql_query( "SELECT * FROM menu2 WHERE published=1 ORDER BY ordering" );
while ($datamenu3 = $koneksi_db->sql_fetchrow($hasil3)) {
    $idmenu3 = $datamenu3['id'];
    $menuidmenu3 = $datamenu3['menu2'];
    $urlidmenu3 = $datamenu3['url'];
    $adamenu3=$koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT * FROM submenu2 where parent='".$idmenu3."' AND published='1'"));
    echo '
        <div class="col-sm-3 col-md-3 foot-spec foot-com">
            <h4><span>'.$menuidmenu3.'</span></h4>
        ';
    if ($adamenu3 > 0) {
        
        echo ' <ul style="list-style: none; padding-left: 0;">'; // Removed bullets
        $hasil23 = $koneksi_db->sql_query( "SELECT * FROM `submenu2` WHERE published='1' AND parent='".$idmenu3."' ORDER By `ordering` ASC");
        while ($datamenu23 = $koneksi_db->sql_fetchrow($hasil23)) {
            $idmenu23 = $datamenu23['id'];
            $menuidmenu23 = $datamenu23['menu2'];
            $urlidmenu23 = $datamenu23['url'];
            echo '
                <li><a href="'.$urlidmenu23.'" title="'.$menuidmenu23.'" style="color: #616161;">'.$menuidmenu23.'</a></li>                  
            ';
        }
        echo ' 
                </ul>
        ';
    }
    echo ' </div>
        ';
}
?>					
					
					
					
<?php
$perintah="SELECT * FROM mod_data_profil";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
    $coint_i++;
    
    $url=str_replace(" ", "-", $data[1]);
    $tahun = date('Y');

    
    echo '
        <div class="col-sm-3 foot-social foot-spec foot-com">
            <h4><span>Tentang</span> Kami</h4>
            <p>'.$data['desc'].'</p>
            <ul style="list-style: none; padding-left: 0;">
                <li><a href="'.$data['fb'].'"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                <li><a href="'.$data['in'].'"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                <li><a href="'.$data['tw'].'"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>
<!--====== FOOTER - COPYRIGHT ==========-->
<section>
<div class="rows copy" style="background:'.$data['warnaf2'].';">
<div class="container">
<p>Copyrights © '.$tahun.' '.$data['nama'].'. All Rights Reserved</p>
</div>
</div>
</section>
                     
<section style="bottom: 0;
    width: 100%;
    position: fixed;
    height:50px;
    line-height:50px;
    float: right;
    z-index:1000;
    color:#fff;
">
<div class="rows">
<div class="container">
    
<a href="https://api.whatsapp.com/send?phone='.$data['wa'].'" class="btn btn-success">
<img src="images/whatsapp.svg" alt="" height="15px" width="15px">
            Kontak Kami Sekarang
</a>
</div>
</div>
</section>
 
'; 
}			
?>