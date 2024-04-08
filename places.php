<?php
require "settings/init.php";
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
    <link rel="stylesheet" href="https://use.typekit.net/lla8zep.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body
<div class="row g-2">
    <?php
    $produkter = $db->sql("SELECT * FROM places inner join FROM category");
    foreach($produkter as $places) {
        ?>
        <div class="col-12 col-md-6">
            <div class="card w-100">
                <div class="card-header">
                    <?php
                    echo $places->placeCaregory;
                    ?>
                </div>
                <div class="card-header">
                    <?php
                    echo $places->placeName;
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
