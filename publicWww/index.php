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

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
	    	 <h1><b>PoliScrape</b>: The Definitive Foreign Policy Database</h1>
		
            </div>
        </div>

        <!-- Jumbotron Header -->
        <div class="row">
            <div class="col-lg-12">
        <header class="jumbotron hero-spacer">

		<p>Committed to scraping the text that matters most.</p>
		<p>When you find something that can be improved, please <a href="https://github.com/ntbrock/iwphys/issues">open a new github issue.</a></p>
</header>
            </div>
        </div>

        <!-- Page Features -->
        <div class="row text-center">

        </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
        		    <p>
            		    PoliScrape is made possible in part by these wonderful projects: 
            		    <a href="https://scrapy.org/">Scrapy</a> /  
            		    <a href="http://fontawesome.io/">Font Awesome 4.6.3</a> / 
            		    <a href="https://startbootstrap.com/template-overviews/heroic-features/">HTML 5 Template is StartBootstrap.com, Heroic Features</a>
            		</p>
        		    <p>Acknowledgement to Dr. Timothy McKeown at the University of North Carolina at Chapel Hill for the inspiration and sponsorship of PoliScrape.</p>
                    <p>Author: Ryan Steed</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <?php include_once('PoliScrape-foot.php'); ?>

</body>

</html>
