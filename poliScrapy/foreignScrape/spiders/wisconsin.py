# -*- coding: utf-8 -*-
import scrapy


class WisconsinSpider(scrapy.Spider):
    name = "wisconsin"
    allowed_domains = ["wrus.com"]
    start_urls = (
        'http://www.wrus.com/',
    )

    def parse(self, response):
        pass
