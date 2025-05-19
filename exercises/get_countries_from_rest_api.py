import json
from urllib import request

infile = request.urlopen('https://restcountries.eu/rest/v1/all')
content_as_python_obj = json.loads(infile.read().decode())
for country in content_as_python_obj:
    if country['name']=='France':
        print(country['latlng'])
