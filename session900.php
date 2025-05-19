<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 9</title>

		<link rel="stylesheet" href="css/reveal.css">
		<link rel="stylesheet" href="css/theme/simple.css" id="theme">
		<!-- Custom css -->
        <link rel="stylesheet" href="css/custom.css">

		<!-- Theme used for syntax highlighting of code -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<?php if($pdfClass!=='') {
				?>
				<link rel="stylesheet" href="lib/css/default.css">
				<?php
				} else {?>
				<link rel="stylesheet" href="lib/css/zenburn.css"> <?php
				}?>

				<!-- City specific fixes -->
				<link rel="stylesheet" href="css/city.css" />
				<?php
				if($pdfClass!=='') {
						?>
						<link rel="stylesheet" href="css/cityhandouts.css"><?php
				}
		?>

		<!-- Printing and PDF exports -->
		<script>
			var link = document.createElement( 'link' );
			link.rel = 'stylesheet';
			link.type = 'text/css';
			link.href = window.location.search.match( /print-pdf/gi ) ? 'css/print/pdf.css' : 'css/print/paper.css';
			document.getElementsByTagName( 'head' )[0].appendChild( link );
		</script>
	</head>
	<body<?php if($pdfClass!=='') echo ' id="pdf"';?>>
	<p class="newlogo"><a href="https://moodle.city.ac.uk/<?php if(isset($_SESSION['cid'])) { ?>course/view.php?id=<?php echo $_SESSION['cid']; } ?>"><img border="0" alt="Courses" src="imgs/logo.png"></a></p>
		<div class="reveal">
			<div class="slides">
				<section>
					<h2>Introduction to programming with Python</h2>
					<h3>Session 9</h3>
				</section>
				<section>
					<h3>Objectives</h3>
					<ul style="width:100%;font-size: 28px">
						<li>Quick review of what HTML is</li>
                        <li>The find() string method</li>
                        <li>Regular expressions</li>
                        <li>Installing external libraries</li>
                        <li>Using a web parser: BeautifulSoup</li>
                        <li>Submitting data to a form using MechanicalSoup</li>
                        <li>Fetching data in real time</li>
					</ul>
				</section>

                <section>
                    <h3>The HTML language</h3>
                    <ul>
                        <li>HTML is the standard language for creating content on the web.</li>
                        <li>Every webpage is written in HTML.</li>
                        <li>To see the source code of the webpage you are currently seeing,
                            either right click and select "View page source", or from the menu 
                            of your browser, click on View and "View Source".
							Alternatively, you can use keyboard shortcut Ctrl+U (Command+U on a mac).
                        </li>
                    </ul>
                </section>

                <section>
                    <h3>Example</h3>
                    <p><a target="_blank" href="practice/Profile_Aphrodite.htm">Profile_Aphrodite.htm</a></p>
                    <div><pre class="solution-content python stretch"><code style="line-height: 100%;font-size: 26px;">&lt;html&gt;
&lt;head&gt;
  &lt;meta http-equiv="Content-Type"
	  content="text/html; charset=windows-1252"&gt;
  &lt;title&gt;Profile: Aphrodite&lt;/title&gt;
  &lt;link rel="stylesheet" type="text/css"&gt;
&lt;/head&gt;
&lt;body bgcolor="yellow"&gt;
  &lt;center&gt;
    &lt;br&gt;&lt;br&gt;
    &lt;img src="./Profile_ Aphrodite_files/aphrodite.gif"&gt;
    &lt;h2&gt;Name: Aphrodite&lt;/h2&gt;
    &lt;br&gt;&lt;br&gt;
    Favorite animal: Dove
    &lt;br&gt;&lt;br&gt;
    Favorite color: Red
    &lt;br&gt;&lt;br&gt;
    Hometown: Mount Olympus
  &lt;/center&gt;
&lt;/body&gt;&lt;/html&gt;</code></pre></div>
                </section>

                <section>
                    <h3>Grab all html from a web page</h3>
                    <div><pre class="solution-content python"><code>from urllib.request import urlopen
my_address = "https://www.city.ac.uk/"
html_page = urlopen(my_address)
html_text = html_page.read().decode('windows-1252')
print(html_text)</code></pre></div>
                    <p>What is the type of object that is returned?</p>
                </section>

                <section>
                    <h3>Parsing a web page with a String's method</h3>
                    <ul>
                        <li>You can use the <strong>find()</strong> method</li>
                        <li>Example:</li>
                    </ul>
                    <iframe src="https://trinket.io/embed/python3/b7feff185a" width="100%" height="300" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                    <!--
                    <div><pre class="solution-content python"><code>this_is_my_string = 'Programming in python'
