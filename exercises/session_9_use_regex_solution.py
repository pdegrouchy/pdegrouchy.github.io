import re
from urllib.request import urlopen
my_address = "http://www.staff.city.ac.uk/~ddimak/python/practice/Profile_Dionysus.htm"
html_page = urlopen(my_address)
html_text = html_page.read().decode('utf-8')
match_results = re.search("<title .*?>.*</title .*?>", html_text, re.IGNORECASE)
title = match_results.group()
title = re.sub("<.*?>", "", title)
print(title)
