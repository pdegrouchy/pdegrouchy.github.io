<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 10</title>

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
					<h3>Session 10</h3>
				</section>
				<section>
					<h3>Objectives</h3>
					<ul>
						<li>Introduction to Database Connection</li>
						<li>Debugging</li>
						<li>Using a virtual environment</li>
						<li>Testing</li>
						<li>Understand the purpose of using Version Control Systems</li>
					</ul>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (1)</h3>
					<ul>
						<li>Databases are used to store data in a structured format. Data stored in a database will remain stored on the hard drive even if you quit the application.</li>
						<li>A simplified view of what a database is, is to compare it to a spreadsheet. 
							<ul>
								<li>The spreadsheet will be the table.</li>
								<li>The first row where you declare headers of rows will be the fields (or columns)</li>
								<li>The data in each row will represent a record of data stored in the table</li>
							</ul>
						<li>SQLite is a very simple database. We can interact with it through module <strong>sqlite3</strong></li>
					</ul>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (2)</h3>
					<ul>
						<li>We need to import the module and connect to a database (that will be created if it does not exist).</li>
						<div><pre class="solution-content python"><code>import sqlite3

connection = sqlite3.connect("test_database.db")</code></pre></div>
					</ul>
					<p>NB: the data created will be stored in the file <strong>test_database.db</strong> that is actually the database</p>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (3)</h3>
					<p>We then need a <strong>cursor</strong> to execute commands on the database</p>
					<div><pre class="solution-content python"><code style="line-height: 100%;">import sqlite3

connection = sqlite3.connect("test_database.db")
cursor = connection.cursor()
# We create our first TABLE People that will
# store the field FirstName, LastName and Age
cursor.execute(
    "CREATE TABLE People("
    "FirstName TEXT, "
    "LastName TEXT, "
    "AGE INT)")</code></pre></div>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (4)</h3>
					<p>Imagine that the TABLE we have created is like a spreadsheet file ready to take data</p>
					<p>It means that we can now insert data into this table with the "INSERT" command</p>
					<div><pre class="solution-content python"><code>cursor.execute("INSERT INTO People "
               "VALUES ('Ron', 'Obvious', 42)")
# we have to commit to actually
# save the record in database
connection.commit()</code></pre></div>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (5)</h3>
					<p>When working with databases, it is a good idea to  use the <strong>with</strong>
						keyword to simplify your code, similar to how we used the <strong>with</strong> to open files</p>
					<div><pre class="solution-content python"><code>with sqlite3.connect("test_database.db") as connection:
	# perform any SQL operation</code></pre></div>
					<p>Also, you will no longer need to use the <strong>commit()</strong> explicitly</p>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (6)</h3>
					<p>Imagine that you want to concatenate a string to create an SQL command</p>
					<p><strong>Do not do this:</strong></p>
					<div><pre class="solution-content python"><code>first_name, last_name, age = 'John', 'Doe', 21
with sqlite3.connect("test_database.db") as connection:
    cursor = connection.cursor()
    cursor.execute(
        "INSERT INTO People VALUES"
        "('"+ first_name + "', '" + last_name + "', " + str(age) + ")")</code></pre></div>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (7)</h3>
					<p>The database is correctly updated, you can check that with the following command</p>
					<div><pre class="solution-content python"><code>with sqlite3.connect("test_database.db") as connection:
    cursor = connection.cursor()
	cursor.execute("SELECT * FROM People")
    rows = cursor.fetchall()
    print(rows)</code></pre></div>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (8)</h3>
					<p>Using the same method as 2 slides before, what happen if we try to add a user with the LastName "O'Connor"?</p>
					<div><pre class="solution-content python"><code>first_name, last_name, age = 'John', 'O\'Connor', 21
with sqlite3.connect("test_database.db") as connection:
    cursor = connection.cursor()
    cursor.execute(
        "INSERT INTO People VALUES"
        "('"+ first_name + "', '" + last_name + "', " + str(age) + ")")</code></pre></div>
					<p>We will get an error because the "'"</p>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (9)</h3>
					<img src="imgs/exploits_of_a_mom.png" style="background:none; border:none; box-shadow:none; margin-top:0px;height: 280px"/>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (10)</h3>
					<p>To avoid SQL injection, use the following instead:</p>
					<div><pre class="solution-content python"><code>first_name, last_name, age = 'John', 'O\'Connor', 21
