<!-- 2016-Oct-12 PoliScrape HTML Heirarchy -->
<!-- Author: Ryan Steed -->

<?php
// 2016-Oct-12 Steed
// 'New-age' php script that renders the right java code based on the PATH_INFO

include_once('PoliScrape-config.php');

?><!DOCTYPE html>
<meta charset="utf-8">
<html lang="en">

<head>
  <?php include_once("PoliScrape-head.php") ?>
</head>

<body>
    <?php include_once("PoliScrape-nav.php") ?>
    <div class="container">
        <header class="jumbotron hero-spacer"> 
            <h3>Latest data scraped, organized in JSON:</h3>
        </header>
        <!-- Page Features -->

        <div style="width:100%"><?php include_once("../poliScrapy/items/poliScrapy/history/69179b4796f611e69513a45e60edbd8f.jl") ?></div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include_once('PoliScrape-foot.php'); ?>

</body>

</html>