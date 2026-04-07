<section>
    <div class="rows pad-bot-redu tb-space hom2-ban-pack">
        <div class="container">
            <div>

<?php
$perintah="SELECT * FROM mod_data_produk ORDER By hits DESC LIMIT 3";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
    $coint_i++;
    $url=str_replace(" ", "-", $data[1]);

echo '
<div class="col-md-4 col-sm-6 col-xs-12 b_packages wow fadeInUp" data-wow-duration="0.5s">
    <!-- IMAGE -->
    <div class="v_place_img">
        <a href="produk/'.$data['id'].'/'.$url.'.html" title="'.$data['nama'].'">
            <img src="images/produk/'.$data['foto'].'" alt="'.$data['nama'].'" title="'.$data['nama'].'">
        </a>
    </div>
    <!-- TOUR TITLE & ICONS -->
    <div class="b_pack rows">
        <!-- TOUR TITLE -->
        <div class="col-md-8 col-sm-8">
            <h4>
                <a href="produk/'.$data['id'].'/'.$url.'.html" title="'.$data['nama'].'">
                    '.$data['nama'].'<br/>
                    <span class="v_pl_name">Pengarang: '.$data['harga'].'</span>
                </a>
            </h4>
        </div>
        <!-- TOUR ICONS -->
        <div class="col-md-4 col-sm-4 pack_icon">
            <ul>
                <li><a href="#"><img src="images/clock.png" alt="Date" title="Tour Timing"></a></li>
                <li><a href="#"><img src="images/info.png" alt="Details" title="View more details"></a></li>
                <li><a href="#"><img src="images/price.png" alt="Price" title="Price"></a></li>
                <li><a href="#"><img src="images/map.png" alt="Location" title="Location"></a></li>
            </ul>
        </div>
    </div>
</div>
';
} ?>

            </div>
        </div>
    </div>
</section>


<section>
    <div class="rows tb-space pad-top-o pad-bot-redu">
        <div class="container">
            <div class="spe-title col-md-12">
                <h2>Buku <span>Terbaru</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>Layanan Online Buku terbaru dari PERISPERS dengan koleksi buku berkualitas yang bisa anda jadikan buku referensi untuk sendiri untuk teman maupun sekeluarga.</p>
            </div>
            <div class="to-ho-hotel">

<?php
$perintah="SELECT * FROM mod_data_produk ORDER By id DESC LIMIT 3";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
    $coint_i++;
    $url=str_replace(" ", "-", $data[1]);
    $tth = date('Y');

echo '
<div class="col-md-4">
    <div class="to-ho-hotel-con">
        <a href="produk/'.$data['id'].'/'.$url.'.html" title="'.$data['nama'].'">
            <div class="to-ho-hotel-con-1">
                <div class="hot-page2-hli-3"><img src="images/hci1.png" alt=""></div>
                <div class="hom-hot-av-tic">Tersedia</div>
                <img src="images/produk/'.$data['foto'].'" alt="'.$data['nama'].'">
            </div>
        </a>
        <div class="to-ho-hotel-con-23">
            <div class="to-ho-hotel-con-2">
                <a href="produk/'.$data['id'].'/'.$url.'.html" title="'.$data['nama'].'">
                    <h4>'.$data['nama'].'</h4>
                </a>
            </div>
            <div class="to-ho-hotel-con-3">
                <ul>
                    <li>Pengarang: '.$data['harga'].'
                        <div class="dir-rat-star ho-hot-rat-star">
                            Rating:
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li>
                        <span class="ho-hot-pri-dis">'.$coint_i.'</span>
                        <span class="ho-hot-pri"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
';
} ?>

                <center><a href="produk.html" class="btn btn-primary">Buku Lainnya</a></center>
            </div>
        </div>
    </div>
</section>


<section class="tourb2-ab-p-3 com-colo-abou">
    <div class="container">
        <div class="row tourb2-ab-p3">

<?php
$perintah="SELECT * FROM mod_data_stat ORDER By id DESC LIMIT 4";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
    $coint_i++;
    $url=str_replace(" ", "-", $data[1]);

