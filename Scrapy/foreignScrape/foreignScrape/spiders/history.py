import scrapy
from scrapy.spiders import CrawlSpider, Rule
from scrapy.linkextractors import LinkExtractor
##from scrapy.selector import HtmlXPathSelector
from scrapy.selector import Selector
##from scrapy.http import HtmlResponse
from foreignScrape.items import foreignScrapeItem
from bs4 import BeautifulSoup

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
        filename = 'body-' + response.url.split("/")[-2] + '.txt'
        analyzeThis = response.xpath("//body").extract_first()
        ##print(analyzeThis)
        item = foreignScrapeItem()
        item['text'] = analyzeThis
        soup = BeautifulSoup(analyzeThis, 'lxml')
        log = {
            'url': response.url,
            'title': soup.h1.string,
            'body': soup.body.string
        }
        yield log
        with open(filename, 'wb') as f:
            f.write('log')
        ##yield item
        ##for url in response.xpath('//a/@href').extract():
            ##yield scrapy.Request(url, callback=parse)