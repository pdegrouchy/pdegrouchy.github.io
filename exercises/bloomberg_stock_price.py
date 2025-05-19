import mechanicalsoup

my_browser = mechanicalsoup.Browser()
page = my_browser.get("https://www.bloomberg.com/quote/YHOO:US")
html_text = page.soup
# return a list of all the tags where
# the css class is 'price'
my_tags = html_text.select(".price")
# take the BeautifulSoup string out of the
# first (and only) <span> tag
my_price = my_tags[0].text
print("The current price of "
      "YHOO is: {}".format(my_price))
