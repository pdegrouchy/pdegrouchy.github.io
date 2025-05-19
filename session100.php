<?php
require_once('../../python_settings/auth.php');
$pdfClass = isset($_GET['pdfCreation'])?'pdf':'';
?><!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Session 1</title>

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
				<section data-markdown>
## Introduction to Programming with Python
### Session 1
### Introduction to computers and Python
				</section>
				<section data-markdown>
### Objectives
* To get a brief overview of what Python is
* To understand computer basics and programs
* To understand what statement, variable and expressions are
* To explain the differences between syntax errors, runtime errors, and logic errors.
				</section>
				<section>
<h3 style="margin-bottom: 0px;">Python's popularity</h3>
<p style="margin-bottom: 0px;">Python was named <a href="http://www.tiobe.com/tiobe_index" title="TIOBE Programming Community index" target="_blank">TIOBE</a>'s programming language of the year 2018, as it gained most ranking points if compared to all other languages.</p>
<img data-src="imgs/tiobe2018.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section>
					<h3>Who uses Python?</h3>
<img data-src="imgs/python-uses.png" style="background:none; border:none; box-shadow:none; margin-top:0px;">
				</section>
				<section>
<h3>Before going more into details... What is a computer? (1/2)</h3>
An electronic device that is receiving data input; storing data (in RAM); processing data (in CPU); and producing information as output.
<img data-src="imgs/comp.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section>
<h3>What is a computer? (2/2)</h3>
<img data-src="imgs/comp2.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section data-markdown>
### What is a program?
* Computer programs, known as software, are *instructions to* the computer.
* You tell a computer what to do through programs. Without programs, a computer is an empty machine. Computers do not understand human languages, so you need to use computer languages to communicate with them.
* Programs are written using programming languages.
				</section>
				<section data-markdown>
### Different types of Programming Languages
* **Machine language** is a set of primitive instructions built into every computer. The instructions are in the form of binary code.
The programs in machine language are very difficult to read and modify.
For example, to add two numbers, you might write an instruction in binary like this:

     1101101010011010

* **High-level languages** mostly use keywords taken from, or inspired by, the English vocabulary and are easy to learn.
For example, the following is a high-level language statement that multiplies two numbers:
      area = 5 * 5
				</section>
				<section data-markdown>
### Computers work using binary logic.
* It is extremely difficult for humans to program in binary.
* Computer languages have to be translated to binary logic for the computer to understand.
* Two types of translation:
 * Compilation
 * Interpretation
				</section>
				<section data-markdown>
### Compilation (1/2)
* The compiler translates the entire source code into a program for the target machine (object code).
* The object code is then loaded onto the target machine and executed.
* Translation and execution are separate activities.
				</section>
				<section data-markdown>
### Compilation (2/2)
* Advantages:
 *  Programs are only translated once, and the execution can be remote from the target machine.
 * Execution is fast, because it is not interleaved with translation.
 * The source code does not have to be available.
* Disadvantages:
 * Run-time checks are more difficult, and are usually not performed.
 * Compilers tend to be large complex programs.
				</section>
				<section data-markdown>
### Interpretation (1/2)
* A software that translates each statement of a source code and executes it to the target machine's language.
* Cycle of actions:
 * Read one statement from the source code.
 * Translate it into one or more statements in the target machine's language.
 * Execute those statements on the target machine.
* Translation and execution are interleaved.
				</section>
				<section data-markdown>
### Interpretation (2/2)
* Advantages:
 * At run-time, the interpreter knows the current situation on the target machine, and it is therefore easier to perform runtime checks.
 * Interpreters are usually small programs.

* Disadvantages:
 * The interleaving of translation and execution means that programs are translated each time they are executed, and execution is therefore slow.
 * The source code has to be made available.
				</section>
				<section>
<h3>Comparison of interpreted vs compiled</h3>
<img data-src="imgs/interpreted_vs_compiled.png" style="background:none; border:none; box-shadow:none;">
				</section>
				<section data-markdown>
### Python Syntax
* Statement
* Variable
* Expression
* Indentation
* Comments
				</section>
				<section>
