from bs4 import BeautifulSoup
from urllib.request import urlopen
my_address = "http://www.staff.city.ac.uk/~ddimak/python/practice/Profile_Dionysus.htm"
html_page = urlopen(my_address)
html_text = html_page.read().decode('utf-8')
my_soup = BeautifulSoup(html_text, "html.parser")
# print(my_soup.get_text().replace("\n\n\n",""))
# imgs = my_soup.find_all("img")
# print(my_soup.find_all("img"))
for tag in my_soup.find_all("img"):
    print(tag.name)
    print(tag['src'])
