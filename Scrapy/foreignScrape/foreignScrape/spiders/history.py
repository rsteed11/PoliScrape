#Author: Ryan Steed.
#Credit to Scrapy, Beautiful Soup.

import scrapy
from scrapy.spiders import CrawlSpider, Rule
from scrapy.linkextractors import LinkExtractor
##from scrapy.selector import HtmlXPathSelector
from scrapy.selector import Selector
##from scrapy.http import HtmlResponse
from foreignScrape.items import foreignScrapeItem
from bs4 import BeautifulSoup

class MySpider(CrawlSpider):
    #For scrapy command call:
    name = 'history'
    #Allowed domains for url searching?
    allowed_domains = ['history.state.gov/historicaldocuments']
    #Where to start:
    start_urls = ['https://history.state.gov/historicaldocuments']

    #Idea for collecting links using Scrapy, can be done with Beautiful Soup. Ryan Steed 20 Sep 2016.
    ##rules = (
        # Extract links matching 'category.php' (but not matching 'subsection.php')
        # and follow links from them (since no callback means follow=True by default).
        ##Rule(LinkExtractor(allow=('category\.php', ), deny=('subsection\.php', ))),

        # Extract links matching 'item.php' and parse them with the spider's method parse_item
        ##Rule(LinkExtractor(allow=('item\.php', )), callback='parse_item'),
    ##)

    def parse(self, response):
    
        analyzeThis = response.xpath("//body").extract_first()
        #Defined in items.py
        item = foreignScrapeItem()
        item['bodyText'] = analyzeThis
        #Beautiful Soup v4.1
        soup = BeautifulSoup(analyzeThis, 'lxml')
        
        links = []
        #Can collect all links.
        for link in soup.find_all('a'):
            links.append(link.get('href'))
        
        # Here's how to make stripped strings
        #for string in soup.stripped_strings:
        #    print(repr(string))
        
        #To print to screen or file
        log = {
            'url': response.url,
            'title': soup.h1.string,
            'body': soup.body.get_text()
            'links': links
        }
        yield log

        #Print to a file.
        filename = 'body-' + response.url.split("/")[-2] + '.txt'
        #TODO: parse log to write to file.
        with open(filename, 'wb') as f:
            f.write('log')

        #Debugging Ryan Steed 20 Sep 2016
        ##yield item
        ##for url in response.xpath('//a/@href').extract():
            ##yield scrapy.Request(url, callback=parse)