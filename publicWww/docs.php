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
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#software">Software Requirements</a></li>
                    </ol>
                </dd>
                <dt>Running the Crawler<dt>
                <dd>
                    <ol type="1">
                        <li><a href="<?= $baseUrl ?>crawler.php#run">Run Command</a></li>
                        <li><a href="<?= $baseUrl ?>crawler.php#targeting">Targeting and Scoping</a></li>
                        <li><a href="<?= $baseUrl ?>crawler.php#html">HTML Parsing</a></li>
                    </ol>
                </dd>
                <dt>Settings<dt>
                <dd>
                    <ol type="1">
                        <li><a href="<?= $baseUrl ?>settings.php#pipeline">Pipeline</a></li>
                        <li><a href="<?= $baseUrl ?>settings.php#xml">XML Feed</a></li>
                        <li><a href="<?= $baseUrl ?>settings.php#web">Web Courtesy</a></li>
                        <li><a href="<?= $baseUrl ?>settings.php#misc">Miscellaneous</a></li>
                    </ol>
                </dd>
                <dt>Using VCL<dt>
                <dd>
                    <ol type="1">
                        <li><a href="<?= $baseUrl ?>vcl.php#unc">UNC Virtual Computing Laboratory Docs</a></li>
                        <li><a href="<?= $baseUrl ?>vcl.php#disk">Disk Image Usage</a></li>
                        <li><a href="<?= $baseUrl ?>vcl.php#transfer">File Transfer</a></li>
                        <li><a href="<?= $baseUrl ?>vcl.php#storage">File Storage</a></li>
                    </ol>
                </dd>
                <dt>File Splitting<dt>
                <dd>
                    <ol type="1">
                        <li><a href="<?= $baseUrl ?>splitting.php#xml">XML Splitter Usage</a></li>
                        <li><a href="<?= $baseUrl ?>splitting.php#manual">Manual Filtering</a></li>
                    </ol>
                </dd>
                <dt>Webpage Maintenance<dt>
                <dd>
                    <ol type="1">
                        <li><a href="<?= $baseUrl ?>web.php#template">Template</a></li>
                        <li><a href="<?= $baseUrl ?>web.php#php">PHP Hierarchy</a></li>
                        <li><a href="<?= $baseUrl ?>web.php#github">GitHub Version Control</a></li>
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
