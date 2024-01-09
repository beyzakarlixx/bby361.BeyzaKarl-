<?php
    /* Veritabanı bağlantı bilgileri */
    $sunucu = "localhost";
    $kullanici = "root";
    $sifre = "";
    $veritabani = "beyzakarli"; // "ı" karakterini kontrol et
    $port = 3306;

    /* Veritabanına bağlantı */
    $baglanti = mysqli_connect($sunucu, $kullanici, $sifre, $veritabani, $port)
    or die("Veritabanına bağlantı gerçekleştirilemedi..!");

    /* Türkçe karakterler için düzenleme */
    mysqli_set_charset($baglanti, "utf8");
?>