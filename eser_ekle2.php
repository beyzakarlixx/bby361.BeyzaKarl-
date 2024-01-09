<?php
/* Bağlantı bilgilerinin alınması */
require_once("baglanti.php");

/* Ekleme işlemi sorgusu */
$eserAdi = mysqli_real_escape_string($baglanti, $_POST['eserAdi']);
$yazarID = mysqli_real_escape_string($baglanti, $_POST['yazarID']);
$yayinevi = mysqli_real_escape_string($baglanti, $_POST['yayinevi']);

$sorgu = "INSERT INTO eser (eserAdi, yazarID, yayinevi)
            VALUES ('$eserAdi', $yazarID, '$yayinevi')";

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
