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
             <h1>Settings</h1>
            </div>
        </div>

        <!-- Jumbotron Header -->
        <div class="row">
            <div class="col-lg-12">
            <header class="jumbotron hero-spacer" style="font-size:18px">
                <dl>
                    <dt>Settings<dt>
                <dd>
                    <ol type="1">
                        <li><a href="#pipeline">Pipeline</a></li>
                        <li><a href="#xml">XML Feed</a></li>
                        <li><a href="#web">Web Courtesy</a></li>
                        <li><a href="#misc">Miscellaneous</a></li>
                    </ol>
                </dd>
                </dl>
        </header>
            </div>

            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 1.5em">
                    <h3 id="pipeline">1. Pipeline</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 0.5em">
                    Once items are scraped (see Items), they are shuttled to an item pipeline, <span class="code">PoliScrape/poliScrapy/foreignScrape/pipelines.py</span>. Here, items are exported to a single file entitled <span class="code">spiderName_products.xml</span>. Each item is formatted into an XML (Extensible Markup Language) value, and appended to a single <span>item</span> tag. Each scraped page is appended to this document, creating a single, large file for each crawler run. To change this file name, simply adjust the pipeline settings.
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 0.5em">
                    <header class="jumbotron special" style="font-size:18px;text-align:left;width:75%">
                        <div>from scrapy import signals</div>
                        <div>from scrapy.exporters import XmlItemExporter</div>
                        <br/>
                        <div>class XmlExportPipeline(object):</div>
                            <div style="text-indent:40px;">def __init__(self):</div>
                                <div style="text-indent:80px;">self.files = {}</div>

                            <div style="text-indent:40px;">@classmethod</div>
                            <div style="text-indent:40px;">def from_crawler(cls, crawler):</div>
                                 <div style="text-indent:80px;">pipeline = cls()</div>
                                 <div style="text-indent:80px;">crawler.signals.connect(pipeline.spider_opened, signals.spider_opened)</div>
                                 <div style="text-indent:80px;">crawler.signals.connect(pipeline.spider_closed, signals.spider_closed)</div>
                                 <div style="text-indent:80px;">return pipeline</div>

                            <div style="text-indent:40px;">def spider_opened(self, spider):</div>
                                <div style="text-indent:80px;">file = open('%s_products.xml' % spider.name, 'w+b')</div>
                                <div style="text-indent:80px;">self.files[spider] = file</div>
                                <div style="text-indent:80px;">self.exporter = XmlItemExporter(file)</div>
                                <div style="text-indent:80px;">self.exporter.start_exporting()</div>

                            <div style="text-indent:40px;">def spider_closed(self, spider):</div>
                                <div style="text-indent:80px;">self.exporter.finish_exporting()</div>
                                <div style="text-indent:80px;">file = self.files.pop(spider)</div>
                                <div style="text-indent:80px;">file.close()</div>

                            <div style="text-indent:40px;">def process_item(self, item, spider):</div>
                                <div style="text-indent:80px;">self.exporter.export_item(item)</div>
                                <div style="text-indent:80px;">return item</div>
                    </header>
                </div>
                </div> 

                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 1.5em">
                        <h3 id="xml">2. XML Feed</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em">
                        Additionally, an XML file is created using an exporter which contains the XML documents outputted by the item pipeline. Its name can be adjusted in the crawler settings file, <span class="code">PoliScrape/poliScrapy/foreignScrape/settings.py</span>. The feed exports files to the <span class="code">PoliScrape/poliScrapy/xmlItems</span> directory, where runs are organized by day scraped and named by time scraped.
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em">
                        <header class="jumbotron special" style="font-size:18px;text-align:left;width:75%">
                            <div>ITEM_PIPELINES = {</div>
                                <div style="text-indent:40px;">'foreignScrape.pipelines.XmlExportPipeline': 300,</div>
                            <div>}</div>
                            <div>FEED_URI = '../xmlItems/history/'+str(time.strftime("%m-%d-%Y/%H-%M-%S"))+".xml"</div>
                            <div>FEED_FORMAT = 'xml'</div>
                            <div>FEED_EXPORTERS = {</div>
                                <div style="text-indent:40px;">'xml': 'scrapy.exporters.XmlItemExporter',</div>
                            <div>}</div>
                        </header>
                    </div>
                </div>

                <div class="row">
                <div class="col-lg-12" style="margin-bottom: 1.5em; );
 ">
                    <h3 id="web">3. Web Courtesy</h3>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        The <span class="code">settings.py</span> file also defines bot name and other web crawling behaviors. By default, PoliScrape adheres to robots.txt file guidelines to prevent server overloading and subsequent IP address banishment. The bot is limited to 32 concurrent requests by default, and throttled to a 2 second download delay. These settings should always be maintained.
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        <header class="jumbotron special" style="font-size:18px;text-align:left;width:35%">
                            <div>ROBOTSTXT_OBEY = True</div>
                            <div>CONCURRENT_REQUESTS = 32</div>
                            <div>#DOWNLOAD_DELAY = 2</div>
                        </header>
                    </div>
                </div>

                <div class="row">
                <div class="col-lg-12" style="margin-bottom: 1.5em; );
 ">
                    <h3 id="misc">4. Miscellaneous</h3>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        PoliScrape is highly customizable. PoliScrape outputs a log file each run, along with a <span class="code">closeSpider</span> report. These are defined as extensions, which can be removed or added in the <span class="code">settings.py</span> file.
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        <header class="jumbotron special" style="font-size:18px;text-align:left;width:50%">
                            <div>EXTENSIONS = {</div>
                                <div style="text-indent:40px;">'scrapy.extensions.closespider.CloseSpider': 80,</div>
                                <div style="text-indent:40px;">'scrapy.extensions.logstats.LogStats': 80,</div>
                            <div>}</div>
                        </header>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        There are a series of sentinel fail-safes that halt spider progress if triggered. By default, the spider will halt after 30 thrown errors. It may also halt after a finite number of visited pages is reached, a time limit is met, or an item count is surpassed. These latter three are disabled by default, but can be activated or adjusted in the <span class="code">settings.py</span> file. The depth priority setting prioritizes pages immediately below the start URL in the web hierarchy. For more depth priority options, visit the Scrapy documentation.
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        <header class="jumbotron special" style="font-size:18px;text-align:left;width:35%">
                            <div>#CLOSESPIDER_PAGECOUNT = 3</div>
                            <div>#CLOSESPIDER_TIMEOUT = 50</div>
                            <div>#CLOSESPIDER_ITEMCOUNT</div>
                            <div>CLOSESPIDER_ERRORCOUNT = 30</div>
                            <div>#DEPTH_PRIORITY = 1</div>
                        </header>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        To create a new crawler, reference the <a href="https://doc.scrapy.org/en/1.3/">Scrapy documentation</a>. The project name for new crawler instantiation is contained in <span class="code">settings.py</span>.   
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 0.5em; );
 ">
                        <header class="jumbotron special" style="font-size:18px;text-align:left;width:50%">
                            <div>BOT_NAME = 'foreignScrape'</div>

                            <div>SPIDER_MODULES = ['foreignScrape.spiders']</div>
                            <div>NEWSPIDER_MODULE = 'foreignScrape.spiders'</div>
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
                    </br></br></br>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <?php include_once('PoliScrape-foot.php'); ?>

</body>

</html>
