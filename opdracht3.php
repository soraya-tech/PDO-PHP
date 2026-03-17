<?php
// maak verbinding met de database
require 'opdracht_2/db.php';
//cheken of het formulier is verzonden 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_naam = trim($_POST['product_naam']);
    $prijs_per_stuk = $_POST['prijs_per_stuk'];
    $omschrijving = trim($_POST['omschrijving']);
    $houdbaarheidsDatum = $_POST['houdbaarheidsDatum'];
// cheken of allen required velden zijn ingevuld 
   if (empty($product_naam) || empty($prijs_per_stuk) || empty($omschrijving)) {
   echo "Vul alle velden in.";
    exit;
}
// probeer het product toe te voegen aan de database 
    try {
        $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving, houdbaarheidsDatum) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql); 

    // stopt de ingevulde gegevens in de database
        $stmt->execute([$product_naam, $prijs_per_stuk, $omschrijving, $houdbaarheidsDatum]);
        
    //geeft een succes bricht als het product is toegevoegd 
        echo "<p>Product succesvol toegevoegd!</p>";
    } 
    //foutafhandeling bij database fouten 
    catch(PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<!-- HTML furmuleer -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h2>Voeg een product toe</h2>
    <form method="POST" action="">
    <label>Product naam:</label><br>
    <input type="text" name="product_naam" required><br><br>

    <label>Prijs per stuk:</label><br>
    <input type="number" step="0.01" name="prijs_per_stuk" required><br><br>

    <label>Omschrijving:</label><br>
    <textarea name="omschrijving"></textarea><br><br>

    <label>Houdbaarheidsdatum:</label><br>
    <input type="date" name="houdbaarheidsDatum" required><br><br>

    <button type="submit">Toevoegen</button>
</form>

</body>
</html>
