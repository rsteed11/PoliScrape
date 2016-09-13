from scrapy.spiders import CrawlSpider, Rule
from scrapy.linkextractors.sgml import SgmlLinkExtractor
from scrapy.selector import HtmlXPathSelector
from scrapy.item import Item

class MySpider(CrawlSpider):
    name = 'history'
    allowed_domains = ['history.state.gov/historicaldocuments']
    start_urls = ['https://history.state.gov/historicaldocuments']

    rules = (
        # Extract links matching 'category.php' (but not matching 'subsection.php')
        # and follow links from them (since no callback means follow=True by default).
        Rule(SgmlLinkExtractor(allow=('category\.php', ), deny=('subsection\.php', ))),

        # Extract links matching 'item.php' and parse them with the spider's method parse_item
        Rule(SgmlLinkExtractor(allow=('item\.php', )), callback='parse_item'),
    )

    def parse_item(self, response):
        self.log('Hi, this is an item page! %s' % response.url)

        hxs = HtmlXPathSelector(response)
        items = []
        body = hxs.xpath
        item = Item()
        for item in body:
        	item['id'] = hxs.select('//body[@id="item_id"]/text()').re(r'ID: (\d+)')
        	item['name'] = hxs.select('//td[@id="item_name"]/text()').extract()
        	item['description'] = hxs.select('//td[@id="item_description"]/text()').extract()
        	items.append(item)
        return(body)