string_to_find = input('Enter a string to find in \'%s\': ' % this_is_my_string)
index_found = this_is_my_string.find(string_to_find)
print(index_found)
print(this_is_my_string[index_found])</code></pre></div>
-->
                </section>

                <section>
                    <h3>Find a word between 2 other words</h3>
                    <iframe src="https://trinket.io/embed/python/b7f28ac6c1" width="100%" height="400" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                    <!--
                    <div><pre class="solution-content python"><code>my_string = 'some text with a special word ' \
            '<strong>Equanimity</strong>'
start_tag = "<strong>"
end_tag = "</strong>"
start_index = my_string.find(start_tag) + len(start_tag)
end_index = my_string.find(end_tag)
# We extract the text between
# the last index of the first tag '>'
# and the first index of the second tag '<'
print(my_string[start_index:end_index])</code></pre></div>
                    -->
                </section>

                <section>
                    <h3>Parsing the title with the find() method</h3>
                    <div><pre class="solution-content python"><code>from urllib.request import urlopen
my_address = "http://www.staff.city.ac.uk/~ddimak/python/" \
             "practice/Profile_Aphrodite.htm"
html_page = urlopen(my_address)
html_text = html_page.read().decode('windows-1252')
start_tag = "&lt;title&gt;"
end_tag = "&lt;/title&gt;"
start_index = html_text.find(start_tag) + len(start_tag)
end_index = html_text.find(end_tag)
print(html_text[start_index:end_index])</code></pre></div>
                </section>

                <section>
                    <h3>Limitation of the find() method</h3>
                    <ul>
                        <li>Try to use the same script for extracting the title of <a target="_blank" href="practice/Profile_Poseidon.htm">Profile_Poseidon.htm</a> </li>
                    </ul>
                    <div><pre class="solution-content python"><code>from urllib.request import urlopen
my_address = "http://www.staff.city.ac.uk/~ddimak/python/" \
             "practice/Profile_Poseidon.htm"
html_page = urlopen(my_address)
html_text = html_page.read().decode('windows-1252')
start_tag = "<title>"
end_tag = "</title>"
start_index = html_text.find(start_tag) + len(start_tag)
end_index = html_text.find(end_tag)
print(html_text[start_index:end_index])</code></pre></div>
                </section>

                <section>
                    <h3>Limitation of the find() method</h3>
                    <ul>
                        <li>Do you see the difference? We are not getting what we want now:</li>
                    </ul>
                    <div><pre class="solution-content python"><code>&lt;head&gt;&lt;meta http-equiv="Content-Type" content="text/html; charset=windows-1252"&gt;
&lt;title &gt;Profile: Poseidon</code></pre></div>
                    <ul>
                        <li>This is because of the extra space before the closing "&gt;" in &lt;title &gt;</li>
                        <li>The html is still rendered by the browser, but we cannot rely on HTML being 100% compliant if we want to parse a web page.</li>
                    </ul>

                </section>

                <section>
                    <h3>Regular expressions</h3>
                    <ul>
                        <li>They are used to determine whether or not a text matches a particular pattern</li>
                        <li>We can use them thanks to the <strong>re</strong> module in python</li>
                        <li>They use special characters to represent patterns: ^, $, *, +, ., etc...</li>
                    </ul>
                </section>

                <section>
                    <h3>re.findall() using *</h3>
                    <ul>
                        <li>The asterisk character <strong>*</strong> stands for "zero or more" of whatever came just before the asterisk</li>
                        <li><strong>re.findall():</strong></li>
                        <ul>
                            <li>finds any text within a string that matches a given pattern i.e. regex</li>
                            <li>takes 2 arguments, the 1st is the regex, the 2nd is the string to test</li>
                            <li>returns a list of all matches</li>
                        </ul>
                    </ul>
                    <p></p>
                    <div><pre class="solution-content python"><code># re.findall(&lt;regular_expression&gt;, &lt;string_to_test&gt;)</code></pre></div>
                </section>

                <section>
                    <h3>Interactive example</h3>
                    <iframe src="https://trinket.io/embed/python/7c42a37566" width="100%" height="450" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                </section>

                <section>
                    <h3>re.findall() case insensitive</h3>
                    <ul>
                        <li>Note that re.findall() is case sensitive</li>
                        <div><pre class="solution-content python"><code>re.findall('ab*c', 'ABC') # nothing found</code></pre></div>
                        <li>We can use a 3rd argument <strong>re.IGNORECASE</strong> to ignore the case</li>
                        <div><pre class="solution-content python"><code>re.findall('ab*c', 'ABC', re.IGNORECASE) # ABC found</code></pre></div>
                    </ul>
                </section>

                <section>
                    <h3>re.findall() using . (period)</h3>
                    <ul>
                        <li>the period <strong>.</strong> stands for any single character in a regular expression</li>
                        <li>For instance we could find all the strings that contain letters "a" and "c" separated by a single character as follows:</li>
                        <iframe src="https://trinket.io/embed/python/396b754ffd" width="100%" height="200" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                    </ul>
                </section>

                <section>
                    <h3>re.findall() using .* (period asterisk)</h3>
                    <ul>
                        <li>the term <strong>.*</strong> stands for any character being repeated any number of times</li>
                        <li>for instance we could find all the string that starts with "a" and ends with "c", regardless of what is in between with:</li>
                        <iframe src="https://trinket.io/embed/python/1bae467299" width="100%" height="200" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
                    </ul>
                    <!--
