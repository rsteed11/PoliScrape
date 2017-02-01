<!-- 2016-Oct-12 PoliScrape HTML Heirarchy -->
<!-- Author: Ryan Steed -->

<!-- Template - StartBootStrap.com Heroic Features - https://startbootstrap.com/template-overviews/heroic-features/ -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="PoliScrape">
<meta name="author" content="Ryan Steed">

<title>PoliScrape</title>

<!-- Bootstrap CSS -->
<link href="<?= $baseUrl ?>css/bootstrap.css" rel="stylesheet">
<link href="<?= $baseUrl ?>css/font-awesome.css" rel="stylesheet"> <!-- Version 4.6.3 -->

<!-- Custom CSS -->
<link href="<?= $baseUrl ?>css/simple-sidebar.css" rel="stylesheet">

<!-- Common Application CSS -->
<link href="<?= $baseUrl ?>css/PoliScrape-common.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="<?= $baseUri ?>js/jquery-3.0.0.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="<?= $baseUrl ?>js/bootstrap.min.js"></script>
<style>
	.fa {
		display:inline;
		color:#b00b00;

	}
	a {
		font-size: 16px;
	}
	dt {
		color: #b00b00;
	}
	div {
		font-size: 16px;
	}
	body {
		line-height: 2.7em
	}
	.special {
		padding-top: 20px;
		padding-bottom: 20px;
		margin-left: 40px;
		width:auto;
		font-family: Courier;
		text-align: center;
		color: #b00b00;
	}
	h3 {
		color: #b00b00;
	}
	i {
		color: #b00b00;
		font-family: Courier;
	}
	.special div {
		font-size: 14px;
	}
</style>
<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?= $baseUrl ?>" style="font-size:19px"><i class="fa fa-search" ></i><b> PoliScrape</b></a>
                </li>
                <li>
                    <a href="<?= $baseUrl ?>docs.php" style="font-size:17px"><i class="fa fa-home"></i><b> Read the Docs</b></a>
                </li>
                <li>
                    <a href="<?= $baseUrl ?>crawler.php"><i class="fa fa-bug"></i> Running the Crawler</a>
                </li>
                <li>
                    <a href="<?= $baseUrl ?>settings.php"><i class="fa fa-cog"></i> Settings</a>
                </li>
                <li>
                    <a href="<?= $baseUrl ?>vcl.php"><i class="fa fa-laptop"></i> Using VCL</a>
                </li>
                <li>
                    <a href="<?= $baseUrl ?>splitting.php"><b><i class="fa fa-scissors"></b></i> File Splitting</a>
                </li>
                <li>
                	<a href="<?= $baseUrl ?>web.php"><b><i class="fa fa-html5"></b></i> Webpage Maintenance</a>
                </li>
                <li>
                    <a href="https://github.com/rsteed11/PoliScrape"><i class="fa fa-git"></i> Open Source on Github</a>
                </li>
                <li>
                	<a href="https://github.com/rsteed11/PoliScrape/issues"><i class="fa fa-exclamation-circle"></i> Github Issues</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
    	
<?php return ''; ?>