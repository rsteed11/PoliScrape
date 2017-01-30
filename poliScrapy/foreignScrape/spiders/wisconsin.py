#Author: Ryan Steed.
#Credit to Scrapy, Beautiful Soup.

import scrapy
from scrapy.spiders import CrawlSpider, Rule
from foreignScrape.items import foreignScrapeItem
from bs4 import BeautifulSoup
import re

class MySpider(CrawlSpider):
    #For scrapy command call:
    name = 'wisconsin'
    #Allowed domains for url searching?
    allowed_domains = ['digicoll.library.wisc.edu']
    #Where to start:
    start_urls = ['http://digicoll.library.wisc.edu/cgi-bin/FRUS/FRUS-idx?type=header&id=FRUS.FRUS1945v01']

    def parse(self, response):
        analyzeThis = response.xpath("//body").extract_first()
        item = foreignScrapeItem() #instantiates predefined items (items.py)
        soup = BeautifulSoup(analyzeThis, 'lxml')
        item['name'] = response.xpath("//title").extract()[6:][:-8] #strips excess title text
        item['id'] = response.url
        item['bodyText'] = soup.body.get_text()[:-568] #strip off excess text from historian site
        roughLinks = response.xpath('//a/@href').extract()
        fineLinks = []
        pdfLinks = []
        for url in roughLinks:
            if "FRUS" in url:
                fineLinks.append(url)
                if ".pdf" in url:
                    pdfLinks.append(url)
        item['urls'] = ["http://digicoll.library.wisc.edu"+link for link in fineLinks]
        item['pdf'] = pdfLinks
        for url in fineLinks:
            try:
                yield scrapy.Request("http://digicoll.library.wisc.edu"+url, callback=self.parse)
            except: 
 				print("Could not parse URL! "+url)
        yield item #sends items to item pipeline (settings.py, pipelines.py)