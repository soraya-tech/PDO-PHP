-- Gebruik de database 'Winkel'
use winkel;
-- Maak tabel 'artikelen' aan
CREATE TABLE artikelen(
	 artikelNummer INT NOT NULL,                -- geheel getal voor artikelnummer
    naam VARCHAR(100) NOT NULL,                -- korte naam van het artikel
    omschrijving VARCHAR(255),                 -- omschrijving (kan ook TEXT)
    prijsPerStuk DECIMAL(10,2) NOT NULL,       -- prijs met twee decimalen (bv. 12.50)
    houdbaarheidsDatum DATE,                   -- datum (jaar-maand-dag)
    PRIMARY KEY (artikelNummer)  
);
-- Vijf artikelen toevoegen
INSERT INTO artikelen (artikelNummer, naam, omschrijving, prijsPerStuk, houdbaarheidsDatum) VALUES
(101, 'Appel', 'Verse rode appels per stuk', 0.75, '2025-12-31'),
(102, 'Melk 1L', 'Volle melk, 1 liter', 1.29, '2025-08-15'),
(103, 'Brood', 'Witbrood gesneden', 1.85, '2025-06-10'),
(104, 'Kaas 250g', 'Belegen kaas 250 gram', 3.99, '2026-03-20'),
(105, 'Yoghurt', 'Natuur yoghurt 500g', 2.15, '2025-11-30');
-- Selecties uitvoeren
SELECT *FROM artikelen;