with sqlite3.connect("test_database.db") as connection:
    cursor = connection.cursor()
    cursor.execute(
        "INSERT INTO People VALUES"
        "(?, ?, ?)", (first_name, last_name, age))
    cursor.execute("SELECT * FROM People")
    rows = cursor.fetchall()
    print(rows)</code></pre></div>
				</section>

				<section>
					<h3>Introduction to SQL Database Connection (11)</h3>
					<p>The question marks act as placeholders for the (first_name, last_name, age) tuple; this is called a
					<strong>parameterised statement</strong>. You should always used parameterised SQL statements.</p>
					<p>File used for the example: <a href="exercises/test_db.py">test_db.py</a></p>
				</section>

				<section>
					<h3>Exercise</h3>
					<ul>
						<li>Populate the database with additional records</li>
						<li>Display the People who are older than 18 using a <a href="http://www.w3schools.com/sql/sql_where.asp">select command</a> and a cr.fetchall()</li>
					</ul>
				</section>

				<section>
					<h3>Debugging</h3>
					<ul>
						<li>What is the program supposed to do?</li>
						<li>Is it doing what it is expected to do?</li>
						<li>Why not? Investigate...</li>
					</ul>
				</section>
                <section>
                    <h3>2 ways of debugging</h3>
                    <ul>
                        <li>Naive debugging</li>
						<ul>
							<li>Use the <strong>print()</strong> function, sometimes it is enough</li>
						</ul>
						<li>Smarter debugging</li>
						<ul>
							<li>Use a debugger, i.e. <strong>pdb</strong> and insert a <strong>breakpoint</strong></li>
							<li>A breakpoint is an intentional stopping or pausing place in a program. It is also sometimes simply referred to as a pause.</li>
							<li>You set it by writing the following within your program</li>
							<div><pre class="solution-content python"><code>import pdb; pdb.set_trace()</code></pre></div>
						</ul>
                    </ul>
                </section>

                <section>
                    <h3>Commands for using pdb</h3>
                    <ul style="line-height: 100%;">
                        <li>list (<strong>l</strong>) List 11 lines around the current line (five before and five after). Using list with a single numerical argument lists 11 lines around that line instead of the current line.</li>
                        <li>next (<strong>n</strong>) Execute the next line in the file. This allows you to go line by line and inspect the state of the code at that point.</li>
                        <li>continue (<strong>c</strong>) Exit out of the debugger but still execute the code.</li>
						<li>step into (<strong>s</strong>) to go into the execution call of an other function</li>
                    </ul>
					<p>To go further: <a href="https://pymotw.com/3/pdb/">https://pymotw.com/3/pdb/</a> </p>
                </section>

                <section>
                    <h3>Exercise: debug this code using a breakpoint or a print statement</h3>
                    <div><pre class="solution-content python"><code style="line-height: 100%;">import random

def sort_list(my_list):
    my_list = my_list.sort()
    return my_list

