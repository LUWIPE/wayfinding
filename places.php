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
<div class="container">
    <div class="row justify-content-around mt-3">
        <div class="col-4 card justify-content-center align-items-start bg-primary pb-4 h-100">
            <div class="row">
                <div class="col-11 mt-3 border-bottom border-senary border-2">
                    <strong class="fs-4 text-gold">
                        Filtre:
                    </strong>
                </div>
                <?php
                $categories = $db->sql("SELECT * FROM category");
                foreach ($categories as $category) {
                    ?>
                    <div class="col-11">
                        <div class="w-100">
                            <div class="fs-5 m-2 text-secondary" id="<?php echo($category->cateId) ?>">
                                <a id="cateBtn" class="text-secondary"
                                   href="places.php?cateId=<?php echo $category->cateId;
                                   echo (!empty($_GET["subCateId"])) ? '&subCateId=' . $_GET["subCateId"] : ""; ?>">
                                    <?php
                                    echo $category->cateName;
                                    ?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-11 mt-4 border-bottom border-senary border-2">
                    <strong class="fs-4 text-gold">
                        Kategorier:
                    </strong>
                </div>
                <?php
                $subCategories = $db->sql("SELECT * FROM subcategory WHERE subCateId > 1");
                foreach ($subCategories as $subCategory) {
                    ?>
                    <div class="col-11">
                        <div class="w-100">
                            <div class="fs-5 m-2 text-secondary" id="<?php echo($subCategory->subCateId) ?>">
                                <a id="subCateBtn" class="text-secondary"
                                   href="places.php?<?php echo (!empty($_GET["cateId"])) ? '&cateId=' . $_GET["cateId"] : ""; ?>&subCateId=<?php echo $subCategory->subCateId ?>">
                                    <?php
                                    echo $subCategory->subCateName;
                                    ?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-8 justify-content-center m-0 p-0">
            <div class="row justify-content-start p-0">
                <form class="p-0" action="search.php" method="post">
                    <div class="d-flex align-content-start m-0 p-0 mb-3 ms-5">
                        <div class=" input-group">
                            <input class="form-control text-secondary bg-primary border-2 border-gold fs-4 "
                                   aria-label="place" type="text" name="search" placeholder="Søg her...">
                            <input class="btn btn-gold text-quinary fs-4" id="searchBtn" type="submit" value="Søg"
                                   name="submit"">
                        </div>
                    </div>
                </form>
                <?php
                if (!empty($_GET["cateId"]) || !empty($_GET["subCateId"])) {
                    ?>
                    <div class="col-3 text-center p-0 mb-3 ms-5 border border-gold border-1 rounded-3 bg-quinary"
                         id="deleteFilter">
                        <a class="text-gold fs-5" href="places.php"><i class="fa-solid fa-xmark text-gold fs-6"></i>
                            fjern filtre</a>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row justify-content-between mb-5 p-0" id="places">
                <?php
                $sqladd = "";
                $bind = [];

                if (!empty($_GET["cateId"])) {
                    $sqladd .= " AND cateId = :cateId";
                    $bind[":cateId"] = $_GET["cateId"];
                }

                if (!empty($_GET["subCateId"])) {
                    $sqladd .= " AND subCateId = :subCateId";
                    $bind[":subCateId"] = $_GET["subCateId"];
                }

                $sqlPlaces = "SELECT * FROM ((places INNER JOIN category ON placeCategory = cateId) INNER JOIN subcategory ON placeSubCategory = subCateId) WHERE 1=1" . $sqladd;
                $places = $db->sql($sqlPlaces, $bind);
                foreach ($places as $place) {
                    ?>
                    <div class="col-5 mb-5 ms-5 p-1 card bg-primary d-flex align-content-center pt-5 pb-5"
                         id="<?php echo($place->placeId) ?>">
                        <a href="destination.php?placeId=<?php echo $place->placeId ?>" id="destination">
                            <div class="w-100 text-center">
                                <div class="fs-6 text-gold">
                                    <?php
                                    echo $place->cateName;
                                    ?>
                                </div>
                                <div class="fs-5 mt-2 mb-2 text-secondary">
                                    <strong>
                                        <?php
                                        echo $place->placeName; //sorter alfabetisk//
                                        ?></strong>
                                </div>
                                <div class="fs-6 text-secondary">
                                    <?php
                                    echo $place->streetName . ' ' . $place->streetNumber;
                                    ?>
                                </div>
                                <div class="fs-6 d-none text-secondary">
                                    <?php
                                    echo $place->postalCode . ' ' . $place->cityName;
                                    ?>
                                </div>
                                <div class="fs-6 d-none text-secondary">
                                    <?php
                                    echo $place->phoneNumber;
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
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

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const deleteFilter = document.querySelector('#deleteFilter')
    const subCateBtn = document.querySelector('#subCateBtn')
    const cateBtn = document.querySelector('#cateBtn')

    cateBtn.addEventListener('click', () => {
        //deleteFilter.classList.remove('d-none')
    })

    subCateBtn.addEventListener('click', () => {
        //deleteFilter.classList.remove('d-none')
    })

    deleteFilter.addEventListener('click', () => {
        //deleteFilter.classList.add('d-none')
    })

</script>
</body>
</html>
