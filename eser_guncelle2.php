<?php
/* Bağlantı bilgilerinin alınması */
require_once("baglanti.php");

/* Ekleme işlemi sorgusu */
$eserID = mysqli_real_escape_string($baglanti, $_POST['eserID']);
$eserAdi = mysqli_real_escape_string($baglanti, $_POST['eserAdi']);
$yazarID = mysqli_real_escape_string($baglanti, $_POST['yazarID']);
$yayineviID = mysqli_real_escape_string($baglanti, $_POST['yayineviID']);
$basimTarihi = mysqli_real_escape_string($baglanti, $_POST['basimTarihi']);

$sorgu = "UPDATE eser SET eserAdi = '$eserAdi', yazarID = $yazarID, yayineviID = $yayineviID, basimTarihi = '$basimTarihi' WHERE eserID = $eserID";

if (mysqli_query($baglanti, $sorgu)) {
    mysqli_close($baglanti);
    if (!headers_sent()) {
        header("Location: eserleri_listele.php");
        exit;
    }
} else {
    printf("Hata: " . $sorgu . "<br>" . mysqli_error($baglanti));
}
?>
