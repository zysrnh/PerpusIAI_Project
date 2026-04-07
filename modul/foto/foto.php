<h1 class="mb-0">Gallery Buku</h1>
<script language="JavaScript" type="text/JavaScript">
    // <!--
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
    }
    //-->
</script>
<?php
$content = "";

$index_hal = 1;

include "modul/functions.php";

// Function to format price as Indonesian Rupiah
function formatRupiah($price) {
    // If price is null, empty, or zero, return a dash
    if ($price === null || $price === '' || $price == 0) {
        return '-';
    }

    // Remove any non-numeric characters (just in case)
    $price = preg_replace('/[^0-9]/', '', $price);

    // Format the price with thousand separators
    return 'Rp ' . number_format($price, 0, ',', '.');
}

switch (@$_GET["action"]) {
    case "filter":
        $kid = int_filter($_GET["kid"]);

        $query_add = "";
        if (isset($_GET["str"]) && !empty($_GET["str"])) {
            $str = substr($_GET["str"], 0, 1);
            $query_add .= "WHERE LEFT (`nama`,1) = '$str'";
        }

        $num = $koneksi_db->sql_query(
            "SELECT `id` FROM `mod_data_foto` WHERE kat='$kid' $query_add"
        );
        $jumlah = $koneksi_db->sql_numrows($num);

        $limit = 12;
        if (empty($_GET["offset"]) and !isset($_GET["offset"])) {
            $offset = 0;
        } else {
            $offset = int_filter($_GET["offset"]);
        }

        $a = new paging($limit);

        // Pembagian halaman dimulai
        if (!isset($_GET["pg"], $_GET["stg"])) {
            $_GET["pg"] = 1;
            $_GET["stg"] = 1;
        }

        $qs = "";

        $arr = explode("&", $_SERVER["QUERY_STRING"]);

        if (is_array($arr)) {
            for ($i = 0; $i < count($arr); $i++) {
                if (!is_int(strpos($arr[$i], "str=")) && trim($arr[$i]) != "") {
                    list($kunci, $isi) = explode("=", $arr[$i]);
                    $isi = urldecode($isi);
                    $isi = urlencode($isi);

                    $qs .= $kunci . "=" . $isi . "&amp;";
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
		if(formElement.type == 'checkbox' && formElement.nama == boxName && formElement.disabled == false)
		{
			formElement.checked = all_checked;
		}
	}	
all_checked = all_checked ? false : true;
}
</script>
js;

        $referer = referer_encode();

        $content .= '<form method="GET" action="">';

        $propinsi = $koneksi_db->sql_query(
            "SELECT * FROM mod_data_fotokat ORDER BY id"
        );
        while ($p = $koneksi_db->sql_fetchrow($propinsi)) {
            $id = $p["id"];
            $nama = $p["nama"];
            $urlkat = str_replace(" ", "-", $nama);
            // $asal4 .=
            //     '<option value="gallery-foto-' .
            //     $p["id"] .
            //     "-" .
            //     $urlkat .
            //     '.html">' .
            //     $nama .
            //     "</option>";
            $asal4 .=
                '<option value="gallery/' .
                $p["id"] .
                "/" .
                $urlkat .
                '.html">' .
                $nama .
                "</option>";
        }
        $propinsix = $koneksi_db->sql_query(
            "SELECT * FROM mod_data_fotokat WHERE id='$kid'"
        );
        while ($px = $koneksi_db->sql_fetchrow($propinsix)) {
            $idx = $px["id"];
            $namax = $px["nama"];
        }

        $pilih = cleartext($_GET["pilih"]);

        $seo1 = $koneksi_db->sql_query(
            "SELECT * FROM mod_data_meta WHERE nama='$pilih'"
        );
        while ($pr1xypd = $koneksi_db->sql_fetchrow($seo1)) {
            $judulseo1 = $pr1xypd["judul"];
            $desseo1 = $pr1xypd["meta"];
            $keyseo1 = $pr1xypd["tags"];
        }

        $judul_situs = "" . $judulseo1 . " " . $namax . "";
        $_META["description"] = $desseo1;
        $_META["keywords"] = $keyseo1;

        if (empty($namax)) {
            $content .= '<br/><div class="error">Halaman tidak tersedia.</div>';
        } else {
            $content .=
                ' 
<select nama="kid" onChange="MM_jumpMenu(\'parent\',this,0)">
<option value="">' . $namax . "</option>";
            $content .= "" . $asal4 . '  
  ';

            $content .= "</select></form><br/>";

            $content .= '  
<div>
    <div class="row">
';

            $query = $koneksi_db->sql_query(
                "SELECT * FROM `mod_data_foto` WHERE kat='$kid' $query_add $SORT_SQL ORDER By `id` DESC  LIMIT $offset, $limit"
            );

            $warna = null;
            while ($data = $koneksi_db->sql_fetchrow($query)) {
                if (!isset($warna)) {
                    $warna = 'style="background:#"';
                } else {
                    $warna = null;
                }
                $id = md5($data["id"]);
                $kid = $data["kat"];
                $link = $data["link"];
                $price = $data["price"]; // Get the price field

                $propinsi121 = $koneksi_db->sql_query(
                    "SELECT * FROM mod_data_fotokat WHERE id='$kid'"
                );
                while ($p111 = $koneksi_db->sql_fetchrow($propinsi121)) {
                    $namaz = $p111["nama"];
                }

                // Make sure link opens in a new tab
                $linkStart = !empty($link) ? '<a href="' . $link . '" target="_blank">' : '';
                $linkEnd = !empty($link) ? '</a>' : '';

                // Format price using our helper function
                $formattedPrice = formatRupiah($price);

                $content .= '
                <div class="col-md-4 col-sm-6 col-xs-12 b_packages">
                    <div class="v_place_img">
                        ' . $linkStart . '
                        <img src="images/foto/thumb/' . $data["foto"] . '" alt="' . $data["nama"] . '" title="' . $data["nama"] . '"/>
                        ' . $linkEnd . '
                    </div>
                    <div class="b_pack rows">
                        <div class="col-md-12">
                            <h4>' . $linkStart . $data["nama"] . $linkEnd . '</h4>
                            <p class="price-tag">' . $formattedPrice . '</p>
                        </div>
                    </div>
                </div>';
            }

            $content .= '  
        </div>  
    </div>   						
    <p align=center>';
            $content .= $a->getPagingkatfoto(
                $jumlah,
                $_GET["pg"],
                $_GET["stg"],
                $kid
            );
            $content .= "</p>";
        }

        break;

    default:
        $pilih = cleartext($_GET["pilih"]);

        $seo1 = $koneksi_db->sql_query(
            "SELECT * FROM mod_data_meta WHERE nama='$pilih'"
        );
        while ($pr1xypd = $koneksi_db->sql_fetchrow($seo1)) {
            $judulseo1 = $pr1xypd["judul"];
            $desseo1 = $pr1xypd["meta"];
            $keyseo1 = $pr1xypd["tags"];
        }

        $judul_situs = $judulseo1;
        $_META["description"] = $desseo1;
        $_META["keywords"] = $keyseo1;

        $query_add = "";
        if (isset($_GET["str"]) && !empty($_GET["str"])) {
            $str = substr($_GET["str"], 0, 1);
            $query_add .= "WHERE LEFT (`nama`,1) = '$str'";
        }

        $num = $koneksi_db->sql_query(
            "SELECT `id` FROM `mod_data_foto` $query_add"
        );
        $jumlah = $koneksi_db->sql_numrows($num);

        $limit = 12;
        if (empty($_GET["offset"]) and !isset($_GET["offset"])) {
            $offset = 0;
        } else {
            $offset = int_filter($_GET["offset"]);
        }

        $a = new paging($limit);

        // Pembagian halaman dimulai
        if (!isset($_GET["pg"], $_GET["stg"])) {
            $_GET["pg"] = 1;
            $_GET["stg"] = 1;
        }

        $qs = "";

        $arr = explode("&", $_SERVER["QUERY_STRING"]);

        if (is_array($arr)) {
            for ($i = 0; $i < count($arr); $i++) {
                if (!is_int(strpos($arr[$i], "str=")) && trim($arr[$i]) != "") {
                    list($kunci, $isi) = explode("=", $arr[$i]);
                    $isi = urldecode($isi);
                    $isi = urlencode($isi);

                    $qs .= $kunci . "=" . $isi . "&amp;";
                }
            }
        }

        $referer = referer_encode();

        $asal4 = "";
        $propinsi = $koneksi_db->sql_query(
            "SELECT * FROM mod_data_fotokat ORDER BY id"
        );
        while ($p = $koneksi_db->sql_fetchrow($propinsi)) {
            $id = $p["id"];
            $nama = $p["nama"];
            $urlkat = str_replace(" ", "-", $nama);
            $asal4 .=
                '<option value="gallery/' .
                $p["id"] .
                "/" .
                $urlkat .
                '.html">' .
                $nama .
                "</option>";
        }

        $content .= ' 
<select nama="kid" onChange="MM_jumpMenu(\'parent\',this,0)">
<option value="">-- Pilih Kategori --</option>';
        $content .= "" . $asal4 . '
  ';

        $content .= "</select></form> <br/> <br/>";

        $content .= '
<div class="row">
    <div>
';

        $query = $koneksi_db->sql_query(
            "SELECT * FROM `mod_data_foto` $query_add $SORT_SQL ORDER By `id` DESC LIMIT $offset, $limit"
        );

        $warna = null;
        while ($data = $koneksi_db->sql_fetchrow($query)) {
            if (!isset($warna)) {
                $warna = 'style="background:#"';
            } else {
                $warna = null;
            }
            $id = md5($data["id"]);
            $kid = $data["kat"];
            $link = $data["link"];
            $price = $data["price"]; // Get the price field

            $propinsi121 = $koneksi_db->sql_query(
                "SELECT * FROM mod_data_fotokat WHERE id='$kid'"
            );
            while ($p111 = $koneksi_db->sql_fetchrow($propinsi121)) {
                $namax = $p111["nama"];
            }

            $url = str_replace(" ", "-", $namax);

            // Make sure link opens in a new tab
            $linkStart = !empty($link) ? '<a href="' . $link . '" target="_blank">' : '';
            $linkEnd = !empty($link) ? '</a>' : '';

            // Format price using our helper function
            $formattedPrice = formatRupiah($price);

            $content .= '
            <div class="col-md-4 col-sm-6 col-xs-12 b_packages">
                <div class="v_place_img">
                    ' . $linkStart . '
                    <img src="images/foto/thumb/' . $data["foto"] . '" alt="' . $data["nama"] . '" title="' . $data["nama"] . '"/>
                    ' . $linkEnd . '
                </div>
                <div class="b_pack rows">
                    <div class="col-md-12">
                        <h4>' . $linkStart . $data["nama"] . $linkEnd . '</h4>
                        <p class="price-tag">' . $formattedPrice . '</p>
                    </div>
                </div>
            </div>';
        }

        $content .= '  
        </div>   
    </div>   
    <p align=center>';
        $content .= $a->getPagingfoto($jumlah, $_GET["pg"], $_GET["stg"]);
        $content .= "</p>";

        break;
}

/////////////
echo $content;
?>