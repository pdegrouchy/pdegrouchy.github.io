<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 6-2</title>

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
					<h3>Session 6-2</h3>
				</section>
				<section>
					<h3>Objectives</h3>
					<ul>
						<li>To open a file, read/write data from/to a file</li>
                        <li>To use file dialogs for opening and saving data</li>
                        <li>To read data from a Web resource</li>
                        <li>To handle exceptions using the try/except/finally clauses</li>
                        <li>To raise exceptions using the raise statements</li>
                        <li>To become familiar with Python’s built-in exception classes</li>
                        <li>To access exception object in the handler</li>
					</ul>
				</section>
				<section>
					<h3>Open a File</h3>
                        <p>We create a <strong>file object</strong> with the following syntax:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>file = open(filename, mode)</code></pre>
					<table style="width:100%;font-size: 28px">
					  <tr>
						<th style="width:30%">Mode</th>
						<th>Description</th>
					  </tr>
					  <tr>
						<td>r</td>
						<td>Open a file for reading only</td>
					  </tr>
					  <tr>
						<td>r+</td>
						<td>Open a file for both reading and writing</td>
					  </tr>
					  <tr>
						<td>w</td>
						<td>Open a file for writing only</td>
					  </tr>
					  <tr>
						<td>a</td>
						<td>Open a file for appending data. Data are written to the end of the file</td>
					  </tr>
					  <tr>
						<td>rb</td>
						<td>Open a file for reading binary data</td>
					  </tr>
					  <tr>
						<td>wb</td>
						<td>Open a file for writing binary data</td>
					  </tr>
					</table>
				</section>

				<section>
					<h3>Write to a File: Example</h3>
                        <p>A program that creates a file if it does not exist (an existing file with the same name will be erased) and writes in it:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>def main():
    # Open file for output
    outfile = open("Python_projects.txt", "w")
    # Write data to the file
    outfile.write("Django\n")
    outfile.write("Flask\n")
    outfile.write("Ansible")
    outfile.close() # Close the output file

main() # Call the main function</code></pre>
				</section>

                <section>
                    <h3>Test whether a file exists</h3>
                    <pre class="solution-content python"><code data-trim data-noescape>import os.path

if os.path.isfile("Python_projects.txt"):
    print("Python_projects.txt exists")</code></pre>
                </section>

                <section>
                    <h3>Reading from a File</h3>
                    <p>After a file is opened for reading data, you can use:</p>
                    <ul>
                        <li>the <strong>read(size)</strong> method to read a specified number of characters or all characters,</li>
                        <li>the <strong>readline()</strong> method to read a whole line</li>
                        <li>the <strong>readlines()</strong> method to read all lines into a list.</li>
                    </ul>
                </section>

                <section>
                    <h3>Read from a File: Example with read()</h3>
                    <pre class="solution-content python"><code data-trim data-noescape>def main():
    # Open file for input
    infile = open("Python_projects.txt", "r")
    print("Using read(): ")
    print(infile.read())
    infile.close() # Close the input file
main() # Call the main function
</code></pre>
                </section>

                <section>
                    <h3>Read from a File: Example with read(size)</h3>
                    <pre class="solution-content python"><code data-trim data-noescape>def main():
    infile = open("Python_projects.txt", "r")
    print("\nUsing read(number): ")
    s1 = infile.read(4)  # read till the 4th character
    print(s1)
    s2 = infile.read(10)  # read from 4th till 4th+10th
    print(repr(s2))  # a new line is also a character \n
    infile.close()  # Close the input file

main()  # Call the main function
</code></pre>
                </section>


                <section>
                    <h3>Read from a File: Example with readline()</h3>
                    <pre class="solution-content python"><code data-trim data-noescape>def main():
    infile = open("Python_projects.txt", "r")
    print("\nUsing readline(): ")
    line1 = infile.readline()
    line2 = infile.readline()
    line3 = infile.readline()
    line4 = infile.readline()
    print(repr(line1))
    print(repr(line2))
    print(repr(line3))
    print(repr(line4))
    infile.close() # Close the input file

main() # Call the main function
</code></pre>
                </section>

                <section>
                    <h3>Read from a File: Example with readlines()</h3>
                    <pre class="solution-content python"><code data-trim data-noescape>def main():
    # Open file for input
    infile = open("Python_projects.txt", "r")
    print("\n(4) Using readlines(): ")
    print(infile.readlines())  # a list of lines
    infile.close()  # Close the input file

main() # Call the main function
</code></pre>
                </section>

                <section>
                    <h3>Append Data to a File</h3>
                    <p>You can use the 'a' mode to open a file for appending data to an existing file.</p>
                    <pre class="solution-content python"><code data-trim data-noescape>def main():
    # Open file for appending data
    outfile = open("Info.txt", "a")
    outfile.write("\nPython is interpreted\n")
    outfile.close() # Close the input file

main() # Call the main function
</code></pre>
                </section>

                <section>
                    <h3>Writing/Reading Numeric Data</h3>
                    <p>To write numbers, convert them into strings, and then use the write method to
