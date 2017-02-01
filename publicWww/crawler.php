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
	    	 <h1><b>Running the Crawler</b></h1>
            </div>
        </div>

        <!-- Jumbotron Header -->
        <div class="row">
            <div class="col-lg-12">
            <header class="jumbotron hero-spacer" style="font-size:18px">
                <dl>
                    <dt>Running the Crawler<dt>
                    <dd>
                        <ol type="1">
                            <li>Run Command</li>
                            <li>Targeting and Scoping</li>
                            <li>HTML Parsing</li>
                        </ol>
                    </dd>
                </dl>
        </header>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em; margin-left:1em">
                <h3>1. Run Command</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em; margin-left:1em">
                Currently, there are two crawlers included in the PoliScrape project. The first, named <i>history</i>, targets the State Department's Office of the Historian FRUS collection. The second, called <i>wisconsin</i>, targets Wisconsin's FRUS collection. To run either crawler, navigate to the project home directory, <i>PoliScrape/poliScrapy/foreignScrape</i>. In the command line, run:
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em; margin-left:1em">
                <header class="jumbotron special" style="font-size:18px;width:35%">
                    <div>scrapy crawl crawlerName</div>
                </header>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em; margin-left:1em">
                <h3>2. Targeting and Scoping</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em; margin-left:1em">
                To adjust the first targeted site or volume for a crawler, open the crawler script, located in <i>PoliScrape/poliScrapy/foreignScrape/spiders/spiderName.py</i>. Change or append to the <i>start_urls</i> variable. The <i>allowed_domains</i> variable restricts the base domain searched, and prevents the crawler from straying from the scraping site. Multiple <i>allowed_domains</i> are accepted.
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em; margin-left:1em">
                <header class="jumbotron special" style="font-size:18px;text-align:left;width:75%">
                    <div>class MySpider(CrawlSpider):<div>
                        <div style="text-indent:40px;">name = 'history'</div>
                        <div style="text-indent:40px;">allowed_domains = ['history.state.gov']</div>
                        <div style="text-indent:40px;">start_urls = ['https://history.state.gov/historicaldocuments/frus1945v01']</div>
                </header>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 1.5em; margin-left:1em">
                <h3>3. HTML Parsing</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em; margin-left:1em">
                Crawlers scrape specific items from the webpage. These items are defined in <i>PoliScrape/poliScrapy/foreignScrape/items.py</i>. Any new items must be instantiated here. To define a new item or adjust an existing one, simply redefine it in the crawler script using the variable <i>item['itemName']</i>. Here, BeautifulSoup is used to parse body text, while simple HTML response parsers are used for other items.
                <br/><br/>
                Currently, both crawlers are calibrated to exclude extraneous webpage data. To adjust crawler scraping scope, PoliScrape utilizes a filter with a simple <i>for</i> loop and <i>if</i> statement inside the <i>parse()</i> class method. URLs that do not contain a key word such as <i>"frus1945"</i> are excluded from the crawler's queue. This keyword can be replaced, or additional keywords added.
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 0.5em; margin-left:1em">
                <header class="jumbotron special" style="font-size:18px;text-align:left;width:85%">
                    <div>def parse(self, response):<div>
                        <div style="text-indent:40px;">analyzeThis = response.xpath("//body").extract_first()</div>
                        <div style="text-indent:40px;">item = foreignScrapeItem() #instantiates predefined items (items.py)</div>
                        <div style="text-indent:40px;">soup = BeautifulSoup(analyzeThis, 'lxml')</div>
                        <div style="text-indent:40px;">item['name'] = response.xpath("//title").extract()[6:][:-8] #strips excess title text</div>
                        <div style="text-indent:40px;">item['id'] = response.url</div>
                        <div style="text-indent:40px;">item['bodyText'] = soup.body.get_text()[:-568] #strips off excess text</div>
                        <div style="text-indent:40px;">roughLinks = response.xpath('//a/@href').extract()</div>
                        <div style="text-indent:40px;">fineLinks = []</div>
                        <div style="text-indent:40px;">for url in roughLinks:</div>
                            <div style="text-indent:80px;">if "frus1945" in url:</div>
                                <div style="text-indent:120px;">fineLinks.append(url)</div>
                        <div style="text-indent:40px;">item['urls'] = ["https://history.state.gov/"+link for link in fineLinks]</div>
                        <div style="text-indent:40px;">for url in fineLinks:</div>
                            <div style="text-indent:80px;">try:</div>
                                <div style="text-indent:120px;">yield scrapy.Request("https://history.state.gov/"+url, callback=self.parse)</div>
                            <div style="text-indent:80px;">except: </div>
                                <div style="text-indent:120px;">print("Could not parse URL! "+url)</div>
                        <div style="text-indent:40px;">yield item #sends items to item pipeline (settings.py, pipelines.py)</div>
                </header>
            </div>
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
