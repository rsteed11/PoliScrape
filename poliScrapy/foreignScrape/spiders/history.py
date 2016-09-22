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
import json

class MySpider(CrawlSpider):
    #For scrapy command call:
    name = 'history'
    #Allowed domains for url searching?
    allowed_domains = ['history.state.gov']
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
        #Beautiful Soup v4.1
        soup = BeautifulSoup(analyzeThis, 'lxml')
        item['urls'] = soup.find_all('a')
        
        links = []
        #Can collect all links.
        for link in item['urls']:
            url = link.get('href')
            links.append(url)
            #yield scrapy.Request(url, callback=self.parse)
        for url in response.xpath('//a/@href').extract():
            try:
                yield scrapy.Request("https://history.state.gov/"+url, callback=self.parse)
            except: 
                print("Could not parse URL! Who knows why...")

        # Here's how to make stripped strings
        #for string in soup.stripped_strings:
        #    print(repr(string))
        
        #To print to screen or file
        log = {
            'url': response.url,
            'title': soup.h1.string,
            'body': soup.body.get_text()
        }

        #Print to a file.
        bodyFile = '../json/text/body-' + response.url.split("/")[-2] + '.json'
        urlFile = '../json/links/links-' + response.url.split("/")[-2] + '.json'
        #TODO: parse log to write to file.
        with open(bodyFile, 'wb') as f:
            f.write(json.dumps(log))
        with open(urlFile, 'wb') as f:
            f.write(json.dumps(links))

        print("----------------Wrote text to " +bodyFile+ ".--------------------")
        print("----------------Wrote links to " +urlFile+ ".--------------------")

        #Debugging Ryan Steed 20 Sep 2016
        ##yield item
        ##for url in response.xpath('//a/@href').extract():
            ##yield scrapy.Request(url, callback=parse)

        ##def parse_next(self, response):
            # logs into next urls
            #self.logger.info("Visited %s", response.url)
