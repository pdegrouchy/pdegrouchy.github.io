import requests, os, bs4

url = 'http://xkcd.com'              # starting url
os.makedirs('xkcd', exist_ok=True)   # store comics in ./xkcd

# Download the page.
print('Downloading page %s...' % url)
res = requests.get(url)  ## how do you download the page using the get method of the request library?
res.raise_for_status()

soup = bs4.BeautifulSoup(res.text, "lxml") # create a beautifulsoup object taking in parameter a file like object (i.e. on which we can call a read() method)

# Find the URL of the comic image.
comicElem = soup.select('#comic img')  ## how to you select the image using the select method of beatutifulsoup?
comicUrl = 'http:' + comicElem[0].get('src')  # you want to extract the url of the image which is in the src attribute
# Download the image.
print('Downloading image %s...' % (comicUrl))
res = requests.get(comicUrl)

# Save the image to ./xkcd.
imageFile = open(os.path.join('xkcd', os.path.basename(comicUrl)), 'wb')
for chunk in res.iter_content(100000):
    imageFile.write(chunk)
imageFile.close()
