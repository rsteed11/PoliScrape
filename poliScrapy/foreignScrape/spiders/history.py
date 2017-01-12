#Author: Ryan Steed.
#Credit to Scrapy, Beautiful Soup.

import scrapy
from scrapy.spiders import CrawlSpider, Rule
from foreignScrape.items import foreignScrapeItem
from bs4 import BeautifulSoup
import re

class MySpider(CrawlSpider):
    #For scrapy command call:
    name = 'history'
    #Allowed domains for url searching?
    allowed_domains = ['history.state.gov']
    #Where to start:
    start_urls = ['https://history.state.gov/historicaldocuments/frus1945v01']

    def parse(self, response):
        analyzeThis = response.xpath("//body").extract_first()
        item = foreignScrapeItem() #instantiates predefined items (items.py)
        soup = BeautifulSoup(analyzeThis, 'lxml')
        item['name'] = response.xpath("//title").extract()[6:][:-8] #strips excess title text
        item['id'] = response.url
        for url in response.xpath('//a/@href').extract():
            try:
                yield scrapy.Request("https://history.state.gov/"+url, callback=self.parse)
            except: 
                print("Could not parse URL! "+url)
        item['bodyText'] = soup.body.get_text()[:-568] #strip off excess text from historian site
        item['urls'] = ["https://history.state.gov"+k for k in response.xpath('//a/@href').extract()]
        yield item #sends items to item pipeline (settings.py, pipelines.py)