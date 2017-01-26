<?php
// 2016-Aug-28 Brockman IWP Version5 Revamp!
// 2008-Jan-25 Brockman NCSSM IWP
// Simple PHP replacement for legacy .cgi script., Lists all the problems for easy copy + paste.

include_once('PoliScrape-config.php');

?><!DOCTYPE html>
<meta charset="utf-8">
<html lang="en">

<head>
  <?php include_once("PoliScrape-head.php") ?>
</head>

<body>
    <?php include_once("PoliScrape-nav.php") ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Features -->
        <div class="row text-center">

<?php

$searchPath = rtrim($animationPath . $pathInfo, "/");

$searchName = str_replace("/", " / ", ucfirst($searchPath));
echo "<h1 style='margin-bottom: 1em;'>Browsing $searchName</h1>";

// RENDER Row per Animation Dir
// RENDER Tile per Animation

$animationDirs = recurseDirs($searchPath, 0 );
array_unshift($animationDirs, $searchPath );
// print_r($animationDirs);
foreach ( $animationDirs as $dir ) { 
  $hrefDir = str_replace_first($animationPath, '', $dir);
  $relDir = str_replace_first($searchPath.'/', '', $dir);
       if ( $dir != $searchPath ) {
?>

  <!-- Sub Directory -->
            <div class="col-sm-4">
              <p><a href="<?= $browseUrl ?><?= $hrefDir ?>"><?= $relDir ?></a></p>
            </div>

<?php
       } else { 
  $animationFiles = recurseFind($dir, '/.xml$/', 0 );
?>

<?php
foreach ( $animationFiles as $file ) { 
  $name = str_replace_first($dir.'/', '', $file);
  $uri = str_replace_first($animationPath,'',$file);
?>
            <div class="col-sm-4">
                   <p><a href="<?= $prefixUri ?><?= $animationPath ?><?= $uri ?>"><?= $name ?></i></p> <!-- color: #FFD700; -->
                        <!--<p><?=$dir?><?= $uri ?></p>-->
            </div>
<?php } ?>
  </div>
<?php }

}
 ?>

     </div>
        <!-- Current Directory --> 
<!--
        <div class="row">
            <div class="col-lg-12">
                <h3><?= $dir ?></h3>
            </div>
        </div>
-->
  <!-- /.row -->


</body>
</html>
