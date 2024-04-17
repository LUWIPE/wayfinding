<?php
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Vores Nykøbing</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.typekit.net/lla8zep.css">
    <script src="https://kit.fontawesome.com/b608edf7c6.js" crossorigin="anonymous"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container mt-3">
    <div class="row justify-content-between">
        <div class="col-2"><a href="index.php"><img class="img-fluid" src="images/voresnyk-logo-gold.png" alt=""></a>
        </div>
        <div class="d-flex col-4 justify-content-between align-items-center">
            <div class="flag ms-3"><img class="flag rounded-circle border border-5 border-gold" src="images/denmark.png"
                                        alt=""></div>
            <div class="flag"><img class="flag rounded-circle border border-2 border-secondary" src="images/britain.png"
                                   alt=""></div>
            <div class="flag me-3"><img class="flag rounded-circle border border-2 border-secondary"
                                        src="images/germany.png" alt=""></div>
        </div>
    </div>
</div>
<div class="" id="onePlace">
    <div class="container">
        <div class="mt-4 mb-2" id="back">
            <a href="places.php" class="fs-5 text-gold"><i class="fa-solid fa-chevron-left fs-6"></i> Tilbage til
                oversigten</a>
        </div>
    </div>
    <div class="container-fluid bg-primary p-3">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="row col-6 justify-content-center ps-5 mt-3 mb-3 align-items-center">
                    <div class="row justify-content-between" id="">
                        <?php

                        $sqladd = "";
                        $bind = [];

                        if (!empty($_GET["placeId"])) {
                            $sqladd = " AND placeId = :placeId";
                            $bind[":placeId"] = $_GET["placeId"];
                        }

                        $sqlPlaces = "SELECT * FROM places INNER JOIN category ON placeCategory = cateId WHERE 1=1" . $sqladd;
                        $places = $db->sql($sqlPlaces, $bind);
                        foreach ($places as $place) {
                            ?>
                            <div class="p-1 bg-primary d-flex align-items-center"
                                 id="">
                                <div class="w-100 text-center ">
                                    <div class="fs-3 text-gold">
                                        <?php
                                        echo $place->cateName;
                                        ?>
                                    </div>
                                    <div class="fs-1 mt-2 mb-2">
                                        <strong>
                                            <?php
                                            echo $place->placeName; //sorter alfabetisk//
                                            ?></strong>
                                    </div>
                                    <div class="fs-3">
                                        <?php
                                        echo $place->streetName . ' ' . $place->streetNumber;
                                        ?>
                                    </div>
                                    <div class="fs-3">
                                        <?php
                                        echo $place->postalCode . ' ' . $place->cityName;
                                        ?>
                                    </div>
                                    <div class="fs-3">
                                        <?php
                                        echo $place->phoneNumber;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mb-5" id="googleMap" style="width:100%;height:100vh"></div>
</div>

<div class="container-fluid fixed-bottom bg-secondary">
    <div class="row justify-content-evenly">
        <div class="col-1 m-2 text-center">
            <a href="index.php"><i class="fa-solid fa-house text-gold h1"></i></a>
        </div>
        <div class="col-1 m-2 text-center">
            <a href="places.php"><i class="fa-solid fa-magnifying-glass text-gold h1"></i></a>
        </div>
    </div>
</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUwmkWzSdJsxdloWRUlF2ZLXj-3Z6WLVU&callback=myMap"
        async></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>


    <?php
    $sqladd = "";
    $bind = [];

    if (!empty($_GET["placeId"])) {
        $sqladd = " AND placeId = :placeId";
        $bind[":placeId"] = $_GET["placeId"];
    }

    $sqlCoordinates = "SELECT * FROM places WHERE 1=1" . $sqladd;
    $coordinates = $db->sql($sqlCoordinates, $bind);
    ?>


    function myMap() {
        const coords = {lat:<?php echo $coordinates[0]->latitude ?>, lng:<?php echo $coordinates[0]->longitude ?> }
        const mapProp = {
            center: coords,
            zoom: 18,
        };

        const map = new google.maps.Map(document.querySelector("#googleMap"), mapProp);

        const marker = new google.maps.Marker({
            position: coords,
            map: map,
        });
    }

</script>
</body>
</html>
