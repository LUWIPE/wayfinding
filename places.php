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

<body>
<div class="container mt-3">
    <div class="row justify-content-between">
        <div class="col-2"><a href="index.php"><img class="img-fluid" src="images/voresnyk-logo-gold.png" alt=""></a></div>
        <div class="d-flex col-4 justify-content-between align-items-center">
            <div class="flag ms-3"><img class="flag rounded-circle border border-5 border-gold" src="images/denmark.png" alt=""></div>
            <div class="flag"><img class="flag rounded-circle border border-2 border-secondary" src="images/britain.png" alt=""></div>
            <div class="flag me-3"><img class="flag rounded-circle border border-2 border-secondary" src="images/germany.png" alt=""></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-around col-12 mt-3">
        <div class="row col-4 card justify-content-center h-100 bg-primary pb-5">
            <div class="col-11 mt-3 border-bottom border-senary border-2">
                <strong class="fs-4 text-gold">
                    Kategorier:
                </strong>
            </div>
            <?php
            $categories = $db->sql("SELECT * FROM category");
            foreach ($categories as $category) {
                ?>
                <div class="col-11">
                    <div class=" w-100">
                        <div class="fs-5 m-2">
                            <?php
                            echo $category->cateName;
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-11 mt-4 border-bottom border-senary border-2">
                <strong class="fs-4 text-gold">
                    Subkategorier:
                </strong>
            </div>
            <?php
            $subCategories = $db->sql("SELECT * FROM subCategory");
            foreach ($subCategories as $subCategory) {
                ?>
                <div class="col-11">
                    <div class=" w-100">
                        <div class="fs-5 m-2">
                            <?php
                            echo $subCategory->subCateName;
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row col-8 g-2 justify-content-center m-0">
            <div class="d-flex align-content-start m-0">
                <div class="input-group col-8">
                    <input type="text" class="form-control text-secondary bg-primary border-2 border-gold fs-4" id="placeSearch" placeholder="Søg her..." aria-label="place" value="">
                    <button type="submit" class="btn btn-gold text-quinary fs-4" id="searchBtn">Søg</button>
                </div>
            </div>
            <div class="row justify-content-around mt-3">
                <?php
                $places = $db->sql("SELECT * FROM places INNER JOIN category ON placeCategory = cateId");
                foreach ($places as $place) {
                    ?>
                    <div class="col-5 mb-4 p-1 card bg-primary d-flex align-content-center pt-5 pb-5">
                        <div class="w-100 text-center ">
                            <div class="fs-6 text-gold">
                                <?php
                                echo $place->cateName;
                                ?>
                            </div>
                            <div class="fs-5 mt-2 mb-2">
                                <strong>
                                    <?php
                                    echo $place->placeName; //sorter alfabetisk//
                                    ?></strong>
                            </div>
                            <div class="fs-6">
                                <?php
                                echo $place->streetName . ' ' . $place->streetNumber;
                                ?>
                            </div>
                            <div class="fs-6 d-none">
                                <?php
                                echo $place->postalCode . ' ' . $place->cityName;
                                ?>
                            </div>
                            <div class="fs-6 d-none">
                                <?php
                                echo $place->phoneNumber; //indsæt if statement//
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


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
