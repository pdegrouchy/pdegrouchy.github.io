import mechanicalsoup

my_browser = mechanicalsoup.Browser()

page = my_browser.get("https://www.nasdaq.com/symbol/ba")

html_text = page.soup

# return a list of all the tags where
# the css id is 'qwidget_lastsale'
my_tags = html_text.select("#qwidget_lastsale")

# take the BeautifulSoup string out of the
# first (and only) &lt;div&gt; tag
my_price = my_tags[0].text
print("The current price of "
      "Boeing is: {}".format(my_price))