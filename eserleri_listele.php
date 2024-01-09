<?php
    /* Bağlantı bilgileri */
    require_once("baglanti.php");

    /* Veritabanı sorgulama */
    $sorgu = mysqli_query($baglanti, "SELECT ES.*, CONCAT(YA.yazarAdi, ' ', YA.yazarSoyadi) AS yazarAdSoyad, YAY.yayineviAdi
                                  FROM eser ES
                                  INNER JOIN yazar YA ON ES.yazarID = YA.yazarID
                                  LEFT JOIN yayinevi YAY ON ES.yayineviID = YAY.yayineviID");
    $toplam = mysqli_num_rows($sorgu);
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HU BBY361 VTYS çalışmaları">
    <meta name="author" content="Orçun Madran">
    <title>BBY361 Eserleri Listele - Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/common.js"></script>

    <style>
        /* Stil kodları buraya eklenir */
    </style>

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BBY361</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <script>
                        for (index in mainMenu) {
                            document.write('<li className="nav-item"><a class="nav-link" target=' + mainMenu[index][2] + ' href=' + mainMenu[index][1] + '>' + mainMenu[index][0] + '</a></li>');
                        }
                    </script>
                </ul>
                <script>document.write(searchForm)</script>
            </div>
        </div>
    </nav>
</header>

<!-- Sayfa İçerik Başlangıcı -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Eserleri Listele</h1>
        <p class="lead">Bu sayfada veri tabanının eserler tablosunda yer alan kayıtların tamamı listelenmektedir.</p>
        <h2>Eser Kayıtları</h2>
        <p><?php echo("Toplam kayıt sayısı: ".$toplam);?></p>
        <p>
            <?php
            while($satir = mysqli_fetch_assoc($sorgu)){
                printf("<h4>".$satir["eserAdi"]."</h4>");
                printf("<p><b>Eser No:</b> ".$satir["eserID"]."</br>");
                printf("<b>Eser kayıt tarihi:</b> ".$satir["basimTarihi"]."</br>");
                printf("<b>Yazar:</b> ".$satir["yazarAdSoyad"]."</br>");
                printf("<b>Yayınevi:</b> ".$satir["yayineviAdi"]."</br>");
                printf("<hr>");
            }
            ?>
        </p>
    </div>
</main>
<!-- Sayfa İçerik Bitişi -->

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <script>document.write(footer)</script>
    </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