<h3> Python Syntax - Statement</h3>
<p>A statement represents an action or a sequence of actions. It <strong>does something</strong>.</p>
<p>To display the greeting "Welcome to Python", we use the <strong>print</strong> statement:</p>
<pre><code data-trim data-noescape>print("Welcome to Python")</code></pre>
<iframe class="trinket stretch" data-src="https://trinket.io/embed/python/08869da784" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
<h3> Python Syntax - Expression</h3>
<p>It represents something, like a number or a string. Expressions are nothing but values, except they can have operations like addition or subtraction.</p>
<pre><code data-trim data-noescape>
1 # is an expression
2 + 3 # is also an expression
"hello" # as well
</code></pre>
				</section>
				<section>
<h3>Variable 1</h3>
<p>It is a space created in memory (in RAM) where we can temporarily store values or data. We use the sign <strong>'='</strong> for assigning a value to a variable.</p>
<p>You can think of it like a box. For example, we store the value (or expression) 1 in the box (i.e the variable) <strong>a</strong>.</p>
<p>Notice that we do not specify the type of the variable, python sees it automatically. This is what we call the "duck typing" or "dynamic typing"</p>
<pre><code data-trim data-noescape>
a = 1
</code></pre>
				</section>
				<section>
<h3>Variable 2</h3>
<p>You can use the <strong>type</strong> builtin function to determine the type of a value or variable</p>
<iframe class="stretch" data-src="https://trinket.io/embed/python/e9c956e2e1" width="100%" height="300" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
<h3>Variable 3</h3>
<pre><code data-trim data-noescape>a = 1</code></pre>
<p>The variable has a name so that we can reuse it. When we use a variable, it is for retrieving the value that it is holding.</p>
<iframe class="stretch" data-src="https://trinket.io/embed/python/725d088b65" width="100%" height="300" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>

				<section>
                    <h3>Variables 4: dynamic typing</h3>
					<ul>
                    	<li>Python has strong dynamic typing</li>
						<ul>
							<li>No need to declare the type of the variable</li>
							<li>Python recognises the type according to the value of the variable</li>
						</ul>
						<pre class="solution-content python"><code data-trim data-noescape>
my_variable = 100
print(type(my_variable))  # will print &lt;class 'int'&gt;
my_variable="100"  # notice the quote for a string data type
print(type(my_variable))  # will print &lt;class 'str'&gt;
						</code></pre>
					</ul>
				</section>
				<section>
                    <h3>Variables 5: case sensitive</h3>
					<ul>
						<li>Python is case sensitive</li>
						<pre class="solution-content python"><code data-trim data-noescape>
My_variable = 100
print(id(my_variable))
Traceback (most recent call last):
  File "&lt;stdin&gt;", line 1, in &lt;module&gt;
NameError: name 'my_variable' is not defined
						</code></pre>
					</ul>
				</section>

				<section>
