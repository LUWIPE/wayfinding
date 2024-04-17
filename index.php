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
<div class="container fixed-top mt-3">
    <div class="row justify-content-end">
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

<div id="googleMap" style="width:100%;height:95vh;"></div>
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

<script>

    function myMap() {
        const coords = {lat: 54.7662677, lng: 11.8716984}
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUwmkWzSdJsxdloWRUlF2ZLXj-3Z6WLVU&callback=myMap"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>