import scrapy
from scrapy.spiders import CrawlSpider, Rule
from scrapy.linkextractors import LinkExtractor
##from scrapy.selector import HtmlXPathSelector
from scrapy.selector import Selector
##from scrapy.http import HtmlResponse
from foreignScrape.items import foreignScrapeItem

class MySpider(CrawlSpider):
    name = 'history'
    allowed_domains = ['history.state.gov/historicaldocuments']
    start_urls = ['https://history.state.gov/historicaldocuments']

    ##rules = (
        # Extract links matching 'category.php' (but not matching 'subsection.php')
        # and follow links from them (since no callback means follow=True by default).
        ##Rule(LinkExtractor(allow=('category\.php', ), deny=('subsection\.php', ))),

        # Extract links matching 'item.php' and parse them with the spider's method parse_item
        ##Rule(LinkExtractor(allow=('item\.php', )), callback='parse_item'),
    ##)

    def parse(self, response):
        ##filename = 'body-' + response.url.split("/")[-2] + '.txt'
        analyzeThis = response.xpath("//body").extract_first()
        ##print(analyzeThis)
        ##with open(filename, 'wb') as f:
          ##  f.write(betterHere)
        item = foreignScrapeItem()
        item['text'] = analyzeThis
        ##yield item

        for url in response.xpath('//a/@href').extract():
            yield scrapy.Request(url, callback=self.parse)

        