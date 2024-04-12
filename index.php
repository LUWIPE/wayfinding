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
    <script src="https://kit.fontawesome.com/b608edf7c6.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div id="googleMap" style="width:100%;height:90vh;"></div>


<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(54.7662677,11.8716984),
            zoom:20,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUwmkWzSdJsxdloWRUlF2ZLXj-3Z6WLVU&callback=myMap"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>