import re
print(re.findall('a.*c', 'abc'))
print(re.findall('a.*c', 'abbc'))
print(re.findall('a.*c', 'ac'))
print(re.findall('a.*c', 'acc'))
                    -->
                </section>

                <section>
                    <h3>re.search()</h3>
                    <ul>
                        <li><strong>re.search():</strong></li>
                        <ul>
                            <li>searches for a particular pattern inside a string</li>
                            <li>returns a MatchObject that stores different "groups" of data</li>
                            <li>when we call the group() method on a MatchObject, we get the first and most inclusive result</li>
                        </ul>
                    </ul>
                    <div><pre class="solution-content python"><code>import re
match_results = re.search('ab*c', 'ABC', re.IGNORECASE)
print(match_results.group())  # returns ABC</code></pre></div>
                </section>

                <section>
                    <h3>re.sub()</h3>
                    <ul>
                        <li>re.sub()</li>
                        <ul>
                            <li>allows to replace a text in a string that matches a pattern with a substitute (like the replace() string method)</li>
                            <li>takes 3 arguments:</li>
                            <ol>
                                <li>regex</li>
                                <li>replacement text</li>
                                <li>string to parse</li>
                            </ol>
                        </ul>
                    </ul>
                    <div><pre class="solution-content python"><code>my_string = "This is very boring"
print(my_string.replace('boring', 'funny'))
import re
print(re.sub('boring', 'WHAT?', my_string))</code></pre></div>
                </section>

                <section>
                    <h3>greedy regex (*)</h3>
                    <ul>
                        <li><strong>greedy</strong> expressions try to find the longest possible match when character like <strong>*</strong> are used</li>
                        <li>for instance, in this example the regex finds everything between '&lt;' and  '&gt;' which is actually the whole <em>'&lt;replaced&gt; if it is in &lt;tags&gt'</em></li>
                    </ul>
                    <div><pre class="solution-content python"><code>my_string = 'Everything is &lt;replaced&gt; if it is in &lt;tags&gt;'
my_string = re.sub('<.*>', 'BAR', my_string)
print(my_string)  # 'Everything is BAR'</code></pre></div>
                </section>

                <section>
                    <h3>non-greedy regex (*?)</h3>
                    <ul>
                        <li><strong>*?</strong></li>
                        <ul>
                            <li>works the same as * BUT matches the shortest possible string of text</li>
                        </ul>
                    </ul>
                    <div><pre class="solution-content python"><code>my_string = 'Everything is &lt;replaced&gt; if it is in &lt;tags&gt;'
my_string = re.sub('<.*?>', 'BAR', my_string)
print(my_string)  # 'Everything is BAR if it is in BAR'</code></pre></div>
                </section>

                <section>
                    <h3>Use case: Using regex to parse a webpage</h3>
                    <ul>
                        <li><a target="_blank" href="practice/Profile_Dionysus.htm">Profile_Dionysus.htm</a></li>
                        <li>We want to extract the title:</li>
                        <div><pre class="solution-content python"><code>&lt;TITLE &gt;Profile: Dionysus&lt;/title  / &gt;</code></pre></div>
                        <li>We will use the regular expression for this case</li>
                    </ul>
                </section>

                <section>
                    <h3>Use case: solution</h3>
                    <div><pre class="solution-content python"><code>import re