write them to a file. In order to read the numbers back correctly, you should
separate the numbers with a whitespace character such as " " (empty string) or '\n' (new line).</p>
                </section>
                <section>
                    <h3>Writing/Reading Numeric Data: Example</h3>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%;">from random import randint

def main():
    # Open file for writing data
    outfile = open("Numbers.txt", "w")
    for i in range(10):
        outfile.write(str(randint(0, 9)) + " ")
    outfile.close() # Close the file
    # Open file for reading data
    infile = open("Numbers.txt", "r")
    s = infile.read()
    numbers = [int(x) for x in s.split()]
    for number in numbers:
        print(number, end = " ")
    infile.close() # Close the file

main() # Call the main function
</code></pre>
                </section>

                <section>
                    <h3>Exercise</h3>
                    <p>Write a program that prompts the user to enter a file and counts the number of occurrences of each letter in the file regardless of case.</p>
                    <p>Only take the characters of the alphabet, you can get them with the following</p>
                    <pre class="solution-content python"><code data-trim data-noescape>from string import ascii_lowercase
print(ascii_lowercase)  # abcdefghijklmnopqrstuvwxyz</code></pre>
                </section>

                <section>
                    <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape>from string import ascii_lowercase
from pprint import pprint

def main():
    filename = input("Enter a filename: ").strip()
    dict_of_letter = {}
    f = open(filename)
    for line in f:
        for letter in line.lower():
            if letter in ascii_lowercase:
                if letter in dict_of_letter:
                    dict_of_letter[letter] += 1
                else:
                    dict_of_letter[letter] = 1
    f.close()
    pprint(dict_of_letter)

main()</code></pre></div>
                </section>

                <section>
                    <h3>Case Studies: Occurrences of Words</h3>
                    <ul>
                        <li>This case study writes a program that counts the occurrences of words in a text
file and displays the words and their occurrences in alphabetical order of words.
The program uses a dictionary to store an entry consisting of a word and its
count. For each word, check whether it is already a key in the dictionary. If not,
add to the dictionary an entry with the word as the key and value 1. Otherwise,
increase the value for the word (key) by 1 in the dictionary</li>
                        <li>See the program <a href="exercises/CountOccurrenceOfWords.py">CountOccurrenceOfWords.py</a></li>
                    </ul>
                </section>

                <section>
                    <h3>Retrieving Data from the Web</h3>
                    <p>Using Python, you can write simple code to read data from a website. All you
need to do is to open a URL link using the urlopen function as follows:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>import urllib.request
infile = urllib.request.urlopen('http://city.ac.uk/')
html_page = infile.read().decode()
print(html_page)</code></pre>
                    <p>It represents the full HTML of the page just as a web browser would see it</p>
                </section>

                <section>
                    <h3>Exercise</h3>
                    <ul>
                        <li>Count each letter from a web page (from the source code of the page)</li>
                        <li>You can reuse the code of the previous and try to refactor so that both programs use the same count_letter function</li>
                    </ul>
                </section>

                <section>
                    <div class="solution">
						<p class="show-solution"><i class="fa fa-eye" aria-hidden="true"></i>Solution</p>
						<p class="hide-solution" style="margin-top: 0px; margin-bottom: 0px;"><i class="fa fa-eye-slash" aria-hidden="true"></i>Hide solution</p>
						<pre class="solution-content python"><code data-trim data-noescape>from pprint import pprint
from string import ascii_lowercase
import urllib.request

def main():
    url = input("Enter an URL for a file: ").strip()
    infile = urllib.request.urlopen(url)
    f = infile.read().decode() # Read the content as string
    dict_of_letter = {}
    for line in f:
        for letter in line.lower():
            if letter in ascii_lowercase:
                if letter in dict_of_letter:
                    dict_of_letter[letter] += 1
                else:
                    dict_of_letter[letter] = 1
    pprint(dict_of_letter)

main()</code></pre></div>
                </section>

                <section>
                    <h3>Exception Handling</h3>
                    <p>What happens if the user enters a file or an URL that does not exist? The
program would raise an error and abort. For example, if you run
count_letter.py with an incorrect input:</p>
                <pre class="solution-content"><code data-trim data-noescape style="line-height: 100%">u:\python1\session6\python count_letter.py
Enter a filename: non_existant_file.txt
Traceback (most recent call last):
  File "count_letter.py", line 18, in  &lt;module&gt;
    main()
  File "count_letter.py", line 7, in main
    f = open(filename)
FileNotFoundError: [Errno 2]
No such file or directory: 'non_existant_file.txt'

Process finished with exit code 1</code></pre>
                </section>

                <section>
                    <h3>The try ... except clause</h3>
                    <p>Catching one exception type</p>
                    <pre class="solution-content python"><code data-trim data-noescape>try:
 &lt;body&gt;
except &lt;ExceptionType&gt;:
 &lt;handler&gt;</code></pre>
                </section>

                <section>
                    <h3>The try ... except clause</h3>
                    <p>Catching several exception types</p>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%">try:
 &lt;body&gt;
except &lt;ExceptionType&gt;:
 &lt;handler1&gt;
 &lt;handler1&gt;
