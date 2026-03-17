<?php
// maak verbinding met de database
require 'select_connectie.php';

// query om data op te halen
$sql = "SELECT * FROM producten";
// PDO gebruiken
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- HTML structuur -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Producten</title>
</head>
<body>

<h2>Producten overzicht</h2>
<!-- Tabel om productgegevens weer te geven -->
<table border="1">
<tr>
<th>ID</th>
<th>Product naam</th>
<th>Geboortedatum</th>
<th>Acties</th>
</tr>

<!-- alle rijen uit de database één voor één ophaalt. -->
<?php foreach ($result as $row){?>
<!--laat gegevens uit de database zien in je HTML tabel.-->
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['naam']; ?></td>
<td><?php echo $row['geboortedatum']; ?></td>

<td>
<!-- Acties -->
<button>Edit</button>
<button>Delete</button>
</td>

</tr>

<?php } ?>

</table>
</body>
</html>