from urllib.request import urlopen
my_address = "http://www.staff.city.ac.uk/~ddimak/python/practice/Profile_Dionysus.htm"
html_page = urlopen(my_address)
html_text = html_page.read().decode('windows-1252')
match_results = re.search("&lt;title .*?&gt;.*&lt;/title .*?&gt;", html_text, re.IGNORECASE)
title = match_results.group()
title = re.sub("&lt;.*?&gt;", "", title)
print(title)</code></pre></div>
                </section>

                <section>
                    <h3>Use case: explanation</h3>
                    <ul>
                        <li>&lt;title .*?&gt; finds the opening tag where there must be a space after the word "title" and the tag must be closed,
                            but any characters can appear in the rest of the tag.
                            We use the non-greedy <strong>*?</strong>, because we want the first closing "&gt;" to match the tag's end</li>
                        <li><strong>.*</strong> any character can appear in between the &lt;title&gt; tag</li>
                        <li>&lt;\title .*?&gt; same expression as the first part but with the forward slash to represent a closing HTML tag</li>
                        <li>More on regex: <a target="_blank" href="https://docs.python.org/3.5/howto/regex.html">https://docs.python.org/3.5/howto/regex.html</a></li>
                    </ul>
                </section>

                <section id="installing-package">
                    <h3>Installing an external library</h3>
                    <ul>
                        <li>Sometimes what you need is not included in the python standard library and you have to install an external library</li>
                        <li>You are going to use a python package manager: <strong><a target="_blank" href="https://pip.pypa.io/en/latest/installing/">pip</a></strong></li>
                        <li>The packages (libraries) that you can install with pip are listed on <a target="_blank" href="https://pypi.python.org/pypi">https://pypi.python.org/pypi</a></li>
                        <li>If you do not have pip, you can use the command "python setup.py install" from the package you would have downloaded and uncompressed from <a target="_blank" href="https://pypi.python.org/pypi">pypi</a></li>
                    </ul>
                </section>

                <section>
                    <h3>Installing with Pycharm (1)</h3>
                    <img src="imgs/pycharm_install_package1.PNG" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 450px"/>
                </section>

                <section>
                    <h3>Installing with Pycharm (2)</h3>
                    <img src="imgs/pycharm_install_package2.PNG" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 450px"/>
                </section>

                <section>
                    <h3>Installing with Pycharm (3)</h3>
                    <img src="imgs/pycharm_install_package3.PNG" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 450px"/>
                </section>

                <section>
                    <h3>Using Beautiful Soup</h3>
                    <div><pre class="solution-content python"><code>from bs4 import BeautifulSoup
from urllib.request import urlopen
my_address = "http://www.staff.city.ac.uk/~ddimak/python/" \
             "practice/Profile_Dionysus.htm"
