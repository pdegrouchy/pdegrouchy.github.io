from urllib import parse, request
import json

serviceurl = 'http://maps.googleapis.com/maps/api/geocode/json?'

while True:
    address = input('Enter location (q to quit): ')
    if len(address) < 1 or address.lower() == 'q':  # sentinel value, press q to quit
        break

    url = serviceurl + parse.urlencode({'sensor': 'false', 'address': address})
    print('Retrieving', url)
    uh = request.urlopen(url)
    data = uh.read().decode('utf-8')
    print('Retrieved', len(data), 'characters')

    js = json.loads(data)
    if 'status' not in js or js['status'] != 'OK':
        print('==== Failure To Retrieve ====')
        print(data)
        continue

    #print(json.dumps(js, indent=4))

    lat = js["results"][0]["geometry"]["location"]["lat"]
    lng = js["results"][0]["geometry"]["location"]["lng"]
    print('lat', lat, 'lng', lng)
    location = js['results'][0]['formatted_address']
    print(location)