...
except &lt;ExceptionTypeN&gt;:
 &lt;handlerN&gt;
except:
 &lt;handlerExcept&gt;
else:
&lt;process_else&gt; # will be executed if not exception
finally:
&lt;process_finally&gt; # executed with or without exception</code></pre>
                </section>

                <section>
                    <h3>Example</h3>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%">def main():
    try:
        number1, number2 = int(
          input("Enter two integers,"
                "separated by a comma: "))
        result = number1 / number2
        print("Result is " + str(result))
    except ZeroDivisionError:
        print("Division by zero!")
    except SyntaxError:
        print("A comma may be missing in the input")
    except:
        print("Something wrong in the input")
    else:
        print("No exceptions")
    finally:
        print("The finally clause is executed")
main()</code></pre>
                </section>

                <section>
                    <h3>Raising Exceptions</h3>
                    <p>You learned how to write the code to handle exceptions in the previous
section. Where does an exception come from? How is an exception created?
Exceptions are objects and objects are created from classes. An exception is
raised from a function. When a function detects an error, it can create an
object of an appropriate exception class and raise the object, using the
following syntax:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>raise ExceptionClass("Something is wrong")</code></pre>
                </section>

                <section>
                    <h3>Processing Exceptions Using Exception Objects</h3>
                    <p>You can access the exception object in the except clause with the <strong>as</strong> keyword.</p>
                 <pre class="solution-content python"><code data-trim data-noescape>try:
    number = int(input("Enter a number: "))
    print("The number entered is", number)
except NameError as ex:
    print("Exception:", ex)</code></pre>

                </section>

                <section>
                    <h3>Using the with statement</h3>
                    <p>It is good practice to use the <strong>with</strong> keyword when dealing with file objects. This
has the advantage that the file is properly closed after its suite finishes, even if
an exception is raised on the way. It is also much shorter than writing
equivalent try-finally blocks:</p>
                    <pre class="solution-content python"><code data-trim data-noescape>with open('Python_projects.txt', 'r') as f:
    read_data = f.read()

assert f.closed
</code></pre>
                </section>

                <section>
                    <h3>The json file format</h3>
                    <ul>
                        <li>json (JavaScript Object Notation) is a lightweight <strong>data interchange format</strong> with which you:
                            <ul>
                                <li>dump data ("serialize")</li>
                                <li>load data ("deserialize")</li>
                            </ul>
                        </li>
                    </ul>
                    <pre class="solution-content python"><code data-trim data-noescape>import json
serialized_data = json.dumps(
    ['foo', {'bar': ('baz', None, 1.0, 2)}])
print(serialized_data)
deserialized_data = json.loads(serialized_data)
print(deserialized_data)
</code></pre>
                </section>

                <section>
                    <h3>Example with a simple REST API (1)</h3>
                     <p>How to get the capital of each country?</p>
                    <pre class="solution-content python"><code data-trim data-noescape>import json
from urllib import request

infile = request.urlopen(
    'https://restcountries.eu/rest/v1/all')
content_as_python_obj = json.loads(infile.read().decode())
for country in content_as_python_obj:
    print(country['borders'])</code></pre>
                    <p>Can you see what object is the "borders"?</p>

                </section>

                <section>
                    <h3>Example with a simple REST API (2)</h3>
                    <pre class="solution-content python"><code data-trim data-noescape>import json
from urllib import request

infile = request.urlopen(
    'https://restcountries.eu/rest/v1/all')
content_as_python_obj = json.loads(infile.read().decode())
for country in content_as_python_obj:
    print(country['capital'])</code></pre>

                </section>

                <section>
                    <h3>API</h3>
                    <ul>
                        <li>In the previous case, an API (Application Programming Interface) is simply a specification of remote calls exposed to the API consumers</li>
                        <li>We are using the API as a service by just calling (doing a GET) its available urls</li>
                    </ul>
                </section>

                <section>
                    <h3>Example with the Twitter API using the client Tweepy</h3>
                    <ol>
                        <li>Navigate to <a href="https://apps.twitter.com/">https://apps.twitter.com/</a></li>
                        <li>Click the button to create a new application</li>
                        <li>Enter dummy data</li>
                        <li>Once the application is created, get the following:</li>
                            <ul>
                                <li>consumer_key</li>
                                <li>consumer_secret</li>
                                <li>access_token</li>
                                <li>access_secret</li>
                            </ul>
                    </ol>
                </section>

                <section>
                    <h3>Get tweet with #python</h3>
                    <pre class="solution-content python"><code data-trim data-noescape style="line-height: 100%; font-size: 28px">import tweepy

consumer_key = 'get_your_own'
consumer_secret = 'get_your_own'
access_token = 'get_your_own'
access_secret = 'get_your_own'

def main():
    auth = tweepy.auth.OAuthHandler(consumer_key,
                        consumer_secret)
    auth.set_access_token(access_token, access_secret)
    api = tweepy.API(auth)

    tweets = api.search(q='#python')
    for t in tweets:
        print(t.created_at, t.text, '\n')
main()</code></pre>
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
				]
			});
		</script>
	</body>
</html>
