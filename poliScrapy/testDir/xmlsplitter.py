import xml.etree.ElementTree as ET
import io

context = ET.iterparse('test.xml', events=('end', ))
index = 0
for event, elem in context:
    if elem.tag == 'item':
        index += 1
        filename = format(str(index) + ".xml")
        with io.open(filename, 'wb') as f:
            f.write("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n")
            f.write(ET.tostring(elem))