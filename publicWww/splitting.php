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
             <h1><b>File Splitting</b></h1>
            </div>
        </div>

        <!-- Jumbotron Header -->
        <div class="row">
            <div class="col-lg-12">
            <header class="jumbotron hero-spacer" style="font-size:18px">
                <dl>
                    <dt>File Splitting<dt>
                    <dd>
                        <ol type="1">
                            <li>XML Splitter Usage</li>
                            <li>Manual Filtering</li>
                        </ol>
                    </dd>
                </dl>
        </header>
            </div>
        </div>

        <!-- Page Features -->
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3>1. XML Splitter Usage</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                PoliScrape includes a Python XML file splitting script to parse crawler run files. Usually run in the Longleaf Linux cluster (see <a href="#">File Transfer</a>), the xmlSplitter script <span class="code">PoliScrape/poliScrapy/xmlSplitter.py</span> iterates through each webpage item stored in the XML crawl file. Each file is copied into a separate file and named using its scraped <span class="code">id</span> item, or URL. A hierarchical tree file structure resembling the original web hierarchy is constructed as files are stored according to their respective HTML URI paths. 
                <br/><br/>
                There is a separate xmlSplitter file for each crawler, equipped to handle certain keywords specific to each website. To run the xmlSplitter file, use the following command:
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:center;width:60%">
                    <div>python xmlSplitter-crawlerName.py scrapedFile storageDir</div>
                </header>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3>2. Manual Filtering</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                The scraped file will be split into its requisite components and a hierarchy constructed in the specified <a href="#">file storage</a> directory in Longleaf. To alter or add an <span class="code">xmlSplitter</span> file, adjust the filtering condition in the filtering <span class="code">if</span> statement:
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:left;width:50%">
                    <div>if "historicaldocuments" not in title:</div>
                    <div style="text-indent:40px;">print(index, "Passed")</div>
                    <div style="text-indent:40px;">pass</div>
                    <div>else:</div>
                    <div style="text-indent:40px;">print(index, title)</div>
                    <div style="text-indent:40px;">filename = dir_name+"/"+title+ ".xml"</div>
                </header>
            </div>
        </div>
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