if __name__ == '__main__':
    # create and shuffle a list
    my_list = list(range(9))
    random.shuffle(my_list)

    # sort the list
    my_list = sort_list(my_list)
    print(my_list)  # [0, 1, 2, 3, 4, 5, 6, 7, 8]</code></pre></div>
                </section>

				<section>
					<h3>Using a virtual environment</h3>
					<ul>
						<li>Some applications use a complete dedicated machine to be installed and run</li>
						<li>But you may want to run different python versions with different libraries on the same machine</li>
						<li>From Python3.6, you can use:</li>
						<div><pre class="solution-content python"><code>python3 -m venv /path/to/new/virtual/environment</code></pre></div>
					</ul>
				</section>

				<section>
					<h3>Using a virtual environment: Note</h3>
					<ul>
						<li>Before Python3.6, you could use <strong>pyvenv</strong>:</li>
						<div><pre class="solution-content python"><code>pyvenv /path/to/new/virtual/environment</code></pre></div>
						<li>Before pyvenv, we would use an external library called <strong>virtualenv</strong>. If you are working with python2, this is what you should use</li>
						<li>More on virtual environment: <a href="https://docs.python.org/3.7/library/venv.html">https://docs.python.org/3.7/library/venv.html</a> </li>
					</ul>
				</section>

				<section>
					<h3>Virtualenv for Python2 programs</h3>
					<ul style="line-height: 80%;">
						<li>If not installed, install it with pip</li>
						<div><pre class="solution-content python"><code>pip install virtualenv</code></pre></div>
						<li>Create the virtual environment</li>
						<div><pre class="solution-content python"><code>virtualenv -p /path/to/python2.7 venv</code></pre></div>
						<li>Activate it</li>
						<div><pre class="solution-content python"><code>source venv/bin/activate</code></pre></div>
						<li>Install the required libraries</li>
						<div><pre class="solution-content python"><code>pip install openpyxl</code></pre></div>
					</ul>
				</section>

				<section>
					<h3>Virtualenv in Pycharm</h3>
					<img src="imgs/venv_pycharm.png" style="height: 500px;"/>
				</section>

                <section>
                    <h3>Testing</h3>
                    <ul>
                        <li>You want your program to be tested automatically</li>
                        <li>Each time you change something in your program, there is a risk to break it</li>
                        <li>So, you should test systematically.</li>
                        <li>Different types of testing: unit testing, integration testing, exploratory testing...</li>
                    </ul>
                </section>

				<section>
					<h3>Unit testing</h3>
					<ul>
						<li>Unit testing consists of testing the smallest part of your application, usually a function or a class</li>
						<li>To do that in python, you can use the <strong>unittest</strong> library</li>
					</ul>
				</section>

				<section>
					<h3>Example (1)</h3>
					<p>We have a function sum_two_numbers(a, b) that takes 2 numbers in arguments and returns their sum</p>
					<div><pre class="solution-content python"><code style="line-height: 100%;"># simple_function.py
def sum_two_numbers(a, b):
    return a + b</code></pre></div>
					<p>We call it like this, and put the result in a variable:</p>
					<div><pre class="solution-content python"><code style="line-height: 100%;">sum_nb = sum_two_numbers(1, 2)
print(sum_nb)</code></pre></div>
					<p>How to test it automatically?</p>
				</section>

				<section>
					<h3>Example (2)</h3>
					<div><pre class="solution-content python"><code># test_simple_functions.py
import unittest
from simple_function import sum_two_numbers

class SimpleTestClass(unittest.TestCase):

    def test_sum_two_numbers(self):
        self.assertEqual(sum_two_numbers(1, 2), 3)

