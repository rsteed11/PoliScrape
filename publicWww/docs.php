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
  <?php include_once("PoliScrape-docs-head.php") ?>
</head>

<body>
    </br>
    <!-- Page Content -->
    <div class="container">
        <?php include_once("button.php") ?>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
	    	 <h1><b>Read the Docs</b></h1>
            </div>
        </div>

        <!-- Jumbotron Header -->
        <div class="row">
            <div class="col-lg-12">
        <header class="jumbotron hero-spacer" style="font-size:18px">
            <p>This document covers the following topics:</p>
            <dl style="margin-left:40px">
                <dt>Read the Docs<dt>
                <dd>
                    <ol type="1">
                        <li>Introduction</li>
                        <li>Software Requirements</li>
                    </ol>
                </dd>
                <dt>Running the Crawler<dt>
                <dd>
                    <ol type="1">
                        <li>Run Command</li>
                        <li>Targeting and Scoping</li>
                        <li>HTML Parsing</li>
                    </ol>
                </dd>
                <dt>Settings<dt>
                <dd>
                    <ol type="1">
                        <li>Pipeline</li>
                        <li>XML Feed</li>
                        <li>Web Courtesy</li>
                        <li>Miscellaneous</li>
                    </ol>
                </dd>
                <dt>Using VCL<dt>
                <dd>
                    <ol type="1">
                        <li>UNC VCL Docs</li>
                        <li>Disk Image Usage</li>
                        <li>File Transfer</li>
                        <li>File Storage</li>
                    </ol>
                </dd>
                <dt>File Splitting<dt>
                <dd>
                    <ol type="1">
                        <li>xmlSplitter Usage</li>
                        <li>Manual Filtering</li>
                    </ol>
                </dd>
                <dt>Webpage Maintenance<dt>
                <dd>
                    <ol type="1">
                        <li>Template</li>
                        <li>PHP Hierarchy</li>
                        <li>GitHub Version Control</li>
                    </ol>
                </dd>
            </dl>
        </header>
            </div>
        </div>

        
        
        <!-- Page Features -->
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
        		    
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <?php include_once('PoliScrape-foot.php'); ?>

</body>

</html>
