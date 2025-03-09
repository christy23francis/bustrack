
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include("include/css.php")
?>
</head>
<body>

    <div class="osahan-index bg-c d-flex align-items-center justify-content-center vh-100 index-page">
        <div class="text-center">
            <a href="landing.php">
            <!-- <i class="icofont-bus text-white display-1 bg-danger p-4 rounded-circle"></i> -->
             <img src="./app/admin/assets/images/favicon.png" alt="" width="400px" height="400px">
            </a><br>
            <div class="spinner"></div>
        </div>
    </div>
    <div class="osahan-fotter fixed-bottom m-3">
        <a class="btn btn-block px-4 py-3 d-flex align-items-center osahanbus-btlan btn-danger text-white shadow" href="landing.php">
        Get Started <i class="icofont-arrow-right ml-auto"></i>
        </a>
    </div>
    <?php
        include("include/js.php")
    ?>
</body>

</html>