# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html

#Export Pipelines
from scrapy import signals
from scrapy.exporters import XmlItemExporter
import json

class JsonWriterPipeline(object):

    def __init__(self):
        self.files = open('items.jl', 'wb')

    def process_item(self, item, spider):
        line = json.dumps(dict(item)) + "\n"
        self.files.write(line)
        return item