echo '
<div class="col-md-3 col-sm-6">
    <div class="tourb2-ab-p3-1 tourb2-ab-p3-com">
        <span>'.$data['jum'].'</span>
        <h4>'.$data['nama'].'</h4>
        <p>'.$data['ket'].'</p>
    </div>
</div>
';
} ?>

        </div>
    </div>
</section>


<section style="margin-top:50px;">
    <div class="rows tb-space pad-top-o pad-bot-redu">
        <div class="container">
            <div class="spe-title col-md-12">
                <h2>Gallery <span>Buku</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p><a href="https://persispers.com/gallery.html">Cari Judul Buku</a></p>
            </div>
        </div>
    </div>
</section>


<section style="margin-top:-30px;">
    <div class="rows tb-space pad-top-o pad-bot-redu">
        <div class="container">
            <div class="spe-title col-md-12">
                <h2>Headline <span>News</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>Kumpulan Headline News tentang Informasi berita, produk dan lain lain.</p>
            </div>
            <div class="to-ho-hotel">

<?php
$query2 = $koneksi_db->sql_query("SELECT * FROM `artikel` WHERE publikasi=1 ORDER BY `id` DESC LIMIT 3");
while ($data = $koneksi_db->sql_fetchrow($query2)) {
    $id2    = $data[0];
    $judul2 = $data[1];
    $gambar = $data['gambar'];
    $post   = $data[2];
    $na     = catch_that_image($post);
    $url    = str_replace(" ", "-", $data[1]);
    $idzz   = $data['id'];
    $topik  = $data['topik'];

    $adaxc = $koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT * FROM komentar where artikel='".$idzz."'"));

    $propinsi4 = $koneksi_db->sql_query("SELECT * FROM topik WHERE id='$topik'");
    while ($p4 = $koneksi_db->sql_fetchrow($propinsi4)) {
        $kelas24 = $p4['topik'];
    }

echo '
<div class="col-md-4">
    <div class="to-ho-hotel-con">
        <a href="artikel/'.$data[0].'/'.$url.'.html" title="'.$data[1].'">
            <div class="to-ho-hotel-con-1">
                <img src="images/artikel/'.$gambar.'" alt="'.$data['nama'].'">
            </div>
        </a>
        <div class="to-ho-hotel-con-23">
            <div class="to-ho-hotel-con-2">
                <h4>'.$data[1].'</h4>
            </div>
            <div class="to-ho-hotel-con-3">
                '.limitTXT(strip_tags($data['konten']),90).'
                <a href="artikel/'.$data[0].'/'.$url.'.html" title="'.$data[1].'">Read more</a>
            </div>
        </div>
    </div>
</div>
';
}
?>

            </div>
        </div>
    </div>
</section>


<section style="margin-top:-40px;">
    <div class="rows tb-space pad-top-o pad-bot-redu">
        <div class="container">
            <div class="spe-title">
                <h2>Testimonial</h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>Tanggapan para Tokoh Dai terhadap buku dan kualitas layanan kami.</p>
            </div>
            <div class="p_testimonial">

<?php
$perintah="SELECT * FROM mod_data_testi ORDER By id DESC LIMIT 4";
$hasil = $koneksi_db->sql_query( $perintah );
$coint_i = 0;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
    $coint_i++;
    $url=str_replace(" ", "-", $data[1]);

echo '
<div class="col-md-6">
    <div class="p-tesi">
        <div class="col-md-3 col-sm-3">
            <img src="images/testi/thumb/'.$data['foto'].'" class="img-responsive" alt="'.$data['nama'].'">
        </div>
        <div class="col-md-9 col-sm-9">
            <h4>'.$data['nama'].'</h4>
            <div>
                <span class="tour_star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                </span>
            </div>
            <p>'.$data['ket'].'</p>
            <address>'.$data['email'].'</address>
        </div>
    </div>
</div>
';
} ?>

            </div>
        </div>
    </div>
</section>