html_page = urlopen(my_address)
html_text = html_page.read().decode('utf-8')
my_soup = BeautifulSoup(html_text, "html.parser")</code></pre></div>
                </section>

                <section>
                    <h3>BeautifulSoup: get_text()</h3>
                    <ul>
                        <li><strong>get_text()</strong></li>
                        <ul>
                            <li>is extracting only the text from an html document</li>
                            <div><pre class="solution-content python"><code>print(my_soup.get_text())</code></pre></div>
                        </ul>
                        <li>there are lot of blank lines left but we can remove them with the method <strong>replace()</strong></li>
                        <div><pre class="solution-content python"><code>print(my_soup.get_text().replace("\n\n\n",""))</code></pre></div>
                        <li>Using BeautifulSoup to extract the text first and use the find() method is <em>sometimes</em> easier than to use regular expressions</li>
                    </ul>
                </section>

                <section>
                    <h3>BeautifulSoup: find_all()</h3>
                    <ul>
                        <li>find_all()</li>
                        <ul>
                            <li>returns a list of all elements of a particular tag given in argument</li>
                        </ul>
                    <div><pre class="solution-content python"><code>print(my_soup.find_all("img"))</code></pre></div>
                        <li>What if the HTML page is broken?</li>
                    </ul>
                </section>

                <section>
                    <h3>BeautifulSoup: Tags</h3>
                                        <div><pre class="solution-content python"><code style="line-height: 100%">[&lt;img src="dionysus.jpg"/&gt;, &lt;img src="grapes.png"&gt;&lt;br&gt;&lt;br&gt;
Hometown: Mount Olympus
&lt;br&gt;&lt;br&gt;
Favorite animal: Leopard &lt;br&gt;
&lt;br&gt;
Favorite Color: Wine
&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/br&gt;&lt;/img&gt;]</code></pre></div>
                    <ul>
                        <li>This is not what we were looking for. The &lt;img&gt; is not properly closed therefore BeautifulSoup ends up adding a fair
                            amount of HTML after the image tag before inserting a &lt;/img&gt; tag on its own. This is often seen in the wild.</li>
                        <li>NB: BeautifulSoup is storing HTML tags as <em>Tag</em> objects and we can extract information from each Tag.</li>
                    </ul>
                </section>

                <section>
                    <h3>BeautifulSoup: Extracting information from Tags</h3>
                    <ul>
                        <li><strong>Tags</strong>:</li>
                        <ul>
                            <li>have a name</li>
                            <li>have attributes
                                <ul>
                                    <li>Attributes are accessible using keys</li>
                                    <li>works similarly to accessing values of a dictionary through its keys</li>
                                </ul>
                            </li>
                        </ul>
                    </ul>
                        <div><pre class="solution-content python"><code>for tag in my_soup.find_all("img"):
    print(tag.name)
    print(tag['src'])</code></pre></div>
                </section>

                <section>
                    <h3>BeautifulSoup: accessing a Tag through its name</h3>
                    <ul>
                        <div><pre class="solution-content python"><code>print(my_soup.title)</code></pre></div>
                        <li>The HTML is cleaned up</li>
                        <li>We can use the string attributes stored by the title</li>
                        <div><pre class="solution-content python"><code>print(my_soup.title.string)</code></pre></div>
                    </ul>

                </section>
                <section>
                    <h3>The select method (1)</h3>
                    <ul>
                        <li>... will return a list of Tag objects, which is how Beautiful Soup represents an HTML element. The list will
                        contain one Tag object for every match in the BeautifulSoup object's HTML</li>

                    </ul>
                </section>

                <section id="beautifulsoup-select">
                    <h3>The select method (2)</h3>
                    <table style="font-size: 24px">
						<tr>
							<th style="width: 30%;">Selector passed to the select method</th>
							<th>Will match...</th>
						</tr>
						<tr>
							<td>soup.select('div')</td>
							<td>All elements named &lt;div&gt;</td>
						</tr>
						<tr>
							<td>soup.select('#author')</td>
							<td>The element with an <strong>id</strong> attribute of <strong>author</strong></td>
						</tr>
						<tr>
							<td>soup.select('.notice')</td>
							<td>All elements that use CSS class notice</td>
						</tr>
						<tr>
							<td>soup.select('div span')</td>
							<td>All elements named &lt;span&gt; that are within an element named &lt;div&gt;</td>
						</tr>
						<tr>
							<td>soup.select('div > span')</td>
							<td>All elements named &lt;span&gt; that are directly within an element named &lt;div&gt;, with no other elements in between</td>
						</tr>
						<tr>
							<td>soup.select('input[name]')</td>
							<td>All elements named &lt;input&gt; that have a <strong>name</strong> attribute with any value</td>
						</tr>
						<tr>
							<td>soup.select('input[type="button"]')</td>
							<td>All elements named &lt;input&gt; that have an attribute name <strong>type</strong> with value <strong>button</strong></td>
						</tr>
					</table>
                </section>

                <section>
                    <h3>Emulating a web browser</h3>
                    <ul>
                        <li>Sometimes we need to submit information to a web page, like a login page</li>
                        <li>We need a web browser for that</li>
                        <li><strong><a target="_blank" href="https://github.com/hickford/MechanicalSoup">MechanicalSoup</a></strong> is an alternative to urllib that can do all the same things but has more added
                            functionality that will allow us to talk back to webpages without using a standalone browser.
                            Perfect for fetching web pages, clicking on buttons and links, and filling out and submitting forms</li>
                    </ul>

                </section>

                <section>
                    <h3>Installing MechanicalSoup</h3>
                    <ul>
                        <li>You can install it with pip: <em>pip install MechanicalSoup</em> or within Pycharm (like what we did earlier with BeautifulSoup)</li>
                        <li>You might need to restart your IDE for MechanicalSoup to load and be recognised</li>
                    </ul>

                </section>

                <section>
                    <h3>MechanicalSoup: Opening a web page</h3>
                    <ul>
                        <li>Create a browser</li>
                        <li>Get a web page which is a Response object</li>
                        <li>Access the HTML content with the <em>soup</em> attribute</li>
                        <div><pre class="solution-content python"><code>import mechanicalsoup

