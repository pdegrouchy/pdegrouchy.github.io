import mechanicalsoup

my_browser = mechanicalsoup.Browser(soup_config={'features':'html.parser'})
login_page = my_browser.get("http://www.staff.city.ac.uk/~ddimak/python/practice/LogIn.htm")
login_html = login_page.soup

form = login_html.select("form")[0]
form.select("input")[0]["value"] = "foo"
form.select("input")[1]["value"] = "bar"

profiles_page = my_browser.submit(form, login_page.url)

print(profiles_page.url)
print(profiles_page.soup)
