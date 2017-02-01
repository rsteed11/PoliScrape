<!-- 2016-Oct-12 PoliScrape HTML Heirarchy -->
<!-- Author: Ryan Steed -->
   
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $baseUrl ?>"><i class="fa fa-search"></i> PoliScrape</i> </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               <li>
                    <a href="<?= $browseUrl ?>/"><i class="fa fa-database"></i> Full Database </a>
                </li>
                <li>
                    <a href="<?= $baseUrl ?>docs"><i class="fa fa-file">Documentation</a>
                <li>
                    <a href="https://github.com/rsteed11/PoliScrape"><i class="fa fa-git"></i> Open Source on Github</a>
                </li>
	            <li>
	                <a href="https://github.com/rsteed11/PoliScrape/issues"><i class="fa fa-bug"></i> Github Issues</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
