import xml.etree.ElementTree as ET
import io
import os
import sys

def split(toSplit, dir_name):
	index = 0
	for event, elem in toSplit:
		if elem.tag == 'item':
			index += 1
			toSplit = 27 #27 for history.state.gov
			title = elem.find('id').text[toSplit:]
			if "historicaldocuments" not in title:
				print(index, "Passed")
				pass
			else:
				print(index, title)
				filename = dir_name+"/"+title+ ".xml"
				os.makedirs(os.path.dirname(filename),exist_ok=True)
				with io.open(filename, 'w') as f:
					f.write("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n")
					f.write(str(ET.tostring(elem)))

context = ET.iterparse(sys.argv[1], events=('end', ))
directoryName = input("Directory name? ")
split(context, directoryName)