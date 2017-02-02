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
             <h1><b>Using VCL</b></h1>
            </div>
        </div>

        <!-- Jumbotron Header -->
        <div class="row">
            <div class="col-lg-12">
                <header class="jumbotron hero-spacer" style="font-size:18px">
                    <dl>
                        <dt>Using VCL<dt>
                        <dd>
                            <ol type="1">
                                <li><a href="#unc">UNC Virtual Computing Laboratory Docs</a></li>
                                <li><a href="#disk">Disk Image Usage</a></li>
                                <li><a href="#transfer">File Transfer</a></li>
                                <li><a href="#storage">File Storage</a></li>
                            </ol>
                        </dd>
                    </dl>
                </header>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3 id="unc">1. UNC Virtual Computing Laboratory Docs</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                While the PoliScrape application can be operated from any Linux or Unix server, including local machines, it is recommended that users operate PoliScrape using UNC's Virtual Computing Laboratory (VCL). To use the VCL, follow the instructions for reserving a machine available on UNC IT's site:
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:center;width:35%">
                    <div><a href="http://help.unc.edu/help/help-procedures-for-the-virtual-computing-lab-vcl/">UNC IT VCL Docs</a></div>
                </header>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3 id="disk">2. Disk Image Usage</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                A full blade Ubuntu disk image environment containing Scrapy and BeautifulSoup is available on the <a href="https://vcl.unc.edu/">VCL reservation page</a>, entitled <span class="code">Scrapy, Ubuntu 14.04 LTS Svr (Full Blade)</span>. Using a remote shell and <a href="<?= $baseUrl ?>web.php#github">GitHub's cloning method</a>, download the <a href="https://github.com/rsteed11/PoliScrape">PoliScrape repository</a> to a remote machine.
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:center;width:45%">
                    <div><a href="https://sils.unc.edu/it-services/servers/using-ssh">UNC IT Remote Shell Tutorial</a></div>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                Once the PoliScrape application is initialized, <a href="<?= $baseUrl ?>crawler.php">run the crawler</a>. VCL sessions are finite and all data, including the PoliScrape application, will be permanently wiped from the remote machine after the time reservation expires. Scraped data must be transferred to local or remote storage before the timeout.
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3 id="transfer">3. File Transfer</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                PoliScrape data is stored in <a href="http://help.unc.edu/help/mass-storage/">Longleaf mass storage</a> at the University of North Carolina at Chapel Hill. Shell into onyen@longleaf.its.unc.edu and navigate to <span class="code">/ms/depts/polisci/PoliScrape/</span>. Run the secure copy file transfer protocol from the VCL shell program to transfer a scraped file, exercising caution and creating file copies using the <span class="code">cp originalFile newFile</span> command to avoid loss of data.
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:center;width:80%">
                    <div>scp scrapedFile onyen@longleaf.its.unc.edu:/ms/depts/polisci/PoliScrape/xmlItems</div>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                To transfer a directory recursively, use the following command. This is the best method for maintaining date and time hierarchical organization created with <a href="<?= $baseUrl ?>settings.php#xml">Feed Settings</a>).
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                <header class="jumbotron special" style="font-size:18px;text-align:center;width:80%">
                    <div>scp -r scrapedDir onyen@longleaf.its.unc.edu:/ms/depts/polisci/PoliScrape/xmlItems</div>
                </header>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em;">
                <h3 id="storage">4. File Storage</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em;">
                Conventionally, files are stored in Longleaf at <span class="code">/ms/depts/polisci/PoliScrape/xmlItems/</span>. There is a <span class="code">history/</span> directory for raw, XML, scraped data and two other directories for split items from each crawler (see <a href="<?= $baseUrl ?>splitting.php">File Splitting</a>).
            </div>
        </div>
        <br/><br/>
        
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
