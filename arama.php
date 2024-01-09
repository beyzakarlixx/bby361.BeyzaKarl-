<?php
/* Bağlantı bilgileri */
require_once("baglanti.php");

/* Veritabanı sorgulama */
$q = mysqli_real_escape_string($baglanti, $_GET["q"]);
$sorgu = mysqli_query($baglanti, "SELECT * FROM eser, yazar WHERE eser.yazarID = yazar.yazarID AND (yazarAdi LIKE '%$q%' OR yazarSoyadi LIKE '%$q%' OR eserAdi LIKE '%$q%')");
$toplam = mysqli_num_rows($sorgu);
?>

<!doctype html>
<html lang="en" class="h-100">
<head>
    <!-- Diğer başlık ve meta etiketleri buraya gelebilir -->
    <!-- ... -->
</head>
<body class="d-flex flex-column h-100">
    <!-- Diğer HTML içeriği buraya gelebilir -->
    <!-- ... -->

    <!-- Sayfa İçerik Başlangıcı -->
    <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Eserleri Listele</h1>
            <p class="lead">Bu sayfada veritabanının eserler tablosunda yer alan kayıtların tamamı listelenmektedir.</p>
            <h2>Eser Kayıtları</h2>
            <p><?php echo("Toplam kayıt sayısı: " . $toplam);?></p>
            <div class="eser-listesi">
                <?php
                while ($satir = mysqli_fetch_assoc($sorgu)) {
                    echo "<h4>{$satir['eserAdi']}</h4>";
                    echo "<p><b>Eser No:</b> {$satir['eserID']}</p>";
                    echo "<p><b>Yazar:</b> {$satir['yazarAdi']} {$satir['yazarSoyadi']}</p>";
                    echo "<hr>";
                }
                ?>
            </div>
        </div>
    </main>
    <!-- Sayfa İçerik Bitişi -->

    <!-- Diğer script ve stil etiketleri buraya gelebilir -->
    <!-- ... -->
</body>
</html>
