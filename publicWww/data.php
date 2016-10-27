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

$searchPath = rtrim($itemPath . $pathInfo, "/");

$searchName = str_replace("/", " / ", ucfirst($searchPath));
echo "<h1 style='margin-bottom: 1em;'>Browsing $searchName</h1>";

// RENDER Row per item Dir
// RENDER Tile per item

$itemDirs = recurseDirs($searchPath, 0 );
array_unshift($itemDirs, $searchPath );
// print_r($itemDirs);
foreach ( $itemDirs as $dir ) { 
    $hrefDir = str_replace_first($itemDirs, '', $dir);
    $relDir = str_replace_first($searchPath.'/', '', $dir);
       if ( $dir != $searchPath ) {
?>
    <!-- Sub Directory -->
        <div class="row">
            <div class="col-lg-12">
             <h3><a href="<?= $hrefDir ?>"><?= $relDir ?></a></h3>
        </div>
        </div>

<?php
       } else { 
    $itemFiles = recurseFind($dir, '/.jl$/', 0 );
?>
        <!-- Current Directory --> 
<!--
        <div class="row">
            <div class="col-lg-12">
                <h3><?= $dir ?></h3>
            </div>
        </div>
-->
    <!-- /.row -->

    <!-- items -->
        <div class="row">

<?php
foreach ( $itemFiles as $file ) { 
    $name = str_replace_first($dir.'/', '', $file);
    $uri = str_replace_first($itemPath,'',$file);
    $newFile = fopen("../$browseUri/$name.html", "wa") or die("unable to open new file");
    $newFileContents = "<?php include_once('PoliScrape-config.php');
?><!DOCTYPE html>
<meta charset='utf-8'>
<html lang='en'>

<head>
  <?php include_once('PoliScrape-head.php') ?>
</head>

<body>
    <?php include_once('PoliScrape-nav.php') ?>
    <div class='container'>
        <header class='jumbotron hero-spacer'> 
            <h3>Latest data scraped, organized in JSON:</h3>
        </header>
        <!-- Page Features -->

        <div style='width:100%''><?php include_once('http://localhost/PoliScrape/git/PoliScrape/poliScrapy/items/poliScrapy/history/394e58ae9c6f11e68c99a45e60edbd8f.jl')?></div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include_once('PoliScrape-foot.php'); ?>

</body>

</html>";
    $newFile = fwrite($newFile, $newFileContents);
?>
            <div class="col-md-4 col-sm-6 hero-feature">
              <div class="thumbnail">
                 <div class='caption'>
                   <p><a href="../<?= $browseUri ?>/<?= $name ?>.html"><?= $name ?></i></a></p> <!-- color: #FFD700; -->
                 </div>       
             </div>
           </div>
<?php } ?>
    </div>
<?php }

}
 ?>

     </div>
</body>
</html>
