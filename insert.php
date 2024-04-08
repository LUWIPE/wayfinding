<?php
require "settings/init.php";

if (!empty($_POST["data"])){
    $data = $_POST["data"];

    $sql = "INSERT INTO produkter (prodNavn, prodBeskrivelse, prodPris) VALUES(:prodNavn, :prodBeskrivelse, :prodPris)";
    $bind =[
        ":prodNavn" => $data["prodNavn"],
        ":prodBeskrivelse" => $data["prodBeskrivelse"],
        ":prodPris" => $data["prodPris"]
    ];

    $db->sql($sql, $bind, false);

    echo "Produktet er nu indsat. <a href='insert.php'>Indsæt et produkt mere</a>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container">
    <form action="insert.php" method="post">
        <div class="row g-3">
            <div class="col12 col-md-6">
                <label for="prodNavn" class="form-label">Produkt navn</label>
                <input type="text" class="form-control" id="prodNavn" name="data[prodNavn]" placeholder="Produkt navn" value="">
            </div>
            <div class="col12 col-md-6">
                <label for="prodPris" class="form-label">Produkt pris</label>
                <input type="number" step="0.01" class="form-control" id="prodPris" name="data[prodPris]" placeholder="Produkt pris" value="">
            </div>
            <div class="col-12">
                <label for="prodBeskrivelse" class="form-label">Produkt beskrivelse</label>
                <textarea class="form-control" name="data[prodBeskrivelse]" id="prodBeskrivelse" placeholder="Produkt beskrivelse"></textarea>
            </div>
            <div class="col-12 col-md-4 offset-md-8">
                <button type="submit" class="btn btn-primary w-100">Opret</button>
            </div>
        </div>
    </form>
</div>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