<h3> Python Syntax - Indentation</h3>
<p>The indentation is the increase or decrease of space between the left margin and the first character of the line.</p>
<p>The code need to be properly indented, else python will raise an error.</p>
<p>For example, what is wrong here?</p>
<iframe class="stretch" data-src="https://trinket.io/embed/python/a3e8a7b792" width="100%" height="300" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section>
<h3> Python Syntax - Comments</h3>
<p>If you want to comment a line, you can use the <strong>#</strong> (pound sign) that you place before the commented line</p>
<p>You can also comment multiple lines using <strong>'''</strong> (triple quote) before and after the commented paragraph</p>
<p>Example</p>
<iframe class="stretch" data-src="https://trinket.io/embed/python/e8239dac46" width="100%" height="300" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
				</section>
				<section data-markdown>
### The IDE (1/2)
* We are going to familiarize ourselves with [Pycharm](https://www.jetbrains.com/pycharm/).
 * Pycharm is an IDE (Integrated Development Environment), it helps you to write code with syntax highlighting, auto-completion and a lot of other features.
 * Open the python terminal from Pycharm by going to: View > Tool Windows > Python Console
 * The python terminal is useful for experimenting python code directly, without to run or "launch" a script
				</section>
				<section data-markdown>
### The IDE (2/2)
* To run a python script
 * Select the project that you have just created and do a right click and select "New" and "Python file"
 * Notice the extension of the file that you have created, it should be **.py**
 * Write ```print("Hello World")``` in the file
 * You can then run the file as a python script: in the menu at the top you click on Run and Run
				</section>
				<section>
<h3> Experimenting with the python shell in the IDE</h3>
<p> You can do simple arithmetic operations</p>
<pre><code data-trim data-noescape>x = 1             # Assign 1 to variable x
radius = 1.0      # Assign 1.0 to variable radius

# Assign the value of the expression to x
y = 5 * (3 / 2) + 3 * 2

x = y + 1     # Assign the addition of y and 1 to x
area = radius * radius * 3.14159 # Compute area
</code></pre>
				</section>
				<section>
<h3> Exercise 1: run the code as a python script</h3>
<p> After having experimented in the python shell (or python interpreter):</p>
<ul>
	<li>Take the previous script and put it in a <strong>NEW</strong> python file.</li>
	<li>Run the script</li>
</ul>
				</section>
				<section>
<h3> Exercise 2:</h3>
<p>Add a python file to the project</p>
<ul>
	<li>Download the python file with this <a href="exercises/session1/session_1_2.py">link</a> (right click and save as)</li>
	<li>Run the script in Pycharm</li>
	<li>Change the value of the variable to create your email at city (with the extension @city.ac.uk)</li>
	<li>Can you explain what is the operator "+" for a string?</li>
</ul>
				</section>
				<section>
<h3> The different type of errors (1/3)</h3>
 Syntax Error
	 <p>For example, when we forget a quote to close a string</p>
	 <pre><code data-trim data-noescape>print("Welcome to Python)</code></pre>
				</section>
				<section>
				<h3> The different type of errors (2/3)</h3>
				Runtime Error
				 <p>For example a division by zero (which is impossible)</p>
				<pre><code data-trim data-noescape>print(1/0)</code></pre>
				</section>
				<section>
					<h3> The different type of errors (3/3)</h3>
					Logic error
					<p>When a program is not doing what we want it to do.</p>
					<p>For instance, a wrong formulae for converting pound in kg</p>
					<pre><code data-trim data-noescape>pounds = float(input("Enter weight in pound: "))
# convert pound in kilogramme
kilograms = pounds / 0.454</code></pre>
					<p>It should be:</p>
					<pre><code data-trim data-noescape>pounds = float(input("Enter weight in pound: "))
# convert pound in kilogramme
kilograms = pounds * 0.454</code></pre>
				</section>
				<section>
					<h3> Exercise 3:</h3>
					<p>
					Write a program that converts pounds into euros.
					</p>
					<ul>
						<li>The values can be hard coded for now (it means that the program will not be dynamic)</li>
						<li>Use comments</li>
						<li>Use variables</li>
						<li>Use  print</li>
					</ul>
				</section>
				<section>
					<h3> The input function</h3>
					<pre><code data-trim data-noescape>myName = input()</code></pre>
					<p>The input() function waits for the user to type some text on the keyboard and press ENTER.</p>
				</section>
				<section>
					<h3> Exercise 4:</h3>
					<ul>
						<li>
						Write a program that ask the user what amount is to be converted in euros, convert it and display the result.
						</li>
						<li>
						Hint: we are going to need the function <strong>input</strong> and the function <strong>float</strong>
						</li>
					</ul>
				</section>
				<section>
					<h3> Some simple Data Types in Python</h3>
					<ul>
						<li>
							Numeric: int, float
						</li>
						<li>
							String: str
						</li>
					</ul>
				</section>
				<section>
					<h3> Introspection</h3>
					<p>Built in functions that enables to introspect your code</p>
					<ul>
						<li>
						help()
						</li>
						<li>
						dir()
						</li>
					</ul>
				</section>
				<section>
					<h3> Exercise 5</h3>
					<p>Make a word that a user input in UPPER CASE, i.e. all the letters of the word should be in capital</p>
					<ul>
						<li>
							Use the input function.
						</li>
						<li>
							Put the word in a variable.
						</li>
						<li>
							Use a built in function (the help function) to find the method for that.
						</li>
						<li>
							Use print
						</li>
					</ul>
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
					{ src: 'plugin/menu/menu.js' }
				]
			});
		</script>
	</body>
</html>