my_browser = mechanicalsoup.Browser(
                 soup_config={'features':'html.parser'})
page = my_browser.get("http://www.staff.city.ac.uk/~ddimak/python/" \
           "practice/Profile_Aphrodite.htm")
print(page.soup)</code></pre></div>

                    </ul>

                </section>

                <section>
                    <h3>MechanicalSoup: Submitting values to a form</h3>
                    <ul>
                        <li>Have a look at this <a target="_blank" href="https://whispering-reef-69172.herokuapp.com/login">login page</a></li>
                        <li>The important section is the login form</li>
                        <li>We can see that there is a submission &lt;form&gt; named "login" that includes two &lt;input&gt; tags, one named
                            <em>username</em> and the other one named <em>password</em>.</li>
                        <li>The third &lt;input&gt; is the actual "Submit" button</li>
                    </ul>

                </section>

                <section>
                    <h3>MechanicalSoup: script to login</h3>
                    <div><pre class="solution-content python"><code style="line-height: 100%;font-size: 26px;">import mechanicalsoup

my_browser = mechanicalsoup.Browser(
    soup_config={'features':'html.parser'})
login_page = my_browser.get(
    "https://whispering-reef-69172.herokuapp.com/login")
login_html = login_page.soup

form = login_html.select("form")[0]
form.select("input")[0]["value"] = "admin"
form.select("input")[1]["value"] = "default"

profiles_page = my_browser.submit(form, login_page.url)
print(profiles_page.url)
print(profiles_page.soup)</code></pre></div>

                </section>

                <section>
                    <h3>Methods in MechanicalSoup</h3>
                    <ul>
                        <li>We created a Browser object</li>
                        <li>We called the method <em>get</em> on the Browser object to get a web page</li>
                        <li>We used the <em>select()</em> method to grab the form and input values in it</li>
                    </ul>
                </section>

                <section>
                    <h3>Interacting with the Web in Real Time</h3>
                    <ul>
                        <li>We want to get data from a website that is constantly updated</li>
                        <li>We actually want to simulate clicking on the "refresh" button</li>
                        <li>We can do that with the <em>get</em> method of MechanicalSoup</li>
                    </ul>
                </section>

                <section>
                    <h3>Use case: fetching a stock quote from Nasdaq (1)</h3>
                    <ul>
                        <li>Let us identify what is needed</li>
                        <li>
                        <ul>
                            <li>What is the source of the data? <br/><strong><a href="https://www.nasdaq.com/symbol/ba">https://www.nasdaq.com/symbol/ba</a></strong></li>

                            <li>What do we want to extract from this source? <br/><strong>The stock price</strong></li>

                        </ul>
                        </li>
                    </ul>
                </section>

                <section>
                    <h3>Use case: fetching a stock quote from Nasdaq (2)</h3>

                    <ul>
                        <li>If we look at the source code, we can see what the tag is for the stock and how to retrieve it:</li>
                        <li><div><pre class="solution-content python"><code style="line-height: 100%;font-size: 26px;">&lt;div id="qwidget_lastsale" class="qwidget-dollar"&gt;$367.16&lt;/div&gt;</code></pre></div></li>
                        <li>An <strong>id</strong> is unique and should only appear once in the page. However, it is good practice to check that the id appears only once in the webpage.</li>

                    </ul>

                </section>

                <section>
                    <h3>MechanicalSoup: script to find Boeing current price</h3>
                    <div><pre class="solution-content python"><code style="line-height: 100%;font-size: 26px;">import mechanicalsoup

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
      "Boeing is: {}".format(my_price))</code></pre></div>

                </section>

                <section>
                    <h3>Repeatedly get Boeing's current price</h3>
                    <ul>
                        <li>Now that we know how to get the price of a stock from the Nasdaq web page, we can create a for loop to stay up to date</li>
                        <li>Note that we should not overload the Nasdaq website with more requests than we need. And also, we should also have a look at their
                            <a href="https://www.nasdaq.com/robots.txt">robots.txt</a> file to be sure that what we do is allowed
                        </li>
                    </ul>
                </section>

                <section>
                    <h3>Introduction to the <em>time.sleep()</em> method</h3>
                    <ul>
                        <li>The <em>sleep()</em> method of the module time takes a number of seconds as argument
                            and waits for this number of seconds, it enables to delay the execution of a statement in the program</li>
                    </ul>
                    <div><pre class="solution-content python"><code style="line-height: 100%;font-size: 26px;">from time import sleep
