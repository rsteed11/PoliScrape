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
            <div class="col-lg-12" style="margin-bottom: 0.5em">
             <h1><b>Webpage Maintenance</b></h1>
            </div>
        </div>

        <!-- Jumbotron Header -->
        <div class="row">
            <div class="col-lg-12">
            <header class="jumbotron hero-spacer" style="font-size:18px">
                <dl>
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
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3>1. Template</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
            The PoliScrape webpage is a PHP hierarchy, hosted at <a href="http://poliscrape-rsteed11.apps.unc.edu">poliscrape-rsteed11.apps.unc.edu</a>. The PHP hierarchy code can be found in full in the GitHub repository in the <span class="code">PoliScrape/publicWww/</span> directory. It is composed of four main components: a home page, Database tab, GitHub source links, and the PoliScrape documentation. The browsing tab iterates through data housed in the <span class="code">PoliScrape/publicWww/Database/</span> directory, creating links for subdirectories and displaying XML levels. The Database tab is intended to display an HTML version of the PoliScrape stored data hierarchy, though it is not linked directly to Longleaf due to storage restrictions. The webpage is constructed from the Bootstrap Heroic Features template using Font Awesome, found here:
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:center;width:60%">
                    <div><a href="#">Bootstrap Heroic Features</a></div>
                    <div><a href="#">Font Awesome</a></div>
                </header>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3>2. PHP Hierarchy</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
            An <a href="#">nginx</a>-driven PHP localhost was used for development. The PHP hierarchy contained in the <span class="code">PoliScrape/publicWww/</span> directory consists of several components. The <span class="code">PoliScrape-config.php</span> file defines base URI paths for both development environment and production environment, while <span class="code">PoliScrape-nav.php</span>, <span class="code">PoliScrape-head.php</span> and <span class="code">PoliScrape-foot.php</span> files define common page elements. The <span class="code">PoliScrape-common.php</span> initializes path URLs and directory searching protocol implemented in the <span class="code">browse.php</span> file.
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3>3. GitHub Version Control</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
            The production server is maintained on <a href="#">Carolina Cloud Apps</a> through a GitHub submodule. Currently, it is only available for modification by Ryan Steed, the account owner. A GitHub contributor may publish changes as merge requests, which can be fetched and merged into the production submodule and published to production. Refer to the <a href="#">GitHub documentation</a> for more information on submodules and version control. A few useful version control commands are provided below.
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:left;width:60%">
                    <div>git clone https://github.com/rsteed11/PoliScrape/</div>
                    <div>git add changedFiles</div>
                    <div>git commit -m "Commit description."</div>
                    <div>git push</div>
                </header>
            </div>
        </div>

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
