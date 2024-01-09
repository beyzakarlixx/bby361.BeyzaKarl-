--
-- Veritaban�: `beyzakarli`
--
CREATE DATABASE IF NOT EXISTS `beyzakarli` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `beyzakarli`;




CREATE TABLE IF NOT EXISTS Yayinevi (
    yayineviID INTEGER PRIMARY KEY,
    yayineviAdi TEXT,
    yayineviAdres TEXT,
    yayineviTel TEXT
);

INSERT INTO Yayinevi (yayineviID, yayineviAdi, yayineviAdres, yayineviTel) VALUES
(1, 'Timaş Yayınları', 'İstanbul', '0212 511 24 24'),
(2, 'Everest Yayınları', 'İstanbul', '0212 513 34 20'),
(3, 'Kabalcı Yayınları', 'İstanbul', '0212 347 54 51'),
(4, 'Destek Yayınları', 'İstanbul', '0212 252 22 43'),
(5, 'FM Yayınları', 'Ankara', '0312 220 09 60');

-- KonuBasliklari Tablosu
CREATE TABLE IF NOT EXISTS KonuBasliklari (
    konuID INTEGER PRIMARY KEY,
    konuBasligi TEXT
);

INSERT INTO KonuBasliklari (konuID, konuBasligi) VALUES
(1, 'töre'),
(2, 'tarih'),
(3, 'fantastik'),
(4, 'toplumsal'),
(5, 'insan ilişkileri');

-- Eser Tablosu
CREATE TABLE IF NOT EXISTS Eser (
    eserID INTEGER PRIMARY KEY,
    eserAdi TEXT,
    yazarID INTEGER,
    yayineviID INTEGER,
    konuID INTEGER,
    basimTarihi NUMERIC,
    sayfaSayisi NUMERIC
);

INSERT INTO Eser (eserID, eserAdi, yazarID, yayineviID, konuID, basimTarihi, sayfaSayisi) VALUES
(1, 'Yanık Buğdaylar', 1, 1, 1, 1990, 384),
(2, 'Uçurtma Avcısı', 2, 2, 2, 2004, 375),
(3, 'Momo', 3, 3, 3, 2004, 300),
(4, 'Hayat Cesurlara Torpil Geçer', 4, 4, 4, 2018, 255),
(5, 'Marallar İnince Suya', 5, 5, 5, 2005, 151);

-- Yazar Tablosu
CREATE TABLE IF NOT EXISTS Yazar (
    yazarID INTEGER PRIMARY KEY,
    yazarAdi TEXT,
    yazarSoyadi TEXT
);

INSERT INTO Yazar (yazarID, yazarAdi, yazarSoyadi) VALUES
(1, 'Ahmed Günbay', 'Yıldız'),
(2, 'Khaled', 'Hosseini'),
(3, 'Michael', 'Ende'),
(4, 'Bircan', 'Yıldırım'),
(5, 'Ali', 'Fuat');