print "I'm about to wait for five seconds..."
sleep(5)
print "Done waiting!"</code></pre></div>
                </section>

                <section>
                    <h3>Repeatedly get the Boeing current price: script</h3>
                    <div><pre class="solution-content python"><code style="line-height: 100%;font-size: 24px;">from time import sleep
import mechanicalsoup
my_browser = mechanicalsoup.Browser()
# obtain 1 stock quote per minute for the next 3 minutes
for i in range(0, 3):
    page = my_browser.get("https://www.nasdaq.com/symbol/ba")
    html_text = page.soup
    # return a list of all the tags where the css id is 'qwidget_lastsale'
    my_tags = html_text.select("#qwidget_lastsale")
    # take the BeautifulSoup string out of the first tag
    my_price = my_tags[0].text
    print("The current price of BA is: {}".format(my_price))
    if i<2: # wait a minute if this isn't the last request
        sleep(60)</code></pre></div>
                </section>

                <section>
                    <h3>Exercise: putting it all together</h3>
                    <ul>
                        <li>Install a new library called <em>requests</em></li>
                        <li>Using <a href="#/beautifulsoup-select">the select method</a> of BeautifulSoup, parse (that
                            is, analyze and identify the parts of) the image of the day of <a href="http://xkcd.com/">http://xkcd.com/</a></li>
                        <li>Using the <em>get</em> method of the <em>requests</em> library, download the image</li>
                        <li>Complete the following program <a href="exercises/xkcd_incomplete.py">xkcd_incomplete.py</a></li>
                    </ul>
                </section>

                <section>
                    <h3>Using request</h3>
                    <ul>
                        <li>You first have to import it</li>
                        <div><pre class="solution-content python"><code style="line-height: 100%;font-size: 24px;">import requests</code></pre></div>
                        <li>If you want to download the webpage, use the get() method with a url in parameter, such as:</li>
                        <div><pre class="solution-content python"><code style="line-height: 100%;font-size: 24px;">res = requests.get(url)</code></pre></div>
                        <li>Stop your program if there is an error with the raise_for_status() method</li>
                        <div><pre class="solution-content python"><code style="line-height: 100%;font-size: 24px;">res.raise_for_status()</code></pre></div>
                    </ul>
                </section>

                <section>
                    <h3>Next? Web crawling!</h3>
                    <ul>
                        <li>From Wikipedia: A Web crawler is an Internet bot which systematically browses the World Wide Web, typically for the purpose of Web indexing.</li>
                        <li>How do you navigate a website? For example, for the <a href="http://xkcd.com/">http://xkcd.com/</a> website, how could you <strong>retrieve all of its images?</strong></li>
                        <li>Write down how you would design your program</li>
                        <li>Write the program</li>
                    </ul>
                </section>

                <section>
                    <h3>Solution for Web Crawling</h3>
                                    <div class="solution">
                    <p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
                    <p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
                    <p class="solution-content python">Download the script here: <a href="exercises/xkcd_downloader.py">xkcd_downloader.py</a> </p>
                </div>
                </section>

			</div>
		</div>
		<script src="lib/js/head.min.js"></script>
		<script src="js/reveal.js"></script>

		<script>
			// More info https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				history: true,
				slideNumber: true,
				center: false,

				// More info https://github.com/hakimel/reveal.js#dependencies
				dependencies: [
					{ src: 'plugin/markdown/marked.js' },
					{ src: 'plugin/markdown/markdown.js' },
					{ src: 'plugin/notes/notes.js', async: true },
					{ src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: 'plugin/menu/menu.js' },
					{ src: 'plugin/jquery-2.0.0.min.js' },
					{ src: 'plugin/custom.js' },
					{ src: 'plugin/clipboard.min.js' },

				]
			});
		</script>
	</body>
</html>
