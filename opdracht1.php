<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Rekeningverdeler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e0f7fa;
            border-radius: 5px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bereken de kosten per persoon</h2>
        <form method="post">
            <label for="totaal">Totaalbedrag (€):</label>
            <input type="number" step="0.01" name="totaal" id="totaal" required>

            <label for="personen">Aantal personen:</label>
            <input type="number" name="personen" id="personen" required>

            <label for="fooi">Fooi (%) (optioneel):</label>
            <input type="number" step="0.01" name="fooi" id="fooi">

            <input type="submit" value="Bereken">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $totaal = floatval($_POST['totaal']);
            $personen = intval($_POST['personen']);
            $fooi = isset($_POST['fooi']) ? floatval($_POST['fooi']) : 0;

            $errors = [];

            // Foutafhandeling
            if ($totaal <= 0) {
                $errors[] = "Het totaalbedrag moet groter zijn dan 0.";
            }
            if ($personen < 1) {
                $errors[] = "Het aantal personen moet minimaal 1 zijn.";
            }
            if ($fooi < 0) {
                $errors[] = "De fooi kan niet negatief zijn.";
            }

            if (count($errors) > 0) {
                echo '<div class="error"><ul>';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul></div>';
            } else {
                // Berekening
                $totaal_met_fooi = $totaal + ($totaal * $fooi / 100);
                $per_persoon = $totaal_met_fooi / $personen;

                echo '<div class="result">';
                echo "<p>Totaalbedrag: €" . number_format($totaal, 2) . "</p>";
                echo "<p>Fooi: " . number_format($fooi, 2) . "% (€" . number_format($totaal * $fooi / 100, 2) . ")</p>";
                echo "<p>Aantal personen: $personen</p>";
                echo "<hr>";
                echo "<p><strong>Elk persoon betaalt: €" . number_format($per_persoon, 2) . "</strong></p>";
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