if __name__ == '__main__':
    unittest.main()</code></pre></div>
				</section>

				<section>
					<h3>Example (3) - Explanation</h3>
					<ul>
						<li>You can download the files <a href="exercises/simple_function.py">simple_function.py</a> and
						<a href="exercises/test_simple_functions.py">test_simple_functions.py</a> </li>
						<li>What is important when writing a test:</li>
						<ul style="line-height: 100%;">
							<li>The name of the test file must start with <strong>test_</strong>, so that we understand that it is a test file</li>
							<li>We import the unittest library and define a class inheriting from <strong>unittest.TestCase</strong></li>
							<li>The test functions are within classes of this type. Note that the name of the test method must also begin with <strong>test_</strong></li>
							<li>Once you have executed your use case, you need to check if the result is correct with <strong>assertion methods</strong>
								(that are actually made available by the parent class).</li>
						</ul>
					</ul>
				</section>

				<section>
					<h3>Exercise: Create a test</h3>
					<p>Create a test for the sort_list() function of the first exercise</p>
					<ol style="line-height: 100%;">
						<li>Create an appropriate test file</li>
						<li>Import the <strong>unittest</strong> library</li>
						<li>Import the <a href="exercises/sorting_list.py">file</a> where the sort_list() function is defined</li>
						<li>Create a class inheriting from <strong>unittest.TestCase</strong> with an appropriate name</li>
						<li>Create a function that is going to test the sort_list() function with an <a href="https://docs.python.org/3/library/unittest.html#assert-methods"><strong>assert</strong> method</a></li>
						<li>At the end of the test file, write the following:</li>
						<div><pre class="solution-content python"><code>if __name__ == '__main__':
    unittest.main()</code></pre></div>
					</ol>
				</section>

				<section>
					<h3>The setUp() method</h3>
					<p>Method called to prepare the test fixture. This is called immediately before calling the test method. The default implementation does nothing.</p>
				</section>

				<section>
					<h3>The tearDown() method</h3>
					<p>Method called immediately after the test method has been called and the result recorded. This is called even if the test method raised an exception.
						The default implementation does nothing.</p>
				</section>

				<section>
					<h3>The assert methods</h3>
					<img src="imgs/assertmethods.png"/>
					<ul>
						<li>Many others: <a href="https://docs.python.org/3.6/library/unittest.html#unittest.TestCase.assertEqual">https://docs.python.org/3.6/library/unittest.html</a></li>
					</ul>
				</section>

				<section>
					<h3>Solution</h3>
					<p><a href="exercises/session_10_debugging_solution.py">session_10_debugging_solution.py</a></p>
					<p><a href="exercises/test_session_10_debugging_solution.py">test_session_10_debugging_solution.py</a></p>
				</section>

				<section>
					<h3>Rules for good unit tests</h3>
					<ul>
						<li>run completely by itself, without any human input. Unit testing is about automation.</li>
						<li>determine by itself whether the function it is testing has passed or failed, without a human interpreting the results</li>
						<li>run in isolation, separate from any other test cases (even if they test the same functions). Each test case is an island</li>
					</ul>
					<p>NB: Pycharm can also help you write unittest: see <a href="https://confluence.jetbrains.com/display/PYH/Creating+and+running+a+Python+unit+test">here</a></p>
				</section>

				<section>
					<h3>Measuring your code coverage</h3>
					<p>You can use the module <a href="https://pypi.python.org/pypi/coverage">coverage</a></p>
					<ul>
						<li>Use <strong>coverage run</strong> to run your program and gather data:</li>
						<div><pre class="solution-content python"><code>$ coverage run my_program.py arg1 arg2</code></pre></div>
						<li>Use <strong>coverage report</strong> to report on the results:</li>
						<div><pre class="solution-content python"><code>$ coverage report -m</code></pre></div>
						<li>Also possible <a href="https://www.jetbrains.com/help/pycharm/2016.1/running-with-coverage.html">in Pycharm</a></li>
					</ul>
				</section>

				<section>
					<h3>Version Control System, why</h3>
					<ul>
						<li>Keep track of changes happening in your project</li>
						<li>Experiment things and make changes with confidence, and revert when needed.</li>
						<li>Work in a team with files and directory structure that are consistent for all team members to allow communication</li>
						<li>Understand who made a change and why it happened</li>
					</ul>
				</section>

				<section>
					<h3>Version Control System, how</h3>
					<ul>
						<li>Different tools exist but the most common used today is <strong>Git</strong> that you can use with Github.com or BitBucket.com</li>
						<li>Git is a decentralized VCS, as opposed to SVN and CVS (the previous generation of VCS)</li>
						<li>Example of a branching strategy: the Feature Branch Workflow</li>
					</ul>
				</section>


				<section>
					<h3>To go further on using a VCS</h3>
					<ul>
						<li>See the different workflow strategies here: <a href="https://www.atlassian.com/git/tutorials/comparing-workflows/">https://www.atlassian.com/git/tutorials/comparing-workflows/</a></li>
						<li><a href="https://try.github.io/levels/1/challenges/1">Learn Git</a></li>
					</ul>
				</section>

				<section>
					<h3>What's next?</h3>
					<p>The best way to learn is by doing a python project</p>
					<p>Look at the <a href="https://wiki.python.org/moin/UsefulModules">popular python modules</a> and
					try to build something around them</p>
					<p>You can also train yourself by doing some mathematical challenges on the
						<a href="https://projecteuler.net/">Project Euler</a> or the
						<a href="http://www.pythonchallenge.com/">Python Challenge</a> website.</p>
					<p>You can host your project on Github or Bitbucket and
						<a href="https://try.github.io/levels/1/challenges/1">learn Git</a> </p>
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
